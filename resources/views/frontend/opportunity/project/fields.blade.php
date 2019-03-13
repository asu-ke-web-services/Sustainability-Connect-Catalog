
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
                        'object'      => $opportunity ?? null,
                    ])@endcomponent

                    <!-- Description Field -->
                    @component('frontend.includes.coreui.components.form.textarea', [
                        'name'        => 'description',
                        'label'       => 'Describe the Project *',
                        'help_text'   => 'What specific sustainability problem do you need solved?',
                        'attributes'  => [
                            'required' => 'required',
                            'rows'     => 5,
                        ],
                        'object'      => $opportunity ?? null,
                    ])@endcomponent

                    <!-- Envisioned Solution Field -->
                    @component('frontend.includes.coreui.components.form.textarea', [
                        'name'        => 'implementation_paths',
                        'label'       => 'Envisioned Solution *',
                        'help_text'   => 'What sustainability solution do you envision, and how will that solution be derived from this project?',
                        'attributes' => [
                            'required' => 'required',
                            'rows' => 5,
                        ],
                        'object'      => $opportunity ?? null,
                    ])@endcomponent

                    <!-- Project Deliverables Field -->
                    @component('frontend.includes.coreui.components.form.textarea', [
                        'name'        => 'sustainability_contribution',
                        'label'       => 'Project Deliverables *',
                        'help_text'   => 'What deliverables/end product do you expect?',
                        'attributes' => [
                            'required' => 'required',
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
                        @include('opportunities.address', [
                            'key'     => $key,
                            'count'   => $key + 1,
                            'address' => $address
                        ])
                    @endforeach
                @else
                    <label for="addresses">Location:</label>
                    @component('frontend.includes.coreui.components.form.input', [
                        'name'        => 'addresses[0][city]',
                        'label'       => 'City: *',
                        'attribute'  => 'required',
                        'object'      => $opportunity ?? null,
                    ])@endcomponent

                    @component('frontend.includes.coreui.components.form.input', [
                        'name'        => 'addresses[0][state]',
                        'label'       => 'State/Prov: *',
                        'attribute'  => 'required',
                        'object'      => $opportunity ?? null,
                    ])@endcomponent

                    @component('frontend.includes.coreui.components.form.input', [
                        'name'        => 'addresses[0][country]',
                        'label'       => 'Country:',
                        'object'      => $opportunity ?? null,
                    ])@endcomponent

                    @component('frontend.includes.coreui.components.form.textarea', [
                        'name'        => 'addresses[0][comment]',
                        'label'       => 'Location Comment:',
                        'object'      => $opportunity ?? null,
                    ])@endcomponent
                @endif

                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->
    </div><!--card-->
{{--
    <div id="card_application_listing" class="card">
        <div class="card-body">
            <div class="row mt-4">
                <div class="col">

                    <!-- Listing Starts Field -->
                    @component('frontend.includes.coreui.components.form.input', [
                        'type'   => 'date',
                        'name'   => 'listing_start_at',
                        'label'  => 'Listing Starts',
                        'help_text'   => 'Safari users: please format date: yyyy-mm-dd',
                        'object' => $opportunity ?? null,
                    ])@endcomponent

                    <!-- Listing Ends Field -->
                    @component('frontend.includes.coreui.components.form.input', [
                        'type'   => 'date',
                        'name'   => 'listing_end_at',
                        'label'  => 'Listing Ends',
                        'help_text'   => 'Safari users: please format date: yyyy-mm-dd',
                        'object' => $opportunity ?? null,
                    ])@endcomponent

                    <!-- Application Deadline Field -->
                    @component('frontend.includes.coreui.components.form.date', [
                        'name'      => 'application_deadline_at',
                        'label'     => 'Application Deadline',
                        'help_text'   => 'Safari users: please format date: yyyy-mm-dd',
                        'object'    => $opportunity ?? null,
                    ])@endcomponent

                    <!-- Application Deadline Text Field -->
                    @component('frontend.includes.coreui.components.form.input', [
                        'name'      => 'application_deadline_text',
                        'label'     => 'Application Deadline Text',
                        'help_text'   => 'Safari users: please format date: yyyy-mm-dd',
                        'object'    => $opportunity ?? null,
                    ])@endcomponent

                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->
    </div><!--card-->
 --}}
    <div class="card">
        <div class="card-body">
            <div class="row mt-4">
                <div class="col">

                    <!-- Opportunity Begins Field -->
                    @component('frontend.includes.coreui.components.form.input', [
                        'type'        => 'date',
                        'name'        => 'opportunity_start_at',
                        'label'       => 'Project Start Date',
                        'help_text'   => 'Safari users: please format date: yyyy-mm-dd',
                        'object'      => $opportunity ?? null,
                    ])@endcomponent

                    <!-- Opportunity Ends Field -->
                    @component('frontend.includes.coreui.components.form.input', [
                        'type'        => 'date',
                        'name'        => 'opportunity_end_at',
                        'label'       => 'Project End Date',
                        'help_text'   => 'Safari users: please format date: yyyy-mm-dd',
                        'object'      => $opportunity ?? null,
                    ])@endcomponent
{{--
                    <!-- Partner Organization Field -->
                    @component('frontend.includes.coreui.components.form.select', [
                        'name'        => 'organization_id',
                        'label'       => 'Project Partner Organization',
                        'optionList'  => $organizations,
                        'object'      => $opportunity->organization ?? null,
                    ])@endcomponent
 --}}
                    <!-- Modal Add New Organization -->
                    {{-- @component('frontend.includes.coreui.components.form.button', [
                        'name'       => 'btn_add_organization',
                        'label'      => ' ',
                        'class'      => 'btn btn-primary disabled',
                        'text'       => 'Add New Organization (TODO)',
                        'attribute'  => 'disabled',
                    ])@endcomponent --}}

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
                    @component('frontend.includes.coreui.components.form.textarea', [
                        'name'        => 'qualifications',
                        'label'       => 'Qualifications',
                        'help_text'   => 'What specific skills should the applying students possess?',
                        'attributes' => [
                            'rows' => 5,
                        ],
                        'object'      => $opportunity ?? null,
                    ])@endcomponent

                    <!-- Responsibilities Field -->
                    @component('frontend.includes.coreui.components.form.textarea', [
                        'name'        => 'responsibilities',
                        'label'       => 'Student Responsibilities',
                        'help_text'   => 'What will the student responsibilities be?',
                        'attributes' => [
                            'rows' => 5,
                        ],
                        'object'      => $opportunity ?? null,
                    ])@endcomponent

<!-- Contact details -->

                    <!-- Affiliations Field -->
                    {{-- @component('frontend.includes.coreui.components.form.select', [
                        'name'        => 'affiliations',
                        'label'       => 'Affiliations',
                        'optionList'  => $affiliations,
                        'multivalue'  => true,
                        'attribute'  => 'multiple',
                        'object'      => $opportunity->affiliations ?? null,
                    ])@endcomponent --}}

                    <!-- Categories Field -->
                    @component('frontend.includes.coreui.components.form.select', [
                        'name'        => 'categories',
                        'label'       => 'Categories',
                        'optionList'  => $categories,
                        'multivalue'  => true,
                        'attribute'  => 'multiple',
                        'object'      => $opportunity->categories ?? null,
                    ])@endcomponent

                    <!-- Keywords Field -->
                    @component('frontend.includes.coreui.components.form.select', [
                        'name'        => 'keywords',
                        'label'       => 'Keywords',
                        'optionList'  => $keywords,
                        'multivalue'  => true,
                        'attribute'  => 'multiple',
                        'object'      => $opportunity->keywords ?? null,
                    ])@endcomponent

                    <!-- Compensation Field -->
                    @component('frontend.includes.coreui.components.form.textarea', [
                        'name'        => 'compensation',
                        'label'       => 'Student Compensation and Project Funds',
                        'help_text'   => 'Describe how students will be compensated in this project. If the student will not be paid, list other forms of compensation (metro pass, re-usable water bottles, etc.)',
                        'attributes' => [
                            'rows' => 5,
                        ],
                        'object'      => $opportunity ?? null,
                    ])@endcomponent

                    <!-- Application Instructions Field -->
                    @component('frontend.includes.coreui.components.form.textarea', [
                        'name'        => 'application_instructions',
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

    <div class="card">
        <div class="card-footer">
            <div class="row">
                <div class="col">
                    {{ form_cancel(route('admin.opportunity.project.index'), __('buttons.general.cancel')) }}
                </div><!--col-->

                <div class="col text-right">
                    {{ form_submit(__('buttons.general.submit')) }}
                </div><!--col-->
            </div><!--row-->
        </div><!--card-footer-->
    </div><!--card-->
