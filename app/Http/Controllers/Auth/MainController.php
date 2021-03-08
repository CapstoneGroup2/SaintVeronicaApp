<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Auth;

class MainController extends Controller
{
    public function index()
    {
        return view('layouts.login');
    }

    public function checklogin(Request $request)
    {
        $this->validate($request, [
            'email' =>  'required|email',
            'password'  => 'required|min:8'
        ]);

        $user_data = array(
            'user_email'     =>  $request->get('email'),
            'password'  =>  $request->get('password')
        );

        if(Auth::attempt($user_data))
        {
            error_log(print_r(Auth::user()->user_email, true));
            return redirect('/index');
        }
        else
        {
            error_log(print_r('wala', true));
            return back()->with('error', 'Wrong Login Details')->withInput($request->except('password'));
        }
    }

    public function successlogin() 
    {
        return view('pages.index');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
