@extends('layouts.app')

@section('content')

<div class="row customer_page">

    @include('partials.sidebar')

    <div class="col-md-9 ">

      @include('flash')

      	<div class="card aff">

          <div class="header">

            <?//<h2><strong>{{__("Vos methodes de paiment enregistré")}}</strong></h2>?>

            <div class="row menu">
              <div class="col menu-form">{{__("Add")}}</div>
              <div class="col menu-method">{{__("My methods")}}</div>
            </div>

          </div>

          <div class="">

            <div class="body">

              <div class="form">

              <h2 class="title"><strong>{{__("Add a payment method")}}</strong></h2>
                <form action="" id="add-form" method="post">
                  @csrf

                  <div class="row">

                    <div class="col">

                      <div class="mb-3">
                        <label for="type" class="form-label">Type</label>
                        <select name="type" class="form-control" id="type">
                          <option value="monaie">{{__("Currency")}}</option>
                          <option value="cryptomonaie">{{__("Cryptocurrency")}}</option>
                        </select>
                      </div>

                      <div class="mb-3">
                        <label for="nom" class="form-label">{{__("Name or operator of method")}}</label>
                        
                        <select name="nom" class="form-control" id="nom">
                          
                          <optgroup id="opmonaie">
                          @if(!$deposit_method->isEmpty())
                              @foreach($deposit_method as $key=>$values)
                                <option value="{{$values->name}}">{{$values->name}}</option>
                              @endforeach
                            @endif
                          </optgroup>

                          <optgroup id="opcrypto">
                            @if(!$coins->isEmpty())
                              @foreach($coins as $key=>$value)
                                <option value="{{$value->coin_name}}">{{$value->coin_name}}</option>
                              @endforeach
                            @endif
                          </optgroup>
                        </select>
                      </div>
                    </div>

                    <div class="col">

                      <div class="mb-3">
                        <label for="adresse" class="form-label">{{__("Paiement adress")}}</label>
                        <input name="number" required type="text" class="form-control" id="adresse" placeholder="" >
                      </div>

                      <div class="mb-3">
                        <label for="confirm-adresse" class="form-label">{{__("Confirm paiement adress")}}</label>
                        <input name="" required type="text" class="form-control" id="confirm-adresse" placeholder="" >
                        <span class="err hide text-red" style="display:none">{{__("The addresses are different")}}</span>
                      </div>

                    </div>

                  </div>

                  <div class="mb-3">
                    <label for="information" class="form-label">{{__("Name or Account Information")}}</label>
                    <textarea name="detail" class="form-control" id="information" style="border:1px solid rgb(231, 231, 231)" ></textarea>
                  </div>

                  <input type="hidden" name="level" value="new">
                  <input class="btn btn-primary" type="submit" id="submit"  value="Save">

                    
                </form> 
              </div>
                  <br>

              <div class="list hide">

              <h2 class="title"><strong>{{__("Yours paiement methods")}}</strong></h2>
                

                    @if(!$method->isEmpty())

                    <table>
                      <thead>
                        <tr>
                          <td>{{__("Opérator")}}</td>
                          <td>{{__("Number")}}</td>
                          <td>{{__("Description")}}</td>
                          <td>{{__("Action")}}</td>
                        </tr>
                      </thead>

                      <tbody>

                          @foreach($method as $pay)

                            <form action="" method="post">
                              @csrf
                              <input type="hidden" name="level" value="update">
                              <input type="hidden" name="id" value="{{$pay->id}}">
                              <tr>
                                <td><input type="text" name="name" value="{{$pay->name}}"></td>
                                <td><input type="text" name="number" value="{{$pay->number}}"></td>
                                <td><input type="text" name="detail" value="{{$pay->detail}}"></td>
                                <td>
                                  <div class="row action-zonne">
                                    <input type="submit" class="btn-valid col"  value="{{__('Change')}}">
                                    <a class="btn-valid delet col" href="/customer_paiement/delet/{{$pay->id}}">{{__("Delet")}}</a>
                                  </div>
                                </td>
                                
                              </tr>
                            </form>

                          @endforeach

                          </tbody>
                      </table>

                    @else

                    <span class="emty">{{__("No payment address found")}}</span>
                    
                    @endif


                  

                <p class="title">{{__("Yours crypto wallet")}}</p>
                

                    @if(!$crypto->isEmpty())

                      <table>
                        <thead>
                          <tr>
                            <td>{{__("Opérator")}}</td>
                            <td>{{__("Adress")}}</td>
                            <td>{{__("Description")}}</td>
                            <td>{{__("Action")}}</td>
                          </tr>
                        </thead>

                        <tbody>

                          @foreach($crypto as $pay)

                            <form action="" method="post">
                              @csrf
                              <input type="hidden" name="level" value="update">
                              <input type="hidden" name="id" value="{{$pay->id}}">
                              <input type="hidden" name="type" value="{{$pay->type}}">
                              <tr>
                                <td><input type="text" name="name" value="{{$pay->name}}"></td>
                                <td><input type="text" name="number" value="{{$pay->number}}"></td>
                                <td><input type="text" name="detail" value="{{$pay->detail}}"></td>
                                <td>
                                  <div class="row action-zonne">
                                    <input type="submit" class="btn-valid col"  value="Modifier">
                                    <a class="btn-valid delet col" href="/customer_paiement/delet/{{$pay->id}}">{{__("Delet")}}</a>
                                  </div>
                                </td>
                              </tr>
                            </form>

                          @endforeach

                        </tbody>
                      </table>

                    @else

                      <span class="emty">{{__("No payment address found")}}</span>
                    
                    @endif


                  
              

              </div>
            </div>

          </div>
        </div>
    </div>
</div>

			

<script>

  document.addEventListener('DOMContentLoaded',function(){

    let type=document.querySelector('#type');
    let submit=document.querySelector('#add-form');

    let form_btn=document.querySelector('.menu-form');
    let list_btn=document.querySelector('.menu-method');

    let form=document.querySelector('.form');
    let list=document.querySelector('.list');

    let abc="#03a561",ibc="#e6e6e6"

    //modification
    submit.addEventListener("submit",(event)=>{
      
      let adresse=document.querySelector('#adresse'),confirm=document.querySelector('#confirm-adresse'),err=document.querySelector('.err');

      if(adresse.value!=confirm.value)
      {
        event.preventDefault();
        err.style.display="block";
        confirm.style.borderColor="red";
      }


    })

    //menu
    
    form_btn.addEventListener("click",(event)=>{
     
      form_btn.style.backgroundColor=abc;
      form_btn.style.color="white";
      form.style.display="block";

      
      list_btn.style.backgroundColor=ibc;
      list_btn.style.color="black";
      list.style.display="none";
    });

    list_btn.addEventListener("click",(event)=>{
     
      form_btn.style.backgroundColor=ibc;
      form_btn.style.color="black";
      form.style.display="none";

      
      list_btn.style.backgroundColor=abc;
      list_btn.style.color="white";
      list.style.display="block";
    });

    manager(type)

    type.addEventListener('change',()=>{

      
      manager(type)

    })

    function manager(type){

      let crypto=document.querySelector('#opcrypto');
      let monaie=document.querySelector('#opmonaie');

      

      let selection=type.options[type.selectedIndex].value;

      if(selection=="monaie"){
        crypto.style.display="none";
        monaie.style.display="block";

        crypto.parentNode.value=monaie.childNodes[0].value;
      }

      if(selection=="cryptomonaie"){
        crypto.style.display="block";
        monaie.style.display="none";

        crypto.parentNode.value=crypto.childNodes[0].value;
      }
    }
  
  },false);

</script>


@endsection

@section('footer')

  @include('partials.footer')

@endsection

