@extends('voyager::master')
@section('page_header')
    <div class="container-fluid">
        <h1 class="page-title">
            <i class="voyager-check-circle"></i> Status de l'administration
        </h1>
        
    </div>
    <style>
        .form-check{
            margin-left:30px;
            font-size: 17px;
            margin-bottom: 10px;
            display: flex;
        }

        .form-check input{
            display: block;
            height:20px;
            width: 20px;
            margin-right: 5px;
        }

        .btn{

            margin-left:30px;
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
            
         
            <div class="form-check row">
                <input class="form-check-input" id="flexRadioDefault1" type="radio" name="status" value="1" <?php if ($status==1){echo "checked";}?>>
                <label class="form-check-label" for="flexRadioDefault1">
                    En line
                </label>
            </div>
            <div class="form-check row">
                <input class="form-check-input" type="radio" name="status" value="0" <?php if ($status==0){echo "checked";}?>>
                <label class="form-check-label" id="flexRadioDefault1" for="flexRadioDefault2">
                    Hors ligne
                </label>
            </div>
               
            
            <button type="submit" class="btn btn-primary">Changer</button>
        </form>
    </div>
@stop