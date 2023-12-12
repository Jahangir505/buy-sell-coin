@extends('layouts.app')

@section('content')
@include('partials.nav')
    <div class="row">
        @include('partials.sidebar')
		
		<div class="col-md-9 " style="padding-right: 40px">
        
	        @include('home.partials.transactions_to_confirm')
	        
	        @include('home.partials.transactions')

    	</div>

    </div>
@endsection

@section('footer')
	@include('partials.footer')
@endsection
