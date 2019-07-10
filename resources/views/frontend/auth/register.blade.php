@extends('frontend.layouts.coreui-basic')

@section('title', app_name() . ' | '.__('labels.frontend.auth.register_box_title'))

@section('content')

<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card mx-4">
            <div class="card-body p-4">
                {{ html()->form('POST', route('frontend.auth.register.post'))->open() }}
                    <h1>Register</h1>
                    <p class="text-muted">Create your account</p>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="icon-user"></i>
                            </span>
                        </div>
                        {{ html()->text('first_name')
                            ->class('form-control')
                            ->placeholder(__('validation.attributes.frontend.first_name'))
                            ->attribute('maxlength', 191) }}
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="icon-user"></i>
                            </span>
                        </div>
                        {{ html()->text('last_name')
                            ->class('form-control')
                            ->placeholder(__('validation.attributes.frontend.last_name'))
                            ->attribute('maxlength', 191) }}
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">@</span>
                        </div>
                        {{ html()->email('email')
                            ->class('form-control')
                            ->placeholder(__('validation.attributes.frontend.email'))
                            ->attribute('maxlength', 191)
                            ->required() }}
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="icon-lock"></i>
                            </span>
                        </div>
                        {{ html()->password('password')
                            ->class('form-control')
                            ->placeholder(__('validation.attributes.frontend.password'))
                            ->required() }}
                        <p class="text-muted">Your password must be more than 8 characters long, should contain at least 1 uppercase, 1 lowercase and 1 number.</p>
                    </div>
                    <div class="input-group mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="icon-lock"></i>
                            </span>
                        </div>
                        {{ html()->password('password_confirmation')
                            ->class('form-control')
                            ->placeholder(__('validation.attributes.frontend.password_confirmation'))
                            ->required() }}
                    </div>

                    @if (config('access.captcha.registration'))
                    <div class="input-group mb-4">
                        {!! Captcha::display() !!}
                        {{ html()->hidden('captcha_status', 'true') }}
                    </div>
                    @endif

                    <button class="btn btn-block btn-success" type="submit">Create Account</button>
                {{ html()->form()->close() }}
            </div>
            {{-- <div class="card-footer p-4">
                <div class="row">
                    <div class="col-6">
                        <button class="btn btn-block btn-facebook" type="button">
                            <span>facebook</span>
                        </button>
                    </div>
                    <div class="col-6">
                        <button class="btn btn-block btn-twitter" type="button">
                            <span>twitter</span>
                        </button>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
</div>
@endsection

@push('after-scripts')
@if (config('access.captcha.registration'))
{!! Captcha::script() !!}
@endif
@endpush
