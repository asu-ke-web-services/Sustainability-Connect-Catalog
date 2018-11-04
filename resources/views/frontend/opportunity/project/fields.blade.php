
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

                    <!-- Envisioned Solution Field -->
                    @component('includes.components.form.textarea', [
                        'name'        => 'opportunityable[implementation_paths]',
                        'label'       => 'Envisioned Solution',
                        'help_text'   => 'What sustainability solution do you envision, and how will that solution be derived from this project?',
                        'attributes' => [
                            'rows' => 5,
                        ],
                        'object'      => $opportunity ?? null,
                    ])@endcomponent

                    <!-- Project Deliverables Field -->
                    @component('includes.components.form.textarea', [
                        'name'        => 'opportunityable[sustainability_contribution]',
                        'label'       => 'Project Deliverables',
                        'help_text'   => 'What deliverables/end product do you expect?',
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
                        {{ __('labels.frontend.opportunity.projects.accept_application') }}
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
                        'object'      => $opportunity ?? null,
                    ])@endcomponent

                    <!-- Listing Ends Field -->
                    @component('includes.components.form.input', [
                        'type'        => 'date',
                        'name'        => 'listing_end_at',
                        'label'       => 'Listing Ends',
                        'object'      => $opportunity ?? null,
                    ])@endcomponent

                    <!-- Application Deadline Field -->
                    @component('includes.components.form.input', [
                        'name'   => 'application_deadline_at',
                        'label'  => 'Application Deadline (Date or Short Text)',
                        'object' => $opportunity ?? null,
                    ])@endcomponent

                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->
    </div><!--card-->

    <div class="card">
        <div class="card-body">
            <div class="row mt-4">
                <div class="col">

                    <!-- Opportunity Begins Field -->
                    @component('includes.components.form.input', [
                        'type'        => 'date',
                        'name'        => 'opportunity_start_at',
                        'label'       => 'Project Start Date',
                        'object'      => $opportunity ?? null,
                    ])@endcomponent

                    <!-- Opportunity Ends Field -->
                    @component('includes.components.form.input', [
                        'type'        => 'date',
                        'name'        => 'opportunity_end_at',
                        'label'       => 'Project End Date',
                        'object'      => $opportunity ?? null,
                    ])@endcomponent

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

                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->
    </div><!--card-->


    <div class="card">
        <div class="card-body">
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
                        'object'      => $opportunity ?? null,
                    ])@endcomponent

                    <!-- Responsibilities Field -->
                    @component('includes.components.form.textarea', [
                        'name'        => 'opportunityable[responsibilities]',
                        'label'       => 'Student Responsibilities',
                        'help_text'   => 'What will the student responsibilities be?',
                        'attributes' => [
                            'rows' => 5,
                        ],
                        'object'      => $opportunity ?? null,
                    ])@endcomponent

<!-- Contact details -->

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

                    <!-- Compensation Field -->
                    @component('includes.components.form.textarea', [
                        'name'        => 'opportunityable[compensation]',
                        'label'       => 'Student Compensation and Project Funds',
                        'help_text'   => 'Describe how students will be compensated in this project. If the student will not be paid, list other forms of compensation (metro pass, re-usable water bottles, etc.)',
                        'attributes' => [
                            'rows' => 5,
                        ],
                        'object'      => $opportunity ?? null,
                    ])@endcomponent

                    <!-- Application Instructions Field -->
                    @component('includes.components.form.textarea', [
                        'name'        => 'opportunityable[application_instructions]',
                        'label'       => 'Application Instructions:',
                        'help_text'   => 'Describe the steps the participant must follow to request admission into the project.',
                        'attributes' => [
                            'rows' => 5,
                        ],
                        'object'      => $opportunity ?? null,
                    ])@endcomponent

                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->
    </div><!--card-->
