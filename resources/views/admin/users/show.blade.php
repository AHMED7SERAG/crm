@extends('layouts.acme.admin.app')

@section('title')
    @lang('users.users')
@endsection


@section('content')
    <div class="app-content content">
        @include ('layouts.acme.admin._card_header', ['routeGroup' => 'admin', 'viewName' => 'users', 'type' => 'show'])
        <div class="content-body">
            <!-- datatable -->
            <section class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-header-jinja">
                            <h3 class="card-title text-bold">@lang('general.show')</h3>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body card-dashboard">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <tbody>
                                        <tr>
                                            <th> {{ trans('general.ID') }} </th>
                                            <td>

                                                {{ $user->id }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th> {{ trans('users.name') }} </th>
                                            <td>

                                                    {{ $user->name }}

                                            </td>
                                        </tr>
                                        <tr>
                                            <th> {{ trans('users.email') }} </th>
                                            <td>
                                                {{ $user->email }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th> {{ trans('users.role') }} </th>
                                            <td>
                                                @foreach($user->roles->pluck('label') as $role)

                                                  {{$role}}

                                                @endforeach
                                            </td>
                                        </tr>
                                         <tr>
                                            <th> {{ trans('users.actionToUser') }} </th>
                                            <td>
                                                {{ $user->actionToUser }}
                                            </td>
                                        </tr>
                                        <tr>
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

@endpush
