@extends('user.components.main')
@section('content')
     <!-- start banner Area -->
     <section class="banner-area relative" id="home">	
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="about-content col-lg-12">
                    <h1 class="text-white">
                        About Us		
                    </h1>	
                    <p class="text-white link-nav"><a href="{{route('index')}}">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href=""> About </a></p>
                </div>											
            </div>
        </div>
    </section>

<section class="service-area section-gap" id="service">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-8 pb-40 header-text">
                <h1>Why Choose Us</h1>
                <p>
                    Who are in extremely love with eco friendly system.
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="single-service">
                    <h4><span class="lnr lnr-user"></span>For Job Seekers</h4>
                    <p>
                        Helping people get jobs by informing jobs alrets to the job seekers and make them save time and reduce cost to seek jobs.
                    </p>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="single-service">
                    <h4><span class="lnr lnr-license"></span>For Company</h4>
                    <p>
                        Deliveiring advanced online recruitment platform, 
                        aimed at helping organizations digitize their recruitment function,
                         save time and reduce cost to hire.
                    </p>								
                </div>
            </div>
            {{-- <div class="col-lg-6 col-md-6">
                <div class="single-service">
                    <h4><span class="lnr lnr-phone"></span>Great Support</h4>
                    <p>
                        Usage of the Internet is becoming more common due to rapid advancement of technology and power.
                    </p>								
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="single-service">
                    <h4><span class="lnr lnr-rocket"></span>Technical Skills</h4>
                    <p>
                        Usage of the Internet is becoming more common due to rapid advancement of technology and power.
                    </p>				
                </div> --}}
            {{-- </div> --}}
           		
        </div>
    </div>	
</section>
<section class="callto-action-area section-gap" id="join">
   <div class="container">
       <div class="row d-flex justify-content-center">
           <div class="menu-content col-lg-9">
               <div class="title text-center">
                   <h1 class="mb-10 text-white">Join us today without any hesitation</h1>
                   <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore  et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
                   <a class="primary-btn" href="#">I am a Candidate</a>
                   <a class="primary-btn" href="#">Request Free Demo</a>
               </div>
           </div>
       </div>	
   </div>	
</section>
<div class="modal fade" id="apply">
   <div class="modal-dialog modal-dialog-centered">
       <div class="modal-content rounded-1">
           <div class="modal-body">
               <div class="d-flex justify-content-between">
                   <h4>Upload Your Resume</h4>
                   <button class="close" data-dismiss="modal">&times;</button>
               </div>
              @if (Auth::check())
              <form action="{{ route('resume_upload',Auth::guard('employee')->user()->id) }}" class="px-3" method="POST" enctype="multipart/form-data"> 
             @method('PUT')
               @csrf
               @if ($errors->has('resume'))
                   <p class="mb-3 text-danger">{{ $errors->first('resume') }}</p>
               @endif
            <div class="form-group">
               <input type="hidden" id="jobId" name="jobId" >
                   <label for="" class="form-label"></label>
                   <input type="file" name="resume" class="form-control " >
               </div>
               
               <div class="form-group">
                   <button type="submit" class="btn btn-block btn-danger btn-sm py-1 px-4">Upload</button>
               </div>
           </form>
              @endif
           </div>
       </div>
   </div>
  </div>
<!-- End calto-action Area -->
@endsection