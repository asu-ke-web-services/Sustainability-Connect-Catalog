@extends('frontend.layouts.asu')

@section('content')
    <div class="container pad-bot-md pad-top-sm">
        {{-- <div class="col-sm-12"> --}}
            <!-- Internship Name -->
            <h1>{{ $internship->name }}</h1>

            <ul class="nav nav-tabs" style="margin-left: 1em;">
                <li class="active"><a href="#">View</a></li>
                @can('view admin dashboard')
                <li><a href="{{ route('admin.opportunity.internship.show', $internship) }}">Manage</a></li>
                @elsecan('manage internship')
                <li><a href="{{ route('frontend.opportunity.internship.private.show', $internship) }}">Manage</a></li>
                @endcan
            </ul>

            <div class="col-sm-9">
                @include('frontend.opportunity.internship.public.show_fields')
                <a href="{!! url()->previous() !!}" class="btn btn-default">Back</a>
            </div>

            <div class="col-sm-3 hidden-xs">
                @include('frontend.opportunity.internship.public.sidebar')
            </div>
        {{-- </div> --}}
    </div>
@endsection
