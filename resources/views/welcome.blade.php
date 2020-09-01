@extends('layouts.master')

@section('content')

<h1>Hello!</h1>
<br><br>
<div class="container">
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Surname</th>
                <th>Job Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        @foreach ($staff as $employee)
        <tr>
            <td>{{$employee['id']}}</td>
            <td>{{$employee['name']}}</td>
            <td>{{$employee['surname']}}</td>
            <td>{{$employee['job_description']}}</td>
            <td><a class="btn btn-secondary" href="#">Edit</a> <a class="btn btn-danger" href="#">Delete</a></td>
        </tr>
        @endforeach
    </table>
    <a class='btn btn-light' href="#">Add Employee</a>
</div>


@endsection
