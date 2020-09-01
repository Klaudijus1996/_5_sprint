@extends('layouts.master')

@section('content')

<h1>Hello again!</h1>
<br><br>
<div class="container">
    <div class="row">
        @if (isset($link))
        <div class="col-md-3">
            <form action="" method="post" autocomplete="off">
                <div class="form-group">
                    <label for="InputFname">First Name</label>
                    <input class="form-control" id="InputFname" type="text" name="fname">
                </div>
                <div class="form-group">
                    <label for="InputLname">Second Name</label>
                    <input class="form-control" id="InputLname" type="text" name="lname">
                </div>
                <div class="form-group">
                    <input class="btn btn-primary" type="submit" value="Add">
                    <a style="float: right" class="btn btn-secondary" href="{{route('projects')}}">Back</a>
                </div>
            </form>
        </div>
        <div style="margin-left: auto;
        margin-right: auto" class="col-md-9">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>Id</th>
                        <th>Title</th>
                        <th>Deadline</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                @foreach ($projects as $project)
                <tr>
                    <td>{{$project['id']}}</td>
                    <td>{{$project['title']}}</td>
                    <td>{{$project['deadline']}}</td>
                    <td><a class="btn btn-secondary" href="#">Edit</a> <a class="btn btn-danger" href="#">Delete</a></td>
                </tr>
                @endforeach
            </table>
        </div>
        @else
        <div class="col-md-12">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>Id</th>
                        <th>Title</th>
                        <th>Deadline</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                @foreach ($projects as $project)
                <tr>
                    <td>{{$project['id']}}</td>
                    <td>{{$project['title']}}</td>
                    <td>{{$project['deadline']}}</td>
                    <td><a class="btn btn-secondary" href="#">Edit</a> <a class="btn btn-danger" href="#">Delete</a></td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
    <a class='btn btn-light' href="{{$link."?add"}}">Add Project</a>
    @endif
</div>


@endsection
