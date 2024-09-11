<?php $__env->startSection('content'); ?>
    <link rel="stylesheet" type="text/css" href="assets/vendors/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="assets/vendors/css/select2-theme.min.css">
    <div class="nxl-content without-header nxl-full-content">
        <!-- [ Main Content ] start -->
        <div class="main-content d-flex">
            <!-- [ Content Sidebar ] start -->
            <?php echo $__env->make('admin.components.single-sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <!-- [ Content Sidebar  ] end -->
            <!-- [ Main Area  ] start -->
            <div class="content-area" data-scrollbar-target="#psScrollbarInit">
                <div class="content-area-header bg-white sticky-top">
                    <div class="page-header-right ms-auto">
                        <div class="d-flex align-items-center gap-3 page-header-right-items-wrapper">
                            <a href="javascript:void(0);" class="btn btn-primary" data-bs-toggle="offcanvas"
                                data-bs-target="#serviceProviderOffcanvas">
                                <i class="feather-plus me-2"></i>
                                <span>Add New</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="content-area-body">
                    <?php if($errors->any()): ?>
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <?php if(session('message')): ?>
                        <div class="alert alert-success">
                            <?php echo e(session('message')); ?>

                        </div>
                    <?php endif; ?>


                    <div class="card mb-0">
                        <div class="card-body">
                            <!--! BEGIN: [Users] !-->
                            <div class="card stretch stretch-full mb-0">
                                <div class="card-header">
                                    <h5 class="card-title">Service</h5>
                                </div>
                                <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="card-body custom-card-action">
                                        <div class="w-100 d-flex align-items-center justify-content-between">
                                            <div class="d-flex align-items-center">
                                                <div>
                                                    <!-- Display Service List Name -->
                                                    <a href="javascript:void(0)" class="d-flex align-items-center mb-1"
                                                        data-bs-toggle="offcanvas"
                                                        data-bs-target="#editServiceModal<?php echo e($service->id); ?>">
                                                        <?php echo e($service->name_en ?? 'No Service List'); ?>

                                                        
                                                    </a>
                                                    <div class="fs-12 fw-normal text-muted">
                                                        <!-- Display Skills -->
                                                        <?php if($service->providerSkills()->get()->isNotEmpty()): ?>
                                                            <ul>
                                                                <?php $__currentLoopData = $service->providerSkills()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <li><?php echo e($skill->skill->name_en ?? $skill->skill->name_en); ?>

                                                                    </li>
                                                                    <!-- Displaying each skill in English or fallback -->
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </ul>
                                                        <?php else: ?>
                                                            No skills assigned
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="hstack gap-2 justify-content-end">
                                                <!-- Edit Button -->
                                                <a href="javascript:void(0);" class="avatar-text avatar-md"
                                                    data-bs-toggle="offcanvas"
                                                    data-bs-target="#editServiceModal<?php echo e($service->id); ?>">
                                                    <i class="feather feather-edit-3"></i>
                                                </a>

                                                <!-- Delete Button -->
                                                <form class="avatar-text avatar-md" action="<?php echo e(route('deleteService')); ?>"
                                                    method="POST" onsubmit="confirmDelete(event)"
                                                    action="<?php echo e(route('services.destroy', $service->id)); ?>">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                    <input type="hidden" name="service-type" value="<?php echo e($service->id); ?>">
                                                    <input type="hidden" name="provider_id"
                                                        value="<?php echo e(auth()->user()->manager->provider->id); ?>">
                                                    <button type="submit" class="btn text-dark p-0 border-0"
                                                        style="background: none;">
                                                        <i class="feather feather-trash-2"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                        <hr class="border-dashed my-3">
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                <a href="javascript:void(0);" class="card-footer fs-11 fw-bold text-uppercase text-center"
                                    data-bs-toggle="offcanvas" data-bs-target="#serviceProviderOffcanvas">Add New
                                </a>

                            </div>

                            <!--! END: [Users] !-->

                        </div>
                    </div>
                </div>

            </div>
            <!-- [ Content Area ] end -->
        </div>
        <!-- [ Main Content ] end -->
    </div>

    <?php echo $__env->make('admin.components.services.provider-service-modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('admin.components.services.provider-service-edit-modal', $services, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <script src="assets/vendors/js/select2.min.js"></script>
    <script src="assets/vendors/js/select2-active.min.js"></script>

    <script>
        $(document).ready(function() {
            // Initialize Select2 on the Skills dropdown
            $('#skills-list').select2({
                placeholder: "Select skills",
                allowClear: true,
                theme: 'bootstrap-5'
            });
        });
    </script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/abbos/Desktop/projects/MARKETING/resources/views/admin/providers/service/index.blade.php ENDPATH**/ ?>