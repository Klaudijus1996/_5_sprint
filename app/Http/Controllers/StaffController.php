<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function show() {
        $link = preg_match('/\?/i', $_SERVER['REQUEST_URI']) ? preg_replace('/\?.../i', '', $_SERVER['REQUEST_URI']) : NULL ;
        return view('welcome', ['staff' => \App\Staff::all(), 'link' => $link]);
    }
    public function add(Request $request){
        // $this->validate($request, [
        //     // [Dėmesio] validacijoje unique turi būti nurodytas teisingas lentelės pavadinimas!
        //     // galime pažiūrėti, kas bus jei bus neteisingas
        //        'name' => 'required',
        //        'surname' => 'required'
        //    ]);   
        $employee = new \App\Staff();
        $employee->name = $request['fname'];
        $employee->surname = $request['lname'];
        $employee->job_description = $request['job_des'];
        $employee->save();
        return redirect(route('home'));
        //  ($employee->save() !== 1) ? 
        //     redirect(route('home'))->with('status_succereturnss', 'New employee added!') : 
        //     redirect(route('home'))->with('status_error', 'Employee couldn\' be added!');
    }
}
