
<!DOCTYPE html>

<html lang="en">

<head>



<meta charset="utf-8">

<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<meta name="keywords" content="Bootstrap, Landing page, Template, Business, Service">

<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<meta name="author" content="Grayrids">

<title> <?php echo e(setting('site.description')); ?> </title>

<link rel="manifest" href="/assets/js/manifest.json">

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

<link href="https://media.twiliocdn.com/taskrouter/quickstart/agent.css" rel="stylesheet">

<link rel="stylesheet" href="/assets/front/css/style.css">

<style>

#formContainer{
      
      
      margin-left:5%;
      box-shadow:3px 3px 7px rgb(250 250 250);
  }

  .form-element{
    width:inherit;
    
  }

  @media(max-width: 1000px){
  
  #formContainer{
    width: 80%;
    margin-left:10%;
  }

  .form-element{
    width:100%;
  }
}

@media(max-width: 600px){
  
    #formContainer{
      margin-left:0px;
      
      width:100%;
  }

  .form-element{
    width:100%;
  }
}

section li{
  list-style-type:disc;
  font-size:17px;
  margin:5px;
}

/* Debut CSS Ajout*/
.desc-text ul {
    padding-left: 15px;
}
p.section-title {
    font-weight: bold !important;
    font-size: 18px;
}
.desc-text ul li {
    font-size: 15px;
}
.debut .business-item-info {
    margin-bottom: 60px;
    padding: 0 10px;
}
.col.text-center.debut {
    padding: 0px !important;
}
section#autre p.section-title {
    margin-top: 15px;
    margin-bottom: 15px;
    color: white !important;
}
section#autre {
    background: #4b68fd;
    padding: 32px;
    color: white;
}
#s-affiliation .business-item-info h3 {
    font-size: 35px;
    font-weight: 600;
    margin-bottom: 25px;
}
#s-affiliation .business-item-info h4 {
    font-size: 24px;
    font-weight: 400;
    padding-top: 15px;
}
section#s-affiliation {
    padding-left: 60px;
}
#s-affiliation {
    font-size: 16px !important;
}
.col.text-center.debut h3 {
    padding-top: 15px;
}
section#features {
    background: #22be68;
}
section#features h2, section#features .desc-text p {
    color: white;
}
section#business-plan a.btn.btn-common {
    background: white;
    color: #22be68;
    border: solid;
}
#business-plan {
    padding-bottom: 60px !important;
}
.image img {
    max-width: 150px;
}
.image1 img {
    max-width: 100px;
}
section#features .feature-icon.image1 {
    background: none !important;
    border: none;
}
#features .featured-bg {
    background: none;
}
#features .featured-bg .feature-info h4, #features .featured-bg .feature-info p {
    color: white;
}
section#autre .image {
     margin-top: 15px;
}
.container.item2 {
    margin-top: 32px;
}
</style>

</head>

<body>

<?php $disable=str_replace(["0","1"],["disabled",""],$admin_online[0]->status);?>


<header class="hero-area">

<div class="overlay">

<span></span>

<span></span>

</div>

<?php echo $__env->make('menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>



<div id="home">

<div class="container">

<div class="row space-100">

<div class="col-lg-6 col-md-12 col-xs-12">

<div class="contents">

<h2 class="head-title"><br class="d-none d-xl-block"><?php echo e(__("Buy and sell your BTC, USDT and other virtual currencies at the best price with Pros traders")); ?></h2>

<p><?php echo e(__("Buy and sell your BTC or USDT securely, wherever you are and whenever you want; We are a team of professionals in buying and selling popular cryptocurrencies and digital currencies (BTC, USDT, Payeer, Perfect Money, Paypal and much more). Satisfaction guaranteed")); ?>


</p>

<div class="header-button">

<?php if(!Auth::check()): ?>

  <a href="/register" rel="nofollow" class="btn btn-border-filled"><?php echo e(__("Register")); ?></a>

<?php else: ?>
  <a href="/home" rel="nofollow" class="btn btn-border-filled"><?php echo e(__("Dashboard")); ?></a>
<?php endif; ?>

<a href="/about" class="btn btn-border page-scroll"><?php echo e(__("Documentation")); ?></a>

</div>

</div>

</div>

<div class="col-lg-6 col-md-12 col-xs-12 p-0">

<div class="intro-img">

<img src="/assets/front/img/business/business-img.png" alt="">

</div>

</div>

</div>

</div>

</div>

</header>


<section id="business-plan">
  <div class="col text-center debut" >
   
    <div class="business-item-info">
<div class="image text-center">
  <img src="https://probuysellcoin.com/assets/front/img/exchange.png" class="rounded" alt="BUY SELL COIN">
</div>
      <h3><?php echo e(__("Start a transaction with the Pros traders and experience the difference")); ?> </h3>
      
      <p><?php echo e(__("Don't run the risk of being scammed online when buying or selling your cryptos! With us, don't worry. Fast, secure and low-cost transactions")); ?>.</p>
    
      
      </div>
    
    </div>


    

<div id="services" class="container" >




<div class="row justify-content-md-center">

      <div class="col col-lg-1">

      </div>
      <div class="col-md-auto" id="formContainer">


      <?php if($admin_online[0]->status=="10"): ?>

        <div class="card bg-orange"  id="online">

            <div class="header">

              <div class="onlineIco isOnline row">

                <p class="col ico">
                    <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 -960 960 960" width="48"><path d="M243.044-351.956 173.5-419.935q62.5-62.5 140.5-100.782Q392-559 480-559q87.5 0 165.75 38T786.5-421l-69.044 69.044q-48.804-47.174-109.293-77.609Q547.674-459.999 480-459.999t-128.163 30.434q-60.489 30.435-108.793 77.609Zm-163.5-163.5L10-584.5q94-96 214.75-151.5T480-791.5q134.5 0 255.25 55.5T950-584.5l-69.044 69.044q-83.869-78.239-185.826-127.641Q593.174-692.499 480-692.499q-113.174 0-215.13 49.402-101.957 49.402-185.326 127.641ZM480-114.5 331.5-264q29.5-29.5 67.75-46T480-326.5q42.5 0 80.75 16.5T629-264L480-114.5Z"/></svg>
                </p>
                    
                <div class="col description">

                    <p class="title">
                        <?php echo e(__("Administrators are offline")); ?>

                    </p>

                    <span class="detail"><?php echo e(__("Below are our service times")); ?><br> <span ><?php echo e(__("Monday - Saturday: 8a.m - 10p.m")); ?> <br> <?php echo e(__("Sunday: 12p.m - 8p.m")); ?> </span><br>
                        <br><span style="font-weight:bold;"><?php echo e(__("For any emergency, please contact us by WhatsApp at this number")); ?> <a style="color:white;" class="underline" href="https://wa.me/<?php echo e(DB::table('phone_support')->find(1)->phone); ?>" target="_blank"><?php echo e(DB::table('phone_support')->find(1)->phone); ?></a></span>
                    </span>

                </div>
              </div>

            </div>
          
        </div>

        <?php endif; ?>
        <div style="display:flex; background-color:rgb(245,245,245); font-seize:18px; width:100%; user-select:none;"  class="crypto-form-menu form-element">

          <p id="buy-menu-item" style="width:100%; text-align:center; padding:19px; background-color:white; border:1px solid rgb(240,240,240);"><?php echo e(__("Buy")); ?></p>
          <p id="sell-menu-item" style="width:100%; text-align:center; padding:19px;"><?php echo e(__("Sell")); ?></p>
          
        </div>
        
        <div  class=" justify-content-center justify-content-md-start">
        
        
        
        
        <div id="buyCrypto" class="form-element">
        
        
        <div class="services-item">
        
        
        
        <h4><?php echo e(__("Buy Crypto")); ?></h4>
        
        <div class="body">
        
                  <form class="crypto-form" id="buy_crypto" action="<?php echo e(route('postBuyCryptoConfirm')); ?>" method="post" enctype="multipart/form-data">
        
                        <?php echo e(csrf_field()); ?>

        
                        <div class="row">
        
                            <div class="col-lg-6  col-sm-6 col-xs-12">
        
                              <div class="form-group">
        
                                <label for="deposit_method"><?php echo e(__("Select Currency")); ?></label>
        
                                <select <?php echo e($disable); ?> class="form-control select_coin" name="coin_id" required="">
        
                                  <option value="0">-select-</option>
        
                                  <?php $__currentLoopData = $coins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        
                                    <option data-wallet_address="<?php echo e($value->wallet_adress); ?>" data-price="<?php echo e($value->sell_price); ?>" value="<?php echo e($value->id); ?>"><?php echo e($value->coin_name); ?></option>
        
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
                                </select>
        
                              </div>
        
                            </div>
        
                            <div class="col-lg-6  col-sm-6 col-xs-12">
        
                                <div class="form-group">
        
                                  <label for="deposit_method"><?php echo e(__("Exchange Rate")); ?></label>
        
                                  <div class="input-group mb-3">
        
                                    <input <?php echo e($disable); ?> type="text" value="" class="form-control exchange_rate" readonly="" required="" name="exchange_rate">
        
                          <span class="input-group-text" id="basic-addon1">XAF/USD</span>
        
                      </div>
        
                                </div>
        
                            </div>
        
                         </div>
        
                         <div class="row">
        
                            <div class="col-lg-6  col-sm-6 col-xs-12">
        
                                <div class="form-group">
        
                                  <label <?php echo e($disable); ?> for="deposit_method"><?php echo e(__("Amount (USD)")); ?></label>
        
                                  <input <?php echo e($disable); ?> type="text" value="" class="form-control amount" required="" name="amount">
        
                                </div>
        
                            </div>
        
                            <div class="col-lg-6  col-sm-6 col-xs-12">
        
                                <div class="form-group">
        
                                  <label for="deposit_method"><?php echo e(__("Amount of crypto to buy")); ?></label>
        
                                  <input <?php echo e($disable); ?> type="text" value="" class="form-control crypto_amount" readonly="" required="" name="crypto_amount">
        
                                </div>
        
                            </div>
        
                        </div>
        
                        <div class="row">
        
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        
                                <div class="form-group">
        
                                  <label id="data_user_adresse" data-user-adresse="<?php echo e(json_encode($custom_method)); ?>" for="deposit_method"><?php echo e(__("Crypto wallet address")); ?></label>
        
                                  <div class="input-group mb-3" style="margin-bottom:-20px!important;">
                                    
                                        <select <?php echo e($disable); ?> style="display:none; text-align:left" class=" input-group-text form-control" name="wallet_address" id="buy_custom_paiemen" style="text-align:left">

                                        </select><br>

                                        <span style="display:none;" class="copieur input-group-text" id="add_method" data-toggle="modal" data-target="#exampleModalCenter" title="Ajouter une adresse">

                                        <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M519-405h66v-122h122v-66H585v-122h-66v122H397v66h122v122ZM333.615-250q-38.34 0-64.478-26.137Q243-302.275 243-340.615v-438.77q0-38.34 26.137-64.478Q295.275-870 333.615-870h438.77q38.34 0 64.478 26.137Q863-817.725 863-779.385v438.77q0 38.34-26.137 64.478Q810.725-250 772.385-250h-438.77Zm0-66h438.77q9.231 0 16.923-7.692Q797-331.385 797-340.615v-438.77q0-9.23-7.692-16.923Q781.616-804 772.385-804h-438.77q-9.23 0-16.923 7.692Q309-788.615 309-779.385v438.77q0 9.23 7.692 16.923Q324.385-316 333.615-316Zm-146 212q-38.34 0-64.478-26.137Q97-156.275 97-194.615v-504.77h66v504.77q0 9.231 7.692 16.923Q178.384-170 187.615-170h504.77v66h-504.77ZM309-804v488-488Z"/></svg>

                                    </span>

                                  </div>
                                
                                  <p id="custom_wallet_adresse" data-toggle="modal" data-target="#exampleModalCenter" value="" class="form-control" style="color:gray; font-size:16px;">Ajouter une adresse</p>

                                  <input <?php echo e($disable); ?> id="buy_pay_address" type="hidden" name="wallet_address">

                                  <input <?php echo e($disable); ?> type="hidden" value="1" name="custom_method" id="custom_method">

                                  <div class="modal custom_crypto_adresse_modal" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

                                  <div class="modal-dialog modal-dialog-centered" role="document">

                                    <div class="modal-content">

                                      <div class="modal-header">

                                        <h5 class="modal-title" id="exampleModalLongTitle">Ajouter une adresse de porte feuille</h5>

                                        <button  type="button" class="close" data-dismiss="modal" aria-label="Close">

                                          <span aria-hidden="true">&times;</span>

                                        </button>

                                      </div>

                                      <div class="modal-body" style="text-align:left">

                                      <div class="mb-3">

                                        <label for="type" class="form-label">Type</label>

                                        <select <?php echo e($disable); ?> name="type" class="form-control" id="type">
                                          
                                          <option value="cryptomonaie">Cryptomonaie</option>

                                        </select>

                                        </div>

                                        <div class="mb-3">

                                        <label for="nom" class="form-label">Nom ou operateur de la methode</label>
                                        
                                        <select <?php echo e($disable); ?> name="nom" class="form-control" id="nom">
                                        
                                        
                                          
                                        </select>

                                        </div>

                                        
                                        <div class="mb-3">

                                          <label for="adresse" class="form-label"><?php echo e(__("Adresse de paiement*")); ?></label>

                                          <input <?php echo e($disable); ?> name="number" type="text" class="form-control required" id="adresse" required placeholder="" >

                                        </div>

                                        <div class="mb-3">

                                          <label for="adresse" class="form-label"><?php echo e(__("Nom ou Informations sur le compte*")); ?></label>

                                          <textarea <?php echo e($disable); ?> name="detail" required class="form-control required" id="detail" style="border:1px solid #e4e6fc;" ></textarea>

                                        </div>

                                      </div>

                                      <div class="modal-footer">

                                        <button  type="button" class="btn btn-secondary custom_pay_validator" style="background-color:green; color:white; font-weight:normal" data-dismiss="modal">Valider</button>
                                        
                                      </div>

                                    </div>

                                  </div>
        
                                </div>
                              </div>
                            </div>
                          
        
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        
                              <div class="form-group">
        
                                <label for="pay_method"><?php echo e(__("Pay method")); ?></label>
        
                                <select <?php echo e($disable); ?> id="pay_method" class="form-control select_coin" name="pay_method" required="">
        
                                  <option>-select-</option>
        
                                  <?php $__currentLoopData = $deposit; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $method): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  
                                    <option value="<?php echo e($method->name); ?>"><?php echo e($method->name); ?></option>
        
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                             
                                </select>
                              </div>
                            </div>
        
                        </div>
        
                        <div class="row">
        
                          <div class="col-sm-3">
        
                            
        
                          </div>
        
                        </div>
        
                        <div class="clearfix"></div>

                    <div class="text-center">

                    <br><br>

                    <?php if($disable=="disabled"): ?>


                      <p <?php echo e($disable); ?> data-toggle="modal" data-target="#offlinemodal" type="submit" class="btn btn-common submit_form" id="submit" style="color:white;"><?php echo e(__('Submit')); ?></p>

                    <?php else: ?>

                      <button  type="submit" class="btn btn-common submit_form" id="submit"><?php echo e(__('Submit')); ?></button>

                    <?php endif; ?>

                       
                      </div>
        
                  </form>
        
                </div>
        
        </div>
        
        </div>
        
        
        
        
        
        
        
        
        
        <div style="display:none;" id="sellCrypto" class="">
        
        <div class="services-item">
        
        
        
        <h4><?php echo e(__("Sell Crypto")); ?></h4>
        
        <div class="body">
        
                  <form class="crypto-form" id="sell_crypto" action="<?php echo e(route('postSellCryptoConfirm')); ?>" method="post" enctype="multipart/form-data">
        
                        <?php echo e(csrf_field()); ?>

        
                        <div class="row">
        
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        
                              <div class="form-group">
        
                                <label for="deposit_method"><?php echo e(__("Select Currency")); ?></label>
        
                                <select <?php echo e($disable); ?> class="form-control select_coin" name="coin_id" required="">
        
                                  <option value="0">-select-</option>
        
                                    <?php $__currentLoopData = $coins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        
                                      <option data-wallet_address="<?php echo e($value->wallet_address); ?>" data-price="<?php echo e($value->price); ?>" value="<?php echo e($value->id); ?>"><?php echo e($value->coin_name); ?></option>
        
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
                                </select>
        
                              </div>
        
                            </div>
        
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        
                                <div class="form-group">
        
                                  <label for="deposit_method"><?php echo e(__("Exchange Rate")); ?></label>
        
                                    <div class="input-group mb-3">
        
                                      <input <?php echo e($disable); ?> type="text" value="" class="form-control exchange_rate" readonly="" required="" name="exchange_rate">
        
                                      <span class="input-group-text" id="basic-addon1">XAF/USD</span>
        
                                  </div>
        
                                </div>
        
                            </div>
        
                        </div>
        
                        <div class="row">
        
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        
                                <div class="form-group">
        
                                  <label for="deposit_method"><?php echo e(__("Amount (USD)")); ?></label>
        
                                  <input <?php echo e($disable); ?> type="text" value="" class="form-control amount" required="" name="amount">
        
                                </div>
        
                            </div>
        
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        
                                <div class="form-group">
        
                                  <label for="deposit_method"><?php echo e(__("Amount of crypto to sell")); ?></label>
        
                                  <input <?php echo e($disable); ?> type="text" value="" class="form-control crypto_amount" readonly="" required="" name="crypto_amount">
        
                                </div>
        
                            </div>
        
                        </div>
        
                        <div class="row">
        
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        
                                <div class="form-group">
        
                                  <label for="deposit_method"><span class="crypto_name"></span> <?php echo e(__("Crypto wallet address")); ?></label>
        
                                  <input <?php echo e($disable); ?> style="height:max-content;" type="text" value="" readonly="" class="form-control wallet_address" required="" name="wallet_address">
        
                                </div>
        
                            </div>
        
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        
                              <div class="form-group">
        
                                <label for="pay_method"><?php echo e(__("Payment method")); ?></label>
        
                                <select <?php echo e($disable); ?> id="pay_method" class="form-control select_coin" name="pay_method" required="">
        
                                  <option value="0">-select-</option>
        
                                    <?php $__currentLoopData = $deposit; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $method): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    
                                      <option value="<?php echo e($method->name); ?>"><?php echo e($method->name); ?></option>
        
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                         
                                </select>
                              </div>
                            </div>
        
                        </div>
        
                        <div class="row">
        
                            <div class="col-sm-3">
                            </div>
        
                        </div>
        
                        <div class="clearfix"></div>
                        <div class="text-center">
                        <br><br><button <?php echo e($disable); ?> class="btn btn-common submit_form" id="submit" type="submit"><?php echo e(__("Submit")); ?></button></div>
                  </form>
        
                </div>
        
        </div>
        
        </div>
        
        </div>
      </div>
      <div class="col col-lg-2">
    
      </div>

</div>
</div>
</section>
<section id="autre">
<div class="col" >
<div class="container list-info" >
  <div class="row">
    <div class="col-md-4">
        <div class="image">
  <img src="https://probuysellcoin.com/assets/front/img/shop.png" class="rounded" alt="BUY SELL COIN">
</div>
      <p class="section-title" style="font-weight:450; color:black; font-size:22px;"><?php echo e(__("What you can buy or sell")); ?></p>

  <div class="desc-text">

  <ul>
    <li>BTC</li>
    <li>USDT</li>
    <li>USDC</li>
    <li>Paypal</li>
    <li>Perfect Money</li>
    <li>Payeer</li>
    <li>Solde RAGP XAF ou XOF</li>
  </ul>
    </div>
  </div>
    <div class="col-md-4">
           <div class="image">
  <img src="https://probuysellcoin.com/assets/front/img/money-bag.png" class="rounded" alt="BUY SELL COIN">
</div>
      <p class="section-title" style="font-weight:450; color:black; font-size:22px;"><?php echo e(__("Payment methods accepted")); ?></p>

  <div class="desc-text">

  <ul>
    <li >MTN Money</li>
    <li>Orange Money</li>
    <li>Solde RAGP XAF ou XOF</li>
    <li>Virement Bancaire UBA ou cobank</li>
    <li>Touch UV</li>
    
  </ul>
    </div>Start a transaction with the Pros traders and experience the difference
  </div>
    <div class="col-md-4">
           <div class="image">
  <img src="https://probuysellcoin.com/assets/front/img/worldwide.png" class="rounded" alt="BUY SELL COIN">
</div>
      <p class="section-title" style="font-weight:450; color:black; font-size:22px;"><?php echo e(__("Countries concerned")); ?></p>

  <div class="desc-text">

  <ul>
    <li>Zone CEMAC (Cameroun, République centrafricaine, République du
Congo, Gabon, Guinée équatoriale, Tchad</li><br>
    <li>Zone UEMOA (Bénin, Burkina Faso, Côte d'Ivoire, Guinée-Bissau,
Mali, Niger, Sénégal, Togo)</li>
    
  </ul>

  </div>
    </div>
  </div>
</div>
</div> 

</section>

<section id="business-plan">

<div class="container item2">

<div class="row">



<div class="col-lg-6 col-md-12 pl-0 pt-70 pr-5">

<div class="business-item-img">

<img src="/assets/front/img/app-mockup.png" class="img-fluid" alt="">

</div>

</div>





<div class="col-lg-6 col-md-12 pl-4">

<div class="business-item-info">

<h3><?php echo e(__("Receive your Bitcoins or USDT directly in your wallet")); ?> </h3>

<p><?php echo e(__("Buy your BTC or USDT with the payment method that suits you best you prefer (MTN Money, Orange Money, Touch UV, Solde balance, RAGP XAF or XOF, bank transfer, etc.) and receive the funds directly into the wallet of your choice as soon as you you make the payment. Transaction fees are at our expense")); ?>.</p>

<a class="btn btn-common" href="#"><?php echo e(__("STARTING")); ?></a>

</div>

</div>



</div>

</div>

</section>





<section id="features" class="section">

<div class="container">



<div class="row">

<div class="col-lg-12">

<div class="features-text section-header text-center transanction">

<div>

<h2 style="line-height:46px;" class="section-title"><?php echo e(__("The advantages of choosing us as your transaction partner")); ?></h2>

<div class="desc-text">

<p><?php echo e(__("Whether you are in Cameroon, Gabon, Central African Republic, Burkina Faso, Ivory Coast, Senegal or any other country in the XOF or XAF zone, there are many advantages to choosing us as your transaction partner")); ?></p>

</div>

</div>

</div>

</div>

</div>





<div class="row featured-bg">



<div class="col-lg-6 col-md-6 col-xs-12 p-0">



<div class="feature-item ">

<div class="feature-icon image1 float-left">

  <img src="https://probuysellcoin.com/assets/front/img/trophy.png" class="rounded" alt="BUY SELL COIN">
</div>

<div class="feature-info float-left">

<h4><?php echo e(__("We are reliable")); ?></h4>

<p><?php echo e(__("We have a proven reputation for being the best. the best. See testimonials")); ?></p>

</div>

</div>



</div>





<div class="col-lg-6 col-md-6 col-xs-12 p-0">



<div class="feature-item ">

<div class="feature-icon image1 float-left">

  <img src="https://probuysellcoin.com/assets/front/img/analytics.png" class="rounded" alt="BUY SELL COIN">
</div>


<div class="feature-info float-left">

<h4><?php echo e(__("We are fast")); ?></h4>

<p><?php echo e(__("As soon as you initiate a transaction, we finalise it as quickly as possible")); ?></p>

</div>

</div>



</div>





<div class="col-lg-6 col-md-6 col-xs-12 p-0">



<div class="feature-item ">

<div class="feature-icon image1 float-left">

  <img src="https://probuysellcoin.com/assets/front/img/anonymous.png" class="rounded" alt="BUY SELL COIN">
</div>


<div class="feature-info float-left">

<h4><?php echo e(__("The customer is the KING")); ?></h4>

<p><?php echo e(__("Every transaction is a pleasure and the satisfaction of our customers is a priority")); ?></p>

</div>

</div>



</div>





<div class="col-lg-6 col-md-6 col-xs-12 p-0">



<div class="feature-item ">

<div class="feature-icon image1 float-left">

  <img src="https://probuysellcoin.com/assets/front/img/wallet-buy.png" class="rounded" alt="BUY SELL COIN">
</div>


<div class="feature-info float-left">

<h4><?php echo e(__("Simplified purchasing procedures")); ?></h4>

<p><?php echo e(__("When you buy, we send your cryptos directly to your wallet")); ?></p>

</div>

</div>



</div>





<div class="col-lg-6 col-md-6 col-xs-12 p-0">



<div class="feature-item ">

<div class="feature-icon image1 float-left">

  <img src="https://probuysellcoin.com/assets/front/img/wallet.png" class="rounded" alt="BUY SELL COIN">
</div>


<div class="feature-info float-left">

<h4><?php echo e(__("Simplified sales procedure")); ?></h4>

<p><?php echo e(__("Send your cryptos directly to our Wallet, and receive your money quickly via the payment method of your choice of your choice")); ?></p>

</div>

</div>



</div>





<div class="col-lg-6 col-md-6 col-xs-12 p-0">



<div class="feature-item ">

<div class="feature-icon image1 float-left">

  <img src="https://probuysellcoin.com/assets/front/img/Simpole.png" class="rounded" alt="BUY SELL COIN">
</div>


<div class="feature-info float-left">

<h4><?php echo e(__("Limit the hassle")); ?></h4>

<p><?php echo e(__("There's no need to put up with the hassle of platforms imposing lengthy lengthy procedures! We make it simple with us")); ?></p>

</div>



</div>



</div>



</div>

</section>


<section id="s-affiliation" class="section">
  <div class="container">

    <div class="row">
    
    
    
    <div class="col-lg-6 col-md-12 pl-0 pr-5">
    
      <div class="business-item-info">
    
        <h3><?php echo e(__("Our generous affiliate program")); ?> </h3>
        <p><?php echo e(__("Earn extra income with our generous affiliate program. With Pro Buy Sell Coin, every transaction made by your affiliates will earn you money for life.")); ?> </p>
        
        <h4><?php echo e(__("How does it work in practice?")); ?></h4>
    
    <div class="desc-text">
        <ul>
          <li><?php echo e(__("Sign up for free to get your affiliate link")); ?></li>
          <li><?php echo e(__("Share this link with your friends or on your different social media platforms (Facebook, WhatsApp, Twitter, ...)")); ?></li>
          <li><?php echo e(__("Each person who registers by clicking on your link automatically becomes your affiliate.")); ?></li>
          <li><?php echo e(__("With each successful purchase or sale transaction made by your affiliate, you will automatically receive 0.4% of the transaction amount, in perpetuity!")); ?></li>
          <li><?php echo e(__("You can withdraw your winnings whenever you want and you will receive your money via the payment method of your choice.")); ?></li>
        </ul>
    
    </div>
    
    <p><a class="color-blue" href="/register"><?php echo e(__("Register")); ?> </a><?php echo e(__("now and start a new adventure with us.")); ?></p><br>
        
        </div>
        
        </div>
        
    
    <div class="col-lg-6 col-md-12 pl-4">
      <div class="business-item-img">
    
        <img src="/assets/front/img/intro.png" class="img-fluid" alt="">
        
        </div>
    
    </div>
    
    </div>
  </div>
</section>


<?php if($disable=="disabled" && Auth::check()): ?>

  <?php echo $__env->make('coins.offlineModal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php endif; ?>


<?php echo $__env->make('footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>





<a href="#" class="back-to-top">

<i class="lni lni-chevron-up"></i>

</a>



<div id="preloader">

<div class="loader" id="loader-1"></div>

</div>




<script src="/assets/front/js/global.js"></script>

<script type="text/javascript">


	document.addEventListener('DOMContentLoaded',function(){

    custom_method_manager();

  const sellItem=document.getElementById("sell-menu-item");

  const buyItem=document.getElementById("buy-menu-item");

  const buyForm=document.getElementById("buyCrypto");

  const sellForm=document.getElementById("sellCrypto");


  function displayBuyForm(){

    buyForm.style.display="block";
    sellForm.style.display="none";

    buyItem.style.borderColor="rgb(240,240,240)";
    buyItem.style.backgroundColor="white";

    sellItem.style.borderColor="white";
    sellItem.style.backgroundColor="rgb(245,245,245)";

   
  }

  function displaySellForm(){
    buyForm.style.display="none";

    sellForm.style.display="block";

    sellItem.style.borderColor="rgb(240,240,240)";

    sellItem.style.backgroundColor="white";

    buyItem.style.boderColor="white";

    buyItem.style.backgroundColor="rgb(245,245,245)";
    
  }

  addEvent(sellItem,'click',()=>{
    displaySellForm();
    
  })

  addEvent(buyItem,'click',()=>{
    displayBuyForm();
   
  })

  addEvent(document.getElementById("buy_menu"),'click',()=>{
    displayBuyForm();
   
  })

  addEvent(document.getElementById("sell_menu"),'click',()=>{
    displaySellForm();
   
  })

  addEvent(document.getElementById("buy_menu1"),'click',()=>{
    displayBuyForm();
   
  })

  addEvent(document.getElementById("sell_menu1"),'click',()=>{
    displaySellForm();
   
  })

  if($('#offlinemodal')){
  
    $('#offlinemodal').modal('show');

  }

    

		/*$('body').on('change','.select_coin',function(event){

			var coin = $(this).find(':selected').val();

			var price = $(this).find(':selected').attr('data-price');

			$('body').find('.exchange_rate').val(price);

		});

		$('body').on('keyup','.amount',function(event){

			calculate();

		});

		var calculate = function()

		{

			var exchange_rate = $('body').find('.exchange_rate').val();

			exchange_rate  = (exchange_rate) ? exchange_rate:0;

			var amount = $('body').find('.amount').val();

			amount = (amount && amount > 0) ? amount:0;

			var crypto_amount = 0;

			if(amount > 0)

			{

				crypto_amount = parseFloat(amount * exchange_rate);

			}

			// if(amount == 1)

			// {

			// 	crypto_amount = exchange_rate;

			// }

			$('body').find('.crypto_amount').val(crypto_amount);

		}*/

	},false);

</script>



<script src="/assets/front/js/vendor/modernizr-3.7.1.min.js"></script>

<script src="/assets/front/js/vendor/jquery-3.5.1-min.js"></script>

<script src="/assets/front/js/popper.min.js"></script>

<script src="/assets/front/js/bootstrap-4.5.0.min.js"></script>

<script src="/assets/front/js/owl.carousel.2.3.4.min.js"></script>

<script src="/assets/front/js/nivo-lightbox.js"></script>

<script src="/assets/front/js/jquery.magnific-popup.min.js"></script>

<script src="/assets/front/js/form-validator.min.js"></script>

<script src="/assets/front/js/contact-form-script.js"></script>

<script src="/assets/front/js/main.js"></script>





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

</body>

</html>