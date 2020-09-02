<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function show() {
        $link = preg_match('/\?add/i', $_SERVER['REQUEST_URI']) ? preg_replace('/\?add/i', '', $_SERVER['REQUEST_URI']) : NULL ;
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
    public function delete($id){
        \App\Staff::destroy($id);
        return redirect(route('home'));
    }
    public function update($id, Request $request){
        // [Dėmesio] validacijoje unique turi būti nurodytas teisingas lentelės pavadinimas!
        // galime pažiūrėti, kas bus jei bus neteisingas
        // $this->validate($request, [
        //     'title' => 'required|unique:blogposts,title|max:5',
        //     'text' => 'required',
        // ]);
        $employee = \App\Staff::find($id);
        $employee->name = $request['ufname'];
        $employee->surname = $request['ulname'];
        $employee->job_description = $request['ujob_des'];
        $employee->save();
        return redirect(route('home'));
        // return ($bp->save() !== 1) ? 
        //     redirect('/posts/'.$id)->with('status_success', 'Post updated!') : 
        //     redirect('/posts/'.$id)->with('status_error', 'Post was not updated!');
        //     }
    }
}
