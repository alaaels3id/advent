<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AdminAddNewBlogRequest;
use Redirect;
use App\Post;
use DB;
use App\Comment;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('admin.blog.index', compact('posts'));
    }

    public function create()
    { 
        return view('admin.blog.add'); 
    }

    public function blog(Request $request)
    {
        $blog = Post::latest()->filter($request)->paginate(4);
        return view('site.pages.blog', compact('blog'));
    }

    public function ShowBlog($id, $name)
    {
        $blog = Post::findOrFail($id);
        return view('admin.blog.blog', compact('blog'));
    }

    public function store(Request $request)
    {
        $admin_id = auth()->user()->id;
        
        $file = $request->file('image');
        
        if($file){
            $filename = uploadimage($file, '/public/advent/uploads/blog/', '1200', '601');
            if(!$filename){return Redirect::back()->withFlashMessage('برجاء اختيار صورة ذات حجم بين 1200 بكسيل و 601 بيكسل');}
            $image = $filename;
        
        }else $image = '';
        
        $post = Post::create([
            'title'   => get($request, 'title'),
            'body'    => get($request, 'body'),
            'admin_id' => $admin_id,
            'image'   => $image,
        ]);
        $post->tags()->sync($request->tags, false);
        return Redirect::back()->withFlashMessage('تم إضافة التدوينة بنجاح');
    }

    public function BlogEdit($id, $name)
    {
        $blog = Post::findOrFail($id);
        return view('admin.blog.edit', compact('blog'));
    }

    public function update(Request $request, $id)
    {
        $blog = Post::findOrFail($id);
        $file = $request->file('image');
        $data = array_except($request->all(), ['image']);
        
        if($file){
        
            $filename = uploadimage($file, '/public/advent/uploads/blogs/', '1200', '601', $blog->image);
            if(!$filename) return Redirect::back()->withFlashMessage('!!');
            $blog->update(['image' => $filename]);
        
        }else{
            $blog->update(['title' => get($request, 'title'), 'body' => get($request, 'body')]);
            $blog->tags()->sync($data['tags']);
        }
        return Redirect::back()->withFlashMessage('تم التعديل علي المدونة بنجاح');
    }

    public function AddNewComment(Request $request, $id, $name)
    {
        $user_id = auth()->user()->id;
        Comment::create(['user_id' => $user_id, 'post_id' => $id, 'body' => $request->cmt]);
        return back();
    }

    public function destroy($id)
    {
        Post::destroy($id);
        return Redirect::route('blogs.index')->withFlashMessage('تم حذف المدونة بنجاح');
    }

    public function getTrashed()
    {
        $trash = Post::onlyTrashed()->paginate(4);
        return view('admin.blog.delete', compact('trash'));
    }

    public function restore($id)
    {
        DB::table('posts')->where('id', $id)->update(['deleted_at' => null]);
        return redirect()->back()->withFlashMessage('تم استعادة المدونة بنجاح');
    }

    public function forceDelete($id)
    {
        $post = Post::where('id', $id);
        DB::table('post_tag')->where('post_id', $id)->delete();
        $post->forceDelete();
        
        return redirect()->back()->withFlashMessage('تم حذف المدونة نهائياً');
    }

    public function blogdetiles($id, $name)
    {
        $blog = Post::findOrFail($id);
        return view('site.pages.blog-detail', compact('blog'));
    }
}
