@extends ('backend.layouts.app')

@section ('title', app_name() . ' | '. __('Budget Type Management'))

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    {{ __('Budget Type Management') }}
                </h4>
            </div><!--col-->

            <div class="col-sm-7 pull-right">
                @include('backend.lookup.budget_type.includes.header-buttons')
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>{{ __('Order') }}</th>
                            <th>{{ __('Budget Type') }}</th>
                            <th>{{ __('Slug') }}</th>
                            <th>{{ __('Actions') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($budget_types as $budget_type)
                            <tr>
                                <td>{{ $budget_type->order }}</td>
                                <td>{{ ucwords($budget_type->name) }}</td>
                                <td>{{ $budget_type->slug }}</td>
                                <td>{!! $budget_type->action_buttons !!}</td>
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
                    {!! $budget_types->total() !!} {{ str_plural('budget type', $budget_types->total()) . ' total' }}
                </div>
            </div><!--col-->

            <div class="col-5">
                <div class="float-right">
                    {!! $budget_types->render() !!}
                </div>
            </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->
</div><!--card-->
@endsection
