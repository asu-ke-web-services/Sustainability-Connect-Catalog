@extends ('backend.layouts.app')

@section ('title', app_name() . ' | '. __('Affiliation Management'))

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    @lang('Affiliation Management')
                </h4>
            </div><!--col-->

            <div class="col-sm-7 pull-right">
                @include('backend.reference.affiliation.includes.header-buttons')
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>@lang('Opportunity Type')</th>
                            <th>@lang('Affiliation')</th>
                            <th>@lang('Slug')</th>
                            <th>@lang('Access Control?')</th>
                            <th>@lang('Public Visible?')</th>
                            <th>@lang('Actions')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($affiliations as $affiliation)
                            <tr>
                                <td>{{ ucwords($affiliation->opportunityType->name ?? null) }}</td>
                                <td>{{ ucwords($affiliation->name) }}</td>
                                <td>{{ $affiliation->slug }}</td>
                                <td>{!! $affiliation->accesscontrol_label !!}</td>
                                <td>{!! $affiliation->public_label !!}</td>
                                <td>{!! $affiliation->action_buttons !!}</td>
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
                    {!! $affiliations->total() !!} {{ str_plural('affiliation', $affiliations->total()) . ' total' }}
                </div>
            </div><!--col-->

            <div class="col-5">
                <div class="float-right">
                    {!! $affiliations->render() !!}
                </div>
            </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->
</div><!--card-->
@endsection