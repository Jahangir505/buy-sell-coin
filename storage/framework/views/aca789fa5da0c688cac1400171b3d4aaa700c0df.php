  
  
  <div class="panel-heading" style="border-bottom: 0; ">

<div class="container">

  <div class="card bg-info" style="max-height:60px">

    <div class="header" >

      <h2><i class="zmdi zmdi-alert-circle-o text-white"></i> <strong class="text-white"><?php echo e(__('Welcome')); ?> <?php echo ucfirst(auth::user()->name) ?></strong></h2>

        <ul class="header-dropdown">  

            <li class="remove">

                <a role="button" class="boxs-close "><i class="zmdi zmdi-close text-white" ></i></a>

            </li>

        </ul>

    </div>

    <div class="body block-header">

        <div class="row">

            <div class="col">

                <p class="text-white">  <?php echo e(__(session()->get("message"))); ?> </p>

            </div>   

        </div>

    </div>

  </div>

</div>

</div>
  
  
  <div class="card user-account">

      <div class="body body-overview">
      
        


        <div class="overview o_affiliation">
          <p class="o_title"><?php echo e(__("Affiliation")); ?></p>
          
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-globe text-warning"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Capacity</p>
                      <p class="card-title">150GB<p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <i class="fa fa-refresh"></i>
                  Update Now
                </div>
              </div>
            </div>
          </div>

          <div class="item">
            <div class="o_header"><span class="ico"><i data-feather="share-2"></i></span><span class="O_description"><?php echo e(__("Number of affiliates")); ?></span></div>
            <div class="o_counter"><?php echo e($affiliated); ?></div>
          </div>

          <div class="item">
            <div class="o_header"><span class="ico"><i data-feather="dollar-sign"></i></span><span class="O_description"><?php echo e(__("Account balance ($)")); ?></span></div>
            <div class="o_counter"><?php echo e($balance->amount); ?></div>
          </div>

          <div class="item">
            <div class="o_header"><span class="ico"><i data-feather="package"></i></span><span class="O_description"><?php echo e(__("Total Generated ($)")); ?></span></div>
            <div class="o_counter"><?php echo e($earning); ?></div>
          </div>

          <div class="item">
            <div class="o_header"><span class="ico"><i data-feather="share"></i></span><span class="O_description"><?php echo e(__("Total winnings withdrawn ($)")); ?></span></div>
            <div class="o_counter"><?php echo e($earning-$balance->amount); ?></div>
          </div>

          <div class="clear"></div>
        </div>

      

      <div class="overview o_transaction">

          <p class="o_title"><?php echo e(__("Transaction")); ?></p>

          <div class="item">
            <div class="o_header"><span class="ico"><i data-feather="shopping-cart"></i></span><span class="O_description"><?php echo e(__("Purchases made")); ?></span></div>
            <div class="o_counter"><?php echo e($total_buy); ?></div>
          </div>

          <div class="item">
            <div class="o_header"><span class="ico"><i data-feather="external-link"></i></span><span class="O_description"><?php echo e(__("Sales made")); ?></span></div>
            <div class="o_counter"><?php echo e($total_sell); ?></div>
          </div>

          <div class="item">
            <div class="o_header"><span class="ico"><i data-feather="x-circle"></i></span><span class="O_description"><?php echo e(__("Operations canceled")); ?></span></div>
            <div class="o_counter"><?php echo e($rejected); ?></div>
          </div>

          <div class="item">
            <div class="o_header"><span class="ico"><i data-feather="package"></i></span><span class="O_description"><?php echo e(__("Transaction volume")); ?></span></div>
            <div class="o_counter"><?php echo e($total_buy_sell); ?></div>
          </div>

          <div class="clear"></div>

        </div>

      </div>

  </div>
