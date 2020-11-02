@extends('layouts.app')

@section('content')
<div class="container">
<div class="row justify-content-center">
        <div class="col-md-8">
        <div class="card">
            <div class="card-header">Create a job</div>
            <div class="card-body">
            <form action="{{route('job.store')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" name="title"  class="form-control @error('title') is-invalid @enderror"  value="{{ old('title') }}"  >
                @error('title')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="description">Job Descriptions:</label>
                <textarea name="description"  class="form-control @error('description') is-invalid @enderror"  >{{ old('description') }}</textarea>
                @error('description')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="role">Job Responsibilities:</label>
                <textarea name="roles" class="form-control @error('roles') is-invalid @enderror"  >{{ old('roles') }}</textarea>
                @error('roles')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="category">Category:</label>
                <select name="category" class="form-control">
                    @foreach(App\Category::all() as $cat)
                        <option value="{{$cat->id}}">{{$cat->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="position">Position:</label>
                <input type="text" name="position" class="form-control @error('position') is-invalid @enderror"  value="{{ old('position') }}">
                @error('position')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="qualification">Qualification:</label>
                <input type="text" name="qualification" class="form-control @error('qualification') is-invalid @enderror"  value="{{ old('qualification') }}">
                @error('qualification')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="vacancy">Vacancy:</label>
                <input type="text" name="vacancy" class="form-control @error('vacancy') is-invalid @enderror"  value="{{ old('vacancy') }}">
                @error('vacancy')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>


            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" name="address" class="form-control @error('address') is-invalid @enderror"  value="{{ old('address') }}">
                @error('address')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="experience">Year of experience:</label>
                <input type="text" name="experience" class="form-control{{ $errors->has('experience') ? ' is-invalid' : '' }}"  value="{{ old('experience') }}">
                @if ($errors->has('experience'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('experience') }}</strong>
                </span>
                 @endif
            </div>

            <div class="form-group">
                <label for="type">Type:</label>
                <select class="form-control" name="type">
                    <option value="fulltime">Fulltime</option>
                    <option value="parttime">Parttime</option>

                </select>
            </div>

            <div class="form-group">
                <label for="status">Status:</label>
                <select class="form-control" name="status">
                    <option value="1">live</option>
                    <option value="0">draft</option>
                </select>
            </div>

            <div class="form-group">
                <label for="type">Salary:</label>
                <input type="text" name="salary" class="form-control @error('salary') is-invalid @enderror"  value="{{ old('salary') }}">
                @error('salary')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                @enderror 
               
            </div>

            <div class="form-group">
                <label for="last_date">Deadline:</label>
                <input type="text" id="datepicker" name="last_date" class="form-control @error('last_date') is-invalid @enderror"  value="{{ old('last_date') }}" autocomplete="off">
                @error('last_date')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
              <button type="submit" class="btn btn-success">Submit</button>
            </div>
            @if(Session::has('message'))
                <div class="alert alert-success">
                    {{Session::get('message')}}
                </div>
            @endif
            
            </div>
            </form>
        </div>
        </div>
    </div>
</div>
@endsection
