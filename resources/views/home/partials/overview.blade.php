  
  
  <div class="panel-heading" style="border-bottom: 0; ">

<div class="container">

  <div class="card bg-info" style="max-height:60px">

    <div class="header" >

      <h2><i class="zmdi zmdi-alert-circle-o text-white"></i> <strong class="text-white">{{__('Welcome')}} @php echo ucfirst(auth::user()->name) @endphp</strong></h2>

        <ul class="header-dropdown">  

            <li class="remove">

                <a role="button" class="boxs-close "><i class="zmdi zmdi-close text-white" ></i></a>

            </li>

        </ul>

    </div>

    <div class="body block-header">

        <div class="row">

            <div class="col">

                <p class="text-white">  {{__(session()->get("message"))}} </p>

            </div>   

        </div>

    </div>

  </div>

</div>

</div>
  
  
  <div class=" user-account">

      <div class="body body-overview">
      
        


        <div class="overview o_affiliation">
          <p class="o_title">{{__("Affiliation")}}</p>
          
          
          {{-- Tailwind CSS --}}
          <section class="grid md:grid-cols-2 xl:grid-cols-4 gap-6">
            <div class="flex items-center p-4 bg-white  rounded-lg">
              <div class="inline-flex flex-shrink-0 items-center justify-center h-16 w-16 text-purple-600 bg-purple-100 rounded-full mr-6">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M7.217 10.907a2.25 2.25 0 100 2.186m0-2.186c.18.324.283.696.283 1.093s-.103.77-.283 1.093m0-2.186l9.566-5.314m-9.566 7.5l9.566 5.314m0 0a2.25 2.25 0 103.935 2.186 2.25 2.25 0 00-3.935-2.186zm0-12.814a2.25 2.25 0 103.933-2.185 2.25 2.25 0 00-3.933 2.185z" />
                </svg>
                
              </div>
              <div>
                <span class="block text-2xl font-bold text-black">{{$affiliated}}</span>
                <span class="block text-gray-500">{{__("Number of affiliates")}}</span>
              </div>
            </div>
            <div class="flex items-center p-4 bg-white  rounded-lg">
              <div class="inline-flex flex-shrink-0 items-center justify-center h-16 w-16 text-green-600 bg-green-100 rounded-full mr-6">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                
              </div>
              <div>
                <span class="block text-2xl font-bold text-dark">{{$balance->amount}}</span>
                <span class="block text-gray-500">{{__("Account balance ($)")}}</span>
              </div>
            </div>
            <div class="flex items-center p-4 bg-white  rounded-lg">
              <div class="inline-flex flex-shrink-0 items-center justify-center h-16 w-16 text-red-600 bg-red-100 rounded-full mr-6">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M21 7.5l-9-5.25L3 7.5m18 0l-9 5.25m9-5.25v9l-9 5.25M3 7.5l9 5.25M3 7.5v9l9 5.25m0-9v9" />
                </svg>
                
              </div>
              <div>
                <span class="inline-block text-2xl font-bold text-black">{{$earning}}</span>
                {{-- <span class="inline-block text-xl text-gray-500 font-semibold">(14%)</span> --}}
                <span class="block text-gray-500">{{__("Total Generated ($)")}}</span>
              </div>
            </div>
            <div class="flex items-center p-4 bg-white  rounded-lg">
              <div class="inline-flex flex-shrink-0 items-center justify-center h-16 w-16 text-blue-600 bg-blue-100 rounded-full mr-6">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M9 8.25H7.5a2.25 2.25 0 00-2.25 2.25v9a2.25 2.25 0 002.25 2.25h9a2.25 2.25 0 002.25-2.25v-9a2.25 2.25 0 00-2.25-2.25H15m0-3l-3-3m0 0l-3 3m3-3V15" />
                </svg>
                
              </div>
              <div>
                <span class="block text-2xl font-bold text-black">{{$earning-$balance->amount}}</span>
                <span class="block text-gray-500">{{__("Total winnings withdrawn ($)")}}</span>
              </div>
            </div>
          </section>

          {{-- Tailwind CSS --}}


          {{-- <div class="item">
            <div class="o_header"><span class="ico"><i data-feather="share-2"></i></span><span class="O_description">{{__("Number of affiliates")}}</span></div>
            <div class="o_counter">{{$affiliated}}</div>
          </div>

          <div class="item">
            <div class="o_header"><span class="ico"><i data-feather="dollar-sign"></i></span><span class="O_description">{{__("Account balance ($)")}}</span></div>
            <div class="o_counter">{{$balance->amount}}</div>
          </div>

          <div class="item">
            <div class="o_header"><span class="ico"><i data-feather="package"></i></span><span class="O_description">{{__("Total Generated ($)")}}</span></div>
            <div class="o_counter">{{$earning}}</div>
          </div>

          <div class="item">
            <div class="o_header"><span class="ico"><i data-feather="share"></i></span><span class="O_description">{{__("Total winnings withdrawn ($)")}}</span></div>
            <div class="o_counter">{{$earning-$balance->amount}}</div>
          </div> --}}

          <div class="clear"></div>
        </div>

      

      <div class="overview o_transaction">

          <p class="o_title">{{__("Transaction")}}</p>

          <section class="grid md:grid-cols-2 xl:grid-cols-4 gap-6">
            <div class="flex items-center p-4 bg-white  rounded-lg">
              <div class="inline-flex flex-shrink-0 items-center justify-center h-16 w-16 text-purple-600 bg-purple-100 rounded-full mr-6">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                </svg>                
                
              </div>
              <div>
                <span class="block text-2xl font-bold text-black">{{$total_buy}}</span>
                <span class="block text-gray-500">{{__("Purchases made")}}</span>
              </div>
            </div>
            <div class="flex items-center p-4 bg-white  rounded-lg">
              <div class="inline-flex flex-shrink-0 items-center justify-center h-16 w-16 text-green-600 bg-green-100 rounded-full mr-6">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 003 8.25v10.5A2.25 2.25 0 005.25 21h10.5A2.25 2.25 0 0018 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
                </svg>
                
                
              </div>
              <div>
                <span class="block text-2xl font-bold text-dark">{{$total_sell}}</span>
                <span class="block text-gray-500">{{__("Sales made")}}</span>
              </div>
            </div>
            <div class="flex items-center p-4 bg-white  rounded-lg">
              <div class="inline-flex flex-shrink-0 items-center justify-center h-16 w-16 text-red-600 bg-red-100 rounded-full mr-6">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                
                
              </div>
              <div>
                <span class="inline-block text-2xl font-bold text-black">{{$rejected}}</span>
                {{-- <span class="inline-block text-xl text-gray-500 font-semibold">(14%)</span> --}}
                <span class="block text-gray-500">{{__("Operations canceled")}}</span>
              </div>
            </div>
            <div class="flex items-center p-4 bg-white  rounded-lg">
              <div class="inline-flex flex-shrink-0 items-center justify-center h-16 w-16 text-blue-600 bg-blue-100 rounded-full mr-6">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M21 7.5l-9-5.25L3 7.5m18 0l-9 5.25m9-5.25v9l-9 5.25M3 7.5l9 5.25M3 7.5v9l9 5.25m0-9v9" />
                </svg>
                
              </div>
              <div>
                <span class="block text-2xl font-bold text-black">{{$total_buy_sell}}</span>
                <span class="block text-gray-500">{{__("Transaction volume")}}</span>
              </div>
            </div>
          </section>


          {{-- <div class="item">
            <div class="o_header"><span class="ico"><i data-feather="shopping-cart"></i></span><span class="O_description">{{__("Purchases made")}}</span></div>
            <div class="o_counter">{{$total_buy}}</div>
          </div>

          <div class="item">
            <div class="o_header"><span class="ico"><i data-feather="external-link"></i></span><span class="O_description">{{__("Sales made")}}</span></div>
            <div class="o_counter">{{$total_sell}}</div>
          </div>

          <div class="item">
            <div class="o_header"><span class="ico"><i data-feather="x-circle"></i></span><span class="O_description">{{__("Operations canceled")}}</span></div>
            <div class="o_counter">{{$rejected}}</div>
          </div>

          <div class="item">
            <div class="o_header"><span class="ico"><i data-feather="package"></i></span><span class="O_description">{{__("Transaction volume")}}</span></div>
            <div class="o_counter">{{$total_buy_sell}}</div>
          </div> --}}

          <div class="clear"></div>

        </div>

      </div>

  </div>
