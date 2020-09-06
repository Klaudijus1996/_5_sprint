@extends('layouts.master')

@section('content')
<br><br>
<div class="container">
    @if (session('status_success'))
        <p style="color: green"><b>{{ session('status_success') }}</b></p>
    @else
        <p style="color: red"><b>{{ session('status_error') }}</b></p>
    @endif

    <div class="row">
        @if (isset($_GET['projectID'])) {{-------ASSIGN EMPLOYEE-------}}
        <div class="col-md-2">
            <form action="{{route('assign.employee', $_GET['projectID'])}}" method="post">
                @method('PUT') @csrf
                <select class="form-control" name="assign-employee" id="assign">
                    @foreach ($staff as $employee)
                    <option value="{{$employee->id}}">{{$employee->name.' '.$employee->surname}}</option>
                    @endforeach
                </select>
                <br>
                <div class="form-group">
                    <input class="btn btn-primary" type="submit" value="Assign">
                    <a style="float: right" class="btn btn-secondary" href="{{route('projects')}}">Back</a>
                </div>
            </form>
        </div>
        <div class="col-md-10">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>Id</th>
                        <th>Title</th>
                        <th>Team</th>
                        <th>Deadline</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                @foreach ($projects as $project)
                <tr>
                    <td>{{$project->id}}</td>
                    <td>{{$project->title}}</td>
                    <td>{{$project->fullname}}</td>
                    <td>{{$project->deadline}}</td>
                    <td>
                        <a class="btn btn-secondary" href="{{route('findProject', $project->id)}}">Edit</a> 
                        <a class="btn btn-danger" href="{{route('pdelete', $project->id)}}">Delete</a>
                        <a class="btn btn-danger" href="{{route('get.project.id', $project->id)}}">Assign</a>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
        @elseif (isset($link))  {{-------CREATE NEW PROJECT-------}}
        <div class="col-md-2">
            <form action="{{route('add.project')}}" method="post" autocomplete="off">
                @csrf
                <div class="form-group">
                    <label for="InputPtitle">Project Title</label>
                    <input class="form-control" id="InputPtitle" type="text" name="ptitle">
                </div>
                <div class="form-group">
                    <label for="InputPdeadline">Deadline</label>
                    <input class="form-control" id="InputPdeadline" type="text" name="pdeadline">
                </div>
                <div class="form-group">
                    <input class="btn btn-primary" type="submit" value="Create">
                    <a style="float: right" class="btn btn-secondary" href="{{route('projects')}}">Back</a>
                </div>
            </form>
        </div>
        <div class="col-md-10">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>Id</th>
                        <th>Title</th>
                        <th>Team</th>
                        <th>Deadline</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                @foreach ($projects as $project)
                <tr>
                    <td>{{$project->id}}</td>
                    <td>{{$project->title}}</td>
                    <td>{{$project->fullname}}</td>
                    <td>{{$project->deadline}}</td>
                <td>
                    <a class="btn btn-secondary" href="{{route('findProject', $project->id)}}">Edit</a> 
                    <a class="btn btn-danger" href="{{route('pdelete', $project->id)}}">Delete</a>
                    <a class="btn btn-danger" href="{{route('get.project.id', $project->id)}}">Assign</a>
                </td>
                </tr>
                @endforeach
            </table>
        </div>
        @elseif (isset($_GET['foundProject'])) {{-------EDIT PROJECT-------}}
        <div class="col-md-2">
            <form action="{{route('project.update',$_GET['foundProject']['id'])}}" method="post" autocomplete="off">
                @method('PUT') @csrf
                <div class="form-group">
                    <label for="InputFname">Title</label>
                <input class="form-control" id="InputFname" type="text" name="update-pname" value="{{$_GET['foundProject']['title']}}">
                </div>
                <div class="form-group">
                    <label for="InputLname">Deadline</label>
                    <input class="form-control" id="InputLname" type="text" name="update-deadline" value="{{$_GET['foundProject']['deadline']}}">
                </div>
                <div class="form-group">
                    <input class="btn btn-primary" type="submit" value="Submit">
                    <a style="float: right" class="btn btn-secondary" href="{{route('projects')}}">Back</a>
                </div>
            </form>
        </div>
        <div class="col-md-10">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>Id</th>
                        <th>Title</th>
                        <th>Team</th>
                        <th>Deadline</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                @foreach ($projects as $project)
                <tr>
                    <td>{{$project->id}}</td>
                    <td>{{$project->title}}</td>
                    <td>{{$project->fullname}}</td>
                    <td>{{$project->deadline}}</td>
                <td>
                    <a class="btn btn-secondary" href="{{route('findProject', $project->id)}}">Edit</a> 
                    <a class="btn btn-danger" href="{{route('pdelete', $project->id)}}">Delete</a>
                    <a class="btn btn-danger" href="{{route('get.project.id', $project->id)}}">Assign</a>
                </td>
                </tr>
                @endforeach
            </table>
        </div>
        @else {{-------READ PROJECTS TABLE-------}}
        <div class="col-md-12">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>Id</th>
                        <th>Title</th>
                        <th>Team</th>
                        <th>Deadline</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                @foreach ($projects as $project)
                <tr>
                    <td>{{$project->id}}</td>
                    <td>{{$project->title}}</td>
                    <td>{{$project->fullname}}</td>
                    <td>{{$project->deadline}}</td>
                    <td>
                        <a class="btn btn-secondary" href="{{route('findProject', $project->id)}}">Edit</a> 
                        <a class="btn btn-danger" href="{{route('pdelete', $project->id)}}">Delete</a>
                        <a class="btn btn-danger" href="{{route('get.project.id', $project->id)}}">Assign Employee</a>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
    <a class='btn btn-light' href="{{$link."?add"}}">Add Project</a>
    @endif
</div>

@endsection
