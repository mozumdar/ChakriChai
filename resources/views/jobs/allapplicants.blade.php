@extends('layouts.app')

@section('content')
<div style="background-color: #DAE9EE" class="container-fluid">
    <h1 class="row justify-content-center">Applicants From allapplication blade</h1>
    <div class="row">
        <div class="col-md-5">       
            @foreach($user_id as $users)
            <div class="card">
                <div>       
                    <table class="table" style="width: 100%;">
                        <tbody>
                            <tr>
                                <td>User Id : {{$users->id }}</td>
                                <td>User Name: {{$users->name }}</td>
                                <td><a href="#"><button class="btn btn-primary">Resume</button></a></td>
                                <td><a href="#"><button class="btn btn-success">Cover letter</button></a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div> 
           @endforeach
        </div>
        <div class="col-md-7">       
            @foreach($applications as $applicants)
            <div class="card">
                <div>       
                    <table class="table" style="width: 100%;">
                        <tbody>
                            <tr>
                                <td>User Id : {{ $applicants->user_id }}</td>
                                <td>User Id : {{ $applicants->user_id }}</td>
                                <td>Company Id: {{ $applicants->company_id }}</td>
                                <td>Company Name: {{ $applicants->company_name }}</td>
                                <td><a href="#"><button class="btn btn-success">Pending</button></a></td>
                                <td><a href="#"><button class="btn btn-danger">Delete</button></a></td>
                                <td><a href="https://mail.google.com/mail/u/0/#inbox?compose=new" target="_blank"><button class="btn btn-primary">Mail</button></a>
                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div> 
           @endforeach
        </div>
    </div>
    
</div>
@endsection
