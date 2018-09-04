@extends ('backend.layouts.app')

@section ('title', app_name() . ' | '. __('Organization Status Management'))

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    {{ __('Organization Status Management') }}
                </h4>
            </div><!--col-->

            <div class="col-sm-7 pull-right">
                @include('backend.lookup.organization_status.includes.header-buttons')
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>{{ __('Order') }}</th>
                            <th>{{ __('Organization Status') }}</th>
                            <th>{{ __('Slug') }}</th>
                            <th>{{ __('Actions') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($organization_statuses as $organization_status)
                            <tr>
                                <td>{{ $organization_status->order }}</td>
                                <td>{{ ucwords($organization_status->name) }}</td>
                                <td>{{ $organization_status->slug }}</td>
                                <td>{!! $organization_status->action_buttons !!}</td>
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
                    {!! $organization_statuses->total() !!} {{ str_plural('organization status', $organization_statuses->total()) . ' total' }}
                </div>
            </div><!--col-->

            <div class="col-5">
                <div class="float-right">
                    {!! $organization_statuses->render() !!}
                </div>
            </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->
</div><!--card-->
@endsection
