<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

class ProjectsController extends Controller
{
    
    public function find($id) {
        $project = \App\Projects::find($id);
        $title = $project->title == NULL ? "" : $project->title;
        $deadline = $project->deadline == NULL ? "" : $project->deadline;
        
        return redirect()->route('projects', ['foundProject' => ['id' => $project->id, 'title' => $title, 'deadline' => $deadline]]);
    }
    public function getID($id) {
        $project = \App\Projects::find($id);
        $projectID = $project->id;
        return redirect()->route('projects', ['projectID' => $projectID]);
    }
    public function assign($id, Request $request) {
        $employee = \App\Staff::find($request['assign-employee']);
        $employee->project_id = $id;
        $employee->save();
        return redirect(route('projects'));
    }
    public function store(Request $request){
        $date = date_create();
        date_add($date,date_interval_create_from_date_string("7 days"));
        $deadline = empty($request['pdeadline']) || preg_match('/[A-z]/i', $request['pdeadline']) ? date_format($date, "Y-m-d") : $request['pdeadline'];
        $project = new \App\Projects();
        $project->title = $request['ptitle'];
        $project->deadline = $deadline;
        if($project->title == NULL)
            return redirect(route('projects').'?add')->with('status_error', 'ERROR: Failed to create a project!');
        return ($project->save() !== 1) ? 
            redirect(route('projects'))->with('status_success', 'New project created succesfully!') : 
            redirect(route('projects'))->with('status_error', 'ERROR: Failed to create a project!');
    }
    public function delete($id){
        \App\Projects::destroy($id);
        return redirect(route('projects'));
    }
    public function update($id, Request $request){
        $project = \App\Projects::find($id);
        $project->title = $request['update-pname'];
        $project->deadline = $request['update-deadline'] == NULL ? $project->deadline : $request['update-deadline'];
        if($project->title == NULL || preg_match('/[A-z]/i', $project->deadline))
            return redirect("_5_sprint/projects/find/$id/")->with('status_error', 'ERROR: Failed to update project!');
        return ($project->save() !== 1) ? 
            redirect(route('projects'))->with('status_success', 'Project updated!') : 
            redirect(route('projects'))->with('status_error', 'ERROR: Failed to update project!');
            
    }

    public $fillable = ['title', 'deadline'];
    public function staff(){
        return $this->hasMany('App\Staff');
    }


}
