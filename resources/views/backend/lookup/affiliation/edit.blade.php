@extends ('backend.layouts.app')

@section ('title', __('Affiliation') . ' Management | Edit ' . __('Affiliation'))

@section('content')
{{ html()->modelForm($affiliation, 'PATCH', route('admin.lookup.affiliation.update', $affiliation))->class('form-horizontal')->open() }}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        {{ __('Affiliation Management') }}
                        <small class="text-muted">{{ __('Edit Affiliation') }}</small>
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr />

            <div class="row mt-4">
                <div class="col">

                    @include('backend.lookup.affiliation.fields')

                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->

        <div class="card-footer">
            <div class="row">
                <div class="col">
                    {{ form_cancel(route('admin.lookup.affiliation.index'), 'Cancel') }}
                </div><!--col-->

                <div class="col text-right">
                    {{ form_submit('Edit') }}
                </div><!--col-->
            </div><!--row-->
        </div><!--card-footer-->
    </div><!--card-->
{{ html()->closeModelForm() }}
@endsection
