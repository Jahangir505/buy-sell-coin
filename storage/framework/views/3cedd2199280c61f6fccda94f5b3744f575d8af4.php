<?php $__env->startSection('content'); ?>

<?php $disable=str_replace(["0","1"],["disabled",""],$admin_online[0]->status);?>

<div class="row buy_sell_page">

    <?php echo $__env->make('partials.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <div class="col-md-9 " style="padding-right: 40px" id="#sendMoney">

      <?php echo $__env->make('flash', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

      <div class="card" style="background: #1f2937;">

        <div class="header">

            <h2 style="color: #ffffff"><strong><?php echo e(__("Sell Coins")); ?></strong></h2>

        </div>

        <p class="a_overview text-white">
          <?php echo e(__("Sell your virtual currency safely with us at the best price, and receive the money directly via the payment method that suits you.")); ?>

        </p>

        <div class="body">

          <form class="crypto-form" id="sell_crypto" action="<?php echo e(route('postSellCryptoConfirm')); ?>" method="post" enctype="multipart/form-data">

                <?php echo e(csrf_field()); ?>


                <div class="row">

                  	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

                      <div class="form-group">

                        <label class="text-white" for="deposit_method"><?php echo e(__("Select Currency")); ?></label>

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

                          <label class="text-white" for="deposit_method"><?php echo e(__("Exchange Rate")); ?></label>

                            <div class="input-group mb-3">

                              <input <?php echo e($disable); ?> type="text" value="" class="form-control exchange_rate" readonly="" required="" name="exchange_rate">

                              <span class="input-group-text" id="basic-addon1" style="margin-left: -3px;">FCFA/USD</span>

                          </div>

                        </div>

                    </div>

                </div>

                <div class="row">

                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

                        <div class="form-group">

                          <label class="text-white" for="deposit_method"><?php echo e(__("Amount (USD)")); ?></label>

                          <input <?php echo e($disable); ?> type="text" value="" class="form-control amount" required="" name="amount">

                        </div>

                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

                        <div class="form-group">

                          <label class="text-white" for="deposit_method"><?php echo e(__("Amount of currency to sell")); ?></label>

                          <input <?php echo e($disable); ?> type="text" value="" class="form-control crypto_amount" readonly="" required="" name="crypto_amount">

                        </div>

                    </div>

                </div>

                <div class="row">

                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

                        <div class="form-group">

                          <label class="text-white" for="deposit_method"><span class="crypto_name"></span> <?php echo e(__("wallet address")); ?></label>

                          <input <?php echo e($disable); ?> type="text" value="" readonly="" class="form-control wallet_address" required="" name="wallet_address">

                        </div>

                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

                      <div class="form-group">

                        <label class="text-white" for="pay_method"><?php echo e(__("Pay method")); ?></label>

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