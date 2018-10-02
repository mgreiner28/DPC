@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.test-child.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.test_children.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('field_one', trans('global.test-child.fields.field-one').'', ['class' => 'control-label']) !!}
                    {!! Form::text('field_one', old('field_one'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('field_one'))
                        <p class="help-block">
                            {{ $errors->first('field_one') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('field_two', trans('global.test-child.fields.field-two').'', ['class' => 'control-label']) !!}
                    {!! Form::text('field_two', old('field_two'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('field_two'))
                        <p class="help-block">
                            {{ $errors->first('field_two') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('global.app_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

