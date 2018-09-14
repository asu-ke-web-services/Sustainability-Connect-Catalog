@extends ('backend.layouts.app')

@section ('title', __('Opportunity Status') . ' Management | Edit ' . __('Opportunity Status'))

@section('content')
{{ html()->modelForm($opportunity_status, 'PATCH', route('admin.lookup.opportunity_status.update', $opportunity_status))->class('form-horizontal')->open() }}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        {{ __('Opportunity Status Management') }}
                        <small class="text-muted">{{ __('Edit Opportunity Status') }}</small>
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr />

            <div class="row mt-4">
                <div class="col">

                    @component('includes.components.form.input', [
                        'type'        => 'number',
                        'name'        => 'order',
                        'label'       => 'Order',
                        'attributes'  => [
                            'required' => 'required',
                        ],
                        'object'      => $affiliation ?? null,
                    ])@endcomponent

                    @component('includes.components.form.input', [
                        'name'        => 'name',
                        'label'       => 'Name',
                        'help_text'   => 'Names can be up to 250 characters long',
                        'attributes'  => [
                            'required' => 'required',
                            'maxlength' => '250',
                        ],
                        'object'      => $affiliation ?? null,
                    ])@endcomponent

                    @component('includes.components.form.select', [
                        'name'        => 'opportunity_type_id',
                        'label'       => 'Opportunity Type',
                        'placeholder' => 'Select opportunity type...',
                        'optionList'  => $types,
                        'object'      => $affiliation ?? null,
                    ])@endcomponent

                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->

        <div class="card-footer">
            <div class="row">
                <div class="col">
                    {{ form_cancel(route('admin.lookup.opportunity_status.index'), 'Cancel') }}
                </div><!--col-->

                <div class="col text-right">
                    {{ form_submit('Edit') }}
                </div><!--col-->
            </div><!--row-->
        </div><!--card-footer-->
    </div><!--card-->
{{ html()->closeModelForm() }}
@endsection
