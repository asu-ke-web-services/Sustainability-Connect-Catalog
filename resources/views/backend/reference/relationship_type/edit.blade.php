@extends ('backend.layouts.app')

@section ('title', __('Relationship Type') . ' Management | Edit ' . __('Relationship Type'))

@section('content')
{{ html()->modelForm($relationshipType, 'PATCH', route('admin.reference.relationship_type.update', $relationshipType))->class('form-horizontal')->open() }}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        @lang('Relationship Type Management')
                        <small class="text-muted">@lang('Edit Relationship Type')</small>
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr />

            <div class="row mt-4">
                <div class="col">

                    @include('backend.reference.relationship_type.fields')

                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->

        <div class="card-footer">
            <div class="row">
                <div class="col">
                    {{ form_cancel(route('admin.reference.relationship_type.index'), 'Cancel') }}
                </div><!--col-->

                <div class="col text-right">
                    {{ form_submit(__('buttons.general.submit')) }}
                </div><!--col-->
            </div><!--row-->
        </div><!--card-footer-->
    </div><!--card-->
{{ html()->closeModelForm() }}
@endsection
