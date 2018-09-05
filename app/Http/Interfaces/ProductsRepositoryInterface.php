<?php

namespace App\Http\Interfaces;

interface ProductsRepositoryInterface
{
	public function GetAllProducts($paginate);
	public function GetTags($table, $table_id, $the_product_id, $model, $id);
	public function GetFilterOneRes($table, $table_id, $request, $the_product_id, $arr = ['id', 'ASC'], $price=null);
	public function GetFilterTwoRes($tab1, $tab2, $tab1_id, $tab2_id, $request, $tab1_arg, $tab2_arg, $arr = ['id', 'ASC']);
	public function GetFilterOneAndTowPrices($table, $table_id, $request, $the_product_id, $price = [], $arr = ['id', 'ASC']);
	public function GetFilterTwoAndTowPrices($tab1, $tab2, $tab1_id, $tab2_id, $request, $tab1_arg, $tab2_arg, $price = [], $arr = ['id', 'ASC']);
}