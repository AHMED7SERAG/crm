<div class="form-body">
@foreach($languages as $language)
    <div class="form-group{{ $errors->has('name') ? 'has-error' : ''}}">
        {!! Form::label('name'.'_'.$language->code, trans('task.name') .' '. __('general.'.$language->code), ['class' => 'control-label']) !!}
        {!! Form::text("name"."_"."$language->code", $task->getTranslation('name', $language->code), ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}

        {!! $errors->first('name'.'_'.$language->code, '<p class="text-danger help-block">:message</p>') !!}
    </div>
@endforeach
<div class="form-group{{ $errors->has('is_submitted') ? 'has-error' : ''}}">
    {!! Form::label('is_submitted', trans('task.is_submitted'), ['class' => 'control-label']) !!}
    <div class="checkbox">
    <label><input @if($task->is_submitted == 1) checked="checked" @endif name="is_submitted" type="radio" value="{{$task->is_submitted}}"> Yes</label>
</div>
<div class="checkbox">
    <label><input @if($task->is_submitted == 0) checked="checked" @endif name="is_submitted" type="radio" value="{{$task->is_submitted}}"> No</label>
</div>

    {!! $errors->first('is_submitted', '<p class="text-danger help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('employee_id') ? 'has-error' : ''}}">
    {!! Form::label('employee_id', trans('task.employee_id'), ['class' => 'control-label']) !!}
    {!! Form::select('employee_id', json_decode('', true), $task->employee_id, ('required' == 'required') ? ['class' => 'form-control select2', 'required' => 'required'] : ['class' => 'form-control select2']) !!}

    {!! $errors->first('employee_id', '<p class="text-danger help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('project_id') ? 'has-error' : ''}}">
    {!! Form::label('project_id', trans('task.project_id'), ['class' => 'control-label']) !!}
    {!! Form::select('project_id', json_decode('', true), $task->project_id, ('required' == 'required') ? ['class' => 'form-control select2', 'required' => 'required'] : ['class' => 'form-control select2']) !!}

    {!! $errors->first('project_id', '<p class="text-danger help-block">:message</p>') !!}
</div>

</div>
<div class="form-actions text-right">
    <button type="submit" class="btn btn-success">
        <i class="la la-check-square-o"></i> @lang('general.save')
    </button>
</div>
