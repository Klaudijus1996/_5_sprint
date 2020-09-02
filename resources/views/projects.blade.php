@extends('layouts.master')

@section('content')

<h1>Hello again!</h1>
<br><br>
<div class="container">
    <div class="row">
        @if (isset($link))
        <div class="col-md-3">
            <form action="" method="post" autocomplete="off">
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
                <td><a class="btn btn-secondary" href="#">Edit</a> <a class="btn btn-danger" href="{{route('pdelete', $project['id'])}}">Delete</a></td>
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
                    <td><a class="btn btn-secondary" href="#">Edit</a> <a class="btn btn-danger" href="{{route('pdelete', $project['id'])}}">Delete</a></td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
    <a class='btn btn-light' href="{{$link."?add"}}">Add Project</a>
    @endif
</div>


@endsection
