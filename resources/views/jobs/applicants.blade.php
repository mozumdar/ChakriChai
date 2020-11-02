@extends('layouts.app')

@section('content')
<div style="background-color: #DAE9EE" class="container-fluid">
    <h1 class="row justify-content-center">Applicants</h1>
    <h1><a href="{{ route('selected.applicant')}}" class="text-success">Publish Result</a></h1>
    <div class="row justify-content-center">
        <div class="col-md-12">       
            @foreach($applications as $applicants)
            <div class="card">
                <div>       
                    <table class="table" style="width: 100%;">
                        <tbody>
                            <tr>
                                <td>
                                    <a href="{{ route('see.profile',[$applicants->user_id])}}"><img src="{{asset('uploads/avatar')}}/{{$applicants->user_avatar}}" width="80"></a>
                                </td>
                                <td>
                                    Applied on: {{ date('F d, Y', strtotime($applicants->created_at)) }}
                                </td>
                                <td>Applicant Id : {{ $applicants->id }}</td>
                                <td>Name: {{ $applicants->user_name }}</td>
                                <td>Email: {{ $applicants->user_email }}</td>
                                <td>Phone: {{ $applicants->user_phone }}</td>
                                <td><a href="{{Storage::url($applicants->user_resume)}}">Resume</a></td>
                                <td><a href="{{Storage::url($applicants->user_coverletter)}}">Cover letter</a></td>

                                <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal1{{$applicants->id}}">Select</button>


                                    <div class="modal fade" id="exampleModal1{{$applicants->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel1">Select Applicant</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                </div>
                        <div class="modal-body">
                            Do you want to Select?
                        </div>
                        <form action="{{route('applicant.select')}}" method="POST">@csrf
                        <div class="modal-footer">
                        <input type="hidden" name="id" value="{{ $applicants->id }}">
                        <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">select</button>
                    </div>
                    </form>
                    </div>
                    </div>
                    </div>
                                
                                </td>

                                <td>   
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal{{$applicants->id}}">Delete</button>


                                    <div class="modal fade" id="exampleModal{{$applicants->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Delete Applicant</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Do you want to delete?
                                        </div>
                                        <form action="{{route('applicants.delete')}}" method="POST">@csrf
                                        <div class="modal-footer">
                                            <input type="hidden" name="id" value="{{ $applicants->id }}">
                                            <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-danger">delete</button>
                                        </div>
                                        </form>
                                        </div>
                                        </div>
                                        </div>
                                </td>
                                <td><a href="https://mail.google.com/mail/u/0/#inbox?compose=new" target="_blank"><button class="btn btn-success">Mail</button></a>
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
