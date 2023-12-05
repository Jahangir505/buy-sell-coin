
@extends('layouts.app')

@section('content')
{{--  @include('partials.nav')  --}}
    <div class="row">
        @include('partials.sidebar')
        <div class="col-md-9 ">
          @include('partials.flash')
          <div class="card">
            <div class="header">
              <h2><strong>{{__('About')}}</strong> Momo {{__('withdrawals')}}</h2>
            </div>
            <div class="body">
              <div class="row">
                <div class="col-lg-12">
                    <div >
                        
                    </div>
                </div>
              </div>
            </div>
          </div>
          <div class="card">
          <div class="header">
            <h2><strong>{{__('Withdrawal Request')}}</strong></h2>
          </div>
          <div class="body">
            <form action="{{route('post.momo.withdrawal')}}" method="post" enctype="multipart/form-data" id="withdrawal_form">
              {{csrf_field()}}
              
              <div class="row">
                <div class="col-lg-6 col-xs-12">
                  <div class="row">
                    <div class="col">
                      <div class="form-group {{ $errors->has('amount') ? ' has-error' : '' }}">
                       <label for="amount">{{__('Amount')}}</label>
                       <input type="number" name="amount" class="form-control" required>
                        @if ($errors->has('amount'))
                            <span class="help-block">
                                <strong class="text-danger">{{ $errors->first('amount') }}</strong> <span class="text-primary">{{Auth::user()->currentCurrency()->symbol}}</span> 
                            </span>
                        @endif
                      </div>
                    </div>
                    
                    
                  </div>
                </div>
                <div class="col-lg-6 col-xs-12">
                  <div class="row">
                    <div class="col">
                      <div class="form-group {{ $errors->has('payee_number') ? ' has-error' : '' }}">
                       <label for="payee_number">{{__('Number')}}</label>
                       <input type="text" name="payee_number" class="form-control"  required>
                        @if ($errors->has('payee_number'))
                            <span class="help-block">
                                <strong class="text-danger">{{ $errors->first('payee_number') }}</strong>
                            </span>
                        @endif
                      </div>
                    </div>
                    
                    
                  </div>
                </div>
              </div>
              <div class="clearfix"></div>
             
              
              <div class="clearfix"></div>
              <div class="row">
                <div class="col-lg-12">
                  <input type="submit" class="btn btn-primary float-right" value="{{__('Request Withdrawal')}}">
                </div>
              </div>
              <div class="clearfix"></div>
            </form>
          </div>
        </div>
      </div>
    </div>
@endsection

@section('js')

@endsection
@section('footer')
  @include('partials.footer')
@endsection