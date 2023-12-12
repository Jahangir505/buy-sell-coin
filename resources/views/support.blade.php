@extends('layouts.app')

@section('content')

<div class="row support_page">

    @include('partials.sidebar')

    <div class="col-md-9 " style="padding-right: 40px" id="sendMoney">

      @include('flash')

      	<div class="card aff">

			<div class="header">

				<h2><strong>{{__("ProBuySell Support")}}</strong></h2>

			</div>

			<div class="body">

                <div class="row support-container">

                    <div class="col-4 support-item">
                        <a class="row support" href="test">
                            <div class="col-9">
                                <p class="title">{{__("Live chat")}}</p>

                                <p class="description">{{__("Write us direcly on our live chat and get the response immediately")}}</p>

                                <p class="action">{{__("Join")}}</p>

                            </div>

                            <div class="col-3">
                                <img src="/assets/front/img/512_512.png" alt="">
                            </div>
                        </a>
                    </div>

                    <div class="col-4 support-item">
                        <a class="row support" href="test">
                            <div class="col-9">
                                <p class="title">{{__("Telegram")}}</p>

                                <p class="description">{{__("Whe are on telegram, write us here to get others informations")}}</p>

                                <p class="action">{{__("Join")}}</p>

                            </div>

                            <div class="col-3">
                                <img src="/assets/front/img/telegramme.png" alt="">
                            </div>
                        </a>
                    </div>

                    <div class="col-4 support-item">
                        <a class="row support" href="test">
                            <div class="col-9">
                                <p class="title">{{__("whatsapp")}}</p>

                                <p class="description">{{__("Join us on whatsapp if you want more information")}}</p>

                                <p class="action">{{__("Join")}}</p>

                            </div>

                            <div class="col-3">
                                <img src="/assets/front/img/whatsapp.png" alt="">
                            </div>
                        </a>

                    </div>

                    

                    <div class="col-4 support-item">
                        <a class="row support" href="test">
                            <div class="col-9">
                                <p class="title">{{__("Facebook")}}</p>

                                <p class="description">{{__("Discover our Facebook page and follow us for getting all our newest actualities")}}</p>

                                <p class="action">{{__("Join")}}</p>

                            </div>

                            <div class="col-3">
                                <img src="/assets/front/img/facebook.png" alt="">
                            </div>
                        </a>
                    </div>

                    <div class="col-4 support-item">

                        <a class="row support " href="test">
                            <div class="col-9">
                                <p class="title">{{__("Twitter")}}</p>

                                <p class="description">{{__("Join us on twitter if you want more information")}}</p>

                                <p class="action">{{__("Join")}}</p>

                            </div>

                            <div class="col-3">
                                <img src="/assets/front/img/twitter.png" alt="">
                            </div>
                        </a>
                    </div>

                    

                    

                    <div class="col-4 support-item">
                        <a class="row support" href="/blogs">
                            <div class="col-9">
                                <p class="title">{{__("Blog")}}</p>

                                <p class="description">{{__("Read articles about Crypto world for get more information")}}</p>

                                <p class="action">{{__("Join")}}</p>

                            </div>

                            <div class="col-3">
                                <img src="/assets/front/img/512_512.png" alt="">
                            </div>
                        </a>
                    </div>

                    

                </div>

            </div>
				
		</div>

    </div>
	
</div>







@endsection

@section('footer')

  @include('partials.footer')

@endsection

