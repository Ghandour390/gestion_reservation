<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
   public function index()
    {
        return view('login');
    }

    public function registration()
    {
        return view('registration');
    }

    public function validate_registration(Request $request)
    {
        $request->validate([
            'lastname'         =>   'required',
            'firstname'         =>   'required',
            'email'        =>   'required|email|unique:users',
            'password'     =>   'required|confirmed|min:8'
        ]);

        $data = $request->all();

        User::create([
            'lastname'  =>  $data['lastname'],
            'firstname'  =>  $data['firstname'],
            'email' =>  $data['email'],
            'password' => Hash::make($data['password'])
        ]);

        return redirect('login')->with('success', 'Registration Completed, now you can login');
    }

     public function validate_login(Request $request)
    {
        $request->validate([
            'email' =>  'required',
            'password'  =>  'required'
        ]);

        $credentials = $request->only('email', 'password');

        if(Auth::attempt($credentials))
        {
            return redirect('dashboard');
        }

        return redirect('login')->with('success', 'Login details are not valid');
    }

    public function dashboard()
    {
        if(Auth::check())
        {
            return view('dashboard');
        }

        return redirect('login')->with('success', 'login avec access');
    }

    public function logout()
    {
        Session::flush();

        Auth::logout();

        return Redirect('login');
    }
}
