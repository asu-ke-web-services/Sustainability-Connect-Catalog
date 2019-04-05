@extends('frontend.layouts.coreui')

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
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#profile" role="tab" aria-controls="profile">Profile</a></li>
                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#edit" role="tab" aria-controls="edit">Update Information</a></li>
                    @unless ($logged_in_user->asurite)
                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#password" role="tab" aria-controls="password">Change Password</a></li>
                    @endunless
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="profile" role="tabpanel">
                        @include('frontend.user.account.tabs.profile')
                    </div>
                    <!-- /.tab-pane -->

                    <div class="tab-pane" id="edit" role="tabpanel">
                        @include('frontend.user.account.tabs.edit')
                    </div>
                    <!-- /.tab-pane -->

                    <div class="tab-pane" id="password" role="tabpanel">
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
