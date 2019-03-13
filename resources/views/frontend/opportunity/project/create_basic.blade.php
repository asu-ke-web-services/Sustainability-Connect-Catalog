@extends ('frontend.layouts.coreui')

@section ('title', __('labels.frontend.opportunity.projects.proposal') . ' | ' . __('labels.frontend.opportunity.projects.submit_opportunity'))

@section('content')
{{ html()->form('POST', route('frontend.opportunity.project.store'))->id('project-form')->class('form-horizontal')->open() }}

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        {{ __('labels.frontend.opportunity.projects.proposal') }}
                        <small class="text-muted">Submit your project</small>
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr />

            @include('frontend.opportunity.project.fields_basic')
        </div><!--card-body-->
    </div><!--card-->

    <div class="card">
        <div class="card-footer">
            <div class="row">
                <div class="col">
                    {{ form_cancel(route('admin.opportunity.project.index'), __('buttons.general.cancel')) }}
                </div><!--col-->

                <div class="col text-right">
                    {{ form_submit(__('buttons.general.submit')) }}
                </div><!--col-->
            </div><!--row-->
        </div><!--card-footer-->
    </div><!--card-->

{{ html()->form()->close() }}
@endsection
