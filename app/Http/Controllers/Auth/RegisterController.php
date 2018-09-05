<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'firstName' => 'required|string|min:3|max:20',
            'lastName'  => 'required|string|min:3|max:20',
            'username'  => 'required|string|min:8|max:20',
            'location'  => 'required|min:10|max:255',
            'jop'       => 'required|string|min:10|max:255',
            'mobile'    => 'required|string|max:11',
            'dob'       => 'required|date',
            'email'     => 'required|string|email|max:255|unique:users',
            'password'  => 'required|string|min:6|confirmed',
        ]);
    }

    protected function create(array $data)
    {
        return User::create([
            'firstName' => $data['firstName'],
            'lastName'  => $data['lastName'],
            'password'  => $data['password'],
            'username'  => $data['username'],
            'location'  => $data['location'],
            'jop'       => $data['jop'],
            'mobile'    => $data['mobile'],
            'dob'       => $data['dob'],
            'email'     => $data['email'],
            'gender'    => $data['gender'],
            'image'     => '',
        ]);
    }
}
