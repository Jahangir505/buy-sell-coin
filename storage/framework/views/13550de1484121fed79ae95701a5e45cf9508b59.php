<nav class="top_navbarv">
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title><?php echo e(setting('site.site_name')); ?></title>

  <link rel="manifest" href="/assets/js/manifest.json">


  <!-- General CSS Files -->
  <link rel="stylesheet" href="/assets/dash/assets/css/app.min.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="/assets/dash/assets/css/style.css">
  <link rel="stylesheet" href="/assets/dash/assets/css/components.css">
  <link rel="stylesheet" href="/assets/dash/assets/bundles/summernote/summernote-bs4.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="/assets/dash/assets/css/custom.css">
  <link rel="stylesheet" href="/assets/front/css/style.css">
  <link rel='shortcut icon' type='image/x-icon' href='/assets/dash/assets/img/favicon.ico' />
</head>
<body>
  <div class="loader"></div>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar sticky fullNav">
        <div class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
									collapse-btn"> <i data-feather="menu"></i></a></li>
            <li>
              <form class="form-inline mr-auto">
                <div class="search-element">
                  <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="200">
                  <button class="btn" type="submit">
                    <i class="fas fa-search"></i>
                  </button>
                </div>
              </form>
            </li>
          </ul>
        </div>
        <ul class="navbar-nav navbar-right">
          <li><a href="#" class="nav-link nav-link-lg fullscreen-btn">
              <i data-feather="maximize"></i>
            </a></li>
         
            <div class="dropdown-menu dropdown-list dropdown-menu-right pullDown">
              <div class="dropdown-header">
                Messages
                <div class="float-right">
                  <a href="#">Mark All As Read</a>
                </div>
              </div>
              <div class="dropdown-list-content dropdown-list-message">
                <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar
											text-white"> <img alt="image" src="/assets/dash/assets/img/users/user-1.png" class="rounded-circle">
                  </span> <span class="dropdown-item-desc"> <span class="message-user">John
                      Deo</span>
                    <span class="time messege-text">Please check your mail !!</span>
                    <span class="time">2 Min Ago</span>
                  </span>
                </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar text-white">
                    <img alt="image" src="/assets/dash/assets/img/users/user-2.png" class="rounded-circle">
                  </span> <span class="dropdown-item-desc"> <span class="message-user">Sarah
                      Smith</span> <span class="time messege-text">Request for leave
                      application</span>
                    <span class="time">5 Min Ago</span>
                  </span>
                </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar text-white">
                    <img alt="image" src="/assets/dash/assets/img/users/user-5.png" class="rounded-circle">
                  </span> <span class="dropdown-item-desc"> <span class="message-user">Jacob
                      Ryan</span> <span class="time messege-text">Your payment invoice is
                      generated.</span> <span class="time">12 Min Ago</span>
                  </span>
                </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar text-white">
                    <img alt="image" src="/assets/dash/assets/img/users/user-4.png" class="rounded-circle">
                  </span> <span class="dropdown-item-desc"> <span class="message-user">Lina
                      Smith</span> <span class="time messege-text">hii John, I have upload
                      doc
                      related to task.</span> <span class="time">30
                      Min Ago</span>
                  </span>
                </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar text-white">
                    <img alt="image" src="/assets/dash/assets/img/users/user-3.png" class="rounded-circle">
                  </span> <span class="dropdown-item-desc"> <span class="message-user">Jalpa
                      Joshi</span> <span class="time messege-text">Please do as specify.
                      Let me
                      know if you have any query.</span> <span class="time">1
                      Days Ago</span>
                  </span>
                </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar text-white">
                    <img alt="image" src="/assets/dash/assets/img/users/user-2.png" class="rounded-circle">
                  </span> <span class="dropdown-item-desc"> <span class="message-user">Sarah
                      Smith</span> <span class="time messege-text">Client Requirements</span>
                    <span class="time">2 Days Ago</span>
                  </span>
                </a>
              </div>
              <div class="dropdown-footer text-center">
                <a href="#">View All <i class="fas fa-chevron-right"></i></a>
              </div>
            </div>
          </li>
          <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown"
              class="nav-link notification-toggle nav-link-lg"><i data-feather="bell"></i>
            </a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right pullDown">
              <div class="dropdown-header">
                Notifications
                <div class="float-right">
                  <a href="#">Mark All As Read</a>
                </div>
              </div>
              <div class="dropdown-list-content dropdown-list-icons">
                <a href="#" class="dropdown-item dropdown-item-unread"> <span
                    class="dropdown-item-icon l-bg-orange text-white"> <i class="far fa-envelope"></i>
                  </span> <span class="dropdown-item-desc"> You got new mail, please check. <span class="time">2 Min
                      Ago</span>
                  </span>
                </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-icon l-bg-purple text-white"> <i
                      class="fas fa-bell"></i>
                  </span> <span class="dropdown-item-desc"> Meeting with <b>John Deo</b> and <b>Sarah Smith </b> at
                    10:30 am <span class="time">10 Hours
                      Ago</span>
                  </span>
                </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-icon l-bg-green text-white"> <i
                      class="far fa-check-circle"></i>
                  </span> <span class="dropdown-item-desc"> Sidebar Bug is fixed by Kevin <span class="time">12
                      Hours
                      Ago</span>
                  </span>
                </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-icon bg-danger text-white"> <i
                      class="fas fa-exclamation-triangle"></i>
                  </span> <span class="dropdown-item-desc"> Low disk space error!!!. <span class="time">17 Hours
                      Ago</span>
                  </span>
                </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-icon bg-info text-white"> <i class="fas
												fa-bell"></i>
                  </span> <span class="dropdown-item-desc"> Welcome to Jiva
                    template! <span class="time">Yesterday</span>
                  </span>
                </a>
              </div>
              <div class="dropdown-footer text-center">
                <a href="#">View All <i class="fas fa-chevron-right"></i></a>
              </div>
            </div>
          </li>
          <li class="dropdown"><a href="#" data-toggle="dropdown"
              class="nav-link dropdown-toggle nav-link-lg nav-link-user"> <img alt="image" src="/assets/dash/assets/img/user.png"
                class="user-img-radious-style"> <span class="d-sm-none d-lg-inline-block"></span></a>
            <div class="dropdown-menu dropdown-menu-right pullDown">
              <div class="dropdown-title">Hello Dear</div>
              <a href="/profile/identity" class="dropdown-item has-icon"> <i class="far
										fa-user"></i> Profile
              </a> <a href="/home" class="dropdown-item has-icon"> <i class="fas fa-bolt"></i>
                Activities
              </a> <a href="/profile/info" class="dropdown-item has-icon"> <i class="fas fa-cog"></i>
                Settings
              </a>
              <div class="dropdown-divider"></div>
              <a  href="<?php echo e(route('logout', app()->getLocale())); ?>" onclick="event.preventDefault();
	                                     document.getElementById('logout-form').submit();"><i class="flaticon-logout"></i><span><i class="fas fa-user-circle"></i>	<p>  <?php echo e(__('Logout')); ?></p></span></a><form id="logout-form" action="<?php echo e(route('logout', app()->getLocale())); ?>" method="POST" style="display: none;">
	                        <?php echo csrf_field(); ?>
	                    </form>
            </div>
          </li>
        </ul>
      </nav>


      <div class="mobile_menu home_mobile_menu">

        <ul class="row">

            <li id="buy_menu1">
              
                <a  href="/buyCoin">

                  <span class="ico buy_ico flex">

                    <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 -960 960 960" width="48"><path d="M436-82q-76-8-141-42t-112.5-88Q135-266 108-335T81-481q0-155 101.5-269T437-880v60q-128 19-212 115t-84 224q0 128 83.5 224T436-142v60Zm44-198L280-480l43-43 127 127v-284h60v284l127-127 43 43-200 200Zm44 198v-60q46-6 88.5-23.5T691-212l44 44q-46 35-99.5 58T524-82Zm168-667q-38-27-80-45.5T524-820v-60q58 7 111 29.5T735-793l-43 44Zm100 519-43-42q29-37 46-79.5t23-88.5h61q-7 58-29 111.5T792-230Zm26-292q-6-46-23-89t-46-79l47-41q35 46 56 99t27 110h-61Z"/></svg>
                  
                    <span><?php echo e(__("Buy")); ?></span>
                  </span>
                  
                    

                </a>
            </li>

            <li id="sell_menu1">

              <a  href="/sellCoin">

                <span class="ico sell_ico flex">
                  <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 -960 960 960" width="48"><path d="M228-174Q120-206 60-292.5T0-480q0-101 60-187.5T228-786v62q-74 26-121 93T60-480q0 84 47 150.5T228-236v62Zm332 14q-131 0-225.5-94.5T240-480q0-131 94.5-225.5T560-800q53 0 107.5 19t97.5 59l-40 41q-35-29-79-44t-86-15q-107 0-183.5 76.5T300-480q0 107 76.5 183.5T560-220q42 0 86-14.5t79-43.5l40 40q-43 40-97.5 59T560-160Zm247-169-43-43 83-83H523v-54h324l-83-83 43-43 153 153-153 153Z"/></svg>
                  <span><?php echo e(__("Sell")); ?></span>
                </span>

                

              </a>
            </li>

            <li id="sell_menu1">
              

              <a  href="/affiliation">

                <span class="ico affiliation_ico flex">
                  <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 -960 960 960" width="48"><path d="M451-193h55v-52q61-7 95-37.5t34-81.5q0-51-29-83t-98-61q-58-24-84-43t-26-51q0-31 22.5-49t61.5-18q30 0 52 14t37 42l48-23q-17-35-45-55t-66-24v-51h-55v51q-51 7-80.5 37.5T343-602q0 49 30 78t90 54q67 28 92 50.5t25 55.5q0 32-26.5 51.5T487-293q-39 0-69.5-22T375-375l-51 17q21 46 51.5 72.5T451-247v54Zm29 113q-82 0-155-31.5t-127.5-86Q143-252 111.5-325T80-480q0-83 31.5-156t86-127Q252-817 325-848.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 82-31.5 155T763-197.5q-54 54.5-127 86T480-80Zm0-60q142 0 241-99.5T820-480q0-142-99-241t-241-99q-141 0-240.5 99T140-480q0 141 99.5 240.5T480-140Zm0-340Z"/></svg>
                  <span><?php echo e(__("Affiliation")); ?></span>
                </span>

                

              </a>
            </li>

        </ul>

      </div>


    <div class="home_mobile_divider"></div>

      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="/"> <img alt="image" src="/assets/front/img/logo.png" class="header-logo" /> 
            
            </a>
          </div>
          <div class="sidebar-user">
            
          </div>
          <ul class="sidebar-menu">
            
            <li class="dropdown active">
              <a href="/home">
                <i data-feather="airplay"></i><span><?php echo e(__("Dashboard")); ?></span></a>
              
            </li>
            
            <li class="dropdown">
              <a href="/affiliation"><i data-feather="share-2"></i><span><?php echo e(__("Affiliation")); ?></span></a>
              
            </li>
            <li class="dropdown">
              <a href="https://probuysellcoin.com/withdrawal/request"><i data-feather="arrow-left-circle"></i><span><?php echo e(__("Withdraw Earning")); ?></span></a>
              
            </li>
            
            <li class="dropdown">
              <a href="/buyCoin"><i data-feather="shopping-cart"></i><span><?php echo e(__("Buy Coins")); ?></span></a>
              
            </li>
            <li class="dropdown">
              <a href="<?php echo e(route('sellCoin')); ?>"><i data-feather="dollar-sign"></i><span><?php echo e(__("Sell Coins")); ?></span></a>
              
            </li>
            <li class="dropdown">
              <a data-oldUrl="<?php echo e(url('/')); ?>/exchange/first/0/second/0" href="#"><i data-feather="command"></i><span><?php echo e(__("Send Money")); ?></span></a>
              
            </li>
            
            
            
           
            <li class="dropdown">
              <a href="/profile/info"><i
                  data-feather="settings"></i><span><?php echo e(__("Settings")); ?></span></a>
             
            </li>

            <li class="dropdown">
              <a href="/customer_paiement"><i
                  data-feather="database"></i><span><?php echo e(__("Paiement method")); ?></span></a>
             
            </li>

            <li class="dropdown">
              <a href="/doc"><i
                  data-feather="book"></i><span><?php echo e(__("Documentation")); ?></span></a>
             
            </li>
            
            
           
            
            
            
            
           
             
                    </li>
                    <li><a href="/logout"><i data-feather="log-out"></i> <?php echo e(__("Logout")); ?></a></li>
                  </ul>
                </li>
              </ul>
            </li>
          </ul>
        </aside>
      </div>
     
         
        <div class="settingSidebar">
          <a href="javascript:void(0)" class="settingPanelToggle"> <i class="fa fa-spin fa-cog"></i>
          </a>
          <div class="settingSidebar-body ps-container ps-theme-default">
            <div class=" fade show active">
              <div class="setting-panel-header"><?php echo e(__("Setting Panel")); ?>

              </div>
              <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10"><?php echo e(__("Select Layout")); ?></h6>
                <div class="selectgroup layout-color w-50">
                  <label class="selectgroup-item">
                    <input type="radio" name="value" value="1" class="selectgroup-input-radio select-layout" checked>
                    <span class="selectgroup-button"><?php echo e(__("Light")); ?></span>
                  </label>
                  <label class="selectgroup-item">
                    <input type="radio" name="value" value="2" class="selectgroup-input-radio select-layout">
                    <span class="selectgroup-button"><?php echo e(__("Dark")); ?></span>
                  </label>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10"><?php echo e(__("Sidebar Color")); ?></h6>
                <div class="selectgroup selectgroup-pills sidebar-color">
                  <label class="selectgroup-item">
                    <input type="radio" name="icon-input" value="1" class="selectgroup-input select-sidebar">
                    <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                      data-original-title="Light Sidebar"><i class="fas fa-sun"></i></span>
                  </label>
                  <label class="selectgroup-item">
                    <input type="radio" name="icon-input" value="2" class="selectgroup-input select-sidebar" checked>
                    <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                      data-original-title="Dark Sidebar"><i class="fas fa-moon"></i></span>
                  </label>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10"><?php echo e(__("Color Theme")); ?></h6>
                <div class="theme-setting-options">
                  <ul class="choose-theme list-unstyled mb-0">
                    <li title="white" class="active">
                      <div class="white"></div>
                    </li>
                    <li title="cyan">
                      <div class="cyan"></div>
                    </li>
                    <li title="black">
                      <div class="black"></div>
                    </li>
                    <li title="purple">
                      <div class="purple"></div>
                    </li>
                    <li title="orange">
                      <div class="orange"></div>
                    </li>
                    <li title="green">
                      <div class="green"></div>
                    </li>
                    <li title="red">
                      <div class="red"></div>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <div class="theme-setting-options">
                  <label class="m-b-0">
                    <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                      id="mini_sidebar_setting">
                    <span class="custom-switch-indicator"></span>
                    <span class="control-label p-l-10"><?php echo e(__("Mini Sidebar")); ?></span>
                  </label>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <div class="theme-setting-options">
                  <label class="m-b-0">
                    <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                      id="sticky_header_setting">
                    <span class="custom-switch-indicator"></span>
                    <span class="control-label p-l-10"><?php echo e(__("Sticky Header")); ?></span>
                  </label>
                </div>
              </div>
              <div class="mt-4 mb-4 p-3 align-center rt-sidebar-last-ele">
                <a href="#" class="btn btn-icon icon-left btn-primary btn-restore-theme">
                  <i class="fas fa-undo"></i> <?php echo e(__("Restore Default")); ?>

                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="main-footer">
        
        <div class="footer-right">
        </div>
      </footer>
    </div>
  </div>
  
</body>
</html>
        </aside>
</nav> 