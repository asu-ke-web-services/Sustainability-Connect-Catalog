@extends ('backend.layouts.app')

@section ('title', __('Opportunity Type') . ' Management | Edit ' . __('Opportunity Type'))

@section('content')
{{ html()->modelForm($opportunity_type, 'PATCH', route('admin.lookup.opportunity_type.update', $opportunity_type))->class('form-horizontal')->open() }}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        {{ __('Opportunity Type Management') }}
                        <small class="text-muted">{{ __('Edit Opportunity Type') }}</small>
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr />

            <div class="row mt-4">
                <div class="col">

                    <div class="form-group row">
                        {{ html()->label(__('Order'))
                            ->class('col-md-2 form-control-label')
                            ->for('order') }}

                        <div class="col-md-10">
                            {{ html()->text('order')
                                ->class('form-control')
                                ->placeholder(__('Order')) }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('Name'))
                            ->class('col-md-2 form-control-label')
                            ->for('name') }}

                        <div class="col-md-10">
                            {{ html()->text('name')
                                ->class('form-control')
                                ->placeholder(__('Name'))
                                ->attribute('maxlength', 191)
                                ->required() }}
                        </div><!--col-->
                    </div><!--form-group-->

                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->

        <div class="card-footer">
            <div class="row">
                <div class="col">
                    {{ form_cancel(route('admin.lookup.opportunity_type.index'), 'Cancel') }}
                </div><!--col-->

                <div class="col text-right">
                    {{ form_submit('Edit') }}
                </div><!--col-->
            </div><!--row-->
        </div><!--card-footer-->
    </div><!--card-->
{{ html()->closeModelForm() }}
@endsection
