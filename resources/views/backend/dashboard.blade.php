@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('strings.backend.dashboard.title'))

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <strong>{{ __('strings.backend.dashboard.welcome') }} {{ $logged_in_user->name }}!</strong>
                </div><!--card-header-->
                <div class="card-block">
                    {!! __('strings.backend.welcome') !!}
                </div><!--card-block-->
            </div><!--card-->

            <div class="card">
                <div class="card-header">
                    <strong>{{ __('strings.backend.dashboard.new_user_accounts') }}</strong>
                </div><!--card-header-->
                <div class="card-block">
                    Coming Soon
                </div><!--card-block-->
            </div><!--card-->

            <div class="card">
                <div class="card-header">
                    <strong>{{ __('strings.backend.dashboard.projects_under_review') }}</strong>
                </div><!--card-header-->
                <div class="card-block">
                    Coming Soon
                </div><!--card-block-->
            </div><!--card-->

            <div class="card">
                <div class="card-header">
                    <strong>{{ __('strings.backend.dashboard.all_active_project_members') }}</strong>
                </div><!--card-header-->
                <div class="card-block">
                    Coming Soon
                </div><!--card-block-->
            </div><!--card-->

        </div><!--col-->
    </div><!--row-->
@endsection
