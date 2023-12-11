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

        
        </style>

    <script src="/assets/front/js/vendor/jquery-3.5.1-min.js"></script>

    </head>

    <body id="confirm_page">

    <div class="headers">
        <p class="logo"></p>
        <h1 class="title">{{__(ucfirst($want)." coins")}}<img src="https://probuysellcoin.com/assets/front/img/money-bag.png" class="buy-coin" alt="BUY SELL COIN"></h1>
    </div>

    

    <form  class="crypto-form confirm_form" id="@php echo $want."_crypto"@endphp" @if($want=="buy") action="{{route('postBuyCrypto')}}" @endif @if($want=="sell") action="{{route('postSellCrypto')}}" @endif method="post" enctype="multipart/form-data">
            
        <div class="row" id="confirmForm" style="background: #1f2937; margin: 10px;; padding: 10px;">

            
                <div id="payInfo" class="col">


                    <div  class="services-item ">

                    <p><div class="body">

                        <p class="pay-info text-white">{{ __("Payment method") }}: <span class="pay-value" id="pay-method">{{$data->pay_method}}</span></p>
                        <p class="pay-info text-white">{{ __("Amount due") }}: <span class="pay-value" id="pay-amount">{{$data->crypto_amount}} FCFA</span></p>
                        
                        @if($want=="buy")

                            <div class="pay-info text-white">{{ __("Procedure") }}: 

                                <?php $how_to="";?>

                                @foreach($deposit as $key=>$value)

                                    <span data-deposit_name="{{$value->name}}" class="hide data-deposit">{{$value->how_to}}</span>

                                    <?php if($value->name==$data->pay_method){$how_to=$value->how_to;}?>

                                @endforeach

                                <span class="pay-value" id="pay-description"><br><? echo $how_to ?></span>

                            </div>

                        @endif

                        @if($want=="sell")

                            @foreach($deposit as $key=>$value)

                            <?php if($value->name==$data->pay_method){
                                $selected_coin_name=$value->name;
                            }?>
                            @endforeach

                            <div class="form-group">

                                <label id="data_user_adresse" data-user-adresse="{{json_encode($custom_method)}}" for="pay_address">{{ __("Send your information to receive payment (number + name + country)") }}</label>

                                <?php $ss="display:none;";$ns="display:block;";?>

                                @foreach($custom_method as $cm)
                                
                                    <?php if($cm->name==$selected_coin_name){$ss="display:block;";$ns="display:none;";}?>
                                   

                                @endforeach

                                <div class="input-group mb-3">

                                    <select style="{{$ss}} text-align:left" class=" form-control" name="wallet_address" id="buy_custom_paiemen" style="text-align:left">

                                    @foreach($custom_method as $cm)

                                        @if($cm->name==$selected_coin_name)

                                            <option value="{{$cm->number}}">{{$cm->number}}</option>

                                        @endif

                                    @endforeach

                                    </select><br>

                                    <span class="copieur input-group-text" id="add_method" data-toggle="modal" data-target="#Modal2" title="Ajouter une adresse">

                                        <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M519-405h66v-122h122v-66H585v-122h-66v122H397v66h122v122ZM333.615-250q-38.34 0-64.478-26.137Q243-302.275 243-340.615v-438.77q0-38.34 26.137-64.478Q295.275-870 333.615-870h438.77q38.34 0 64.478 26.137Q863-817.725 863-779.385v438.77q0 38.34-26.137 64.478Q810.725-250 772.385-250h-438.77Zm0-66h438.77q9.231 0 16.923-7.692Q797-331.385 797-340.615v-438.77q0-9.23-7.692-16.923Q781.616-804 772.385-804h-438.77q-9.23 0-16.923 7.692Q309-788.615 309-779.385v438.77q0 9.23 7.692 16.923Q324.385-316 333.615-316Zm-146 212q-38.34 0-64.478-26.137Q97-156.275 97-194.615v-504.77h66v504.77q0 9.231 7.692 16.923Q178.384-170 187.615-170h504.77v66h-504.77ZM309-804v488-488Z"/></svg>

                                    </span>

                                </div>

                                <p style="{{$ns}}" id="custom_wallet_adresse" data-toggle="modal" data-target="#Modal2" value="" class="form-control"  style="margin-right:7px">Ajouter une adresse de porte feuille</p>

                                <input id="buy_pay_address" type="hidden" name="wallet_address">

                                <input type="hidden" value="1" name="custom_method" id="custom_method">

                                <div class="modal custom_crypto_adresse_modal" id="Modal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

                                <div class="modal-dialog modal-dialog-centered" role="document">

                                <div class="modal-content">

                                <div class="modal-header">

                                    <h5 class="modal-title" id="exampleModalLongTitle">Ajouter une adresse de paiement</h5>

                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                                        <span aria-hidden="true">&times;</span>

                                    </button>

                                </div>

                                <div class="modal-body" style="text-align:left">

                                <div class="mb-3">

                                    <label for="type" class="form-label">Type</label>

                                    <select name="type" class="form-control" id="type">
                                        
                                        <option value="monaie">Monaie</option>

                                    </select>

                                    </div>

                                    <div class="mb-3">

                                    <label for="nom" class="form-label">Nom ou operateur de la methode</label>
                                    
                                    <select name="nom" class="form-control" id="nom">
                                    
                                        <option value="{{$selected_coin_name}}">{{$selected_coin_name}}</option>
                                        
                                    </select>

                                    </div>

                                    
                                    <div class="mb-3">

                                        <label for="adresse" class="form-label">{{__("Adresse de paiement*")}}</label>

                                        <input name="number" type="text" class="form-control required" id="adresse" placeholder="" >

                                    </div>

                                    <div class="mb-3">

                                        <label for="adresse" class="form-label">{{__("Nom ou Informations sur le compte*")}}</label>

                                        <textarea name="detail" class="form-control required" id="detail" style="border:1px solid #e4e6fc;" ></textarea>

                                    </div>

                                </div>

                                <div class="modal-footer">

                                    <button type="button" class="btn btn-secondary custom_pay_validator" style="background-color:green; color:white; font-weight:normal" data-dismiss="modal">Valider</button>
                                    
                                </div>

                                </div>

                                </div>

                                </div>
                                
                                
                            </div>

                        @endif

                        @if($want=="buy")

                            <div class="form-group" style="display:none;">

                                <label for="pay_address">{{ __("Confirm delivery address") }}</label>

                                <input type="text"  class="form-control"   id="confirm-wallet">

                                <span class="error" id="wallet-error"></span>
                                
                            </div>

                        @endif

                           

                                    {{csrf_field()}}

                                    <div class="form-group">

                                        <label for="deposit_method">{{ __("Send proof of transaction") }} *</label>

                                        <input type="file" accept=".jpg, .jpeg, .png" class="form-control" required="" name="receipt" id="receipt">

                                        <span class="error" id="receipt-error"></span>

                                    </div>

                                    <div class="row">

                                    <div class="col-sm-3">

                                        

                                    </div>

                                    </div>

                                    <div class="clearfix"></div>

                                    <br><br><div>
                                        <a href="https://wa.me/{{DB::table('phone_support')->find(1)->phone}}" class="row help " target="_blank">

                                            <div class="col img">
                                                <img src="assets/front/img/whatsapp.png" alt="">
                                            </div>

                                            <div class="col-10">
                                                <span> {{__("Need help? click here to contact us on whatsApp at")}} {{DB::table('phone_support')->find(1)->phone}}</span>
                                            </div>
                                        </a>

                                    </div>

                                    <br><br><div class="row btn-zn">

                                        <div class="col">
                                            <a href="{{route('home')}}" class="btn btn-common" style="background-color:gray">{{ __("Cancel") }}</a>
                                        </div>

                                        <div class="col">
                                            <button class="btn btn-common submit_form" id="submit" type="submit">{{ __("Confirm") }}</button>
                                        </div>

                                    </div>

                            </div>

                    </p>
                    </div>
   
                </div>
                <div class="col" id="resume" style="background: #aeaeae38; padding: 20px;">

                        

                    <div  class="services-item " >



                    <h6 style="color: #ffffff"> @if($want=="sell"){{ __("Sale transaction summary") }} @else {{ __("Purchase Transaction Summary")}} @endif</h6>

                    <p><div class="body">

                            

                                    {{csrf_field()}}

                                    

                                        
                                        </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">

                                                <label for="deposit_method">{{ __("Choose the currency to $want") }}</label>
    
                                                <select class="form-control select_coin" name="coin_id" required="">
    
                                                    
    
                                                    @foreach($coin_data as $key=>$value)
    
                                                        @if($value->id==$data->coin_id)
    
                                                         @php   $selected_coin_name=$value->coin_name; @endphp
                                                        
                                                            <option data-qr="{{$value->qr_code}}" data-wallet_address="{{$value->wallet_address}}" data-price="{{$value->price}}" data-price = "" value="{{$value->id}}">{{$value->coin_name}}</option>
    
                                                        @endif
    
                                                    @endforeach
    
                                                    @foreach($coin_data as $key=>$value)
    
                                                        <option data-qr="{{$value->qr_code}}" data-wallet_address="{{$value->wallet_address}}" data-price="{{$value->price}}" value="{{$value->id}}">{{$value->coin_name}}</option>
    
                                                    @endforeach
    
                                                </select>
    
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">

                                                <label for="deposit_method">{{ __("Exchange Rate") }}</label>
    
                                                <div class="input-group mb-3">
    
                                                    <input type="text" value="{{$data->exchange_rate}}" class="form-control exchange_rate" readonly="" required="" name="exchange_rate">
    
                                                    <span class="input-group-text" id="basic-addon1" style="margin-left: -3px;">XAF/USD</span>
    
                                                </div>
    
                                            </div>
                                        </div>
                                    </div>    
                                        

                                       

                                        

                                       

                                    </div>

                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">

                                                    <label for="deposit_method">{{ __("Amount") }} (USD))</label>
    
                                                    <input type="text" value="{{$data->amount}}" class="form-control amount" required="" name="amount">
    
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                
                                                    <label for="deposit_method">{{ __("Amount to ".str_replace(["sell","buy"],["perceive","be paid"],$want)) }}</label>
    
                                                    <input id="crypto_amount" type="text" value="{{$data->crypto_amount}}" class="form-control crypto_amount" readonly="" required="" name="crypto_amount">
    
                                                </div>
                                            </div>
                                        </div>

                                            

                                        

                                            

                                      
                                            @if($want=="sell")

                                            <div class="form-group">

                                                <label for="deposit_method"> {{ __("Send currency to this wallet") }}</label>

                                                <div class="input-group mb-3">

                                                    <input id="wallet_adress" type="text" value="{{$data->wallet_address}}" class="form-control wallet_address" required="" name="wallet_address" @if($want=="sell"){echo "readonly";} @endif>
                                                    

                                                    <span  class="copieur input-group-text" id="basic-addon2" title="copier">

                                                        <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 -960 960 960" width="48"><path d="M120-81v-663h60v603h474v60H120Zm120-120v-680h560v680H240Zm60-60h440v-560H300v560Zm0 0v-560 560Z"/></svg>
                                                    
                                                    </span>

                                                    <button type="button" data-toggle="modal" data-target="#exampleModalCenter"  class="copieur qr_btn input-group-text" id="basic-addon2" title="QR Code">

                                                        <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 -960 960 960" width="48"><path d="M520-120v-80h80v80h-80Zm-80-80v-200h80v200h-80Zm320-120v-160h80v160h-80Zm-80-160v-80h80v80h-80Zm-480 80v-80h80v80h-80Zm-80-80v-80h80v80h-80Zm360-280v-80h80v80h-80ZM170-650h140v-140H170v140Zm-50 50v-240h240v240H120Zm50 430h140v-140H170v140Zm-50 50v-240h240v240H120Zm530-530h140v-140H650v140Zm-50 50v-240h240v240H600Zm80 480v-120h-80v-80h160v120h80v80H680ZM520-400v-80h160v80H520Zm-160 0v-80h-80v-80h240v80h-80v80h-80Zm40-200v-160h80v80h80v80H400Zm-190-90v-60h60v60h-60Zm0 480v-60h60v60h-60Zm480-480v-60h60v60h-60Z"/></svg>
                                                    
                                                    </button>
                                                        
                                                    
                                                </div>

                                            </div>

                                            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">QR Code</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <?$img="";?>

                                                        @foreach($coin_data as $key=>$value)

                                                            <?php if($value->id==$data->coin_id){$img=$value->qr_code;}?>

                                                        @endforeach

                                                        <img src="assets/qr_code/{{$img}}" alt="">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                       
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>


                                            @else

                                                <div class="form-group">

                                                    
                                                    <label id="data_user_adresse" data-user-adresse="{{json_encode($custom_method)}}" for="deposit_method"> {{ __("Receiver wallet address") }}</label>
                                                    
                                                    <div class="input-group mb-3">

                                                        <select style=" text-align:left" class=" input-group-text form-control" name="wallet_address" id="buy_custom_paiemen" style="text-align:left">

                                                            @foreach($custom_method as $cm)

                                                                @if($cm->name==$selected_coin_name)

                                                                    <option value="{{$cm->number}}">{{$cm->number}}</option>

                                                                @endif

                                                            @endforeach

                                                        </select><br>

                                                        <span   class="copieur input-group-text" id="add_method" data-toggle="modal" data-target="#exampleModalCenter" title="Ajouter une adresse">

                                                            <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M519-405h66v-122h122v-66H585v-122h-66v122H397v66h122v122ZM333.615-250q-38.34 0-64.478-26.137Q243-302.275 243-340.615v-438.77q0-38.34 26.137-64.478Q295.275-870 333.615-870h438.77q38.34 0 64.478 26.137Q863-817.725 863-779.385v438.77q0 38.34-26.137 64.478Q810.725-250 772.385-250h-438.77Zm0-66h438.77q9.231 0 16.923-7.692Q797-331.385 797-340.615v-438.77q0-9.23-7.692-16.923Q781.616-804 772.385-804h-438.77q-9.23 0-16.923 7.692Q309-788.615 309-779.385v438.77q0 9.23 7.692 16.923Q324.385-316 333.615-316Zm-146 212q-38.34 0-64.478-26.137Q97-156.275 97-194.615v-504.77h66v504.77q0 9.231 7.692 16.923Q178.384-170 187.615-170h504.77v66h-504.77ZM309-804v488-488Z"/></svg>

                                                        </span>

                                                    </div>
                                                
                                                    <p style="display:none;" id="custom_wallet_adresse" data-toggle="modal" data-target="#exampleModalCenter" value="" class="form-control"  style="margin-right:7px">Ajouter une adresse de porte feuille</p>

                                                    <input id="buy_pay_address" type="hidden" name="">

                                                    <input type="hidden" value="1" name="custom_method" id="custom_method">

                                                    <div class="modal custom_crypto_adresse_modal" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

                                                    <div class="modal-dialog modal-dialog-centered" role="document">

                                                        <div class="modal-content">

                                                        <div class="modal-header">

                                                            <h5 class="modal-title" id="exampleModalLongTitle">Ajouter une adresse de porte feuille</h5>

                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                                                                <span aria-hidden="true">&times;</span>

                                                            </button>

                                                        </div>

                                                        <div class="modal-body" style="text-align:left">

                                                        <div class="mb-3">

                                                            <label for="type" class="form-label">Type</label>

                                                            <select name="type" class="form-control" id="type">
                                                                
                                                                <option value="cryptomonaie">Cryptomonaie</option>

                                                            </select>

                                                            </div>

                                                            <div class="mb-3">

                                                            <label for="nom" class="form-label">Nom ou operateur de la methode</label>
                                                            
                                                            <select name="nom" class="form-control" id="nom">
                                                            
                                                            @foreach($coin_data as $key=>$value)

                                                                @if($value->id==$data->coin_id)
                                                               
                                                                    <option  value="{{$value->coin_name}}">{{$value->coin_name}}</option>

                                                                @endif

                                                            @endforeach
                                                                
                                                            </select>

                                                            </div>

                                                            
                                                            <div class="mb-3">

                                                                <label for="adresse" class="form-label">{{__("Adresse de paiement*")}}</label>

                                                                <input name="number" type="text" class="form-control required" id="adresse"  placeholder="" >

                                                            </div>

                                                            <div class="mb-3">

                                                                <label for="adresse" class="form-label">{{__("Nom ou Informations sur le compte*")}}</label>

                                                                <textarea name="detail" class="form-control required" id="detail" style="border:1px solid #e4e6fc;" ></textarea>

                                                            </div>

                                                        </div>

                                                        <div class="modal-footer">

                                                            <button type="button" class="btn btn-secondary custom_pay_validator" style="background-color:green; color:white; font-weight:normal" data-dismiss="modal">Valider</button>
                                                            
                                                        </div>

                                                        </div>

                                                    </div>

                                                </div>

                                            @endif

                                        <div class="form-group">

                                            <label for="pay_method">{{ __("Pay method") }}</label>

                                            <select id="pay_method" class="form-control select_coin" name="pay_method" required>

                                                <option value="{{$data->pay_method}}">{{$data->pay_method}}</option>

                                                @foreach($deposit as $key=>$value)

                                                    @if($value->name!=$data->pay_method)

                                                        <option data-price = "" value="{{$value->id}}">{{$value->name}}</option>

                                                    @endif

                                                @endforeach

                                            
                                                            
                                            </select>
                                        </div>
                                        </div>

                                    </div>

                           

                            </div>

                    </p>

                    </div>
                    
                </div>
                

            </div>
        </form>

        <!--Start of Tawk.to Script-->
        <script type="text/javascript">
        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
        (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/64b96e54cc26a871b029ab1b/1h5q5e121';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
        })();
        </script>
        <!--End of Tawk.to Script-->

        <script src="/assets/front/js/bootstrap-4.5.0.min.js"></script>

        <script>

            let btn=document.querySelector("#wallet_adress");

            document.querySelector(".copieur").addEventListener('click',()=>{

                navigator.clipboard.writeText(btn.value);

                document.querySelector(".copieur svg").style.fill="orange";
            });
                
        </script>

        <script src="/assets/front/js/global.js"></script>
    </body>

</html>

