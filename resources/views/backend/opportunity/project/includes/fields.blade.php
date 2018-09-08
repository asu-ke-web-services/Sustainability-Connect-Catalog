
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        {{ __('labels.backend.opportunity.projects.management') }}
                        <small class="text-muted">{{ __('labels.backend.opportunity.projects.create') }}</small>
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr />

            <div class="row mt-4">
                <div class="col">

                    <!-- Project Name Field -->
                    @component('includes.components.form.input', [
                        'name'        => 'name',
                        'label'       => 'Name',
                        'help_text'   => 'Names can be up to 250 characters long',
                        'attributes'  => [
                            'required' => 'required',
                            'maxlength' => '250',
                        ],
                        'object'      => $opportunity ?? null,
                    ])@endcomponent

                    <!-- Public Name Field -->
                    @component('includes.components.form.input', [
                        'name'        => 'public_name',
                        'label'       => 'Public Name (for non-SOS Users)',
                        'help_text'   => 'Alternative name to display to users not permitted to view full details of opportunity (if needed)',
                        'placeholder' => 'Simplified project name',
                        'attributes'  => [
                            'maxlength' => '250',
                        ],
                        'object'      => $opportunity ?? null,
                    ])@endcomponent

                    <!-- Description Field -->
                    @component('includes.components.form.textarea', [
                        'name'        => 'description',
                        'label'       => 'Describe the Project',
                        'help_text'   => 'What specific sustainability problem do you need solved?',
                        'placeholder' => 'This project will ...',
                        'attributes' => [
                            'rows' => 5,
                        ],
                        'object'      => $opportunity ?? null,
                    ])@endcomponent

                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->
    </div><!--card-->

    <div class="card">
        <div class="card-body">
            <div class="row mt-4">
                <div class="col">

                    <!-- Opportunity Status Field -->
                    @component('includes.components.form.select', [
                        'name'        => 'opportunity_status_id',
                        'label'       => 'Project Status',
                        'placeholder' => 'Select status...',
                        'optionList'  => $opportunityStatuses,
                        'object'      => $opportunity ?? null,
                    ])@endcomponent

                    <!-- Opportunity Review Status Field -->
                    @component('includes.components.form.select', [
                        'name'        => 'opportunityable.opportunity_review_status_id',
                        'label'       => 'Project Review Status',
                        'placeholder' => 'Select status...',
                        'optionList'  => $opportunityReviewStatuses,
                        'object'      => $opportunity ?? null,
                    ])@endcomponent

                    <!-- Opportunity Begins Field -->
                    @component('includes.components.form.input', [
                        'type'        => 'date',
                        'name'        => 'start_date',
                        'label'       => 'Project Start Date',
                        'object'      => $opportunity ?? null,
                    ])@endcomponent

                    <!-- Opportunity Ends Field -->
                    @component('includes.components.form.input', [
                        'type'        => 'date',
                        'name'        => 'end_date',
                        'label'       => 'Project End Date',
                        'object'      => $opportunity ?? null,
                    ])@endcomponent

                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->
    </div><!--card-->

    <div id="card_application_listing_toggle" class="card">
        <div class="card-body">
            <div class="row mt-4">
                <div class="col">

                    <!-- Accept Applications Toggle -->

                    @component('includes.components.form.checkbox', [
                        'name'    => 'chk_accept_applications',
                        'label'   => 'Accept Applications?',
                        'onclick' => '$("#card_application_listing").show();',
                        'object'  => $opportunity ?? null,
                    ])@endcomponent

                    @component('includes.components.form.button', [
                        'name'    => 'btn_accept_applications',
                        'label'   => ' ',
                        'text'    => 'Accept Applications',
                        'help_text'   => 'If you want to publish this opportunity in order to recruit participants.',
                        'attributes'  => [
                            'onclick' => '$("#card_application_listing").toggle();'
                        ],
                    ])@endcomponent

                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->
    </div><!--card-->

    <div id="card_application_listing" class="card" style="display: none;">
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
                    @component('includes.components.form.input', [
                        'type'        => 'date',
                        'name'        => 'listing_starts',
                        'label'       => 'Listing Starts',
                        'object'      => $opportunity ?? null,
                    ])@endcomponent

                    <!-- Listing Ends Field -->
                    @component('includes.components.form.input', [
                        'type'        => 'date',
                        'name'        => 'listing_ends',
                        'label'       => 'Listing Ends',
                        'object'      => $opportunity ?? null,
                    ])@endcomponent


                    <!-- Application Deadline Field -->
                    @component('includes.components.form.input', [
                        'name'   => 'application_deadline',
                        'label'  => 'Application Deadline Date',
                        'type'   => 'date',
                        'object' => $opportunity ?? null,
                    ])@endcomponent

                    <!-- Application Deadline Text Field -->
                    @component('includes.components.form.textarea', [
                        'name'        => 'application_deadline_text',
                        'label'       => 'Application Deadline Text',
                        'placeholder' => 'e.g. "When Filled" or "Ongoing"',
                        'attributes' => [
                            'rows' => 5,
                        ],
                        'object'      => $opportunity ?? null,
                    ])@endcomponent

                    <!-- Application Deadline toggle format -->
                    @component('includes.components.form.checkbox', [
                        'name'        => 'chk_text_deadline',
                        'label'       => 'Format Deadline as Date or Text',
                        'object'      => $opportunity ?? null,
                    ])@endcomponent

                    @component('includes.components.form.button', [
                        'name'    => 'btn_text_deadline',
                        'label'   => ' ',
                        'text'    => 'Toggle Deadline Date or Text',
                        'attributes'  => [
                            'onclick' => '$("#field_app_deadline_date").toggle(); $("#field_app_deadline_text").toggle();'
                        ],
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
                    @component('includes.components.form.textarea', [
                        'name'        => 'opportunityable.qualifications',
                        'label'       => 'Qualifications',
                        'help_text'   => 'What specific skills should the applying students possess?',
                        'placeholder' => 'e.g. Participant must be an enrolled undergraduate student...',
                        'attributes' => [
                            'rows' => 5,
                        ],
                        'object'      => $opportunity->opportunityable ?? null,
                    ])@endcomponent

                    <!-- Responsibilities Field -->
                    @component('includes.components.form.textarea', [
                        'name'        => 'opportunityable.responsibilities',
                        'label'       => 'Student Responsibilities',
                        'help_text'   => 'What will the student responsibilities be?',
                        'placeholder' => 'Participants will organize...',
                        'attributes' => [
                            'rows' => 5,
                        ],
                        'object'      => $opportunity->opportunityable ?? null,
                    ])@endcomponent

                    <!-- Learning Outcomes Field -->
                    @component('includes.components.form.textarea', [
                        'name'        => 'opportunityable.learning_outcomes',
                        'label'       => 'Learning Outcomes',
                        'help_text'   => 'Describe what the student might learn from this experience.',
                        'placeholder' => 'Participants should learn ...',
                        'attributes' => [
                            'rows' => 5,
                        ],
                        'object'      => $opportunity->opportunityable ?? null,
                    ])@endcomponent

                    <!-- Compensation Field -->
                    @component('includes.components.form.textarea', [
                        'name'        => 'opportunityable.compensation',
                        'label'       => 'Student Compensation and Project Funds',
                        'help_text'   => 'Describe how students will be compensated in this project. If the student will not be paid, list other forms of compensation (metro pass, re-usable water bottles, etc.)',
                        'placeholder' => 'Participants will receive...',
                        'attributes' => [
                            'rows' => 5,
                        ],
                        'object'      => $opportunity->opportunityable ?? null,
                    ])@endcomponent

                    <!-- Budget Type Field -->
                    @component('includes.components.form.select', [
                        'name'        => 'budget_type_id',
                        'label'       => 'Budget Available',
                        'help_text'   => 'Select budget type for the project...',
                        'placeholder' => 'Monetary',
                        'optionList'  => $budgetTypes,
                        'object'      => $opportunity->opportunityable ?? null,
                    ])@endcomponent

                    <!-- Budget Amount Field -->
                    @component('includes.components.form.input', [
                        'name'        => 'budget_amount',
                        'label'       => 'Budget Amount',
                        'help_text'   => 'If this project has a budget, state how large that budget is.',
                        'placeholder' => '$x ...',
                        'object'      => $opportunity->opportunityable ?? null,
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
                    @component('includes.components.form.textarea', [
                        'name'        => 'opportunityable.application_instructions',
                        'label'       => 'Application Instructions:',
                        'help_text'   => 'Describe the steps the participant must follow to request admission into the project.',
                        'placeholder' => 'Click the "Apply Now" button on this page...',
                        'attributes' => [
                            'rows' => 5,
                        ],
                        'object'      => $opportunity->opportunityable ?? null,
                    ])@endcomponent

                    <!-- Contact details -->

                    <!-- Partner Organization Field -->
                    @component('includes.components.form.select', [
                        'name'        => 'organization_id',
                        'label'       => 'Project Partner Organization',
                        'placeholder' => 'Select or type organization name...',
                        'optionList'  => $organizations,
                        'object'      => $opportunity->organization ?? null,
                    ])@endcomponent

                    <!-- Modal Add New Organization -->
                    @component('includes.components.form.button', [
                        'name'       => 'btn_add_organization',
                        'label'      => ' ',
                        'class'      => 'btn btn-primary disabled',
                        'text'       => 'Add New Organization (TODO)',
                        'attribute'  => 'disabled',
                    ])@endcomponent

                    <!-- Opportunity Supervisor Field -->
                    @component('includes.components.form.select', [
                        'name'        => 'supervisor_user_id',
                        'label'       => 'Project Supervisor',
                        'help_text'   => 'Begin typing to find user',
                        'placeholder' => 'Select or type user name...',
                        'optionList'  => $users,
                        'object'      => $opportunity->supervisorUser ?? null,
                    ])@endcomponent

                    <!-- Program Lead Field -->
                    @component('includes.components.form.input', [
                        'name'        => 'program_lead',
                        'label'       => 'ASU Program Lead',
                        'help_text'   => 'If this project is part of a larger program, which is run through the School of Sustainability, GIOS, or another ASU initiative, then provide the name of the leader of that bigger program here. The program leader is typically different from the Project Supervisor listed above.',
                        'placeholder' => 'Professor John Smith, School of Sustainability',
                        'object'      => $opportunity->opportunityable ?? null,
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
                    @component('includes.components.form.select', [
                        'name'        => 'parent_opportunity_id',
                        'label'       => 'Predecessor Opportunity',
                        'help_text'   => 'Begin typing to find opportunity',
                        'placeholder' => 'Select or type opportunity name...',
                        'optionList'  => $opportunities,
                        'object'      => $opportunity->parentOpportunity ?? null,
                    ])@endcomponent

                    <!-- Success Story Field -->
                    @component('includes.components.form.input', [
                        'type'        => 'url',
                        'name'        => 'success_story',
                        'label'       => 'Success Story',
                        'help_text'   => 'If a Success Story is published for this project, enter the url here.',
                        'placeholder' => 'http://example.info',
                        'object'      => $opportunity->opportunityable ?? null,
                    ])@endcomponent

                    <!-- Library Collection Field -->
                    @component('includes.components.form.input', [
                        'type'        => 'url',
                        'name'        => 'library_collection',
                        'label'       => 'Library Collection',
                        'help_text'   => 'If this project has been published in the ASU Library Collection, enter the url to that page.',
                        'placeholder' => 'http://example.info',
                        'object'      => $opportunity->opportunityable ?? null,
                    ])@endcomponent

                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->
    </div><!--card-->

    <div class="card">
        <div class="card-footer">
            <div class="row">
                <div class="col">
                    {{ form_cancel(route('admin.opportunity.project.index'), __('buttons.general.cancel')) }}
                </div><!--col-->

                <div class="col text-right">
                    {{ form_submit(__('buttons.general.crud.create')) }}
                </div><!--col-->
            </div><!--row-->
        </div><!--card-footer-->
    </div><!--card-->
