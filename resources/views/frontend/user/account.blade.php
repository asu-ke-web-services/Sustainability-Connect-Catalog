@extends('frontend.layouts.coreui')

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-2"></div>

            <div class="col-md-10">
                <h3 class="profile-username text-center">{{ $logged_in_user->name }}</h3>
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
