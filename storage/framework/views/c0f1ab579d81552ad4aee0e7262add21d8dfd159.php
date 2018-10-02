<?php $request = app('Illuminate\Http\Request'); ?>


<?php $__env->startSection('content'); ?>
    <h3 class="page-title"><?php echo e(app('translator')->getFromJson('global.purchases.title')); ?></h3>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('purchase_create')): ?>
    <p>
        <a href="<?php echo e(route('admin.purchases.create')); ?>" class="btn btn-success"><?php echo e(app('translator')->getFromJson('global.app_add_new')); ?></a>
        <a href="#" class="btn btn-warning" style="margin-left:5px;" data-toggle="modal" data-target="#myModal"><?php echo e(app('translator')->getFromJson('global.app_csvImport')); ?></a>
        <?php echo $__env->make('csvImport.modal', ['model' => 'Purchase'], \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        
    </p>
    <?php endif; ?>

    <p>
        <ul class="list-inline">
            <li><a href="<?php echo e(route('admin.purchases.index')); ?>" style="<?php echo e(request('show_deleted') == 1 ? '' : 'font-weight: 700'); ?>"><?php echo e(app('translator')->getFromJson('global.app_all')); ?></a></li> |
            <li><a href="<?php echo e(route('admin.purchases.index')); ?>?show_deleted=1" style="<?php echo e(request('show_deleted') == 1 ? 'font-weight: 700' : ''); ?>"><?php echo e(app('translator')->getFromJson('global.app_trash')); ?></a></li>
        </ul>
    </p>
    

    <div class="panel panel-default">
        <div class="panel-heading">
            <?php echo e(app('translator')->getFromJson('global.app_list')); ?>
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped <?php echo e(count($purchases) > 0 ? 'datatable' : ''); ?> <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('purchase_delete')): ?> <?php if( request('show_deleted') != 1 ): ?> dt-select <?php endif; ?> <?php endif; ?>">
                <thead>
                    <tr>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('purchase_delete')): ?>
                            <?php if( request('show_deleted') != 1 ): ?><th style="text-align:center;"><input type="checkbox" id="select-all" /></th><?php endif; ?>
                        <?php endif; ?>

                        <th><?php echo e(app('translator')->getFromJson('global.purchases.fields.file-number')); ?></th>
                        <th><?php echo e(app('translator')->getFromJson('global.purchases.fields.client')); ?></th>
                        <th><?php echo e(app('translator')->getFromJson('global.purchases.fields.property')); ?></th>
                        <th><?php echo e(app('translator')->getFromJson('global.purchases.fields.city-town-village')); ?></th>
                        <th><?php echo e(app('translator')->getFromJson('global.purchases.fields.county')); ?></th>
                        <th><?php echo e(app('translator')->getFromJson('global.purchases.fields.seller')); ?></th>
                        <th><?php echo e(app('translator')->getFromJson('global.purchases.fields.agent')); ?></th>
                        <th><?php echo e(app('translator')->getFromJson('global.purchases.fields.seller-attorney')); ?></th>
                        <th><?php echo e(app('translator')->getFromJson('global.purchases.fields.bank-attorney')); ?></th>
                        <th><?php echo e(app('translator')->getFromJson('global.purchases.fields.rep-agmt')); ?></th>
                        <th><?php echo e(app('translator')->getFromJson('global.purchases.fields.approval-letter')); ?></th>
                        <th><?php echo e(app('translator')->getFromJson('global.purchases.fields.seller-approval-letter')); ?></th>
                        <th><?php echo e(app('translator')->getFromJson('global.purchases.fields.search-update-received')); ?></th>
                        <th><?php echo e(app('translator')->getFromJson('global.purchases.fields.survey-update-received')); ?></th>
                        <th><?php echo e(app('translator')->getFromJson('global.purchases.fields.tax-receipts')); ?></th>
                        <th><?php echo e(app('translator')->getFromJson('global.purchases.fields.sewer-water-compliance')); ?></th>
                        <th><?php echo e(app('translator')->getFromJson('global.purchases.fields.pina')); ?></th>
                        <th><?php echo e(app('translator')->getFromJson('global.purchases.fields.proposed-deed-received')); ?></th>
                        <th><?php echo e(app('translator')->getFromJson('global.purchases.fields.mortgage-commitment')); ?></th>
                        <th><?php echo e(app('translator')->getFromJson('global.purchases.fields.mc-rate-lock-expiration')); ?></th>
                        <th><?php echo e(app('translator')->getFromJson('global.purchases.fields.mortgage-commitment-sent-seller')); ?></th>
                        <th><?php echo e(app('translator')->getFromJson('global.purchases.fields.survey-taxes-deed')); ?></th>
                        <th><?php echo e(app('translator')->getFromJson('global.purchases.fields.ordered-title-insurance')); ?></th>
                        <th><?php echo e(app('translator')->getFromJson('global.purchases.fields.title-report-to-seller')); ?></th>
                        <th><?php echo e(app('translator')->getFromJson('global.purchases.fields.title-report-to-bank')); ?></th>
                        <th><?php echo e(app('translator')->getFromJson('global.purchases.fields.hoi-binder')); ?></th>
                        <th><?php echo e(app('translator')->getFromJson('global.purchases.fields.hoi-binder-receipt')); ?></th>
                        <th><?php echo e(app('translator')->getFromJson('global.purchases.fields.closing-statement-received')); ?></th>
                        <th><?php echo e(app('translator')->getFromJson('global.purchases.fields.closing-statement-to-bank')); ?></th>
                        <th><?php echo e(app('translator')->getFromJson('global.purchases.fields.closing')); ?></th>
                        <th><?php echo e(app('translator')->getFromJson('global.purchases.fields.notes')); ?></th>
                        <th><?php echo e(app('translator')->getFromJson('global.purchases.fields.internal-notes')); ?></th>
                        <th><?php echo e(app('translator')->getFromJson('global.purchases.fields.rates')); ?></th>
                        <th><?php echo e(app('translator')->getFromJson('global.purchases.fields.assigned-to')); ?></th>
                        <th><?php echo e(app('translator')->getFromJson('global.purchases.fields.created-by')); ?></th>
                        <th><?php echo e(app('translator')->getFromJson('global.purchases.fields.created-by-team')); ?></th>
                        <?php if( request('show_deleted') == 1 ): ?>
                        <th>&nbsp;</th>
                        <?php else: ?>
                        <th>&nbsp;</th>
                        <?php endif; ?>
                    </tr>
                </thead>
                
                <tbody>
                    <?php if(count($purchases) > 0): ?>
                        <?php $__currentLoopData = $purchases; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $purchase): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr data-entry-id="<?php echo e($purchase->id); ?>">
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('purchase_delete')): ?>
                                    <?php if( request('show_deleted') != 1 ): ?><td></td><?php endif; ?>
                                <?php endif; ?>

                                <td field-key='file_number'><?php echo e($purchase->file_number); ?></td>
                                <td field-key='client'><?php echo e($purchase->client); ?></td>
                                <td field-key='property'><?php echo e($purchase->property); ?></td>
                                <td field-key='city_town_village'><?php echo e($purchase->city_town_village); ?></td>
                                <td field-key='county'><?php echo e($purchase->county); ?></td>
                                <td field-key='seller'><?php echo e($purchase->seller); ?></td>
                                <td field-key='agent'><?php echo e($purchase->agent); ?></td>
                                <td field-key='seller_attorney'><?php echo e($purchase->seller_attorney); ?></td>
                                <td field-key='bank_attorney'><?php echo e($purchase->bank_attorney); ?></td>
                                <td field-key='rep_agmt'><?php echo e($purchase->rep_agmt); ?></td>
                                <td field-key='approval_letter'><?php echo e($purchase->approval_letter); ?></td>
                                <td field-key='seller_approval_letter'><?php echo e($purchase->seller_approval_letter); ?></td>
                                <td field-key='search_update_received'><?php echo e($purchase->search_update_received); ?></td>
                                <td field-key='survey_update_received'><?php echo e($purchase->survey_update_received); ?></td>
                                <td field-key='tax_receipts'><?php echo e($purchase->tax_receipts); ?></td>
                                <td field-key='sewer_water_compliance'><?php echo e($purchase->sewer_water_compliance); ?></td>
                                <td field-key='pina'><?php echo e($purchase->pina); ?></td>
                                <td field-key='proposed_deed_received'><?php echo e($purchase->proposed_deed_received); ?></td>
                                <td field-key='mortgage_commitment'><?php echo e($purchase->mortgage_commitment); ?></td>
                                <td field-key='mc_rate_lock_expiration'><?php echo e($purchase->mc_rate_lock_expiration); ?></td>
                                <td field-key='mortgage_commitment_sent_seller'><?php echo e($purchase->mortgage_commitment_sent_seller); ?></td>
                                <td field-key='survey_taxes_deed'><?php echo e($purchase->survey_taxes_deed); ?></td>
                                <td field-key='ordered_title_insurance'><?php echo e($purchase->ordered_title_insurance); ?></td>
                                <td field-key='title_report_to_seller'><?php echo e($purchase->title_report_to_seller); ?></td>
                                <td field-key='title_report_to_bank'><?php echo e($purchase->title_report_to_bank); ?></td>
                                <td field-key='hoi_binder'><?php echo e($purchase->hoi_binder); ?></td>
                                <td field-key='hoi_binder_receipt'><?php echo e($purchase->hoi_binder_receipt); ?></td>
                                <td field-key='closing_statement_received'><?php echo e($purchase->closing_statement_received); ?></td>
                                <td field-key='closing_statement_to_bank'><?php echo e($purchase->closing_statement_to_bank); ?></td>
                                <td field-key='closing'><?php echo e($purchase->closing); ?></td>
                                <td field-key='notes'><?php echo $purchase->notes; ?></td>
                                <td field-key='internal_notes'><?php echo $purchase->internal_notes; ?></td>
                                <td field-key='rates'><?php echo e($purchase->rates); ?></td>
                                <td field-key='assigned_to'><?php echo e($purchase->assigned_to->name ?? ''); ?></td>
                                <td field-key='created_by'><?php echo e($purchase->created_by->name ?? ''); ?></td>
                                <td field-key='created_by_team'><?php echo e($purchase->created_by_team->name ?? ''); ?></td>
                                <?php if( request('show_deleted') == 1 ): ?>
                                <td>
                                    <?php echo Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.purchases.restore', $purchase->id])); ?>

                                    <?php echo Form::submit(trans('global.app_restore'), array('class' => 'btn btn-xs btn-success')); ?>

                                    <?php echo Form::close(); ?>

                                                                    <?php echo Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.purchases.perma_del', $purchase->id])); ?>

                                    <?php echo Form::submit(trans('global.app_permadel'), array('class' => 'btn btn-xs btn-danger')); ?>

                                    <?php echo Form::close(); ?>

                                                                </td>
                                <?php else: ?>
                                <td>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('purchase_view')): ?>
                                    <a href="<?php echo e(route('admin.purchases.show',[$purchase->id])); ?>" class="btn btn-xs btn-primary"><?php echo e(app('translator')->getFromJson('global.app_view')); ?></a>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('purchase_edit')): ?>
                                    <a href="<?php echo e(route('admin.purchases.edit',[$purchase->id])); ?>" class="btn btn-xs btn-info"><?php echo e(app('translator')->getFromJson('global.app_edit')); ?></a>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('purchase_delete')): ?>
<?php echo Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.purchases.destroy', $purchase->id])); ?>

                                    <?php echo Form::submit(trans('global.app_delete'), array('class' => 'btn btn-xs btn-danger')); ?>

                                    <?php echo Form::close(); ?>

                                    <?php endif; ?>
                                </td>
                                <?php endif; ?>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="41"><?php echo e(app('translator')->getFromJson('global.app_no_entries_in_table')); ?></td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?> 
    <script>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('purchase_delete')): ?>
            <?php if( request('show_deleted') != 1 ): ?> window.route_mass_crud_entries_destroy = '<?php echo e(route('admin.purchases.mass_destroy')); ?>'; <?php endif; ?>
        <?php endif; ?>

    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>