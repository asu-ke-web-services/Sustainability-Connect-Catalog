@extends('frontend.layouts.app')

@section('title', app_name() . ' | '.__('navs.general.home'))

@section('content')
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
                        <div><a href="/projects">Projects</a></div>
                        <div><a href="/internships">Internships</a></div>
                        <div><a href="/admin">Backend Admin</a></div>
                    </div>
                </div>
            </div><!--card-->
        </div><!--col-->
    </div><!--row-->

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <i class="fab fa-font-awesome-flag"></i> Font Awesome {{ __('strings.frontend.test') }}
                </div>
                <div class="card-body">
                    <i class="fas fa-home"></i>
                    <i class="fab fa-facebook"></i>
                    <i class="fab fa-twitter"></i>
                    <i class="fab fa-pinterest"></i>
                </div><!--card-body-->
            </div><!--card-->
        </div><!--col-->
    </div><!--row-->
@endsection
