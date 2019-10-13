@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('strings.backend.dashboard.title'))

@push('after-scripts')
    <script>
        $('.datatable').attr('style', 'border-collapse: collapse !important');

        $('.datatable-newproject').DataTable({
            "order": [[ 2, "asc" ]],
            "lengthMenu": [[10, 25, -1], [10, 25, "All"]]
        });

        $('.datatable-user').DataTable({
            "order": [[ 2, "asc" ]],
            "lengthMenu": [[10, 25, -1], [10, 25, "All"]]
        });
    </script>
@endpush

@section('content')
    <div class="card-group mb-4">
        <div class="card">
            <div class="card-body">
                <div class="h1 text-muted text-right mb-4">
                    <i class="icon-notebook"></i>
                </div>
                <div class="text-value">{{ $activeProjectsCount }}</div>
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
                <div class="text-value">{{ $completedProjectsCount }}</div>
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
                <div class="text-value">{{ $activeInternshipsCount }}</div>
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
                <div class="text-value">{{ $activeUsersCount }}</div>
                <small class="text-muted text-uppercase font-weight-bold">Active Users</small>
                <div class="progress progress-xs mt-3 mb-0">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>

    @if (count($newUsersToReview))
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <strong>@lang('strings.backend.dashboard.new_user_accounts')</strong>
                </div><!--card-header-->
                <div class="card-body">
                    <table class="table table-responsive-sm table-striped datatable datatable-newuser">
                        <thead>
                            <tr>
                                <th>Username</th>
                                <th>Date registered</th>
                                <th>Type</th>
                                <th>Asurite</th>
                                <th>@lang('labels.general.actions')</th>
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
                                <td>{!! $user->review_action_buttons !!}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /.col-->
    </div>
    <!-- /.row-->
    @endif

    @if (count($projectsUnderReview))
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <strong>@lang('strings.backend.dashboard.projects_under_review')</strong>
                </div><!--card-header-->
                <div class="card-body">
                    <table class="table table-responsive-sm table-striped datatable datatable-newproject">
                        <thead>
                        <tr>
                            <th>Project</th>
                            <th>Coordinator</th>
                            <th>Submitted</th>
                            <th>Updated Last</th>
                            <th>@lang('labels.general.actions')</th>
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
                </div>
            </div>
        </div>
        <!-- /.col-->
    </div>
    <!-- /.row-->
    @endif

@endsection
