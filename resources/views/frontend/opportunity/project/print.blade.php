@extends ('frontend.layouts.print')

@section ('title', 'Project Management | Project View')

@section('content')
<div class="content">
    <h1>{{ ucwords($project->name) }}</h1>
    <hr/>

    <div class="">
        @include('frontend.opportunity.project.print.overview')
    </div><!--tab-->
    <hr/>

    <div class="">
        @include('frontend.opportunity.project.print.details')
    </div><!--tab-->
    <hr/>

    <div class="">
        @include('frontend.opportunity.project.print.organization')
    </div><!--tab-->
    <hr/>

    <div class="">
        @include('frontend.opportunity.project.print.people')
    </div><!--tab-->
    <hr/>

    <div class="">
        @include('frontend.opportunity.project.print.attachments')
    </div><!--tab-->
    <hr/>

    <div class="">
        @include('frontend.opportunity.project.print.notes')
    </div><!--tab-->

</div><!--content-->
@endsection
