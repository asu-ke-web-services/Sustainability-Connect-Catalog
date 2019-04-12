@extends('frontend.layouts.asu')

@section('title', app_name() . ' | '.__('labels.frontend.auth.login_box_title'))

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col col-sm-8 align-self-center">
            <div class="card">
                <div class="card-header">
                    <strong>
                        {{ __('labels.frontend.auth.login_box_title') }}
                    </strong>
                </div><!--card-header-->

                <div class="card-body">
                    <div style="padding:10px 0; text-align:center;">
                        <div>
                            To access all features of the Sustainability Connect Catalog, please tell us who you are.<p></p>
                            <div class="splash-user">
                                <img src="/img/frontend/login-asu.png" width="83" height="80"><br><a class="btn btn-primary btn-splash" href="/login/asu">ASU Affiliate</a>
                            </div>
                            <div class="splash-user">
                                <img src="/img/frontend/login-partner.png" width="82" height="80"><br><a class="btn btn-primary btn-splash" href="/login/basic">Partner</a>
                            </div>
                        </div>
                    </div>
                </div><!--card body-->
            </div><!--card-->
        </div><!-- col-md-8 -->
    </div><!-- row -->
</div>
@endsection
