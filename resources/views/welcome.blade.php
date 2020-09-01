@extends('layouts.master')

@section('content')

<h1>Hello!</h1>
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
                    <label for="InputLname">Last Name</label>
                    <input class="form-control" id="InputLname" type="text" name="lname">
                </div>
                <div class="form-group">
                    <label for="InputJob-description">Job Description</label>
                    <input class="form-control" id="InputJob-description" type="text">
                </div>
                <div class="form-group">
                    <input class="btn btn-primary" type="submit" value="Create">
                    <a style="float: right" class="btn btn-secondary" href="{{$link}}">Back</a>
                </div>
            </form>
        </div>
        <div style="margin-left: auto;
        margin-right: auto" class="col-md-9">
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
        </div>
        @else
        <div class="col-md-12">
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
        </div>
    </div>
    <a class='btn btn-light' href="{{$link."?add"}}">Add Employee</a>
    @endif
</div>


@endsection
