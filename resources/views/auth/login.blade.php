
<html lang="en">
<head>

<meta charset="utf-8">
<title>Login to {{ setting('site.site_name') }}</title>
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
        /* background: url("/assets/auth/bg.jpg") 100%; */
        background: url(/assets/auth/bus.jpg) 100%;
        background-size: cover;
        
        background-position: center center;
        background-repeat: no-repeat;
        /*min-height: 900px*/
    }

    </style>



<div class="splash-container">
<div class="card ">
<div class="card-header text-center">

<a href="/" style="font-size: 20px; color: #0830A5;"> <strong>{{ setting('site.site_name') }}</strong> </a>
</div>
<div class="card-body">
             <form class="form" method="POST" action="{{ route('login') }}">
                        <span class="login100-form-logo">
						<i class="zmdi zmdi-landscape"></i>
					</span>

					<span class="login100-form-title p-b-34 p-t-27">
						Log in
					</span>
                         @csrf
                         <div class="form-group">
                             <label for="id_username" class="col-form-label  requiredField">
Email<span class="asteriskField">*</span>
</label>
                        <div class="wrap-input100 validate-input" data-validate = "email">
                            <input  id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="{{ __('Email') }}" required autofocus>
                           
                            @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                                
                        </div></div>
                        <div class="form-group">
                            <label for="id_username" class="col-form-label  requiredField">
Password<span class="asteriskField">*</span>
</label>
                       <div class="wrap-input100 validate-input" data-validate="Enter password">
                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="{{ __('Password') }}" required>
                            
					          
                             @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </div> </div>
                        <div class="checkbox float-left">
                            <input id="terms" type="checkbox">
                            <label for="terms">{{__('Remember me')}}</label>
                        </div>                         
                        <div class="clearfix"></div>
                        <div class="footer">
                            <input type="submit" class="btn btn-primary w-100" value="{{__('Log in')}}">
                            
                        </div>
                     </form>
                    </div>
<div class="card-footer bg-white p-0  ">
<div class="card-footer-item card-footer-item-bordered">
<a href="/register/" class="footer-link">Create An Account</a></div>
<div class="card-footer-item card-footer-item-bordered">
<a href="/password/reset" class="footer-link">Forgot Password</a>
</div>
</div>
</div>
</div>




<script src="/assets/auth/jquery-3.3.1.min.js"></script>
<script src="/assets/auth/bootstrap/js/bootstrap.bundle.js"></script>
</body>