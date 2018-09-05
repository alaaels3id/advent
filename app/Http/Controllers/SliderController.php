<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SlidersRequest;
use App\Slider;
use Redirect;
use Auth;
use DB;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();
        return view('admin.slider.index', compact('sliders'));
    }

    public function create()
    {
        return view('admin.slider.add');
    }

    public function store(Request $request)
    {
        $user_id = Auth::user()->id;
        
        if($request->file('image')){
            
            $filename = uploadimage($request->file('image'), '/public/advent/uploads/slider/', '1920', '930');
            if(!$filename){return Redirect::back()->withFlashMessage('برجاء اختيار صورة ذات حجم بين 1920 بكسيل و 1930 بيكسل');}
            $image = $filename;
        
        }else $image = '';
        $slider = [
            'title'     => get($request, 'title'),
            'subtitle'  => get($request, 'subtitle'),
            'user_id'   => $user_id,
            'image'     => $image,
        ];
        Slider::create($slider);

        return redirect()->back()->withFlashMessage('تم إضافة البنر بنجاح');
    }

    public function edit($id)
    {
        $slider = Slider::findOrFail($id);
        return view('admin.slider.edit', compact('slider'));
    }

    public function update(Request $request, $id)
    {
        $slider = Slider::find($id);
        $file = $request->file('image');
        $data = array_except($request->all(), ['image']);
        
        if($file){
            $filename = uploadimage($file, '/public/advent/uploads/slider/', '1920', '930', $slider->image);
            if(!$filename) return Redirect::back()->withFlashMessage('!!');
            $slider->update(['image' => $filename]);
        }else{
            $slider->update($data);
        }
        return Redirect::back()->withFlashMessage('تم تعديل بيانات البنر بنجاح');
    }

    public function destroy($id)
    {
        Slider::destroy($id);
        return redirect()->back()->withFlashMessage('تم حذف البنر بنجاح');
    }

    public function getTrashed()
    {
        $trash = Slider::onlyTrashed()->paginate(10);
        return view('admin.slider.delete', compact('trash'));
    }

    public function restore($id)
    {
        DB::table('sliders')->where('id', $id)->update(['deleted_at' => null]);
        return redirect()->back()->withFlashMessage('تم استعادة البنر بنجاح');
    }

    public function ForceDelete($id)
    {
        Slider::onlyTrashed()->where('id', $id)->forceDelete();
        return Redirect::back()->withFlashMessage('تم حذف البنر نهائياً');
    }
}
