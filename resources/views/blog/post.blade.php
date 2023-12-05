

<? //@extends('layouts.app')?>



<!DOCTYPE html>

<html lang="en">

<head>



<meta charset="utf-8">

<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<meta name="keywords" content="Bootstrap, Landing page, Template, Business, Service">

<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<meta name="author" content="Grayrids">

<title> {{ setting('site.description') }} </title>



<link rel="shortcut icon" href="/assets/front/img/2.png" type="image/png">



<link rel="stylesheet" href="/assets/front/css/bootstrap-4.5.0.min.css">

<link rel="stylesheet" href="/assets/front/css/animate.css">

<link rel="stylesheet" href="/assets/front/css/LineIcons.2.0.css">

<link rel="stylesheet" href="/assets/front/css/owl.carousel.2.3.4.min.css">

<link rel="stylesheet" href="/assets/front/css/owl.theme.css">

<link rel="stylesheet" href="/assets/front/css/magnific-popup.css">

<link rel="stylesheet" href="/assets/front/css/nivo-lightbox.css">

<link rel="stylesheet" href="/assets/front/css/main.css">

<link rel="stylesheet" href="/assets/front/css/responsive.css">

<link rel="stylesheet" href="/assets/front/css/style.css">



<style>
.read-more-btn{
  border-radius:1px;
  padding: 8px;
  background-color:rgb(3, 131, 148);
  
}

#navbar-area{
    background-color:blue;
}
</style>

</head>

<body class="no_styck">
<header class="hero-area">

<div class="overlay">

<span></span>

<span></span>

</div>

@include('menu')



<div id="home">

<div class="container">

<div class="row space-100">

<div class="col-lg-6 col-md-12 col-xs-12">

<div class="contents">







</div>

</div>



</div>

</div>

</div>

</header>

<!-- Responsive navbar-->

        <!-- Page content-->
        <div class="container">
            <div class="row">
               
                <div class="col-lg-8">
                   
                    <div class="card mb-4">
                        <a href="#!"><img class="card-img-top" src="{{Storage::url($post->image)}}" alt="..." /></a>
                        <div class="card-body">
                            <div class="small text-muted">{{explode(' ',$post->created_at)[0]}}</div>
                            <h2 class="card-title">{{$post->title}}</h2><br>
                            <p style="font-size:18px; color:black;" class="card-text">{!! nl2br($post->excerpt) !!}</p>
                            
                        </div>
                    </div>
                    
                    <br><h2 style="text-align:center;" class="card-title">Articles simillaires</h2><br><br>

                    <div class="row">

                      <?php for($i=0; $i<count($same); $i++){?>

                        <div class="col-lg-6">
                            <!-- Blog post-->
                            <div class="card mb-4">
                                <a href="{{'/blog/'.$same[$i]->id}}"><img class="card-img-top" src="{{Storage::url($same[$i]->image)}}" alt="..." /></a>
                                <div class="card-body">
                                    <div class="small text-muted">{{explode(' ',$same[$i]->created_at)[0]}}</div>
                                    <h2 class="card-title h4">{{$same[$i]->title}}</h2>
                                    <p style="font-size:16px; color:gray;" class="card-text">{{substr($same[$i]->excerpt,0,100)}} ...</p>
                                    <a class="btn read-more-btn btn-primary" href="{{'/blog/'.$same[$i]->id}}">Read more →</a>
                                </div>
                            </div>
                          </div>

                      <?php }?>

                    </div>
                    <!-- Pagination-->
                    <nav aria-label="Pagination">
                        <hr class="my-0" />
                        <ul class="pagination justify-content-center my-4">
                            <li class="page-item disabled"><a class="page-link" href="#" tabindex="-1" aria-disabled="true">Newer</a></li>
                            <li class="page-item active" aria-current="page"><a class="page-link" href="#!">1</a></li>
                            <li class="page-item"><a class="page-link" href="#!">2</a></li>
                            <li class="page-item"><a class="page-link" href="#!">3</a></li>
                            <li class="page-item disabled"><a class="page-link" href="#!">...</a></li>
                            <li class="page-item"><a class="page-link" href="#!">15</a></li>
                            <li class="page-item"><a class="page-link" href="#!">Older</a></li>
                        </ul>
                    </nav>
                </div>
                <!-- Side widgets-->
                <div class="col-lg-4">
                    <!-- Search widget-->
                    <div class="card mb-4">
                        <div class="card-header">Search</div>
                        <div class="card-body">
                        <form action="/blogs/search" method="post">{{csrf_field()}}
                            <div class="input-group">
                                <input name="word" class="form-control" type="text" placeholder="Enter search term..." aria-label="Enter search term..." aria-describedby="button-search" />
                                <input class="btn btn-primary" id="button-search" type="submit" value="GO">
                            </div>
                        </form>
                        </div>
                    </div>
                    <!-- Categories widget-->
                    <div class="card mb-4">
                        <div class="card-header">Categories</div>
                        <div class="card-body">
                            <div class="row">
                                
                                    <ul class="list-unstyled mb-0">

                                    <?php for($i=0; $i<count($cat); $i++){?>

                                        <li style="float:left; display:block; margin-left:5px;  margin-bottom:15px; width:45%;"><a href="/blogs/cat/{{ucfirst($cat[$i]->name)}}">{{ucfirst($cat[$i]->name)}}</a></li>
                                        
                                    <?php }?>

                                    </ul>
                               
                                    
                                
                            </div>
                        </div>
                    </div>
                    <!-- Side widget-->
                    <div class="card mb-4">
                        <div class="card-header">Side Widget</div>
                        <div class="card-body">You can put anything you want inside of these side widgets. They are easy to use, and feature the Bootstrap 5 card component!</div>
                    </div>
                </div>
            </div>
        </div>
        
        @include('footer')












