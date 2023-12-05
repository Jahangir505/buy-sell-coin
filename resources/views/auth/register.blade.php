<!doctype html>
<html lang="en">
<head>

<meta charset="utf-8">
<title>Register to {{ setting('site.site_name') }}</title>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="apple-touch-icon" sizes="180x180" href="/assets/auth/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/assets/auth/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/assets/auth/favicon-16x16.png">
<link rel="manifest" href="/assets/auth/site.webmanifest">
<meta name="theme-color" content="#0917F9">
<meta content="Send Remit" name="descriptison">
<meta content="Send Remit" name="keywords">
<meta itemprop="name" content="- {{  setting('site.description') }}">
<meta itemprop="description" content="{{  setting('site.description') }}.">
<meta itemprop="image" content="/assets/auth/bg.jpg">
<link rel="stylesheet" href="/assets/auth/w3.css">

<meta name="twitter:card" content="/assets/auth/bg.jpg">
<meta name="twitter:title" content="- {{  setting('site.description') }}">
<meta name="twitter:description" content="{{  setting('site.description') }}.">
<meta name="twitter:image:src" content="/assets/auth/bg.jpg">

<meta property="og:locale" content="en_US">
<meta property="og:title" content="- {{  setting('site.description') }}">
<meta property="og:image" content="/assets/auth/bg.jpg">
<meta property="og:description" content="{{  setting('site.description') }}." />
<meta property="og:site_name" content="" />
<meta property="og:url" content="/">
<meta property="og:type" content="website">

<link rel="stylesheet" href="/assets/front/css/bootstrap-4.5.0.min.css">

<link rel="stylesheet" href="/assets/front/css/animate.css">


<link rel="stylesheet" href="/assets/auth/bootstrap.min.css">
<link href="/assets/auth/style.css" rel="stylesheet">
<link rel="stylesheet" href="/assets/auth/css/style.css">
<link rel="stylesheet" href="/assets/auth/css/fontawesome-all.css">


</head>
<body>
<style>
  html,
    body {
        height: 100%;
    }
   body {
        display: flex;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
        min-height: 100%;
        /* background: url("/assets/auth/visionq.jpg") 100%; */
        background: url(/assets/auth/bus.jpg) 100%;
        background-size: cover;
        
        background-position: center center;
        background-repeat: no-repeat;
        /*min-height: 900px*/
    }

    .privacy_container .title{

    
    font-size: 28px;
    color: rgb(0, 85, 165);

    margin-bottom: 20px;

    }

    .privacy_container .pContainer{
    margin-bottom: 50px;

    }

    .privacy_container .content{


    font-size: 17px;
    color: rgb(58, 58, 58);
    line-height: 28px;
    margin-bottom: 15px;

    }

    </style>



<div class="splash-container">
<div class="card ">
<div class="card-header text-center">

<a href="/" style="font-size: 20px; color: #0830A5;"> <strong>{{ setting('site.site_name') }}</strong> </a>
</div>
<div class="card-body">
                    <form class="form" method="POST" action="{{ route('register') }}">
                         <span class="login100-form-logo">
						<i class="zmdi zmdi-landscape"></i>
					</span>

					<span class="login100-form-title p-b-34 p-t-27">
						Register
					</span>
                        @csrf  
                        <div class="form-group">
                        <div class="wrap-input100 validate-input" data-validate = "name">
                            <input type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" placeholder="{{__('Enter User Name')}}" required autofocus>
                            <div class="form-group">
                            @if ($errors->has('name'))
                                <span class="invalid-feedback d-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div><div class="form-group">
                        <div class="wrap-input100 validate-input" data-validate = "name">
                            <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="{{__('Enter Email')}}" required >
                            
                            @if ($errors->has('email'))
                                <span class="invalid-feedback d-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span></div>
                            @endif
                        </div><div class="form-group">
                        <div class="wrap-input100 validate-input" data-validate = "name">
                            <label for="CC">Select Your County</label>
                            <select class="form-control z-index show-tick" placeholder="Select Your Contry" name="CC" id="CC">
                                 <option value="" data-prefix="">select</option>
                                @foreach($countries as $country)
                                    <option value="{{$country->code}}" data-prefix="{{$country->prefix}}">{{$country->name}}</option>
                                @endforeach
                            </select>
                             @if ($errors->has('CC'))
                                <span class="invalid-feedback d-block">
                                    <strong>{{ $errors->first('CC') }}</strong>
                                </span>
                            @endif
                        </div></div><div class="form-group">
                        <div class="wrap-input100 validate-input" data-validate = "name">
                            <input type="phone" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') }}" placeholder="{{__('Mobile Number')}}" id="phonenumber" required >
                            </div>
                            @if ($errors->has('phone'))
                                <span class="invalid-feedback d-block">
                                    <strong>{{ $errors->first('phone') }}</strong>
                                </span>
                            @endif
                        </div><div class="form-group">
                       <div class="wrap-input100 validate-input" data-validate = "name">
                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="{{__('Password')}}"  required>
                            
                            @if ($errors->has('password'))
                                <span class="invalid-feedback d-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div></div><div class="form-group">
                       <div class="wrap-input100 validate-input" data-validate = "name">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="{{__('Repeat Password')}}" required>
                           </div>
                            @if ($errors->has('password_confirmation'))
                                <span class="invalid-feedback d-block">
                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                </span>
                            @endif
                        </div></div>
                        <div class="checkbox">
                            <input id="terms" type="checkbox" name="terms">

                            <label for="terms">{{__('I read and Agree to the')}} 

                                <button type="button" style="border:none; outline:none; color:blue; background-color:inherit; " data-toggle="modal" data-target="#exampleModalCenter">
                                    {{__('Terms of Usage')}}
                                </button>
                                
                            </label>

                            @if ($errors->has('terms'))
                                <span class="invalid-feedback d-block">
                                    <strong>{{ $errors->first('terms') }}</strong>
                                </span>
                            @endif
                        </div>  
                        
                    
                    <div class="footer">
                        <input type="submit" value="{{__('SIGN UP')}}" class="btn btn-primary w-100">
                    </div>

                    
                    </form>
                   
                     </div>
<div class="card-footer bg-white p-0  ">
<div class="card-footer-item card-footer-item-bordered">
<a href="/login/" class="footer-link">My Account</a></div>

</div>
</div>
</div>


<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered " role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">{{__('Terms of Usage')}}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            
            @include('policy')

            
        </div>
        <div class="modal-footer">
            <button type="button" style="background-color:green; color:white;" class="btn " data-dismiss="modal">{{__('Close')}}</button>
            
        </div>
        </div>
    </div>
</div>







<script src="/assets/auth/jquery-3.3.1.min.js"></script>
<script src="/assets/auth/bootstrap/js/bootstrap.bundle.js"></script>
<script src="/assets/front/js/bootstrap-4.5.0.min.js"></script>
</body>
      <div id="particles-js"></div>
</div>

<!-- Jquery Core Js --> 
<script src="{{ asset('assets/js/libscripts.bundle.js') }}"></script> <!-- Lib Scripts Plugin Js ( jquery.v3.2.1, Bootstrap4 js) --> 
<script type="text/javascript">
$( "#CC" )
  .change(function () {
    $( "#CC option:selected" ).each(function() {
        $('#phonenumber').val($(this).data('prefix'));
      //window.location.replace("{{url('/')}}/withdrawal/request/"+$(this).val());
  });
});
</script>


                       
                </div>
            </div>
        </div>
    </div>
</div>

