<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function show() {
        return view('welcome', ['staff' => \App\Staff::all()]);
    }
}