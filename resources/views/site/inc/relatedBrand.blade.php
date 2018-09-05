@include('site.inc.related', [
    'related' => DB::table('products')->where('status', 1)
            ->where('id', '!=', $product->id)
            ->where('brand', $product->brand)
            ->orderBy(DB::raw('RAND()'))->get()->take(8), 
    'thetitle' => __('cozastore.relatedBrand')])