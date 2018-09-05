<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BannersRequest;
use App\Banner;
use Redirect;
use Auth;
use DB;

class BannersController extends Controller
{
    public function index()
    {
        $banners = Banner::all();
        return view('admin.banners.index', compact('banners'));
    }

    public function create()
    {
        return view('admin.banners.add');
    }

    public function store(Request $request)
    {   
        if($request->file('image')){
            
            $filename = uploadimage($request->file('image'), '/public/advent/uploads/banners/', '1920', '930');
            if(!$filename){return Redirect::back()->withFlashMessage('برجاء اختيار صورة ذات حجم بين 1920 بكسيل و 1930 بيكسل');}
            $image = $filename;
        
        }else $image = '';
        $Banner = [
            'head'  => get($request, 'head'),
            'body'  => get($request, 'body'),
            'category_id' => $request->category_id,
            'image' => $image,
        ];
        Banner::create($Banner);

        return back()->withFlashMessage('تم إضافة القسم بنجاح');
    }

    public function edit($id)
    {
        $banner = Banner::findOrFail($id);
        return view('admin.banners.edit', compact('banner'));
    }

    public function update(Request $request, $id)
    {
        $banner = Banner::find($id);
        $file = $request->file('image');
        $data = array_except($request->all(), ['image']);
        
        if($file){
            $filename = uploadimage($file, '/public/advent/uploads/banners/', '1920', '930', $banner->image);
            if(!$filename) return Redirect::back()->withFlashMessage('!!');
            $banner->update(['image' => $filename]);
        }else{
            $banner->update($data);
        }
        return back()->withFlashMessage('تم تعديل بيانات القسم بنجاح');
    }

    public function destroy($id)
    {
        Banner::destroy($id);
        return back()->withFlashMessage('تم حذف القسم بنجاح');
    }

    public function getTrashed(){
        $trash = Banner::onlyTrashed()->paginate(4);
        return view('admin.banners.delete', compact('trash'));
    }

    public function restore($id){
        DB::table('banners')->where('id', $id)->update(['deleted_at' => null]);
        return back()->withFlashMessage('تم استعادة القسم بنجاح');
    }

    public function forceDelete($id){
        Banner::onlyTrashed()->where('id', $id)->forceDelete();
        return back()->withFlashMessage('تم حذف القسم نهائياً');
    }
}
