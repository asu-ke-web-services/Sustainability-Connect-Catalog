@extends ('backend.layouts.app')

@section ('title', app_name() . ' | '. __('Opportunity Type Management'))

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    {{ __('Opportunity Type Management') }}
                </h4>
            </div><!--col-->

            <div class="col-sm-7 pull-right">
                @include('backend.lookup.opportunity_type.includes.header-buttons')
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>{{ __('Order') }}</th>
                            <th>{{ __('Opportunity Type') }}</th>
                            <th>{{ __('Slug') }}</th>
                            <th>{{ __('Actions') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($opportunity_types as $opportunity_type)
                            <tr>
                                <td>{{ $opportunity_type->order }}</td>
                                <td>{{ ucwords($opportunity_type->name) }}</td>
                                <td>{{ $opportunity_type->slug }}</td>
                                <td>{!! $opportunity_type->action_buttons !!}</td>
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
                    {!! $opportunity_types->total() !!} {{ str_plural('opportunity type', $opportunity_types->total()) . ' total' }}
                </div>
            </div><!--col-->

            <div class="col-5">
                <div class="float-right">
                    {!! $opportunity_types->render() !!}
                </div>
            </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->
</div><!--card-->
@endsection
