@extends('layouts.main')
@section('content')
   <div class="album text-muted">
     <div class="container">
     <br><br><br><br>
       <div class="row" id="app">
          <div class="title" style="margin-top: 20px;">
                <h2></h2> 
          </div>

          <div class="col-lg-12"> 
            <div class="p-4 mb-8 bg-white">
            @if(empty($company->logo))
                    <img src="{{asset('avatar/man.jpg')}}" width="300" height="300" />
                @else   
                    <img src="{{asset('uploads/logo')}}/{{$company->logo}}" width="300" height="300" />
                 @endif

                    <h1>{{$company->cname}}</h1>
                    <h3>{{$company->slogan}}</h3>
                    <p>
                    <strong>Address</strong>-{{$company->address}}&nbsp;
                    <strong>Phone</strong>-{{$company->phone}}&nbsp;
                    Website<a href="{{$company->website}}" target="_blank">-{{$company->website}}</a>&nbsp;
                    </p>
                    <p>{{$company->description}}</p>

                    <h4><a href="{{Storage::url($company->notice)}}" target="_blank">Notice</a></h4>
            </div>
           
            <div class="table">
                <table>
                    <tbody>
                    @foreach($company->jobs as $job)
                    <tr>
                        <td><img src="{{asset('avatar/man.jpg')}}" width="80"/></td>
                        <td>Position:{{$job->position}}<br><i class="fa fa-clock-o" aria-hidden="true"></i>&nbsp;{{$job->type}}</td>
                        <td><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;Address:{{$job->address}}</td>
                        <td><i class="fa fa-globe" aria-hidden="true"></i>&nbsp;Date:{{$job->created_at->diffForHumans()}}</td>
                        <!-- <td><a href="{{route('jobs.show',[$job->id,$job->slug])}}">
                        <button class="btn btn-success btn-sm">
                        Apply
                        </button></a></td> -->
                        @if(!Auth::check())
                  <td><a type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal">
                  Login To Apply   
                  </a></td>
                    </tr>
                    @endif
                    @endforeach
                    </tbody>
                </table>
          </div>
     </div>
   </div>
</div>
@endsection
