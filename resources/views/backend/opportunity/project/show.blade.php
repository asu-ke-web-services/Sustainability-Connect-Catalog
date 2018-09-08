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
        </div><!--row-->

        <div class="row mt-4 mb-4">
            <div class="col">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-expanded="true"> {{ __('labels.backend.opportunity.projects.tabs.titles.overview') }}</a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane active" id="overview" role="tabpanel" aria-expanded="true">
                        @include('backend.opportunity.project.show.tabs.overview')
                    </div><!--tab-->
                </div><!--tab-content-->
            </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->

    <div class="card-footer">
        <div class="row">
            <div class="col">
                <small class="float-right text-muted">
                    <strong>{{ __('labels.backend.opportunity.projects.tabs.content.overview.created_at') }}:</strong> {{ timezone()->convertToLocal($project->created_at) }} ({{ $project->created_at->diffForHumans() }}),
                    <strong>{{ __('labels.backend.opportunity.projects.tabs.content.overview.last_updated') }}:</strong> {{ timezone()->convertToLocal($project->updated_at) }} ({{ $project->updated_at->diffForHumans() }})
                    @if ($project->trashed())
                        <strong>{{ __('labels.backend.opportunity.projects.tabs.content.overview.deleted_at') }}:</strong> {{ timezone()->convertToLocal($project->deleted_at) }} ({{ $project->deleted_at->diffForHumans() }})
                    @endif
                </small>
            </div><!--col-->
        </div><!--row-->
    </div><!--card-footer-->
</div><!--card-->
@endsection
