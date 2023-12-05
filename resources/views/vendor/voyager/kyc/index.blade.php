@extends('voyager::master')
@section('page_header')
    <div class="container-fluid">
        <h1 class="page-title">
            <i class="voyager-person"></i> Profile Status
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
        <table id="dataTable" class="table table-hover">
            <thead>
                <tr>
                    <th>User Name</th>
                    <th>User email</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($profiles as $profile)
                    @if(!empty($profile->User))
                    <tr>
                        <td>{{$profile->User['name']}}</td>
                        <td>{{$profile->User['email']}}</td>
                        
                        @if($profile->User['identity_proven'] == 1)
                            <td>
                                <strong>
                                    <span class="badge badge-success">Yes</span>
                                </strong>
                            </td>
                        @else
                            <td>
                                <strong>
                                    <span class="badge badge-danger">No</span>
                                </strong>
                            </td>
                        @endif
                        <td>
                            <a class="btn btn-primary" href="{{url('/admin/kyc/view/'.$profile->id)}}">
                                View documents
                            </a>
                        </td>
                    </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
                 </div>
            </div>
        </div>
    </div>
</div>
@endsection