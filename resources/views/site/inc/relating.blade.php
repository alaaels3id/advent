@include('site.inc.related', ['related' => DB::table('products')->where('status', 1)
    ->where('category_id', $product->category_id)->where('id', '!=', $product->id)->take(8)
    ->orderBy(DB::raw('RAND()'))->get(), 'thetitle' => __('cozastore.realtedProducts')])