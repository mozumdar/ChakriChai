@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">

<div class="col-md-12">
    <div class="card">
            <div class="card-header">Your Information</div>
                <div class="card-body">
                    <p>Name : {{Auth::user()->name}}</p>
                    <p>Email : {{Auth::user()->email}}</p>
                    <p>Address : {{Auth::user()->profile->address}}</p>
                    <p>Phone : {{Auth::user()->profile->phone_number}}</p>
                    <p>Gender : {{Auth::user()->profile->gender}}</p>
                    <p>Experience : {{Auth::user()->profile->experience}}</p>
                    <p>Qualification : {{Auth::user()->profile->bio}}</p>
                    <p>Member On : {{date('F d Y',strtotime(Auth::user()->created_at))}}</p>

                    @if(!empty(Auth::user()->profile->cover_letter))
                        <p><a href="{{Storage::url(
                            Auth::user()->profile->cover_letter)}}" 
                            target="_blank">Cover letter</a></p>
                    @else
                        <p>Please upload cover letter</p>
                    @endif

                    
                    @if(!empty(Auth::user()->profile->resume))
                        <p><a href="{{Storage::url(
                            Auth::user()->profile->resume)}}" 
                            target="_blank">Resume</a></p>
                    @else
                        <p>Please upload Resume</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- 
    Mahmudul Hasan Mozumdar
    Id. 161-115-019
    Md. Abu. Salek Khan
    Id. 161-115-009
    -->

@endsection