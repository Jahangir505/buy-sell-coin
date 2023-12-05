@extends('voyager::master')
@section('page_header')
    <div class="container-fluid">
        <h1 class="page-title">
            <i class="voyager-phone"></i> Numero d'assistance client
        </h1>
        
    </div>
    <style>
        .mail-content{
            word-wrap: break-word;
        }
    </style>
@stop
@section('content')
    <div class="page-content browse container-fluid">
        @if(isset($_GET['success']))
            <div class="alert alert-success" role="alert">
                
            </div>
        @endif
        <form action="" method="POST">
            {{ csrf_field() }}
            <h1>Numero whatsapp d'assistance</h1>
            <div class="row">
                <div class="form-group col-xs-12 col-lg-6">
                    <label for="subject">Numero de telephone</label>
                    <input type="text" value="{{$phone}}" class="form-control" id="subject" name="phone" required />
                </div>
            </div>
            
            <button type="submit" class="btn btn-primary">Changer</button>
        </form>
    </div>
@stop