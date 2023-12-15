@extends('layouts.app')



@section('content')



    <div class="row clearfix">

        @include('partials.sidebar')

		

		<div class="col-md-9 padding-right">

        	@include('partials.flash')


        	@include('home.partials.requests')
			

			@include('home.partials.overview')



	        @include('home.partials.transactions_to_confirm')

	        

	        @include('home.partials.transactions')

			@include('home.partials.footer')



    	</div>



    </div>

	<script src="/assets/front/js/global.js"></script>

@endsection



@section('footer')

	@include('partials.footer')

@endsection

