 <!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link rel="manifest" href="/assets/js/manifest.json">
    
    <!-- CSRF Token -->
    
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo $__env->yieldContent('page'); ?> - <?php echo e(setting('site.site_name')); ?></title>

    <!-- Styles -->
    <!-- Fonts -->
    

    <!-- Styles -->
    
    
   

    <link rel="stylesheet" href="<?php echo e(asset('assets/css/bootstrap.min.css')); ?>">
    
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/jquery-jvectormap-2.0.3.min.css')); ?>"/>
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/morris.min.css')); ?>" />
    <!-- Custom Css -->
   
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/color_skins.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/bootstrap-select.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/styles.css')); ?>">
    
 <link rel="stylesheet" href="<?php echo e(asset('assets/css/main.css')); ?>">
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
    <?php if (app()["auth"]->check() && app()["auth"]->user()->isImpersonated()): ?>
    .top_navbar{background:#fff;}
    section.content::before{background:#fff;}
    .menu_dark .sidebar {background: #fff;box-shadow: none !important;}
    .navbar-nav>li>a .label-count {background-color: #50d38a;color: #fff;}
    .navbar-logo .navbar-brand span {color: #50d38a;}

    <?php endif; ?>
    <?php echo $__env->yieldContent('styles'); ?>
    </style>


    <?php echo $__env->make('partials.footerstyles', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <script src="<?php echo e(asset('js/vue.min.js')); ?>"></script>
    
</head>
<body class="<?php echo e(setting('site.color_theme')); ?> menu_dark" id="app">
<style>

@media  only screen and (min-width: 993px) {
  .content {
    margin-left:230px !important;
  }
}
@media  only screen and (max-width: 993px) {
  .collapsible,.side-nav fixed,.no-padding  {
    overflow-y:scroll !important;
  }
}
</style>

<!-- Overlay For Sidebars -->
<div class="overlay"></div>
<?php echo $__env->make('layouts.topnavbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


        <?php if(auth()->guard()->check()): ?>
        
                </div>
            </div>
        </div>
        <?php endif; ?>
        <?php echo $__env->yieldContent('content'); ?>
        <?php if(auth()->guard()->check()): ?>
        
                    
                        </div>
                       
               
        </div>
        <?php endif; ?>
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
  <script src="<?php echo e(asset('assets/js/libscripts.bundle.js')); ?>"></script> <!-- Lib Scripts Plugin Js ( jquery.v3.2.1, Bootstrap4 js) --> 
  

	

	
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

	
	<?php echo $__env->yieldContent('js'); ?>
    <!-- Jquery Core Js --> 
    <script src="<?php echo e(asset('assets/js/vendorscripts.bundle.js')); ?>"></script> 
   <!-- Morris Plugin Js -->
    <script src="<?php echo e(asset('assets/js/jvectormap.bundle.js')); ?>"></script> <!-- JVectorMap Plugin Js -->
    <script src="<?php echo e(asset('assets/js/knob.bundle.js')); ?>"></script> <!-- Jquery Knob-->
    
    <script src="<?php echo e(asset('assets/js/infobox-1.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/index.js')); ?>"></script>
    
    <script src="<?php echo e(asset('assets/js/form-validation.js')); ?>"></script>
</body>
</html>
