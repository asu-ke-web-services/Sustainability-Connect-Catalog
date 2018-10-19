@extends('frontend.layouts.asu-web-standards')

@section('content')
<div class="container pad-bot-md pad-top-sm">
    <div class="col-sm-9">
        @include('frontend.opportunity.project.show_fields')
        <a href="{!! route('frontend.project.index') !!}" class="btn btn-default">Back</a>
    </div>
</div>
@endsection
