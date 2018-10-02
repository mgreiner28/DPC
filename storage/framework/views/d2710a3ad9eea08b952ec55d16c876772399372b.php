<?php $__env->startSection('content'); ?>

    <h2 style="margin-top:0px;"><?php echo $__env->yieldContent('title'); ?></h2>

    <div class="row" style="margin-top:15px;">

        
        <div class="col-xs-3">
            <a href="<?php echo e(route('admin.messenger.create')); ?>" class="btn btn-primary btn-group-justified">New message</a>

            <div class="list-group" style="margin-top:8px;">
                <a href="<?php echo e(route('admin.messenger.index')); ?>" class="list-group-item">All Messages</a>
                <?php ($unread = App\MessengerTopic::unreadInboxCount()); ?>
                <a href="<?php echo e(route('admin.messenger.inbox')); ?>" class="list-group-item <?php echo e(($unread > 0 ? 'unread' : '')); ?>">
                    Inbox
                    <?php echo e(($unread > 0 ? '('.$unread.')' : '')); ?>

                </a>
                <a href="<?php echo e(route('admin.messenger.outbox')); ?>" class="list-group-item">Outbox</a>
            </div>
        </div>


        
        <div class="col-xs-9">
            <?php echo $__env->yieldContent('messenger-content'); ?>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>