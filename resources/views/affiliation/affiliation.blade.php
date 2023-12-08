@extends('layouts.app')

@section('content')

<div class="row affliation_page">

    @include('partials.sidebar')

    <div class="col-md-9 " style="padding-right: 40px" id="sendMoney">

      @include('flash')

      	<div class="card aff">

			<div class="header">

				<h2><strong>{{__("Earn money with our affiliate system")}}</strong></h2>

			</div>

			<div class="body">
				<div class="row a_header">
					<div class="col ">
						<p class="a_link" style="display: flex; align-items:center">
							<span type="button" class="partageur" data-toggle="modal" data-target="#exampleModalCenter" title="partager">
							<svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 -960 960 960" width="48"><path d="M450-280H280q-83 0-141.5-58.5T80-480q0-83 58.5-141.5T280-680h170v60H280q-58.333 0-99.167 40.765-40.833 40.764-40.833 99Q140-422 180.833-381q40.834 41 99.167 41h170v60ZM325-450v-60h310v60H325Zm185 170v-60h170q58.333 0 99.167-40.765 40.833-40.764 40.833-99Q820-538 779.167-579 738.333-620 680-620H510v-60h170q83 0 141.5 58.5T880-480q0 83-58.5 141.5T680-280H510Z"/></svg>
							</span>
							<span class="a_title"><strong>{{__("Your affiliate link")}}:</strong></span>  
							<p style="min-width:max-content;" class="a_link_container row">
								<span id="a_link">https://probuysellcoin.com/a/{{$user->id}}</span>
								<span class="copieur" title="copier">
								{{__("Copy")}}
									<svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 -960 960 960" width="48"><path d="M120-81v-663h60v603h474v60H120Zm120-120v-680h560v680H240Zm60-60h440v-560H300v560Zm0 0v-560 560Z"/></svg>
								</span>

								
							</p>
						</p>

						<p class="share_zonne">
							<div style="display: flex; align-items:center">
								<span type="button" class="partageur" data-toggle="modal" data-target="#exampleModalCenter" title="partager">
									<svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 -960 960 960" width="48"><path d="M727-80q-47.5 0-80.75-33.346Q613-146.693 613-194.331q0-6.669 1.5-16.312T619-228L316-404q-15 17-37 27.5T234-366q-47.5 0-80.75-33.25T120-480q0-47.5 33.25-80.75T234-594q23 0 44 9t38 26l303-174q-3-7.071-4.5-15.911Q613-757.75 613-766q0-47.5 33.25-80.75T727-880q47.5 0 80.75 33.25T841-766q0 47.5-33.25 80.75T727-652q-23.354 0-44.677-7.5T646-684L343-516q2 8 3.5 18.5t1.5 17.741q0 7.242-1.5 15Q345-457 343-449l303 172q15-14 35-22.5t46-8.5q47.5 0 80.75 33.25T841-194q0 47.5-33.25 80.75T727-80Zm.035-632Q750-712 765.5-727.535q15.5-15.535 15.5-38.5T765.465-804.5q-15.535-15.5-38.5-15.5T688.5-804.465q-15.5 15.535-15.5 38.5t15.535 38.465q15.535 15.5 38.5 15.5Zm-493 286Q257-426 272.5-441.535q15.5-15.535 15.5-38.5T272.465-518.5q-15.535-15.5-38.5-15.5T195.5-518.465q-15.5 15.535-15.5 38.5t15.535 38.465q15.535 15.5 38.5 15.5Zm493 286Q750-140 765.5-155.535q15.5-15.535 15.5-38.5T765.465-232.5q-15.535-15.5-38.5-15.5T688.5-232.465q-15.5 15.535-15.5 38.5t15.535 38.465q15.535 15.5 38.5 15.5ZM727-766ZM234-480Zm493 286Z"/></svg>
								</span>
	
								<span class="a_title"><strong>{{__("Share affiliate link on social media")}}</strong></span>
							</div>
							

							<div class="networks">

								<a href="https://wa.me/?text=https://probuysellcoin.com/a/{{$user->id}}" target="_blank" class="single-network" title="{{__('Share with whatsapp')}}"><img src="assets/front/img/whatsapp.png" alt=""></a>
								<a href="https://www.facebook.com/sharer/sharer.php?u=https://probuysellcoin.com/a/{{$user->id}}" target="_blank" class="single-network" title="{{__('Share with Facebook')}}"><img src="assets/front/img/facebook.png" alt=""></a>
								<a href="https://twitter.com/share?url=https://probuysellcoin.com/a/{{$user->id}}" target="_blank" class="single-network" title="{{__('Share with twitter')}}"><img src="assets/front/img/twitter.png" alt=""></a>
								<a href="https://t.me/share/url?url=https://probuysellcoin.com/a/{{$user->id}}" target="_blank" class="single-network" title="{{__('Share with Telegram')}}"><img src="assets/front/img/telegramme.png" alt=""></a>
								<a href="https://www.linkedin.com/sharing/share-offsite/?url=https://probuysellcoin.com/a/{{$user->id}}" target="_blank" class="single-network" title="{{__('Share with Linkedin')}}"><img src="assets/front/img/linkedin.png" alt=""></a>
								<div style="clear:both;"></div>
							</div>
						</p>
					</div>
					<div class="col a_overview">
						<p class="text">
						{{__("Earn 0.4% each time your affiliate completes a successful transaction, and withdraw your earnings via the payment method of your choice")}}
							<ul>
								<li>{{__("Commission for life")}}</li>
								<li>{{__("Withdrawal from 10 USD")}}</li>
								<li>{{__("Withdrawals are approved within 72 hours at the rate of 560F / USD")}}</li>
								<li>{{__("Payment method available: MTN Money, Orange Money, Airtel Money")}}</li>
								<li>{{__("Withdrawal fee 1%")}}</li>
							</ul>
						
						</p>
					</div>
				</div>
				<br>

				<p class="detail" style="display: flex; align-items:center">
					<svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 -960 960 960" width="48"><path d="M120-120v-76l60-60v136h-60Zm165 0v-236l60-60v296h-60Zm165 0v-296l60 61v235h-60Zm165 0v-235l60-60v295h-60Zm165 0v-396l60-60v456h-60ZM120-356v-85l280-278 160 160 280-281v85L560-474 400-634 120-356Z"/></svg>
					<strong>{{__("Details of your affiliate activity")}}</strong>
				</p>

				<table class="tab-affiliation">
					<tr>
						<td class="tab-item" >{{__("Number of affiliates")}}</td>
						<td>{{$detail["affiliated"]}}</td>
					</tr>

					<tr>
						<td>{{__("Total earnings generated ($)")}}</td>
						<td>{{$detail["earning"]}}</td>
					</tr>

					<tr>
						<td>{{__("Account balance ($)")}}</td>
						<td>{{$wallet->amount}}</td>
					</tr>
				</table>

				<br><br>

				@if($wallet->amount>0)

					<div class="row">

						<div class="col-sm-3">

							<a class="btn btn-primary" href="{{Route('withdrawal.form')}}" >{{__('Withdraw my gain')}}</a>
							
						</div>

					</div>

				@endif

			</div>	
		</div>	

		
		@if(count($affiliated)>0)

			<div class="card aff">

				<div class="header">

					<h2><strong>{{__("List of affiliates")}}</strong></h2>

				</div>

				<div class="body">
					
					<table class="tab-affiliation">
						<thead>
							<th>{{__("Name")}}</th>
							<th>{{__("Number of transactions")}}</th>
							
							<th>{{__("Total Generated ($)")}}</th>
							<th>{{__("Recent")}}</th>
						</thead>
						@foreach($affiliated as $val)

							<tr>
								<td class="tab-item" >{{$val->name}}</td>
								<td>{{$val->number}}</td>
								
								<td>{{$val->earning}}</td>
								<td>{{explode(" ",$val->date)[0]}}</td>
							</tr>

						@endforeach

						
					</table>

					

				</div>	
			</div>	

			<div class="panel-footer">

				{{$affiliated_log->links()}}

			</div>

		@endif

		@if($affiliated_log)

			<div class="card aff">

				<div class="header">

					<h2><strong>{{__("Earnings history")}}</strong></h2>

				</div>

				<div class="body">
					
					<table id="log" class="tab-affiliation" data-toggle="table" data-pagination="true">
						<thead>
							<th>{{__("User")}}</th>
							<th>{{__("Earning value ($)")}}</th>
							<th>{{__("Date")}}</th>
							
						</thead>
						@foreach($affiliated_log as $key=>$val)

						@if($val->amount>0)
							
							<tr>
								<td class="tab-item" >{{$val->name}}</td>

								<td>{{$val->amount}}</td>

								<td>{{str_replace(" ", " à ",$val->created_at)}}</td>
							</tr>
						@endif

						@endforeach

						

						
					</table>

				</div>	
			</div>	

			

			<div class="panel-footer">

				{{$affiliated_log->links()}}

			</div>

      

		@endif
		@include('home.partials.footer')

    </div>
		<div>
		<div  class="modal" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">{{__("Share with")}}</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
		</div>
		
</div>




<script>
	let btn=document.querySelector("#a_link");
	document.querySelector(".copieur").addEventListener('click',()=>{navigator.clipboard.writeText(btn.textContent)});

	
</script>





@endsection

@section('footer')

  @include('partials.footer')

@endsection

