@extends('layouts.app')
@section('content')
<div class="row">
    @include('partials.sidebar')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.css">
    <div class="col-md-9 ">
        @include('partials.flash')
    	<div class="card">
            <div class="body">
                <div class="row">
                    <div class="details col-lg-8 col-md-12" id="buy_form">
                        <h3 class="product-title m-b-0">{{__('Fund wallet with MOMO') }}</h3>
                        <div class="action">
                          <form class="" method="POST" action="{{url('/momo/makeDepositRequest')}}">
                            {{csrf_field()}}
                          	<div class="row mb-5">
    		                      <div class="col-lg-12">
    		                        <div class="form-group ">
    		                          	<label for="message">{{__('Amount')}} in {{ Auth::user()->currentCurrency()->name }}</label>
                                		<input type="text" value="" required="" name="amount" class="form-control amount">
    		                        </div>
    		                      </div>
    		                      <div class="col-lg-12">
    		                        <div class="form-group ">
    		                          	<label for="message">{{__('Phone number (mandatory)')}}</label>
                                		<input type="text" name="phone" class="form-control phone_number" required>
    		                        </div>
    		                      </div>
    		                    	<div class="col-lg-12">
                                        <button type="button"  class="btn btn-primary btn-round form_submit">{{__('Continue')}}</button>
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
    <script src="https://api.ravepay.co/flwv3-pug/getpaidx/api/flwpbf-inline.js"></script>
    
@endsection
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.all.min.js"></script>
<script type="text/javascript">
    document.addEventListener('DOMContentLoaded',function(){
        
        $('body').on('click','.form_submit',function(e){
            var data='';
            e.preventDefault();
            var element =$(this);
            var phone_number = element.closest('form').find('.phone_number').val();
            var amount = element.closest('form').find('.amount').val();
            if(!phone_number)
            {
                alert('Please enter phone number!');
                return false;
            }
            if(!amount)
            {
                alert('Please enter amount!');
                return false;
            }
            var _token = element.closest('form').find('[name="_token"]').val();
            data = {_token:_token,phone_number:phone_number,amount:amount};
            var url  = element.closest('form').attr('action');
            element.attr('disabled', true);
            element.text('Processing.....');
            $.ajax({
                url: url,
                data: data,
                type: 'POST',
                success: function (response) 
                {
                    var result = jQuery.parseJSON(response);
                    if(result.status == 0)
                    {
                        element.attr('disabled', false);
                        element.text('Continue');
                        alert(result.message);
                        return false;
                    }
                    if(result.status == 1)
                    {
                        var uuid = result.uuid;
                        Swal.fire({
                          title: 'Awaiting',
                          text: "Wait please transaction is under proccess!",
                          icon: 'warning',
                          // showCancelButton: true,
                          // confirmButtonColor: '#3085d6',
                          // cancelButtonColor: '#d33',
                          // confirmButtonText: 'Yes, delete it!'
                        });
                        setTimeout(function(){
                            $.ajax({
                                url: "{{url('/momo/accountDepositStatus')}}/"+uuid,
                                type: 'GET',
                                success: function (response) 
                                {
                                    var result1 = jQuery.parseJSON(response);
                                    if(result1.status == 0)
                                    {
                                        element.attr('disabled', false);
                                        element.text('Continue');

                                        Swal.fire({
                                          title: 'Failed',
                                          text: "Payment failed!!",
                                          icon: 'warning',
                                        });
                                        return false;
                                    }
                                    if(result1.status == 1)
                                    {
                                        element.attr('disabled', false);
                                        element.text('Make Payment');
                                        Swal.fire({
                                          title: 'Success',
                                          text: "Payment successfully done!",
                                          icon: 'success',
                                        });
                                        return false;
                                    }
                                }
                             });  
                        }, 13000);
                    }
                }
            });
        });
    },false);
</script>


@section('footer')
  @include('partials.footer')
@endsection