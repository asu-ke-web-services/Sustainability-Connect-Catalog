
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
                        'attributes'  => [
                            'required' => 'required',
                            'rows'     => 5,
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

                    <!-- Categories Field -->
                    @component('frontend.includes.coreui.components.form.select', [
                        'name'        => 'categories',
                        'label'       => 'Categories',
                        'optionList'  => $categories,
                        'multivalue'  => true,
                        'attribute'  => 'multiple',
                        'object'      => $project->categories ?? null,
                    ])@endcomponent

                    <!-- Keywords Field -->
                    @component('frontend.includes.coreui.components.form.select', [
                        'name'        => 'keywords',
                        'label'       => 'Keywords',
                        'optionList'  => $keywords,
                        'multivalue'  => true,
                        'attribute'  => 'multiple',
                        'object'      => $project->keywords ?? null,
                    ])@endcomponent

                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->
    </div><!--card-->

    <div class="card">
        <div class="card-body">
            <div class="row mt-4">
                <div class="col">

                    <label for="addresses">Location:</label>
                    @component('frontend.includes.coreui.components.form.input', [
                        'name'        => 'addresses[0][city]',
                        'label'       => 'City: *',
                        'attribute'  => 'required',
                        'object'      => $project ?? null,
                    ])@endcomponent

                    @component('frontend.includes.coreui.components.form.input', [
                        'name'        => 'addresses[0][state]',
                        'label'       => 'State/Prov: *',
                        'attribute'  => 'required',
                        'object'      => $project ?? null,
                    ])@endcomponent

                    @component('frontend.includes.coreui.components.form.input', [
                        'name'        => 'addresses[0][country]',
                        'label'       => 'Country:',
                        'object'      => $project ?? null,
                    ])@endcomponent

                    @component('frontend.includes.coreui.components.form.textarea', [
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
            <div class="row mt-4">
                <div class="col">

                    <!-- project Begins Field -->
                    @component('frontend.includes.coreui.components.form.date', [
                        'name'        => 'opportunity_start_at',
                        'label'       => 'Project Start Date',
                        // 'help_text'   => 'Safari users: please format date: yyyy-mm-dd',
                        'object'      => $project ?? null,
                    ])@endcomponent

                    <!-- project Ends Field -->
                    @component('frontend.includes.coreui.components.form.date', [
                        'name'        => 'opportunity_end_at',
                        'label'       => 'Project End Date',
                        // 'help_text'   => 'Safari users: please format date: yyyy-mm-dd',
                        'object'      => $project ?? null,
                    ])@endcomponent
{{--
                    <!-- Partner Organization Field -->
                    @component('frontend.includes.coreui.components.form.select', [
                        'name'        => 'organization_id',
                        'label'       => 'Project Partner Organization',
                        'optionList'  => $organizations,
                        'object'      => $project->organization ?? null,
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

<!-- Contact details -->

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
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.11.3/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'description' );
        CKEDITOR.replace( 'implementation_paths' );
        CKEDITOR.replace( 'sustainability_contribution' );
        CKEDITOR.replace( 'qualifications' );
        CKEDITOR.replace( 'responsibilities' );
        CKEDITOR.replace( 'compensation' );
        CKEDITOR.replace( 'application_instructions' );
    </script>
    {{-- <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js" ></script> --}}
    {{-- <script>
        //# sourceMappingURL=text-editor.js.map
        $('#project-form').validate({
            ignore: [],
            rules: {
                "name": {
                    required: true,
                    maxlength: 1024
                },
                // "description": 'required',
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
    </script> --}}
@endpush
