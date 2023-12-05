@if($transactions->count() > 0)

<div class="card user-account">

          <div class="header">

              <h2><strong>{{__('Complete')}}</strong>{{__('Transactions')}}</h2>

              {{--

              <ul class="header-dropdown">

                  <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more"></i> </a>

                      <ul class="dropdown-menu dropdown-menu-right slideUp float-right">

                          <li><a href="javascript:void(0);">{{__('Action')}}</a></li>

                          <li><a href="javascript:void(0);">{{__('Another action')}}</a></li>

                          <li><a href="javascript:void(0);">{{__('Something else')}}</a></li>

                      </ul>

                  </li>

                  <li class="remove">

                      <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>

                  </li>

              </ul>

              --}}

          </div>

          <div class="body">

              <div class="table-responsive">

                  <table class="table m-b-0">

                      <thead>

                          <tr>

                              

                              <th>{{__('Id')}}</th>

                              <th >{{__('Date')}}</th>
                              <th >{{__('Status')}}</th>

                              <th>{{__('Operation')}}</th>

                              <th>{{__('Devise')}}</th>

                              <th>{{__('Amount')}} (USD)</th>

                              <th>{{__('More')}}</th>

                              

                          </tr>

                      </thead>

                      @forelse($transactions as $transaction)

                        <tr>

                         

                          

                        <td>{{$transaction->id}}</td>

                        <td>{{explode(" ",$transaction->created_at)[0]}} </td>
                        <td>@if($transaction->status=="1")
                                
                            <span class="badge badge-success">{{__('complete')}}</span>
                        @else
                        

                        <span class="badge badge-danger">{{__('rejected')}}</span>
                        @endif</td>
                        <td>{{$transaction->table_type}} <br> <a href="#">{{$transaction->deposit_method}}</a></td>

                        <td>{{$transaction->crypto}}</a></td>

                        <td>{{$transaction->total_amount}}</td>

                        <td class="more_btn_container">

                            @if($transaction->status=="1")
                                
                            <span data-info="{{json_encode($transaction)}} " data-toggle="modal" data-target="#more_detail" class="badge badge-success transaction_more_btn">{{__('Detail')}}</span></td>
                            @else
                        
                            <span data-info="{{json_encode($transaction)}} " data-toggle="modal" data-target="#more_detail" class="badge badge-danger transaction_more_btn">{{__('Detail')}}</span></td>
                            @endif
                        
                        </tr>

                    @empty

                    

                    @endforelse

                  </table>

              </div>

          </div>

          @if(@$transactions)

          <div class="panel-footer">
        
          {{@$transactions->links()}}
        
          </div>
        
        @else
        
        @endif

        <div class="footer">

            

        </div>

      @else

    

</div>



@endif