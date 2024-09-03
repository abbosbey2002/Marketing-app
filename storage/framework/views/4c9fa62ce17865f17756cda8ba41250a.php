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
                            data-bs-toggle="offcanvas" data-bs-target="#reviewProviderOffcanvas">
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
                            <div class="table-responsive">
                                <div class="table-responsive">
                                <table class="table table-hover" id="reviewsList">
                                    <thead>
                                        <tr>
                                            <th><?php echo e(__('Name')); ?></th>
                                            <th><?php echo e(__('Language')); ?></th>
                                            <th><?php echo e(__('Service')); ?></th>
                                            <th><?php echo e(__('Published At')); ?></th>
                                            <th><?php echo e(__('Link')); ?></th>
                                            <th class="text-end"><?php echo e(__('Settings')); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td>
                                                <a href="<?php echo e(route('reviews.show', $review->id)); ?>" class="hstack gap-3">
                                                    <div>
                                                        <span class="text-truncate-1-line"><?php echo e($review->user_full_name); ?></span>
                                                    </div>
                                                </a>
                                            </td>
                                            <td><a href="#"><?php echo e($review->language->name ?? null); ?></a></td>
                                            <td><a href="#"><?php echo e($review->provider->name ?? null); ?></a></td>
                                            <td><a href=""><?php echo e($review->created_at); ?></a></td>
                                            <td><a href="<?php echo e($review->link); ?>" target="_blank"><?php echo e(__('Link')); ?></a></td>
                                            <td>
                                                <div class="hstack gap-2 justify-content-end">
                                                    <a href="javascript:void(0)" class="avatar-text avatar-md" data-bs-toggle="offcanvas" data-bs-target="#reviewDetailsOffcanvas">
                                                        <i class="feather-eye"></i>
                                                    </a>

                                                    <div class="dropdown">
                                                        <a href="javascript:void(0)" class="avatar-text avatar-md" data-bs-toggle="dropdown" data-bs-offset="0,21">
                                                            <i class="feather feather-more-horizontal"></i>
                                                        </a>
                                                        <ul class="dropdown-menu">
                                                            <li>
                                                                <a class="dropdown-item" href="javascript:void(0)" data-bs-toggle="offcanvas" data-bs-target="#editReviewProviderOffcanvas<?php echo e($review->id); ?>" >
                                                                    <i class="feather feather-edit-3 me-3"></i>
                                                                    <span>Edit</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <form class="dropdown-item" action="<?php echo e(route('reviews.destroy', $review->id)); ?>" method="POST" onsubmit="confirmDelete(event)">
                                                                    <?php echo csrf_field(); ?>
                                                                    <?php echo method_field('DELETE'); ?>
                                                                    <button type="submit" class="btn" style="background: none; border: none; padding: 0; color:black;">
                                                                        <i class="feather feather-trash-2 me-3"></i>
                                                                        Delete
                                                                    </button>
                                                                </form>                                                                
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                            </div>                         
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
<?php echo $__env->make('admin.components.reviews.provider-review-modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('admin.components.reviews.provider-review-edit-modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('admin.components.reviews.provider-review-view-modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


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

<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/dorauz/domains/marketing.dora.uz/public_html/resources/views/admin/providers/reviews/index.blade.php ENDPATH**/ ?>