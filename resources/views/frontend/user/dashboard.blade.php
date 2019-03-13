@extends('frontend.layouts.coreui')

@section('title', app_name() . ' | ' . __('strings.backend.dashboard.title'))

@section('content')
    <div class="card-group mb-4">
        <div class="card">
            <div class="card-body">
                <div class="h1 text-muted text-right mb-4">
                    <i class="icon-notebook"></i>
                </div>
                <div class="text-value">10</div>
                <small class="text-muted text-uppercase font-weight-bold">Active Projects</small>
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
                <div class="text-value">20</div>
                <small class="text-muted text-uppercase font-weight-bold">Completed Projects</small>
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
                <div class="text-value">30</div>
                <small class="text-muted text-uppercase font-weight-bold">Active Internships</small>
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
                <div class="text-value">200</div>
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
                        @foreach($followedProjects as $project)
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

@endsection
