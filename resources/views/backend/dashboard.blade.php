@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('strings.backend.dashboard.title'))

@section('content')
    {{--<div class="row">--}}
        {{--<div class="col">--}}
            {{--<div class="card">--}}
                {{--<div class="card-header">--}}
                    {{--<strong>{{ __('strings.backend.dashboard.welcome') }} {{ $logged_in_user->name }}!</strong>--}}
                {{--</div><!--card-header-->--}}
                {{--<div class="card-block">--}}
                    {{--{!! __('strings.backend.welcome') !!}--}}
                {{--</div><!--card-block-->--}}
            {{--</div><!--card-->--}}

        {{--</div><!--col-->--}}
    {{--</div><!--row-->--}}

    <div class="card-group mb-4">
        <div class="card">
            <div class="card-body">
                <div class="h1 text-muted text-right mb-4">
                    <i class="icon-notebook"></i>
                </div>
                <div class="text-value">{{ $projectsTotal }}</div>
                <small class="text-muted text-uppercase font-weight-bold">Total Projects</small>
                <div class="progress progress-xs mt-3 mb-0">
                    <div class="progress-bar bg-info" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="h1 text-muted text-right mb-4">
                    <i class="icon-notebook"></i>
                </div>
                <div class="text-value">{{ $internshipsTotal }}</div>
                <small class="text-muted text-uppercase font-weight-bold">Total Internships</small>
                <div class="progress progress-xs mt-3 mb-0">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="h1 text-muted text-right mb-4">
                    <i class="icon-user"></i>
                </div>
                <div class="text-value">{{ $activeUsersTotal }}</div>
                <small class="text-muted text-uppercase font-weight-bold">Active Users</small>
                <div class="progress progress-xs mt-3 mb-0">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
        {{--<div class="card">--}}
            {{--<div class="card-body">--}}
                {{--<div class="h1 text-muted text-right mb-4">--}}
                    {{--<i class="icon-pie-chart"></i>--}}
                {{--</div>--}}
                {{--<div class="text-value">28%</div>--}}
                {{--<small class="text-muted text-uppercase font-weight-bold">Returning Visitors</small>--}}
                {{--<div class="progress progress-xs mt-3 mb-0">--}}
                    {{--<div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <strong>{{ __('strings.backend.dashboard.new_user_accounts') }}</strong>
                </div><!--card-header-->
                <div class="card-body">
                    <table class="table table-responsive-sm table-striped">
                        <thead>
                            <tr>
                                <th>Username</th>
                                <th>Date registered</th>
                                <th>Role</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Yiorgos Avraamu</td>
                                <td>2012/01/01</td>
                                <td>Member</td>
                                <td>
                                    <span class="badge badge-success">Active</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Avram Tarasios</td>
                                <td>2012/02/01</td>
                                <td>Staff</td>
                                <td>
                                    <span class="badge badge-danger">Banned</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Quintin Ed</td>
                                <td>2012/02/01</td>
                                <td>Admin</td>
                                <td>
                                    <span class="badge badge-secondary">Inactive</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Enéas Kwadwo</td>
                                <td>2012/03/01</td>
                                <td>Member</td>
                                <td>
                                    <span class="badge badge-warning">Pending</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Agapetus Tadeáš</td>
                                <td>2012/01/21</td>
                                <td>Staff</td>
                                <td>
                                    <span class="badge badge-success">Active</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link" href="#">Prev</a>
                        </li>
                        <li class="page-item active">
                            <a class="page-link" href="#">1</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">2</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">3</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">4</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">Next</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /.col-->

        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <strong>{{ __('strings.backend.dashboard.projects_under_review') }}</strong>
                </div><!--card-header-->
                <div class="card-body">
                    <table class="table table-responsive-sm table-striped">
                        <thead>
                            <tr>
                                <th>Username</th>
                                <th>Date registered</th>
                                <th>Role</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Yiorgos Avraamu</td>
                                <td>2012/01/01</td>
                                <td>Member</td>
                                <td>
                                    <span class="badge badge-success">Active</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Avram Tarasios</td>
                                <td>2012/02/01</td>
                                <td>Staff</td>
                                <td>
                                    <span class="badge badge-danger">Banned</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Quintin Ed</td>
                                <td>2012/02/01</td>
                                <td>Admin</td>
                                <td>
                                    <span class="badge badge-secondary">Inactive</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Enéas Kwadwo</td>
                                <td>2012/03/01</td>
                                <td>Member</td>
                                <td>
                                    <span class="badge badge-warning">Pending</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Agapetus Tadeáš</td>
                                <td>2012/01/21</td>
                                <td>Staff</td>
                                <td>
                                    <span class="badge badge-success">Active</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link" href="#">Prev</a>
                        </li>
                        <li class="page-item active">
                            <a class="page-link" href="#">1</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">2</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">3</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">4</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">Next</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /.col-->
    </div>
    <!-- /.row-->

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <strong>{{ __('strings.backend.dashboard.all_active_project_members') }}</strong>
                </div><!--card-header-->
                <div class="card-body">
                    <table class="table table-responsive-sm table-bordered table-striped table-sm">
                        <thead>
                            <tr>
                                <th>Username</th>
                                <th>Date registered</th>
                                <th>Role</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Vishnu Serghei</td>
                                <td>2012/01/01</td>
                                <td>Member</td>
                                <td>
                                    <span class="badge badge-success">Active</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Zbyněk Phoibos</td>
                                <td>2012/02/01</td>
                                <td>Staff</td>
                                <td>
                                    <span class="badge badge-danger">Banned</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Einar Randall</td>
                                <td>2012/02/01</td>
                                <td>Admin</td>
                                <td>
                                    <span class="badge badge-secondary">Inactive</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Félix Troels</td>
                                <td>2012/03/01</td>
                                <td>Member</td>
                                <td>
                                    <span class="badge badge-warning">Pending</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Aulus Agmundr</td>
                                <td>2012/01/21</td>
                                <td>Staff</td>
                                <td>
                                    <span class="badge badge-success">Active</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <nav>
                        <ul class="pagination">
                            <li class="page-item">
                                <a class="page-link" href="#">Prev</a>
                            </li>
                            <li class="page-item active">
                                <a class="page-link" href="#">1</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">2</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">3</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">4</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- /.col-->
    </div>
    <!-- /.row-->
@endsection
