<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Banner;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.add');
    }

    public function show()
    {
        //
    }

    public function store(Request $request)
    {
        Category::create([
            'slug'  => get($request, 'slug'),
            'name'  => json_encode(['ar'=>$request->slugar, 'en' => $request->name]),
        ]);
        return back()->withFlashMessage('تم إضافة الفئة بنجاح');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->update($request->all());
        return back()->withFlashMessage('تم تعديل الفئة بنجاح');
    }

    public function destroy($id)
    {
        $cat = Category::findOrFail($id);
        Banner::where('name', $cat->name);
        Category::destroy($id);
        return back()->withFlashMessage('تم حذف الفئة بنجاح');
    }

    public function getTrashed(){
        $trash = Category::onlyTrashed()->paginate(4);
        return view('admin.categories.delete', compact('trash'));
    }

    public function restore($id){
        $cat = Category::findOrFail($id);
        DB::table('categories')->where('id', $id)->update(['deleted_at' => null]);
        DB::table('banners')->where('category', $cat->name)->update(['deleted_at' => null]);
        return back()->withFlashMessage('تم استعادة القسم بنجاح');
    }

    public function forceDelete($id){
        $cat = Category::onlyTrashed()->where('id', $id)->get()->first();
        $banner = Banner::onlyTrashed()->where('category', $cat->name)->get()->first();
        if(empty($banner)){
            $cat->forceDelete();
        }else{
            $banner->forceDelete();
            $cat->forceDelete();
        }
        $cat->forceDelete();
        return back()->withFlashMessage('تم حذف القسم نهائياً');
    }
}
