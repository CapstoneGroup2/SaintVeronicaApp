<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Announcement;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class AnnouncementsController extends Controller
{
    public function index()
    {
        $announcements = Announcement::orderBy('updated_at', 'desc')->get();
        return view('announcements.index', compact('announcements'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'announcement_title'          =>  'required',
            'announcement_message'        =>  'required',
        ]);

        $announcement = new Announcement();
        $announcement->announcement_title = $request['announcement_title'];
        $announcement->announcement_message = $request['announcement_message'];
        $announcement->is_approved = 1;
        $announcement->date_approved = date('Y-m-d H:i:s');
        $announcement->save();

        return redirect('/announcements');
    }

    public function edit($id)    
    {
        $announcement = Announcement::find($id);
        return view('announcements.edit', compact('announcement'));
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
        $this->validate($request, [
            'announcement_title'          =>  'required',
            'announcement_message'        =>  'required',
        ]);

        $announcement = Announcement::find($id);
        $announcement->announcement_title = $request['announcement_title'];
        $announcement->announcement_message = $request['announcement_message'];
        $announcement->save();

        return redirect('/announcements');
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
