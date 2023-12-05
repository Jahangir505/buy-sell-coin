@extends('layouts.app')

@section('content')

<?php $disable=str_replace(["0","1"],["disabled",""],$admin_online[0]->status);?>

<div class="row buy_sell_page">

    @include('partials.sidebar')

    <div class="col-md-9 " style="padding-right: 0" id="#sendMoney">

      @include('flash')

      <div class="card">

        <div class="header">

            <h2><strong>{{__("Sell Coins")}}</strong></h2>

        </div>

        <p class="a_overview">
          {{__("Sell your virtual currency safely with us at the best price, and receive the money directly via the payment method that suits you.")}}
        </p>

        <div class="body">

          <form class="crypto-form" id="sell_crypto" action="{{route('postSellCryptoConfirm')}}" method="post" enctype="multipart/form-data">

                {{csrf_field()}}

                <div class="row">

                  	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

                      <div class="form-group">

                        <label for="deposit_method">{{__("Select Currency")}}</label>

                        <select {{$disable}} class="form-control select_coin" name="coin_id" required="">

	                        <option>-select-</option>

	                                @foreach($data as $key=>$value)

                                    <option data-wallet_address="{{$value->wallet_address}}" data-price="{{$value->price}}" value="{{$value->id}}">{{$value->coin_name}}</option>

	                        		@endforeach
							

	                      </select>

                      </div>

                    </div>

                  	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

                        <div class="form-group">

                          <label for="deposit_method">{{__("Exchange Rate")}}</label>

                            <div class="input-group mb-3">

                              <input {{$disable}} type="text" value="" class="form-control exchange_rate" readonly="" required="" name="exchange_rate">

                              <span class="input-group-text" id="basic-addon1">FCFA/USD</span>

                          </div>

                        </div>

                    </div>

                </div>

                <div class="row">

                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

                        <div class="form-group">

                          <label for="deposit_method">{{__("Amount (USD)")}}</label>

                          <input {{$disable}} type="text" value="" class="form-control amount" required="" name="amount">

                        </div>

                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

                        <div class="form-group">

                          <label for="deposit_method">{{__("Amount of currency to sell")}}</label>

                          <input {{$disable}} type="text" value="" class="form-control crypto_amount" readonly="" required="" name="crypto_amount">

                        </div>

                    </div>

                </div>

                <div class="row">

                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

                        <div class="form-group">

                          <label for="deposit_method"><span class="crypto_name"></span> {{__("wallet address")}}</label>

                          <input {{$disable}} type="text" value="" readonly="" class="form-control wallet_address" required="" name="wallet_address">

                        </div>

                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

                      <div class="form-group">

                        <label for="pay_method">{{__("Pay method")}}</label>

                        <select {{$disable}} id="pay_method" class="form-control select_coin" name="pay_method" required="">

                            

                            @foreach($deposit as $method)
                            
                              <option value="{{$method->name}}">{{$method->name}}</option>

                            @endforeach
                              
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

                  @if($disable=="disabled")


                  <p {{$disable}} data-toggle="modal" data-target="#offlinemodal" type="submit" class="btn btn-primary submit_form">{{__('Submit')}}</p>

                  @else

                  <button  type="submit" class="btn btn-primary submit_form">{{__('Submit')}}</button>

                  @endif

                  </div>

                </div>

                <div class="clearfix"></div>

          </form>

        </div>

      </div>

      @if($disable=="disabled")

        @include('coins.offlineModal')

      @endif

      

      <? $context_transactions_to_confirm="Sell Crypto"?>

      @include('home.partials.transactions_to_confirm')

      @include('home.partials.transactions')

      @include('home.partials.footer')

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

@endsection

@section('footer')

  @include('partials.footer')

@endsection

