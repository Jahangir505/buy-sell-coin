 <!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link rel="manifest" href="/assets/js/manifest.json">
    
    <!-- CSRF Token -->
    
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('page') - {{ setting('site.site_name') }}</title>

    <!-- Styles -->
    <!-- Fonts -->
    {{-- <link rel="dns-prefetch" href="https://fonts.gstatic.com">
            <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">  --}}

    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    
   {{--  <link rel="icon" href="favicon.ico" type="image/x-icon"> <!-- Favicon--> --}}

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css')}}">
    
    <link rel="stylesheet" href="{{ asset('assets/css/jquery-jvectormap-2.0.3.min.css')}}"/>
    <link rel="stylesheet" href="{{ asset('assets/css/morris.min.css')}}" />
    <!-- Custom Css -->
   
    <link rel="stylesheet" href="{{ asset('assets/css/color_skins.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-select.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css')}}">
    
 <link rel="stylesheet" href="{{ asset('assets/css/main.css')}}">
 <link rel="stylesheet" href="/assets/front/css/style.css">

 <link rel="stylesheet" href="/assets/front/css/bootstrap-4.5.0.min.css">

 <script src="/assets/front/js/vendor/jquery-3.5.1-min.js"></script>



    <style type="text/css">
    .jqstooltip { position: absolute;left: 0px;top: 0px;visibility: hidden;background: rgb(0, 0, 0) transparent;background-color: rgba(0,0,0,0.6);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000);-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000)";color: white;font: 10px arial, san serif;text-align: left;white-space: nowrap;padding: 5px;border: 1px solid white;box-sizing: content-box;z-index: 10000;}
    .jqsfield { color: white;font: 10px arial, san serif;text-align: left;}
    .bitcoin .body {position: absolute;word-break: break-all;}
    .remove{cursor: pointer;}
    .top_navbar{border-bottom: none }
    .navbar-nav>li>a .label-count{position: unset;}
    .menu_dark .sidebar {box-shadow: none !important;}
    .main-panel{height:auto !important;min-height:auto !important;}
    .wrapper {
    min-height: 30vh !important;
    height: 30vh !important;
    }
    @impersonating
    .top_navbar{background:#fff;}
    section.content::before{background:#fff;}
    .menu_dark .sidebar {background: #fff;box-shadow: none !important;}
    .navbar-nav>li>a .label-count {background-color: #50d38a;color: #fff;}
    .navbar-logo .navbar-brand span {color: #50d38a;}

    @endImpersonating
    @yield('styles')
    </style>


    @include('partials.footerstyles')

    <script src="{{ asset('js/vue.min.js') }}"></script>
    {{--
    @include('layouts.jquery')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script> 
    --}}
</head>
<body class="{{setting('site.color_theme')}} menu_dark" id="app">
<style>

@media only screen and (min-width: 993px) {
  .content {
    margin-left:230px !important;
  }
}
@media only screen and (max-width: 993px) {
  .collapsible,.side-nav fixed,.no-padding  {
    overflow-y:scroll !important;
  }
}
</style>

<!-- Overlay For Sidebars -->
<div class="overlay"></div>
@include('layouts.topnavbar')


        @auth
        
                </div>
            </div>
        </div>
        @endauth
        @yield('content')
        @auth
        
                    
                        </div>
                       
               
        </div>
        @endauth
    </div>
      <!-- Scripts -->
  
</section>

  <!--Start of Tawk.to Script-->
  <script type="text/javascript">
  var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
  (function(){
  var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
  s1.async=true;
  s1.src='https://embed.tawk.to/64b96e54cc26a871b029ab1b/1h5q5e121';
  s1.charset='UTF-8';
  s1.setAttribute('crossorigin','*');
  s0.parentNode.insertBefore(s1,s0);
  })();
  </script>
  <!--End of Tawk.to Script-->
  <script src="{{ asset('assets/js/libscripts.bundle.js') }}"></script> <!-- Lib Scripts Plugin Js ( jquery.v3.2.1, Bootstrap4 js) --> 
  

	

	
<!-- General JS Scripts -->
  <script src="/assets/front/js/bootstrap-4.5.0.min.js"></script>
  <script src="/assets/dash/assets/js/app.min.js"></script>
  <!-- JS Libraies -->
  <script src="/assets/dash/assets/bundles/apexcharts/apexcharts.min.js"></script>
  <script src="/assets/dash/assets/bundles/summernote/summernote-bs4.js"></script>
  <script src="/assets/dash/assets/bundles/chartjs/chart.min.js"></script>
  <!-- Page Specific JS File -->
  <script src="/assets/dash/assets/js/page/index2.js"></script>
  <!-- Template JS File -->
  <script src="/assets/dash/assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="/assets/dash/assets/js/custom.js"></script>

	
	@yield('js')
    <!-- Jquery Core Js --> 
    <script src="{{ asset('assets/js/vendorscripts.bundle.js')}}"></script> 
   <!-- Morris Plugin Js -->
    <script src="{{ asset('assets/js/jvectormap.bundle.js')}}"></script> <!-- JVectorMap Plugin Js -->
    <script src="{{ asset('assets/js/knob.bundle.js')}}"></script> <!-- Jquery Knob-->
    
    <script src="{{ asset('assets/js/infobox-1.js')}}"></script>
    <script src="{{ asset('assets/js/index.js')}}"></script>
    
    <script src="{{ asset('assets/js/form-validation.js')}}"></script>
</body>
</html>
