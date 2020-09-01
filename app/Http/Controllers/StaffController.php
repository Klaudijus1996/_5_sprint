<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function show() {
        $link = preg_match('/\?/i', $_SERVER['REQUEST_URI']) ? preg_replace('/\?.../i', '', $_SERVER['REQUEST_URI']) : NULL ;
        return view('welcome', ['staff' => \App\Staff::all(), 'link' => $link]);
    }
}
