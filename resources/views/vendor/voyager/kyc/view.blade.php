@extends('voyager::master')
@section('page_header')
    <div class="container-fluid">
        <h1 class="page-title">
            <i class="voyager-person"></i> Profile Status
        </h1>
        @include('voyager::multilingual.language-selector')
    </div>
@stop
@section('content')
<div class="page-content browse container-fluid">
    @include('voyager::alerts')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-bordered">
                <div class="panel-body">
                    <div class="row mb-3">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <label for="avatar">{{__('ID document')}}</label>
                  </div>
                  @if($profile != null )
                  <div class="card-body">
                    <img src="{{$profile->document()}}" alt="" class="img-fluid">
                  </div>
                  @endif
                </div>
              </div>
            </div>
            
            <div class="row mb-3">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <label for="avatar">{{__('Address document')}}</label>
                  </div>
                  @if($profile != null )
                  <div class="card-body">
                    <img src="{{$profile->document2()}}" alt="" class="img-fluid">
                  </div>
                  @endif
                </div>
              </div>
            </div>
            
            <div class="row mb-3">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <label for="avatar">{{__('Document of user holding ID')}}</label>
                  </div>
                  @if($profile != null )
                  <div class="card-body">
                    <img src="{{$profile->document3()}}" alt="" class="img-fluid">
                  </div>
                  @endif
                </div>
              </div>
            </div>
            
            <div class="row mb-3">
                @if($profile->User['identity_proven'] !== 1 )
                    <form method="POST">
                        {{csrf_field()}}
                        <div class="form-group ">
                            <label for="comments">Comments</label>
                            <input type="text" class="form-control" id="comments" name="comments"  placeholder="Enter a comment for the review (optional)">
                         </div>
                         <div class="form-group">
                            <input type="submit" class="form-control btn btn-success" value="Validate" name="validate">
                         </div>
                         <div class="form-group">
                            <input type="submit" class="form-control btn btn-danger" value="Reject" name="reject">
                         </div>
                    </form>
                @endif
            </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
