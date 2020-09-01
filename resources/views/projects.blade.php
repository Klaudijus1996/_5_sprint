@extends('layouts.master')

@section('content')

<h1>Hello again!</h1>
<br><br>
<div class="container">
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
<h1>{{ $link = preg_match('/\?/i', $_SERVER['REQUEST_URI']) ? "Rado" : "Nerado" }}</h1>
<a class='btn btn-light' href="{{$_SERVER['REQUEST_URI']."?add"}}">Add Project</a>
</div>


@endsection
