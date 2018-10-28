@extends('frontend.layouts.asu')

@section('content')
    <div class="container pad-bot-md pad-top-sm">
        <div class="col-sm-9">
            @include('frontend.opportunity.project.show_fields')
            <a href="{!! route('frontend.project.index') !!}" class="btn btn-default">Back</a>
        </div>

        <div class="col-sm-3 hidden-xs">
            @include('frontend.opportunity.project.sidebar')
        </div>
    </div>
@endsection
