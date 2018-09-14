@extends ('backend.layouts.app')

@section ('title', app_name() . ' | '. __('Organization Type Management'))

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    {{ __('Organization Type Management') }}
                </h4>
            </div><!--col-->

            <div class="col-sm-7 pull-right">
                @include('backend.lookup.organization_type.includes.header-buttons')
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>{{ __('Order') }}</th>
                            <th>{{ __('Organization Type') }}</th>
                            <th>{{ __('Slug') }}</th>
                            <th>{{ __('Actions') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($organization_types as $organization_type)
                            <tr>
                                <td>{{ $organization_type->order }}</td>
                                <td>{{ ucwords($organization_type->name) }}</td>
                                <td>{{ $organization_type->slug }}</td>
                                <td>{!! $organization_type->action_buttons !!}</td>
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
                    {!! $organization_types->total() !!} {{ str_plural('organization type', $organization_types->total()) . ' total' }}
                </div>
            </div><!--col-->

            <div class="col-5">
                <div class="float-right">
                    {!! $organization_types->render() !!}
                </div>
            </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->
</div><!--card-->
@endsection
