<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index() {
        return view('pages.index');
    }
    
    public function enrollees() {
        return view('pages.enrollees');
    }
    
    public function payments() {
        return view('pages.payments');
    }

}
