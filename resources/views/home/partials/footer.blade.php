<footer id="home-footer">
    <div class="container texte-white">

        <span class="title">{{__("Our service hours")}}</span>

        <div class="">
            
            <span class="timing">{{__("Monday - Saturday: 8a.m - 10p.m")}} </span>
        
            <span class="timing">  {{__("Sunday: 12p.m - 8p.m")}}</span>
            
        </div>
        <div class="link row">
            <div class="col-1"><img src="/assets/front/img/whatsapp.png" alt=""></div>
            <a class="col-11" href="https://wa.me/{{DB::table('phone_support')->find(1)->phone}}" target="_blank">{{__("Need help? click here to contact us on whatsApp at")}} {{DB::table('phone_support')->find(1)->phone}}</a>
        </div>

        <br>

        @php $lang="fr"; @endphp @if(session()->has("lang")) session()->get("lang")=="fr" ? $lang="en":$lang="fr"; @endif

        <a style="text-align:center; color:white; display: flex; justify-content: center;" href="lang/{{$lang}}" id="lang"><img style="heigh:30px; width:30px; " src="/assets/front/img/@php echo $lang.".png"; @endphp"  alt="lang">{{ucfirst(str_replace(["fr","en"],["Francais","English"],$lang))}}</a>
    
    
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