@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">

<div class="col-md-12">
    <div class="card">
            <div class="card-header">Seeker Information</div>
                <div class="card-body">
                    <p>Name : {{$user->name}}</p>
                    <p>Email : {{$user->email}}</p>
                    <p>Address : {{$user->profile->address}}</p>
                    <p>Phone : {{$user->profile->phone_number}}</p>
                    <p>Gender : {{$user->profile->gender}}</p>
                    <p>Experience : {{$user->profile->experience}}</p>
                    <p>Qualification : {{$user->profile->bio}}</p>
                    <p>Member On : {{date('F d Y',strtotime($user->created_at))}}</p>
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