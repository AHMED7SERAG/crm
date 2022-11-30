@extends('layouts.acme.admin.app')

@section('title')
    @lang('activity logs.activity logs')
@endsection

@section('content')
    <div class="app-content content">
        @include ('layouts.acme.admin._card_header', ['routeGroup' => 'admin', 'viewName' => 'activitylogs', 'type' => 'index'])
        <div class="content-body">
            <!-- datatable -->
            <section class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">@lang('general.all') @lang('activity logs.activity logs')</h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body card-dashboard">
                                <div class="table  ">
                                    <table class="table table-striped table-bordered zero-configuration data-table w-100">
                                        <thead>
                                        <tr>
                                            <th class="align-middle ">{{ trans('activity logs.activity') }}</th>
                                            <th class="align-middle ">{{ trans('activity logs.actor') }}</th>
                                            <th class="align-middle ">{{ trans('activity logs.date') }}</th>
                                            <th class="align-middle " style="width: 25%;">@lang('general.action')</th>
                                        </tr>
                                        <tbody>
                                            @foreach($activitylogs as $item)
                                            <tr>
                                                <td class="align-middle ">
                                                    <input type="checkbox" id="record-{{$item->id}}" value="{{$item->id}}" class="record__select"/>
                                                    <label for="record-{{$item->id}}"></label>
                                                </td>
                                                <td class="align-middle ">{{ $item->description }}</td>
                                                <td class="align-middle ">
                                                    @if ($item->causer)
                                                        <a href="{{ url('/admin/users/' . $item->causer->id) }}">{{ $item->causer->name }}</a>
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                                <td class="align-middle ">{{ $item->created_at }}</td>
                                                <td class="align-middle ">
                                                    <a href="{{route('admin.activitylogs.show', $item->id)}}" class="btn btn-jinja btn-sm ml-1 mr-1"><i class="fa fa-eye"></i> </a>
                                                    <form action="{{route('admin.activitylogs.destroy', $item->id)}}" class="my-1 my-xl-0" method="post" style="display: inline-block;">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button type="submit" class="btn btn-jinja btn-sm delete"><i class="fa fa-trash"></i> </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
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
        $(function () {

            const dataTablesLanguageLink = '{{(app()->getLocale() == 'ar')? asset('admin-assets/datatable-lang/ar.json') : ''}}';
            $(".data-table").dataTable().fnDestroy();
            var table = $('.data-table').DataTable({
                dom: "fltipr",
                serverSide: false,
                processing: false,
                language: {
                    "url": dataTablesLanguageLink,
                },
                order: [],
            });//end datatable
        });
    </script>
@endpush
