@extends ('frontend.layouts.coreui')

@section ('title', 'Internship Management | View Internship')

@section('content')
<div class="col-md-12 mb-4 mt-4">
    <div class="row">
        <div class="col-sm-8">
            <h4 class="card-title mb-0">
                {{ ucwords($internship->name) }}
            </h4>
        </div><!--col-->

        <div class="col-sm-4 pull-right">
            @include('frontend.opportunity.internship.private.includes.header-buttons')
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
                    @include('frontend.opportunity.internship.private.show.tabs.overview')
                </div><!--tab-->

                <div class="tab-pane" id="details" role="tabpanel" aria-expanded="true">
                    @include('frontend.opportunity.internship.private.show.tabs.details')
                </div><!--tab-->

                <div class="tab-pane" id="people" role="tabpanel" aria-expanded="true">
                    @include('frontend.opportunity.internship.private.show.tabs.people')
                </div><!--tab-->

                <div class="tab-pane" id="attachments" role="tabpanel" aria-expanded="true">
                    @include('frontend.opportunity.internship.private.show.tabs.attachments')
                </div><!--tab-->

                <div class="tab-pane" id="notes" role="tabpanel" aria-expanded="true">
                    @include('frontend.opportunity.internship.private.show.tabs.notes')
                </div><!--tab-->
            </div><!--tab-content-->
        </div><!--col-->
    </div><!--row-->

    <div class="row">
        <div class="col">
            <small class="float-right text-muted">
                <strong>@lang('labels.frontend.opportunity.internships.tabs.content.overview.created_at'):</strong> {{ timezone()->convertToLocal($internship->created_at) }} ({{ $internship->created_at->diffForHumans() }})@if (isset($internship->createdByUser)) by {{ $internship->createdByUser->full_name }} ({{ $internship->createdByUser->id }})@endif,
                <strong>@lang('labels.frontend.opportunity.internships.tabs.content.overview.last_updated'):</strong> {{ timezone()->convertToLocal($internship->updated_at) }} ({{ $internship->updated_at->diffForHumans() }})@if (isset($internship->createdByUser)) by {{ $internship->updatedByUser->full_name }} ({{ $internship->updatedByUser->id }})@endif
                @if ($internship->trashed())
                    <strong>@lang('labels.frontend.opportunity.internships.tabs.content.overview.deleted_at'):</strong> {{ timezone()->convertToLocal($internship->deleted_at) }} ({{ $internship->deleted_at->diffForHumans() }})
                @endif
            </small>
        </div><!--col-->
    </div><!--row-->
</div>
@endsection
