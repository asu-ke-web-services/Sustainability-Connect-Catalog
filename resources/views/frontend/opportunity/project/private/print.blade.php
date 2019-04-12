@extends ('frontend.layouts.print')

@section ('title', 'Project Management | Project View')

@section('content')
<div class="content">
    <h1>{{ ucwords($project->name) }}</h1>
    <hr/>

    <div class="">
        @include('frontend.opportunity.project.private.print.overview')
    </div><!--tab-->
    <hr/>

    <div class="">
        @include('frontend.opportunity.project.private.print.details')
    </div><!--tab-->
    <hr/>

    <div class="">
        @include('frontend.opportunity.project.private.print.organization')
    </div><!--tab-->
    <hr/>

    <div class="">
        @include('frontend.opportunity.project.private.print.people')
    </div><!--tab-->
    <hr/>

    <div class="">
        @include('frontend.opportunity.project.private.print.attachments')
    </div><!--tab-->
    <hr/>

    <div class="">
        @include('frontend.opportunity.project.private.print.notes')
    </div><!--tab-->

</div><!--content-->
@endsection
