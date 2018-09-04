@extends ('backend.layouts.app')

@section ('title', __('Affiliation') . ' Management | Create New ' . __('Affiliation'))

@section('content')
{{ html()->form('POST', route('admin.lookup.affiliation.store'))->class('form-horizontal')->open() }}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        {{ __('Affiliation Management') }}
                        <small class="text-muted">{{ __('Create New Affiliation') }}</small>
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

                    @component('includes.components.form.checkbox', [
                        'name'        => 'access_control',
                        'label'       => 'Access Control?',
                        'object'      => $affiliation ?? null,
                    ])@endcomponent

                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->

        <div class="card-footer">
            <div class="row">
                <div class="col">
                    {{ form_cancel(route('admin.lookup.affiliation.index'), 'Cancel') }}
                </div><!--col-->

                <div class="col text-right">
                    {{ form_submit('Create') }}
                </div><!--col-->
            </div><!--row-->
        </div><!--card-footer-->
    </div><!--card-->
{{ html()->form()->close() }}
@endsection
