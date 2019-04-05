
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        Organization Information
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr />

            <div class="row mt-4">
                <div class="col">

                    <div class="form-group row">
                        <label class="col-md-2 form-control-label">[Required Fields *]</label>
                    </div>

                    <!-- Organization Name Field -->
                    @component('frontend.includes.coreui.components.form.input', [
                        'name'        => 'organization_name',
                        'label'       => 'Organization Name *',
                        'attributes'  => [
                            'required' => 'required',
                        ],
                        'object'      => $internship ?? null,
                    ])@endcomponent

                    <label for="addresses">Address:</label>
                    @component('frontend.includes.coreui.components.form.input', [
                        'name'        => 'addresses[0][city]',
                        'label'       => 'City: *',
                        'attribute'   => 'required',
                        'object'      => $internship ?? null,
                    ])@endcomponent

                    @component('frontend.includes.coreui.components.form.input', [
                        'name'        => 'addresses[0][state]',
                        'label'       => 'State/Prov: *',
                        'attribute'   => 'required',
                        'object'      => $internship ?? null,
                    ])@endcomponent

                    @component('frontend.includes.coreui.components.form.input', [
                        'name'        => 'addresses[0][postalcode]',
                        'label'       => 'Postal Code: *',
                        'attribute'   => 'required',
                        'object'      => $internship ?? null,
                    ])@endcomponent

                    @component('frontend.includes.coreui.components.form.input', [
                        'name'        => 'addresses[0][country]',
                        'label'       => 'Country:',
                        'object'      => $internship ?? null,
                    ])@endcomponent

                    <!-- Contact Email Field -->
                    @component('frontend.includes.coreui.components.form.input', [
                        'name'        => 'email',
                        'label'       => 'Email *',
                        'attributes'  => [
                            'required' => 'required',
                        ],
                        'object'      => $internship ?? null,
                    ])@endcomponent

                    <!-- Contact Phone Field -->
                    @component('frontend.includes.coreui.components.form.input', [
                        'name'        => 'phone',
                        'label'       => 'Phone *',
                        'attributes'  => [
                            'required' => 'required',
                        ],
                        'object'      => $internship ?? null,
                    ])@endcomponent


                    <!-- Organization Type Field -->
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Organization is *</label>
                        <div class="col-md-10 col-form-label">
                            <div class="form-check">
                                <input class="form-check-input" id="radio1" type="radio" value="radio1" name="radios">
                                <label class="form-check-label" for="radio1">For Profit/Private</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" id="radio2" type="radio" value="radio2" name="radios">
                                <label class="form-check-label" for="radio2">Nonprofit</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" id="radio3" type="radio" value="radio3" name="radios">
                                <label class="form-check-label" for="radio3">Government Agency</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" id="radio4" type="radio" value="radio4" name="radios">
                                <label class="form-check-label" for="radio4">Education Institution</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" id="radio5" type="radio" value="radio5" name="radios">
                                <label class="form-check-label" for="radio5">Other:</label>
                                <input class="form-control" type="text" name="radio5" id="org-other">
                            </div>
                        </div>
                    </div>

                    <!-- Internship Pay Type Field -->
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Internship is *</label>
                        <div class="col-md-10 col-form-label">
                            <div class="form-check">
                                <input class="form-check-input" id="internship_pay_type_radio1" type="radio" value="radio1" name="radios">
                                <label class="form-check-label" for="internship_pay_type_radio1">Unpaid</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" id="internship_pay_type_radio2" type="radio" value="radio2" name="radios">
                                <label class="form-check-label" for="internship_pay_type_radio2">Paid</label>
                            </div>
                        </div>
                    </div>

                    <!-- Internship Pay Rate Field -->
                    @component('frontend.includes.coreui.components.form.input', [
                        'name'        => 'internship_pay_rate',
                        'label'       => 'Pay Rate',
                        'help_text'   => 'School of Sustainability cannot approve unpaid internships at for profit companies.',
                        'object'      => $internship ?? null,
                    ])@endcomponent

                    <!-- Internship Type Field -->
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Internship is *</label>
                        <div class="col-md-10 col-form-label">
                            <div class="form-check">
                                <input class="form-check-input" id="internship_work_type_radio1" type="radio" value="radio1" name="radios">
                                <label class="form-check-label" for="internship_work_type_radio1">In Person</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" id="internship_work_type_radio2" type="radio" value="radio2" name="radios">
                                <label class="form-check-label" for="internship_work_type_radio2">Virtual</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" id="internship_work_type_radio3" type="radio" value="radio3" name="radios">
                                <label class="form-check-label" for="internship_work_type_radio3">Hybrid (at least 50% of time should be spent on site)</label>
                            </div>
                        </div>
                    </div>

                    <!-- Organization History Field -->
                    @component('frontend.includes.coreui.components.form.input', [
                        'name'        => 'organization_type',
                        'label'       => 'Organization Age *',
                        'help_text'   => 'How long has the organization existed?',
                        'attributes' => [
                            'required' => 'required',
                        ],
                        'object'      => $internship ?? null,
                    ])@endcomponent

                    <!-- Organization Size Field -->
                    @component('frontend.includes.coreui.components.form.input', [
                        'name'        => 'organization_size',
                        'label'       => '# of Employees *',
                        'help_text'   => 'Approximately how many employees?',
                        'attributes' => [
                            'required' => 'required',
                        ],
                        'object'      => $internship ?? null,
                    ])@endcomponent

                    <!-- Organization Mission Field -->
                    @component('frontend.includes.coreui.components.form.input', [
                        'name'        => 'organization_mission',
                        'label'       => 'Mission *',
                        'help_text'   => 'What is the organization’s mission and/or vision?',
                        'attributes' => [
                            'required' => 'required',
                        ],
                        'object'      => $internship ?? null,
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
                        Internship Logistics
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr />

            <div class="row mt-4">
                <div class="col">

                    <div class="form-group row">
                        <label class="col-md-2 form-control-label">[Required Fields *]</label>
                    </div>

                    <!-- Listing Starts Field -->
                    @component('frontend.includes.coreui.components.form.date', [
                        'name'        => 'opportunity_start_at',
                        'label'       => 'Internship Start Date *',
                        'placeholder' => 'mm/dd/yyyy',
                        'object'      => $internship ?? null,
                    ])@endcomponent

                    <!-- Listing Ends Field -->
                    @component('frontend.includes.coreui.components.form.date', [
                        'name'        => 'opportunity_end_at',
                        'label'       => 'Internship End Date *',
                        'placeholder' => 'mm/dd/yyyy',
                        'object'      => $internship ?? null,
                    ])@endcomponent

                    <!-- Type of Internship Field -->
                    @component('frontend.includes.coreui.components.form.input', [
                        'name'        => 'internship_type',
                        'label'       => 'Type of Internship *',
                        'help_text'   => 'Research Field Work Office or Business Other:',
                        'attributes' => [
                            'required' => 'required',
                        ],
                        'object'      => $internship ?? null,
                    ])@endcomponent

                    <!-- Number of Positions Field -->
                    @component('frontend.includes.coreui.components.form.input', [
                        'name'        => 'internship_type',
                        'label'       => 'Number of positions available *',
                        'attributes' => [
                            'required' => 'required',
                        ],
                        'object'      => $internship ?? null,
                    ])@endcomponent

                    <!-- Number of Positions Field -->
                    @component('frontend.includes.coreui.components.form.input', [
                        'name'        => 'internship_type',
                        'label'       => 'Where will the intern be physically located *',
                        'attributes' => [
                            'required' => 'required',
                        ],
                        'object'      => $internship ?? null,
                    ])@endcomponent

                    <!-- Resources Provided Field -->
                    @component('backend.includes.components.form.richtext', [
                        'name'        => 'resources_provided',
                        'label'       => 'Internship Resources Provided *',
                        'help_text'   => 'Please describe the equipment, technology, facilities that will be provided for the intern’s use (i.e. computer, phone, desk, email access, software related to duties, etc.)',
                        'attributes' => [
                            'required' => 'required',
                            'rows' => 5,
                        ],
                        'object'      => $internship ?? null,
                    ])@endcomponent

                    <!-- Provide Own Computer Field -->
                    @component('frontend.includes.coreui.components.form.input', [
                        'name'        => 'provide_own_computer',
                        'label'       => 'Intern Provide Own Computer *',
                        'help_text'   => 'Is the intern expected to use their own personal computer?',
                        'attributes' => [
                            'required' => 'required',
                        ],
                        'object'      => $internship ?? null,
                    ])@endcomponent

                    <!-- Preferred Work Schedule Field -->
                    @component('frontend.includes.coreui.components.form.input', [
                        'name'        => 'preferred_work_schedule',
                        'label'       => 'Work Schedule *',
                        'help_text'   => 'Is there a preferred work schedule (specific days/weekend availability) or flexible to students schedule?',
                        'attributes' => [
                            'required' => 'required',
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
                        Position Description and Overview
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr />

            <div class="row mt-4">
                <div class="col">

                    <!-- Position Description Field -->
                    @component('frontend.includes.coreui.components.form.richtext', [
                        'name'        => 'description',
                        'label'       => '[required]',
                        'help_text'   => 'Please include an overview of the organization and position.',
                        'attributes' => [
                            'required' => 'required',
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
                        Primary Responsibilities
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr />

            <div class="row mt-4">
                <div class="col">

                    <!-- Responsibilities Field -->
                    @component('frontend.includes.coreui.components.form.richtext', [
                        'name'        => 'responsibilities',
                        'label'       => '[required]',
                        'help_text'   => 'Main projects or responsibilities. Provide as much detail as possible.',
                        'attributes' => [
                            'required' => 'required',
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
                        Learning Objectives
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr />

            <div class="row mt-4">
                <div class="col">

                    <!-- Responsibilities Field -->
                    @component('frontend.includes.coreui.components.form.richtext', [
                        'name'        => 'learning_outcome',
                        'label'       => '[required]',
                        'help_text'   => 'An internship is, first and foremost, a learning experience for a student. Please describe what the student should learn / be able to do by the end of this internship.',
                        'attributes' => [
                            'required' => 'required',
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
                        Minimum and Desired Qualifications
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr />

            <div class="row mt-4">
                <div class="col">

                    <!-- Qualifications Field -->
                    @component('frontend.includes.coreui.components.form.richtext', [
                        'name'        => 'qualifications',
                        'label'       => '[required]',
                        'help_text'   => 'What are the skills & abilities necessary for this role? (proficiency in certain computer programs, previous experience desired, written or verbal communication skills, any specific technical skills, etc)',
                        'attributes' => [
                            'required' => 'required',
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
                        Application Instructions
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr />

            <div class="row mt-4">
                <div class="col">

                    <!-- Qualifications Field -->
                    @component('frontend.includes.coreui.components.form.richtext', [
                        'name'        => 'application_instructions',
                        'label'       => '[required]',
                        'help_text'   => 'How will the student submit their application? This may be a resume and cover letter sent to an email address, or some organizations prefer students to apply through their website or HR system. If there is specific information you’d like to see in the cover letter, please include.',
                        'attributes' => [
                            'required' => 'required',
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
                        Student Placement Agreement
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr />

            <div class="row mt-4">
                <div class="col">

                    <!-- Authorized Signatory Field -->
                    @component('frontend.includes.coreui.components.form.richtext', [
                        'name'        => 'authorized_signatory',
                        'label'       => '[required]',
                        'help_text'   => 'ABOR / ASU requires a Student Placement Agreement on file for all internship placements.
Please provide the name, title, and email address of the person/s authorized to sign this agreement. We will facilitate the agreement by DocuSign, if one is not already on file.',
                        'attributes' => [
                            'required' => 'required',
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
                        Expectations for Successful Internship
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr />

            <div class="row mt-4">
                <div class="col">

                    <div class="form-group row">
                        <label for="static" class="col-sm-2 col-form-label">[required]</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" id="static" value="">
                        </div>
                    </div>

                    @component('frontend.includes.coreui.components.form.checkbox', [
                        'name'        => 'provide_onboarding',
                        'label'       => 'Organization will provide a thorough onboarding and orientation for intern/s.',
                        'default'     => 0,
                        'attributes' => [
                            'required' => 'required',
                        ],
                        'object'      => $internship ?? null,
                    ])@endcomponent

                    @component('frontend.includes.coreui.components.form.checkbox', [
                        'name'        => 'experienced_supervisor',
                        'label'       => 'Supervision will come from an experienced professional with the capacity to interact with the intern on a regular basis, answer questions, and provide direct and constructive feedback.',
                        'default'     => 0,
                        'attributes' => [
                            'required' => 'required',
                        ],
                        'object'      => $internship ?? null,
                    ])@endcomponent

                    @component('frontend.includes.coreui.components.form.checkbox', [
                        'name'        => 'provide_evaluations',
                        'label'       => 'Organization agrees to provide mid-term and final evaluations on interns performance (criteria/forms will be provided), and to bring any concerns about the interns performance to the attention of the School of Sustainability.',
                        'default'     => 0,
                        'attributes' => [
                            'required' => 'required',
                        ],
                        'object'      => $internship ?? null,
                    ])@endcomponent

                    @component('frontend.includes.coreui.components.form.checkbox', [
                        'name'        => 'professional_development',
                        'label'       => 'To the extent possible, organization will support professional development opportunities for the intern, including participation in trainings, workshops and meetings that help them learn about the industry and profession.',
                        'default'     => 0,
                        'attributes' => [
                            'required' => 'required',
                        ],
                        'object'      => $internship ?? null,
                    ])@endcomponent

                    @component('frontend.includes.coreui.components.form.checkbox', [
                        'name'        => 'support_networking',
                        'label'       => 'To the extent possible, organization will support opportunities for intern to network and conduct informational interviews with other members of the organization.',
                        'default'     => 0,
                        'attributes' => [
                            'required' => 'required',
                        ],
                        'object'      => $internship ?? null,
                    ])@endcomponent

                    <!-- Authorized Signatory Field -->
                    @component('frontend.includes.coreui.components.form.input', [
                        'name'        => 'form_signature',
                        'label'       => '',
                        'help_text'   => 'Name & title of person completing this form',
                        'attributes' => [
                            'required' => 'required',
                            'rows' => 1,
                        ],
                        'object'      => $internship ?? null,
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



@section('javascript')
    <script src="https://cdn.ckeditor.com/4.11.3/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'resources_provided' );
        CKEDITOR.replace( 'description' );
        CKEDITOR.replace( 'responsibilities' );
        CKEDITOR.replace( 'learning_outcome' );
        CKEDITOR.replace( 'qualifications' );
        CKEDITOR.replace( 'application_instructions' );
    </script>
    {{-- <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js" ></script>
    <script>
        $('#internship-form').validate({
            rules: {
                "name": {
                    required: true,
                    maxlength: 1024
                },
                "description": 'required',
                "opportunity_status_id": 'required',
                "addresses[0][city]": 'required',
                "addresses[0][state]": 'required'
            },
            messages: {
                "name": {
                    required: 'Please enter the internship name',
                    maxlength: 'The internship name may not be longer than 1024 characters'
                },
                "description": 'Please enter the internship description',
                "opportunity_status_id": 'Please select internship status',
                "addresses[0][city]": 'Please enter the internship city',
                "addresses[0][state]": 'Please enter the internship state'
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
    </script> --}}
@endsection
