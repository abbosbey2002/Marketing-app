<?php $__env->startSection('content'); ?>
    <script>
        window.addEventListener("load", function(event) {
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

            .gap-sb-3 {
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
                z-index: 999999;
            }
        }
    </style>
    <main class="main d-flex align-items-center">
        <section class="section-box box-content-login">
            <div class="container">
                <?php if(session('error')): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?php echo e(session('error')); ?>

                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php endif; ?>
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="box-form-register">
                            <h3 class="title-register">Welcome Back</h3>
                            <form class="form-register" method="post" action="<?php echo e(route('providerRegisterStep1store')); ?>">
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
                                <div class="form-group">
                                    <label>What is the name of your company?<span class="brand-1">*</span></label>
                                    <input type="text" name="name" id="company-name" class="form-control text-center"
                                        placeholder="DORA" required>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-black btn-rounded">Next
                                        <svg xmlns="http://www.w3.org/2000/svg" width="23" height="8"
                                            viewbox="0 0 23 8" fill="none">
                                            <path
                                                d="M22.5 4.00032L18.9791 0.479492V3.3074H0.5V4.69333H18.9791V7.52129L22.5 4.00032Z"
                                                fill=""></path>
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
                                    <div class="item-logo"><img src="/assets/imgs/page/homepage3/logo2.png" alt="Nivia">
                                    </div>
                                </li>
                                <li>
                                    <div class="item-logo"><img src="/assets/imgs/page/homepage3/logo3.png" alt="Nivia">
                                    </div>
                                </li>
                                <li>
                                    <div class="item-logo"><img src="/assets/imgs/page/homepage3/logo4.png" alt="Nivia">
                                    </div>
                                </li>
                                <li>
                                    <div class="item-logo"><img src="/assets/imgs/page/homepage3/logo5.png" alt="Nivia">
                                    </div>
                                </li>
                                <li>
                                    <div class="item-logo"><img src="/assets/imgs/page/homepage3/logo6.png" alt="Nivia">
                                    </div>
                                </li>
                                <li>
                                    <div class="item-logo"><img src="/assets/imgs/page/homepage3/logo7.png" alt="Nivia">
                                    </div>
                                </li>
                                <li>
                                    <div class="item-logo"><img src="/assets/imgs/page/homepage3/logo8.png" alt="Nivia">
                                    </div>
                                </li>
                                <li>
                                    <div class="item-logo"><img src="/assets/imgs/page/homepage3/logo9.png" alt="Nivia">
                                    </div>
                                </li>
                                <li>
                                    <div class="item-logo"><img src="/assets/imgs/page/homepage3/logo1.png" alt="Nivia">
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const companyNameInput = document.getElementById('company-name');
            const companyList = document.getElementById('company-list');

            let timeout = null;

            companyNameInput.addEventListener('input', function() {
                let query = this.value.trim();

                // Avvalgi timeoutni to'xtatish
                clearTimeout(timeout);

                // 300 millisekund kutib, fetch so'rovini ishga tushirish
                timeout = setTimeout(function() {
                    if (query.length > 2) {
                        console.log('Query:', query); // Qidiruv so'rovini tekshirish

                        fetch(`/search-companies?query=${query}`)
                            .then(response => {
                                console.log('Response Status:', response
                                .status); // Javob statusini tekshirish
                                return response.json();
                            })
                            .then(data => {
                                console.log('Response Data:',
                                data); // Javob ma'lumotlarini tekshirish
                                companyList.innerHTML = '';
                                companyList.style.display = 'block';

                                if (data.length) {
                                    data.forEach(company => {
                                        const companyOption = document.createElement(
                                            'a');
                                        companyOption.href = '#';
                                        companyOption.classList.add('list-group-item',
                                            'list-group-item-action',
                                            'company-option');
                                        companyOption.textContent = company.name;
                                        companyList.appendChild(companyOption);
                                    });
                                } else {
                                    console.log('No companies found');
                                    companyList.style.display = 'none';
                                }
                            })
                            .catch(error => {
                                console.error('Error:', error); // Xatolarni tekshirish
                            });
                    } else {
                        companyList.style.display = 'none';
                    }
                }, 300); // 300 ms kutish va so'ngra so'rovni amalga oshirish
            });

            document.addEventListener('click', function(event) {
                if (event.target.classList.contains('company-option')) {
                    event.preventDefault();
                    companyNameInput.value = event.target.textContent;
                    companyList.style.display = 'none';
                }
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.login', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/abbos/Desktop/projects/MARKETING/resources/views/auth/provider/register/step1.blade.php ENDPATH**/ ?>