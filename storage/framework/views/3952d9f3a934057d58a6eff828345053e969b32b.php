<?php $__env->startSection('content'); ?>

<div class="row buy_sell_page">


  <?php $disable=str_replace(["0","1"],["disabled",""],$admin_online[0]->status);?>

  

    <?php echo $__env->make('partials.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <div class="col-md-9 " style="padding-right: 0" id="#sendMoney">

      <?php echo $__env->make('flash', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

      <div class="card">

        <div class="header">

            <h2><strong><?php echo e(__("Buy Coins")); ?></strong></h2>

        </div>

        <p class="a_overview">
          <?php echo e(__("Buy your virtual currency safely with us at the best price, and receive the money directly via the payment method that suits you.")); ?>

        </p>

        <div class="body">

          <form  class="crypto-form" id="buy_crypto" action="<?php echo e(route('postBuyCryptoConfirm')); ?>" method="post" enctype="multipart/form-data">

                <?php echo e(csrf_field()); ?>


                <div class="row">

                  	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

                      <div class="form-group">

                        <label for="deposit_method"><?php echo e(__("Select Currency")); ?></label>

                        <select <?php echo e($disable); ?> class="form-control select_coin" name="coin_id" required="">

	                        <option>-select-</option>

	                                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <option data-wallet_address="<?php echo e($value->wallet_address); ?>" data-price="<?php echo e($value->price); ?>" value="<?php echo e($value->id); ?>"><?php echo e($value->coin_name); ?></option>

	                        		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							

	                      </select>

                      </div>

                    </div>

                  	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

                        <div class="form-group">

                          <label for="deposit_method"><?php echo e(__("Exchange Rate")); ?></label>

                            <div class="input-group mb-3">

                              <input type="text" value="" class="form-control exchange_rate" readonly="" required="" name="exchange_rate">

                              <span class="input-group-text" id="basic-addon1">FCFA/USD</span>

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

                          <label for="deposit_method"><?php echo e(__("Amount of currency to buy")); ?></label>

                          <input type="text" value="" class="form-control crypto_amount" readonly="" required="" name="crypto_amount">

                        </div>

                    </div>

                </div>

                <div class="row">

                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

                        <div class="form-group">

                            <label <?php echo e($disable); ?> id="data_user_adresse" data-user-adresse="<?php echo e(json_encode($custom_method)); ?>" for="deposit_method"><?php echo e(__("Crypto wallet address")); ?></label>
                            
                            <div class="input-group mb-3">

                              <select <?php echo e($disable); ?> style="display:none; text-align:left" class=" input-group-text form-control" name="wallet_address" id="buy_custom_paiemen" style="text-align:left">

                              </select>
                              <span style="display:none;" class="copieur input-group-text" id="add_method" data-toggle="modal" data-target="#exampleModalCenter" title="Ajouter une adresse">

                                  <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M519-405h66v-122h122v-66H585v-122h-66v122H397v66h122v122ZM333.615-250q-38.34 0-64.478-26.137Q243-302.275 243-340.615v-438.77q0-38.34 26.137-64.478Q295.275-870 333.615-870h438.77q38.34 0 64.478 26.137Q863-817.725 863-779.385v438.77q0 38.34-26.137 64.478Q810.725-250 772.385-250h-438.77Zm0-66h438.77q9.231 0 16.923-7.692Q797-331.385 797-340.615v-438.77q0-9.23-7.692-16.923Q781.616-804 772.385-804h-438.77q-9.23 0-16.923 7.692Q309-788.615 309-779.385v438.77q0 9.23 7.692 16.923Q324.385-316 333.615-316Zm-146 212q-38.34 0-64.478-26.137Q97-156.275 97-194.615v-504.77h66v504.77q0 9.231 7.692 16.923Q178.384-170 187.615-170h504.77v66h-504.77ZM309-804v488-488Z"/></svg>

                              </span>

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

                                <select <?php echo e($disable); ?> name="type" class="form-control" id="type">
                                    
                                    <option value="cryptomonaie">Cryptomonaie</option>

                                </select>

                                </div>

                                <div class="mb-3">

                                <label for="nom" class="form-label">Nom ou operateur de la methode</label>
                                
                                <select name="nom" class="form-control" id="nom">
                                
                                
                                    
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

                                <button <?php echo e($disable); ?> type="button" class="btn btn-secondary custom_pay_validator" style="background-color:green; color:white; font-weight:normal" data-dismiss="modal">Valider</button>
                                
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

                            

                            <?php $__currentLoopData = $deposit; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $method): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            
                              <option value="<?php echo e($method->name); ?>"><?php echo e($method->name); ?></option>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              
                        </select>
                        
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


                    <p <?php echo e($disable); ?> data-toggle="modal" data-target="#offlinemodal" type="submit" class="btn btn-primary submit_form"><?php echo e(__('Submit')); ?></p>

                  <?php else: ?>

                    <button  type="submit" class="btn btn-primary submit_form"><?php echo e(__('Submit')); ?></button>

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
        

      <? $context_transactions_to_confirm="Sell Crypto"?>

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