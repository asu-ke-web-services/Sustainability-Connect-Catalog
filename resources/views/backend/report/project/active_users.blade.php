@extends ('backend.layouts.app')

@section ('title', app_name() . ' | Active Project Users ')

@section('breadcrumb-links')
    {{-- @include('backend.report.project.includes.breadcrumb-links') --}}
@endsection

@push('after-styles')
    <link href="/vendors/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
@endpush

@push('after-scripts')
    <script src="/vendors/datatables.net/js/jquery.dataTables.js"></script>
    <script src="/vendors/datatables.net-bs4/js/dataTables.bootstrap4.js"></script>
    <script>
        $('.datatable').DataTable({
            "order": [[ 4, "{{ $defaultSort }}" ]],
            "lengthMenu": [[25, 50, -1], [25, 50, "All"]]
        });
        $('.datatable').attr('style', 'border-collapse: collapse !important');
    </script>
@endpush

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-12">
                <h4 class="card-title mb-0">
                    @lang('labels.backend.report.projects.report')
                    <small class="text-muted">@lang('labels.backend.report.projects.active_users')</small>
                </h4>
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4">
            <div class="col">
                <table class="table table-striped table-bordered datatable">
                    <thead>
                        <tr>
                            <th>User</th>
                            <th>Role</th>
                            <th>Project</th>
                            <th>Project Status</th>
                            <th>@lang('labels.general.actions')</th>
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
            </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->
</div><!--card-->
@endsection
