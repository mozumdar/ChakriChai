@extends('layouts.main')
@section('content')
   <div class="album text-muted">
     <div class="container">

          <br><br><br><br><br><br>
     
      <div class="row" >
          <div class="title" style="margin-top: 20px;">
                
                
            <div class="col-lg-8">
            <div class="p-4 mb-8 bg-white">
              <!-- icon-book mr-3-->
              <h2>{{$post->title}}</h2> 
              <img src="{{asset('uploads/image/'.$post->image)}}" style="width: 30%;">
              <p>{{$post->content}}</p>
            </div>
          </div>


          </div>

   
        </div>
    </div>
</div>
@endsection
