@extends ('backend.layouts.app')

@section ('title', __('labels.backend.opportunity.projects.management') . ' | ' . __('labels.backend.opportunity.projects.view'))

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
                    <small class="text-muted">{{ __('labels.backend.opportunity.projects.view') }}</small>
                </h4>
            </div><!--col-->

            <div class="col-sm-7 pull-right">
                @include('backend.opportunity.project.includes.header-buttons')
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4 mb-4">
            <div class="col">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-expanded="true"> {{ __('labels.backend.opportunity.projects.tabs.titles.overview') }}</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#details" role="tab" aria-controls="details" aria-expanded="true"> {{ __('labels.backend.opportunity.projects.tabs.titles.details') }}</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#people" role="tab" aria-controls="people" aria-expanded="true"> {{ __('labels.backend.opportunity.projects.tabs.titles.people') }}</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#attachments" role="tab" aria-controls="attachments" aria-expanded="true"> {{ __('labels.backend.opportunity.projects.tabs.titles.attachments') }}</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#notes" role="tab" aria-controls="notes" aria-expanded="true"> {{ __('labels.backend.opportunity.projects.tabs.titles.notes') }}</a>
                    </li>

                    {{-- <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#history" role="tab" aria-controls="history" aria-expanded="true"> {{ __('labels.backend.opportunity.projects.tabs.titles.history') }}</a>
                    </li> --}}
                </ul>

                <div class="tab-content">
                    <div class="tab-pane active" id="overview" role="tabpanel" aria-expanded="true">
                        @include('backend.opportunity.project.show.tabs.overview')
                    </div><!--tab-->

                    <div class="tab-pane" id="details" role="tabpanel" aria-expanded="true">
                        @include('backend.opportunity.project.show.tabs.details')
                    </div><!--tab-->

                    <div class="tab-pane" id="people" role="tabpanel" aria-expanded="true">
                        @include('backend.opportunity.project.show.tabs.people')
                    </div><!--tab-->

                    <div class="tab-pane" id="attachments" role="tabpanel" aria-expanded="true">
                        @include('backend.opportunity.project.show.tabs.attachments')
                    </div><!--tab-->

                    <div class="tab-pane" id="notes" role="tabpanel" aria-expanded="true">
                        @include('backend.opportunity.project.show.tabs.notes')
                    </div><!--tab-->

                    {{-- <div class="tab-pane" id="history" role="tabpanel" aria-expanded="true">
                        @include('backend.opportunity.project.show.tabs.history')
                    </div><!--tab--> --}}

                </div><!--tab-content-->
            </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->

    <div class="card-footer">
        <div class="row">
            <div class="col">
                <small class="float-right text-muted">
                    <strong>{{ __('labels.backend.opportunity.projects.tabs.content.overview.created_at') }}:</strong> {{ timezone()->convertToLocal($project->created_at) }} ({{ $project->created_at->diffForHumans() }})@if (isset($project->createdByUser)) by {{ $project->createdByUser->full_name }} ({{ $project->createdByUser->id }})@endif,
                    <strong>{{ __('labels.backend.opportunity.projects.tabs.content.overview.last_updated') }}:</strong> {{ timezone()->convertToLocal($project->updated_at) }} ({{ $project->updated_at->diffForHumans() }})@if (isset($project->createdByUser)) by {{ $project->updatedByUser->full_name }} ({{ $project->updatedByUser->id }})@endif
                    @if ($project->trashed())
                        <strong>{{ __('labels.backend.opportunity.projects.tabs.content.overview.deleted_at') }}:</strong> {{ timezone()->convertToLocal($project->deleted_at) }} ({{ $project->deleted_at->diffForHumans() }})
                    @endif
                </small>
            </div><!--col-->
        </div><!--row-->
    </div><!--card-footer-->
</div><!--card-->
@endsection
