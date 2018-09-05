<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        return view('site.pages.shoppingCart');
    }

    public function setAjaxCart(Request $request)
    {
        $dublicates = Cart::search(function ($cartItem, $rowId) use($request) {
            return $cartItem->id === $request->id; 
        });
        
        if($dublicates->isNotEmpty()){
            return 0;
        }else{
            Cart::add($request->id, $request->name, $request->qty, $request->price, ['size' => $request->sizes, 'color' => $request->colors])
            ->associate('App\Product');
            
            return 1;
        }
    }

    public function removeProductFromCart(Request $request)
    {
        return Cart::remove($request->rowId);
    }

    public function removeProductFromWishlist(Request $request)
    {
        return Cart::instance('wishlist')->remove($request->rowId);
    }

    public function setCartCount()
    {
        return Cart::count() != null ? count(Cart::content()) : '0';
    }

    public function getCartTotal()
    {
        return getCurrence(Cart::total());
    }

    public function getWishlistCount()
    {
        return Cart::instance('wishlist')->count() == 0 ? '0' : count(Cart::instance('wishlist')->content());
    }

    public function addToWishlist(Request $request)
    {
        $id = $request->rowId;

        $item = Cart::get($id);

        Cart::remove($id);
        
        $dublicates = Cart::instance('wishlist')->search(function ($cartItem, $rowId) use($request) { 
            return $cartItem->id === $request->rowId;
        });
        if ($dublicates->isNotEmpty()) {
            return 'false';
        }
        
        Cart::instance('wishlist')->add($item->id, $item->name, $item->qty, $item->price, ['size' => $item->options->size, 'color' => $item->options->color])->associate('App\Product');
        
        return redirect()->route('cart.index');
    }

    public function moveToCart(Request $request)
    {
        $item = Cart::instance('wishlist')->get($request->rowId);

        $dublicates = Cart::instance('default')->search(function ($cartItem, $rowId) use($request) { 
            return $cartItem->id === $request->rowId; 
        });

        if ($dublicates->isNotEmpty()) {
            return 'false';
        }else{
            Cart::add($item->id, $item->name, $item->qty, $item->price, ['size' => $item->options->size, 'color' => $item->options->color])->associate('App\Product');
        }

        Cart::instance('wishlist')->remove($request->rowId);

        return redirect()->route('cart.index');
    }

    function changeQty(Request $request)
    {
        return Cart::update($request->rowId, $request->qty) ? 1 : 0;
    }

    function getShowCartModel()
    {
        $id = [];
        $names = [];
        $prices = [];
        $qtys = [];
        $names_dash = [];
        $imgs = [];
        $product_id =[];

        foreach (Cart::instance('default')->content() as $item) {
            $id[] = $item->rowId;
            $names[] = $item->name;
            $prices[] = getCurrence($item->price);
            $qtys[] = $item->qty;
            $names_dash [] = seourl($item->name);
            $imgs[] = getJsonImages($item->model->image)->image0;
            $product_id[] = $item->model->id;
        }
        $arr = json_encode([
            'id' => $id,
            'prices' => $prices,
            'names' => $names,
            'qtys' => $qtys,
            'imgs' => $imgs,
            'names_dash' => $names_dash,
            'product_id' => $product_id
        ]);

        return $arr;
    }
}
