<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;

class TagsController extends Controller
{
    public function index()
    {
        $tags = Tag::all();
        return view('admin.tags.index', compact('tags'));
    }

    public function create()
    {
        return view('admin.tags.add');
    }

    public function store(Request $request)
    {
        Tag::create($request->all());
        return redirect()->back()->withFlashMessage('تم إضافة الكلمة الدلالية بنجاح');
    }

    public function edit($id)
    {
        $tag = Tag::find($id);
        return view('admin.tags.edit', compact('tag'));
    }

    public function update(Request $request, $id)
    {
        $tag = Tag::find($id)->update($request->name);
        return redirect()->back()->withFlashMessage('تم التعديل علي الكلمة الدلالية بنجاح');
    }

    public function destroy($id)
    {
        $tag = Tag::where('id', $id);
        
        DB::table('post_tag')->where('tag_id', $id)->delete();
        
        return redirect()->back()->withFlashMessage('تم حذف الكلمة الدلالية بنجاح');

    }
}
