@extends('layouts.app')



@section('content')

{{-- @include('partials.nav') --}}

  



   <div class="row">
    <div class="col-md-3"></div>
        
    <div class="col-lg-9 ">

      @include('profile.partials.sidenav')
      
      <div class="card">

          <div class="header">

              <h2 style="color:red;"><strong>
                
                    @if($stat->isEmpty())
                        {{__('Delete account')}}
                    @else
                        {{__('Undelete account')}}
                    @endif
            </strong></h2>

          </div>

          <div class="body">

             <form class="needs-validation" enctype="multipart/form-data" method="POST" action="{{route('profile.deleteVerif')}}">

            {{csrf_field()}}

            

            <div class="row">

              <div class="col-md-6 mb-3">

                <label for="newpassword">
                    @if($stat->isEmpty())
                        {{__('Inter your password for delete your account')}}
                    @else
                        {{__('Inter your password for undelete your account')}}
                    @endif
                </label>

                <input type="password" class="form-control" id="newpassword" name="password" placeholder="" value="" required="">


                @if(isset($_SESSION["errpass"]))

                    <?php unset($_SESSION["errpass"]);?>

                    <span style="color:red; display:block;">le mot de passe est incorrect</span>

                    
                @endif
                


              </div>

            </div>


            <hr class="mb-4">

            <button class="btn btn-primary btn-lg btn-block" type="submit">{{__('Save')}}</button>

          </form>                         

              

          </div>

      </div>

          <h4 class="mb-3"></h4>



          

        </div>



    </div>



   

@endsection



@section('footer')

	@include('partials.footer')

@endsection

