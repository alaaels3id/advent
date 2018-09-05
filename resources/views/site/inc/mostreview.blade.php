@include('site.inc.related', [
	'related' => DB::table('reviews as r')
				->leftjoin('products as p', 'p.id', '=', 'r.product_id')
        		->select('p.*', DB::raw('AVG(r.rate) as avg'))
        		->havingRaw('avg >= 4')
        		->groupBy('id')->get(), 
    'thetitle' => __('cozastore.mostReviews')
])