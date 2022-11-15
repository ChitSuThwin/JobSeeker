<!DOCTYPE html>
<html lang="zxx" class="no-js">
<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/fav.png">
    <!-- Author Meta -->
    <meta name="author" content="codepixer">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <title>Job Listing</title>

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
        <!--
        CSS
        ============================================= -->
        <link rel="stylesheet" href="{{ asset('user_assets/css/linearicons.css') }}">
        <link rel="stylesheet" href="{{ asset('user_assets/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('user_assets/css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('user_assets/css/magnific-popup.css') }}">
        <link rel="stylesheet" href="{{ asset('user_assets/css/nice-select.css') }}">					
        <link rel="stylesheet" href="{{ asset('user_assets/css/animate.min.css') }}">
        <link rel="stylesheet" href="{{ asset('user_assets/css/owl.carousel.css') }}">
        <link rel="stylesheet" href="{{ asset('user_assets/css/main.css') }}">
        <script src="https://kit.fontawesome.com/e19097aad2.js" crossorigin="anonymous"></script>
    </head>
    <body>
          <header id="header" id="home">
            <div class="container">
                <div class="row align-items-center justify-content-between d-flex">
                  <div id="logo">
                    {{-- <a href="index.html"><img src="{{ asset('user_assets/img/logo.png') }}" alt="" title="" /></a> --}}
                  </div>
                  <nav id="nav-menu-container">
                    <ul class="nav-menu">
                      <li class="menu-active"><a href="{{ route('index') }}">Home</a></li>
                      <li><a href="{{ route('jobs') }}">Jobs</a></li>
                      <li><a href="{{ route('about') }}">About Us</a></li>
                      {{-- <li><a href="contact.html">Contact</a></li> --}}
                      @if (Auth::check())
                        <li><a href="{{ route('profile') }}">Profile</a></li>
                        <li><a href="{{ route('logout') }}" class="ticker-btn">Logout</a></li>
                      @else
                        <li><button class="ticker-btn" data-target="#signup" data-toggle="modal">Sign Up</button></li>
                        <li><button class="ticker-btn" data-target="#signin" data-toggle="modal">Sign In</button></li>				          				          
                      @endif
                    </ul>
                  </nav><!-- #nav-menu-container -->		    		
                </div>
            </div>
          </header><!-- #header -->
          <div class="modal fade" id="signin">
           <div class="modal-dialog modal-dialog-centered">
               <div class="modal-content rounded-1">
                   <div class="modal-body">
                       <div class="d-flex justify-content-between">
                           <h4>Sign In</h4>
                           <button class="close" data-dismiss="modal">&times;</button>
                       </div>
                       <div class="d-flex justify-content-center mt-4">
                           <a href="{{route('login.google')}}" class="text-danger social-signin">
                               <i class="fa fa-google"></i>
                           </a>
                           <a href="{{route('login.facebook')}}" class="text-danger social-signin mx-3">
                               <i class="fa fa-facebook"></i>
                           </a>
                           <a href="{{route('login.github')}}" class="text-danger social-signin">
                               <i class="fa fa-github"></i>
                           </a>
                       </div>
                       <p class="text-muted my-3 text-center">- Or Via Email -</p>
                       <form action="{{ route('signin') }}" class="px-3" method="POST"> @csrf
                            @if (Session::has('signin_error'))
                            <p class="text-danger text-center">{{ Session::get('signin_error') }}</p>
                                
                            @endif
                        <div class="form-group">
                               <label for="" class="form-label">Email or Phone</label>
                               <input type="text" name="name" class="form-control borde-danger" placeholder="Enter email or phone">
                           </div>
                           <div class="form-group">
                               <label for="" class="form-label">Password</label>
                               <input type="password" name="password" class="form-control borde-danger" placeholder="Enter password">
                           </div>
                           <div class="form-group">
                               <button type="submit" class="btn btn-block btn-danger btn-sm py-1 px-4">Sign In</button>
                           </div>
                       </form>
                   </div>
               </div>
           </div>
          </div>
          <div class="modal fade" id="signup">
           <div class="modal-dialog modal-dialog-centered">
               <div class="modal-content rounded-1">
                   <div class="modal-body">
                       <div class="d-flex justify-content-between">
                           <h4>Sign In</h4>
                           <button class="close" data-dismiss="modal">&times;</button>
                       </div>
                       <div class="d-flex justify-content-center mt-4">
                           <a href="{{route('login.google')}}" class="text-danger social-signin">
                               <i class="fa fa-google"></i>
                           </a>
                           <a href="" class="text-danger social-signin mx-3">
                               <i class="fa fa-facebook"></i>
                           </a>
                           <a href="" class="text-danger social-signin">
                               <i class="fa fa-github"></i>
                           </a>
                       </div>
                       <p class="text-muted my-3 text-center">- Or Via Email -</p>
                       <form action="{{ route('signup') }}" method="POST" class="px-3">@csrf
                            <div class="form-group">
                                <label for="" class="form-label">Name</label>
                                <input type="text" name="name" class="form-control borde-danger" placeholder="Enter name" value="{{ old('name') }}">
                                @if ($errors->has('name'))
                                    <p class="mb-3 text-danger">{{ $errors->first('name') }}</p>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control borde-danger" placeholder="Enter email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <p class="mb-3 text-danger">{{ $errors->first('email') }}</p>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">Phone Number</label>
                                <input type="phone" name="phone" class="form-control borde-danger" placeholder="Enter Phone Number" value="{{ old('phone') }}">

                                @if ($errors->has('phone'))
                                    <p class="mb-3 text-danger">{{ $errors->first('phone') }}</p>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control borde-danger" placeholder="Enter password">
                                
                                @if ($errors->has('password'))
                                    <p class="mb-3 text-danger">{{ $errors->first('password') }}</p>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control borde-danger" name="con_password" placeholder="Enter password">

                                @if ($errors->has('con_password'))
                                    <p class="mb-3 text-danger">{{ $errors->first('con_password') }}</p>
                                @endif
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-block btn-danger btn-sm py-1 px-4">Sign Up</button>
                            </div>
                       </form>
                   </div>
               </div>
           </div>
          </div>
       @yield('content')
        <!-- Start download Area -->
        <section class="download-area section-gap" id="app">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 download-left">
                        <img class="img-fluid" src="{{ asset('user_assets/img/d1.png') }}" alt="">
                    </div>
                    <div class="col-lg-6 download-right">
                        <h1>Download the <br>
                        Job Listing App Today!</h1>
                        <p class="subs">
                            It won’t be a bigger problem to find one video game lover in your neighbor. Since the introduction of Virtual Game, it has been achieving great heights so far as its popularity and technological advancement are concerned.
                        </p>
                        <div class="d-flex flex-row">
                            <div class="buttons">
                                <i class="fa fa-apple" aria-hidden="true"></i>
                                <div class="desc">
                                    <a href="#">
                                        <p>
                                            <span>Available</span> <br>
                                            on App Store
                                        </p>
                                    </a>
                                </div>
                            </div>
                            <div class="buttons">
                                <i class="fa fa-android" aria-hidden="true"></i>
                                <div class="desc">
                                    <a href="#">
                                        <p>
                                            <span>Available</span> <br>
                                            on Play Store
                                        </p>
                                    </a>
                                </div>
                            </div>									
                        </div>						
                    </div>
                </div>
            </div>	
        </section>
        <!-- End download Area -->
    
        <!-- start footer Area -->		
        <footer class="footer-area section-gap">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3  col-md-12">
                        <div class="single-footer-widget">
                            <h6>Top Products</h6>
                            <ul class="footer-nav">
                                <li><a href="#">Managed Website</a></li>
                                <li><a href="#">Manage Reputation</a></li>
                                <li><a href="#">Power Tools</a></li>
                                <li><a href="#">Marketing Service</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6  col-md-12">
                        <div class="single-footer-widget newsletter">
                            <h6>Newsletter</h6>
                            <p>You can trust us. we only send promo offers, not a single spam.</p>
                            <div id="mc_embed_signup">
                                <form target="_blank" novalidate="true" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get" class="form-inline">

                                    <div class="form-group row" style="width: 100%">
                                        <div class="col-lg-8 col-md-12">
                                            <input name="EMAIL" placeholder="Enter Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Email '" required="" type="email">
                                            <div style="position: absolute; left: -5000px;">
                                                <input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
                                            </div>
                                        </div> 
                                    
                                        <div class="col-lg-4 col-md-12">
                                            <button class="nw-btn primary-btn">Subscribe<span class="lnr lnr-arrow-right"></span></button>
                                        </div> 
                                    </div>		
                                    <div class="info"></div>
                                </form>
                            </div>		
                        </div>
                    </div>
                    <div class="col-lg-3  col-md-12">
                        <div class="single-footer-widget mail-chimp">
                            <h6 class="mb-20">Instragram Feed</h6>
                            <ul class="instafeed d-flex flex-wrap">
                                <li><img src="img/i1.jpg" alt=""></li>
                                <li><img src="img/i2.jpg" alt=""></li>
                                <li><img src="img/i3.jpg" alt=""></li>
                                <li><img src="img/i4.jpg" alt=""></li>
                                <li><img src="img/i5.jpg" alt=""></li>
                                <li><img src="img/i6.jpg" alt=""></li>
                                <li><img src="img/i7.jpg" alt=""></li>
                                <li><img src="img/i8.jpg" alt=""></li>
                            </ul>
                        </div>
                    </div>						
                </div>

                <div class="row footer-bottom d-flex justify-content-between">
                    <p class="col-lg-8 col-sm-12 footer-text m-0 text-white">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
                    <div class="col-lg-4 col-sm-12 footer-social">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-dribbble"></i></a>
                        <a href="#"><i class="fa fa-behance"></i></a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- End footer Area -->		

        <script src="{{ asset('user_assets/js/vendor/jquery-2.2.4.min.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="{{ asset('user_assets/js/vendor/bootstrap.min.js') }}"></script>			
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
        <script src="{{ asset('user_assets/js/easing.min.js') }}"></script>			
        <script src="{{ asset('user_assets/js/hoverIntent.js') }}"></script>
        <script src="{{ asset('user_assets/js/superfish.min.js') }}"></script>	
        <script src="{{ asset('user_assets/js/jquery.ajaxchimp.min.js') }}"></script>
        <script src="{{ asset('user_assets/js/jquery.magnific-popup.min.js') }}"></script>	
        <script src="{{ asset('user_assets/js/owl.carousel.min.js') }}"></script>			
        <script src="{{ asset('user_assets/js/jquery.sticky.js') }}"></script>
        <script src="{{ asset('user_assets/js/jquery.nice-select.min.js') }}"></script>			
        <script src="{{ asset('user_assets/js/parallax.min.js') }}"></script>		
        <script src="{{ asset('user_assets/js/mail-script.js') }}"></script>	
        <script src="{{ asset('user_assets/js/main.js') }}"></script>	
        @yield('js')
    </body>
    @if (Session::has('signup_error'))
        <script>
            $('#signup').modal('show');
        </script>
    @endif

    @if (Session::has('signin_error'))
    <script>
        $('#signin').modal('show');
    </script>
    @endif
</html>



