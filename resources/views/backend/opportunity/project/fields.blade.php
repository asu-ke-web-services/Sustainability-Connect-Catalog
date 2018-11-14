
            <div class="row mt-4">
                <div class="col">

                    <div class="form-group row">
                        <label class="col-md-2 form-control-label">[Required Fields *]</label>

                    </div>

                    <!-- Project Name Field -->
                    @component('includes.components.form.input', [
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
                    @component('includes.components.form.textarea', [
                        'name'        => 'description',
                        'label'       => 'Describe the Project *',
                        'help_text'   => 'What specific sustainability problem do you need solved?',
                        'attributes' => [
                            'required' => 'required',
                            'rows' => 5,
                        ],
                        'object'      => $project ?? null,
                    ])@endcomponent

                    <!-- Needs Review Field -->
                    @component('includes.components.form.checkbox', [
                        'name'        => 'needs_review',
                        'label'       => 'Needs Review?',
                        'default'     => 0,
                        'object'  => $project ?? null,
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
{{--
                    @component('includes.components.form.checkbox', [
                        'name'    => 'chk_accept_applications',
                        'label'   => 'Accept Applications?',
                        'onclick' => '$("#card_application_listing").show();',
                        'object'  => $project ?? null,
                    ])@endcomponent
 --}}
                    @component('includes.components.form.button', [
                        'name'    => 'btn_accept_applications',
                        'label'   => ' ',
                        'text'    => 'Accept Applications',
                        'help_text'   => 'Click, if you want to recruit participants.',
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
                    @component('includes.components.form.date', [
                        'name'        => 'listing_start_at',
                        'label'       => 'Listing Starts',
                        'object'      => $project ?? null,
                    ])@endcomponent

                    <!-- Listing Ends Field -->
                    @component('includes.components.form.date', [
                        'name'        => 'listing_end_at',
                        'label'       => 'Listing Ends',
                        'object'      => $project ?? null,
                    ])@endcomponent

                    <!-- Application Deadline Field -->
                    @component('includes.components.form.date', [
                        'name'      => 'application_deadline_at',
                        'label'     => 'Application Deadline',
                        'help_text' => 'Enter date-format deadline (Leave blank if Text Deadline used)',
                        'object'    => $project ?? null,
                    ])@endcomponent

                    <!-- Application Deadline Text Field -->
                    @component('includes.components.form.input', [
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
                    @component('includes.components.form.select', [
                        'name'        => 'opportunity_status_id',
                        'label'       => 'Project Status *',
                        'placeholder' => 'Select project status...',
                        'attribute'   => 'required',
                        'optionList'  => $opportunityStatuses,
                        'object'      => $project ?? null,
                    ])@endcomponent

                    <!-- Opportunity Review Status Field -->
                    @component('includes.components.form.select', [
                        'name'        => 'review_status_id',
                        'label'       => 'Project Review Status',
                        'placeholder' => 'Select review status...',
                        'optionList'  => $opportunityReviewStatuses,
                        'object'      => $project ?? null,
                    ])@endcomponent

                    <!-- Opportunity Begins Field -->
                    @component('includes.components.form.date', [
                        'name'        => 'opportunity_start_at',
                        'label'       => 'Project Start Date',
                        'object'      => $project ?? null,
                    ])@endcomponent

                    <!-- Opportunity Ends Field -->
                    @component('includes.components.form.date', [
                        'name'        => 'opportunity_end_at',
                        'label'       => 'Project End Date',
                        'object'      => $project ?? null,
                    ])@endcomponent

                    <!-- Envisioned Solution Field -->
                    @component('includes.components.form.textarea', [
                        'name'        => 'implementation_paths',
                        'label'       => 'Envisioned Solution',
                        'help_text'   => 'What sustainability solution do you envision, and how will that solution be derived from this project?',
                        'attributes' => [
                            'rows' => 5,
                        ],
                        'object'      => $project ?? null,
                    ])@endcomponent

                    <!-- Project Deliverables Field -->
                    @component('includes.components.form.textarea', [
                        'name'        => 'sustainability_contribution',
                        'label'       => 'Project Deliverables',
                        'help_text'   => 'What deliverables/end product do you expect?',
                        'attributes' => [
                            'rows' => 5,
                        ],
                        'object'      => $project ?? null,
                    ])@endcomponent

                    <!-- Affiliations Field -->
                    @component('includes.components.form.select', [
                        'name'        => 'affiliations',
                        'label'       => 'Affiliations',
                        'placeholder' => 'Select one or more affiliations...',
                        'optionList'  => $affiliations,
                        'multivalue'  => true,
                        'attribute'  => 'multiple',
                        'object'      => $project ?? null,
                    ])@endcomponent

                    <!-- Categories Field -->
                    @component('includes.components.form.select', [
                        'name'        => 'categories',
                        'label'       => 'Categories',
                        'placeholder' => 'Select one or more categories...',
                        'optionList'  => $categories,
                        'multivalue'  => true,
                        'attribute'  => 'multiple',
                        'object'      => $project ?? null,
                    ])@endcomponent

                    <!-- Keywords Field -->
                    @component('includes.components.form.select', [
                        'name'        => 'keywords',
                        'label'       => 'Keywords',
                        'placeholder' => 'Select one or more keywords...',
                        'optionList'  => $keywords,
                        'multivalue'  => true,
                        'attribute'  => 'multiple',
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
                    @component('includes.components.form.input', [
                        'name'        => 'addresses[0][city]',
                        'label'       => 'City: *',
                        'attribute'   => 'required',
                        'object'      => $project ?? null,
                    ])@endcomponent

                    @component('includes.components.form.input', [
                        'name'        => 'addresses[0][state]',
                        'label'       => 'State/Prov: *',
                        'attribute'   => 'required',
                        'object'      => $project ?? null,
                    ])@endcomponent

                    @component('includes.components.form.input', [
                        'name'        => 'addresses[0][country]',
                        'label'       => 'Country:',
                        'object'      => $project ?? null,
                    ])@endcomponent

                    @component('includes.components.form.textarea', [
                        'name'        => 'addresses[0][comment]',
                        'label'       => 'Location Comment:',
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
                        'name'        => 'qualifications',
                        'label'       => 'Qualifications',
                        'help_text'   => 'What specific skills should the applying students possess?',
                        'attributes' => [
                            'rows' => 5,
                        ],
                        'object'      => $project ?? null,
                    ])@endcomponent

                    <!-- Responsibilities Field -->
                    @component('includes.components.form.textarea', [
                        'name'        => 'responsibilities',
                        'label'       => 'Student Responsibilities',
                        'help_text'   => 'What will the student responsibilities be?',
                        'attributes' => [
                            'rows' => 5,
                        ],
                        'object'      => $project ?? null,
                    ])@endcomponent

                    <!-- Learning Outcomes Field -->
                    @component('includes.components.form.textarea', [
                        'name'        => 'learning_outcomes',
                        'label'       => 'Learning Outcomes',
                        'help_text'   => 'Describe what the student might learn from this experience.',
                        'attributes' => [
                            'rows' => 5,
                        ],
                        'object'      => $project ?? null,
                    ])@endcomponent

                    <!-- Compensation Field -->
                    @component('includes.components.form.textarea', [
                        'name'        => 'compensation',
                        'label'       => 'Student Compensation and Project Funds',
                        'help_text'   => 'Describe how students will be compensated in this project. If the student will not be paid, list other forms of compensation (metro pass, re-usable water bottles, etc.)',
                        'attributes' => [
                            'rows' => 5,
                        ],
                        'object'      => $project ?? null,
                    ])@endcomponent

                    <!-- Budget Type Field -->
                    @component('includes.components.form.select', [
                        'name'        => 'budget_type_id',
                        'label'       => 'Budget Available',
                        'help_text'   => 'Select budget type for the project...',
                        'optionList'  => $budgetTypes,
                        'object'      => $project ?? null,
                    ])@endcomponent

                    <!-- Budget Amount Field -->
                    @component('includes.components.form.input', [
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
                    @component('includes.components.form.textarea', [
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
                    @component('includes.components.form.select', [
                        'name'        => 'organization_id',
                        'label'       => 'Project Partner Organization',
                        'optionList'  => $organizations,
                        'object'      => $project->organization ?? null,
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
                        'optionList'  => $users,
                        'object'      => $project->supervisorUser ?? null,
                    ])@endcomponent

                    <!-- Program Lead Field -->
                    @component('includes.components.form.input', [
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
                    {{--@component('includes.components.form.select', [--}}
                        {{--'name'        => 'parent_opportunity_id',--}}
                        {{--'label'       => 'Predecessor Opportunity',--}}
                        {{--'help_text'   => 'Begin typing to find opportunity',--}}
                        {{--'optionList'  => $opportunities,--}}
                        {{--'object'      => $project->parentOpportunity ?? null,--}}
                    {{--])@endcomponent--}}

                    <!-- Success Story Field -->
                    @component('includes.components.form.input', [
                        'type'        => 'url',
                        'name'        => 'success_story',
                        'label'       => 'Success Story',
                        'help_text'   => 'If a Success Story is published for this project, enter the url here.',
                        'object'      => $project ?? null,
                    ])@endcomponent

                    <!-- Library Collection Field -->
                    @component('includes.components.form.input', [
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
