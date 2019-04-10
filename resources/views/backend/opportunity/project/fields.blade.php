
            <div class="row mt-4">
                <div class="col">

                    <div class="form-group row">
                        <label class="col-md-2 form-control-label">[Required Fields *]</label>

                    </div>

                    <!-- Project Name Field -->
                    @component('backend.includes.components.form.input', [
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
                    @component('backend.includes.components.form.richtext', [
                        'name'        => 'description',
                        'label'       => 'Describe the Project *',
                        'help_text'   => 'What specific sustainability problem do you need solved?',
                        'attributes' => [
                            'required' => 'required',
                            'rows' => 5,
                        ],
                        'object'      => $project ?? null,
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
                        {{ __('labels.backend.opportunity.projects.accept_application') }}
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr />

            <div class="row mt-4">
                <div class="col">

                    <!-- Listing Starts Field -->
                    @component('backend.includes.components.form.date', [
                        'name'        => 'listing_start_at',
                        'label'       => 'Listing Starts',
                        'placeholder' => 'mm/dd/yyyy',
                        'help_text'   => 'Required if you wish to publish in the catalog Active listings',
                        'object'      => $project ?? null,
                    ])@endcomponent

                    <!-- Listing Ends Field -->
                    @component('backend.includes.components.form.date', [
                        'name'        => 'listing_end_at',
                        'label'       => 'Listing Ends',
                        'placeholder' => 'mm/dd/yyyy',
                        'help_text'   => 'Required if you wish to publish in the catalog Active listings',
                        'object'      => $project ?? null,
                    ])@endcomponent

                    <!-- Application Deadline Field -->
                    @component('backend.includes.components.form.date', [
                        'name'        => 'application_deadline_at',
                        'label'       => 'Application Deadline',
                        'placeholder' => 'mm/dd/yyyy',
                        'help_text'   => 'Enter date-format deadline (Leave blank if Text Deadline used)',
                        'object'      => $project ?? null,
                    ])@endcomponent

                    <!-- Application Deadline Text Field -->
                    @component('backend.includes.components.form.input', [
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
                            {{ __('labels.backend.opportunity.projects.project_details') }}
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr />

            <div class="row mt-4">
                <div class="col">

                    <!-- Opportunity Status Field -->
                    @component('backend.includes.components.form.select', [
                        'name'        => 'opportunity_status_id',
                        'label'       => 'Project Status *',
                        'placeholder' => 'Select project status...',
                        'attribute'   => 'required',
                        'optionList'  => $opportunityStatuses,
                        'object'      => $project ?? null,
                    ])@endcomponent

                    <!-- Opportunity Review Status Field -->
                    @component('backend.includes.components.form.select', [
                        'name'        => 'review_status_id',
                        'label'       => 'Project Review Status',
                        'placeholder' => 'Select review status...',
                        'optionList'  => $opportunityReviewStatuses,
                        'object'      => $project ?? null,
                    ])@endcomponent

                    <!-- Opportunity Begins Field -->
                    @component('backend.includes.components.form.date', [
                        'name'        => 'opportunity_start_at',
                        'label'       => 'Project Start Date',
                        'placeholder' => 'mm/dd/yyyy',
                        'object'      => $project ?? null,
                    ])@endcomponent

                    <!-- Opportunity Ends Field -->
                    @component('backend.includes.components.form.date', [
                        'name'        => 'opportunity_end_at',
                        'label'       => 'Project End Date',
                        'placeholder' => 'mm/dd/yyyy',
                        'object'      => $project ?? null,
                    ])@endcomponent

                    <!-- Envisioned Solution Field -->
                    @component('backend.includes.components.form.richtext', [
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
                    @component('backend.includes.components.form.richtext', [
                        'name'        => 'sustainability_contribution',
                        'label'       => 'Project Deliverables *',
                        'help_text'   => 'What deliverables/end product do you expect?',
                        'attributes' => [
                            'required' => 'required',
                            'rows' => 5,
                        ],
                        'object'      => $project ?? null,
                    ])@endcomponent

                    <!-- Affiliations Field -->
                    @component('backend.includes.components.form.multiselect', [
                        'name'        => 'affiliations',
                        'label'       => 'Affiliations',
                        'help_text' => 'Select one or more affiliations...',
                        'optionList'  => $affiliations,
                        'multivalue'  => true,
                        'object'      => $project ?? null,
                    ])@endcomponent

                    <!-- Categories Field -->
                    @component('backend.includes.components.form.multiselect', [
                        'name'        => 'categories',
                        'label'       => 'Categories',
                        'help_text' => 'Select one or more categories...',
                        'optionList'  => $categories,
                        'multivalue'  => true,
                        'object'      => $project ?? null,
                    ])@endcomponent

                    <!-- Keywords Field -->
                    @component('backend.includes.components.form.multiselect', [
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
                        {{ __('labels.backend.opportunity.projects.locations') }}
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr />

            <div class="row mt-4">
                <div class="col">

                    <label for="addresses">Location:</label>
                    @component('backend.includes.components.form.input', [
                        'name'        => 'city',
                        'label'       => 'City: *',
                        'attribute'   => 'required',
                        'object'      => $project->addresses[0] ?? null,
                    ])@endcomponent

                    @component('backend.includes.components.form.input', [
                        'name'        => 'state',
                        'label'       => 'State/Prov: *',
                        'attribute'   => 'required',
                        'object'      => $project->addresses[0] ?? null,
                    ])@endcomponent

                    @component('backend.includes.components.form.input', [
                        'name'        => 'country',
                        'label'       => 'Country:',
                        'object'      => $project->addresses[0] ?? null,
                    ])@endcomponent

                    @component('backend.includes.components.form.textarea', [
                        'name'        => 'comment',
                        'label'       => 'Location Comment:',
                        'object'      => $project->addresses[0] ?? null,
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
                            {{ __('labels.backend.opportunity.projects.applicant_details') }}
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr />

            <div class="row mt-4">
                <div class="col">

                    <!-- How Many Students are you looking for? Undergraduate or Graduate? -->

                    <!-- Qualifications Field -->
                    @component('backend.includes.components.form.richtext', [
                        'name'        => 'qualifications',
                        'label'       => 'Qualifications',
                        'help_text'   => 'What specific skills should the applying students possess?',
                        'attributes' => [
                            'rows' => 5,
                        ],
                        'object'      => $project ?? null,
                    ])@endcomponent

                    <!-- Responsibilities Field -->
                    @component('backend.includes.components.form.richtext', [
                        'name'        => 'responsibilities',
                        'label'       => 'Student Responsibilities',
                        'help_text'   => 'What will the student responsibilities be?',
                        'attributes' => [
                            'rows' => 5,
                        ],
                        'object'      => $project ?? null,
                    ])@endcomponent

                    <!-- Learning Outcomes Field -->
                    @component('backend.includes.components.form.richtext', [
                        'name'        => 'learning_outcomes',
                        'label'       => 'Learning Outcomes',
                        'help_text'   => 'Describe what the student might learn from this experience.',
                        'attributes' => [
                            'rows' => 5,
                        ],
                        'object'      => $project ?? null,
                    ])@endcomponent

                    <!-- Compensation Field -->
                    @component('backend.includes.components.form.richtext', [
                        'name'        => 'compensation',
                        'label'       => 'Student Compensation and Project Funds',
                        'help_text'   => 'Describe how students will be compensated in this project. If the student will not be paid, list other forms of compensation (metro pass, re-usable water bottles, etc.)',
                        'attributes' => [
                            'rows' => 5,
                        ],
                        'object'      => $project ?? null,
                    ])@endcomponent

                    <!-- Budget Type Field -->
                    @component('backend.includes.components.form.select', [
                        'name'        => 'budget_type_id',
                        'label'       => 'Budget Available',
                        'help_text'   => 'Select budget type for the project...',
                        'optionList'  => $budgetTypes,
                        'object'      => $project ?? null,
                    ])@endcomponent

                    <!-- Budget Amount Field -->
                    @component('backend.includes.components.form.input', [
                        'name'        => 'budget_amount',
                        'label'       => 'Budget Amount',
                        'help_text'   => 'If this project has a budget, state how large that budget is.',
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
                        {{ __('labels.backend.opportunity.projects.application_process') }}
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr />

            <div class="row mt-4">
                <div class="col">

                    <!-- Application Instructions Field -->
                    @component('backend.includes.components.form.richtext', [
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
                    @component('backend.includes.components.form.select', [
                        'name'        => 'organization_id',
                        'label'       => 'Project Partner Organization',
                        'optionList'  => $organizations,
                        'object'      => $project->organization ?? null,
                    ])@endcomponent

                    <!-- Modal Add New Organization -->
                    @component('backend.includes.components.form.button', [
                        'name'       => 'btn_add_organization',
                        'label'      => ' ',
                        'class'      => 'btn btn-primary disabled',
                        'text'       => 'Add New Organization (TODO)',
                        'attribute'  => 'disabled',
                    ])@endcomponent

                    <!-- Opportunity Supervisor Field -->
                    @component('backend.includes.components.form.select', [
                        'name'        => 'supervisor_user_id',
                        'label'       => 'Project Supervisor',
                        'help_text'   => 'Begin typing to find user',
                        'optionList'  => $users,
                        'object'      => $project->supervisorUser ?? null,
                    ])@endcomponent

                    <!-- Program Lead Field -->
                    @component('backend.includes.components.form.input', [
                        'name'        => 'program_lead',
                        'label'       => 'ASU Program Lead',
                        'help_text'   => 'If this project is part of a larger program, which is run through the School of Sustainability, GIOS, or another ASU initiative, then provide the name of the leader of that bigger program here. The program leader is typically different from the Project Supervisor listed above.',
                        'object'      => $project ?? null,
                    ])@endcomponent

                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->
    </div><!--card-->

    <div class="card">
        <div class="card-body">
            <div class="row mt-4">
                <div class="col">

                    <!-- Parent Opportunity Field -->
                    {{--@component('backend.includes.components.form.select', [--}}
                        {{--'name'        => 'parent_opportunity_id',--}}
                        {{--'label'       => 'Predecessor Opportunity',--}}
                        {{--'help_text'   => 'Begin typing to find opportunity',--}}
                        {{--'optionList'  => $opportunities,--}}
                        {{--'object'      => $project->parentOpportunity ?? null,--}}
                    {{--])@endcomponent--}}

                    <!-- Success Story Field -->
                    @component('backend.includes.components.form.input', [
                        'type'        => 'url',
                        'name'        => 'success_story',
                        'label'       => 'Success Story',
                        'help_text'   => 'If a Success Story is published for this project, enter the url here.',
                        'object'      => $project ?? null,
                    ])@endcomponent

                    <!-- Library Collection Field -->
                    @component('backend.includes.components.form.input', [
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

@section('javascript')
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
    </script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js" ></script>
    <script>
        //# sourceMappingURL=text-editor.js.map
        $('#project-form').validate({
            rules: {
                "name": {
                    required: true,
                    maxlength: 1024
                },
                // "description": 'required',
                "opportunity_status_id": 'required',
                // "implementation_paths": 'required',
                // "sustainability_contribution": 'required',
                "addresses[0][city]": 'required',
                "addresses[0][state]": 'required'
            },
            messages: {
                "name": {
                    required: 'Please enter the project name',
                    maxlength: 'The project name may not be longer than 1024 characters'
                },
                // "description": 'Please enter the project description',
                "opportunity_status_id": 'Please select the project status',
                // "implementation_paths": 'Please enter the project solution',
                // "sustainability_contribution": 'Please enter the project deliverables',
                "addresses[0][city]": 'Please enter the project city',
                "addresses[0][state]": 'Please enter the project state'
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
        //# sourceMappingURL=validation.js.map
    </script>
@endsection
