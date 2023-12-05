
@extends('layouts.app')

@section('content')
    <div class="row">
        @include('partials.sidebar')
        <div class="col-md-9 ">
            
        	<div class="card">
            <div class="body">
                <div class="row">
                   
                    <div class="details col-lg-8 col-md-12" id="buy_form">
                        <h3 class="product-title m-b-0">{{__('Fund wallet with Flutterwave') }}</h3>                        
                        
                        <div class="action">
                          <form class="d-flex justify-content-left" id="data">
                          	<div class="row mb-5">
		                      <div class="col-lg-12">
		                        <div class="form-group ">
		                          	<label for="message">{{__('Amount')}} in {{ Auth::user()->currentCurrency()->name }}</label>
                            		<input type="number" value="0" name="amount" aria-label="Search" class="form-control" style="width: 100px" v-on:keyup="totalize"  v-on:change="totalize" >
		                        </div>
		                      </div>
		                      <div class="col-lg-12">
		                        <div class="form-group ">
		                          	<label for="message">{{__('Phone number (mandatory)')}}</label>
                            		<input type="tel" name="phone" class="form-control" style="width: 200px" required pattern="[0-9]{6}">
		                        </div>
		                      </div>
		                    	<div class="col-lg-12">
                                    {{csrf_field()}}
                            	<input type="hidden" name="product_id" value="18">
                              <button type="button" id="purchase_rave" class="btn btn-primary btn-round waves-effect">{{__('Continue')}}</button>
		                    	</div>
		                    </div>
                          </form>
                          <form style="visibility:hidden;" id="verify_form" method="POST" action="{{url('/pay/voucher/rave/success')}}">
                              {{csrf_field()}}
                            <input type="number" id="verify_amount" name="amount">
                            <input type="text" id="verify_reference" name="reference">
                            <input type="text" id="verify_currency" name="currency">
                          </form>
                        </div>
                    </div>
                </div>
                <hr>
               
                </div>
            </div>
        </div>
        </div>
    </div>
    
@endsection
@section('js')
    <!--<script type="text/javascript" src="https://ravesandboxapi.flutterwave.com/flwv3-pug/getpaidx/api/flwpbf-inline.js"></script> -->
    <script src="https://api.ravepay.co/flwv3-pug/getpaidx/api/flwpbf-inline.js"></script>
    <script>
        window.onload = function(){
            var data  = document.getElementById("data").elements;
            const phone_regex = RegExp("[0-9]([0-9])*");
            const API_publicKey = "FLWPUBK-68c5cad0bac6d9f4a4e9c90d8f6fb853-X";
            function payWithRave() {
                var x = getpaidSetup({
                    PBFPubKey: API_publicKey,
                    customer_email: "{{Auth::user()->email}}",
                    amount: data.namedItem("amount").value,
                    customer_phone: data.namedItem("phone").value,
                    currency: "{{Auth::user()->currentCurrency()->code}}",
                    txref: "{{Auth::user()->id.str_random(4).time().str_random(4)}}",
                    onclose: function() {},
                    callback: function(response) {
                        var txref = response.tx.txRef;
                        console.log("This is the response returned after a charge", response);
                        if (
                            response.tx.chargeResponseCode == "00" ||
                            response.tx.chargeResponseCode == "0"
                        ) {
                            // redirect to a success page
                            x.close();
                            
                            var f = document.getElementById("verify_form");
                            
                            var reference = document.getElementById("verify_reference");
                            reference.value = txref;
                            
                            var amountfield = document.getElementById("verify_amount");
                            amountfield.value = data.namedItem("amount").value;
                            
                            var currencyfield = document.getElementById("verify_currency");
                            currencyfield.value = "{{Auth::user()->currentCurrency()->code}}";
                            
                            f.submit();
                        } else {
                            // redirect to a failure page.
                            alert("transaction failed");
                        }
                    }
                });
            }
            document.getElementById("purchase_rave").addEventListener ("click", function(){
                    var amount = parseInt(data.namedItem("amount").value,10);
                    var phone = data.namedItem("phone").value;
                    if(!Number.isInteger(amount) || amount <= 0){
                        alert("{{__('Please enter a valid value')}}");
                        return;
                    }
                    if(!phone_regex.test(phone)){
                        alert("{{__('Please enter a valid phone number')}}");
                        return;
                    }
                    payWithRave();
            });
        };
    </script>
@endsection


@section('footer')
  @include('partials.footer')
@endsection