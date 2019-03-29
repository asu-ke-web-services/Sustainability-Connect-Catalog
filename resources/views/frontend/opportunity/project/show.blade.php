@extends('frontend.layouts.asu')

@section('content')
    <div class="container pad-bot-md pad-top-sm">
        {{-- <div class="col-sm-12"> --}}
            <!-- Project Name -->
            <h1>{{ $project->name }}</h1>

            <ul class="nav nav-tabs" style="margin-left: 1em;">
                <li class="active"><a href="#">View</a></li>
                {{-- <li><a href="{{ route('frontend.opportunity.project.edit', $project) }}">Manage</a></li> --}}
                @can('view admin dashboard')
                <li><a href="{{ route('frontend.opportunity.project.edit', $project) }}">Edit</a></li>
                @endcan
            </ul>

            <div class="col-sm-9">
                @include('frontend.opportunity.project.show_fields')
                <a href="{!! url()->previous() !!}" class="btn btn-default">Back</a>
            </div>

            <div class="col-sm-3 hidden-xs">
                @include('frontend.opportunity.project.sidebar')
            </div>
        {{-- </div> --}}
    </div>
@endsection
