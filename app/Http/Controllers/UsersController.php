<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = DB::table('users')
            ->join('roles', 'roles.id', '=', 'users.role_id')
            ->select('users.id', 'users.user_first_name', 'users.user_last_name', 'users.user_address', 'users.user_email', 'users.user_contact', 'roles.role_name')
            ->where('user_active_status', 1)
            ->get();

        // dd($users);

        if (request()->ajax())
        {
            return datatables()->of($users)
            ->addColumn('full_name', function($data) {
                $full_name = $data->user_first_name . ' ' . $data->user_last_name;
                return $full_name;
            })
            ->addColumn('action', function($data) {
                $button = '<a href="/users/'. $data->id . '" data-toggle="tooltip" title="View" class="btn btn-md btn-primary" role="button" style="margin: 2px; padding: 0 2%"><span class="glyphicon glyphicon-search"></span></a>';
                $button .= '<a href="/users/'. $data->id .'/edit
                " data-toggle="tooltip" title="Edit" class="btn btn-md btn-warning" role="button" style="margin: 2px; padding: 0 2%"><span class="glyphicon glyphicon-pencil"></span></a>';
                $button .= '<button type="button" id="'. $data->id .'" data-toggle="tooltip" title="Remove" class="btn btn-md btn-danger btn-remove" style="margin: 2px; padding: 0 2%"><span class="glyphicon glyphicon-trash"></span></button>';
                return $button;
            })
            ->rawColumns(['full_name', 'action'])
            ->make(true);
        }
        
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'user_first_name'    =>  'required',
            'user_last_name'     =>  'required',
            'user_email'         =>  'required|email|unique:users',
            'user_role_id'       =>  'required',
        ]);
        
        $user = new User();
        $user->role_id = $request['user_role_id'];
        $user->user_first_name = $request['user_first_name'];
        $user->user_middle_name = $request['user_middle_name'];
        $user->user_last_name = $request['user_last_name'];
        $user->user_email = $request['user_email'];
        $user->password = bcrypt('password');
        $user->user_contact = $request['user_contact'];
        $user->user_address = $request['user_address'];
        $user->user_gender = $request['user_gender'];
        $user->user_status = $request['user_userstatus'];
        $user->user_active_status = 1;

        if ($request->hasFile('user_image')) {
            $image = $request->file('user_image');
            $name = $image->getClientOriginalName();
            $destinationPath = public_path('/images/users');
            $image->move($destinationPath, $name);
        } else {
            $name = 'default.png';
        }

        $user->user_image = $name;
        $user->save();   

        return redirect('/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $users = DB::table('users')
            ->join('roles', 'roles.id', '=', 'users.role_id')
            ->where('users.id', $id)
            ->select('users.id', 'users.user_first_name', 'users.user_middle_name', 'users.user_last_name', 
                'users.user_address', 'users.user_image', 'users.user_contact', 'users.user_email', 
                'roles.role_name', 'users.user_address', 'users.user_gender', 'users.user_status')
            ->get();
            
        // dd($users);
        return view('users.show', compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = DB::table('users')
            ->join('roles', 'roles.id', '=', 'users.role_id')
            ->where('users.id', $id)
            ->select('users.id', 'users.role_id', 'users.user_first_name', 'users.user_middle_name', 'users.user_last_name', 
                'users.user_address', 'users.user_image', 'users.user_contact', 'users.user_email', 
                'roles.role_name', 'users.user_address', 'users.user_gender', 'users.user_status')
            ->get();

        $roles = Role::all();
            
        return view('users.edit', compact('users', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $this->validate($request, [
            'user_first_name'    =>  'required',
            'user_last_name'     =>  'required',
            'password'           =>  'nullable|required_with:password_confirmation|string|confirmed',
            'role_id'            =>  'required',
            'user_image'         =>  'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        
        $user = User::find($id);
        $user->role_id = $request['role_id'];
        $user->user_first_name = $request['user_first_name'];
        $user->user_middle_name = $request['user_middle_name'];
        $user->user_last_name = $request['user_last_name'];
        $user->user_contact = $request['user_contact'];
        $user->user_address = $request['user_address'];
        $user->user_gender = $request['user_gender'];
        $user->user_status = $request['user_status'];

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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        error_log(print_r($id));
        $user = User::find($id);
        $user->user_active_status = 0;
        $user->save();
    }
}
