<footer>



<section id="footer-Content">

<div class="container">



<div class="row">



<div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 col-mb-12">

<div class="footer-logo">

<img src="https://probuysellcoin.com//assets/front/img/logo.png" alt="">

</div>



<div class="widget">

    <table class="menu dowload_app network_menu">

        <tr>
            <td><a href="#"><img src="https://probuysellcoin.com//assets/front/img/facebook.png" alt=""></a></td>
            <td><a href="#"><img src="https://probuysellcoin.com//assets/front/img/twitter-rounded.png" alt=""></a></td>
            <td><a href="#"><img src="https://probuysellcoin.com//assets/front/img/telegramme.png" alt=""></a></td>
        </tr>

    </table>

</div>



</div>











<div class="col-lg-2 col-md-6 col-sm-6 col-xs-6 col-mb-12">

<div class="widget">

<h3 class="block-title">{{ __('About') }}</h3>

<ul class="menu">

<li><a href="#"> - {{ __('Who we are') }}</a></li>

<li><a href="#">- {{ __('Our team') }}</a></li>

<li><a href="#">- {{ __('Testimonies') }}</a></li>


</ul>

</div>

</div>

<div class="col-lg-2 col-md-6 col-sm-6 col-xs-6 col-mb-12">

<div class="widget">

    <h3 class="block-title">{{ __('Our service') }}</h3>

    <ul class="menu">

    <li><a href="#"> - {{ __('Sell crypto') }}</a></li>

    <li><a href="#">- {{ __('Buy crypto') }}</a></li>

    <li><a href="#">- {{ __('Sending money') }}</a></li>



    </ul>

</div>

</div>



<div class="col-lg-2 col-md-6 col-sm-6 col-xs-6 col-mb-12">

<div class="widget">

    <h3 class="block-title">{{ __('Useful links') }}</h3>

    <ul class="menu">

    <li><a href="#"> - {{ __('How does it work') }}</a></li>

    <li><a href="#">- {{ __('Accepted country') }}</a></li>

    <li><a href="#">- {{ __('Payment methods') }}</a></li>



    </ul>

</div>

</div>





<div class="col-lg-2 col-md-6 col-sm-6 col-xs-6 col-mb-12">

<div class="widget">

<h3 class="block-title">{{ __('Download App') }}</h3>

<table class="menu dowload_app">

    <tr><td><img src="https://probuysellcoin.com//assets/front/img/google-play.png" alt=""></td><td><a href="#"> Play Store</td></a></tr>

    <tr><td><img src="https://probuysellcoin.com//assets/front/img/mac-os.png" alt=""></td><td><a href="#"> App store</td></a></tr>

    <tr><td><img src="https://probuysellcoin.com//assets/front/img/windows-10.png" alt=""></td><td><a href="#">Windows store</td></a></tr>


</table>

</div>

</div>


<div class="col-1">

<div class="widget">



<table class="menu dowload_app">

   

    <tr><td> 

        @php $lang="fr"; @endphp @if(session()->has("lang")) (session()->get("lang")=="fr") ? $lang="en": $lang="fr";  @endif

        <a class="row" style="width:max-content" href="lang/{{@$lang}}" id="lang"><img style="heigh:30px; width:30px;" src="/assets/front/img/<?echo @$lang.".png";?>"  alt="lang"><span style="margin-top:-5px">{{ucfirst(str_replace(["fr","en"],["Francais","English"],@$lang))}}</span></a>

    </td></tr>

    


</table>

</div>

</div>



</div>



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



</section>



</footer>