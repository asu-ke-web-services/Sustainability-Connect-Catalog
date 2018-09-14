@extends ('backend.layouts.app')

@section ('title', __('labels.backend.opportunity.projects.management') . ' | ' . __('labels.backend.opportunity.projects.create'))

@section('content')
{{ html()->form('POST', route('admin.opportunity.project.store'))->class('form-horizontal')->open() }}

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        {{ __('labels.backend.opportunity.projects.management') }}
                        <small class="text-muted">{{ __('labels.backend.opportunity.projects.create') }}</small>
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr />

            @include('backend.opportunity.project.fields')


    <div class="card">
        <div class="card-footer">
            <div class="row">
                <div class="col">
                    {{ form_cancel(route('admin.opportunity.project.index'), __('buttons.general.cancel')) }}
                </div><!--col-->

                <div class="col text-right">
                    {{ form_submit(__('buttons.general.crud.create')) }}
                </div><!--col-->
            </div><!--row-->
        </div><!--card-footer-->
    </div><!--card-->

{{ html()->form()->close() }}
@endsection
