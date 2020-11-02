@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-4">
           @include('admin.left-menu')
        </div>
        <div class="col-md-8">
        <div class="card">
                <div class="card-header">
                    Create a new user
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('add.admin') }}">
                @csrf
                    <div class="form-group row">
                       <div class="col-md-12">Name</div>
                            <div class="col-md-12">
                                <input id="aname" type="text" class="form-control{{ $errors->has('aname') ? ' is-invalid' : '' }}" name="aname" value="{{ old('aname') }}" required autofocus>

                                @if ($errors->has('aname'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('aname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group row">
                        <div class="col-md-12">E-Mail Address</div>

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                        <div class="col-md-12">Password</div>
                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row">
                            <div class="col-md-12">Confirm Password</div>
                            <div class="col-md-12">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row ">
                            <div class="col-md-12">
                                <input type="submit" value="Add Admin" class="btn btn-primary" py-2 px-5>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection 