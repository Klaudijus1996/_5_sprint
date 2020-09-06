<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function show() {
        $link = preg_match('/\?add/i', $_SERVER['REQUEST_URI']) ? preg_replace('/\?add/i', '', $_SERVER['REQUEST_URI']) : NULL ;
        return view('welcome', ['staff' => \App\Staff::all(), 'projects' => \App\Projects::all(), 'link' => $link]);
    }
    public function find($id) {
        $employee = \App\Staff::find($id);
        $name = $employee->name == NULL ? "" : $employee->name;
        $surname = $employee->surname == NULL ? "" : $employee->surname;
        $job_description = $employee->job_description == NULL ? "" : $employee->job_description;
        return redirect()->route('home', ['foundEmployee' => ['id' => $employee->id, 'name' => $name, 'surname' => $surname, 'job_des' => $job_description]]);
    }
    public function add(Request $request){
        $employee = new \App\Staff();
        $employee->name = $request['fname'];
        $employee->surname = $request['lname'];
        $employee->job_description = $request['job_des'];
        $employee->project_id = $request['project-id'];
        if ($employee->name == NULL || $employee->surname == NULL)
        return redirect(route('home').'?add')->with('status_error', 'ERROR: Failed to add employee!');
        return ($employee->save() !== 1) ? 
            redirect(route('home'))->with('status_success', 'New employee added!') : 
            redirect(route('home'))->with('status_error', 'ERROR: Failed to add employee!');
    }
    public function delete($id){
        \App\Staff::destroy($id);
        return redirect(route('home'));
    }
    public function update($id, Request $request){
        $employee = \App\Staff::find($id);
        $employee->name = $request['ufname'];
        $employee->surname = $request['ulname'];
        $employee->job_description = $request['ujob_des'];
        $employee->project_id = $request['uproject-id'];
        if ($employee->name == NULL || $employee->surname == NULL)
        return redirect("_5_sprint/find/{$id}/")->with('status_error', 'ERROR: Failed to update information!');
        return ($employee->save() !== 1) ? 
            redirect(route('home'))->with('status_success', 'Information updated!') : 
            redirect(route('home'))->with('status_error', 'ERROR: Failed to update information!');
    }
    public $fillable = ['name', 'surname', 'job_description', 'project_id'];
    public function projects(){
        return $this->belongsTo('App\Project');
    }
}
