<?php

namespace App\Http\Controllers;
use App\Size;
use DB;
use Redirect;
use Illuminate\Http\Request;

class SizesController extends Controller
{

    public function index()
    {
        $sizes = Size::all();
        return $sizes != null ? view('admin.sizes.index', compact('sizes')) : redirect('/admin-panal');
    }

    public function create()
    {
        return view('admin.sizes.add');
    }

    public function store(Request $request)
    {
        Size::create($request->all());
        return back()->withFlashMessage('تم إضافىة المقاس بنجاح');
    }

    public function edit($id)
    {
        $size = Size::find(intval($id));
        return $size != null ? view('admin.sizes.edit', compact('size')) : redirect('/admin-panal');
    }

    public function update(Request $request, $id)
    {
        $size = Size::findOrFail(intval($id));
        $size->update($request->all());
    }

    public function destroy($id)
    {
        Size::destroy($id);
        return back()->withFlashMessage('تم حذف المقاس بنجاح');
    }
}
