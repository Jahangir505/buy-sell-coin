<footer id="home-footer">
    <div class="container texte-white">

        <span class="title"><?php echo e(__("Our service hours")); ?></span>

        <div class="">
            
            <span class="timing"><?php echo e(__("Monday - Saturday: 8a.m - 10p.m")); ?> </span>
        
            <span class="timing">  <?php echo e(__("Sunday: 12p.m - 8p.m")); ?></span>
            
        </div>
        <div class="link row">
            <div class="col-1"><img src="/assets/front/img/whatsapp.png" alt=""></div>
            <a class="col-11" href="https://wa.me/<?php echo e(DB::table('phone_support')->find(1)->phone); ?>" target="_blank"><?php echo e(__("Need help? click here to contact us on whatsApp at")); ?> <?php echo e(DB::table('phone_support')->find(1)->phone); ?></a>
        </div>

        <br>

        <?php $lang="fr"; ?> <?php if(session()->has("lang")): ?> session()->get("lang")=="fr" ? $lang="en":$lang="fr"; <?php endif; ?>

        <a style="text-align:center; color:white; display: flex; justify-content: center;" href="lang/<?php echo e($lang); ?>" id="lang"><img style="heigh:30px; width:30px; " src="/assets/front/img/<?php echo $lang.".png"; ?>"  alt="lang"><?php echo e(ucfirst(str_replace(["fr","en"],["Francais","English"],$lang))); ?></a>
    
    
        <div class="copyright">

        <div class="container">



        <div class="row">

        <div class="col-md-12">

        <div class="site-info text-center">

            <a href="">Copyright © 2023 Pro Buy Sell Coin by BEONWEB | </a>

            <a href="">All Rights Reserved | </a>

            <a href="/confidentialite">Conditions générales d'utilisation | </a>

            <a href="/confidentialite">Avis de confidentialité</a>

        </div>

        </div>



        </div>



        </div>

        </div>
    
    </div>
</footer>