<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactsRequest;
use Illuminate\Support\Facades\Redirect;
use StreamLab\StreamLabProvider\Facades\StreamLabFacades;
use App\Notifications\addNewMessage;
use Notification;
use App\Contact;
use DataTables;
use App\User;
use Auth;
use DB;
class ContactsContoller extends Controller
{
    public function index()
    {
        return view('admin.contacts.index');
    }

    public function store(ContactsRequest $request)
    {
        if(in_array($request->co_type, [0, 1, 2, 3])){
            $contact = Contact::create($request->all());
            
            $data = [$request->co_name, contacts()[$request->co_type], $request->image, $request->co_message, $request->co_subject];
            
            $admin = Admin::all();
            
            Notification::send($admin, new addNewMessage($contact));
            
            StreamLabFacades::pushMessage('notification', 'addNewMessage', $data);
            
            return back()->withFlashMessage(__('cozastore.MessageSendSuccess'));
        }else{
            return back()->withFlashMessage('من فضلك إختر نوع الرسالة من القائمة');
        }
    }

    public function edit(Request $request, $id)
    {
        DB::table('notifications')->where('id', $request->id)->delete();
        $contact = Contact::find($id);
        if(empty($contact)){
            return back()->withFlashMessage('تم حذف هذه الرسالة');
        }else{
            $contact->update(['co_view' => 1]);
            return view('admin.contacts.edit', compact('contact'));
        }
    }

    public function update(Request $request, $id)
    {
        Contact::find($id)->update($request->all());
        return back()->withFlashMessage('تم تعديل الرسالة بنجاح');
    }

    public function destroy($id)
    {
        Contact::destroy($id);
        return Redirect::Route('contacts.index')->withFlashMessage('تم حذف الرسالة بنجاح');
    }

    public function RemoveAll()
    {
        Contact::truncate();
        DB::table('notifications')->truncate();
        return Redirect::Route('contacts.index')->withFlashMessage('تم حذف كل بيانات الجدول بنجاح');
    }

    public function anyData()
    {
        $co = Contact::all();
        return DataTables::of($co)
        
        ->editColumn('co_name', function($model){
            return \Html::link('/admin-panal/contacts/'.$model->id.'/edit', ucfirst($model->co_name));
        })
        
        ->editColumn('co_type', function ($model){
            return \Html::tag('span', contacts()[$model->co_type], ['class' => 'label label-info']);
        })
        
        ->editColumn('co_email', function ($model){
            return \Html::mailto($model->co_email, $model->co_email);
        })

        ->editColumn('co_view', function ($model){
            
            $yes = \Html::tag('span', 'مقروءة', ['class' => 'label label-success']);
            $no = \Html::tag('span', 'جديدة', ['class' => 'label label-info']);
            
            if($model->co_view == 1) return $yes;
            elseif($model->co_view == 0) return $no;
            else return "Error";
        })
        
        ->editColumn('delete', function($model){
            return \Html::link('/admin-panal/contacts/'.$model->id.'/destroy' , ' ', ['class' => 'btn btn-danger glyphicon glyphicon-remove btn-sm', 'title' => 'حذف']);
        })
        
        ->editColumn('edit', function ($model){
            return \Html::link('/admin-panal/contacts/'.$model->id.'/edit' , ' ', ['class' => 'btn btn-info glyphicon glyphicon-edit btn-sm', 'title' => 'تعديل']);
        })->make(true);
    }
    
    // ===================================================================================
    // Ajax Requests
    // ===================================================================================
    
    public function AllSeen(){
        foreach(Auth::user()->unreadNotifications as $note){
            $note->markAsRead();
        }
    }
    
    public function GetContactId(Request $request)
    {
        if($request->ajax()){
            return Contact::select('id')->where('image', $request->image)->where('co_subject', $request->subject)->get()->toJson();
        }
    }
}
