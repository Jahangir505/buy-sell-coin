@if(session()->has('flash_message'))

    @if(session()->get('flash_message_level')=="info")

    <div class="card bg-info">

        <div class="header">

            <span class="fl-ico">
                <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M382-207.826 120.391-469.435l87.435-87.435L382-382.131 753.609-753.74l87.435 86.87L382-207.826Z"/></svg>
            </span>

            <ul class="header-dropdown">  

                <li class="remove">

                    <a role="button" class="boxs-close "><i class="zmdi zmdi-close text-white" ></i></a>

                </li>

            </ul>

        </div>

        <div class="body block-header">

            <div class="row">

                <div class="col">

                    <p class="message-container">
                        {!! session()->get('flash_message') !!}
                    </p>

                </div>   

            </div>

        </div>

    </div>


@else



    <div class="card bg{{session()->get('flash_message_level')}}">

        <div class="header">

            <h2><i class="zmdi zmdi-check-circle text-white"></i> <strong class="text-white">{{__('Info')}}</strong></h2>

            <ul class="header-dropdown">  

                <li class="remove">

                    <a role="button" class="boxs-close "><i class="zmdi zmdi-close text-white" ></i></a>

                </li>

            </ul>

        </div>

        <div class="body block-header">

            <div class="row">

                <div class="col">

                    <p class="text-white">{!! session()->get('flash_message') !!} </p>

                </div>   

            </div>

        </div>

    </div>

    @endif
@endif