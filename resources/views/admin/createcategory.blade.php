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
                    Create a new category
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('store.category') }}">
                @csrf
                    <div class="form-group row">
                       <div class="col-md-12">Category Name</div>
                            <div class="col-md-12">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row ">
                            <div class="col-md-12">
                                <input type="submit" value="Add Category" class="btn btn-primary" py-2 px-5>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection 