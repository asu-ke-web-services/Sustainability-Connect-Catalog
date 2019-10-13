@extends ('backend.layouts.app')

@section ('title', app_name() . ' | '. __('Organization Status Management'))

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    @lang('Organization Status Management')
                </h4>
            </div><!--col-->

            <div class="col-sm-7 pull-right">
                @include('backend.reference.organization_status.includes.header-buttons')
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>@lang('Organization Status')</th>
                            <th>@lang('Slug')</th>
                            <th>@lang('Actions')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($organizationStatuses as $organizationStatus)
                            <tr>
                                <td>{{ ucwords($organizationStatus->name) }}</td>
                                <td>{{ $organizationStatus->slug }}</td>
                                <td>{!! $organizationStatus->action_buttons !!}</td>
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
                    {!! $organizationStatuses->total() !!} {{ str_plural('organization status', $organizationStatuses->total()) . ' total' }}
                </div>
            </div><!--col-->

            <div class="col-5">
                <div class="float-right">
                    {!! $organizationStatuses->render() !!}
                </div>
            </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->
</div><!--card-->
@endsection
