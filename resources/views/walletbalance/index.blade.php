
@extends('layouts.app')

@section('content')
@include('partials.nav')
<div class="container">
    <div class="row">
        @include('partials.sidebar')
        <div class="col-md-9 " >
            <div class="card">
                <div class="header">
                    <h2><strong>{{__('Wallets Balance')}}</strong></h2>
                   


                </div>
                
                <div class="body">
                   

                    <div class="row">
                        <div class="col">
                            <div class="form-group {{ $errors->has('merchant_site_url') ? ' has-error' : '' }}">
                              <div class="form-group">
                                <label for="merchant_currency_code"><p>Balance {{ \App\Helpers\Money::instance()->value(Auth::user()->balance(), Auth::user()->currentCurrency()->symbol) }}</h2>
            @if(count(\App\Models\Currency::where('id', '!=', Auth::user()->currentCurrency()->id)->get()))
                 @endif</p></label>
                               
                               
                    
                </div>
            </div>
        </div>
    </div>
</div>
<script>
$( "#merchant_currency" )
  .change(function () {
    $( "#merchant_currency option:selected" ).each(function() {
      window.location.replace("{{url('/')}}/wallet/"+$(this).val());
  });
})
</script>
</script>


@endsection

@section('footer')
  @include('partials.footer')
@endsection
