@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Your jobs</div>

                <div class="card-body">
                    
                    <table class="table">
            
            <tbody>
                
                @foreach($jobs as $job)
                <tr>
                    <td>
                @if(empty(Auth::user()->company->logo))

                        <img src="{{asset('avatar/man.jpg')}}" width="80">

        @else
        <img src="{{asset('uploads/logo')}}/{{Auth::user()->company->logo}}" width="80">


   @endif



                    </td>
                    <td>Position:{{$job->position}}
                        <br>
                        <i class="fa fa-clock-o"aria-hidden="true"></i>&nbsp;{{$job->type}}
                    </td>
                    <td><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;Address:{{$job->address}}</td>
                    <td><i class="fa fa-globe"aria-hidden="true"></i>&nbsp;Date:{{$job->created_at->diffForHumans()}}</td>
                    <td>
                        <a href="{{route('jobs.show',[$job->id,$job->slug])}}">
                            <button class="btn btn-success btn-sm"> Read </button>
                        </a>
                        <br><br>
                       <a href="{{route('job.edit',[$job->id])}}"> <button class="btn btn-primary">Edit</button></a>

                       <!-- <a href="{{route('job.delete',[$job->id])}}"> <button class="btn btn-danger">Deleteee</button></a> -->

                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal{{$job->id}}">Delete</button>


                    <div class="modal fade" id="exampleModal{{$job->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Delete Job</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div> 
                        <div class="modal-body">
                            Do you want to delete?
                        </div>
                        <form action="{{route('job.delete')}}" method="POST">@csrf
                        <div class="modal-footer">
                        <input type="hidden" name="id" value="{{$job->id}}">
                        <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">delete</button>
                        </div>
                        </form>
                    </div>
                    </div>
                    </div>

                        
                </td>
                </tr>
                @endforeach
            </tbody>
        </table>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
