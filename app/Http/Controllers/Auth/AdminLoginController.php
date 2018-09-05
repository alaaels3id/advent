<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class AdminLoginController extends Controller
{
	public function __construct()
    {
        $this->middleware('guest:admin');
    }

    public function showLoginForm()
    {
    	return view('admin.pages.login');
    }

    public function login(Request $request)
    {
        // Validate the inputs
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        $remember = $request->remember;

        // Attemot to log the use in
        if(Auth::guard('admin')->attempt($credentials, $remember)){
            //if true => login
    		return redirect()->intended(route('admin-panal'));
    	}else{
    		//else => redirect back;
    		return redirect()->back()->withInputs($request->only('email', 'remember'));
    	}


    }
}
