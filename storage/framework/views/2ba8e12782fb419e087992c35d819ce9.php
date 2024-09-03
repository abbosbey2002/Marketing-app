<nav class="nxl-navigation">
    <div class="navbar-wrapper">
        <div class="m-header">
            <a href="/public" class="b-brand">
                <!-- ========   change your logo hear   ============ -->
                <img src="<?php echo e(asset('/assets/images/logo/dacademy.png')); ?>" alt="" class="logo logo-lg">
                <img src="/assets/images/logo/icon.png" alt="" class="logo logo-sm">
            </a>
        </div>
        <div class="navbar-content">
            <ul class="nxl-navbar">
                <li class="nxl-item nxl-caption">
                    <label>Navigation</label>
                </li>
                <li class="nxl-item nxl-hasmenu <?php echo e(request()->is('/') ? 'active' : ''); ?>">
                    <a href="javascript:void(0);" class="nxl-link">
                        <span class="nxl-micon"><i class="feather-airplay"></i></span>
                        <span class="nxl-mtext">Dashboards</span><span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
                    </a>
                    <ul class="nxl-submenu">
                        <li class="nxl-item <?php echo e(request()->is('/') ? 'active' : ''); ?>"><a class="nxl-link" href="/">Home</a></li>
                    </ul>
                </li>

                <?php if(request()->is('provider/providers')): ?>
                <li class="nxl-item nxl-hasmenu <?php echo e(request()->is('provider/providers') ? 'active' : ''); ?>">
                    <a href="javascript:void(0);" class="nxl-link">
                        <span class="nxl-micon"><i class="fa-regular fa-building"></i></span>
                        <span class="nxl-mtext">Provider</span><span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
                    </a>
                    <ul class="nxl-submenu">
                        <li class="nxl-item <?php echo e(request()->is('providers.index') ? 'active' : ''); ?>">
                            <a class="nxl-link" href="<?php echo e(route('providers.index')); ?>">Overview</a>
                        </li>
                        <li class="nxl-item <?php echo e(request()->is('services.index') ? 'active' : ''); ?>">
                            <a class="nxl-link" href="<?php echo e(route('services.index')); ?>">Services</a>
                        </li>
                        <li class="nxl-item <?php echo e(request()->is('reviews.index') ? 'active' : ''); ?>">
                            <a class="nxl-link" href="<?php echo e(route('reviews.index')); ?>">Reviews</a>
                        </li>
                        <li class="nxl-item <?php echo e(request()->is('portfolios.index') ? 'active' : ''); ?>">
                            <a class="nxl-link" href="<?php echo e(route('portfolios.index')); ?>">Portfolios</a>
                        </li>
                        <li class="nxl-item <?php echo e(request()->is('awards.index') ? 'active' : ''); ?>">
                            <a class="nxl-link" href="<?php echo e(route('awards.index')); ?>">Awards</a>
                        </li>
                        <li class="nxl-item <?php echo e(request()->is('teams.index') ? 'active' : ''); ?>">
                            <a class="nxl-link" href="<?php echo e(route('teams.index')); ?>">Team</a>
                        </li>
                        <li class="nxl-item <?php echo e(request()->is('managers.index') ? 'active' : ''); ?>">
                            <a class="nxl-link" href="<?php echo e(route('managers.index')); ?>">Add manager</a>
                        </li>
                    </ul>
                </li>

                <?php else: ?>
                <li class="nxl-item <?php echo e(request()->is('providers.index') ? 'active' : ''); ?>">
                    <a href="<?php echo e(route('providers.index')); ?>" class="nxl-link">
                        <span class="nxl-micon"><i class="fa-regular fa-building"></i></span>
                        <span class="nxl-mtext">Provider</span><span class="nxl-arrow"></span>
                    </a>
                </li>
                <?php endif; ?>

                
                <li class="nxl-item nxl-hasmenu <?php echo e(request()->is('marketer*') ? 'active' : ''); ?>">
                    <a href="javascript:void(0);" class="nxl-link">
                        <span class="nxl-micon"><i class="feather-user"></i></span>
                        <span class="nxl-mtext">Marketer</span><span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
                    </a>
                    <ul class="nxl-submenu">
                        <li class="nxl-item <?php echo e(request()->is('marketer/about') ? 'active' : ''); ?>"><a class="nxl-link" href="#">About</a></li>
                        <li class="nxl-item <?php echo e(request()->is('marketer/services') ? 'active' : ''); ?>"><a class="nxl-link" href="#">Services</a></li>
                        <li class="nxl-item <?php echo e(request()->is('marketer/portfolios') ? 'active' : ''); ?>"><a class="nxl-link" href="#">Portfolios</a></li>
                        <li class="nxl-item <?php echo e(request()->is('marketer/awards') ? 'active' : ''); ?>"><a class="nxl-link" href="#">Awards</a></li>
                        <li class="nxl-item <?php echo e(request()->is('marketer/resume') ? 'active' : ''); ?>"><a class="nxl-link" href="#">Resume</a></li>
                    </ul>
                </li>

                <li class="nxl-item nxl-hasmenu <?php echo e(request()->is('client*') ? 'active' : ''); ?>">
                    <a href="javascript:void(0);" class="nxl-link">
                        <span class="nxl-micon"><i class="fa-solid fa-briefcase"></i></span>
                        <span class="nxl-mtext">Client</span><span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
                    </a>
                    <ul class="nxl-submenu">
                        <li class="nxl-item <?php echo e(request()->is('client/about') ? 'active' : ''); ?>"><a class="nxl-link" href="#">About</a></li>
                    </ul>
                </li>

            </ul>

        </div>
    </div>
</nav>
<?php /**PATH D:\projects\MARKETING\resources\views/admin/components/sidebar.blade.php ENDPATH**/ ?>