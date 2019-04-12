@extends ('backend.layouts.print')

@section ('title', __('labels.backend.opportunity.internships.management') . ' | ' . __('labels.backend.opportunity.internships.view'))

@section('content')
<div class="content">
    <h1>{{ ucwords($internship->name) }}</h1>
    <hr/>

    <div class="">
        @include('backend.opportunity.internship.print.overview')
    </div><!--tab-->
    <hr/>

    <div class="">
        @include('backend.opportunity.internship.print.details')
    </div><!--tab-->
    <hr/>

    <div class="">
        @include('backend.opportunity.internship.print.organization')
    </div><!--tab-->
    <hr/>

    <div class="">
        @include('backend.opportunity.internship.print.people')
    </div><!--tab-->
    <hr/>

    <div class="">
        @include('backend.opportunity.internship.print.attachments')
    </div><!--tab-->
    <hr/>

    <div class="">
        @include('backend.opportunity.internship.print.notes')
    </div><!--tab-->

</div><!--content-->
@endsection
