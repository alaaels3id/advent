<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Faq;
use Redirect;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::all();
        return isNullOrNot($faqs, 'admin.faqs.index', compact('faqs'), 'عفوا لا يوجد اي اسئلة شائعة للعرض');
    }

    public function create()
    {
        return view('admin.faqs.add');
    }

    public function store(Request $request)
    {
        Faq::create([
            'head' => get($request, 'head'),
            'body' => get($request, 'body'),
            'type' => $request->type,
        ]);

        return back()->withFlashMessage('تم إضافة السؤال بنجاح');
    }

    public function edit($id)
    {
        $faq = Faq::findOrFail(intval($id));
        return isNullOrNot($faq, 'admin.faqs.edit', compact('faq'), 'عفوا هذا السؤال غير موجود لدينا');
    }

    public function update(Request $request, $id)
    {
        $req = ['head' => get($request, 'head'), 'body' => get($request, 'body'), 'type' => $request->type];
        Faq::findOrFail(intval($id))->update($req);
        return back()->withFlashMessage('تم تعديل السؤال بنجاح');
    }

    public function destroy($id)
    {
        Faq::destroy(intval($id));
        return Redirect::route('faqs.index')->withFlashMessage('تم حذف السؤال بنجاح');
    }
}
