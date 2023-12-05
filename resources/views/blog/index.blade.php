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

<link rel="shortcut icon" href="/assets/front/img/2.png" type="image/png">





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

<h2 class="head-title"><br class="d-none d-xl-block">Do you want to learn more about crypto-world ?</h2>

<p>welcome to our blog, here we give you the latest news on cryptocurrency.

</p>



</div>

</div>

<div class="col-lg-6 col-md-12 col-xs-12 p-0">

<div class="intro-img">

<img src="/assets/front/img/business/business-img.png" alt="">

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
                   
                   

                    <div class="row">

                      <?php 
                            if(!empty($posts)){

                                for($i=0; $i<count($posts); $i++){?>

                                <div class="col-lg-6">
                                    <!-- Blog post-->
                                    <div class="card mb-4">
                                        <a href="{{'/blog/'.$posts[$i]->id}}"><img class="card-img-top" src="{{Storage::url($posts[$i]->image)}}" alt="..." /></a>
                                        <div class="card-body">
                                            <div class="small text-muted">{{explode(' ',$posts[$i]->created_at)[0]}}</div>
                                            <h2 class="card-title h4">{{$posts[$i]->title}}</h2>
                                            <p class="card-text">{{substr($posts[$i]->excerpt,0,100)}} ...</p>
                                            <a class="btn read-more-btn btn-primary" href="{{'/blog/'.$posts[$i]->id}}">Read more →</a>
                                        </div>
                                    </div>
                                </div>

                            <?php }
                            }
                            
                            else
                            {
                                echo '<br><h2 style="text-align:center;" class="card-title">Cette section est vide pour le moment </h2><br><br>';
                            }?>

                    </div>
                    <!-- Pagination-->
                    @if($count/15>0)
                        <nav aria-label="Pagination">
                            <hr class="my-0" />
                            <ul class="pagination justify-content-center my-4">
                                

                                <?php
                                    
                                    for ($i=1; $i <=$count/15; $i++) { 
                                
                                        $active=($i==$page)?"active":"";
                                        echo '<li class="page-item '.$active.' " aria-current="page"><a class="page-link" href="/blogs?page='.$i.'">'.$i.'</a></li>';
                                    
                                    }
                                ?>
                            
                               
                            </ul>
                        </nav>
                    @endif
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

