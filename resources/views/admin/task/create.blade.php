@extends('layouts.acme.admin.app')

@section('title')
    @lang('task.task')
@endsection

@push('styles')

@endpush

@section('content')
    <div class="app-content content">
            @include ('layouts.acme.admin._card_header', ['routeGroup' => str_replace('/', '', 'admin/'), 'viewName' => 'task', 'type' => 'create'])
            <div class="content-body">
                <!-- Form Section -->
                <section id="horizontal-form-layouts">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">@lang('general.create')</h4>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>

                                </div>
                                <div class="card-content show">
                                    <div class="card-body">
                                        <form method="POST" class="form form-horizontal" action="{{route(str_replace('/', '', 'admin/') . '.'.'task.store')}}"  enctype="multipart/form-data">
                                        @csrf

                                        @include ('admin.task.form', ['formMode' => 'create'])

                                        </form>
                                    </div>
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

