<div class="navbar-area">

    <div class="container">

        <div class="row">

            <div class="col-lg-12">

                <nav class="navbar navbar-expand-lg">

                    <a class="navbar-brand" href="/">

                        <img src="/assets/front/img/logo.png" alt="Logo">

                    </a>

                    <button class="navbar-toggler" type="button"
                        data-toggle="collapse"
                        data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">

                        <span class="toggler-icon"></span>

                        <span class="toggler-icon"></span>

                        <span class="toggler-icon"></span>

                    </button>

                    <div class="collapse navbar-collapse sub-menu-bar"
                        id="navbarSupportedContent">

                        <ul id="nav" class="navbar-nav ml-auto">

                            <li class="nav-item active">

                                <a class="page-scroll"
                                    href="/"><?php echo e(__('Home')); ?></a>

                            </li>

                            <li class="nav-item" id="buy_menu"
                                class="buy_menu">

                                <a class="page-scroll"
                                    href="/#services"><?php echo e(__('Buy')); ?></a>

                            </li>

                            <li class="nav-item" id="sell_menu"
                                class="sell_menu">

                                <a class="page-scroll"
                                    href="/#services"><?php echo e(__('Sell')); ?></a>

                            </li>

                            <li class="nav-item">

                                <a class="page-scroll"
                                    href="/about"><?php echo e(__('About')); ?></a>

                            </li>




                            <li class="nav-item">

                                <a class="page-scroll"
                                    href="/blogs"><?php echo e(__('Guide')); ?></a>

                            </li>



                            <li class="nav-item">

                                <a class="page-scroll" href="/#s-affiliation">
                                    <?php echo e(__('Affiliation')); ?></a>

                            </li>

                            <li class="nav-item">



                                <?php if(Auth::check()): ?>
                                    <a class="page-scroll"
                                    href="/home"><?php echo e(__('Dashboard')); ?></a>
                                <?php else: ?>
                                    <a class="page-scroll"
                                    href="/register"
                                    rel="nofollow"><?php echo e(__('Sign in')); ?></a>
                                <?php endif; ?>

                            </li>



                            <li class="nav-item">

                                <?php if(Auth::check()): ?>
                                    <a class="btn btn-singin"
                                    href="<?php echo e(Route('logout', 'en')); ?>"
                                    rel="nofollow"><?php echo e(__('Logout')); ?></a>'
                                <?php else: ?>
                                    <a class="btn btn-singin"
                                    href="/login"
                                    rel="nofollow"><?php echo e(__('Log in')); ?></a>
                                <?php endif; ?>

                            </li>

                            <li class="nav-item">

                                <a href="lang/<?php echo e(session()->get("lang", "fr")); ?>" id="lang">
                                    <img
                                        style="heigh:30px; width:30px;"
                                        src="/assets/front/img/<?php echo e(session()->get("lang", "fr")); ?>.png"
                                    alt="lang"><?php echo e(ucfirst(session()->get("lang"))); ?></a>

                            </li>

                        </ul>

                    </div>

                </nav>

            </div>

        </div>

    </div>

</div>

<div class="mobile_menu welcome_mobile_menu">
    <ul class="row">
        <li id="buy_menu1">
            <a href="/#services"><?php echo e(__('Buy')); ?></a>
        </li>

        <li id="sell_menu1">
            <a href="/#services"><?php echo e(__('Sell')); ?></a>
        </li>

        <li id="sell_menu1">
            <a href="/affiliation"><?php echo e(__('Affiliation')); ?></a>
        </li>


    </ul>
</div>
