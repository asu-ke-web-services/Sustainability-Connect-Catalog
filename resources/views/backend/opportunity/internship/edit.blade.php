@extends ('backend.layouts.app')

@section ('title', __('labels.backend.opportunity.internships.management') . ' | ' . __('labels.backend.opportunity.internships.edit'))

@section('content')
{{ html()->modelForm($internship, 'PATCH', route('admin.opportunity.internship.update', $internship))->class('form-horizontal')->open() }}

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        {{ __('labels.backend.opportunity.internships.management') }}
                        <small class="text-muted">{{ __('labels.backend.opportunity.internships.edit') }}</small>
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr />

            @include('backend.opportunity.internship.fields')
        </div><!--card-body-->
    </div><!--card-->

    <div class="card">
        <div class="card-footer">
            <div class="row">
                <div class="col">
                    {{ form_cancel(route('admin.opportunity.internship.index'), __('buttons.general.cancel')) }}
                </div><!--col-->

                <div class="col text-right">
                    {{ form_submit(__('buttons.general.crud.edit')) }}
                </div><!--col-->
            </div><!--row-->
        </div><!--card-footer-->
    </div><!--card-->

{{ html()->closeModelForm() }}
@endsection
