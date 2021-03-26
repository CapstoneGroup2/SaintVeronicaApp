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
            ->get();

        if (request()->ajax())
        {
            return datatables()->of($users)
            ->addColumn('full_name', function($data) {
                $full_name = $data->user_first_name . ' ' . $data->user_middle_name . ' ' . $data->user_last_name;
                return $full_name;
            })
            ->addColumn('action', function($data) {
                $button = '<a href="/users/'. $data->id . '" data-toggle="tooltip" title="View" class="btn btn-md btn-primary" role="button" style="margin: 2px; padding: 0 2%"><span class="glyphicon glyphicon-search"></span></a>';
                $button .= '<a href="/users/'. $data->id .'/
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
        $userRoles = UserRole::all();
        return view('users.create', ['userRoles' => $userRoles]);
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
        $user->user_role_id = $request['user_role_id'];
        $user->user_first_name = $request['user_first_name'];
        $user->user_middle_name = $request['user_middle_name'];
        $user->user_last_name = $request['user_last_name'];
        $user->user_email = $request['user_email'];
        $user->password = bcrypt($request['user_last_name'] . $request['user_first_name']);
        $user->user_contact = $request['user_contact'];
        $user->user_address = $request['user_address'];
        $user->user_gender = $request['user_gender'];
        $user->user_status = $request['user_userstatus'];
        $user->user_active_status = 1;
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
            ->get();
            
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
        $user = User::find($id);
        $user->user_active_status = 0;
        $user->save();
    }
}
