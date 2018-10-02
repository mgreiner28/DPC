<?php $request = app('Illuminate\Http\Request'); ?>


<?php $__env->startSection('content'); ?>
    <h3 class="page-title"><?php echo e(app('translator')->getFromJson('global.sales.title')); ?></h3>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('sale_create')): ?>
    <p>
        <a href="<?php echo e(route('admin.sales.create')); ?>" class="btn btn-success"><?php echo e(app('translator')->getFromJson('global.app_add_new')); ?></a>
        <a href="#" class="btn btn-warning" style="margin-left:5px;" data-toggle="modal" data-target="#myModal"><?php echo e(app('translator')->getFromJson('global.app_csvImport')); ?></a>
        <?php echo $__env->make('csvImport.modal', ['model' => 'Sale'], \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        
    </p>
    <?php endif; ?>

    <p>
        <ul class="list-inline">
            <li><a href="<?php echo e(route('admin.sales.index')); ?>" style="<?php echo e(request('show_deleted') == 1 ? '' : 'font-weight: 700'); ?>"><?php echo e(app('translator')->getFromJson('global.app_all')); ?></a></li> |
            <li><a href="<?php echo e(route('admin.sales.index')); ?>?show_deleted=1" style="<?php echo e(request('show_deleted') == 1 ? 'font-weight: 700' : ''); ?>"><?php echo e(app('translator')->getFromJson('global.app_trash')); ?></a></li>
        </ul>
    </p>
    

    <div class="panel panel-default">
        <div class="panel-heading">
            <?php echo e(app('translator')->getFromJson('global.app_list')); ?>
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped <?php echo e(count($sales) > 0 ? 'datatable' : ''); ?> <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('sale_delete')): ?> <?php if( request('show_deleted') != 1 ): ?> dt-select <?php endif; ?> <?php endif; ?>">
                <thead>
                    <tr>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('sale_delete')): ?>
                            <?php if( request('show_deleted') != 1 ): ?><th style="text-align:center;"><input type="checkbox" id="select-all" /></th><?php endif; ?>
                        <?php endif; ?>

                        <th><?php echo e(app('translator')->getFromJson('global.sales.fields.file-number')); ?></th>
                        <th><?php echo e(app('translator')->getFromJson('global.sales.fields.client')); ?></th>
                        <th><?php echo e(app('translator')->getFromJson('global.sales.fields.property')); ?></th>
                        <th><?php echo e(app('translator')->getFromJson('global.sales.fields.city-town-village')); ?></th>
                        <th><?php echo e(app('translator')->getFromJson('global.sales.fields.county')); ?></th>
                        <th><?php echo e(app('translator')->getFromJson('global.sales.fields.buyer')); ?></th>
                        <th><?php echo e(app('translator')->getFromJson('global.sales.fields.agent')); ?></th>
                        <th><?php echo e(app('translator')->getFromJson('global.sales.fields.buyer-attorney')); ?></th>
                        <th><?php echo e(app('translator')->getFromJson('global.sales.fields.rep-agmt')); ?></th>
                        <th><?php echo e(app('translator')->getFromJson('global.sales.fields.approval-letter')); ?></th>
                        <th><?php echo e(app('translator')->getFromJson('global.sales.fields.buyer-approval-letter')); ?></th>
                        <th><?php echo e(app('translator')->getFromJson('global.sales.fields.search-update')); ?></th>
                        <th><?php echo e(app('translator')->getFromJson('global.sales.fields.survey-update')); ?></th>
                        <th><?php echo e(app('translator')->getFromJson('global.sales.fields.tax-receipts')); ?></th>
                        <th><?php echo e(app('translator')->getFromJson('global.sales.fields.tax-certificate')); ?></th>
                        <th><?php echo e(app('translator')->getFromJson('global.sales.fields.sewer-water-compliance')); ?></th>
                        <th><?php echo e(app('translator')->getFromJson('global.sales.fields.proposed-deed')); ?></th>
                        <th><?php echo e(app('translator')->getFromJson('global.sales.fields.mortgage-commitment')); ?></th>
                        <th><?php echo e(app('translator')->getFromJson('global.sales.fields.seach-taxes-deed')); ?></th>
                        <th><?php echo e(app('translator')->getFromJson('global.sales.fields.mortgage-payoff-info')); ?></th>
                        <th><?php echo e(app('translator')->getFromJson('global.sales.fields.title-report-from-buyer')); ?></th>
                        <th><?php echo e(app('translator')->getFromJson('global.sales.fields.clsoing-docs-drafted')); ?></th>
                        <th><?php echo e(app('translator')->getFromJson('global.sales.fields.closing-statement')); ?></th>
                        <th><?php echo e(app('translator')->getFromJson('global.sales.fields.closing-statement-to-buyer')); ?></th>
                        <th><?php echo e(app('translator')->getFromJson('global.sales.fields.closing-date')); ?></th>
                        <th><?php echo e(app('translator')->getFromJson('global.sales.fields.notes')); ?></th>
                        <th><?php echo e(app('translator')->getFromJson('global.sales.fields.internal-notes')); ?></th>
                        <th><?php echo e(app('translator')->getFromJson('global.sales.fields.rates')); ?></th>
                        <th><?php echo e(app('translator')->getFromJson('global.sales.fields.assigned-to')); ?></th>
                        <th><?php echo e(app('translator')->getFromJson('global.sales.fields.created-by')); ?></th>
                        <th><?php echo e(app('translator')->getFromJson('global.sales.fields.created-by-team')); ?></th>
                        <?php if( request('show_deleted') == 1 ): ?>
                        <th>&nbsp;</th>
                        <?php else: ?>
                        <th>&nbsp;</th>
                        <?php endif; ?>
                    </tr>
                </thead>
                
                <tbody>
                    <?php if(count($sales) > 0): ?>
                        <?php $__currentLoopData = $sales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr data-entry-id="<?php echo e($sale->id); ?>">
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('sale_delete')): ?>
                                    <?php if( request('show_deleted') != 1 ): ?><td></td><?php endif; ?>
                                <?php endif; ?>

                                <td field-key='file_number'><?php echo e($sale->file_number); ?></td>
                                <td field-key='client'><?php echo e($sale->client); ?></td>
                                <td field-key='property'><?php echo e($sale->property); ?></td>
                                <td field-key='city_town_village'><?php echo e($sale->city_town_village); ?></td>
                                <td field-key='county'><?php echo e($sale->county); ?></td>
                                <td field-key='buyer'><?php echo e($sale->buyer); ?></td>
                                <td field-key='agent'><?php echo e($sale->agent); ?></td>
                                <td field-key='buyer_attorney'><?php echo e($sale->buyer_attorney); ?></td>
                                <td field-key='rep_agmt'><?php echo e($sale->rep_agmt); ?></td>
                                <td field-key='approval_letter'><?php echo e($sale->approval_letter); ?></td>
                                <td field-key='buyer_approval_letter'><?php echo e($sale->buyer_approval_letter); ?></td>
                                <td field-key='search_update'><?php echo e($sale->search_update); ?></td>
                                <td field-key='survey_update'><?php echo e($sale->survey_update); ?></td>
                                <td field-key='tax_receipts'><?php echo e($sale->tax_receipts); ?></td>
                                <td field-key='tax_certificate'><?php echo e($sale->tax_certificate); ?></td>
                                <td field-key='sewer_water_compliance'><?php echo e($sale->sewer_water_compliance); ?></td>
                                <td field-key='proposed_deed'><?php echo e($sale->proposed_deed); ?></td>
                                <td field-key='mortgage_commitment'><?php echo e($sale->mortgage_commitment); ?></td>
                                <td field-key='seach_taxes_deed'><?php echo e($sale->seach_taxes_deed); ?></td>
                                <td field-key='mortgage_payoff_info'><?php echo e($sale->mortgage_payoff_info); ?></td>
                                <td field-key='title_report_from_buyer'><?php echo e($sale->title_report_from_buyer); ?></td>
                                <td field-key='clsoing_docs_drafted'><?php echo e($sale->clsoing_docs_drafted); ?></td>
                                <td field-key='closing_statement'><?php echo e($sale->closing_statement); ?></td>
                                <td field-key='closing_statement_to_buyer'><?php echo e($sale->closing_statement_to_buyer); ?></td>
                                <td field-key='closing_date'><?php echo e($sale->closing_date); ?></td>
                                <td field-key='notes'><?php echo $sale->notes; ?></td>
                                <td field-key='internal_notes'><?php echo $sale->internal_notes; ?></td>
                                <td field-key='rates'><?php echo e($sale->rates); ?></td>
                                <td field-key='assigned_to'><?php echo e($sale->assigned_to->name ?? ''); ?></td>
                                <td field-key='created_by'><?php echo e($sale->created_by->name ?? ''); ?></td>
                                <td field-key='created_by_team'><?php echo e($sale->created_by_team->name ?? ''); ?></td>
                                <?php if( request('show_deleted') == 1 ): ?>
                                <td>
                                    <?php echo Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.sales.restore', $sale->id])); ?>

                                    <?php echo Form::submit(trans('global.app_restore'), array('class' => 'btn btn-xs btn-success')); ?>

                                    <?php echo Form::close(); ?>

                                                                    <?php echo Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.sales.perma_del', $sale->id])); ?>

                                    <?php echo Form::submit(trans('global.app_permadel'), array('class' => 'btn btn-xs btn-danger')); ?>

                                    <?php echo Form::close(); ?>

                                                                </td>
                                <?php else: ?>
                                <td>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('sale_view')): ?>
                                    <a href="<?php echo e(route('admin.sales.show',[$sale->id])); ?>" class="btn btn-xs btn-primary"><?php echo e(app('translator')->getFromJson('global.app_view')); ?></a>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('sale_edit')): ?>
                                    <a href="<?php echo e(route('admin.sales.edit',[$sale->id])); ?>" class="btn btn-xs btn-info"><?php echo e(app('translator')->getFromJson('global.app_edit')); ?></a>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('sale_delete')): ?>
<?php echo Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.sales.destroy', $sale->id])); ?>

                                    <?php echo Form::submit(trans('global.app_delete'), array('class' => 'btn btn-xs btn-danger')); ?>

                                    <?php echo Form::close(); ?>

                                    <?php endif; ?>
                                </td>
                                <?php endif; ?>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="36"><?php echo e(app('translator')->getFromJson('global.app_no_entries_in_table')); ?></td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?> 
    <script>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('sale_delete')): ?>
            <?php if( request('show_deleted') != 1 ): ?> window.route_mass_crud_entries_destroy = '<?php echo e(route('admin.sales.mass_destroy')); ?>'; <?php endif; ?>
        <?php endif; ?>

    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>