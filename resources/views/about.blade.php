<? //@extends('layouts.app')?>



<!DOCTYPE html>

<html lang="en">

<head>



<meta charset="utf-8">

<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<meta name="keywords" content="Bootstrap, Landing page, Template, Business, Service">

<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<meta name="author" content="Grayrids">

<title> {{ setting('site.description') }} </title>



<link rel="shortcut icon" href="/assets/front/img/2.png" type="image/png">



<link rel="stylesheet" href="/assets/front/css/bootstrap-4.5.0.min.css">

<link rel="stylesheet" href="/assets/front/css/animate.css">

<link rel="stylesheet" href="/assets/front/css/LineIcons.2.0.css">

<link rel="stylesheet" href="/assets/front/css/owl.carousel.2.3.4.min.css">

<link rel="stylesheet" href="/assets/front/css/owl.theme.css">

<link rel="stylesheet" href="/assets/front/css/magnific-popup.css">

<link rel="stylesheet" href="/assets/front/css/nivo-lightbox.css">

<link rel="stylesheet" href="/assets/front/css/main.css">

<link rel="stylesheet" href="/assets/front/css/responsive.css">

<link rel="shortcut icon" href="/assets/front/img/2.png" type="image/png">





<link rel="stylesheet" href="/assets/front/css/style.css">



<style>
.read-more-btn{
  border-radius:1px;
  padding: 8px;
  background-color:rgb(3, 131, 148);
  
}

.title{
 font-size:20px;
 font-weight:450;
 color:black;
 margin:20px 0px;
 line-height:35px;
  
}

li,span{
 font-size:18px;

 color:black;

 line-height:30px;
  
}

.container{
    margin-bottom:20px;
}

.intro-img img{
    background-color:white;
    border-radius:50px 0;
}

#navbar-area{
    background-color:blue;
}

#container ul, .description{
  
  padding: 100px;
  background-color: rgb(0 188 215 / 5%);
  padding: 40px;
}

#container ul li{
  list-style: circle;
  margin-bottom:10px;
}
</style>

</head>

<body class="no_styck about_page">
<header class="hero-area">

<div class="overlay">

<span></span>

<span></span>

</div>

@include('menu')



<div id="home">

<div class="container">

<div class="row space-100">

<div class="col-lg-6 col-md-12 col-xs-12">

<div class="contents">

<h2 class="head-title"><br class="d-none d-xl-block">{{__("About Pro Buy Sell Coin")}}</h2>


</div>

</div>

<div class="col-lg-6 col-md-12 col-xs-12 p-0">

<div class="intro-img">

 <?//<img src="/assets/front/img/logo.png" alt="">?>

</div>

</div>

</div>

</div>

</div>

</header>

<div  class="container" id="container">
    <div class="row">
       
        <div class="col-lg-8">
            
            <p class="title">{{__("The Pro Buy Sell Coin platform was designed to meet the needs of people who regularly sell and buy cryptocurrencies and other virtual currencies online. Indeed, they are faced with several challenges, among others:")}}</p>

<p>
  <ul>
    <li>{{__("Difficulties in finding reliable partners, because too many online scammers")}}</li>
    <li>{{__("Difficulty recovering money in case of error")}}</li>
    <li>{{__("Too much hassle to buy or sell their crypto (long procedures to follow)")}}</li>
    <li>{{__("High transaction fees")}}</li>
    <li>{{__("Unaffordable prices (too expensive to buy and too cheaper to sell) with fast transactions")}}</li>
  </ul>
</p>

{{__("")}}

<p class="title">{{__("Why trade on Pro Buy Sell Coin")}}</p>

<p>
  <ul>
    <li>{{__("We have a reliability that is no longer to be demonstrated, thanks to our network of trusted partners established in the different countries where we operate")}}</li>
    <li>{{__("In case of error, we refund the difference; so, with us do your transactions with confidence")}}</li>
    <li>{{__("The purchase and sale procedure is very simplified, which allows you to finalize your transactions in record time (send the money to receive the crypto in the wallet of your choice or sell us your cryptos and receive the money directly into the wallet of your choice)")}}</li>
    <li>{{__("Our prices adapt continuously to the market, in order to allow you to buy or sell at the best rate")}}</li>
    <li>{{__("No fees when sending your cryptos (purchase operation); so you get exactly what you paid for")}}</li>
    <li>{{__("Thanks to our affiliate program, earn incredible commissions for each transaction made by your affiliates, this for life!")}}</li>
    <li>{{__("Quality customer service; you are treated like royalty")}}</li>
  </ul>
</p>

<p class="title">{{__("A team of experienced professionals")}}</p>

<div class="description">
  <span>{{__("Pro Buy Sell Coin is set up by the trader Mimbé Théophile, well known online on cryptocurrency platforms under the name Mimbe237, in collaboration with a team of experienced P2P traders, selected from among the most reliable in the Central and West African zone. the west, in order to bring to the customer an exceptional satisfaction. Only the testimony of our customers can certify the authenticity of our reputation (See the testimonials)")}}</span>
  <span>{{__("We are your best partner for each of your online transactions, always available to serve you. Thank you for your trust !")}}</span>
</div>


                
        </div>

    </div>

</div>



@include('footer')

