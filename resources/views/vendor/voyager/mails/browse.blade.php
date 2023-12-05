@extends('voyager::master')
@section('page_header')
    <div class="container-fluid">
        <h1 class="page-title">
            <i class="voyager-mail"></i> Mails
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
        @if(isset($_GET['success']))
            <div class="alert alert-success" role="alert">
                {{__('email sent')}}
            </div>
        @endif
        <form action="" method="POST">
            {{ csrf_field() }}
            <h1>{{__('Send mail to all registered users')}}</h1>
            <div class="row">
                <div class="form-group col-xs-12 col-lg-6">
                    <label for="subject">{{__('Subject of the email')}}</label>
                    <input type="text" class="form-control" id="subject" name="subject" required />
                </div>
            </div>
            <div class="row">
                <div class="form-group col-xs-12 col-lg-6">
                    <label for="content">{{__('Content of the email')}}</label>
                    <textarea wrap="off" class="form-control mail-content" id="content" name="content" rows="3" required>
                        
                    </textarea>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Send email</button>
        </form>
    </div>
@stop