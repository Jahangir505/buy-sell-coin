<?php $__env->startSection('content'); ?>

<div class="row customer_page">

    <?php echo $__env->make('partials.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <div class="col-md-9 ">

      <?php echo $__env->make('flash', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

      	<div class="card aff">

          <div class="header">

            <?//<h2><strong><?php echo e(__("Vos methodes de paiment enregistré")); ?></strong></h2>?>

            <div class="row menu">
              <div class="col menu-form"><?php echo e(__("Add")); ?></div>
              <div class="col menu-method"><?php echo e(__("My methods")); ?></div>
            </div>

          </div>

          <div class="">

            <div class="body">

              <div class="form">

              <h2 class="title"><strong><?php echo e(__("Add a payment method")); ?></strong></h2>
                <form action="" id="add-form" method="post">
                  <?php echo csrf_field(); ?>

                  <div class="row">

                    <div class="col">

                      <div class="mb-3">
                        <label for="type" class="form-label">Type</label>
                        <select name="type" class="form-control" id="type">
                          <option value="monaie"><?php echo e(__("Currency")); ?></option>
                          <option value="cryptomonaie"><?php echo e(__("Cryptocurrency")); ?></option>
                        </select>
                      </div>

                      <div class="mb-3">
                        <label for="nom" class="form-label"><?php echo e(__("Name or operator of method")); ?></label>
                        
                        <select name="nom" class="form-control" id="nom">
                          
                          <optgroup id="opmonaie">
                          <?php if(!$deposit_method->isEmpty()): ?>
                              <?php $__currentLoopData = $deposit_method; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$values): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($values->name); ?>"><?php echo e($values->name); ?></option>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                          </optgroup>

                          <optgroup id="opcrypto">
                            <?php if(!$coins->isEmpty()): ?>
                              <?php $__currentLoopData = $coins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($value->coin_name); ?>"><?php echo e($value->coin_name); ?></option>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                          </optgroup>
                        </select>
                      </div>
                    </div>

                    <div class="col">

                      <div class="mb-3">
                        <label for="adresse" class="form-label"><?php echo e(__("Paiement adress")); ?></label>
                        <input name="number" required type="text" class="form-control" id="adresse" placeholder="" >
                      </div>

                      <div class="mb-3">
                        <label for="confirm-adresse" class="form-label"><?php echo e(__("Confirm paiement adress")); ?></label>
                        <input name="" required type="text" class="form-control" id="confirm-adresse" placeholder="" >
                        <span class="err hide text-red" style="display:none"><?php echo e(__("The addresses are different")); ?></span>
                      </div>

                    </div>

                  </div>

                  <div class="mb-3">
                    <label for="information" class="form-label"><?php echo e(__("Name or Account Information")); ?></label>
                    <textarea name="detail" class="form-control" id="information" style="border:1px solid rgb(231, 231, 231)" ></textarea>
                  </div>

                  <input type="hidden" name="level" value="new">
                  <input class="btn btn-primary" type="submit" id="submit"  value="Save">

                    
                </form> 
              </div>
                  <br>

              <div class="list hide">

              <h2 class="title"><strong><?php echo e(__("Yours paiement methods")); ?></strong></h2>
                

                    <?php if(!$method->isEmpty()): ?>

                    <table>
                      <thead>
                        <tr>
                          <td><?php echo e(__("Opérator")); ?></td>
                          <td><?php echo e(__("Number")); ?></td>
                          <td><?php echo e(__("Description")); ?></td>
                          <td><?php echo e(__("Action")); ?></td>
                        </tr>
                      </thead>

                      <tbody>

                          <?php $__currentLoopData = $method; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pay): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <form action="" method="post">
                              <?php echo csrf_field(); ?>
                              <input type="hidden" name="level" value="update">
                              <input type="hidden" name="id" value="<?php echo e($pay->id); ?>">
                              <tr>
                                <td><input type="text" name="name" value="<?php echo e($pay->name); ?>"></td>
                                <td><input type="text" name="number" value="<?php echo e($pay->number); ?>"></td>
                                <td><input type="text" name="detail" value="<?php echo e($pay->detail); ?>"></td>
                                <td>
                                  <div class="row action-zonne">
                                    <input type="submit" class="btn-valid col"  value="<?php echo e(__('Change')); ?>">
                                    <a class="btn-valid delet col" href="/customer_paiement/delet/<?php echo e($pay->id); ?>"><?php echo e(__("Delet")); ?></a>
                                  </div>
                                </td>
                                
                              </tr>
                            </form>

                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                          </tbody>
                      </table>

                    <?php else: ?>

                    <span class="emty"><?php echo e(__("No payment address found")); ?></span>
                    
                    <?php endif; ?>


                  

                <p class="title"><?php echo e(__("Yours crypto wallet")); ?></p>
                

                    <?php if(!$crypto->isEmpty()): ?>

                      <table>
                        <thead>
                          <tr>
                            <td><?php echo e(__("Opérator")); ?></td>
                            <td><?php echo e(__("Adress")); ?></td>
                            <td><?php echo e(__("Description")); ?></td>
                            <td><?php echo e(__("Action")); ?></td>
                          </tr>
                        </thead>

                        <tbody>

                          <?php $__currentLoopData = $crypto; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pay): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <form action="" method="post">
                              <?php echo csrf_field(); ?>
                              <input type="hidden" name="level" value="update">
                              <input type="hidden" name="id" value="<?php echo e($pay->id); ?>">
                              <input type="hidden" name="type" value="<?php echo e($pay->type); ?>">
                              <tr>
                                <td><input type="text" name="name" value="<?php echo e($pay->name); ?>"></td>
                                <td><input type="text" name="number" value="<?php echo e($pay->number); ?>"></td>
                                <td><input type="text" name="detail" value="<?php echo e($pay->detail); ?>"></td>
                                <td>
                                  <div class="row action-zonne">
                                    <input type="submit" class="btn-valid col"  value="Modifier">
                                    <a class="btn-valid delet col" href="/customer_paiement/delet/<?php echo e($pay->id); ?>"><?php echo e(__("Delet")); ?></a>
                                  </div>
                                </td>
                              </tr>
                            </form>

                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </tbody>
                      </table>

                    <?php else: ?>

                      <span class="emty"><?php echo e(__("No payment address found")); ?></span>
                    
                    <?php endif; ?>


                  
              

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


<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>

  <?php echo $__env->make('partials.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>