<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Validator;

class UsersController extends Controller
{
    public function index()
    {
        $users = DB::table('users')
            ->join('roles', 'roles.id', '=', 'users.role_id')
            ->select('users.id', 'users.user_first_name', 'users.user_last_name', 'users.user_address', 'users.user_email', 'users.user_contact', 'roles.role_name')
            ->where('user_active_status', 1)
            ->get();

        if (request()->ajax())
        {
            return datatables()->of($users)
                ->addColumn('role_name', function($data) {
                    return '<span style="font-weight: bold; font-size: 17px;">' . $data->role_name . '</span>';
                })
                ->addColumn('full_name', function($data) {
                    $full_name = $data->user_first_name . ' ' . $data->user_last_name;
                    return $full_name;
                })
                ->addColumn('action', function($data) {
                    $button = '<a href="/users/'. $data->id . '" data-toggle="tooltip" title="View" class="btn btn-md btn-primary" role="button" style="margin: 2px; padding: 0 2%"><span class="glyphicon glyphicon-eye-open"></span></a>';
                    $button .= '<a href="/users/'. $data->id .'/edit
                    " data-toggle="tooltip" title="Edit" class="btn btn-md btn-warning" role="button" style="margin: 2px; padding: 0 2%"><span class="glyphicon glyphicon-pencil"></span></a>';
                    return $button;
                })
                ->rawColumns(['role_name', 'full_name', 'action'])
                ->make(true);
        }
        
        return view('users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $error = 0;

        if (preg_match('~[0-9]+~', $request['user_first_name'])) {
            back()->with('user_first_name_error', 'The first name field should not contain number.');
            $error = 1;
        }

        if (preg_match('~[0-9]+~', $request['user_middle_name'])) {
            back()->with('user_middle_name_error', 'The middle name field should not contain number.');
            $error = 1;
        }

        if (preg_match('~[0-9]+~', $request['user_last_name'])) {
            back()->with('user_last_name_error', 'The last name field should not contain number.');
            $error = 1;
        }

        if ($error === 1) {
            return back();
        }

        $data = $this->validate($request, [
            'user_first_name'    =>  'required|max:225',
            'user_middle_name'   =>  'nullable|max:225',
            'user_last_name'     =>  'required|max:225',
            'user_role_id'       =>  'required|numeric|min:1|max:2',
            'user_contact'       =>  'required|regex:/^[-0-9\+]+$/|min:11|max:13',
            'user_address'       =>  'nullable',
            'user_gender'        =>  'nullable',
            'user_status'        =>  'nullable',
            'user_email'         =>  'required|email|unique:users',
            'user_image'         =>  'mimes:jpeg,png,jpg,gif,svg',
        ]);

        try {
            $user = new User();
            $user->role_id = $request['user_role_id'];
            $user->user_first_name = ucwords(strtolower($request['user_first_name']));
            $user->user_middle_name = ucwords(strtolower($request['user_middle_name']));
            $user->user_last_name = ucwords(strtolower($request['user_last_name']));
            $user->user_email = strtolower($request['user_email']);
            $user->user_contact = $request['user_contact'];
            $user->user_address = ucwords(strtolower($request['user_address']));
            $user->user_gender = $request['user_gender'];
            $user->user_status = $request['user_status'];
            $user->user_active_status = 1;

            if ($request['user_role_id'] == 1) {
                $user->password = bcrypt(ucwords(strtolower($request['user_last_name'])) . substr(strtolower($request['user_first_name']), 0, 2) . '@admin');
            } else {
                $user->password = bcrypt(ucwords(strtolower($request['user_last_name'])) . substr(strtolower($request['user_first_name']), 0, 2) . '@registrar');
            }

            // if ($request->hasFile('user_image')) {
            //     $image = $request->file('user_image');
            //     $name = $image->getClientOriginalName();
            //     $destinationPath = public_path('/images/users');
            //     $image->move($destinationPath, $name);
            // } else {
            //     $name = 'default.png';  
            // }
    
            $user->user_image = 'default.png';
            $user->save();   

            return redirect('/users')->with('success', 'User has successfully created!');
        } catch (\Exception $exception) {
            return redirect('/users')->with('error_message', 'There is error in creating user!');
        }
    }

    public function show($id)
    {
        $users = DB::table('users')
            ->join('roles', 'roles.id', '=', 'users.role_id')
            ->where('users.id', $id)
            ->select('users.id', 'users.user_first_name', 'users.user_middle_name', 'users.user_last_name', 
                'users.user_address', 'users.user_image', 'users.user_contact', 'users.user_email', 
                'roles.role_name', 'users.user_address', 'users.user_gender', 'users.user_status')
            ->get();
            
        return view('users.show', compact('users'));
    }

    public function edit($id)
    {
        $users = DB::table('users')
            ->join('roles', 'roles.id', '=', 'users.role_id')
            ->where('users.id', $id)
            ->select('users.id', 'users.role_id', 'users.user_first_name', 'users.user_middle_name', 'users.user_last_name', 
                'users.user_address', 'users.user_image', 'users.user_contact', 'users.user_email', 
                'roles.role_name', 'users.user_address', 'users.user_gender', 'users.user_status', 'user_active_status')
            ->get();

        $roles = Role::all();
            
        return view('users.edit', compact('users', 'roles'))->with('success', 'User information has successfully updated!');
    }

    public function update(Request $request, $id)
    {        

        $error = 0;

        if (preg_match('~[0-9]+~', $request['user_first_name'])) {
            back()->with('user_first_name_error', 'The first name field should not contain number.');
            $error = 1;
        }

        if (preg_match('~[0-9]+~', $request['user_middle_name'])) {
            back()->with('user_middle_name_error', 'The middle name field should not contain number.');
            $error = 1;
        }

        if (preg_match('~[0-9]+~', $request['user_last_name'])) {
            back()->with('user_last_name_error', 'The last name field should not contain number.');
            $error = 1;
        }

        if ($request['password'] && !preg_match('~(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+~', $request['password'])) {
            back()->with('password_error', 'The password should contain symbol, uppercase letter, lowercase letter, and number.');
            $error = 1;
        }

        if ($error === 1) {
            return back();
        }
        
        $this->validate($request, [
            'user_first_name'    =>  'required|max:225',
            'user_middle_name'   =>  'nullable|max:225',
            'user_last_name'     =>  'required|max:225',
            'user_role_id'       =>  'required|numeric|min:1|max:2',
            'user_contact'       =>  'required|regex:/^[-0-9\+]+$/|min:11|max:13',
            'user_address'       =>  'nullable',
            'user_email'         =>  'required|email|unique:users,user_email,'.$id,
            'user_gender'        =>  'nullable',
            'user_status'        =>  'nullable',
            'password'           =>  'nullable|min:8|required_with:password_confirmation|confirmed',
            'password_confirmation'=>'nullable|min:8',
            'user_active_status' =>  'required|numeric|min:1|max:2',
            'user_image'         =>  'image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        try {
            $user = User::find($id);
            $user->role_id = $request['user_role_id'];
            $user->user_first_name = ucwords(strtolower($request['user_first_name']));
            $user->user_middle_name = ucwords(strtolower($request['user_middle_name']));
            $user->user_last_name = ucwords(strtolower($request['user_last_name']));
            $user->user_email = strtolower($request['user_email']);
            $user->user_contact = $request['user_contact'];
            $user->user_address = ucwords(strtolower($request['user_address']));
            $user->user_gender = $request['user_gender'];
            $user->user_status = $request['user_status'];
            $user->user_active_status = $request['user_active_status'];

            if ($request->hasFile('user_image')) {
                $image = $request->file('user_image');
                $name = $image->getClientOriginalName();
                $destinationPath = public_path('/images/users');
                $image->move($destinationPath, $name);
                $user->user_image = $name;
            } 
    
            if($request['password'] != null) {
                $user->password = bcrypt($request['password']);
            }
    
            $user->save();
    
            return redirect('/users');
        } catch (\Exception $exception) {
            return redirect('/users')->with('error_message', 'There is error in updating user information!');
        }
    }
}
