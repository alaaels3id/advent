<?php

namespace App\Http\Elequent;

use App\Http\Interfaces\ProductsRepositoryInterface;
use App\Product;
use DB;

class ProductsRepository implements ProductsRepositoryInterface
{
    function GetAllProducts($paginate)
    {
        /*
                $products = Review::leftjoin('products', 'products.id', '=', 'reviews.product_id')
            ->select('products.*', DB::raw('AVG(reviews.rate) as avg'))->where('status', 1)->groupBy('id')->take(20)->get(); 
               return $products;
        */
       return $products = Product::status()->orderBy(DB::raw('RAND()'))->paginate($paginate);
    }

     function GetTags($table, $table_id, $the_product_id, $model, $id)
     {
	$colors = DB::table($table)->where($table_id, intval($id))->get();
        
        $products_ids = [];
        
        foreach($colors as $key => $color){ $products_ids[$key] = $color->{$the_product_id}; }
        
        return $products = DB::table($model)->whereIn('id', $products_ids)->paginate(20);
     }

     function GetFilterOneRes($table, $table_id, $request, $the_product_id, $price=null, $arr = ['id', 'ASC'])
     {
        $colors = DB::table($table)->where($table_id, $request->{$the_product_id})->get();
        
        $products_ids = [];
        
        foreach($colors as $key => $value) { $products_ids[$key] = $value->product_id; }
        
        $query = Product::status()->orderBy($arr[0], $arr[1])->whereIn('id', $products_ids);
        
        return $products = ($price == null) ? $query->paginate(20) : $query->where('price', '>=', $request->product_price)->whereIn('id', $products_ids)->paginate(20);
     }

     function GetFilterTwoRes($tab1, $tab2, $tab1_id, $tab2_id, $request, $tab1_arg, $tab2_arg, $price=null, $arr = ['id', 'ASC'])
     {
        $tags = DB::table($tab1)->where($tab1_id, $request->{$tab1_arg})->get();
        $colors = DB::table($tab2)->where($tab2_id, $request->{$tab2_arg})->get();

        $products_ids_tags = [];
        $products_ids_colors = [];

        foreach($tags as $key => $value) { $products_ids_tags[$key] = $value->product_id; }
        foreach($colors as $key => $value) { $products_ids_colors[$key] = $value->product_id; }

        $products_ids = array_intersect($products_ids_tags, $products_ids_colors);

        $query = DB::table('products')->status()->orderBy($arr[0], $arr[1])->whereIn('id', $products_ids);
                return $products = ($price == null) ? $query->paginate(20) : $query->where('price', '>=', $request->product_price)->paginate(20);
     }

     function GetFilterOneAndTowPrices($table, $table_id, $request, $the_product_id, $price = [], $arr = ['id', 'ASC'])
     {
        $colors = DB::table($table)->where($table_id, $request->{$the_product_id})->get();
        $products_ids = [];
        foreach($colors as $key => $value) { $products_ids[$key] = $value->product_id; }
        $query = Product::status()->whereIn('id', $products_ids)->orderBy($arr[0], $arr[1]);
        if(!empty($price)){
        	return $products = $query->whereBetween('price', [$price[0], $price[1]])->paginate(20);
        }else{
        	return $products = $query->paginate(20);
        }
     }

     function GetFilterTwoAndTowPrices($tab1, $tab2, $tab1_id, $tab2_id, $request, $tab1_arg, $tab2_arg, $price = [], $arr = ['id', 'ASC'])
     {
        $tags = DB::table($tab1)->where($tab1_id, $request->{$tab1_arg})->get(); 
        $colors = DB::table($tab2)->where($tab2_id, $request->{$tab2_arg})->get();

        $products_ids_tags = [];
        $products_ids_colors = [];
        
        foreach($tags as $key => $value) { $products_ids_tags[$key] = $value->product_id; }
        foreach($colors as $key => $value) { $products_ids_colors[$key] = $value->product_id; }

        $color_tag_products_ids = array_intersect($products_ids_colors, $products_ids_tags);

        $query = Product::status()
        ->orderBy($arr[0], $arr[1])
        ->whereIn('id', $color_tag_products_ids);
        
        if($price){
            return $products = $query->whereBetween('price', [$price[0], $price[1]])->paginate(20);
        }else{
            return $products = $query->paginate(20);
        }
     }
}