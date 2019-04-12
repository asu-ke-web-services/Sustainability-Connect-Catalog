@extends ('frontend.layouts.coreui')

@section ('title', 'Project Management | View Project')
{{--
@section('breadcrumb-links')
    @include('frontend.opportunity.project.private.includes.breadcrumb-links')
@endsection --}}

@section('content')
<div class="col-md-12 mb-4 mt-4">
    <div class="row">
        <div class="col-sm-8">
            <h4 class="card-title mb-0">
                {{ ucwords($project->name) }}
            </h4>
        </div><!--col-->

        <div class="col-sm-4 pull-right">
            @include('frontend.opportunity.project.private.includes.header-buttons')
        </div><!--col-->
    </div><!--row-->

    <div class="row mt-4 mb-4">
        <div class="col">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-expanded="true">Overview</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#details" role="tab" aria-controls="details" aria-expanded="true">Details</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#people" role="tab" aria-controls="people" aria-expanded="true">Related Users</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#attachments" role="tab" aria-controls="attachments" aria-expanded="true">Uploaded Attachments</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#notes" role="tab" aria-controls="notes" aria-expanded="true">Notes</a>
                </li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane active" id="overview" role="tabpanel" aria-expanded="true">
                    @include('frontend.opportunity.project.private.show.tabs.overview')
                </div><!--tab-->

                <div class="tab-pane" id="details" role="tabpanel" aria-expanded="true">
                    @include('frontend.opportunity.project.private.show.tabs.details')
                </div><!--tab-->

                <div class="tab-pane" id="people" role="tabpanel" aria-expanded="true">
                    @include('frontend.opportunity.project.private.show.tabs.people')
                </div><!--tab-->

                <div class="tab-pane" id="attachments" role="tabpanel" aria-expanded="true">
                    @include('frontend.opportunity.project.private.show.tabs.attachments')
                </div><!--tab-->

                <div class="tab-pane" id="notes" role="tabpanel" aria-expanded="true">
                    @include('frontend.opportunity.project.private.show.tabs.notes')
                </div><!--tab-->
            </div><!--tab-content-->
        </div><!--col-->
    </div><!--row-->

    <div class="row">
        <div class="col">
            <small class="float-right text-muted">
                <strong>{{ __('labels.frontend.opportunity.projects.tabs.content.overview.created_at') }}:</strong> {{ timezone()->convertToLocal($project->created_at) }} ({{ $project->created_at->diffForHumans() }})@if (isset($project->createdByUser)) by {{ $project->createdByUser->full_name }} ({{ $project->createdByUser->id }})@endif,
                <strong>{{ __('labels.frontend.opportunity.projects.tabs.content.overview.last_updated') }}:</strong> {{ timezone()->convertToLocal($project->updated_at) }} ({{ $project->updated_at->diffForHumans() }})@if (isset($project->createdByUser)) by {{ $project->updatedByUser->full_name }} ({{ $project->updatedByUser->id }})@endif
                @if ($project->trashed())
                    <strong>{{ __('labels.frontend.opportunity.projects.tabs.content.overview.deleted_at') }}:</strong> {{ timezone()->convertToLocal($project->deleted_at) }} ({{ $project->deleted_at->diffForHumans() }})
                @endif
            </small>
        </div><!--col-->
    </div><!--row-->
</div>
@endsection
