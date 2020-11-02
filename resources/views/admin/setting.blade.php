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
                   Edit Site Setting
                </div>
                <div class="card-body">
                    <form action="{{ route('settings.update') }}" method="post" enctype="multipart/form-data">
                    @csrf  
                        <div class="form-group">
                            <label>About</label>
                            <textarea type="text" name="about" class="form-control @error('content') is-invalid @enderror" >{{$settings->about}}</textarea>
                            @error('content')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Contact Number</label>
                            <input type="text" name="contact_number" class="form-control @error('title') is-invalid @enderror" value="{{$settings->contact_number}}">
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Contact Email</label>
                            <input type="text" name="contact_email" class="form-control @error('title') is-invalid @enderror" value="{{$settings->contact_email}}">
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection