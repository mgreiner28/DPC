<?php $__env->startSection('title', $title); ?>

<?php $__env->startSection('messenger-content'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="list-group">
                <?php $__empty_1 = true; $__currentLoopData = $topics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $topic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="row list-group-item">
                        <div class="col-xs-4 col-md-4">
                            <a href="<?php echo e(route('admin.messenger.show', [$topic->id])); ?>" class="<?php echo e($topic->unread()?'unread':false); ?>">
                                <?php echo e($topic->otherPerson()->email); ?>

                            </a>
                        </div>
                        <div class="col-xs-5 col-md-5">
                            <a href="<?php echo e(route('admin.messenger.show', [$topic->id])); ?>" class="<?php echo e($topic->unread()?'unread':false); ?>">
                                <?php echo e($topic->subject); ?>

                            </a>
                        </div>
                        <div class="col-xs-2 text-right"><?php echo e($topic->sent_at->diffForHumans()); ?></div>
                        <div class="col-xs-1 text-center">
                            <?php echo Form::open(array(
                                    'style' => 'display: inline-block;',
                                    'method' => 'DELETE',
                                    'onsubmit' => "return confirm('Are you sure?');",
                                    'route' => ['admin.messenger.destroy', $topic->id])); ?>

                            <?php echo Form::submit(trans('global.app_delete'), array('class' => 'btn btn-xs btn-danger')); ?>

                            <?php echo Form::close(); ?>

                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="row list-group-item">
                        You have no messages.
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <style>
        .messenger-table tr:first-child td {
            border-top: 0 !important;
        }
        .unread {
            font-weight: bold;
            color:black;
        }
    </style>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.messenger.template', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>