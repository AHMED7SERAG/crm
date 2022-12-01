@push('styles')
    @if(app()->getLocale() == 'ar')
        <style>
            .form-group {
                float: right;
            }

            .flying-img {
                left: 0px;
                right: unset;
            }

            .input-overlay-btn {
                right: unset;
                left: 0;
            }
        </style>
    @endif
@endpush
<div class="form-body">

    <div class="form-group{{ $errors->has('name') ? ' has-error' : ''}}">
        {!! Form::label('name', __('employee.name'), ['class' => 'control-label']) !!}
        {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('name', '<p class="text-danger help-block">:message</p>') !!}
    </div>
    <div class="form-group{{ $errors->has('email') ? ' has-error' : ''}}">
        {!! Form::label('email', __('employee.email'), ['class' => 'control-label']) !!}
        {!! Form::email('email', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('email', '<p class="text-danger help-block">:message</p>') !!}
    </div>
    <div class="form-group{{ $errors->has('phone') ? ' has-error' : ''}}">
        {!! Form::label('phone', __('employee.phone'), ['class' => 'control-label']) !!}
        {!! Form::email('phone', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('phone', '<p class="text-danger help-block">:message</p>') !!}
    </div>

    <div class="form-group{{ $errors->has('password') ? ' has-error' : ''}}">
        {!! Form::label('password', __('employee.password'), ['class' => 'control-label']) !!}
        @php
            $passwordOptions = ['class' => 'form-control'];
            if ($formMode === 'create') {
                $passwordOptions = array_merge($passwordOptions, ['required' => 'required']);
            } else {
                $passwordOptions = array_merge($passwordOptions, ['disabled' => 'disabled', 'placeholder' => '********']);
                echo '<span id="password-change-btn" class="input-overlay-btn float-right mr-3 badge badge-dark">' . __('general.change') . '</span>';
            }
        @endphp
        {!! Form::password('password', $passwordOptions) !!}
        {!! $errors->first('password', '<p class="text-danger help-block">:message</p>') !!}
    </div>



    <div class="form-group{{ $errors->has('roles') ? ' has-error' : ''}}" id="roles-div">
        {!! Form::label('role', __('employee.role'), ['class' => 'control-label']) !!}
        {!! Form::select('roles[]', $roles, null, ['class' => 'form-control select-custom',
        'multiple' => true, 'id' => 'roles']) !!}
        {!! $errors->first('roles', '<p class="text-danger help-block">:message</p>') !!}
    </div>
</div>
<div class="form-actions text-right">
    <button type="submit" class="btn btn-success">
        <i class="la la-check-square-o"></i> @lang('general.save')
    </button>
</div>

@push('scripts')
    <script>
        triggerType();
        $(function () {
            $('#password-change-btn').on('click', function (e) {
                togglePassword();
            });
            $('#type').on('change', function (e) {
                triggerType();
            });
        });


        function togglePassword() {
            var isDisabled = $('#password').attr('disabled');
            if (isDisabled == 'disabled') {
                $('#password').removeAttr('disabled');
            } else {
                $('#password').attr('disabled', 'disabled');
            }
        }

    </script>
@endpush
