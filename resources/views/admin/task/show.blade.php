@extends('layouts.acme.admin.app')

@section('title')
    @lang('task.task')
@endsection

@push('styles')
    <style>
        .select2-container{
            width: 100%!important;
        }
    </style>
@endpush

@section('content')
    <div class="app-content content">
      @include ('layouts.acme.admin._card_header', ['routeGroup' => str_replace('/', '', 'admin/'), 'viewName' => 'task', 'type' => 'show'])

        <div class="content-body">
            <!-- datatable -->
            <section id="column-filtering">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">@lang('general.show')</h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                            </div>
                            <div class="card-content show">
                                <div class="card-body card-dashboard">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <th>ID</th><td>{{ $task->id }}</td>
                                                </tr>
                                                <tr><th> {{ trans('task.name') }} @lang('general.'.'ar') </th><td> {{ $task->getTranslation('name','ar') }} </td></tr><tr><th> {{ trans('task.name') }} @lang('general.'.'en') </th><td> {{ $task->getTranslation('name','en') }} </td></tr><tr><th> {{ trans('task.is_submitted') }} </th><td> {{ $task->is_submitted }} </td></tr><tr><th> {{ trans('task.employee_id') }} </th><td> {{ $task->employee_id }} </td></tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--/ datatable -->
        </div>
    </div>
@endsection

@push('scripts')

@endpush
