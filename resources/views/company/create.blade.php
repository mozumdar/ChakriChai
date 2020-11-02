@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
        @if(empty(Auth::user()->company->logo))
            <img src="{{asset('avatar/man.jpg')}}" width="100" style="width: 100%;"/>
        @else   
            <img src="{{asset('uploads/logo')}}/{{Auth::user()->company->logo}}" width="100" style="width: 100%;" />
        @endif
            <br><br>

            <form action="{{route('company.logo')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card">
            <div class="card-header">Update Logo</div>
                <div class="card-body">
                    <input type="file" class="form-control" name="logo">
                    <br><button type="submit" class="btn btn-success">Update</button>
                    @if($errors->has('logo'))
                        <div class="error" style="color: red;">{{$errors->first('logo')}}</div>
                    @endif
                </div>
            </div>
            </form>

        </div>
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">Update Your Company Information</div>
                <form action="{{route('company.store')}}" method="post">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="">Address</label>
                        <input type="text" name="address" class="form-control" value="{{Auth::user()->company->address}}"/>
                        @if($errors->has('address'))
                            <div class="error" style="color: red;">{{$errors->first('address')}}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="">Phone</label>
                        <input type="text" name="phone" class="form-control" value="{{Auth::user()->company->phone}}"/>
                        @if($errors->has('phone'))
                            <div class="error" style="color: red;">{{$errors->first('phone')}}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="">Website</label>
                        <input type="text" name="website" class="form-control" value="{{Auth::user()->company->website}}"/>
                    </div>
                    <div class="form-group">
                        <label for="">Slogan</label>
                        <input type="text" name="slogan" class="form-control" value="{{Auth::user()->company->slogan}}"/>
                    </div>
                    <div class="form-group">
                        <label for="">Description</label>
                        <textarea name="description" class="form-control">{{Auth::user()->company->description}}</textarea>
                        @if($errors->has('description'))
                            <div class="error" style="color: red;">{{$errors->first('description')}}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </div>
                @if(Session::has('message'))
                <div class="alert alert-success">
                    {{Session::get('message')}}
                </div>
                @endif
            </div>
        </div>
        </form>
        <div class="col-md-4">
            <div class="card">
            <div class="card-header">About your company</div>
                <div class="card-body">
                    <p> Name: {{Auth::user()->company->cname}}</p>
                    <p> Address: {{Auth::user()->company->address}}</p>
                    <p> Phone: {{Auth::user()->company->phone}}</p>
                    <p> Website:<a href="{{Auth::user()->company->website}}" target="_blank">{{Auth::user()->company->website}}</a></p>
                    <p> Slogan:{{Auth::user()->company->slogan}}</p>
                    <p> Company Page:<a href="company/{{Auth::user()->company->slug}}">View</a></p>
                    <p> Change Password:<a href="{{route('company.change')}}">Click</a></p>
                </div>
            </div>

            <form action="{{route('notice')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card">
            <div class="card-header">Update Notice</div>
                <div class="card-body">
                    <input type="file" class="form-control" name="notice">
                    <br><button type="submit" class="btn btn-success">Update</button>
                    @if($errors->has('notice'))
                        <div class="error" style="color: red;">{{$errors->first('notice')}}</div>
                    @endif
                </div>
            </div>
            </form>
         
        </div>
        </div>
    </div>
</div>
@endsection
