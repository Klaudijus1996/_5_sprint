@extends('layouts.master')

@section('content')

<h1>Hello!</h1>
<br><br>
<div class="container">
    <div class="row">
        @if (isset($link))
        <div class="col-md-3">
            <form action="" method="post" autocomplete="off">
                @csrf
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
                    <input class="form-control" id="InputJob-description" type="text" name="job_des">
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
                <td><a class="btn btn-secondary" href="{{route('findEmployee', $employee['id'])}}">Edit</a> <a class="btn btn-danger" href="{{route('edelete', $employee['id'])}}">Delete</a></td>
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
                    <td><a class="btn btn-secondary" href="{{route('findEmployee', $employee['id'])}}">Edit</a> <a class="btn btn-danger" href="{{route('edelete', $employee['id'])}}">Delete</a></td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
    <a class='btn btn-light' href="{{$link."?add"}}">Add Employee</a>
    @endif
</div>
@if (isset($_GET['foundEmployee']))
<div class="col-md-3">
    <form action="{{route('employee.update',$_GET['foundEmployee']['id'])}}" method="post" autocomplete="off">
        @method('PUT') @csrf
        <div class="form-group">
            <label for="InputFname">First Name</label>
        <input class="form-control" id="InputFname" type="text" name="ufname" value="{{$_GET['foundEmployee']['name']}}">
        </div>
        <div class="form-group">
            <label for="InputLname">Last Name</label>
            <input class="form-control" id="InputLname" type="text" name="ulname" value="{{$_GET['foundEmployee']['surname']}}">
        </div>
        <div class="form-group">
            <label for="InputJob-description">Job Description</label>
            <input class="form-control" id="InputJob-description" type="text" name="ujob_des" value="{{$_GET['foundEmployee']['job_des']}}">
        </div>
        <div class="form-group">
            <input class="btn btn-primary" type="submit" value="Submit">
            <a style="float: right" class="btn btn-secondary" href="{{route('home')}}">Back</a>
        </div>
    </form>
</div>
@endif


@endsection
