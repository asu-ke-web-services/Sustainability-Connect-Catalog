@extends ('backend.layouts.app')

@section ('title', app_name() . ' | '. __('Opportunity Management'))

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    {{ __('Opportunity Management') }}
                </h4>
            </div><!--col-->

            <div class="col-sm-7 pull-right">
                @include('backend.opportunity.opportunity.includes.header-buttons')
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>{{ __('Opportunity') }}</th>
                            <th>{{ __('Email') }}</th>
                            <th>{{ __('Associated Models') }}</th>
                            <th>{{ __('Actions') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($opportunities as $opportunity)
                            <tr>
                                <td>{{ ucwords($opportunity->name) }}</td>
                                <td>{{ ucwords($opportunity->email) }}</td>
                                <td>
                                    @if ($opportunity->associated_models->count())
                                        @foreach ($opportunity->associated_models as $associated_model)
                                            {{ ucwords($associated_model->name) }}
                                        @endforeach
                                    @else
                                        {{ __('None') }}
                                    @endif
                                </td>
                                <td>{!! $opportunity->action_buttons !!}</td>
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
                    {!! $opportunities->total() !!} {{ str_plural('opportunity', $opportunities->total()) . ' total' }}
                </div>
            </div><!--col-->

            <div class="col-5">
                <div class="float-right">
                    {!! $opportunities->render() !!}
                </div>
            </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->
</div><!--card-->
@endsection
