<?php $__env->startSection('content'); ?>

<!-- Main Content -->
<main class="nxl-container" style="display: flex; flex-direction: column; justify-content: space-between;">
    <div class="nxl-content">
        <!-- Page Header -->
        <div class="page-header">
            <div class="page-header-left d-flex align-items-center">
                <div class="page-header-title">
                    <h5 class="m-b-10">Portfolio Details</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo e(route('portfolios.index')); ?>">Portfolios</a></li>
                    <li class="breadcrumb-item">Portfolio Details</li>
                </ul>
            </div>
            <div class="page-header-right ms-auto">
                <div class="page-header-right-items">
                    <a href="<?php echo e(route('portfolios.edit', $portfolio->id)); ?>" class="btn btn-primary">
                        <i class="feather-edit me-2"></i>
                        <span>Edit Portfolio</span>
                    </a>
                </div>
            </div>
        </div>
        <!-- End Page Header -->

        <!-- Main Content -->
        <div class="main-content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card border-top-0">
                        <div class="card-body">
                            <div class="row mb-4 align-items-center">
                                <div class="col-lg-4 fw-semibold">Name:</div>
                                <div class="col-lg-8"><?php echo e($portfolio->name); ?></div>
                            </div>

                            <div class="row mb-4 align-items-center">
                                <div class="col-lg-4 fw-semibold">Image:</div>
                                <div class="col-lg-8">
                                    <img src="<?php echo e($portfolio->image); ?>" alt="<?php echo e($portfolio->name); ?>" style="max-width: 100%; height: auto;">
                                </div>
                            </div>

                            <div class="row mb-4 align-items-center">
                                <div class="col-lg-4 fw-semibold">Skills:</div>
                                <div class="col-lg-8"><?php echo e($portfolio->skills); ?></div>
                            </div>

                            <div class="row mb-4 align-items-center">
                                <div class="col-lg-4 fw-semibold">Budget:</div>
                                <div class="col-lg-8">$<?php echo e(number_format($portfolio->budget, 2)); ?></div>
                            </div>

                            <div class="row mb-4 align-items-center">
                                <div class="col-lg-4 fw-semibold">Start Date:</div>
                                <div class="col-lg-8"><?php echo e(\Carbon\Carbon::parse($portfolio->start_date)->format('F j, Y')); ?></div>
                            </div>

                            <div class="row mb-4 align-items-center">
                                <div class="col-lg-4 fw-semibold">End Date:</div>
                                <div class="col-lg-8"><?php echo e(\Carbon\Carbon::parse($portfolio->end_date)->format('F j, Y')); ?></div>
                            </div>

                            <div class="row mb-4 align-items-center">
                                <div class="col-lg-4 fw-semibold">Introduction:</div>
                                <div class="col-lg-8"><?php echo e($portfolio->introduction); ?></div>
                            </div>

                            <div class="row mb-4 align-items-center">
                                <div class="col-lg-4 fw-semibold">Challenges:</div>
                                <div class="col-lg-8"><?php echo e($portfolio->challenges); ?></div>
                            </div>

                            <div class="row mb-4 align-items-center">
                                <div class="col-lg-4 fw-semibold">Solution:</div>
                                <div class="col-lg-8"><?php echo e($portfolio->solution); ?></div>
                            </div>

                            <div class="row mb-4 align-items-center">
                                <div class="col-lg-4 fw-semibold">Impact:</div>
                                <div class="col-lg-8"><?php echo e($portfolio->impact); ?></div>
                            </div>

                            <div class="row mb-4 align-items-center">
                                <div class="col-lg-4 fw-semibold">Link:</div>
                                <div class="col-lg-8"><a href="<?php echo e($portfolio->link); ?>" target="_blank"><?php echo e($portfolio->link); ?></a></div>
                            </div>

                            <div class="row mb-4 align-items-center">
                                <div class="col-lg-4 fw-semibold">Company Name:</div>
                                <div class="col-lg-8"><?php echo e($portfolio->company_name); ?></div>
                            </div>

                            <div class="row mb-4 align-items-center">
                                <div class="col-lg-4 fw-semibold">Company Location:</div>
                                <div class="col-lg-8"><?php echo e($portfolio->company_location); ?></div>
                            </div>

                            <div class="row mb-4 align-items-center">
                                <div class="col-lg-4 fw-semibold">Sector:</div>
                                <div class="col-lg-8"><?php echo e($portfolio->sector); ?></div>
                            </div>

                            <div class="row mb-4 align-items-center">
                                <div class="col-lg-4 fw-semibold">Audience:</div>
                                <div class="col-lg-8"><?php echo e($portfolio->audience); ?></div>
                            </div>

                            <div class="row mb-4 align-items-center">
                                <div class="col-lg-4 fw-semibold">Email:</div>
                                <div class="col-lg-8"><?php echo e($portfolio->email); ?></div>
                            </div>

                            <div class="row mb-4 align-items-center">
                                <div class="col-lg-4 fw-semibold">Service:</div>
                                <div class="col-lg-8"><?php echo e($portfolio->service->name); ?></div>
                            </div>

                            <div class="row mb-4 align-items-center">
                                <div class="col-lg-4 fw-semibold">Provider:</div>
                                <div class="col-lg-8"><?php echo e($portfolio->provider->name); ?></div>
                            </div>

                           <div class="row mb-4">
                                <div class="col-lg-12">
                                    <div class="d-flex justify-content-start gap-2">
                                        <a href="<?php echo e(route('portfolios.edit', $portfolio->id)); ?>" class="btn btn-primary">
                                            <i class="feather-edit me-2"></i>
                                            Edit Portfolio
                                        </a>
                                        <form action="<?php echo e(route('portfolios.destroy', $portfolio->id)); ?>" method="POST" style="display: inline;">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="btn btn-danger">
                                                <i class="feather-trash me-2"></i>
                                                Delete Portfolio
                                            </button>
                                        </form>
                                        <a href="<?php echo e(route('portfolios.index')); ?>" class="btn btn-secondary">
                                            <i class="feather-arrow-left me-2"></i>
                                            Back to Portfolios
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Main Content -->
    </div>
</main>
<!-- End Main Content -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/abbos/Desktop/projects/MARKETING/resources/views/admin/providers/portfolios/show.blade.php ENDPATH**/ ?>