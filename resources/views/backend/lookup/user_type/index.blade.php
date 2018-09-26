@extends ('backend.layouts.app')

@section ('title', app_name() . ' | '. __('User Type Management'))

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    {{ 'User Type Management' }}
                </h4>
            </div><!--col-->

            <div class="col-sm-7 pull-right">
                @include('backend.lookup.user_type.includes.header-buttons')
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>{{ __('UserType') }}</th>
                            <th>{{ __('Email') }}</th>
                            <th>{{ __('Associated Models') }}</th>
                            <th>{{ __('Actions') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($userTypes as $userType)
                            <tr>
                                <td>{{ ucwords($userType->name) }}</td>
                                <td>{{ ucwords($userType->email) }}</td>
                                <td>
                                    @if ($userType->associated_models->count())
                                        @foreach ($userType->associated_models as $associated_model)
                                            {{ ucwords($associated_model->name) }}
                                        @endforeach
                                    @else
                                        {{ __('None') }}
                                    @endif
                                </td>
                                <td>{!! $userType->action_buttons !!}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div><!--col-->
        </div><!--row-->
        <div class="row">
            <div class="col-7">
                <div class="float-left">
                    {!! $userTypes->total() !!} {{ str_plural('user type', $userTypes->total()) . ' total' }}
                </div>
            </div><!--col-->

            <div class="col-5">
                <div class="float-right">
                    {!! $userTypes->render() !!}
                </div>
            </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->
</div><!--card-->
@endsection
