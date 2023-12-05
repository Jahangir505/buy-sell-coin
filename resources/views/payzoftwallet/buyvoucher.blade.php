
@extends('layouts.app')

@section('content')
    <div class="row">
        @include('partials.sidebar')
        <div class="col-md-9 ">
            
        	<div class="card">
            <div class="body">
                <div class="row">
                   
                    <div class="details col-lg-8 col-md-12" id="buy_form">
                        <h3 class="product-title m-b-0">{{__('Fund wallet with Payzoft') }}</h3>                        
                        
                        <div class="action">
                          <form accept-charset="UTF-8" action="{{url('/')}}/buyvoucher/payzoftwallet" class="require-validation" data-cc-on-file="false" id="payment-form1" method="post">
                                    {{ csrf_field() }}
                          	<div class="row mb-5">
		                      <div class="col-lg-12">
		                        <div class="form-group ">
		                          	<label for="message">{{__('Amount')}} in {{ Auth::user()->currentCurrency()->name }}</label>
                            		<input type="number" value="0" name="amount" aria-label="Search" class="form-control" style="width: 100px" v-on:keyup="totalize"  v-on:change="totalize" required>
		                        </div>
		                      </div>
		                    	<div class="col-lg-12">
                                    {{csrf_field()}}
                            	<input type="hidden" name="product_id" value="18">
                              <button type="submit" class="btn btn-primary btn-round waves-effect">{{__('Continue')}}</button>
		                    	</div>
		                    </div>
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
   
@endsection


@section('footer')
  @include('partials.footer')
@endsection