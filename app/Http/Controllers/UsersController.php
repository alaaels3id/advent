<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AddUsersAdminRequest;
use App\Http\Requests\EditUserRequest;
use App\Http\Requests\UserRegisterRequest;
use Hash;
use App\User;
use Auth;
use DB;
use Redirect;
use DataTables;

class UsersController extends Controller
{
    public function index()
    {
        return view('admin.users.index');
    }

    public function create()
    {
        return view('admin.users.add');
    }

    public function store(Request $request)
    {
        if($request->file('image')){
        
            $filename = uploadimage($request->file('image'), '/public/advent/uploads/users/');
            if(!$filename){return back()->withFlashMessage('برجاء اختيار صورة ذات حجم بين 750 بكسيل و 750 بيكسل');}
            $image = $filename;
        
        }else $image = '';
        User::create([
            'firstName' => $request->firstName,
            'lastName'  => $request->lastName,
            'password'  => $request->password,
            'username'  => $request->username,
            'location'  => $request->location,
            'jop'       => $request->jop,
            'mobile'    => $request->mobile,
            'dob'       => $request->dob,
            'email'     => $request->email,
            'gender'    => $request->gender,
            'image'     => $image,
        ]);
        return redirect()->route('users.index')->withFlashMessage('تم اضافة العضو بنجاح');
    }

    public function edit($id)
    {
        $user = User::find(intval($id));
        return isNullOrNot($user, 'admin.users.edit', compact('user'), 'عفوا هذا المستخدم غير موجود لدينا');
    }

    public function update(EditUserRequest $request, $id)
    {
        $user = User::find($id);
        $file = $request->file('image');
        $data = array_except($request->all(), ['image']);
        
        if($file){
            $filename = uploadimage($file, '/public/advent/uploads/users/', '750', '750', $user->image);
            if(!$filename) return back()->withFlashMessage('!!');
            $user->update(['image' => $filename]);
        }else{
            $user->update($data);
        }
        return back()->withFlashMessage('تم تعديل بيانات العضو بنجاح');
    }

    public function destroy($id)
    {
        User::destroy($id);
        return redirect()->route('users.index')->withFlashMessage('تم حذف العضو بنجاح');
    }

    public function getTrashed()
    {
        $trash = User::onlyTrashed()->paginate(4);
        return view('admin.users.delete', compact('trash'));
    }

    public function restore($id)
    {
        DB::table('users')->where('id', $id)->update(['deleted_at' => null]);
        return redirect()->back()->withFlashMessage('تم استعادة العضو بنجاح');
    }

    public function forceDelete($id)
    {
        $user = User::where('id', intval($id));
        
        if($user == null) return back()->withFlashMessage('عفوا هذا المنتج غير موجود ');
        else{
            DB::table('product_user')->where('user_id', $user->id)->delete();
            $user->forceDelete();
        }
        
        User::onlyTrashed()->where('id', $user->id)->forceDelete();
        return back()->withFlashMessage('تم حذف العضو نهائياً');
    }

    public function updatePassword(Request $request)
    {
        User::find($request->user_id)->update(['password' => $request->password]);
        return redirect('admin-panal/users/')->withFlashMesssage('تم تغير كلمة المرور بنجاح');
    }

    public function UserChangePasssword(Request $request)
    {
        if(Hash::check($request->password, auth()->user()->password))
        {
            User::find(auth()->user()->id)->update(['password' => $request->newpassword]);
            return back()->withFlashMessage('You have Changed the Password Successfully !!');   
        }
        else
        {
            return back()->withFlashMessage('Sorry, the password you have entered is not matched with we have !!');
        }
    }       

    public function anyData()
    {
        $users = User::all();
        return DataTables::of($users)

        ->editColumn('fullname', function ($users) {
            $fullname = ucfirst($users->firstName) . ' ' . ucfirst($users->lastName);
            return \Html::link('/admin-panal/users/' . $users->id . '/edit', $fullname);
        })

        ->editColumn('email', function ($users) {
            $str = substr($users->email, 0, 20);
            return strlen($str) < 20 ? $str : $str . '...';
        })

        ->editColumn('age', function ($users) {
            return $users->dob->age;
        })

        ->editColumn('gender', function ($users) {
            $male = \Html::tag('span', 'ذكر', ['class' => 'label label-info h4']);
            $female = \Html::tag('span', 'انثي', ['class' => 'label label-success h4']);
            return $users->gender == 0 ? $male : $female;
        })

        ->addColumn('delete', function ($users) {
            $link = \Html::link('/admin-panal/users/' . $users->id . '/destroy', " ", ['class' => 'btn btn-danger delete glyphicon glyphicon-remove', 'title' => 'حذف']);
            return $link;
        })
        ->addColumn('edit', function ($users) {
            return \Html::link('/admin-panal/users/' . $users->id . '/edit', " ", ['class' => 'btn btn-info glyphicon glyphicon-edit', 'title' => 'تعديل']);
        })->make(true);
    }
}
