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
                            <th>{{ __('Review Status') }}</th>
                            <th>{{ __('Slug') }}</th>
                            <th>{{ __('Actions') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($opportunityReviewStatuses as $opportunityReviewStatus)
                            <tr>
                                <td>{{ ucwords($opportunityReviewStatus->opportunityType->name) }}</td>
                                <td>{{ ucwords($opportunityReviewStatus->name) }}</td>
                                <td>{{ $opportunityReviewStatus->slug }}</td>
                                <td>{!! $opportunityReviewStatus->action_buttons !!}</td>
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
                    {!! $opportunityReviewStatuses->total() !!} {{ str_plural('opportunity review status', $opportunityReviewStatuses->total()) . ' total' }}
                </div>
            </div><!--col-->

            <div class="col-5">
                <div class="float-right">
                    {!! $opportunityReviewStatuses->render() !!}
                </div>
            </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->
</div><!--card-->
@endsection
