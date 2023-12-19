<?php $__env->startSection('content'); ?>

<div class="row customer_page">

    <?php echo $__env->make('partials.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <div class="col-md-9 padding-right">

      <?php echo $__env->make('flash', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

      	<div class="card aff">

          <div class="header">

            

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
                        <div class="input-group">
                          <select name="type" class="form-control" id="type" style="z-index: 1; position: relative; background: transparent; margin-right: 15px; border: 2px solid #E9F6EC;">
                            <option value="monaie"><?php echo e(__("Currency")); ?></option>
                            <option value="cryptomonaie"><?php echo e(__("Cryptocurrency")); ?></option>
                          </select>
                          <span class="input-group-text" id="basic-addon1" style="margin-left: -3px; background: #E9F6EC; padding: 0 25px; position: absolute; right:0;"></span>
                        </div>

                      </div>

                      <div class="mb-3">
                        <label for="nom" class="form-label"><?php echo e(__("Name or operator of method")); ?></label>
                        
                        <div class="input-group">
                          <select name="nom" class="form-control" id="nom" style="z-index: 1; position: relative; background: transparent; margin-right: 15px; border: 2px solid #E9F6EC;">
                          
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
                          <span class="input-group-text" id="basic-addon1" style="margin-left: -3px; background: #E9F6EC; padding: 0 25px; position: absolute; right:0;"></span>
                        </div>
                      </div>
                    </div>

                    <div class="col">

                      <div class="mb-3">
                        <label for="adresse" class="form-label"><?php echo e(__("Paiement adress")); ?></label>
                        <div class="input-group">
                          <input name="number" required type="text" class="form-control" id="adresse" placeholder="" >
                          <span class="input-group-text" id="basic-addon1" style="margin-left: -3px; background: #E9F6EC;">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                              <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                            </svg>
                            
                          </span>
                        </div>
                      </div>

                      <div class="mb-3">
                        <label for="confirm-adresse" class="form-label"><?php echo e(__("Confirm paiement adress")); ?></label>
                        <div class="input-group">
                          <input name="" required type="text" class="form-control" id="confirm-adresse" placeholder="" >
                        <span class="input-group-text" id="basic-addon1" style="margin-left: -3px; background: #E9F6EC;">
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                          </svg>
                          
                        </span>
                        </div>
                        <span class="err hide text-red" style="display:none"><?php echo e(__("The addresses are different")); ?></span>
                      </div>

                    </div>

                  </div>

                  <div class="mb-3">
                    <label for="information" class="form-label"><?php echo e(__("Name or Account Information")); ?></label>
                    <textarea name="detail" class="form-control" id="information" style="border:1px solid rgb(231, 231, 231)" ></textarea>
                  </div>

                  <input type="hidden" name="level" value="new">
                  
                  <button type="submit" class="text-gray-900 font-bold bg-gradient-to-r from-green-200 to-lime-200 hover:bg-gradient-to-l hover:from-green-200 hover:to-lime-200 focus:ring-4 focus:outline-none focus:ring-lime-200 dark:focus:ring-green-500 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2"><?php echo e(__('Save')); ?></button>

                    
                </form> 
              </div>
                  <br>

              <div class="list hide">

              <h2 class="text-gray text-xl font-bold"><strong><?php echo e(__("Yours paiement methods")); ?></strong></h2>
                

                    <?php if(!$method->isEmpty()): ?>

                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                      <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-white uppercase bg-green-50 dark:bg-green-700 dark:text-white-400">
                          <tr>
                            <th scope="col" class="px-6 py-3"><?php echo e(__("Opérator")); ?></td>
                            <th scope="col" class="px-6 py-3"><?php echo e(__("Number")); ?></td>
                            <th scope="col" class="px-6 py-3"><?php echo e(__("Description")); ?></td>
                            <th scope="col" class="px-6 py-3"><?php echo e(__("Action")); ?></td>
                          </tr>
                        </thead>
  
                        <tbody>
  
                            <?php $__currentLoopData = $method; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pay): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  
                              <form action="" method="post">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="level" value="update">
                                <input type="hidden" name="id" value="<?php echo e($pay->id); ?>">
                                <tr>
                                  <td class="px-6 py-2"><input type="text" name="name" value="<?php echo e($pay->name); ?>"></td>
                                  <td class="px-6 py-2"><input type="text" name="number" value="<?php echo e($pay->number); ?>"></td>
                                  <td class="px-6 py-2"><input type="text" name="detail" value="<?php echo e($pay->detail); ?>"></td>
                                  <td class="px-6 py-2">
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
                    </div>

                    <?php else: ?>

                    <span class="emty"><?php echo e(__("No payment address found")); ?></span>
                    
                    <?php endif; ?>


                  
                    <br/>
                <h2 class="text-gray text-xl font-bold"><?php echo e(__("Yours crypto wallet")); ?></h2>

                    <?php if(!$crypto->isEmpty()): ?>

                      <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left rtl:text-right text-black-500 dark:text-black-400">
                          <thead class="text-xs text-white uppercase bg-green-50 dark:bg-green-700 dark:text-white-400">
                            <tr>
                              <th scope="col" class="px-6 py-3"><?php echo e(__("Opérator")); ?></td>
                              <th scope="col" class="px-6 py-3"><?php echo e(__("Adress")); ?></td>
                              <th scope="col" class="px-6 py-3"><?php echo e(__("Description")); ?></td>
                              <th scope="col" class="px-6 py-3"><?php echo e(__("Action")); ?></td>
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
                                  <td class="px-6 py-2"><input type="text" name="name" value="<?php echo e($pay->name); ?>"></td>
                                  <td class="px-6 py-2"><input type="text" name="number" value="<?php echo e($pay->number); ?>"></td>
                                  <td class="px-6 py-2"><input type="text" name="detail" value="<?php echo e($pay->detail); ?>"></td>
                                  <td class="px-6 py-2">
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
                      </div>

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