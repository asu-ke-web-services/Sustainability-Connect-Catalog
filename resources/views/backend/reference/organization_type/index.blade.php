@extends ('backend.layouts.app')

@section ('title', app_name() . ' | '. __('Organization Type Management'))

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    @lang('Organization Type Management')
                </h4>
            </div><!--col-->

            <div class="col-sm-7 pull-right">
                @include('backend.reference.organization_type.includes.header-buttons')
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>@lang('Organization Type')</th>
                            <th>@lang('Slug')</th>
                            <th>@lang('Actions')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($organizationTypes as $organizationType)
                            <tr>
                                <td>{{ ucwords($organizationType->name) }}</td>
                                <td>{{ $organizationType->slug }}</td>
                                <td>{!! $organizationType->action_buttons !!}</td>
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
                    {!! $organizationTypes->total() !!} {{ str_plural('organization type', $organizationTypes->total()) . ' total' }}
                </div>
            </div><!--col-->

            <div class="col-5">
                <div class="float-right">
                    {!! $organizationTypes->render() !!}
                </div>
            </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->
</div><!--card-->
@endsection
