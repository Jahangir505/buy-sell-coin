

@if($transactions_to_confirm->count() > 0)



<div class="panel panel-default mt-5">


     <style>
      thead th{
        background: #22be68 !important;
        color: #ffffff !important;
      }
        tr:nth-child(even){background-color: #f2f2f2}
        .panel-footer{
          margin-top: 15px !important;
        }
        tr:hover{
        background-color: #92909047;
      }
      </style> 


<div class="panel-body">

  <div class="card user-account">

    <div class="header">

        <h2><strong>{{__('Pending')}}</strong>{{__('Transactions')}}</h2>

        

        <ul class="header-dropdown">

            

            <li class="remove">

                <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>

            </li>

        </ul>

        

    </div>

    <div class="body">

        <div class="table-responsive">

            <table class="table m-b-0">

                <thead>

                    <tr>

                        <th>id</th>

                        <th>{{__('Date')}}</th>
                        
                        <th>{{__('Operation')}}</th>
                        
                        <th>{{__('Devise')}}</th>
                        
                        <th>{{__('Amount')}} (USD)</th>
                        <th>{{__('Status')}}</th>

                        <th>{{__('More')}}</th>

                        

                    </tr>

                </thead>

                <tbody>

                  @foreach(@$transactions_to_confirm as $transaction)
                  
                    
                    
                            @if(@$transaction !== null)
                              
                                <tr>

                                  <td>{{$transaction->id}}</td>

                                  <td>{{explode(" ",$transaction->created_at)[0]}}</td>
                                  


                                  <td>{{$transaction->table_type}} <br> <a href="#">{{$transaction->deposit_method}}</a></td>

                                  <td>{{$transaction->crypto}}</a></td>

                                  <td>{{$transaction->total_amount}}</td>
                                  <td><span class="badge badge-info">{{__('Pending')}}</span></td>

                                  <td class="more_btn_container"><span data-info="{{json_encode($transaction)}} " data-toggle="modal" data-target="#more_detail" class="badge badge-info transaction_more_btn">{{__('Detail')}}</span></td>

                                  {{-- <td></td> --}}

                                </tr>

                                {{-- <td>

                                  <form action="{{url('/')}}/transaction/remove" method="post">

                                    {{csrf_field()}}

                                    <input type="hidden" name="tid" value="{{$transaction->id}}">

                                    <input type="submit"  class="btn btn-link btn-xs pull-right" value="X">

                                  </form>

                                </td> --}}

                                
                                    

                                      @elseif(@$transaction === null)
                                          
                                         
                                        <tr>

                                        <td>{{$transaction->id}}</td>

                                        <td>{{explode(" ",$transaction->created_at)[0]}} <br> <span class="badge badge-info">{{__('Pending')}}</span></td>

                                        

                                        <td>{{$transaction->table_type}} <br> <a href="#">{{$transaction->deposit_method}}</a></a></td>

                                        <td>{{$transaction->crypto}}</a></td>

                                        <td>{{$transaction->total_amount}}</td>

                                        <td class="more_btn_container"><span data-info="{{json_encode($transaction)}} " data-toggle="modal" data-target="#more_detail" class="badge badge-info transaction_more_btn">{{__('Detail')}}</span></td>

                                        </tr>
                                        @endif
                            
                      @endforeach 

                </tbody>

            </table>
            @if(@$transactions_to_confirm)

            <div class="panel-footer">
          
            {{@$transactions_to_confirm->links()}}
          
            </div>
          
          @else
          
          @endif
        </div>

    </div>

  </div>

</div>



</div>

<div class="modal detail_operation" id="more_detail" tabindex="-1" role="dialog" aria-labelledby="Detail" aria-hidden="true">

<div class="modal-dialog modal-dialog-centered" role="document">

<div class="modal-content">

    <div class="modal-header">

    <h5 class="modal-title" id="exampleModalLongTitle">{{__("Detail de l'opération")}}</h5>

    <button type="button" class="close" data-dismiss="modal" aria-label="Close">

        <span aria-hidden="true">&times;</span>

    </button>

    </div>

    <div class="modal-body" style="text-align:left">

      

      <div class="menu row">
        <div class="menu_item menu_detail" id="menu_detail">Detail</div>
        <div class="menu_item menu_send" id="menu_send">Reçu envoyé</div>
        <div class="menu_item menu_get" id="menu_get">Reçu obtenu </div>
      </div>

      <div class="detail_container">
          <div class="container">
            <div class="row item">
              <span>{{__("Id opération")}}</span>
              <span class="val id">{{__("0")}}</span>
            </div>

            <div class="row item">
              <span>{{__("Date")}}</span>
              <span class="val date">{{__("0")}}</span>
            </div>

            <div class="row item">
              <span>{{__("Operation")}}</span>
              <span class="val type">{{__("0")}}</span>
            </div>

            <div class="row item">
              <span>{{__("Montant($)")}}</span>
              <span class="val amount">{{__("0")}}</span>
              </div>

            <div class="row item">
              <span>{{__("Montant(FCFA)")}}</span>
              <span class="val amount_cfa">{{__("0")}}</span>
              </div>

            <div class="row item">
              <span>{{__("Devise")}}</span>
              <span class="val devise">{{__("0")}}</span>
              </div>

            <div class="row item">
              <span>{{__("Taux de change")}}</span>
              <span class="val taux">{{__("0")}}</span>
              </div>

            

            <div class="row item">
              <span>{{__("Method de paiement")}}</span>
              <span class="val method">{{__("0")}}</span>
              </div>

            <div class="row item sell_only">
              <span>{{__("Adresse/numero de paiement")}}</span>
              <span class="val adress_method ">{{__("0")}}</span>
            </div>

            <div class="row item">
              <span>{{__("Adresse porte-feuille")}}</span>
              <span class="val adress">{{__("0")}}</span>
            </div>
          </div>

        
        </div>

        <div class="user_image_container">

            <div class="user_image">

              <span class="item">{{__("Votre preuve de trasaction")}}</span>
              <img src="" alt="">
            </div>

          </div>

          <div class="admin_image_container">

            <div class="admin_image">

              <span class="item">{{__("Preuve de paiement envoyé par l'administrateur")}}</span>
              <img src="" alt="">
            </div>

          </div>
      
    </div>

    <div class="modal-footer">

    <button type="button" class="badge badge-info " data-dismiss="modal">{{__("Retour")}}</button>
    
    </div>

</div>

</div>

</div>



@endif

