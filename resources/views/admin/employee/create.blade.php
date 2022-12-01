@extends('layouts.acme.admin.app')

@section('title')
@lang('employee.employee')
@endsection
@section('content')
<div class="app-content content">
    @include ('layouts.acme.admin._card_header', ['routeGroup' => 'admin', 'viewName' => 'employee', 'type' => 'create'])
    <div class="content-body">
        <!-- Form Section -->
        <section class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-header-jinja">
                        <h3 class="card-title text-bold">@lang('general.create')</h3>
                    </div>
                    <div class="card-content collpase show">
                        <div class="card-body">
                            {!! Form::open(['url' => route('admin.employee.store'), 'class' => 'form-horizontal', 'files' => true]) !!}

                                @include ('admin.employee.form', ['formMode' => 'create'])

                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--/ Form Sections -->
    </div>
</div>
@endsection

@push('scripts')

@endpush
