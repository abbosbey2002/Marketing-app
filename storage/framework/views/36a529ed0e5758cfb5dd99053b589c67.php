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
                            data-bs-toggle="offcanvas" data-bs-target="#awardProviderOffcanvas">
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
                                <h5 class="card-title">Awards</h5>
                            </div>
                            <div class="card-body custom-card-action">
                                <table class="table table-hover" id="awardsList">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Category</th>
                                            <th>Date</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $awards; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $award): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td>
                                                <a href="javascript:void(0);" class="hstack gap-3"    data-bs-toggle="offcanvas" data-bs-target="#awardEditProviderOffcanvas<?php echo e($award->id); ?>">
                                                    <div>
                                                        <span class="text-truncate-1-line"><?php echo e($award->name); ?></span>
                                                    </div>
                                                </a>
                                            </td>
                                            <td><a href="#"><?php echo e($award->category->name ?? null); ?></a></td>
                                            <td><a href="#"><?php echo e(\Carbon\Carbon::parse($award->date)->format('F Y')); ?></a></td>
                                            <td>
                                                <div class="hstack gap-2 justify-content-end">
                                                    <a href="javascript:void(0);" class="avatar-text avatar-md"
                                                         data-bs-toggle="offcanvas" data-bs-target="#awardViewProviderOffcanvas">
                                                        <i class="feather-eye"></i>
                                                    </a>

                                                    <div class="dropdown">
                                                        <a href="javascript:void(0)" class="avatar-text avatar-md" data-bs-toggle="dropdown" data-bs-offset="0,21">
                                                            <i class="feather feather-more-horizontal"></i>
                                                        </a>
                                                        <ul class="dropdown-menu">
                                                            <li>
                                                                <a class="dropdown-item" href="javascript:void(0);"
                                                                    data-bs-toggle="offcanvas" data-bs-target="#awardEditProviderOffcanvas<?php echo e($award->id); ?>">
                                                                    <i class="feather feather-edit-3 me-3"></i>
                                                                    <span>Edit</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <form class="dropdown-item" action="<?php echo e(route('awards.destroy', $award->id)); ?>" method="POST" onsubmit="event.preventDefault(); showDeleteModal(this);">
                                                                    <?php echo csrf_field(); ?>
                                                                    <?php echo method_field('DELETE'); ?>
                                                                    <button type="submit" class="btn text-dark p-0 border-0" style="background: none;">
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
                            <a href="javascript:void(0);" class="card-footer fs-11 fw-bold text-uppercase text-center"
                                data-bs-toggle="offcanvas" data-bs-target="#awardProviderOffcanvas">Add New</a>
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



<?php echo $__env->make('admin.components.awards.provider-award-modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('admin.components.awards.edit-provider-award-modal' , $awards, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('admin.components.awards.view-provider-award-modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\projects\MARKETING\resources\views/admin/providers/awards/index.blade.php ENDPATH**/ ?>