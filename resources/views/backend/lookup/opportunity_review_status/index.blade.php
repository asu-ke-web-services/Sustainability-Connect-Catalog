@extends ('backend.layouts.app')

@section ('title', app_name() . ' | '. __('Opportunity Review Status Management'))

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    {{ __('Opportunity Review Status Management') }}
                </h4>
            </div><!--col-->

            <div class="col-sm-7 pull-right">
                @include('backend.lookup.opportunity_review_status.includes.header-buttons')
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>{{ __('Opportunity Type') }}</th>
                            <th>{{ __('Order') }}</th>
                            <th>{{ __('Review Status') }}</th>
                            <th>{{ __('Slug') }}</th>
                            <th>{{ __('Actions') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($opportunity_review_statuses as $opportunity_review_status)
                            <tr>
                                <td>{{ ucwords($opportunity_review_status->opportunityType->name) }}</td>
                                <td>{{ $opportunity_review_status->order }}</td>
                                <td>{{ ucwords($opportunity_review_status->name) }}</td>
                                <td>{{ $opportunity_review_status->slug }}</td>
                                <td>{!! $opportunity_review_status->action_buttons !!}</td>
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
                    {!! $opportunity_review_statuses->total() !!} {{ str_plural('opportunity review status', $opportunity_review_statuses->total()) . ' total' }}
                </div>
            </div><!--col-->

            <div class="col-5">
                <div class="float-right">
                    {!! $opportunity_review_statuses->render() !!}
                </div>
            </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->
</div><!--card-->
@endsection
