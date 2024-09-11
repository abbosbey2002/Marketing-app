<?php $__env->startSection('title', 'Company Details'); ?>

<?php $__env->startSection('content'); ?>
<script>
    window.addEventListener("load", function (event) {
        document.getElementById('loginLogo').src = '/assets/imgs/template/logo-black.svg';
    });
</script>
<style>
    @media only screen and (max-width: 991px) {
        body {
            overflow: hidden;
            height: 100vh;
        }
        .main {
          height: 93vh;
        }
        .gap-sb-3{
            gap: 3rem; 
        }
    }

    @media only screen and (min-width: 992px) {
        .main {
          height: 100vh;
          overflow: hidden;
        }
        .footer {
          position: absolute;
          bottom: 0;
          left: 0;
          width: 100%;
          z-index: 999;
        }
    }

    .d-flex {
        display: flex;
    }

    .justify-content-center {
        justify-content: center;
    }

    .align-items-center {
        align-items: center;
    }

    .flex-wrap {
        flex-wrap: wrap;
    }
</style>
<main class="main d-flex align-items-center">
    <section class="section-box box-content-login"">
    <div class="container">
        <div class="row align-items-center py-3 ">
        <div class="col-lg-6">
            <div class="box-form-register">
                <h3 class="title-register">Welcome Back</h3>
                <form class="form-register row" action="<?php echo e(route('providerRegisterStep3')); ?>">
                    <?php echo csrf_field(); ?>
                    <!-- Xatolarni ko'rsatish uchun blok -->
                    <?php if($errors->any()): ?>
                        <div class="alert alert-danger">
                            <ul>
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                    <div class="form-group col-lg-6 col-sm-12">
                        <label>Address<span class="brand-1">*</span></label>
                        <input type="text" name="company_address" id="company_address" class="form-control text-center" placeholder="Enter your company address" required>
                    </div>
                    <div class="form-group col-lg-6 col-sm-12">
                        <label>Website<span class="brand-1">*</span></label>
                        <input type="text" name="company_website" id="company_website" class="form-control text-center" placeholder="Enter your company website">
                    </div>
                    <div class="form-group col-lg-6 col-sm-12">
                        <label>Phone number<span class="brand-1">*</span></label>
                        <input type="text" name="company_phone" id="company_phone" class="form-control text-center" placeholder="Enter your company phone number">
                    </div>
                    <div class="form-group col-lg-6 col-sm-12">
                        <label>Team size<span class="brand-1">*</span></label>
                        <input type="text" name="teamSize" id="teamSize" class="form-control text-center" placeholder="Enter your team size">
                    </div>
                    
                    <div class="form-group col-lg-12">
                        <button class="btn btn-black btn-rounded">Next
                            <svg xmlns="http://www.w3.org/2000/svg" width="23" height="8" viewbox="0 0 23 8" fill="none">
                            <path d="M22.5 4.00032L18.9791 0.479492V3.3074H0.5V4.69333H18.9791V7.52129L22.5 4.00032Z" fill=""></path>
                            </svg>
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-lg-6 d-none d-sm-none d-lg-flex justify-content-center align-items-center">
            <div class="box-image-banner-login"><img src="/assets/imgs/page/login/banner.png" alt="Nivia">
            <ul class="list-logos-login">
                <li>
                <div class="item-logo"><img src="/assets/imgs/page/homepage3/logo2.png" alt="Nivia"></div>
                </li>
                <li>
                <div class="item-logo"><img src="/assets/imgs/page/homepage3/logo3.png" alt="Nivia"></div>
                </li>
                <li>
                <div class="item-logo"><img src="/assets/imgs/page/homepage3/logo4.png" alt="Nivia"></div>
                </li>
                <li>
                <div class="item-logo"><img src="/assets/imgs/page/homepage3/logo5.png" alt="Nivia"></div>
                </li>
                <li>
                <div class="item-logo"><img src="/assets/imgs/page/homepage3/logo6.png" alt="Nivia"></div>
                </li>
                <li>
                <div class="item-logo"><img src="/assets/imgs/page/homepage3/logo7.png" alt="Nivia"></div>
                </li>
                <li>
                <div class="item-logo"><img src="/assets/imgs/page/homepage3/logo8.png" alt="Nivia"></div>
                </li>
                <li>
                <div class="item-logo"><img src="/assets/imgs/page/homepage3/logo9.png" alt="Nivia"></div>
                </li>
                <li>
                <div class="item-logo"><img src="/assets/imgs/page/homepage3/logo1.png" alt="Nivia"></div>
                </li>
            </ul>
            </div>
        </div>
        </div>
    </div>
    </section>
</main>

<?php $__env->stopSection(); ?>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<?php $__env->startSection('scripts'); ?>
<script>
    $(document).ready(function() {
        $('.select2').select2({
            placeholder: "Select your options",
            allowClear: true
        });
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.login', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\projects\MARKETING\resources\views/auth/provider/register/step2.blade.php ENDPATH**/ ?>