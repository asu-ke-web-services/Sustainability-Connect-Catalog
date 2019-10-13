@extends ('backend.layouts.app')

@section ('title', app_name() . ' | '. __('Opportunity Status Management'))

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    @lang('Opportunity Status Management')
                </h4>
            </div><!--col-->

            <div class="col-sm-7 pull-right">
                @include('backend.reference.opportunity_status.includes.header-buttons')
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>@lang('Opportunity Type')</th>
                            <th>@lang('Status')</th>
                            <th>@lang('Slug')</th>
                            <th>@lang('Actions')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($opportunityStatuses as $opportunityStatus)
                            <tr>
                                <td>{{ ucwords($opportunityStatus->opportunityType->name) }}</td>
                                <td>{{ ucwords($opportunityStatus->name) }}</td>
                                <td>{{ $opportunityStatus->slug }}</td>
                                <td>{!! $opportunityStatus->action_buttons !!}</td>
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
                    {!! $opportunityStatuses->total() !!} {{ str_plural('opportunity status', $opportunityStatuses->total()) . ' total' }}
                </div>
            </div><!--col-->

            <div class="col-5">
                <div class="float-right">
                    {!! $opportunityStatuses->render() !!}
                </div>
            </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->
</div><!--card-->
@endsection
