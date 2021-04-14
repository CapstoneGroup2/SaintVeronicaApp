<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Validator;
use Auth;

class MainController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function checklogin(Request $request)
    {
        $this->validate($request, [
            'email' =>  'required|email',
            'password'  => 'required|min:8'
        ]);

        $user_data = array(
            'user_email'     =>  $request->get('email'),
            'password'       =>  $request->get('password')
        );

        if(Auth::attempt($user_data))
        {
            if(Auth::user()->user_active_status == 1) 
            {
                switch (Auth::user()->role_id) {
                    case 1;
                        return redirect('/dashboard');
                        break;
                    case 2:
                        return redirect('/home');
                        break;
                    default:
                        return redirect('/login');
                        break;
                }
            }
            else
            {
                return back()->with('error', 'Credentials are unavailable.')->withInput($request->except('password'));
            }
        }
        else
        {
            return back()->with('error', 'Invalid email or password!')->withInput($request->except('password'));
        }
    }

    public function successlogin() 
    {
        return view('pages.index');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/welcome');
    }
}
