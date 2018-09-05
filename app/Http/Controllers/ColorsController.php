<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Color;

class ColorsController extends Controller
{
    public function index(){
        $colors = Color::all();
        return isNullOrNot($colors, 'admin.colors.index', compact('colors'), 'لا يوجد الوان في قاعدة البيانات');
    }

    public function create(){
        return view('admin.colors.add');
    }

    public function store(Request $request){
        Color::create(['name' => get($request, 'name'), 'color' => $request->color]);
        return back()->withFlashMessage('تم إضافة اللون بنجاح');
    }

    public function edit($id){
        $color = Color::find($id);
        return isNullOrNot($color, 'admin.colors.edit', compact('color'), 'حدث خطأ ما أثناء عملية التعديل');
    }

    public function update(Request $request, $id){
        $color = Color::find(intval($id))->update($request->all());
        return back()->withFlashMessage('تم التعديل علي اللون بنجاح');
    }

    public function destroy($id){
        $color = Color::where('id', intval($id));
        DB::table('product_color')->where('color_id', $id)->delete();
        return back()->withFlashMessage('تم حذف اللون بنجاح');
    }
}
