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
                                <th>Type</th>
                                <th>Status</th>
                                <th>{{ __('labels.general.actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($newUsersToReview as $user)
                            <tr>
                                <td>{{ $user->full_name }}</td>
                                <td>{{ $user->created_at }}</td>
                                <td>{{ $user->userType->name }}</td>
                                <td>
                                    @if($user->asurite)
                                        <span class="badge badge-pill badge-success">Yes</span>
                                    @else
                                        <span class="badge badge-pill badge-secondary">No</span>
                                    @endif
                                </td>
                                <td>{!! $user->action_buttons !!}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <ul class="pagination">
                        <li class="page-item disabled">
                            <a class="page-link" href="#">Prev</a>
                        </li>
                        <li class="page-item active">
                            <a class="page-link" href="#">1</a>
                        </li>
                        <li class="page-item disabled">
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
                    <strong>{{ __('strings.backend.dashboard.projects_under_review') }}</strong>
                </div><!--card-header-->
                <div class="card-body">
                    <table class="table table-responsive-sm table-striped">
                        <thead>
                        <tr>
                            <th>Project</th>
                            <th>Coordinator</th>
                            <th>Submitted</th>
                            <th>Updated Last</th>
                            <th>{{ __('labels.general.actions') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($projectsUnderReview as $project)
                            <tr>
                                <td>{!! $project->name !!}</td>
                                <td>{!! $project->supervisorUser->full_name ?? null !!}</td>
                                <td>{!! $project->created_at !!}</td>
                                <td>{!! $project->updated_at !!}</td>
                                <td>{!! $project->action_buttons !!}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <ul class="pagination">
                        <li class="page-item disabled">
                            <a class="page-link" href="#">Prev</a>
                        </li>
                        <li class="page-item active">
                            <a class="page-link" href="#">1</a>
                        </li>
                        <li class="page-item disabled">
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
                                <th>User</th>
                                <th>Role</th>
                                <th>Project</th>
                                <th>Project Status</th>
                                <th>{{ __('labels.general.actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($activeProjectMembers as $member)
                            @foreach($member->participatingInProjects as $project)
                            <tr>
                                <td>{{ $member->full_name }}</td>
                                <td>&nbsp;</td>
                                <td>{{ $project->name }}</td>
                                <td>{{-- $project->status->name --}}</td>
                                <td>{!! $project->action_buttons !!}</td>
                            </tr>
                            @endforeach
                        @endforeach
                        </tbody>
                    </table>
                    <nav>
                        <ul class="pagination">
                            <li class="page-item disabled">
                                <a class="page-link" href="#">Prev</a>
                            </li>
                            <li class="page-item active">
                                <a class="page-link" href="#">1</a>
                            </li>
                            <li class="page-item disabled">
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
