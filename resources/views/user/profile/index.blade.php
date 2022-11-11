@extends('user.components.main')
@section('content')
        <!-- start banner Area -->
 <section class="banner-area relative" id="home">	
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row fullscreen d-flex align-items-center justify-content-center" style="height: 300px !important;padding:0 !important;padding-top:80px !important; ">
            <div class="banner-content col-lg-12">
                <h1 class="text-white">
                    User Profile		
                </h2>	
            </div>											
        </div>
    </div>
</section>
<!-- End banner Area -->	
<section class="post-area my-5">
    <div class="container">
        <div class="row ">
          <div class="col-lg-8">
            <div class="section">
                <div class="d-flex justify-content-between align-items-center">
                    <h3 class="text-left mb-4">Your Account Info <small class="text-success">Verified</small></h3>
                    <button onclick="updateInfo()" class="btn btn-outline-primary btn-sm py-1 px-3"> <i class="fa fa-pencil"></i> Edit Info</button>
                </div>
                @if (Auth::guard('employee')->user()->is_verify == '0' && !Session::has('verify'))
                    <div class="alert alert-danger">Please Verify Your Account. <a href="{{ route('send_verification') }}" class="alert-link">Verify Here</a></div>
                @endif
                @if (Session::has('verify'))
                    <div class="alert alert-success">Verification already sent. Check your email</div>
                @endif
                @if (Session::has('verified'))
                    <div class="alert alert-success">{{ Session::get('verified') }}</div>
                @endif
                @php
                    $user = Auth::guard('employee')->user();
                    if(empty($user->address) || empty($user->description) || empty($user->resume) || empty($user->avatar)){
                        echo "<div class='alert alert-danger'>Pleas fill all of your information or you cannot apply the job.</div>";
                    }
                @endphp
                <form id="account" action="{{ route('profile.update', Auth::guard('employee')->user()->id) }}" method="POST">
                    @csrf
                    {{ method_field('put') }}
                    <div class="input-group-icon mt-10">
                        <div class="icon"><i class="fa fa-user" aria-hidden="true"></i></div>
                        <input type="text" name="name" required class="single-input" value="{{ Auth::guard('employee')->user()->name }}" disabled>
                    </div>
                    <div class="input-group-icon mt-10">
                        <div class="icon"><i class="fa fa-envelope" aria-hidden="true"></i></div>
                        <input type="email" name="email" required class="single-input" value="{{ Auth::guard('employee')->user()->email }}" disabled>
                    </div>
                    <div class="input-group-icon mt-10">
                        <div class="icon"><i class="fa fa-phone" aria-hidden="true"></i></div>
                        <input type="phone" name="phone" required class="single-input" value="{{$user->phone }}" disabled>
                    </div>
                    <div class="input-group-icon mt-10">
                        <div class="icon"><i class="fa fa-key" aria-hidden="true"></i></div>
                        <input type="password" name="password" required class="single-input" placeholder="Old Password" disabled>
                    </div>
                    <div class="input-group-icon mt-10">
                        <div class="icon"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                        <textarea name="address" placeholder="Your Address" required class="single-input" disabled>{{ $user->address }}</textarea>
                    </div>
                    <div class="input-group-icon mt-10">
                        <div class="icon"><i class="fa fa-pencil" aria-hidden="true"></i></div>
                        <textarea name="description" rows="4" placeholder="Describe about yourelf" required class="single-input" disabled>{{ $user->description }}</textarea>
                    </div>
                    <div class="input-group mt-10">
                        <label for="">Select your interest career category</label>
                        <div class="form-select" id="default-select">
                            @foreach($categories as $category)
                            <input type="checkbox" id="category" class="ml-2" name="categories[]" value="{{$category->id}}">
                            <label for="category"> {{$category->name}}</label>
 @endforeach
                        
                        </div>
                    </div>

                    <button class="btn btn-sm btn-primary px-5 mt-3 w-100 updateBtn">Update</button>
                </form>
            </div>
          </div>
          <div class="col-lg-4">
            <label for="pp" class="avatar d-block border border-dashed color-7 py-5 text-center mt-5">
                @if(Auth::guard('employee')->user()->avatar )
                <img src="{{Auth::user()->avatar}}" style="width:200px;">
                @else
                Upload Profile
                <img src="{{asset('user_assets/img/user_avatar.png')}}" style="width:200px;">
                @endif
              
            </label>
            <input type="file" form="account" class="avatar" name="pp" hidden id="pp" disabled>
              
          </div>
        </div>
    </div>	
</section>
@endsection
@section('js')
    <script>
            $('.updateBtn').hide();
        function updateInfo(){
            $('#account input,#account textarea, #account select, .avatar').removeAttr('disabled');
        //   ?  $('#account input[type="email"]').attr('disabled', true);
            $('.updateBtn').show();
            $('#account input').first().focus();
        }
    </script>
@endsection