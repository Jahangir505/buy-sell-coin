@if($transaction->activity_title == 'Money Sent')
	{{$transaction->activity_title}} <br><a href="#">{{__('To')}} {{$transaction->entity_name}}</a>
@elseif($transaction->activity_title == 'Withdrawal')
	{{$transaction->activity_title}} <br><a href="#">{{__('To')}} {{$transaction->entity_name}}</a>
@elseif($transaction->activity_title == 'Money Received')
	{{$transaction->activity_title}} <br><a href="#">{{__('From')}} {{$transaction->entity_name}}</a>
	
@elseif($transaction->activity_title == 'Payment Received')
	{{$transaction->activity_title}} <br><a href="#">{{__('From')}} {{$transaction->entity_name}}</a>
@elseif($transaction->activity_title == 'Payment Received')
	{{$transaction->activity_title}} <br><a href="#">{{__('From')}} {{$transaction->entity_name}}</a>
@elseif($transaction->activity_title == 'Voucher Load')
	{{$transaction->entity_name}} <br><a href="#"> {{__('Voucher Load')}}</a>
@elseif($transaction->activity_title == 'Voucher Generation')
	{{$transaction->entity_name}} <br><a href="#"> {{__('Voucher Generation')}}</a>
@elseif($transaction->activity_title == 'Added Voucher to system')
	{{$transaction->entity_name}} <br><a href="#"> {{__('Added Voucher to system')}}</a>
@elseif($transaction->activity_title == 'Purchase')
	{{$transaction->activity_title}} <br><a href="#">{{__('From')}} {{$transaction->entity_name}}</a>
@elseif($transaction->activity_title == 'Deposit')
	{{$transaction->activity_title}} <br><a href="#">{{__('From')}} {{$transaction->entity_name}}</a>
@elseif($transaction->activity_title == 'Gift Card')
	{{$transaction->activity_title}} <br><a href="#">{{__('From')}} {{$transaction->entity_name}}</a>
@elseif($transaction->activity_title == 'Buy Crypto')
	{{$transaction->activity_title}} <br><a href="#">{{__('From')}} {{$transaction->entity_name}}</a>
@elseif($transaction->activity_title == 'Sell Crypto')
	{{$transaction->activity_title}} <br><a href="#">{{__('From')}} {{$transaction->entity_name}}</a>
@elseif($transaction->activity_title == 'Sale')
	{{$transaction->activity_title}} <br><a href="#">{{__('In')}} {{$transaction->entity_name}} </a>
@elseif($transaction->activity_title == 'Payzoft Card fund')
	{{$transaction->activity_title}} <br><a href="#">{{__('In')}} {{$transaction->entity_name}} </a>
	@elseif($transaction->activity_title == 'Payzoft Card Creation')
	{{$transaction->activity_title}} <br><a href="#">{{__('In')}} {{$transaction->entity_name}} </a>
@elseif($transaction->activity_title == 'Currency Exchange')
	{{$transaction->activity_title}} <br><a href="#"> @if($transaction->money_flow == '+') {{__('Exchanged To')}} 	
@else {{__('Exchanged From')}} @endif {{$transaction->entity_name}}</a>
@endif
