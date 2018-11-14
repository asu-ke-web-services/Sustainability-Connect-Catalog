
            <div class="row mt-4">
                <div class="col">

                    <!-- Internship Name Field -->
                    @component('includes.components.form.input', [
                        'name'        => 'name',
                        'label'       => 'Name',
                        'help_text'   => 'Names can be up to 1024 characters long',
                        'attributes'  => [
                            'required' => 'required',
                            'maxlength' => '1024',
                        ],
                        'object'      => $internship ?? null,
                    ])@endcomponent

                    <!-- Partner Organization Field -->
                    @component('includes.components.form.select', [
                        'name'        => 'organization_id',
                        'label'       => 'Managing Organization',
                        'optionList'  => $organizations,
                        'object'      => $internship->organization ?? null,
                    ])@endcomponent

                    <!-- Modal Add New Organization -->
                    {{-- @component('includes.components.form.button', [
                        'name'       => 'btn_add_organization',
                        'label'      => ' ',
                        'class'      => 'btn btn-primary disabled',
                        'text'       => 'Add New Organization (TODO)',
                        'attribute'  => 'disabled',
                    ])@endcomponent --}}

                    <!-- Description Field -->
                    @component('includes.components.form.textarea', [
                        'name'        => 'description',
                        'label'       => 'Describe the Internship',
                        'help_text'   => 'What specific sustainability problem do you need solved?',
                        'attributes' => [
                            'rows' => 5,
                        ],
                        'object'      => $internship ?? null,
                    ])@endcomponent

                    <!-- Needs Review Field -->
                    @component('includes.components.form.checkbox', [
                        'name'        => 'needs_review',
                        'label'       => 'Needs Review?',
                        'default'     => 0,
                        'object'  => $internship ?? null,
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
                        'object'  => $internship ?? null,
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
                        {{ __('labels.backend.opportunity.internships.accept_application') }}
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr />

            <div class="row mt-4">
                <div class="col">

                    <!-- Listing Starts Field -->
                    @component('includes.components.form.input', [
                        'type'        => 'date',
                        'name'        => 'listing_start_at',
                        'label'       => 'Listing Starts',
                        'object'      => $internship ?? null,
                    ])@endcomponent

                    <!-- Listing Ends Field -->
                    @component('includes.components.form.input', [
                        'type'        => 'date',
                        'name'        => 'listing_end_at',
                        'label'       => 'Listing Ends',
                        'object'      => $internship ?? null,
                    ])@endcomponent

                    <!-- Application Deadline Field -->
                    @component('includes.components.form.input', [
                        'name'   => 'application_deadline_at',
                        'label'  => 'Application Deadline (Date or Short Text)',
                        'object' => $internship ?? null,
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
                            {{ __('labels.backend.opportunity.internships.internship_details') }}
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr />

            <div class="row mt-4">
                <div class="col">

                    <!-- Opportunity Status Field -->
                    @component('includes.components.form.select', [
                        'name'        => 'opportunity_status_id',
                        'label'       => 'Internship Status',
                        'optionList'  => $opportunityStatuses,
                        'object'      => $internship ?? null,
                    ])@endcomponent

                    <!-- Opportunity Begins Field -->
                    @component('includes.components.form.input', [
                        'type'        => 'date',
                        'name'        => 'opportunity_start_at',
                        'label'       => 'Internship Start Date',
                        'object'      => $internship ?? null,
                    ])@endcomponent

                    <!-- Opportunity Ends Field -->
                    @component('includes.components.form.input', [
                        'type'        => 'date',
                        'name'        => 'opportunity_end_at',
                        'label'       => 'Internship End Date',
                        'object'      => $internship ?? null,
                    ])@endcomponent

                    <!-- Affiliations Field -->
                    @component('includes.components.form.select', [
                        'name'        => 'affiliations',
                        'label'       => 'Affiliations',
                        'optionList'  => $affiliations,
                        'multivalue'  => true,
                        'attribute'  => 'multiple',
                        'object'      => $internship->affiliations ?? null,
                    ])@endcomponent

                    <!-- Categories Field -->
                    @component('includes.components.form.select', [
                        'name'        => 'categories',
                        'label'       => 'Categories',
                        'optionList'  => $categories,
                        'multivalue'  => true,
                        'attribute'  => 'multiple',
                        'object'      => $internship->categories ?? null,
                    ])@endcomponent

                    <!-- Keywords Field -->
                    @component('includes.components.form.select', [
                        'name'        => 'keywords',
                        'label'       => 'Keywords',
                        'optionList'  => $keywords,
                        'multivalue'  => true,
                        'attribute'  => 'multiple',
                        'object'      => $internship->keywords ?? null,
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
                        {{ __('labels.backend.opportunity.internships.locations') }}
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr />

            <div class="row mt-4">
                <div class="col">

                @if( isset($internship) )
                    @foreach( $internship->addresses as $key => $address)
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
                        'object'      => $internship ?? null,
                    ])@endcomponent

                    @component('includes.components.form.input', [
                        'name'        => 'addresses[0][state]',
                        'label'       => 'State/Prov:',
                        'attribute'  => 'required',
                        'object'      => $internship ?? null,
                    ])@endcomponent

                    @component('includes.components.form.input', [
                        'name'        => 'addresses[0][country]',
                        'label'       => 'Country:',
                        'attribute'  => 'required',
                        'object'      => $internship ?? null,
                    ])@endcomponent

                    @component('includes.components.form.textarea', [
                        'name'        => 'addresses[0][comment]',
                        'label'       => 'Location Comment:',
                        'object'      => $internship ?? null,
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
                            {{ __('labels.backend.opportunity.internships.applicant_details') }}
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
                        'object'      => $internship ?? null,
                    ])@endcomponent

                    <!-- Responsibilities Field -->
                    @component('includes.components.form.textarea', [
                        'name'        => 'responsibilities',
                        'label'       => 'Student Responsibilities',
                        'help_text'   => 'What will the student responsibilities be?',
                        'attributes' => [
                            'rows' => 5,
                        ],
                        'object'      => $internship ?? null,
                    ])@endcomponent

                    <!-- Compensation Field -->
                    @component('includes.components.form.textarea', [
                        'name'        => 'compensation',
                        'label'       => 'Student Compensation and Internship Funds',
                        'help_text'   => 'Describe how students will be compensated in this internship. If the student will not be paid, list other forms of compensation (metro pass, re-usable water bottles, etc.)',
                        'attributes' => [
                            'rows' => 5,
                        ],
                        'object'      => $internship ?? null,
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
                        {{ __('labels.backend.opportunity.internships.application_process') }}
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
                        'help_text'   => 'Describe the steps the participant must follow to request admission into the internship.',
                        'attributes' => [
                            'rows' => 5,
                        ],
                        'object'      => $internship ?? null,
                    ])@endcomponent

                    <!-- Contact details -->

                    <!-- Opportunity Supervisor Field -->
                    @component('includes.components.form.select', [
                        'name'        => 'supervisor_user_id',
                        'label'       => 'Internship Supervisor',
                        'help_text'   => 'Begin typing to find user',
                        'optionList'  => $users,
                        'object'      => $internship->supervisorUser ?? null,
                    ])@endcomponent

                    <!-- Program Lead Field -->
                    @component('includes.components.form.input', [
                        'name'        => 'program_lead',
                        'label'       => 'ASU Program Lead',
                        'help_text'   => 'If this internship is part of a larger program, which is run through the School of Sustainability, GIOS, or another ASU initiative, then provide the name of the leader of that bigger program here. The program leader is typically different from the Internship Supervisor listed above.',
                        'object'      => $internship ?? null,
                    ])@endcomponent

                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->
    </div><!--card-->

    <div class="card">
        <div class="card-body">
            <div class="row mt-4">
                <div class="col">
{{--
                    <!-- Parent Opportunity Field -->
                    @component('includes.components.form.select', [
                        'name'        => 'parent_opportunity_id',
                        'label'       => 'Predecessor Opportunity',
                        'help_text'   => 'Begin typing to find opportunity',
                        'optionList'  => $opportunities,
                        'object'      => $internship->parentOpportunity ?? null,
                    ])@endcomponent
 --}}
                    <!-- Success Story Field -->
                    @component('includes.components.form.input', [
                        'type'        => 'url',
                        'name'        => 'success_story',
                        'label'       => 'Success Story',
                        'help_text'   => 'If a Success Story is published for this internship, enter the url here.',
                        'object'      => $internship ?? null,
                    ])@endcomponent

                    <!-- Library Collection Field -->
                    @component('includes.components.form.input', [
                        'type'        => 'url',
                        'name'        => 'library_collection',
                        'label'       => 'Library Collection',
                        'help_text'   => 'If this internship has been published in the ASU Library Collection, enter the url to that page.',
                        'object'      => $internship ?? null,
                    ])@endcomponent

                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->
    </div><!--card-->
