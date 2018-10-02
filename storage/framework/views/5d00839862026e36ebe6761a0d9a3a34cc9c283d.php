<?php $request = app('Illuminate\Http\Request'); ?>
<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <ul class="sidebar-menu">

             

            <li class="<?php echo e($request->segment(1) == 'home' ? 'active' : ''); ?>">
                <a href="<?php echo e(url('/')); ?>">
                    <i class="fa fa-wrench"></i>
                    <span class="title"><?php echo e(app('translator')->getFromJson('global.app_dashboard')); ?></span>
                </a>
            </li>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user_management_access')): ?>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span><?php echo e(app('translator')->getFromJson('global.user-management.title')); ?></span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('permission_access')): ?>
                    <li>
                        <a href="<?php echo e(route('admin.permissions.index')); ?>">
                            <i class="fa fa-briefcase"></i>
                            <span><?php echo e(app('translator')->getFromJson('global.permissions.title')); ?></span>
                        </a>
                    </li><?php endif; ?>
                    
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role_access')): ?>
                    <li>
                        <a href="<?php echo e(route('admin.roles.index')); ?>">
                            <i class="fa fa-briefcase"></i>
                            <span><?php echo e(app('translator')->getFromJson('global.roles.title')); ?></span>
                        </a>
                    </li><?php endif; ?>
                    
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user_access')): ?>
                    <li>
                        <a href="<?php echo e(route('admin.users.index')); ?>">
                            <i class="fa fa-user"></i>
                            <span><?php echo e(app('translator')->getFromJson('global.users.title')); ?></span>
                        </a>
                    </li><?php endif; ?>
                    
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('team_access')): ?>
                    <li>
                        <a href="<?php echo e(route('admin.teams.index')); ?>">
                            <i class="fa fa-users"></i>
                            <span><?php echo e(app('translator')->getFromJson('global.teams.title')); ?></span>
                        </a>
                    </li><?php endif; ?>
                    
                </ul>
            </li><?php endif; ?>
            
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('transaction_access')): ?>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-folder"></i>
                    <span><?php echo e(app('translator')->getFromJson('global.transactions.title')); ?></span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('sale_access')): ?>
                    <li>
                        <a href="<?php echo e(route('admin.sales.index')); ?>">
                            <i class="fa fa-file"></i>
                            <span><?php echo e(app('translator')->getFromJson('global.sales.title')); ?></span>
                        </a>
                    </li><?php endif; ?>
                    
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('purchase_access')): ?>
                    <li>
                        <a href="<?php echo e(route('admin.purchases.index')); ?>">
                            <i class="fa fa-file"></i>
                            <span><?php echo e(app('translator')->getFromJson('global.purchases.title')); ?></span>
                        </a>
                    </li><?php endif; ?>
                    
                </ul>
            </li><?php endif; ?>
            

            

            
            <?php ($unread = App\MessengerTopic::countUnread()); ?>
            <li class="<?php echo e($request->segment(2) == 'messenger' ? 'active' : ''); ?> <?php echo e(($unread > 0 ? 'unread' : '')); ?>">
                <a href="<?php echo e(route('admin.messenger.index')); ?>">
                    <i class="fa fa-envelope"></i>

                    <span>Messages</span>
                    <?php if($unread > 0): ?>
                        <?php echo e(($unread > 0 ? '('.$unread.')' : '')); ?>

                    <?php endif; ?>
                </a>
            </li>
            <style>
                .page-sidebar-menu .unread * {
                    font-weight:bold !important;
                }
            </style>



            <li class="<?php echo e($request->segment(1) == 'change_password' ? 'active' : ''); ?>">
                <a href="<?php echo e(route('auth.change_password')); ?>">
                    <i class="fa fa-key"></i>
                    <span class="title"><?php echo e(app('translator')->getFromJson('global.app_change_password')); ?></span>
                </a>
            </li>

            <li>
                <a href="#logout" onclick="$('#logout').submit();">
                    <i class="fa fa-arrow-left"></i>
                    <span class="title"><?php echo e(app('translator')->getFromJson('global.app_logout')); ?></span>
                </a>
            </li>
        </ul>
    </section>
</aside>

