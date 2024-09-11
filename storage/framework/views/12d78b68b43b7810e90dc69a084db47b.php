<?php $__env->startSection('content'); ?>


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
                        <a href="javascript:void(0);" class="btn btn-primary" 
                        data-bs-toggle="offcanvas" data-bs-target="#portfolioProviderOffcanvas">
                            <i class="feather-plus me-2"></i>
                            <span>Add New</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="content-area-body">
                <div class="card mb-0">
                    <div class="card-body">
                        <!--! BEGIN: [Users] !-->
                        <div class="card stretch stretch-full">
                            <div class="card-header">
                                <h5 class="card-title">Portfolio</h5>
                            </div>
                            <?php $__currentLoopData = $portfolios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $portfolio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="card-body custom-card-action">
                                    <div class="w-100 d-flex align-items-center justify-content-between">
                                        <div class="d-flex align-items-center">
                                            <div>
                                                <a href="javascript:void(0)" class="d-flex align-items-center mb-1" data-bs-toggle="offcanvas" data-bs-target="#portfolioProviderEditOffcanvas<?php echo e($portfolio->id); ?>"><?php echo e($portfolio->name); ?></a>
                                                <div class="fs-12 fw-normal text-muted"><?php echo e($portfolio->sector); ?></div>
                                            </div>
                                        </div>
                                        <div class="hstack gap-2 justify-content-end">
                                            <a href="javascript:void(0);" class="avatar-text avatar-md"
                                                    data-bs-toggle="offcanvas" data-bs-target="#portfolioProviderEditOffcanvas<?php echo e($portfolio->id); ?>">
                                                    <i class="feather feather-edit-3 "></i>
                                            </a>
                                            <form class="avatar-text avatar-md"  method="POST" onsubmit="confirmDelete(event)" action="<?php echo e(route('portfolios.destroy', $portfolio->id)); ?>">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button type="submit" class="btn text-dark p-0 border-0" style="background: none;">
                                                    <i class="feather feather-trash-2"></i>
                                                </button>
                                            </form>

                                        </div>
                                    </div>
                                    <hr class="border-dashed my-3">
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <a href="javascript:void(0);" class="card-footer fs-11 fw-bold text-uppercase text-center"
                                data-bs-toggle="offcanvas" data-bs-target="#portfolioProviderOffcanvas">Add New</a>
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



<?php echo $__env->make('admin.components.portfolios.provider-portfolio-modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('admin.components.portfolios.provider-portfolio-edit-modal',$portfolios, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('admin.components.portfolios.provider-portfolio-view-modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



<script>


function confirmDelete(event) {
    event.preventDefault();
    var num1 = Math.floor(Math.random() * 10) + 1;
    var num2 = Math.floor(Math.random() * 10) + 1;
    var correctAnswer = num1 + num2;

    Swal.fire({
        title: 'Matematik amalni bajaring',
        text: `${num1} + ${num2} = ?`,
        input: 'text',
        inputPlaceholder: 'Javobni kiriting',
        showCancelButton: true,
        confirmButtonText: 'Tasdiqlash',
        cancelButtonText: 'Bekor qilish',
        preConfirm: (answer) => {
            if (parseInt(answer) === correctAnswer) {
                return true;
            } else {
                Swal.showValidationMessage(
                    'Notog\'ri javob. O\'chirish uchun to\'g\'ri javob kiritilishi kerak.'
                );
                return false;
            }
        }
    }).then((result) => {
        if (result.value) {
            Swal.fire({
                title: 'O\'chirishni tasdiqlaysizmi?',
                text: "Bu amalni bekor qilib bo'lmaydi!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ha, o\'chirilsin!',
                cancelButtonText: 'Bekor qilish'
            }).then((result) => {
                if (result.value) {
                    event.target.submit();
                }
            });
        }
    });
}

</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\projects\MARKETING\resources\views/admin/providers/portfolios/index.blade.php ENDPATH**/ ?>