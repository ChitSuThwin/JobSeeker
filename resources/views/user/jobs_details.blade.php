@extends('user.components.main')
@section('content')
     <!-- start banner Area -->
     <section class="banner-area relative" id="home">	
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="about-content col-lg-12">
                    <h1 class="text-white">
                        Job Details				
                    </h1>	
                    <p class="text-white link-nav"><a href="{{route('index')}}">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="single.html"> Job Details</a></p>
                </div>											
            </div>
        </div>
    </section>
<!-- End banner Area -->	

<!-- Start features Area -->
{{-- <section class="features-area">
   <div class="container">
       <div class="row">
           <div class="col-lg-3 col-md-6">
               <div class="single-feature">
                   <h4>Searching</h4>
                   <p>
                       Lorem ipsum dolor sit amet, consectetur adipisicing.
                   </p>
               </div>
           </div>
           <div class="col-lg-3 col-md-6">
               <div class="single-feature">
                   <h4>Applying</h4>
                   <p>
                       Lorem ipsum dolor sit amet, consectetur adipisicing.
                   </p>
               </div>
           </div>
           <div class="col-lg-3 col-md-6">
               <div class="single-feature">
                   <h4>Security</h4>
                   <p>
                       Lorem ipsum dolor sit amet, consectetur adipisicing.
                   </p>
               </div>
           </div>
           <div class="col-lg-3 col-md-6">
               <div class="single-feature">
                   <h4>Notifications</h4>
                   <p>
                       Lorem ipsum dolor sit amet, consectetur adipisicing.
                   </p>
               </div>
           </div>																		
       </div>
   </div>	
</section> --}}
<!-- End features Area -->

<!-- Start post Area -->
<section class="post-area mt-5">
  
   <div class="container">
       <div class="row justify-content-center d-flex">
           
           <div class="col-lg-8 col-12 post-list">
            <div class="single-post d-flex flex-column">
                

                    <div class="d-flex flex-row justify-content-between">
                        <h4>{{$job[0]->title}}</h4>
                       
                        {{-- @if (Auth::guard('employee')->check()) --}}
                        <div class="d-flex flex-row align-items-center gap-2">
                            <ul class="btns" style="height:35px;">
                                <li><a href="#"><span class="lnr lnr-heart"></span></a></li>
                                <li><a class="" onclick="getApply({{$job[0]->id}})" data-toggle="modal" data-target="#apply">Apply</a></li>
                            </ul>
                            
                    </div>   
                    </div>    
                          {{-- @else
                        <a class="btn btn-sm btn-danger text-light" data-target="#signin" data-toggle="modal" style="padding:0 2 0 2 ">Apply</a> 
                        @endif --}}
                    
                    <div class="d-flex align-items-center gap-1 mb-3 text-muted">
                       
                        {{$job[0]->categories->name}}
                    </div>	
             
                    <p class="address mt-1"><span class="lnr lnr-database"></span> {{$job[0]->salary}} MMK </p>
                    <p class="address mt-1"><span class="lnr lnr-clock"></span> Deadline -  {{$job[0]->end_date}}</p>
                
            </div>	
            <div class="single-post job-experience">
                <h4 class="single-title">Job Features & Overviews</h4>
               <p>{{$job[0]->job_description}}</p>
            </div>
            <div class="single-post job-experience">
                <h4 class="single-title">Experience Requirements</h4>
                <p>{{$job[0]->job_requirement}}</p>
            </div>
            	
            <div class="single-post job-details">
                <h4 class="single-title">Additional</h4>
                <p>
                    {{$job[0]->description}}
                </p>
                
            </div>
            {{-- <div class="single-post job-experience">
                <h4 class="single-title">Education Requirements</h4>
                <ul>
                    <li>
                        <img src="img/pages/list.jpg" alt="">
                        <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliquaut enim ad minim veniam.</span>
                    </li>
                    <li>
                        <img src="img/pages/list.jpg" alt="">
                        <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliquaut enim ad minim veniam.</span>
                    </li>
                    <li>
                        <img src="img/pages/list.jpg" alt="">
                        <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliquaut enim ad minim veniam.</span>
                    </li>																										
                </ul>
            </div>														 --}}
            </div>
           
           <div class="col-lg-4 sidebar">
               <div class="single-slidebar">
                   <h4>Jobs by Category</h4>
                   <ul class="cat-list">
                       @foreach($categories as $category)
                       <li><a class="justify-content-between d-flex" href="{{route('searchByCategory',$category->id)}}"><p>{{$category->name}}</p><span>{{count($category->jobs)}}</span></a></li>
                      @endforeach
                       {{-- <li><a class="justify-content-between d-flex" href="category.html"><p>Media & News</p><span>57</span></a></li>
                       <li><a class="justify-content-between d-flex" href="category.html"><p>Goverment</p><span>33</span></a></li>
                       <li><a class="justify-content-between d-flex" href="category.html"><p>Medical</p><span>36</span></a></li>
                       <li><a class="justify-content-between d-flex" href="category.html"><p>Restaurants</p><span>47</span></a></li>
                       <li><a class="justify-content-between d-flex" href="category.html"><p>Developer</p><span>27</span></a></li>
                       <li><a class="justify-content-between d-flex" href="category.html"><p>Accounting</p><span>17</span></a></li> --}}
                   </ul>
               </div>
               {{-- <div class="single-slidebar">
                   <h4>Top rated job posts</h4>
                   <div class="active-relatedjob-carusel">
                       <div class="single-rated">
                           <img class="img-fluid" src="img/r1.jpg" alt="">
                           <a href="single.html"><h4>Creative Art Designer</h4></a>
                           <h6>Premium Labels Limited</h6>
                           <p>
                               Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temporinc ididunt ut dolore magna aliqua.
                           </p>
                           <h5>Job Nature: Full time</h5>
                           <p class="address"><span class="lnr lnr-map"></span> 56/8, Panthapath Dhanmondi Dhaka</p>
                           <p class="address"><span class="lnr lnr-database"></span> 15k - 25k</p>
                           <a href="#" class="btns text-uppercase">Apply job</a>
                       </div>
                       <div class="single-rated">
                           <img class="img-fluid" src="img/r1.jpg" alt="">
                           <a href="single.html"><h4>Creative Art Designer</h4></a>
                           <h6>Premium Labels Limited</h6>
                           <p>
                               Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temporinc ididunt ut dolore magna aliqua.
                           </p>
                           <h5>Job Nature: Full time</h5>
                           <p class="address"><span class="lnr lnr-map"></span> 56/8, Panthapath Dhanmondi Dhaka</p>
                           <p class="address"><span class="lnr lnr-database"></span> 15k - 25k</p>
                           <a href="#" class="btns text-uppercase">Apply job</a>
                       </div>
                       <div class="single-rated">
                           <img class="img-fluid" src="img/r1.jpg" alt="">
                           <a href="single.html"><h4>Creative Art Designer</h4></a>
                           <h6>Premium Labels Limited</h6>
                           <p>
                               Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temporinc ididunt ut dolore magna aliqua.
                           </p>
                           <h5>Job Nature: Full time</h5>
                           <p class="address"><span class="lnr lnr-map"></span> 56/8, Panthapath Dhanmondi Dhaka</p>
                           <p class="address"><span class="lnr lnr-database"></span> 15k - 25k</p>
                           <a href="#" class="btns text-uppercase">Apply job</a>
                       </div>																		
                   </div> --}}
               </div>												

           </div>
       </div>
   </div>	
</section>
<!-- End post Area -->
   

<!-- Start callto-action Area -->
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
@section('js')

<script>
   function getApply(id)
   {
       document.getElementById('jobId').value=id;
   }
</script>
@endsection
