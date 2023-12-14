@extends('layouts.app')

@section('content')
@include('partials.nav')
    <div class="row">
        @include('partials.sidebar')
		
		<div class="col-md-9 padding-right">
        
	        @include('home.partials.transactions_to_confirm')
	        
	        @include('home.partials.transactions')

    	</div>

    </div>
@endsection

@section('footer')
	@include('partials.footer')
@endsection
