@extends('frontend.layouts.asu')

@section('title', app_name() . ' | '. __('navs.frontend.dashboard') )

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <strong>
                        <i class="fas fa-tachometer-alt"></i> {{ __('navs.frontend.dashboard') }}
                    </strong>
                </div><!--card-header-->

                <div class="card-body">
                    <div class="row">
                        <div class="col col-sm-4 order-1 order-sm-2  mb-4">
                            <div class="card mb-4 bg-light">
                                <img class="card-img-top" src="{{ $logged_in_user->picture }}" alt="Profile Picture">

                                <div class="card-body">
                                    <h4 class="card-title">
                                        {{ $logged_in_user->name }}<br/>
                                    </h4>

                                    <p class="card-text">
                                        <small>
                                            <i class="fas fa-envelope"></i> {{ $logged_in_user->email }}<br/>
                                            <i class="fas fa-calendar-check"></i> {{ __('strings.frontend.general.joined') }} {{ timezone()->convertToLocal($logged_in_user->created_at, 'F jS, Y') }}
                                        </small>
                                    </p>

                                    <p class="card-text">

                                        <a href="{{ route('frontend.user.account')}}" class="btn btn-info btn-sm mb-1">
                                            <i class="fas fa-user-circle"></i> {{ __('navs.frontend.user.account') }}
                                        </a>

                                        @can('view admin dashboard')
                                            &nbsp;<a href="{{ route ('admin.dashboard')}}" class="btn btn-danger btn-sm mb-1">
                                                <i class="fas fa-user-secret"></i> {{ __('navs.frontend.user.administration') }}
                                            </a>
                                        @endcan
                                    </p>
                                </div>
                            </div>

                        </div><!--col-md-4-->

                        <div class="col-md-8 order-2 order-sm-1">
                            <div class="row">
                                <div class="col">
                                    <div class="card mb-4">
                                        <div class="card-header">
                                            Opportunities I'm Following
                                        </div><!--card-header-->

                                        <div class="card-body">
                                            <table class="table table-responsive-sm table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Opportunity</th>
                                                        <th>Coordinator</th>
                                                        <th>Updated Last</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($followedOpportunities as $opportunity)
                                                    <tr>
                                                        <td>{!! $opportunity->name !!}</td>
                                                        <td>{!! $opportunity->supervisorUser->full_name ?? null !!}</td>
                                                        <td>{!! $opportunity->updated_at !!}</td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div><!--card-body-->
                                    </div><!--card-->
                                </div><!--col-md-6-->
                            </div><!--row-->

                            <div class="row">
                                <div class="col">
                                    <div class="card mb-4">
                                        <div class="card-header">
                                            My Active Opportunities
                                        </div><!--card-header-->

                                        <div class="card-body">
                                            <table class="table table-responsive-sm table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Opportunity</th>
                                                        <th>Coordinator</th>
                                                        <th>Updated Last</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($activeOpportunities as $opportunity)
                                                    <tr>
                                                        <td>{!! $opportunity->name !!}</td>
                                                        <td>{!! $opportunity->supervisorUser->full_name ?? null !!}</td>
                                                        <td>{!! $opportunity->updated_at !!}</td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div><!--card-body-->
                                    </div><!--card-->
                                </div><!--col-md-6-->

                                <div class="col">
                                    <div class="card mb-4">
                                        <div class="card-header">
                                            My Requests Awaiting Approval
                                        </div><!--card-header-->

                                        <div class="card-body">
                                            <table class="table table-responsive-sm table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Opportunity</th>
                                                        <th>Coordinator</th>
                                                        <th>Updated Last</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($applications as $application)
                                                    <tr>
                                                        <td>{!! $application->name !!}</td>
                                                        <td>{!! $application->supervisorUser->full_name ?? null !!}</td>
                                                        <td>{!! $application->updated_at !!}</td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div><!--card-body-->
                                    </div><!--card-->
                                </div><!--col-md-6-->
                            </div><!--row-->

                        </div><!--col-md-8-->
                    </div><!-- row -->
                </div> <!-- card-body -->
            </div><!-- card -->
        </div><!-- row -->
    </div><!-- row -->
<div class="container">
@endsection
