<?php $__env->startSection('content'); ?>
<form method="POST" action="<?php echo e(route('login')); ?>" class=" col-md-12 m-auto pl-0 pr-0 bg-white">
    <?php echo csrf_field(); ?>
    <div class="col-12 col-lg-10 m-auto">
        <div class="w-100 d-inline-block">
            <?php if(session()->has('msg1')): ?>
                <h4 class="text-danger text-center font-weight-bold"><?php echo e(session('msg1')); ?></h4>
            <?php endif; ?>
            <?php if(session()->has('msg2')): ?>
                <h4 class="text-danger text-center font-weight-bold mb-4"><?php echo e(session('msg2')); ?></h4>
            <?php endif; ?>
            <div class="w-100 d-inline-block mb-3">
                <div class="tablediv bg-white w-100 d-inline-block">
                    <input id="mail_address" type="mail_address" 
                    class="loginborder br5px w-100 bg-white pl-2 fileinput <?php $__errorArgs = ['mail_address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                    placeholder="mail@gmail.com"
                    name="mail_address" value="<?php echo e(old('mail_address')); ?>" 
                    required autocomplete="mail_address" 
                    autofocus>
                    <?php $__errorArgs = ['mail_address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-feedback" role="alert">
                            <strong><?php echo e($message); ?></strong>
                        </span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            </div>
            <div class="w-100 d-inline-block mb-3">
                <div class="tablediv bg-white w-100 d-inline-block">
                    <input id="password"
                    type="password"
                    class="loginborder br5px w-100 bg-white pl-2 fileinput <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                    name="password"
                    placeholder="password"
                    required
                    autocomplete="current-password">
                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-feedback" role="alert">
                            <strong><?php echo e($message); ?></strong>
                        </span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            </div>

            <?php $__errorArgs = ['loginid'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <span class="red">
                <strong><?php echo e($errors->first('loginid')); ?></strong>
            </span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            
        </div>
    </div>
    <div class="col-12 col-lg-10 m-auto pb-4">
        <button type="submit" class="inportbutton w-100 d-inline-block b-none text-white text-center font-weight-bold p-2 cursor br5px">
            <?php echo e(__('ログイン')); ?>

        </button>
    </div>
    <?php if(Route::has('password.request')): ?>
    <div class="d-inline-block w-100">
        <a class="d-inline-block font-weight-bold" href="<?php echo e(route('password.request')); ?>">
            <?php echo e(__('パスワードを忘れた方はこちら')); ?>

        </a>
    </div>
    <?php endif; ?>
    <div class="d-inline-block w-100">
        <a class="d-inline-block font-weight-bold" href="<?php echo e(route('register')); ?>">
            サインインする
        </a>
    </div>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.loginlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/gware/resources/views/auth/login.blade.php ENDPATH**/ ?>