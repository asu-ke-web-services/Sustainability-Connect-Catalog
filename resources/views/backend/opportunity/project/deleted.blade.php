@extends ('backend.layouts.app')

@section ('title', __('labels.backend.opportunity.projects.management') . ' | ' . __('labels.backend.opportunity.projects.deleted'))

@section('breadcrumb-links')
    @include('backend.opportunity.project.includes.breadcrumb-links')
@endsection

@push('after-scripts')
    <script>
        $('.datatable').DataTable({
            "order": [[ 5, "{{ $defaultSort }}" ]],
            "lengthMenu": [[25, 50, -1], [25, 50, "All"]]
        });
        $('.datatable').attr('style', 'border-collapse: collapse !important');
    </script>
@endpush

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    @lang('labels.backend.opportunity.projects.management')
                    <small class="text-muted">@lang('labels.backend.opportunity.projects.deleted')</small>
                </h4>
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4">
            <div class="col">
                <table class="table table-striped table-bordered datatable">
                    <thead>
                    <tr>
                        <th>@lang('labels.backend.opportunity.projects.table.name')</th>
                        <th>@lang('labels.backend.opportunity.projects.table.status')</th>
                        <th>@lang('labels.backend.opportunity.projects.table.location')</th>
                        <th>@lang('labels.backend.opportunity.projects.table.opportunity_start_at')</th>
                        <th>@lang('labels.backend.opportunity.projects.table.application_deadline_at')</th>
                        <th>@lang('labels.backend.opportunity.projects.table.deleted_at')</th>
                        <th>@lang('labels.general.actions')</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if ($projects->count())
                        @foreach ($projects as $project)
                            <tr>
                                <td>{{ ucwords($project->name) }}</td>
                                <td>{{ ucwords($project->status->name) }}</td>
                                <td>
                                    @if ($project->addresses->count())
                                        @foreach ($project->addresses as $address)
                                            {{ ucwords($address->city) }}
                                        @endforeach
                                    @else
                                        @lang('labels.general.none')
                                    @endif
                                </td>
                                <td>{{ null !== $project->opportunity_start_at ? $project->opportunity_start_at->toDateString() : '' }}</td>
                                <td>{{
                                     null != $project->application_deadline_text
                                        ? $project->application_deadline_text
                                        : (null !== $project->application_deadline_at ? $project->application_deadline_at->toDateString() : null)
                                }}</td>
                                <td>{{ null !== $project->deleted_at ? $project->deleted_at->toDateString() : '' }}</td>
                                <td>{!! $project->action_buttons !!}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr><td colspan="9"><p class="text-center">@lang('strings.backend.opportunity.projects.no_deleted')</p></td></tr>
                    @endif
                    </tbody>
                </table>
            </div><!--col-->
        </div><!--row-->
        <div class="row">
            <div class="col-7">
                <div class="float-left">
                    {!! $projects->total() !!} {{ trans_choice('labels.backend.opportunity.projects.table.total', $projects->total()) }}
                </div>
            </div><!--col-->

            <div class="col-5">
                <div class="float-right">
                    {!! $projects->render() !!}
                </div>
            </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->
</div><!--card-->
@endsection
