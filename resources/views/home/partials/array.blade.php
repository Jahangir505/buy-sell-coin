?>

    <tr>

    <td>{{$transaction->id}}</td>

    <td>{{$transaction->created_at->format('d M Y')}} <br> include('home.partials.status')</td>

    <td>

      @if($transaction->transactionable_type == 'App\Models\Send')

      {{__('Funds')}} <br>{{__('Availability')}}

      @elseif($transaction->transactionable_type == 'App\Models\Purchase')

      5 Min

      @endif

    </td>

    <td>



    @include('home.partials.name')</a></td>

    <td>{{$transaction->gross()}}</td>

    <td>{{$transaction->fee()}}</td>

    <td>{{$transaction->net()}}</td>



    <td>

      @if($transaction->transactionable_type == 'App\Models\Send')

      <form action="{{route('sendMoneyConfirm')}}" method="post">

      @elseif($transaction->transactionable_type == 'App\Models\Purchase')

      <form action="{{route('purchaseConfirm')}}" method="post">

      @endif

      

      {{csrf_field()}}

      <input type="hidden" name="tid" value="{{$transaction->id}}">

      <p style="background-color:rgb(250 250 250); box-shadow:3px 3px 5px gray; color:black; border:none"   class="btn btn-success btn-simple btn-square btn-xs pull-left" >Waiting...</p>

      </form>

      <div class="clearfix"></div>

    </td>

    <td>



      <form action="{{url('/')}}/transaction/remove" method="post">

        {{csrf_field()}}

        <input type="hidden" name="tid" value="{{$transaction->id}}">

        <input type="submit"  class="btn btn-link btn-xs pull-right" value="X">

      </form>

    </td>

  </tr>