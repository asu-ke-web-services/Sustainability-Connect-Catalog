
<!-- Project Name Field -->
@component('components.form.input', [
    'name'        => 'name',
    'label'       => 'Name:',
    'help_text'   => 'Names can be up to 255 characters long',
    'placeholder' => 'Full project name',
    'attributes'  => 'required autofocus',
    'object'      => $opportunity ?? null,
])@endcomponent

<!-- Public Name Field -->
@component('components.form.input', [
    'name'        => 'public_name',
    'label'       => 'Public Name (to show to non-SOS Users):',
    'help_text'   => 'Alternative name to display to users not permitted to view full details of opportunity (if needed)',
    'placeholder' => 'Simplified project name',
    'object'      => $opportunity ?? null,
])@endcomponent

<!-- Slug Field -->
{{-- <div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('slug', 'Slug:') !!}
    {!! Form::text('slug', null, ['class' => 'form-control']) !!}
</div> --}}


<!-- Description Field -->
@component('components.form.textarea', [
    'name'        => 'description',
    'label'       => 'Describe the Project:',
    'help_text'   => 'What specific sustainability problem do you need solved?',
    'placeholder' => 'This project will ...',
    'object'      => $opportunity ?? null,
])@endcomponent

<!-- Envisioned Solution Field -->
@component('components.form.textarea', [
    'name'        => 'implementation_paths',
    'label'       => 'Envisioned Solution:',
    'help_text'   => 'What sustainability solution do you envision, and how will that solution be derived from this project?',
    'placeholder' => 'Project participants will ...',
    'object'      => $opportunity->opportunityable ?? null,
])@endcomponent

<!-- Project Deliverables Field -->
@component('components.form.textarea', [
    'name'        => 'sustainability_contribution',
    'label'       => 'Project Deliverables:',
    'help_text'   => 'What deliverables/end product do you expect?',
    'placeholder' => 'At project end, a new [activity] will be held...',
    'object'      => $opportunity->opportunityable ?? null,
])@endcomponent

<!-- Addresses Block -->
<div class="form-group col-sm-6">
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
    @component('components.form.input', [
        'name'        => 'addresses[0][city]',
        'label'       => 'City:',
        'attributes'  => 'required',
        'placeholder' => 'Tempe',
        'object'      => $opportunity ?? null,
    ])@endcomponent

    @component('components.form.input', [
        'name'        => 'addresses[0][state]',
        'label'       => 'State/Prov:',
        'attributes'  => 'required',
        'placeholder' => 'Arizona',
        'object'      => $opportunity ?? null,
    ])@endcomponent

    @component('components.form.input', [
        'name'        => 'addresses[0][country]',
        'label'       => 'Country:',
        'attributes'  => 'required',
        'placeholder' => 'US',
        'object'      => $opportunity ?? null,
    ])@endcomponent

    @component('components.form.textarea', [
        'name'        => 'addresses[0][note]',
        'label'       => 'Location Note:',
        'placeholder' => 'Short note on location...',
        'object'      => $opportunity ?? null,
    ])@endcomponent
@endif
</div>

<div id="filler_addresses" class="form-group col-sm-12"><p>&nbsp;</p></div>

<!-- Project Timeframe block -->


<!-- Accept Applications Toggle -->
<div class="form-group col-sm-3">
    @component('components.form.button', [
        'name'    => 'btn_accept_applications',
        'text'    => 'Accept Applications',
        'onclick' => '$("#field_application_listing").show();$("#btn_accept_applications").hide();',
    ])@endcomponent

{{--     {!! Form::button('No Applications', ['id' => 'btn_no_applications', 'class' => 'btn btn-primary', 'style' => 'display: none;', 'onclick' => '$("#field_application_listing").toggle(); $("#filler_application_listing").toggle(); $("#btn_accept_applications").show(); $("#btn_accept_applications").hide();']) !!} --}}
</div>

<div id="field_application_listing" class="form-group col-sm-9" style="display: none;">
    <!-- Listing Starts Field -->
    <div class="col-sm-6">
        @component('components.form.input', [
            'name'   => 'listing_starts',
            'label'  => 'Listing Starts:',
            'type'   => 'date',
            'object' => $opportunity ?? null,
        ])@endcomponent
    </div>

    <!-- Listing Ends Field -->
    <div class="col-sm-6">
        @component('components.form.input', [
            'name'   => 'listing_ends',
            'label'  => 'Listing Ends:',
            'type'   => 'date',
            'object' => $opportunity ?? null,
        ])@endcomponent
    </div>
</div>

<div id="filler_application_listing" class="form-group col-sm-12"><p>&nbsp;</p></div>

<!-- Application Deadline Field -->
<div id="field_app_deadline_date" class="form-group col-sm-6">
    @component('components.form.input', [
        'name'   => 'application_deadline',
        'label'  => 'Application Deadline Date:',
        'type'   => 'date',
        'object' => $opportunity ?? null,
    ])@endcomponent
</div>

<!-- Application Deadline Text Field -->
<div id="field_app_deadline_text" class="form-group col-sm-6" style="display: none;">
    @component('components.form.input', [
        'name'        => 'application_deadline_text',
        'label'       => 'Application Deadline Text:',
        'type'        => 'text',
        'placeholder' => 'e.g. "When Filled" or "Ongoing"',
        'object'      => $opportunity ?? null,
    ])@endcomponent
</div>

<!-- Application Deadline toggle format -->
<div class="form-group col-sm-6">
    @component('components.form.button', [
        'name'    => 'btn_text_deadline',
        'text'    => 'Toggle Deadline Date or Text',
        'onclick' => '$("#field_app_deadline_date").toggle(); $("#field_app_deadline_text").toggle();',
    ])@endcomponent
</div>


<div id="filler_deadline" class="form-group col-sm-12"><p>&nbsp;</p></div>


<!-- Opportunity Begins Field -->
<div class="form-group col-sm-6">
    @component('components.form.input', [
        'name'   => 'start_date',
        'label'  => 'Project Start Date:',
        'type'   => 'date',
        'object' => $opportunity ?? null,
    ])@endcomponent
</div>

<!-- Opportunity Ends Field -->
<div class="form-group col-sm-6">
    @component('components.form.input', [
        'name'   => 'end_date',
        'label'  => 'Project End Date:',
        'type'   => 'date',
        'object' => $opportunity ?? null,
    ])@endcomponent
</div>

<div id="filler_start_end" class="form-group col-sm-12"><p>&nbsp;</p></div>


<!-- Partner Organization Field -->
<div class="form-group col-sm-6">
    @component('components.form.select', [
        'name'        => 'organization_id',
        'label'       => 'Project Partner Organization:',
        'placeholder' => 'Select or type organization name...',
        'optionList'  => $allOrganizations,
        'object'      => $opportunity->organization ?? null,
    ])@endcomponent
</div>

<script>
$('#organization_id').selectize({
    create: false,
    persist: false,
    highlight: true,
    openOnFocus: true,
    maxOptions: 10,
    maxItems: 1,
    valueField: 'id',
    labelField: 'name',
    searchField: 'name',
    options: {!! json_encode($allOrganizations) !!}
});
</script>


<!-- Modal Add New Organization -->
<div class="form-group col-sm-3">
    @component('components.form.button', [
        'name'       => 'btn_add_organization',
        'class'      => 'btn btn-primary disabled',
        'text'       => 'Add New Organization (TODO)',
        'attributes' => 'disabled',
    ])@endcomponent
</div>



<!-- How Many Students are you looking for? Undergraduate or Graduate? -->



<!-- Qualifications Field -->
<div class="form-group col-sm-12 col-lg-12">
    @component('components.form.textarea', [
        'name'        => 'qualifications',
        'label'       => 'Qualifications:',
        'help_text'   => 'What specific skills should the applying students possess?',
        'placeholder' => 'e.g. Participant must be an enrolled undergraduate student...',
        'object'      => $opportunity->opportunityable ?? null,
    ])@endcomponent
</div>


<!-- Responsibilities Field -->
<div class="form-group col-sm-12 col-lg-12">
    @component('components.form.textarea', [
        'name'        => 'responsibilities',
        'label'       => 'Student Responsibilities:',
        'help_text'   => 'What will the student responsibilities be?',
        'placeholder' => 'Participants will organize...',
        'object'      => $opportunity->opportunityable ?? null,
    ])@endcomponent
</div>


<!-- Contact details -->




<!-- Opportunity Status Field -->
<div class="form-group col-sm-6">
    @component('components.form.select', [
        'name'        => 'status',
        'label'       => 'Status:',
        'placeholder' => 'Select status...',
        'optionList'  => $statuses,
        'object'      => $opportunity ?? null,
    ])@endcomponent
</div>
<script>
$('#status').selectize({
    create: false,
    persist: false,
    highlight: false,
    openOnFocus: true,
    maxOptions: null,
    maxItems: 1,
    valueField: 'id',
    labelField: 'name',
    searchField: 'name',
    options: {!! json_encode($statuses) !!}
});
</script>

<div id="filler_status" class="form-group col-sm-12"><p>&nbsp;</p></div>


<!-- Categories Field -->
<div class="form-group col-sm-6">
    @component('components.form.select_array', [
        'name'        => 'categories',
        'label'       => 'Categories:',
        'placeholder' => 'Click or type to add categories...',
        'optionList'  => $categories,
        'attributes'  => 'multiple',
        'object'      => $opportunity->categories ?? null,
    ])@endcomponent
</div>

<script>
$('#categories').selectize({
    create: false,
    persist: false,
    highlight: true,
    openOnFocus: true,
    maxOptions: 10,
    maxItems: null,
    valueField: 'id',
    labelField: 'name',
    searchField: 'name',
    options: {!! json_encode($categories) !!}
});
</script>

<!-- Keywords Field -->
<div class="form-group col-sm-6">
    @component('components.form.select_array', [
        'name'        => 'keywords',
        'label'       => 'Keywords:',
        'placeholder' => 'Click or type to add keywords...',
        'optionList'  => $keywords,
        'attributes'  => 'multiple',
        'object'      => $opportunity->keywords ?? null,
    ])@endcomponent
</div>

<script>
$('#keywords').selectize({
    create: true,
    persist: true,
    highlight: true,
    openOnFocus: true,
    maxOptions: 10,
    maxItems: null,
    valueField: 'id',
    labelField: 'name',
    searchField: 'name',
    options: {!! json_encode($keywords) !!}
});
</script>


<!-- Compensation Field -->
<div class="form-group col-sm-12 col-lg-12">
    @component('components.form.textarea', [
        'name'        => 'compensation',
        'label'       => 'Student Compensation and Project Funds:',
        'help_text'   => 'Describe how students will be compensated in this project. If the student will not be paid, list other forms of compensation (metro pass, re-usable water bottles, etc.)',
        'placeholder' => 'Participants will receive...',
        'object'      => $opportunity->opportunityable ?? null,
    ])@endcomponent
</div>

<!-- Learning Outcomes Field -->
<div class="form-group col-sm-12 col-lg-12">
    @component('components.form.textarea', [
        'name'        => 'learning_outcomes',
        'label'       => 'Learning Outcomes:',
        'help_text'   => 'Describe what the student might learn from this experience.',
        'placeholder' => 'Participants should learn ...',
        'object'      => $opportunity->opportunityable ?? null,
    ])@endcomponent
</div>



<!-- Application Instructions Field -->
<div class="form-group col-sm-12 col-lg-12">
    @component('components.form.textarea', [
        'name'        => 'application_instructions',
        'label'       => 'Application Instructions:',
        'help_text'   => 'Describe the steps the participant must follow to request admission into the project.',
        'placeholder' => 'Click the "Apply Now" button on this page...',
        'object'      => $opportunity->opportunityable ?? null,
    ])@endcomponent
</div>

<!-- Budget Type Field -->
<div class="form-group col-sm-6">
    @component('components.form.input', [
        'name'        => 'budget_type',
        'label'       => 'Budget Available:',
        'help_text'   => 'Enter whether there is a budget for the project. The budget entails monetary and in-kind contributions.',
        'placeholder' => 'Monetary',
        'object'      => $opportunity->opportunityable ?? null,
    ])@endcomponent
</div>

<!-- Budget Amount Field -->
<div class="form-group col-sm-6">
    @component('components.form.input', [
        'name'        => 'budget_amount',
        'label'       => 'Budget Amount:',
        'help_text'   => 'If this project has a budget, state how large that budget is.',
        'placeholder' => '$x',
        'object'      => $opportunity->opportunityable ?? null,
    ])@endcomponent
</div>


<!-- Parent Opportunity Field -->
<div class="form-group col-sm-12">
    @component('components.form.select', [
        'name'        => 'parent_opportunity_id',
        'label'       => 'Predecessor Opportunity:',
        'placeholder' => 'Select or type opportunity name...',
        'optionList'  => $allOpportunities,
        'object'      => $opportunity->parentOpportunity ?? null,
    ])@endcomponent
</div>

<script>
$('#parent_opportunity_id').selectize({
    create: false,
    persist: false,
    highlight: true,
    openOnFocus: true,
    maxOptions: null,
    maxItems: 1,
    valueField: 'id',
    labelField: 'name',
    searchField: 'name',
    options: {!! json_encode($allOpportunities) !!}
});
</script>

<!-- Opportunity Supervisor Field -->
<div class="form-group col-sm-12">
    @component('components.form.select', [
        'name'        => 'supervisor_user_id',
        'label'       => 'Project Supervisor:',
        'placeholder' => 'Select or type user name...',
        'optionList'  => $users,
        'object'      => $opportunity->supervisorUser ?? null,
    ])@endcomponent
</div>

<script>
$('#supervisor_user_id').selectize({
    create: false,
    persist: false,
    highlight: true,
    openOnFocus: true,
    maxOptions: 10,
    maxItems: 1,
    valueField: 'id',
    labelField: 'name',
    searchField: 'name',
    options: {!! json_encode($users) !!}
});
</script>

<!-- Program Lead Field -->
<div class="form-group col-sm-12">
    @component('components.form.input', [
        'name'        => 'program_lead',
        'label'       => 'ASU Program Lead:',
        'help_text'   => 'If this project is part of a larger program, which is run through the School of Sustainability, GIOS, or another ASU initiative, then provide the name of the leader of that bigger program here. The program leader is typically different from the Project Supervisor listed above.',
        'placeholder' => 'Professor John Smith, School of Sustainability',
        'object'      => $opportunity->opportunityable ?? null,
    ])@endcomponent
</div>

<!-- Success Story Field -->
<div class="form-group col-sm-12">
    @component('components.form.input', [
        'name'        => 'success_story',
        'label'       => 'Success Story:',
        'help_text'   => 'If a Success Story is published for this project, enter the url here.',
        'placeholder' => 'http://example.info',
        'type'        => 'url',
        'object'      => $opportunity->opportunityable ?? null,
    ])@endcomponent
</div>

<!-- Library Collection Field -->
<div class="form-group col-sm-12">
    @component('components.form.input', [
        'name'        => 'library_collection',
        'label'       => 'Library Collection:',
        'help_text'   => 'If this project has been published in the ASU Library Collection, enter the url to that page.',
        'placeholder' => 'http://example.info',
        'type'        => 'url',
        'object'      => $opportunity->opportunityable ?? null,
    ])@endcomponent
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    @component('components.form.button', [
        'name'    => 'btn_submit',
        'text'    => 'Save',
        'type'    => 'submit',
    ])@endcomponent

    <a href="{!! route('projects.index') !!}" class="btn btn-default">Cancel</a>
</div>
