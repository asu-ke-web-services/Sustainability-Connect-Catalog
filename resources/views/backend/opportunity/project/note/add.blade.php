@extends ('backend.layouts.app')

@section ('title', 'Project | ' . __('Post Note'))

@section('content')
{{ html()->modelForm($project, 'POST', route('admin.opportunity.project.note.store', $project))->acceptsFiles()->class('form-horizontal')->open() }}

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        Project
                        <small class="text-muted">Post Note</small>
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr />

            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-5">
                            <h4 class="card-title mb-0">
                                Post Note
                            </h4>
                        </div><!--col-->
                    </div><!--row-->

                    <hr />

                    <div class="row mt-4">
                        <div class="col">

                    <!-- Description Field -->
                    @component('frontend.includes.coreui.components.form.richtext', [
                        'name'        => 'body',
                        'label'       => 'Project Note *',
                        // 'help_text'   => 'What specific sustainability problem do you need solved?',
                        'attributes' => [
                            'required' => 'required',
                            'rows' => 10,
                        ],
                        'object'      => $project ?? null,
                    ])@endcomponent

                        </div><!--col-->
                    </div><!--row-->
                    <div class="row">
                        <div class="col">
                            {{ form_cancel( url()->previous(), __('buttons.general.cancel') ) }}
                        </div><!--col-->

                        <div class="col text-right">
                            {{ form_submit( __('buttons.general.submit') ) }}
                        </div><!--col-->
                    </div><!--row-->
                </div><!--card-body-->
            </div><!--card-->

        </div><!--card-body-->
    </div><!--card-->

{{ html()->closeModelForm() }}
@endsection

@push('scripts')
    <script src="https://cdn.ckeditor.com/4.11.3/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'body' );
    </script>
@endpush
