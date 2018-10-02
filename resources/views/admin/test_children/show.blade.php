@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.test-child.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('global.test-child.fields.field-one')</th>
                            <td field-key='field_one'>{{ $test_child->field_one }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.test-child.fields.field-two')</th>
                            <td field-key='field_two'>{{ $test_child->field_two }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.test-child.fields.created-by')</th>
                            <td field-key='created_by'>{{ $test_child->created_by->name ?? '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.test-child.fields.created-by-team')</th>
                            <td field-key='created_by_team'>{{ $test_child->created_by_team->name ?? '' }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.test_children.index') }}" class="btn btn-default">@lang('global.app_back_to_list')</a>
        </div>
    </div>
@stop


