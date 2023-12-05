@extends('voyager::master')

@section('page_header')

    <div class="container-fluid">

        <h1 class="page-title">

            <i class="voyager-person"></i> Sell Requests

        </h1>

        @include('voyager::multilingual.language-selector')

    </div>

    <style>

        .mail-content{

            word-wrap: break-word;

        }

    </style>

@stop

@section('content')

<div class="page-content browse container-fluid">

    @include('voyager::alerts')

    <div class="row">

        <div class="col-md-12">

            <div class="panel panel-bordered">

                <div class="panel-body">

                    <div class="table-responsive">

                        <table class="table table-hover dataTable">

                            <thead>

                                <tr>

                                    <th>Sr.No</th>

                                    <th>Date</th>

                                    <th>Trx</th>

                                    <th>User Name</th>

                                    <th>Crypto Amount</th>

                                    <th>Amount</th>

                                    <th>Devise</th>

                                    <th>Wallet Address</th>

                                    <th>Pay method</th>

                                    <th>Pay infos</th>

                                    <th>Receipt</th>

                                    <th>Status</th>

                                    @if($type == 'pending_requests')

                                        <th>Action</th>

                                    @endif

                                </tr>

                            </thead>

                            <tbody>

                                @foreach($requests as $key=>$row)

                                    <tr>

                                        <td>{{$key+1}}</td>

                                        <td>{{date('Y M,d',strtotime($row->created_at))}}</td>

                                        <td>

                                            @isset($row->trx){{$row->trx}}@endisset

                                        </td> 

                                        <td>

                                            @isset($row->user->name){{$row->user->name}}@endisset

                                        </td> 

                                        <td>

                                            @isset($row->crypto_amount){{$row->crypto_amount}}@endisset

                                        </td> 

                                        <td>

                                            @isset($row->total_amount){{$row->total_amount}}@endisset

                                        </td> 

                                        <td>

                                            @isset($row->crypto){{$row->crypto}}@endisset

                                        </td>

                                        <td>

                                            @isset($row->wallet_address){{$row->wallet_address}}@endisset

                                        </td>
                                        
                                        <td>

                                            @isset($row->deposit_method){{$row->deposit_method}}@endisset

                                        </td>

                                        <td>

                                            @isset($row->paiement_address){{$row->paiement_address}}@endisset

                                        </td>

                                        <td>

                                            @if(isset($row->receipt))

                                            <span data-href="{{url('/assets/receipt/'.$row->receipt)}}"  class="btn btn-xs btn-info receipBtn">

                                                See Receipt

                                            </span>

                                            @else

                                                <a href="#" class="btn btn-xs btn-info">

                                                    Not uploaded yet

                                                </a>

                                            @endif

                                        </td>

                                       <td>

                                           <strong>

                                            @if($row->status == 0)

                                                <span class="badge badge-danger">Pending</span>

                                            @endif

                                            @if($row->status == 1)

                                                <span class="badge badge-success">Approved</span>

                                            @endif

                                            @if($row->status == 2)

                                                <span class="badge badge-danger">Rejected</span>

                                            @endif

                                            </strong>

                                       </td>

                                       @if($type == 'pending_requests')

                                            <td>

                                                <a href="javascript:void(0)" class="btn btn-xs {{ ($row->status == 0) ? 'btn-danger' : 'btn-success' }} ml-1 statusBtn" data-original-title="@lang('Status')" data-toggle="tooltip" data-url="{{route('admin.update_sell_crypto_status',$row->id)}}">

                                                    View

                                                </a>

                                            </td>

                                        @endif

                                    </tr>

                                @endforeach

                            </tbody>

                        </table>

                    </div>

                 </div>

            </div>

        </div>

    </div>

</div>



{{-- Status MODAL --}}

<div class="modal fade" id="statusModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <h4 class="modal-title" id="myModalLabel">@lang('Update Status')</h4>

                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

            </div>

            <form method="post" action="">

                @csrf



                <div class="modal-body">

                    <p class="text-muted">@lang('Are you sure to change status?')</p>

                    <div class="row">

                        <div class="col-sm-12">

                            <div class="form-group">

                                <label>Status</label>

                                <select class="form-control" required="" name="status">

                                    <option value="">--select--</option>

                                    <option value="1">Approved</option>

                                    <option value="2">Reject</option>

                                </select>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="modal-footer">

                    <button type="button" class="btn btn--dark" data-dismiss="modal">@lang('No')</button>

                    <button type="submit" class="btn btn--danger deleteButton">@lang('Yes')</button>

                </div>

            </form>

        </div>

    </div>

</div>


{{-- receip MODAL --}}

<div class="modal fade" id="receipModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <h4 class="modal-title" id="myModalLabel">Reçu</h4>

                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

            </div>

            <form method="post" action="">

                @csrf



                <div class="modal-body">

                    <p class="text-muted">Reçu envoyé par l'utilisateur</p>

                    <div class="row">

                        <div class="col-sm-12">

                            <img style="height:auto; width:inherit" id="receipContainer" src="" alt="Le reçu s'affiche ici s'il est disponible">

                        </div>

                    </div>

                </div>

                <div class="modal-footer">

                    

                </div>

            </form>

        </div>

    </div>

</div>
<script type="text/javascript">

    document.addEventListener('DOMContentLoaded',function(){

        $('.dataTable').DataTable({});

        $('.statusBtn').on('click', function () {

            var modal = $('#statusModal');

            var url = $(this).data('url');



            modal.find('form').attr('action', url);

            modal.modal('show');

        });

        $('.receipBtn').each(function(){
        
            $(this).on("click",function(){

                var modal = $('#receipModal');

                var img = $(this).attr('data-href');

console.log(img);

                //modal.find('form').attr('action', url);
                $('#receipContainer').attr("src","");
                
                $('#receipContainer').attr("src",img);

                modal.modal('show');
            
            })
        })

    },false);

</script>

@endsection