<?php $__env->startSection('content'); ?>

<div class="row buy_sell_page">

  <style>
    select:focus{
      border: 1px solid #E9F6EC;

    }

    input:read-only {
    background-color: #e9f6ec38; /* Change to your desired readonly background color */
  }
  </style>


  <?php $disable=str_replace(["0","1"],["disabled",""],$admin_online[0]->status); ?>

  

    <?php echo $__env->make('partials.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <div class="col-md-9 padding-right" id="#sendMoney">

      <?php echo $__env->make('flash', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

      <div class="card">

        <div class="header">

            <h2><strong><?php echo e(__("Buy Coins")); ?></strong></h2>

        </div>

        <p class="a_overview ">
          <?php echo e(__("Buy your virtual currency safely with us at the best price, and receive the money directly via the payment method that suits you.")); ?>

        </p>

        <div class="body">

          <form  class="crypto-form" id="buy_crypto" action="<?php echo e(route('postBuyCryptoConfirm')); ?>" method="post" enctype="multipart/form-data">

                <?php echo e(csrf_field()); ?>


                <div class="row">

                  	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

                      <div class="form-group">

                        <label for="deposit_method" class=""><?php echo e(__("Select Currency")); ?></label>

                        <div class="input-group mb-3">

                          <select <?php echo e($disable); ?> class="form-control select_coin" name="coin_id" required="" style="z-index: 999; position: relative; background: transparent; margin-right: 15px; border: 2px solid #E9F6EC;">

                            <option>-select-</option>
  
                                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  
                                      <option data-wallet_address="<?php echo e($value->wallet_address); ?>" data-price="<?php echo e($value->price); ?>" value="<?php echo e($value->id); ?>"><?php echo e($value->coin_name); ?></option>
  
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
  
                          </select>
                          <span class="input-group-text" id="basic-addon1" style="margin-left: -3px; background: #E9F6EC; padding: 0 25px; position: absolute; right:0;"></span>
                        </div>

                      </div>

                    </div>

                  	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

                        <div class="form-group">

                          <label for="deposit_method" class=""><?php echo e(__("Exchange Rate")); ?></label>

                            <div class="input-group mb-3">

                              <input type="text" value="" class="form-control exchange_rate" readonly="" required="" name="exchange_rate" style="border: 2px solid #E9F6EC;">

                              <span class="input-group-text" id="basic-addon1" style="margin-left: -3px; background: #E9F6EC;">FCFA/USD</span>

                          </div>

                        </div>

                    </div>

                </div>

                <div class="row">

                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

                        <div class="form-group">

                          <label for="deposit_method" class=""><?php echo e(__("Amount (USD)")); ?></label>

                          <div class="input-group mb-3">
                            <input <?php echo e($disable); ?> type="text" value="" class="form-control amount" required="" name="amount" style="border: 2px solid #E9F6EC;">
                          <span class="input-group-text" id="basic-addon1" style="margin-left: -3px; background: #E9F6EC; padding: 0 20px">$</span>
                          </div>

                        </div>

                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

                        <div class="form-group">

                          <label for="deposit_method" class=""><?php echo e(__("Amount of currency to buy")); ?></label>

                          <div class="input-group">
                            <input type="text" value="" class="form-control crypto_amount" readonly="" required="" name="crypto_amount" style="border: 2px solid #E9F6EC;">
                            <span class="input-group-text" id="basic-addon1" style="margin-left: -3px; background: #E9F6EC; padding: 0 10px;">FCFA</span>
                          </div>

                        </div>

                    </div>

                </div>

                <div class="row">

                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

                        <div class="form-group">

                            <label class="" <?php echo e($disable); ?> id="data_user_adresse" data-user-adresse="<?php echo e(json_encode($custom_method)); ?>" for="deposit_method"><?php echo e(__("Crypto wallet address")); ?></label>
                            
                            <div class="input-group" style="margin-bottom: 0 !important;" >

                              <div class="input-group" style="display: flex; align-items:center;margin-bottom: 0 !important;">
                                <select <?php echo e($disable); ?> style="display:none; text-align:left" class=" input-group-text form-control" name="wallet_address" id="buy_custom_paiemen" style="z-index: 999; position: relative; background: transparent; margin-right: 15px; border: 1px solid #E9F6EC;">

                                </select>
                                <span id="buy_custom_paiemen2" class="input-group-text"  style="margin-left: -3px; background: #E9F6EC; padding: 0 20px; position: absolute; right:0; font-weight: bold; display: none;" data-toggle="modal" data-target="#exampleModalCenter">+</span>
                              </div>
                              

                              

                            </div>
                        
                            
                              <p id="custom_wallet_adresse" data-toggle="modal" data-target="#exampleModalCenter" value="" class="form-control" style="color:gray; font-size:16px;">Ajouter une adresse</p>
                            
                            

                            <input id="buy_pay_address" type="hidden" name="wallet_address">

                            <input type="hidden" value="1" name="custom_method" id="custom_method">

                            <div class="modal custom_crypto_adresse_modal" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

                            <div class="modal-dialog modal-dialog-centered" role="document">

                            <div class="modal-content">

                                <div class="modal-header">

                                <h5 class="modal-title" id="exampleModalLongTitle">Ajouter une adresse de porte feuille</h5>

                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                                    <span aria-hidden="true">&times;</span>

                                </button>

                                </div>

                                <div class="modal-body" style="text-align:left">

                                <div class="mb-3">

                                <label for="type" class="form-label">Type</label>

                                <div class="input-group">
                                  <select <?php echo e($disable); ?> name="type" class="form-control" id="type" style="z-index: 999; position: relative; background: transparent; margin-right: 15px; border: 1px solid #E9F6EC;">
                                    
                                    <option value="cryptomonaie">Cryptomonaie</option>

                                </select>
                                <span class="input-group-text" id="basic-addon1" style="margin-left: -3px; background: #E9F6EC; padding: 0 25px; position: absolute; right:0;"></span>
                                </div>

                                </div>

                                <div class="mb-3">
                                  <label  for="nom" class="form-label">Nom ou operateur de la methode</label>
                                  <div class="input-group">
                                    <select name="nom" class="form-control" id="nom" style="z-index: 999; position: relative; background: transparent; margin-right: 15px; border: 1px solid #E9F6EC;">
                                      
                                      <option value="cryptomonaie">Cryptomonaie</option>
  
                                  </select>
                                  <span class="input-group-text" id="basic-addon1" style="margin-left: -3px; background: #E9F6EC; padding: 0 25px; position: absolute; right:0;"></span>
                                  </div>

                                
                                
                                
                                

                                </div>

                                
                                <div class="mb-3">

                                    <label for="adresse" class="form-label"><?php echo e(__("Adresse de paiement*")); ?></label>

                                    <div class="input-group mb-3">
                                      <input <?php echo e($disable); ?> name="number" type="text" class="form-control required" id="adresse" required placeholder="" >
                                    <span class="input-group-text" id="basic-addon1" style="margin-left: -3px; background: #E9F6EC; padding: 0 20px">+</span>
                                    </div>

                                </div>

                                <div class="mb-3">

                                    <label for="adresse" class="form-label"><?php echo e(__("Nom ou Informations sur le compte*")); ?></label>

                                    <textarea <?php echo e($disable); ?> name="detail" required class="form-control required" id="detail" style="border:1px solid #e4e6fc;" ></textarea>

                                </div>

                                </div>

                                <div class="modal-footer">

                                <button <?php echo e($disable); ?> type="button" class="btn btn-secondary custom_pay_validator" style="background-color:green; color:white; font-weight:normal" data-dismiss="modal">Valider</button>
                                
                                </div>

                            </div>

                            </div>

                        </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

                      <div class="form-group">

                        <label class="" for="pay_method"><?php echo e(__("Pay method")); ?></label>

                        <div class="input-group">
                          <select <?php echo e($disable); ?> id="pay_method" class="form-control select_coin" name="pay_method" required="" style="z-index: 999; position: relative; background: transparent; margin-right: 15px; border: 1px solid #E9F6EC;">

                            

                            <?php $__currentLoopData = $deposit; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $method): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            
                              <option value="<?php echo e($method->name); ?>"><?php echo e($method->name); ?></option>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              
                        </select>
                        <span class="input-group-text" id="basic-addon1" style="margin-left: -3px; background: #E9F6EC; padding: 0 25px; position: absolute; right:0;"></span>
                        </div>
                      </div>
                    </div>

                    <!--<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

                        <div class="form-group">

                          <label for="deposit_method">Receipt</label>

                          <input type="file" value="" class="form-control" required="" name="receipt">

                        </div>

                    </div>-->

                </div>

                <div class="row">

                  <div class="col-sm-3">

                  <?php if($disable=="disabled"): ?>


                    <p <?php echo e($disable); ?> data-toggle="modal" data-target="#offlinemodal" type="submit" class="btn btn-default submit_form" style="border: 1px solid #E9F6EC"><?php echo e(__('Submit')); ?></p>

                  <?php else: ?>

                  <button type="submit" class="text-gray-900 font-bold bg-gradient-to-r from-green-200 to-lime-200 hover:bg-gradient-to-l hover:from-green-200 hover:to-lime-200 focus:ring-4 focus:outline-none focus:ring-lime-200 dark:focus:ring-green-500 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2"><?php echo e(__('Submit')); ?></button>

                  <?php endif; ?>
                  </div>

                </div>

                <div class="clearfix"></div>

          </form>
          

        </div>

      </div>

     
      <?php if($disable=="disabled"): ?>

        <?php echo $__env->make('coins.offlineModal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

      <?php endif; ?>
        

      <?php $context_transactions_to_confirm="Sell Crypto" ?>

      <?php echo $__env->make('home.partials.transactions_to_confirm', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

      <?php echo $__env->make('home.partials.transactions', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
      
      <?php echo $__env->make('home.partials.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    </div>

</div>

<script src="/assets/front/js/global.js"></script>

<script src="/assets/front/js/vendor/jquery-3.5.1-min.js"></script>

<script type="text/javascript">

  

    

  document.addEventListener('DOMContentLoaded',function(){

   

    if($('#offlinemodal')){
  
      $('#offlinemodal').modal('show');

    }

    /*$('body').on('change','.select_coin',function(event){

      var coin = $(this).find(':selected').val();

      var crypto_name = $(this).find(':selected').text();

      var price = $(this).find(':selected').attr('data-price');

      var wallet_address = $(this).find(':selected').attr('data-wallet_address');

      $('body').find('.exchange_rate').val(price);

      $('body').find('.wallet_address').val(wallet_address);

      $('body').find('.crypto_name').text(crypto_name);

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

      //  crypto_amount = exchange_rate;

      // }

      $('body').find('.crypto_amount').val(crypto_amount);

    }*/

  },false);

</script>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>

  <?php echo $__env->make('partials.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>