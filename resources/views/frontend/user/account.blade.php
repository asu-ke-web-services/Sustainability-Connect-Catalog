@extends('frontend.layouts.asu')

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-3">
                <!-- Profile -->
                <div class="box box-primary">
                    <div class="box-body box-profile">
                        <h3 class="profile-username text-center">{{ $logged_in_user->name }}</h3>

                        {{-- <p class="text-muted text-center">{{ $logged_in_user->type->name }}</p> --}}
{{--
                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>Followers</b> <a class="pull-right">1,322</a>
                            </li>
                            <li class="list-group-item">
                                <b>Following</b> <a class="pull-right">543</a>
                            </li>
                            <li class="list-group-item">
                                <b>Friends</b> <a class="pull-right">13,287</a>
                            </li>
                        </ul>
--}}
                        <a href="{{ route('frontend.user.account')}}" class="btn btn-primary btn-block"><i class="fa fa-user-circle"></i> {{ __('navs.frontend.user.account') }}</a>
                        @can('view admin dashboard')
                            &nbsp;<a href="{{ route ('admin.dashboard')}}" class="btn btn-primary btn-block">
                                <i class="fa fa-user-secret"></i> {{ __('navs.frontend.user.administration') }}
                            </a>
                        @endcan
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->

            <div class="col-md-9">
                <ul class="nav nav-tabs">
                    <li class="profile"><a href="#profile" data-toggle="tab">{{ __('navs.frontend.user.profile') }}</a></li>
                    <li><a href="#edit" data-toggle="tab">{{ __('labels.frontend.user.profile.update_information') }}</a></li>
                    @if ($logged_in_user->canChangePassword())
                    <li><a href="#password" data-toggle="tab">{{ __('navs.frontend.user.change_password') }}</a></li>
                    @endif
                </ul>
                <div class="tab-content">
                    <div class="active tab-pane" id="profile">
                        @include('frontend.user.account.tabs.profile')
                    </div>
                    <!-- /.tab-pane -->

                    <div class="tab-pane" id="edit">
                        @include('frontend.user.account.tabs.edit')
                    </div>
                    <!-- /.tab-pane -->

                    <div class="tab-pane" id="password">
                        @include('frontend.user.account.tabs.change-password')
                    </div>
                    <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
@endsection
