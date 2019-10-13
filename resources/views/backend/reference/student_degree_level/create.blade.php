@extends ('backend.layouts.app')

@section ('title', __('Student Degree Level') . ' Management | Create New ' . __('Student Degree Level'))

@section('content')
{{ html()->form('POST', route('admin.reference.student_degree_level.store'))->class('form-horizontal')->open() }}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        @lang('Student Degree Level Management')
                        <small class="text-muted">@lang('Create New Student Degree Level')</small>
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr />

            <div class="row mt-4">
                <div class="col">

                    @include('backend.reference.student_degree_level.fields')

                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->

        <div class="card-footer">
            <div class="row">
                <div class="col">
                    {{ form_cancel(route('admin.reference.student_degree_level.index'), 'Cancel') }}
                </div><!--col-->

                <div class="col text-right">
                    {{ form_submit(__('buttons.general.submit')) }}
                </div><!--col-->
            </div><!--row-->
        </div><!--card-footer-->
    </div><!--card-->
{{ html()->form()->close() }}
@endsection
