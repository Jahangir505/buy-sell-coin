

<?php if($transactions_to_confirm->count() > 0): ?>



<div class="panel panel-default mt-5">


     <style>
      thead th{
        background: #22be68 !important;
        color: #ffffff !important;
      }
        tr:nth-child(even){background-color: #f2f2f2}
        .panel-footer{
          margin-top: 15px !important;
        }
        tr:hover{
        background-color: #92909047;
      }
      </style> 


<div class="panel-body">

  <div class="card user-account">

    <div class="header">

        <h2><strong><?php echo e(__('Pending')); ?></strong><?php echo e(__('Transactions')); ?></h2>

        

        <ul class="header-dropdown">

            

            <li class="remove">

                <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>

            </li>

        </ul>

        

    </div>

    <div class="body">

        <div class="table-responsive">

            <table class="table m-b-0">

                <thead>

                    <tr>

                        <th>id</th>

                        <th><?php echo e(__('Date')); ?></th>
                        
                        <th><?php echo e(__('Operation')); ?></th>
                        
                        <th><?php echo e(__('Devise')); ?></th>
                        
                        <th><?php echo e(__('Amount')); ?> (USD)</th>
                        <th><?php echo e(__('Status')); ?></th>

                        <th><?php echo e(__('More')); ?></th>

                        

                    </tr>

                </thead>

                <tbody>

                  <?php $__currentLoopData = @$transactions_to_confirm; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  
                    
                    
                            <?php if(@$transaction !== null): ?>
                              
                                <tr>

                                  <td><?php echo e($transaction->id); ?></td>

                                  <td><?php echo e(explode(" ",$transaction->created_at)[0]); ?></td>
                                  


                                  <td><?php echo e($transaction->table_type); ?> <br> <a href="#"><?php echo e($transaction->deposit_method); ?></a></td>

                                  <td><?php echo e($transaction->crypto); ?></a></td>

                                  <td><?php echo e($transaction->total_amount); ?></td>
                                  <td><span class="badge badge-info"><?php echo e(__('Pending')); ?></span></td>

                                  <td class="more_btn_container"><span data-info="<?php echo e(json_encode($transaction)); ?> " data-toggle="modal" data-target="#more_detail" class="badge badge-info transaction_more_btn"><?php echo e(__('Detail')); ?></span></td>

                                  

                                </tr>

                                

                                
                                    

                                      <?php elseif(@$transaction === null): ?>
                                          
                                         
                                        <tr>

                                        <td><?php echo e($transaction->id); ?></td>

                                        <td><?php echo e(explode(" ",$transaction->created_at)[0]); ?> <br> <span class="badge badge-info"><?php echo e(__('Pending')); ?></span></td>

                                        

                                        <td><?php echo e($transaction->table_type); ?> <br> <a href="#"><?php echo e($transaction->deposit_method); ?></a></a></td>

                                        <td><?php echo e($transaction->crypto); ?></a></td>

                                        <td><?php echo e($transaction->total_amount); ?></td>

                                        <td class="more_btn_container"><span data-info="<?php echo e(json_encode($transaction)); ?> " data-toggle="modal" data-target="#more_detail" class="badge badge-info transaction_more_btn"><?php echo e(__('Detail')); ?></span></td>

                                        </tr>
                                        <?php endif; ?>
                            
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 

                </tbody>

            </table>
            <?php if(@$transactions_to_confirm): ?>

            <div class="panel-footer">
          
            <?php echo e(@$transactions_to_confirm->links()); ?>

          
            </div>
          
          <?php else: ?>
          
          <?php endif; ?>
        </div>

    </div>

  </div>

</div>



</div>

<div class="modal detail_operation" id="more_detail" tabindex="-1" role="dialog" aria-labelledby="Detail" aria-hidden="true">

<div class="modal-dialog modal-dialog-centered" role="document">

<div class="modal-content" style="min-height: 840px">

    <div class="modal-header">

    <h5 class="modal-title" id="exampleModalLongTitle"><?php echo e(__("Detail de l'opération")); ?></h5>

    <button type="button" class="close" data-dismiss="modal" aria-label="Close">

        <span aria-hidden="true">&times;</span>

    </button>

    </div>

    <div class="modal-body" style="text-align:left">

      

      <div class="menu row">
        <div class="menu_item menu_detail" id="menu_detail">
          <div class="flex justify-center text-center items-center rounded-lg active w-full" aria-current="page">
            <svg class="w-6 h-6 me-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
            </svg>
            
            Details
          </div>
        
        </div>
        <div class="menu_item menu_send" id="menu_send">
              <div class="flex justify-center text-center items-center rounded-lg active w-full" aria-current="page">
                <svg class="w-6 h-6 me-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                </svg>
                Reçu envoyé
              </div>
          </div>
        <div class="menu_item menu_get" id="menu_get">
          <div class="flex justify-center text-center items-center rounded-lg active w-full" aria-current="page">
            <svg class="w-6 h-6 me-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
            </svg>
            Reçu obtenu
          </div>
        </div>
      </div>

      <div class="detail_container">
          <div class="container">
            <div class="row item">
              <span><?php echo e(__("Id opération")); ?></span>
              <span class="val id"><?php echo e(__("0")); ?></span>
            </div>

            <div class="row item">
              <span><?php echo e(__("Date")); ?></span>
              <span class="val date"><?php echo e(__("0")); ?></span>
            </div>

            <div class="row item">
              <span><?php echo e(__("Operation")); ?></span>
              <span class="val type"><?php echo e(__("0")); ?></span>
            </div>

            <div class="row item">
              <span><?php echo e(__("Montant($)")); ?></span>
              <span class="val amount"><?php echo e(__("0")); ?></span>
              </div>

            <div class="row item">
              <span><?php echo e(__("Montant(FCFA)")); ?></span>
              <span class="val amount_cfa"><?php echo e(__("0")); ?></span>
              </div>

            <div class="row item">
              <span><?php echo e(__("Devise")); ?></span>
              <span class="val devise"><?php echo e(__("0")); ?></span>
              </div>

            <div class="row item">
              <span><?php echo e(__("Taux de change")); ?></span>
              <span class="val taux"><?php echo e(__("0")); ?></span>
              </div>

            

            <div class="row item">
              <span><?php echo e(__("Method de paiement")); ?></span>
              <span class="val method"><?php echo e(__("0")); ?></span>
              </div>

            <div class="row item sell_only">
              <span><?php echo e(__("Adresse/numero de paiement")); ?></span>
              <span class="val adress_method "><?php echo e(__("0")); ?></span>
            </div>

            <div class="row item">
              <span><?php echo e(__("Adresse porte-feuille")); ?></span>
              <span class="val adress"><?php echo e(__("0")); ?></span>
            </div>
          </div>

        
        </div>

        <div class="user_image_container">

            <div class="user_image">

              <span class="item"><?php echo e(__("Votre preuve de trasaction")); ?></span>
              <img src="" alt="">
            </div>

          </div>

          <div class="admin_image_container">

            <div class="admin_image">

              <span class="item"><?php echo e(__("Preuve de paiement envoyé par l'administrateur")); ?></span>
              <img src="" alt="">
            </div>

          </div>
      
    </div>

    <div class="modal-footer">

    <button type="button" class="text-gray-900 font-bold bg-gradient-to-r from-green-200 to-lime-200 hover:bg-gradient-to-l hover:from-green-200 hover:to-lime-200 focus:ring-4 focus:outline-none focus:ring-lime-200 dark:focus:ring-green-500 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2" data-dismiss="modal"><?php echo e(__("Retour")); ?></button>
    
    </div>

</div>

</div>

</div>



<?php endif; ?>

