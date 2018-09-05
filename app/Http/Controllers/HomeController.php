<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Interfaces\ProductsRepositoryInterface;
use Auth;
use App\User;
use Carbon\Carbon;
use Session;
use App\Post;
use App\Product;
use DB;

class HomeController extends Controller
{
    public function __construct() 
    { 
        $this->middleware('auth'); 
    }

    public function index(ProductsRepositoryInterface $pro){ 
        $products = $pro->GetAllProducts(20);
        return isNullOrNot($products, 'home', compact('products'), 'عفوا لا يوجد لدينا منتجات حاليا');
    }

    public function welcome(ProductsRepositoryInterface $pro)
    {
        $products = $pro->GetAllProducts(20);
        return isNullOrNot($products, 'welcome', compact('products'), 'عفوا لا يوجد لدينا منتجات حاليا');
    }

    public function Shop(ProductsRepositoryInterface $pro)
    {
        $products = $pro->GetAllProducts(20);
        return isNullOrNot($products, 'site.pages.shop', compact('products'), 'عفوا لا يوجد لدينا منتجات حاليا');
    }

    public function profile()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
    	return view('site.profile.index', compact('user'));
    }

    public function langs($lang)
    {
        $langauge = strtolower($lang);
        
        if(in_array($langauge, ['ar', 'en']))
        {
            if(Auth::user())
            {
                $user = Auth::user();
                $user->lang = $langauge;
                $user->save();
            }
            else
            {
                (Session::has('lang')) ? Session::forget('lang') : '';
            }
            Session::put('lang', $langauge);
        }
        else
        {
            if(Auth::user())
            {
                $user = Auth::user();
                $user->lang = 'ar';
                $user->save();
            }
            else
            {
                (Session::has('lang')) ? Session::forget('lang') : '';
            }
            Session::put('lang', 'ar');
        }
        return back();
    }

    public function getCategory($category_id)
    {
        $products = Product::where('category_id', intval($category_id))->where('status', 1)->paginate(20);
        return isNullOrNot($products, 'site.pages.categories', compact('products'), 'عفوا لا يوجد لدينا منتجات حاليا');
    }
    
    public function ColorsTags(ProductsRepositoryInterface $pro, $id)
    {
        $products = $pro->GetTags('color_product', 'color_id', 'product_id', 'products', $id);
        return isNullOrNot($products, 'site.inc.colorsTags', compact('products'), 'عفوا لا يوجد لدينا منتجات حاليا');
    }

    public function ProductTags(ProductsRepositoryInterface $pro, $id)
    {
        $products = $pro->GetTags('product_tag', 'tag_id', 'product_id', 'products', $id);
        return isNullOrNot($products, 'site.inc.colorsTags', compact('products'), 'عفوا لا يوجد لدينا منتجات حاليا');
    }

    public function SizesTags(ProductsRepositoryInterface $pro, $id)
    {
        $products = $pro->GetTags('product_size', 'size_id', 'product_id', 'products', $id);
        return isNullOrNot($products, 'site.inc.colorsTags', compact('products'), 'عفوا لا يوجد لدينا منتجات حاليا');
    }

    public function BlogsTags(ProductsRepositoryInterface $pro, $id, $name)
    {
        $tag  = $name;
        $blog = $pro->GetTags('post_tag', 'tag_id', 'post_id', 'posts', $id);
        return isNullOrNot($blog, 'site.inc.blogTags', compact('blog', 'tag'), 'عفوا لا يوجد لدينا منتجات حاليا');
    }
}
