@extends ('backend.layouts.app')

@section ('title', __('labels.backend.opportunity.projects.management') . ' | ' . __('labels.backend.opportunity.projects.archived'))

@section('breadcrumb-links')
    @include('backend.opportunity.project.includes.breadcrumb-links')
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    {{ __('labels.backend.opportunity.projects.management') }}
                    <small class="text-muted">{{ __('labels.backend.opportunity.projects.archived') }}</small>
                </h4>
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>{{ __('labels.backend.opportunity.projects.table.name') }}</th>
                            <th>{{ __('labels.backend.opportunity.projects.table.status') }}</th>
                            <th>{{ __('labels.backend.opportunity.projects.table.location') }}</th>
                            <th>{{ __('labels.backend.opportunity.projects.table.opportunity_start_at') }}</th>
                            <th>{{ __('labels.backend.opportunity.projects.table.application_deadline_at') }}</th>
                            <th>{{ __('labels.backend.opportunity.projects.table.last_updated') }}</th>
                            <th>{{ __('labels.general.actions') }}</th>
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
                                            {{ __('labels.general.none') }}
                                        @endif
                                    </td>
                                    <td>{{ $project->opportunity_start_at }}</td>
                                    <td>{{ $project->application_deadline_at }}</td>
                                    <td>{{ $project->updated_at->diffForHumans() }}</td>
                                    <td>{!! $project->action_buttons !!}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr><td colspan="9"><p class="text-center">{{ __('strings.backend.opportunity.projects.no_archived') }}</p></td></tr>
                        @endif
                        </tbody>
                    </table>
                </div>
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