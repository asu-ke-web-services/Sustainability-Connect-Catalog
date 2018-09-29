@extends('frontend.layouts.app')

@section('title', app_name() . ' | '.__('navs.general.home'))

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-home"></i> {{ __('navs.general.home') }}
                </div>
                <div class="card-body">
                    {{ __('strings.frontend.welcome_to', ['place' => app_name()]) }}

                    <div class="card-body">
                        <div>Jump to:</div>
                        <div><a href="/project">Projects</a></div>
                        <div><a href="/internship">Internships</a></div>
                        <div><a href="/admin">Backend Admin</a></div>
                    </div>
                </div>
            </div><!--card-->
        </div><!--col-->
    </div><!--row-->
</div>
@endsection
