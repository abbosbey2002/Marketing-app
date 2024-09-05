<?php 
use App\Models\Category;
use App\Models\Portfolio;

$categories = Category::all();
$portfolios = Portfolio::all();
?>
<!-- Modal HTML form -->
<div class="offcanvas offcanvas-end w-50" tabindex="-1" id="awardProviderOffcanvas">
    <div class="offcanvas-header border-bottom" style="padding-top: 20px; padding-bottom: 20px">
        <div class="d-flex align-items-center">
            <div class="avatar-text avatar-md items-details-close-trigger" data-bs-dismiss="offcanvas" data-bs-toggle="tooltip" data-bs-trigger="hover" title="Details Close"><i class="feather-arrow-left"></i></div>
            <span class="vr text-muted mx-4"></span>
            <a href="javascript:void(0);">
                <h2 class="fs-14 fw-bold text-truncate-1-line">Awards</h2>
                <span class="fs-12 fw-normal text-muted text-truncate-1-line">09:00am - 11:00am, Rangpur, Bangladesh.</span>
            </a>
        </div>
    </div>
    <div class="offcanvas-body">
        <form action="<?php echo e(route('awards.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group mb-4">
                        <label for="awardName" class="form-label">Award name</label>
                        <input name="name" id="awardName" class="form-control" placeholder="Enter your award name here..." required>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group mb-4">
                        <label for="category" class="form-label">Category (Optional)</label>
                        <select id="category" name="category_id" class="form-control" required>
                            <option value="">Select Category</option>
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group mb-4">
                        <label for="awardDate" class="form-label">Date</label>
                        <input type="month" id="awardDate" name="date" class="form-control" >
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group mb-4">
                        <label class="form-label">Link to an existing work (Optional):</label>
                             <select id="link" name="link" class="form-select form-control">
                                <?php $__currentLoopData = $portfolios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $portfolio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($portfolio->link); ?>" style="color:black;" data-bg="bg-primary"><?php echo e($portfolio->link); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                         </select>
                    </div>
                </div>
            </div>
            <input type="hidden" name="provider_id" value="<?php echo e(auth()->user()->provider_id); ?>">
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</div>
<?php /**PATH /home/abbos/Desktop/projects/MARKETING/resources/views/admin/components//awards/provider-award-modal.blade.php ENDPATH**/ ?>