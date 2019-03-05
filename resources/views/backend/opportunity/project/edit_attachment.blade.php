@extends ('backend.layouts.app')

@section ('title', __('labels.backend.opportunity.projects.management') . ' | ' . __('Upload Attachment'))

@section('content')
{{ html()->modelForm($project, 'POST', route('admin.opportunity.project.store_attachment', $project))->acceptsFiles()->class('form-horizontal')->open() }}

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        {{ __('labels.backend.opportunity.projects.management') }}
                        <small class="text-muted">{{ __('Upload Attachment') }}</small>
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr />

            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-5">
                            <h4 class="card-title mb-0">
                                Upload Attachments
                            </h4>
                        </div><!--col-->
                    </div><!--row-->

                    <hr />

                    <div class="row mt-4">
                        <div class="col">

                            <!-- File Upload Field -->
                            @component('backend.includes.components.form.input', [
                                'type'        => 'file',
                                'name'        => 'file_attachment',
                                'label'       => 'File Attachment',
                                'object'      => $media ?? null,
                            ])@endcomponent

                        </div><!--col-->
                    </div><!--row-->

                    <div class="row mt-4">
                        <div class="col">

                            <div class="form-group row">
                                {{ html()->label('Visibility')
                                        ->class('col-md-2 form-control-label')
                                        ->for('attachment_status') }}
                                <div class="col-md-10">
                                    {{ html()->select(
                                        'attachment_status',
                                        $attachmentStatuses,
                                        old('attachment_status') ?: ($attachment->getCustomProperty('visibility') ?? null)
                                    )
                                        ->class('form-control selectize-single')
                                        ->placeholder('Select attachment visibility...')
                                        ->attribute('required')
                                    }}

                                    @if ($errors->has($name))
                                        <span class="help-block">
                                            <strong>{{ $errors->first($name) }}</strong>
                                        </span>
                                    @elseif (isset($help_text))
                                        <span class="help-block">{{ $help_text }}</span>
                                    @endif
                                </div><!--col-->
                            </div><!--form-group-->

                        </div><!--col-->
                    </div><!--row-->
                </div><!--card-body-->
            </div><!--card-->

        </div><!--card-body-->
    </div><!--card-->

    <div class="card">
        <div class="card-footer">
            <div class="row">
                <div class="col">
                    {{ form_cancel( url()->previous(), __('buttons.general.cancel') ) }}
                </div><!--col-->

                <div class="col text-right">
                    {{ form_submit( __('buttons.general.submit') ) }}
                </div><!--col-->
            </div><!--row-->
        </div><!--card-footer-->
    </div><!--card-->

{{ html()->closeModelForm() }}
@endsection
