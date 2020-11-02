@extends('layouts.main')
@section('content')
<br><br><br><br><br><br>
<div class="container">
    <h2>Companies</h2>
    <div class="row">
    @foreach($companies as $company)
        <div class="col-md-3">
            <div class="card" style="width: 18rem;">
                @if(empty($company->logo))
                    <img src="{{asset('avatar/man.jpg')}}" class="card-img-top" width="100" />
                @else   
                    <img src="{{asset('uploads/logo')}}/{{$company->logo}}" class="card-img-top" width="100" />
                @endif
                <div class="card-body">
                    <h5 class="card-title text-center">{{$company->cname}}</h5>
                    
                   <center><a href="{{route('company.index',[$company->id,$company->slug])}}" class="btn btn-primary">View</a></center>
                   <br>
                   <center><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal2{{$company->id}}">Delete</button></center> 

                   <div class="modal fade" id="exampleModal2{{$company->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Delete Company</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Do you want to delete?
                        </div>
                        <form action="{{route('company.delete')}}" method="POST">@csrf
                        <div class="modal-footer">
                        <input type="hidden" name="id" value="{{$company->id}}">
                        <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">delete</button>
                        </div>
                        </form>
                    </div>
                    </div>
                    </div>

                   <!-- <a href="{{route('company.delete',[$company->id])}}" class="btn btn-danger">Delete</a>  -->
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <br><br>
{{$companies->appends(Illuminate\Support\Facades\Input::except('page'))->links()}}
</div>
<br><br><br><br>
@endsection