<div class="content-sidebar content-sidebar-md" data-scrollbar-target="#psScrollbarInit">
    <div class="content-sidebar-header bg-white sticky-top hstack justify-content-between">
        <h4 class="fw-bolder mb-0">Profile</h4>
    </div>
    <div class="content-sidebar-body">
        <ul class="nav flex-column nxl-content-sidebar-item">
            <li class="nav-item">
                <a class="nav-link <?php echo e(Request::routeIs('providers.profile') ? 'active' : ''); ?>" href="<?php echo e(route('providers.profile')); ?>">
                    <i class="feather-airplay"></i>
                    <span>Overview</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo e(Request::routeIs('services.index') ? 'active' : ''); ?>" href="<?php echo e(route('services.index')); ?>">
                    <i class="feather-search"></i>
                    <span>Services</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo e(Request::routeIs('reviews.index') ? 'active' : ''); ?>" href="<?php echo e(route('reviews.index')); ?>">
                    <i class="feather-tag"></i>
                    <span>Reviews</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo e(Request::routeIs('portfolios.index') ? 'active' : ''); ?>" href="<?php echo e(route('portfolios.index')); ?>">
                    <i class="feather-check-circle"></i>
                    <span>Portfolios</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo e(Request::routeIs('awards.index') ? 'active' : ''); ?>" href="<?php echo e(route('awards.index')); ?>">
                    <i class="feather-crosshair"></i>
                    <span>Awards</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo e(Request::routeIs('teams.index') ? 'active' : ''); ?>" href="<?php echo e(route('teams.index')); ?>">
                    <i class="feather-life-buoy"></i>
                    <span>Team</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo e(Request::routeIs('managers.index') ? 'active' : ''); ?>" href="<?php echo e(route('managers.index')); ?>">
                    <i class="feather-user"></i>
                    <span>Add Manager</span>
                </a>
            </li>
        </ul>
    </div>
</div>
<?php /**PATH /home/dorauz/domains/marketing.dora.uz/public_html/resources/views/admin/components/single-sidebar.blade.php ENDPATH**/ ?>