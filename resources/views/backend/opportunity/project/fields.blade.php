
            <div class="row mt-4">
                <div class="col">

                    <!-- Opportunity Type field -->
                    @component('includes.components.form.hidden', [
                        'name'  => 'opportunityable_type',
                        'value' => 'SCCatalog\Models\Opportunity\Project',
                    ])@endcomponent

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
                        'attributes' => [
                            'rows' => 5,
                        ],
                        'object'      => $opportunity ?? null,
                    ])@endcomponent

                    <!-- Needs Review Field -->
                    @component('includes.components.form.input', [
                        'type'    => 'text',
                        'name'    => 'needs_review',
                        'label'   => 'Needs Review?',
                        'object'  => $opportunity->opportunityable ?? null,
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
                        'object'  => $opportunity ?? null,
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
                        'label'  => 'Application Deadline (Date or Short Text)',
                        'object' => $opportunity ?? null,
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
                        'label'       => 'Project Status',
                        'optionList'  => $opportunityStatuses,
                        'object'      => $opportunity ?? null,
                    ])@endcomponent

                    <!-- Opportunity Review Status Field -->
                    @component('includes.components.form.select', [
                        'name'        => 'opportunityable[review_status_id]',
                        'label'       => 'Project Review Status',
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

                    <!-- Envisioned Solution Field -->
                    @component('includes.components.form.textarea', [
                        'name'        => 'opportunityable[implementation_paths]',
                        'label'       => 'Envisioned Solution',
                        'help_text'   => 'What sustainability solution do you envision, and how will that solution be derived from this project?',
                        'attributes' => [
                            'rows' => 5,
                        ],
                        'object'      => $opportunity->opportunityable ?? null,
                    ])@endcomponent

                    <!-- Project Deliverables Field -->
                    @component('includes.components.form.textarea', [
                        'name'        => 'opportunityable[sustainability_contribution]',
                        'label'       => 'Project Deliverables',
                        'help_text'   => 'What deliverables/end product do you expect?',
                        'attributes' => [
                            'rows' => 5,
                        ],
                        'object'      => $opportunity->opportunityable ?? null,
                    ])@endcomponent

                    <!-- Affiliations Field -->
                    @component('includes.components.form.select', [
                        'name'        => 'affiliations',
                        'label'       => 'Affiliations',
                        'optionList'  => $affiliations,
                        'multivalue'  => true,
                        'attribute'  => 'multiple',
                        'object'      => $opportunity->affiliations ?? null,
                    ])@endcomponent

                    <!-- Categories Field -->
                    @component('includes.components.form.select', [
                        'name'        => 'categories',
                        'label'       => 'Categories',
                        'optionList'  => $categories,
                        'multivalue'  => true,
                        'attribute'  => 'multiple',
                        'object'      => $opportunity->categories ?? null,
                    ])@endcomponent

                    <!-- Keywords Field -->
                    @component('includes.components.form.select', [
                        'name'        => 'keywords',
                        'label'       => 'Keywords',
                        'optionList'  => $keywords,
                        'multivalue'  => true,
                        'attribute'  => 'multiple',
                        'object'      => $opportunity->keywords ?? null,
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

                @if( isset($opportunity) )
                    @foreach( $opportunity->addresses as $key => $address)
                        @include('opportunities._address', [
                            'key'     => $key,
                            'count'   => $key + 1,
                            'address' => $address
                        ])
                    @endforeach
                @else
                    <label for="addresses">Location:</label>
                    @component('includes.components.form.input', [
                        'name'        => 'addresses[0][city]',
                        'label'       => 'City:',
                        'attribute'  => 'required',
                        'object'      => $opportunity ?? null,
                    ])@endcomponent

                    @component('includes.components.form.input', [
                        'name'        => 'addresses[0][state]',
                        'label'       => 'State/Prov:',
                        'attribute'  => 'required',
                        'object'      => $opportunity ?? null,
                    ])@endcomponent

                    @component('includes.components.form.input', [
                        'name'        => 'addresses[0][country]',
                        'label'       => 'Country:',
                        'attribute'  => 'required',
                        'object'      => $opportunity ?? null,
                    ])@endcomponent

                    @component('includes.components.form.textarea', [
                        'name'        => 'addresses[0][comment]',
                        'label'       => 'Location Comment:',
                        'object'      => $opportunity ?? null,
                    ])@endcomponent
                @endif

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
                        'name'        => 'opportunityable[qualifications]',
                        'label'       => 'Qualifications',
                        'help_text'   => 'What specific skills should the applying students possess?',
                        'attributes' => [
                            'rows' => 5,
                        ],
                        'object'      => $opportunity->opportunityable ?? null,
                    ])@endcomponent

                    <!-- Responsibilities Field -->
                    @component('includes.components.form.textarea', [
                        'name'        => 'opportunityable[responsibilities]',
                        'label'       => 'Student Responsibilities',
                        'help_text'   => 'What will the student responsibilities be?',
                        'attributes' => [
                            'rows' => 5,
                        ],
                        'object'      => $opportunity->opportunityable ?? null,
                    ])@endcomponent

                    <!-- Learning Outcomes Field -->
                    @component('includes.components.form.textarea', [
                        'name'        => 'opportunityable[learning_outcomes]',
                        'label'       => 'Learning Outcomes',
                        'help_text'   => 'Describe what the student might learn from this experience.',
                        'attributes' => [
                            'rows' => 5,
                        ],
                        'object'      => $opportunity->opportunityable ?? null,
                    ])@endcomponent

                    <!-- Compensation Field -->
                    @component('includes.components.form.textarea', [
                        'name'        => 'opportunityable[compensation]',
                        'label'       => 'Student Compensation and Project Funds',
                        'help_text'   => 'Describe how students will be compensated in this project. If the student will not be paid, list other forms of compensation (metro pass, re-usable water bottles, etc.)',
                        'attributes' => [
                            'rows' => 5,
                        ],
                        'object'      => $opportunity->opportunityable ?? null,
                    ])@endcomponent

                    <!-- Budget Type Field -->
                    @component('includes.components.form.select', [
                        'name'        => 'opportunityable[budget_type_id]',
                        'label'       => 'Budget Available',
                        'help_text'   => 'Select budget type for the project...',
                        'optionList'  => $budgetTypes,
                        'object'      => $opportunity->opportunityable ?? null,
                    ])@endcomponent

                    <!-- Budget Amount Field -->
                    @component('includes.components.form.input', [
                        'name'        => 'opportunityable[budget_amount]',
                        'label'       => 'Budget Amount',
                        'help_text'   => 'If this project has a budget, state how large that budget is.',
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
                        'name'        => 'opportunityable[application_instructions]',
                        'label'       => 'Application Instructions:',
                        'help_text'   => 'Describe the steps the participant must follow to request admission into the project.',
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
                        'optionList'  => $users,
                        'object'      => $opportunity->supervisorUser ?? null,
                    ])@endcomponent

                    <!-- Program Lead Field -->
                    @component('includes.components.form.input', [
                        'name'        => 'opportunityable[program_lead]',
                        'label'       => 'ASU Program Lead',
                        'help_text'   => 'If this project is part of a larger program, which is run through the School of Sustainability, GIOS, or another ASU initiative, then provide the name of the leader of that bigger program here. The program leader is typically different from the Project Supervisor listed above.',
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
                        'optionList'  => $opportunities,
                        'object'      => $opportunity->parentOpportunity ?? null,
                    ])@endcomponent

                    <!-- Success Story Field -->
                    @component('includes.components.form.input', [
                        'type'        => 'url',
                        'name'        => 'opportunityable[success_story]',
                        'label'       => 'Success Story',
                        'help_text'   => 'If a Success Story is published for this project, enter the url here.',
                        'object'      => $opportunity->opportunityable ?? null,
                    ])@endcomponent

                    <!-- Library Collection Field -->
                    @component('includes.components.form.input', [
                        'type'        => 'url',
                        'name'        => 'opportunityable[library_collection]',
                        'label'       => 'Library Collection',
                        'help_text'   => 'If this project has been published in the ASU Library Collection, enter the url to that page.',
                        'object'      => $opportunity->opportunityable ?? null,
                    ])@endcomponent

                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->
    </div><!--card-->
