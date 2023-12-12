@extends('layouts.app')

@section('content')

<?php $disable=str_replace(["0","1"],["disabled",""],$admin_online[0]->status);?>

<div class="row buy_sell_page">

  <style>
    .btn:hover{
      background: #E9F6EC !important;
      box-shadow: 0 3px 8px 0 #E9F6EC !important;
    }
  </style>

    @include('partials.sidebar')

    <div class="col-md-9 " style="padding-right: 40px" id="#sendMoney">

      @include('flash')

      <div class="card">

        <div class="header">

            <h2><strong>{{__("Sell Coins")}}</strong></h2>

        </div>

        <p class="a_overview ">
          {{__("Sell your virtual currency safely with us at the best price, and receive the money directly via the payment method that suits you.")}}
        </p>

        <div class="body">

          <form class="crypto-form" id="sell_crypto" action="{{route('postSellCryptoConfirm')}}" method="post" enctype="multipart/form-data">

                {{csrf_field()}}

                <div class="row">

                  	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

                      <div class="form-group">

                        <label class="" for="deposit_method">{{__("Select Currency")}}</label>

                        <div class="input-group mb-3">
                          <select {{$disable}} class="form-control select_coin" name="coin_id" required="" style="z-index: 999; position: relative; background: transparent; margin-right: 15px; border: 2px solid #E9F6EC;">

                            <option>-select-</option>
  
                                    @foreach($data as $key=>$value)
  
                                      <option data-wallet_address="{{$value->wallet_address}}" data-price="{{$value->price}}" value="{{$value->id}}">{{$value->coin_name}}</option>
  
                                @endforeach
                
  
                          </select>
                          <span class="input-group-text" id="basic-addon1" style="margin-left: -3px; background: #E9F6EC; padding: 0 25px; position: absolute; right:0;"></span>
                        </div>

                      </div>

                    </div>

                  	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

                        <div class="form-group">

                          <label class="" for="deposit_method">{{__("Exchange Rate")}}</label>

                            <div class="input-group mb-3">

                              <input {{$disable}} type="text" value="" class="form-control exchange_rate" readonly="" required="" name="exchange_rate" style="border: 2px solid #E9F6EC;">

                              <span class="input-group-text" id="basic-addon1" style="margin-left: -3px; background: #E9F6EC;">FCFA/USD</span>

                          </div>

                        </div>

                    </div>

                </div>

                <div class="row">

                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

                        <div class="form-group">

                          <label class="" for="deposit_method">{{__("Amount (USD)")}}</label>

                          <div class="input-group mb-3">
                            <input {{$disable}} type="text" value="" class="form-control amount" required="" name="amount" style="border: 2px solid #E9F6EC;">
                          <span class="input-group-text" id="basic-addon1" style="margin-left: -3px; background: #E9F6EC; padding: 0 22px">$</span>
                          </div>
                        </div>

                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

                        <div class="form-group">

                          <label class="" for="deposit_method">{{__("Amount of currency to sell")}}</label>

                          <input {{$disable}} type="text" value="" class="form-control crypto_amount" readonly="" required="" name="crypto_amount" style="border: 2px solid #E9F6EC;">
                            
                        </div>

                    </div>

                </div>

                <div class="row">

                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

                        <div class="form-group">

                          <label class="" for="deposit_method"><span class="crypto_name"></span> {{__("wallet address")}}</label>

                          <div class="input-group">
                            <input {{$disable}} type="text" value="" readonly="" class="form-control wallet_address" required="" name="wallet_address" >
                            <span style="margin-left: -3px; background: #E9F6EC; padding: 0 20px; display: flex; align-items:center;">
                              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a2.25 2.25 0 00-2.25-2.25H15a3 3 0 11-6 0H5.25A2.25 2.25 0 003 12m18 0v6a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 18v-6m18 0V9M3 12V9m18 0a2.25 2.25 0 00-2.25-2.25H5.25A2.25 2.25 0 003 9m18 0V6a2.25 2.25 0 00-2.25-2.25H5.25A2.25 2.25 0 003 6v3" />
                              </svg>
                              
                            </span>
                          </div>
                        </div>

                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

                      <div class="form-group">

                        <label class="" for="pay_method">{{__("Pay method")}}</label>

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

                  <button  type="submit" class="btn btn-default submit_form" style="border: 2px solid #E9F6EC">{{__('Submit')}}</button>

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

