@extends('layouts.acme.admin.app')

@section('title')
    @lang('project.project')
@endsection
@push('styles')
    <style>
        .select2-container{
            width: 100%!important;
        }
        .select2-container--classic .select2-selection--single, .select2-container--default .select2-selection--single {
            height: 52px!important;
            padding: 5px;
            width: auto;
            border-color: #717171!important;
        }
    </style>
@endpush
@section('content')
    <div class="app-content content">
            @include ('layouts.acme.admin._card_header', ['routeGroup' => str_replace('/', '', 'admin/'), 'viewName' => 'project', 'type' => 'index'])
        <div class="content-body">
            <!-- datatable -->
            <section id="column-filtering">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">@lang('general.all') @lang('project.project')</h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                            </div>
                            <div class="card-content show">
                                <div class="card-body card-dashboard">
                                    <div class="table">
                                    <table class="table table-striped table-bordered zero-configuration data-table w-100 ">
                                            <thead>
                                            <tr>
                                                <th dt-type="text" dt-name="name">{{ trans('project.name') }}</th>
                                                <th style="width: 25%;">@lang('general.action')</th>
                                            </tr>
                                            <tr id="searchable-row"></tr>
                                            </thead>
                                            <tbody>

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
    <script>
        var lang = '{{app()->getLocale()}}';
        var dataTablesSearchLink = '{{url('admin/project')}}';
        var dataTablesLanguageLink = '{{(app()->getLocale() == 'ar')? asset('datatables/lang/ar.json') : ''}}';
    </script>
@endpush
