<div class="form-body">
@foreach($languages as $language)
    <div class="form-group{{ $errors->has('name') ? 'has-error' : ''}}">
        {!! Form::label('name'.'_'.$language->code, trans('project.name') .' '. __('general.'.$language->code), ['class' => 'control-label']) !!}
        {!! Form::text("name"."_"."$language->code", $project->getTranslation('name', $language->code), ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}

        {!! $errors->first('name'.'_'.$language->code, '<p class="text-danger help-block">:message</p>') !!}
    </div>
@endforeach

</div>
<div class="form-actions text-right">
    <button type="submit" class="btn btn-success">
        <i class="la la-check-square-o"></i> @lang('general.save')
    </button>
</div>
