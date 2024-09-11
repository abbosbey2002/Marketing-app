<!--! ================================================================ !-->
    <!--! [Start] Tasks Details Offcanvas !-->
    <!--! ================================================================ !-->
    <?php $__currentLoopData = $managers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $manager): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="offcanvas offcanvas-end w-50" tabindex="-1" id="managerEditProviderOffcanvas<?php echo e($manager->id); ?>">

        <div class="offcanvas-header border-bottom" style="padding-top: 20px; padding-bottom: 20px">
            <div class="d-flex align-items-center">
                <div class="avatar-text avatar-md items-details-close-trigger" data-bs-dismiss="offcanvas" data-bs-toggle="tooltip" data-bs-trigger="hover" title="Details Close"><i class="feather-arrow-left"></i></div>
                <span class="vr text-muted mx-4"></span>
                <a href="javascript:void(0);">
                    <h2 class="fs-14 fw-bold text-truncate-1-line">Edit manager</h2>
                </a>
            </div>
        </div>        
        <form action="<?php echo e(route('managers.update',$manager->id)); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <div class="offcanvas-body">
                <div class="row">
                 <input type="hidden" name="forGetId" id="forGetId">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="manager_name" class="form-label">Manager Name:</label>
                            <input type="text" class="form-control" id="manager_name" name="manager_name" value="<?php echo e($manager->manager_name); ?>" required>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="manager_email" class="form-label">Manager Email:</label>
                            <input type="email" class="form-control" id="manager_email" name="manager_email" value="<?php echo e($manager->manager_email); ?>" required>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="manager_password" class="form-label">Manager Password (leave blank if unchanged):</label>
                            <input type="password" class="form-control" id="manager_password" name="manager_password">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="role" class="form-label">Role:</label>
                            <input type="text" class="form-control" id="role" name="role" value="<?php echo e($manager->role); ?>" required>
                        </div>
                    </div>
                </div>
                
                <div class="comments">
                    <div class="pt-4">
                        <button href="javascript:void(0);" class="btn btn-primary d-inline-block mt-4">Add Manager</button>
                    </div>
                </div>
                <!--! END: Comments !-->
            </div>
        </form>

    </div>
     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <!--! ================================================================ !-->
    <!--! [End] Tasks Details Offcanvas !-->
    <!--! ================================================================ !--><?php /**PATH D:\projects\MARKETING\resources\views/admin/components/managers/edit-provider-manager-modal.blade.php ENDPATH**/ ?>