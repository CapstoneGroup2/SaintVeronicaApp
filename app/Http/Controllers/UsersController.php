<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserRole;
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
        $users = User::all();
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
        $user->user_password = bcrypt($request['user_last_name'] . $request['user_first_name']);
        $user->user_contact = $request['user_contact'];
        $user->user_address = $request['user_address'];
        $user->user_gender = $request['user_gender'];
        $user->user_status = $request['user_userstatus'];
        $user->user_active_status = 1;
        $user->created_at = date('Y-m-d');
        $user->updated_at = date('Y-m-d');

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
        $users = DB::select('select * from users where id = ' . $id);
        $userRoles = DB::select('select * from user_roles where id = '. $users[0]->user_role_id);
        return view('users.show', compact('users', 'userRoles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = DB::select('select * from users where id = ' . $id);
        $userRoles = UserRole::all();  
        return view('users.edit', compact('users', 'userRoles'));
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
            'user_email'         =>  'required|email',
            'user_role_id'       =>  'required',
        ]);
        
        $user = User::find($id);

        $user->user_role_id = $request['user_role_id'];
        $user->user_first_name = $request['user_first_name'];
        $user->user_middle_name = $request['user_middle_name'];
        $user->user_last_name = $request['user_last_name'];
        $user->user_email = $request['user_email'];
        $user->user_password = bcrypt($request['user_last_name'] . $request['user_first_name']);
        $user->user_contact = $request['user_contact'];
        $user->user_address = $request['user_address'];
        $user->user_gender = $request['user_gender'];
        $user->user_status = $request['user_userstatus'];
        $user->user_active_status = 1;
        // $user->created_at = date('Y-m-d');
        $user->updated_at = date('Y-m-d');

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
        //
    }
}
