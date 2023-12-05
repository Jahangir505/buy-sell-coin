<?php if($transactions->count() > 0): ?>

<div class="card user-account">

          <div class="header">

              <h2><strong><?php echo e(__('Complete')); ?></strong><?php echo e(__('Transactions')); ?></h2>

              

          </div>

          <div class="body">

              <div class="table-responsive">

                  <table class="table m-b-0">

                      <thead>

                          <tr>

                              

                              <th><?php echo e(__('Id')); ?></th>

                              <th ><?php echo e(__('Date')); ?></th>

                              <th><?php echo e(__('Operation')); ?></th>

                              <th><?php echo e(__('Devise')); ?></th>

                              <th><?php echo e(__('Amount')); ?> (USD)</th>

                              <th><?php echo e(__('More')); ?></th>

                              

                          </tr>

                      </thead>

                      <?php $__empty_1 = true; $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                        <tr>

                         

                          

                        <td><?php echo e($transaction->id); ?></td>

                        <td><?php echo e(explode(" ",$transaction->created_at)[0]); ?> <br> 
                        

                            <?php if($transaction->status=="1"): ?>
                                
                                <span class="badge badge-success"><?php echo e(__('complete')); ?></span>
                            <?php else: ?>
                            

                            <span class="badge badge-danger"><?php echo e(__('rejected')); ?></span>
                            <?php endif; ?>

                        </td>


                        <td><?php echo e($transaction->table_type); ?> <br> <a href="#"><?php echo e($transaction->deposit_method); ?></a></td>

                        <td><?php echo e($transaction->crypto); ?></a></td>

                        <td><?php echo e($transaction->total_amount); ?></td>

                        <td class="more_btn_container">

                            <?php if($transaction->status=="1"): ?>
                                
                            <span data-info="<?php echo e(json_encode($transaction)); ?> " data-toggle="modal" data-target="#more_detail" class="badge badge-success transaction_more_btn"><?php echo e(__('Detail')); ?></span></td>
                            <?php else: ?>
                        
                            <span data-info="<?php echo e(json_encode($transaction)); ?> " data-toggle="modal" data-target="#more_detail" class="badge badge-danger transaction_more_btn"><?php echo e(__('Detail')); ?></span></td>
                            <?php endif; ?>
                        
                        </tr>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                    

                    <?php endif; ?>

                  </table>

              </div>

          </div>

          

        <div class="footer">

            

        </div>

      <?php else: ?>

    

</div>



<?php endif; ?>