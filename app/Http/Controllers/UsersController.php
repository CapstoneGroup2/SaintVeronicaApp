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
            ->select('users.id', 'users.first_name', 'users.last_name', 'users.address', 'users.email', 'users.contact', 'roles.role')
            ->where('active_status', 1)
            ->get();

        if (request()->ajax())
        {
            return datatables()->of($users)
                ->addColumn('role_name', function($data) {
                    return '<span style="font-weight: bold; font-size: 17px;">' . $data->role . '</span>';
                })
                ->addColumn('full_name', function($data) {
                    $full_name = $data->first_name . ' ' . $data->last_name;
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

        if (preg_match('~[0-9]+~', $request['first_name'])) {
            back()->with('first_name_error', 'The first name field should not contain number.');
            $error = 1;
        }

        if (preg_match('~[0-9]+~', $request['middle_name'])) {
            back()->with('middle_name_error', 'The middle name field should not contain number.');
            $error = 1;
        }

        if (preg_match('~[0-9]+~', $request['last_name'])) {
            back()->with('last_name_error', 'The last name field should not contain number.');
            $error = 1;
        }

        if ($error === 1) {
            return back();
        }

        $data = $this->validate($request, [
            'first_name'    =>  'required|max:225',
            'middle_name'   =>  'nullable|max:225',
            'last_name'     =>  'required|max:225',
            'role_id'       =>  'required|numeric|min:1|max:2',
            'contact'       =>  'required|regex:/^[-0-9\+]+$/|min:11|max:13',
            'address'       =>  'nullable',
            'gender'        =>  'nullable',
            'status'        =>  'nullable',
            'email'         =>  'required|email|unique:users',
        ]);

        try {
            $user = new User();
            $user->role_id = $request['role_id'];
            $user->first_name = ucwords(strtolower($request['first_name']));
            $user->middle_name = ucwords(strtolower($request['middle_name']));
            $user->last_name = ucwords(strtolower($request['last_name']));
            $user->email = strtolower($request['email']);
            $user->contact = $request['contact'];
            $user->address = ucwords(strtolower($request['address']));
            $user->gender = $request['gender'];
            $user->status = $request['status'];
            $user->active_status = 1;

            if ($request['role_id'] == 1) {
                $user->password = bcrypt(ucwords(strtolower($request['last_name'])) . substr(strtolower($request['first_name']), 0, 2) . '@admin');
            } else {
                $user->password = bcrypt(ucwords(strtolower($request['last_name'])) . substr(strtolower($request['first_name']), 0, 2) . '@registrar');
            }
    
            $user->image = 'default.png';
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
            ->select('users.id', 'users.first_name', 'users.middle_name', 'users.last_name', 
                'users.address', 'users.contact', 'users.email', 
                'roles.role', 'users.address', 'users.gender', 'users.status')
            ->get();
            
        return view('users.show', compact('users'));
    }

    public function edit($id)
    {
        $users = DB::table('users')
            ->join('roles', 'roles.id', '=', 'users.role_id')
            ->where('users.id', $id)
            ->select('users.id', 'users.role_id', 'users.first_name', 'users.middle_name', 'users.last_name', 
                'users.address', 'users.contact', 'users.email', 
                'roles.role', 'users.address', 'users.gender', 'users.status', 'active_status')
            ->get();

        $roles = Role::all();
            
        return view('users.edit', compact('users', 'roles'))->with('success', 'User information has successfully updated!');
    }

    public function update(Request $request, $id)
    {        

        $error = 0;

        if (preg_match('~[0-9]+~', $request['first_name'])) {
            back()->with('first_name_error', 'The first name field should not contain number.');
            $error = 1;
        }

        if (preg_match('~[0-9]+~', $request['middle_name'])) {
            back()->with('middle_name_error', 'The middle name field should not contain number.');
            $error = 1;
        }

        if (preg_match('~[0-9]+~', $request['last_name'])) {
            back()->with('last_name_error', 'The last name field should not contain number.');
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
            'first_name'    =>  'required|max:225',
            'middle_name'   =>  'nullable|max:225',
            'last_name'     =>  'required|max:225',
            'role_id'       =>  'required|numeric|min:1|max:2',
            'contact'       =>  'required|regex:/^[-0-9\+]+$/|min:11|max:13',
            'address'       =>  'nullable',
            'email'         =>  'required|email|unique:users,email,'.$id,
            'gender'        =>  'nullable',
            'status'        =>  'nullable',
            'password'           =>  'nullable|min:8|required_with:password_confirmation|confirmed',
            'password_confirmation'=>'nullable|min:8',
            'active_status' =>  'required|numeric|min:1|max:2',
        ]);

        try {
            $user = User::find($id);
            $user->role_id = $request['role_id'];
            $user->first_name = ucwords(strtolower($request['first_name']));
            $user->middle_name = ucwords(strtolower($request['middle_name']));
            $user->last_name = ucwords(strtolower($request['last_name']));
            $user->email = strtolower($request['email']);
            $user->contact = $request['contact'];
            $user->address = ucwords(strtolower($request['address']));
            $user->gender = $request['gender'];
            $user->status = $request['status'];
            $user->active_status = $request['active_status'];
    
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
