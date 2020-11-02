<!DOCTYPE html>
<html lang="en">
  <head>
    <title>চাকরি চাই</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- favicon -->
    <link rel="icon" href="external/images/favicon.ico">

  @include('partials.head')

  <style type="text/css">
        .btn-grad {background-image: linear-gradient(to right, #ee0979 0%, #ff6a00  51%, #ee0979  100%)}
         .btn-grad {
            margin: 10px;
            padding: 7px 15px;
            text-align: center;
            transition: 0.5s;
            background-size: 200% auto;
            color: white;            
            border-radius: 5px;
            display: block;
          }

          .btn-grad:hover {
            background-position: right center; /* change the direction of the change here */
            color: #fff;
            text-decoration: none;
          }
          .grads{
            width: 200px;
            margin: 0 auto;
            padding: 7px 15px;
          }
    </style>
  </head>
  <body>
  
  @include('partials.nav')

  @include('partials.hero')

  @include('partials.category')

    <!-- <div class="site-section bg-light"> -->
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-5 mb-md-0" data-aos="fade-up" data-aos-delay="100">
            <h2 class="col-md-6 mx-auto text-center mb-5 section-heading">Recent Jobs</h2>
            <div class="rounded border jobs-wrap">
            @foreach($jobs as $job)

              <a href="{{route('jobs.show',[$job->id,$job->slug])}}" class="job-item d-block d-md-flex align-items-center  border-bottom fulltime">
                <div class="company-logo blank-logo text-center text-md-left pl-3">
                @if(!empty($job->company->logo))
                  <img src="{{asset('uploads/logo')}}/{{$job->company->logo}}" alt="Image" class="img-fluid mx-auto">
                  @else
              <img src="{{asset('avatar/man.jpg')}}" alt="Image" class="img-fluid mx-auto">
                  @endif
                </div>
                <div class="job-details h-100">
                  <div class="p-3 align-self-center">
                    <h3>{{$job->position}}</h3>
                    <div class="d-block d-lg-flex">
                    <div class="mr-3"><span class="icon-suitcase mr-1"></span> {{$job->company->cname}}</div>
                      <div class="mr-3"><span class="icon-room mr-1"></span> {{str_limit($job->address,20)}}</div>
                      <div><span class="icon-money mr-1"></span>{{$job->salary}}</div>
                    </div>
                  </div>
                </div>
                <div class="job-category align-self-center">
                @if($job->type=='fulltime')
                  <div class="p-3">
                    <span class="text-info p-2 rounded border border-info">{{$job->type}}</span>
                  </div>
                  @elseif($job->type=='parttime')
                  <div class="p-3">
                    <span class="text-warning p-2 rounded border border-warning">{{$job->type}}</span>
                  </div>
                  @endif
                </div>  
              </a>
              @endforeach
            <div class="col-md-12 text-center mt-5">
              <a href="{{route('alljobs')}}" class="btn btn-grad grads"><span class="icon-plus-circle"></span> Show More Jobs</a>
            </div>
          </div>
  
        </div>
      </div>
    </div>
<br>
<br>
    <div class="site-blocks-cover overlay inner-page" style="background-image: url('external/images/hero_2.jpg');" data-aos="fade" data-stellar-background-ratio="0.5">
<br>
<br>
      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-6 text-center" data-aos="fade">
            <h1 class="h3 mb-0">Your Dream Job</h1>
            <p class="h3 text-white mb-5">Is Waiting For You</p>
            <p><a href="/register" class="btn btn-outline-success py-3 px-4">Job seeker</a> <a href="{{route('emp.register')}}" class="btn btn-outline-warning py-3 px-4">Company</a></p>
            
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
    
    @include('partials.blog')
    
    @include('partials.footer')

  </body>
</html>