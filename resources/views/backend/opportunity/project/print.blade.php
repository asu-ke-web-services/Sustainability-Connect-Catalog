@extends ('backend.layouts.print')

@section ('title', __('labels.backend.opportunity.projects.management') . ' | ' . __('labels.backend.opportunity.projects.view'))

@section('content')
<div class="content">
    <h1>{{ ucwords($project->name) }}</h1>
    <hr/>

    <div class="">
        @include('backend.opportunity.project.print.overview')
    </div><!--tab-->
    <hr/>

    <div class="">
        @include('backend.opportunity.project.print.details')
    </div><!--tab-->
    <hr/>

    <div class="">
        @include('backend.opportunity.project.print.organization')
    </div><!--tab-->
    <hr/>

    <div class="">
        @include('backend.opportunity.project.print.people')
    </div><!--tab-->
    <hr/>

    <div class="">
        @include('backend.opportunity.project.print.attachments')
    </div><!--tab-->
    <hr/>

    <div class="">
        @include('backend.opportunity.project.print.notes')
    </div><!--tab-->

</div><!--content-->
@endsection
