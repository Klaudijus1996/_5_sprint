<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function show() {
        $link = preg_match('/\?/i', $_SERVER['REQUEST_URI']) ? preg_replace('/\?.../i', '', $_SERVER['REQUEST_URI']) : NULL ;
        return view('projects', ['projects' => \App\Projects::all(), 'link' => $link]);
    }
    public function add(Request $request){
        // $this->validate($request, [
        //     // [Dėmesio] validacijoje unique turi būti nurodytas teisingas lentelės pavadinimas!
        //     // galime pažiūrėti, kas bus jei bus neteisingas
        //        'name' => 'required',
        //        'surname' => 'required'
        //    ]);   
        $project = new \App\Projects();
        $project->title = $request['ptitle'];
        $project->deadline = $request['pdeadline'];
        $project->save();
        return redirect(route('projects'));
        //  ($employee->save() !== 1) ? 
        //     redirect(route('home'))->with('status_succereturnss', 'New employee added!') : 
        //     redirect(route('home'))->with('status_error', 'Employee couldn\' be added!');
    }
}
