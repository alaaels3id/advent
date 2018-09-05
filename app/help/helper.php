<?php

use App\Http\Controllers\SettingsController;
use App\Product;
use Intervention\Image\Facades\Image;

//==================================================================================
//=============================== users functions ==================================
//==================================================================================

function users(){ return DB::table('users')->count(); }
function fullname(){ return ucfirst(Auth::user()->firstName) . ' ' . ucfirst(Auth::user()->lastName); }
function gender(){ return [__('cozastore.male'), __('cozastore.female')]; }
function leatestUsers(){ return DB::table('users')->take(8)->latest()->get(); }
function isAuthOrNot(){ return auth()->user() ? auth()->user()->lang : 'ar'; }

function getAdminProductCount($id){ 
    $res = DB::table('admin_product')->where('admin_id', $id)->get()->count();
    if ($res != null) {
        return $res;
    }else{
        return 0;
    }
}

//==================================================================================
//=============================== Blog functions ============================-======
//==================================================================================

function textboxtype(){ return ['نص عادي', 'نص كبير', 'ملف']; }

function tags(){
    $array = [];
    foreach (DB::table('tags')->get() as $value) { $array [$value->id] = $value->name; }
    return $array;
}
function getAllBlogs(){ return DB::table('posts')->get(); }
//==================================================================================
//==================================================================================

function GetSettings($site_name = 'sitename')
{   
    $site = DB::table('settings')->where('name', $site_name)->get()->first();
    return $site != null ? $site->value : 'error';
}

function gov(){
    return [
        'New Valley', 'Matruh', 'Red Sea', 'Giza','South Sinai', 'North Sinai', 'Suez', 'Beheira',
        'Helwan', 'Sharqia', 'Dakahlia', 'Kafr el-Sheikh', 'Alexandria', 'Monufia', 'Minya', 'Gharbia', 'Faiyum', 'Qena', 'Asyut', 'Sohag', 
        'Ismailia', 'Beni Suef', 'Qalyubia', 'Aswan','Damietta', 'Cairo', 'Port Said', 'Luxor', '6th of October',
    ];
}

function GetSliders(){
    $slider = DB::table('sliders')->get();
    return ($slider->count() < 0) ? ($slider = 'null') : $slider;
}

//==================================================================================
//=============================== Image functions ===========================-======
//==================================================================================

function GetImage($image, $path = '/public/advent/uploads/', $url = '/advent/uploads/'){
    $root = Request::root();
    
    $path = base_path() . $path . $image;
    if ($image != '') { 
        if(file_exists($path)){
            return $root . $url . $image;
        } 
    } 
    else{
        return $root.$url.GetSettings('no_image');
    }
}

function uploadimage($request, $path = '/public/advent/uploads/', $width = '750', $height = '750', $DeleteFileWithName = ''){
    $dim = getimagesize($request);

    ($DeleteFileWithName != '') ? delete(base_path() . $path . '/' . $DeleteFileWithName) : '';

    $random = rand(10000, 99999);

    $filename = $random . '_' . $request->getClientOriginalName();
    $request->move(base_path() . $path, $filename);

    if ($width == '750' && $height == '750') { 
        Image::make(base_path() . $path . '/' . $filename)->resize('750', '750')->save(); 
    }else{
        Image::make(base_path() . $path . '/' . $filename)->resize($width, $height)->save(); 
    }

    return $filename;
}

function delete($DeleteFileWithName){ if (file_exists($DeleteFileWithName)) { File::delete($DeleteFileWithName); }}

//==================================================================================
//============================= contact us functions ===============================
//==================================================================================

function contacts(){ return [__('cozastore.coLike'), __('cozastore.coProblem'), __('cozastore.coSuggest'),  __('cozastore.coSupport')]; }
function coview(){ return ['جديد', 'مقروء']; }
function getUnreadedMessagesCount(){ return DB::table('contacts')->where('co_view', 0)->get()->count(); }
function getUnreadedMessages(){ return DB::table('contacts')->where('co_view', 0)->get(); }
function getreadedMessagesCount(){ return DB::table('contacts')->where('co_view', 1)->get()->count(); }
function getAllMessagesCount(){ return DB::table('contacts')->count(); }

//==================================================================================
//=============================== Products functions ===============================
//==================================================================================

function ProductType(){ return ['ملابس', 'إكسيسوارات']; }
   
function Category(){
    $array = [];
    foreach (DB::table('categories')->get() as $value) { $array [$value->id] = $value->slug; }
    return $array;
}

function ProductColors(){
    $array = [];
    foreach (DB::table('colors')->get() as $value) { $array [$value->id] = $value->name; }
    return $array;
}

function GetColorById($id){
    $color = App\Color::find(intval($id));
    //$color = DB::table('colors')->where('id', )->first();
    return $color != null ? ucfirst(text($color->name, isAuthOrNot())) : 'null';
}

function GetSizeById($id){
    $size = App\Size::find($id);
    return $size == null ? 'null' : ucfirst($size->size);
}

function getOrderedUser($id){
    return DB::table('users')->where('id', intval($id))->first();
}

function status(){ return ['غير مفعل', 'مفعل']; }

function GetAvg($table, $table_id, $id, $col){ return DB::table($table)->where($table_id, $id)->avg($col);}
function GetCount($table, $table_id, $id, $col){ return DB::table($table)->where($table_id, $id)->count($col);}

function AllProductsCount(){ return DB::table('products')->count(); }
function ProductsStatusCount($status){ return DB::table('products')->where('status', $status)->count(); }
function GetDeletedProductsCount(){ return Product::onlyTrashed()->count(); }
function GetAllProducts(){ return Product::status()->get();}

function getFullname($id){
    $admin = App\Admin::find(intval($id));
    return ucfirst($admin->firstName).' '.ucfirst($admin->lastName);
}

//==================================================================================

function SetActive($request, $class = 'active-menu'){ 
    if(Request::is($request)){
        return $class;
    } 
}

// This is for Settings multi langauges
function inputs($name, $type, $value = null){ return SettingsController::inputs($name, $type, $value); }

function get($request, $name){ return SettingsController::get($request, $name); }

function text($value, $lang=null){ return SettingsController::text($value, $lang); }

function condition($res, $else){ 
    if(Auth::user()) return (auth()->user()->lang == 'ar') ? $res : $else;
    else return $res;
}

function ReplaceDashWithSpace($string){ return preg_replace("/[\s-]+/", " ", $string); }

function seourl($string) 
{
    //Lower case everything
    //$string = strtolower($string);
    
    //Make alphanumeric (removes all other characters)
    //$string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
    
    //Clean up multiple dashes or whitespaces
    //$string = preg_replace("/[\s-]+/", " ", $string);
    
    //Convert whitespaces and underscore to dash
    $string = preg_replace("/[\s_]/", "-", $string);
    
    return $string;
}

function getJsonImages($value){ return json_decode($value); }
function getCurrence($price=''){ return text(GetSettings('siteCurrence'), isAuthOrNot()).' '.$price;}

//==================================================================================
//================================== Filter ========================================
//==================================================================================

function sortBy(){ 
    return [
        'default'              => __('cozastore.default'), 
        'newest'               => __('cozastore.newest'),
        'sortByPriceLowToHigh' => __('cozastore.sortByPriceLowToHigh'), 
        'sortByPriceHighToLow' => __('cozastore.sortByPriceHighToLow')
    ];
}

function pricelist(){
    return [
        '0'       => __('cozastore.all'),
        '0-50'    => getCurrence().' 0.00 - '.getCurrence().' 50.00',
        '50-100'  => getCurrence().' 50.00 - '.getCurrence().' 100.00',
        '100-150' => getCurrence().' 100.00 - '.getCurrence().' 150.00',
        '150-200' => getCurrence().' 150.00 - '.getCurrence().' 200.00',
        '200'     => '+200.00',
    ];
}

function sizes(){
    $array = [];
    foreach (DB::table('sizes')->get() as $value) { $array [$value->id] = $value->size; }
    return $array;
}

function FaqsTyps(){
    return [
        __('cozastore.faqShoppingProccess'),
        __('cozastore.faqLogin'),
        __('cozastore.faqGeneral'),
        __('cozastore.faqOrders')
    ];
}

function GetSpecialAdmins()
{
    // SELECT users.*, COUNT(admin_product.user_id) as count FROM admin_product LEFT JOIN users ON admin_product.user_id = users.id GROUP BY(user_id)
    return DB::table('admin_product')->leftjoin('admins', 'admins.id', '=', 'admin_product.admin_id')
    ->select('admins.*', DB::raw('COUNT(admin_product.admin_id) as count'))
    ->havingRaw('count >= 3')->groupBy('id')->get();   
}

function isNullOrNot($array, $view, $res, $message = ''){
    return ($array != null) ? view($view, $res) : back()->withFlashMessage($message);
}

function GetOrderItemsIds(){
    $pro_ids = [];
    $pro_qty = [];
    $pro_color = [];
    $pro_size = [];
    $i = $j = $k = $l = 0;

    foreach(Cart::content() as $item) {
        $pro_ids[$i++] = $item->model->id;
        $pro_qty[$j++] = $item->qty;
        $pro_color[$k++] = $item->options->color;
        $pro_size[$l++] = $item->options->size;
    }

    $res = [
        'ids' => $pro_ids,
        'qty' => $pro_qty,
        'color' => $pro_color,
        'size' => $pro_size
    ];

    return $res;
}

function MyOrdersCount($id){
    return App\Order::where('custumer_id', intval($id))->count();
}

function GetProductsById($id){
    return DB::table('products')->where('status', 1)->where('id', intval($id))->first();
}

if(!function_exists('carbon')){
    function carbon($date, $format='d-M-Y'){
        return \Carbon\Carbon::parse($date)->format($format);
    }
}

function MyDoneOrdersCount($id){
    return App\Order::onlyTrashed()->where('custumer_id', intval($id))->count();
}

function SetImage($img, $path){
    return GetImage($img, '/public/advent/uploads/'.$path.'/', '/advent/uploads/'.$path.'/');
}