@extends('frontend.layouts.coreui')

@section('title', app_name() . ' | ' . __('strings.backend.dashboard.title'))

@section('content')
    <h3>Projects</h3>
    {{-- User's Submitted Projects --}}
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-accent-info">
                <div class="card-header">
                    <strong>Your Recent Project Submissions</strong>
                </div><!--card-header-->
                <div class="card-body">
                    <table class="table table-responsive-sm table-striped">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Submitted</th>
                            <th>Updated Last</th>
                            <th>{{ __('labels.general.actions') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($followedProjects as $project)
                            <tr>
                                <td>{!! $project->name !!}</td>
                                <td>{!! $project->status->name ?? '' !!}</td>
                                <td>{!! $project->created_at !!}</td>
                                <td>{!! $project->updated_at !!}</td>
                                <td>{!! $project->frontend_action_buttons !!}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{-- <ul class="pagination">
                        <li class="page-item disabled">
                            <a class="page-link" href="#">Prev</a>
                        </li>
                        <li class="page-item active">
                            <a class="page-link" href="#">1</a>
                        </li>
                        <li class="page-item disabled">
                            <a class="page-link" href="#">Next</a>
                        </li>
                    </ul> --}}
                </div>
            </div>
        </div><!-- /.col-->
    </div><!-- /.row-->

    {{-- Projects that User is member of --}}
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-accent-info">
                <div class="card-header">
                    <strong>Your Active Projects</strong>
                </div><!--card-header-->
                <div class="card-body">
                    <table class="table table-responsive-sm table-striped">
                        <thead>
                        <tr>
                            <th>Project</th>
                            <th>Your Role</th>
                            <th>Project Status</th>
                            <th>Start Date</th>
                            <th>{{ __('labels.general.actions') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($followedProjects as $project)
                            <tr>
                                <td>{!! $project->name !!}</td>
                                <td>{!! $project->supervisorUser->full_name ?? null !!}</td>
                                <td>{!! $project->status->name !!}</td>
                                <td>{!! $project->opportunity_start_at !!}</td>
                                <td>{!! $project->frontend_action_buttons !!}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{-- <ul class="pagination">
                        <li class="page-item disabled">
                            <a class="page-link" href="#">Prev</a>
                        </li>
                        <li class="page-item active">
                            <a class="page-link" href="#">1</a>
                        </li>
                        <li class="page-item disabled">
                            <a class="page-link" href="#">Next</a>
                        </li>
                    </ul> --}}
                </div>
            </div>
        </div><!-- /.col-->
    </div><!-- /.row-->

    <h3>Internships</h3>
    {{-- User's Submitted Internships --}}
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-accent-warning">
                <div class="card-header">
                    <strong>Your Recent Internship Submissions</strong>
                </div><!--card-header-->
                <div class="card-body">
                    <table class="table table-responsive-sm table-striped">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Submitted</th>
                            <th>Updated Last</th>
                            <th>{{ __('labels.general.actions') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($followedProjects as $project)
                            <tr>
                                <td>{!! $project->name !!}</td>
                                <td>{!! $project->status->name ?? '' !!}</td>
                                <td>{!! $project->created_at !!}</td>
                                <td>{!! $project->updated_at !!}</td>
                                <td>{!! $project->frontend_action_buttons !!}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{-- <ul class="pagination">
                        <li class="page-item disabled">
                            <a class="page-link" href="#">Prev</a>
                        </li>
                        <li class="page-item active">
                            <a class="page-link" href="#">1</a>
                        </li>
                        <li class="page-item disabled">
                            <a class="page-link" href="#">Next</a>
                        </li>
                    </ul> --}}
                </div>
            </div>
        </div><!-- /.col-->
    </div><!-- /.row-->

    {{-- Internships that User is member of --}}
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-accent-warning">
                <div class="card-header">
                    <strong>Your Active Internships</strong>
                </div><!--card-header-->
                <div class="card-body">
                    <table class="table table-responsive-sm table-striped">
                        <thead>
                        <tr>
                            <th>Project</th>
                            <th>Your Role</th>
                            <th>Project Status</th>
                            <th>Start Date</th>
                            <th>{{ __('labels.general.actions') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($followedProjects as $project)
                            <tr>
                                <td>{!! $project->name !!}</td>
                                <td>{!! $project->supervisorUser->full_name ?? null !!}</td>
                                <td>{!! $project->status->name !!}</td>
                                <td>{!! $project->opportunity_start_at !!}</td>
                                <td>{!! $project->frontend_action_buttons !!}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{-- <ul class="pagination">
                        <li class="page-item disabled">
                            <a class="page-link" href="#">Prev</a>
                        </li>
                        <li class="page-item active">
                            <a class="page-link" href="#">1</a>
                        </li>
                        <li class="page-item disabled">
                            <a class="page-link" href="#">Next</a>
                        </li>
                    </ul> --}}
                </div>
            </div>
        </div><!-- /.col-->
    </div><!-- /.row-->

@endsection
