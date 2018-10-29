@extends ('backend.layouts.app')

@section ('title', app_name() . ' | '. __('labels.backend.opportunity.projects.management'))

@section('breadcrumb-links')
    @include('backend.opportunity.project.includes.breadcrumb-links')
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    {{ __('labels.backend.opportunity.projects.review') }}
                </h4>
            </div><!--col-->

            <div class="col-sm-7 pull-right">
                @include('backend.opportunity.project.includes.header-buttons-add')
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
                            <th>{{ __('labels.backend.opportunity.projects.table.start_date') }}</th>
                            <th>{{ __('labels.backend.opportunity.projects.table.application_deadline') }}</th>
                            <th>{{ __('labels.general.actions') }}</th>
                        </tr>
                        </thead>
                        <tbody>
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
                                <td>{{ $project->start_date }}</td>
                                <td>{{ $project->application_deadline }}</td>
                                <td>{!! $project->opportunityable->action_buttons !!}</td>
                            </tr>
                        @endforeach
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
