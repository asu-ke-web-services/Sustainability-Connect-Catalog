@extends ('frontend.layouts.print')

@section ('title', 'Internship Management | Internship View')

@section('content')
<div class="content">
    <h1>{{ ucwords($internship->name) }}</h1>
    <hr/>

    <div class="">
        @include('frontend.opportunity.internship.private.print.overview')
    </div><!--tab-->
    <hr/>

    <div class="">
        @include('frontend.opportunity.internship.private.print.details')
    </div><!--tab-->
    <hr/>

    <div class="">
        @include('frontend.opportunity.internship.private.print.organization')
    </div><!--tab-->
    <hr/>

    <div class="">
        @include('frontend.opportunity.internship.private.print.people')
    </div><!--tab-->
    <hr/>

    <div class="">
        @include('frontend.opportunity.internship.private.print.attachments')
    </div><!--tab-->
    <hr/>

    <div class="">
        @include('frontend.opportunity.internship.private.print.notes')
    </div><!--tab-->

</div><!--content-->
@endsection
