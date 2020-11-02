@extends('layouts.main')

@section('content')


    <div class="site-section bg-light">
        <div class="container">
        <br><br>
            <div class="row">
            
            
        <div class="col-md-12 col-lg-8 mb-5">
            <h1>Update Password</h1>
            <form method="POST" action="{{ route('emp.register') }}">
                @csrf
                <input type="hidden" value="employer" name="user_type">
                    <div class="form-group row">
                       <div class="col-md-12">Current Password</div>
                            <div class="col-md-12">
                                <input id= required autofocus>

                            </div>
                        </div>
                        
                        <div class="form-group row">
                        <div class="col-md-12">New Password</div>

                            <div class="col-md-12">
                                 <input id= required autofocus>

                            </div>
                        </div>

                        <div class="form-group row">
                        <div class="col-md-12">Confirm Password</div>
                            <div class="col-md-12">
                                 <input id= required autofocus>


                            </div>
                        </div>


                        <div class="form-group row ">
                            <div class="col-md-12">
                                <input type="submit" value="Reset Password" class="btn btn-primary" py-2 px-5>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

@endsection
