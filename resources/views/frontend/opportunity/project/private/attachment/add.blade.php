@extends ('frontend.layouts.coreui')

@section ('title', __('labels.backend.opportunity.projects.management') . ' | ' . __('Upload Attachment'))

@section('content')
{{ html()->modelForm($project, 'POST', route('frontend.opportunity.project.private.attachment.store', $project))->acceptsFiles()->class('form-horizontal')->open() }}

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        Project
                        <small class="text-muted">Upload Attachment</small>
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr />

            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-5">
                            <h4 class="card-title mb-0">
                                Upload Attachment
                            </h4>
                        </div><!--col-->
                    </div><!--row-->

                    <hr />

                    <div class="row mt-4">
                        <div class="col">

                            <!-- File Upload Field -->
                            @component('frontend.includes.coreui.components.form.input', [
                                'type'        => 'file',
                                'name'        => 'file_attachment',
                                'label'       => 'File Attachment',
                            ])@endcomponent

                            <div class="form-group row">
                                {{ html()->label('Visibility *')
                                        ->class('col-md-2 form-control-label')
                                        ->for('attachment_status') }}
                                <div class="col-md-10">
                                    {{ html()->select(
                                        'attachment_status',
                                        $attachmentStatuses,
                                        old('attachment_status') ?: null
                                    )
                                        ->class('form-control selectize-single')
                                        ->placeholder('Select attachment visibility...')
                                        ->attribute('required')
                                    }}
                                </div><!--col-->
                            </div><!--form-group-->

                            <div class="form-group row">
                                {{ html()->label('Attachment Type *')
                                        ->class('col-md-2 form-control-label')
                                        ->for('attachment_type') }}
                                <div class="col-md-10">
                                    {{ html()->select(
                                        'attachment_type',
                                        $attachmentTypes,
                                        old('attachment_type') ?: null
                                    )
                                        ->class('form-control selectize-single')
                                        ->placeholder('Select attachment type...')
                                        ->attribute('required')
                                    }}
                                </div><!--col-->
                            </div><!--form-group-->

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
