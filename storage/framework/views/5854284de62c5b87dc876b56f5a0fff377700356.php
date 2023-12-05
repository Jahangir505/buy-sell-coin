 <div class="col-md-3">
    <?php 
        $online=DB::table('admin_online')->find(1);
        $delete=DB::table('users_deleted')->where("id_user",Auth::user()->id)->get()->isEmpty();

        $bg=(!$delete)? "0":$online->status;

    ?>

    <?php

        
    ?>

 <div class="card bg-<?php echo $bg?> " id="online">

        <!-- overflowhidden -->

       

        <div class="header">

        <?php 

                if($delete){
                    
                    if($online->status==1){
                    
                        ?>

                            <div class="onlineIco isOnline row">

                                <p class="col ico">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 -960 960 960" width="48"><path d="M243.044-351.956 173.5-419.935q62.5-62.5 140.5-100.782Q392-559 480-559q87.5 0 165.75 38T786.5-421l-69.044 69.044q-48.804-47.174-109.293-77.609Q547.674-459.999 480-459.999t-128.163 30.434q-60.489 30.435-108.793 77.609Zm-163.5-163.5L10-584.5q94-96 214.75-151.5T480-791.5q134.5 0 255.25 55.5T950-584.5l-69.044 69.044q-83.869-78.239-185.826-127.641Q593.174-692.499 480-692.499q-113.174 0-215.13 49.402-101.957 49.402-185.326 127.641ZM480-114.5 331.5-264q29.5-29.5 67.75-46T480-326.5q42.5 0 80.75 16.5T629-264L480-114.5Z"/></svg>
                                </p>
                                    
                                <div class="col description">

                                    <p class="title">
                                        <?php echo e(__("Administrators are online")); ?>

                                    </p>

                                    <span class="detail"><?php echo e(__("Processing times for your requests:")); ?> <span class="underline">30 minutes maximun</span></span>
                                
                                </div>
                            </div>

                        <?php

                    }

                    else{
                    
                        ?>

                            <div class="onlineIco isOffline row">
                                <p class="col ico">
                                <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 -960 960 960" width="48"><path d="M799.543-69.478 414.891-453.065q-54.5 13.066-96.423 40.935-41.924 27.87-74.859 60.174L173.5-420.5q35.87-35.87 72.641-63.054 36.772-27.185 91.141-49.185l-98.391-97.826q-46.434 23.566-85.673 52.87-39.239 29.304-73.674 62.239L10-584q34.304-35.304 74.239-66.772 39.935-31.467 80.109-53.337l-92.87-93.369L117-843l727.5 727.5-44.957 46.022Zm-69.521-294.544q-31.935-30.935-58.652-50.435-26.718-19.5-67.652-36.869L498.805-556.239q90.739 3.696 158.88 39.88Q725.826-480.174 786.5-420.5l-56.478 56.478Zm150.934-151.434q-87.5-81.304-186.576-129.174-99.076-47.869-214.38-47.869-31.348 0-58.76 4.217-27.413 4.217-44.391 10.022l-83.001-83.001q42.5-15 88.076-22.619Q427.5-791.5 480-791.5q137 0 256.935 56.75T950-583.435l-69.044 67.979ZM480-114.5 331.5-264q29.5-29.5 67.75-46T480-326.5q42.5 0 80.75 16.5T629-264L480-114.5Z"/></svg>
                                </p>
                                
                                <div class="col description">

                                    <p class="title">
                                        <?php echo e(__("Administrators are offline")); ?> 
                                    </p>

                                    <span class="detail"><?php echo e(__("Below are our service times")); ?> <span ><br><?php echo e(__("Monday - Saturday: 8a.m - 10p.m")); ?> <br> <?php echo e(__("Sunday: 12p.m - 8p.m")); ?> </span> <br>
                                        <br><span style="font-weight:bold;"><?php echo e(__("For any emergency, please contact us by WhatsApp at this number")); ?> <a style="color:white;" class="underline" href="https://wa.me/<?php echo e(DB::table('phone_support')->find(1)->phone); ?>" target="_blank"><?php echo e(DB::table('phone_support')->find(1)->phone); ?></a></span>
                                    </span>
                                
                                </div>
                                
                            </div>

                        <?php
                    }
                }

                else{
                            
                    ?>
                    
                        <div class="onlineIco isOffline row">
                            <p class="col ico">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="m40-120 440-760 440 760H40Zm138-80h604L480-720 178-200Zm302-40q17 0 28.5-11.5T520-280q0-17-11.5-28.5T480-320q-17 0-28.5 11.5T440-280q0 17 11.5 28.5T480-240Zm-40-120h80v-200h-80v200Zm40-100Z"/></svg>
                            </p>
                            
                            <div class="col description">

                                <p class="title">
                                    <?php echo e(__("You have initiated the process of deleting your account")); ?>

                                </p>

                                <div class="detail row"><span class="col"><?php echo e(__("Time before complete deletion of your account:")); ?> <span class="underline">30 jours</span></span>  <span class="col cancel-deleted"><a style="text-decoration:none;" href="/profile/delete"><?php echo e(__("Cancel")); ?></a></span></div>
                            
                            </div>
                            
                        </div>
                        
                    <?php
                }

            
            ?>
            

            

        </div>


    </div>

    <div class="card " id="solde">

        <!-- overflowhidden -->

        <div class="header">
            <? $w=DB::table('wallets')->where("user_id",Auth::user()->id)->first();?>
            <h2><strong><?php echo e(__('Affiliation balance')); ?></strong> <?php echo e(@$w->amount); ?> $</h2>

            <ul class="header-dropdown">

                <?php if(count(\App\Models\Currency::where('id', '!=', Auth::user()->currentCurrency()->id)->get())): ?>

                    <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-refresh"></i> </a>

                        <ul class="dropdown-menu dropdown-menu-right slideUp float-right">

                            <?php $__currentLoopData = \App\Models\Currency::where('id', '!=', Auth::user()->currentCurrency()->id)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $currency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                               <li>

                                <a href="<?php echo e(url('/')); ?>/wallet/<?php echo e($currency->id); ?>"><span> <?php echo e($currency->name); ?></span></a>

                                </li> 

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </ul>

                    </li>

                <?php endif; ?>

               

            </ul>

        </div>

        

        

    </div>

    <?php if(Route::is('home')): ?>



    <?php if(!empty($myEscrows)): ?>

    <?php $__currentLoopData = $myEscrows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $escrow): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>



        <div class="card">

            <div class="header">

                <h2><strong>On Hold</strong> #<?php echo e($escrow->id); ?></h2>

                <ul class="header-dropdown">

                    <li class="remove">

                        <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>

                    </li>

                </ul>

            </div>

            <div class="body">

                <h3 class="mb-0 pb-0">

               -  <?php echo e(\App\Helpers\Money::instance()->value( $escrow->gross, $escrow->currency_symbol )); ?>       

                </h3>

                Escrow money to  <a href="<?php echo e(url('/')); ?>/escrow/<?php echo e($escrow->id); ?>"><span class="text-primary"><?php echo e($escrow->toUser->name); ?></span></a> <br> 

                <form action="<?php echo e(url('/')); ?>/escrow/release" method="post">

                    <?php echo e(csrf_field()); ?>


                    <input type="hidden" name="eid" value="<?php echo e($escrow->id); ?>">

                    <input type="submit" class="btn btn-sm btn-round btn-primary btn-simple" value="<?php echo e(_('Release')); ?>">

                    

                </form>

            </div>

        </div>



    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    

    <?php endif; ?> 

    

    <?php if(!empty($toEscrows)): ?>

    

    <?php $__currentLoopData = $toEscrows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $escrow): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>



        <div class="card">

            <div class="header">

                <h2><strong>On Hold</strong> #<?php echo e($escrow->id); ?></h2>

                <ul class="header-dropdown">

                    <li class="remove">

                        <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>

                    </li>

                </ul>

            </div>

            <div class="body">

                <h3 class="mb-0 pb-0">

                +  <?php echo e(\App\Helpers\Money::instance()->value( $escrow->gross, $escrow->currency_symbol )); ?>       

                </h3>

                Escrow money from <a href="<?php echo e(url('/')); ?>/escrow/<?php echo e($escrow->id); ?>"><span class="text-primary"><?php echo e($escrow->User->name); ?></span></a> 

                <form action="<?php echo e(url('/')); ?>/escrow/refund" method="post">

                    <?php echo e(csrf_field()); ?>


                    <input type="hidden" name="eid" value="<?php echo e($escrow->id); ?>">

                    <input type="submit" class="btn btn-sm btn-round btn-danger btn-simple" value="<?php echo e(_('refund')); ?>">

                </form>

            </div>

        </div>



    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    

    <?php endif; ?> 



    <?php endif; ?>

 

   

    <?php if(!Route::is('exchange.form')): ?>

     

    <div class="list-group">

        

    </div>

    <?php endif; ?>

</div>