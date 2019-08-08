
            <div class="row mt-4">
                <div class="col">

                    <div class="form-group row">
                        <label class="col-md-2 form-control-label">[Required Fields *]</label>

                    </div>

                    <!-- Project Name Field -->
                    @component('frontend.includes.coreui.components.form.input', [
                        'name'        => 'name',
                        'label'       => 'Name *',
                        'help_text'   => 'Names can be up to 1024 characters long',
                        'attributes'  => [
                            'required' => 'required',
                            'maxlength' => '1024',
                        ],
                        'object'      => $project ?? null,
                    ])@endcomponent

                    <!-- Description Field -->
                    @component('frontend.includes.coreui.components.form.richtext', [
                        'name'        => 'description',
                        'label'       => 'Describe the Project *',
                        'help_text'   => 'What specific sustainability problem do you need solved?',
                        'attributes' => [
                            'required' => 'required',
                            'rows' => 5,
                        ],
                        'object'      => $project ?? null,
                    ])@endcomponent

                    <!-- Envisioned Solution Field -->
                    @component('frontend.includes.coreui.components.form.richtext', [
                        'name'        => 'implementation_paths',
                        'label'       => 'Envisioned Solution *',
                        'help_text'   => 'What sustainability solution do you envision, and how will that solution be derived from this project?',
                        'attributes' => [
                            'required' => 'required',
                            'rows' => 5,
                        ],
                        'object'      => $project ?? null,
                    ])@endcomponent

                    <!-- Project Deliverables Field -->
                    @component('frontend.includes.coreui.components.form.richtext', [
                        'name'        => 'sustainability_contribution',
                        'label'       => 'Project Deliverables *',
                        'help_text'   => 'What deliverables/end product do you expect?',
                        'attributes' => [
                            'required' => 'required',
                            'rows' => 5,
                        ],
                        'object'      => $project ?? null,
                    ])@endcomponent

                    <!-- Success Story Field -->
                    @component('frontend.includes.coreui.components.form.input', [
                        'type'        => 'url',
                        'name'        => 'success_story',
                        'label'       => 'Success Story',
                        'help_text'   => 'If a Success Story is published for this project, enter the url here.',
                        'object'      => $project ?? null,
                    ])@endcomponent

                    <!-- Library Collection Field -->
                    @component('frontend.includes.coreui.components.form.input', [
                        'type'        => 'url',
                        'name'        => 'library_collection',
                        'label'       => 'Library Collection',
                        'help_text'   => 'If this project has been published in the ASU Library Collection, enter the url to that page.',
                        'object'      => $project ?? null,
                    ])@endcomponent

                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->
    </div><!--card-->

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        {{ __('labels.frontend.opportunity.projects.locations') }}
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr />

            <div class="row mt-4">
                <div class="col">

                    <label for="addresses">Location:</label>
                    @component('frontend.includes.coreui.components.form.input', [
                        'name'        => 'city',
                        'label'       => 'City: *',
                        'attribute'   => 'required',
                        'object'      => $project->addresses[0] ?? null,
                    ])@endcomponent

                    @component('frontend.includes.coreui.components.form.input', [
                        'name'        => 'state',
                        'label'       => 'State/Prov: *',
                        'attribute'   => 'required',
                        'object'      => $project->addresses[0] ?? null,
                    ])@endcomponent

                    @component('frontend.includes.coreui.components.form.input', [
                        'name'        => 'country',
                        'label'       => 'Country:',
                        'object'      => $project->addresses[0] ?? null,
                    ])@endcomponent

                    @component('frontend.includes.coreui.components.form.textarea', [
                        'name'        => 'comment',
                        'label'       => 'Location Comment:',
                        'object'      => $project->addresses[0] ?? null,
                    ])@endcomponent

                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->
    </div><!--card-->

    <div id="card_application_listing" class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        {{ __('labels.frontend.opportunity.projects.accept_application') }}
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr />

            <div class="row mt-4">
                <div class="col">

                    <!-- Listing Starts Field -->
                    @component('frontend.includes.coreui.components.form.date', [
                        'name'        => 'listing_start_at',
                        'label'       => 'Listing Starts',
                        'placeholder' => 'mm/dd/yyyy',
                        'help_text'   => 'Required if you wish to publish in the catalog Active listings',
                        'object'      => $project ?? null,
                    ])@endcomponent

                    <!-- Listing Ends Field -->
                    @component('frontend.includes.coreui.components.form.date', [
                        'name'        => 'listing_end_at',
                        'label'       => 'Listing Ends',
                        'placeholder' => 'mm/dd/yyyy',
                        'help_text'   => 'Required if you wish to publish in the catalog Active listings',
                        'object'      => $project ?? null,
                    ])@endcomponent

                    <!-- Application Deadline Field -->
                    @component('frontend.includes.coreui.components.form.date', [
                        'name'        => 'application_deadline_at',
                        'label'       => 'Application Deadline',
                        'placeholder' => 'mm/dd/yyyy',
                        'help_text'   => 'Enter date-format deadline (Leave blank if Text Deadline used)',
                        'object'      => $project ?? null,
                    ])@endcomponent

                    <!-- Application Deadline Text Field -->
                    @component('frontend.includes.coreui.components.form.input', [
                        'name'      => 'application_deadline_text',
                        'label'     => 'Application Deadline Text',
                        'help_text' => 'Enter text-format deadline; e.g. "When Filled" (Leave blank if Date field used)',
                        'object'    => $project ?? null,
                    ])@endcomponent

                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->
    </div><!--card-->

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                            {{ __('labels.frontend.opportunity.projects.project_details') }}
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr />

            <div class="row mt-4">
                <div class="col">

                    <!-- Opportunity Status Field -->
                    @component('frontend.includes.coreui.components.form.select', [
                        'name'        => 'opportunity_status_id',
                        'label'       => 'Project Status *',
                        'placeholder' => 'Select project status...',
                        'attribute'   => 'required',
                        'optionList'  => $opportunityStatuses,
                        'object'      => $project ?? null,
                    ])@endcomponent

                    <!-- Opportunity Review Status Field -->
                    @component('frontend.includes.coreui.components.form.select', [
                        'name'        => 'review_status_id',
                        'label'       => 'Project Review Status',
                        'placeholder' => 'Select review status...',
                        'optionList'  => $opportunityReviewStatuses,
                        'object'      => $project ?? null,
                    ])@endcomponent

                    <!-- Opportunity Begins Field -->
                    @component('frontend.includes.coreui.components.form.date', [
                        'name'        => 'opportunity_start_at',
                        'label'       => 'Project Start Date *',
                        'attribute'   => 'required',
                        'object'      => $project ?? null,
                    ])@endcomponent

                    <!-- Opportunity Ends Field -->
                    @component('frontend.includes.coreui.components.form.date', [
                        'name'        => 'opportunity_end_at',
                        'label'       => 'Project End Date *',
                        'attribute'   => 'required',
                        'object'      => $project ?? null,
                    ])@endcomponent

                    <!-- Affiliations Field -->
                    @component('frontend.includes.coreui.components.form.multiselect', [
                        'name'        => 'affiliations',
                        'label'       => 'Affiliations',
                        'help_text' => 'Select one or more affiliations...',
                        'optionList'  => $affiliations,
                        'multivalue'  => true,
                        'object'      => $project ?? null,
                    ])@endcomponent

                    <!-- Categories Field -->
                    @component('frontend.includes.coreui.components.form.multiselect', [
                        'name'        => 'categories',
                        'label'       => 'Categories',
                        'help_text' => 'Select one or more categories...',
                        'optionList'  => $categories,
                        'multivalue'  => true,
                        'object'      => $project ?? null,
                    ])@endcomponent

                    <!-- Keywords Field -->
                    @component('frontend.includes.coreui.components.form.multiselect', [
                        'name'        => 'keywords',
                        'label'       => 'Keywords',
                        'help_text'   => 'Select one or more keywords...',
                        'optionList'  => $keywords,
                        'multivalue'  => true,
                        'object'      => $project ?? null,
                    ])@endcomponent

                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->
    </div><!--card-->

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                            {{ __('labels.frontend.opportunity.projects.applicant_details') }}
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr />

            <div class="row mt-4">
                <div class="col">

                    <!-- How Many Students are you looking for? Undergraduate or Graduate? -->

                    <!-- Qualifications Field -->
                    @component('frontend.includes.coreui.components.form.richtext', [
                        'name'        => 'qualifications',
                        'label'       => 'Qualifications',
                        'help_text'   => 'What specific skills should the applying students possess?',
                        'attributes' => [
                            'rows' => 5,
                        ],
                        'object'      => $project ?? null,
                    ])@endcomponent

                    <!-- Responsibilities Field -->
                    @component('frontend.includes.coreui.components.form.richtext', [
                        'name'        => 'responsibilities',
                        'label'       => 'Student Responsibilities',
                        'help_text'   => 'What will the student responsibilities be?',
                        'attributes' => [
                            'rows' => 5,
                        ],
                        'object'      => $project ?? null,
                    ])@endcomponent

                    <!-- Learning Outcomes Field -->
                    @component('frontend.includes.coreui.components.form.richtext', [
                        'name'        => 'learning_outcomes',
                        'label'       => 'Learning Outcomes',
                        'help_text'   => 'Describe what the student might learn from this experience.',
                        'attributes' => [
                            'rows' => 5,
                        ],
                        'object'      => $project ?? null,
                    ])@endcomponent

                    <!-- Compensation Field -->
                    @component('frontend.includes.coreui.components.form.richtext', [
                        'name'        => 'compensation',
                        'label'       => 'Student Compensation and Project Funds',
                        'help_text'   => 'Describe how students will be compensated in this project. If the student will not be paid, list other forms of compensation (metro pass, re-usable water bottles, etc.)',
                        'attributes' => [
                            'rows' => 5,
                        ],
                        'object'      => $project ?? null,
                    ])@endcomponent

                    <!-- Budget Type Field -->
                    @component('frontend.includes.coreui.components.form.select', [
                        'name'        => 'budget_type_id',
                        'label'       => 'Budget Available',
                        'help_text'   => 'Select budget type for the project...',
                        'optionList'  => $budgetTypes,
                        'object'      => $project ?? null,
                    ])@endcomponent

                    <!-- Budget Amount Field -->
                    @component('frontend.includes.coreui.components.form.input', [
                        'name'        => 'budget_amount',
                        'label'       => 'Budget Amount',
                        'help_text'   => 'If this project has a budget, state how large that budget is.',
                        'object'      => $project ?? null,
                    ])@endcomponent

                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->
    </div><!--card-->

@if ('create' === $formMode)
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
                    @component('backend.includes.components.form.input', [
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
        </div><!--card-body-->
    </div><!--card-->
@endif

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        {{ __('labels.frontend.opportunity.projects.application_process') }}
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr />

            <div class="row mt-4">
                <div class="col">

                    <!-- Application Instructions Field -->
                    @component('frontend.includes.coreui.components.form.richtext', [
                        'name'        => 'application_instructions',
                        'label'       => 'Application Instructions:',
                        'help_text'   => 'Describe the steps the participant must follow to request admission into the project.',
                        'attributes' => [
                            'rows' => 5,
                        ],
                        'object'      => $project ?? null,
                    ])@endcomponent

                    <!-- Contact details -->

                    <!-- Partner Organization Field -->
                    @component('frontend.includes.coreui.components.form.select', [
                        'name'        => 'organization_id',
                        'label'       => 'Project Partner Organization',
                        'optionList'  => $organizations,
                        'object'      => $project->organization ?? null,
                    ])@endcomponent
{{--
                    <!-- Modal Add New Organization -->
                    @component('frontend.includes.coreui.components.form.button', [
                        'name'       => 'btn_add_organization',
                        'label'      => ' ',
                        'class'      => 'btn btn-primary disabled',
                        'text'       => 'Add New Organization (TODO)',
                        'attribute'  => 'disabled',
                    ])@endcomponent --}}

                    <!-- Opportunity Supervisor Field -->
                    @component('frontend.includes.coreui.components.form.select', [
                        'name'        => 'supervisor_user_id',
                        'label'       => 'Project Supervisor',
                        'help_text'   => 'Begin typing to find user',
                        'optionList'  => $users,
                        'object'      => $project->supervisorUser ?? null,
                    ])@endcomponent

                    <!-- Program Lead Field -->
                    @component('frontend.includes.coreui.components.form.input', [
                        'name'        => 'program_lead',
                        'label'       => 'ASU Program Lead',
                        'help_text'   => 'If this project is part of a larger program, which is run through the School of Sustainability, GIOS, or another ASU initiative, then provide the name of the leader of that bigger program here. The program leader is typically different from the Project Supervisor listed above.',
                        'object'      => $project ?? null,
                    ])@endcomponent

                </div><!--col-->
            </div><!--row-->

            <div class="row">
                <div class="col">
                    {{ form_cancel(url()->previous(), __('buttons.general.cancel')) }}
                </div><!--col-->

                <div class="col text-right">
                    {{ form_submit(__('buttons.general.submit')) }}
                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->
    </div><!--card-->

@push('after-styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/css/tempusdominus-bootstrap-4.min.css" />
@endpush

@push('scripts')
    <script src="https://cdn.ckeditor.com/4.11.3/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'description' );
        CKEDITOR.replace( 'implementation_paths' );
        CKEDITOR.replace( 'sustainability_contribution' );
        CKEDITOR.replace( 'qualifications' );
        CKEDITOR.replace( 'responsibilities' );
        CKEDITOR.replace( 'learning_outcomes' );
        CKEDITOR.replace( 'compensation' );
        CKEDITOR.replace( 'application_instructions' );

        $('#project-form').validate({
            rules: {
                "name": {
                    required: true,
                    maxlength: 1024
                },
                "opportunity_status_id": 'required',
                "opportunity_start_at": 'required',
                "opportunity_end_at": 'required',
                "city": 'required',
                "state": 'required'
            },
            messages: {
                "name": {
                    required: 'Please enter the project name',
                    maxlength: 'The project name may not be longer than 1024 characters'
                },
                "opportunity_status_id": 'Please select the project status',
                "opportunity_start_at": 'Please enter the project start date',
                "opportunity_end_at": 'Please enter the project end date',
                "city": 'Please enter the internship city',
                "state": 'Please enter the internship state'
            },
            errorElement: 'em',
            errorPlacement: function errorPlacement(error, element) {
                error.addClass('invalid-feedback');

                if (element.prop('type') === 'checkbox') {
                    error.insertAfter(element.parent('label'));
                } else {
                    error.insertAfter(element);
                }
            },
            // eslint-disable-next-line object-shorthand
            highlight: function highlight(element) {
                $(element).addClass('is-invalid').removeClass('is-valid');
            },
            // eslint-disable-next-line object-shorthand
            unhighlight: function unhighlight(element) {
                $(element).addClass('is-valid').removeClass('is-invalid');
            }
        });
    </script>
@endpush
