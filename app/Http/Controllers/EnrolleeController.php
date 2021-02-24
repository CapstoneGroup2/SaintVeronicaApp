<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EnrolleeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('enrollees.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('enrollees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'first-name'    =>  'required',
            'middle_name'   =>  'required',
            'last_name'     =>  'required',
            'email'         =>  'required',
            'address'       =>  'required',
            'birthdate'     =>  'required',
            'age'           =>  'required',
            'gender'        =>  'required',
            'status'        =>  'required',
        ]);
        
        $enrollee = new Enrollee();
        $enrollee->id = mt_rand( 10000000 , 19999999);
        $enrollee->enrollee_first_name = $request['first_name'];
        $enrollee->enrollee_middle_name = $request['middle_name'];
        $enrollee->enrollee_last_name = $request['last_name'];
        $enrollee->enrollee_email = $request['email'];
        $enrollee->enrollee_address = $request['address'];
        $enrollee->enrollee_gender = $request['birthdate'];
        $enrollee->enrollee_age = $request['age'];
        $enrollee->enrollee_birth_date = $request['gender'];
        $enrollee->enrollee_status = $request['status'];
        $enrollee->enrollee_active_status = 1;
        $enrollee->save();

        return redirect('/enrollees');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
