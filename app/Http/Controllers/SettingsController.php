<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class SettingsController extends Controller
{
    public function index(){
        $settings = Setting::all();
        return view('admin.settings.index', compact('settings'));
    }

    public static function inputs($name, $type, $value=null){
        $inputs = '';
        foreach (app('langs') as $lang) {
            $inputs .= view("admin.inputs.$type", ['name' => $name, 'lang' => $lang, 'type' => $type, 'value' => $value])->render();
        }
        return $inputs;
    }

    public static function get(Request $request, $name){
        $values = [
            'ar' => $request->{$name.'ar'},
            'en' => $request->{$name.'en'}
        ];
        return json_encode($values);
    }

    public static function text($value, $lang=null){
        $value_ = json_decode($value);
        return ($lang != null) ? $value_->{$lang} : $value_->ar;
    }

    public function addnewset(Request $request){
        Setting::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'type' => $request->type,
            'value' => json_encode(['ar' => $request->valuear, 'en' => $request->valueen]),
        ]);
        return Redirect::back()->withFlashMessage('تم اضافة الاعداد بنجاح');
    }

    public function store(Request $request){
        // Split the submit, _token from the array;
        $reqs = array_except($request->toArray(), ['_token', 'submit']);
        $file = $request->file('no_image');

        // Table Columns Array;
        $arr = ['sitename', 'facebook', 'instagram', 'pinterest', 'siteSmallDis', 'mobile', 'mail', 'siteoffer', 'siteCurrence', 'no_image'];
        
        // Table Rows Values;
        $vals = [
            'sitename'      => json_encode(['ar' => $request->sitenamear, 'en' => $request->sitenameen]),
            'facebook'      => $request->facebook,
            'instagram'     => $request->instagram,
            'pinterest'     => $request->pinterest,
            'siteSmallDis'  => json_encode(['ar' => $request->siteSmallDisar, 'en' => $request->siteSmallDisen]),
            'mobile'        => $request->mobile,
            'mail'          => $request->mail,
            'siteoffer'     => json_encode(['ar' => $request->siteofferar, 'en' => $request->siteofferen]),
            'siteCurrence'  => json_encode(['ar' => $request->siteCurrencear, 'en' => $request->siteCurrenceen]),
            'no_image'      => $file,
        ];
        
        // Loop in Colums and rows;
        for($i=0; $i < count($arr); $i++){
            $settings = Setting::where('name', $arr[$i])->first();
            // if it equal 2 that it is a file;
            if ($settings->type != 2) {
                $settings->fill(['value' => $vals[$arr[$i]]])->save();
            } else {
                if($file == null) back();
                else{
                    $filename = uploadimage($file, '/public/advent/uploads/', '1600', '500', $settings->value);
                    if ($filename) $settings->fill(['value' => $filename])->save();
                    else return Redirect::back()->withFlashMessage('عفواً - خدث خطأ اثناء رفع الملف يرجي المحاولة مرة أخري');
                }
            }
        }
        
        return redirect('admin-panal/settings')->withFlashMessage('تم التعديل علي اعدادات الموقع بنجاح');
    }
}
