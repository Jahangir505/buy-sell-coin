

<?php if(@$transactions_to_confirm->count() > 0): ?>



<div class="panel panel-default">

      



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

                        <th><?php echo e(__('More')); ?></th>

                        

                    </tr>

                </thead>

                <tbody>

                  <?php $__currentLoopData = @$transactions_to_confirm; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  
                    
                    
                            <?php if(@$transaction !== null): ?>
                              
                                <tr>

                                  <td><?php echo e($transaction->id); ?></td>

                                  <td><?php echo e(explode(" ",$transaction->created_at)[0]); ?> <br> <span class="badge badge-info"><?php echo e(__('Pending')); ?></span></td>


                                  <td><?php echo e($transaction->table_type); ?> <br> <a href="#"><?php echo e($transaction->deposit_method); ?></a></td>

                                  <td><?php echo e($transaction->crypto); ?></a></td>

                                  <td><?php echo e($transaction->total_amount); ?></td>

                                  <td class="more_btn_container"><span data-info="<?php echo e(json_encode($transaction)); ?> " data-toggle="modal" data-target="#more_detail" class="badge badge-info transaction_more_btn"><?php echo e(__('Detail')); ?></span></td>

                                  <td></td>

                                </tr>

                                <?/*<td>

                                  <form action="<?php echo e(url('/')); ?>/transaction/remove" method="post">

                                    <?php echo e(csrf_field()); ?>


                                    <input type="hidden" name="tid" value="<?php echo e($transaction->id); ?>">

                                    <input type="submit"  class="btn btn-link btn-xs pull-right" value="X">

                                  </form>

                                </td>*/?>

                                
                                    

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

        </div>

    </div>

  </div>

</div>

<?php if(@$transactions_to_confirm): ?>

  <div class="panel-footer">

  

  </div>

<?php else: ?>

<?php endif; ?>

</div>

<div class="modal detail_operation" id="more_detail" tabindex="-1" role="dialog" aria-labelledby="Detail" aria-hidden="true">

<div class="modal-dialog modal-dialog-centered" role="document">

<div class="modal-content">

    <div class="modal-header">

    <h5 class="modal-title" id="exampleModalLongTitle"><?php echo e(__("Detail de l'opération")); ?></h5>

    <button type="button" class="close" data-dismiss="modal" aria-label="Close">

        <span aria-hidden="true">&times;</span>

    </button>

    </div>

    <div class="modal-body" style="text-align:left">

      

      <div class="menu row">
        <div class="menu_item menu_detail" id="menu_detail">Detail</div>
        <div class="menu_item menu_send" id="menu_send">Reçu envoyé</div>
        <div class="menu_item menu_get" id="menu_get">Reçu obtenu </div>
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

    <button type="button" class="badge badge-info " data-dismiss="modal"><?php echo e(__("Retour")); ?></button>
    
    </div>

</div>

</div>

</div>



<?php endif; ?>

