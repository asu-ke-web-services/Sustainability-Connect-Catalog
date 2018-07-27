
<!-- Title Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('title', 'Name:') !!}
    {!! Form::text('title', null, [
        'class' => 'form-control',
        'placeholder' => 'Name can be up to 255 characters long',
        'required' => 'required'
    ]) !!}
</div>

<!-- Alt Title Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('alt_title', 'Name (for non-SOS Users):') !!}
    {!! Form::text('alt_title', null, [
        'class' => 'form-control',
    ]) !!}
</div>

<!-- Slug Field -->
{{-- <div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('slug', 'Slug:') !!}
    {!! Form::text('slug', null, ['class' => 'form-control']) !!}
</div> --}}


<!-- Opportunity Status Field -->
<div class="form-group col-sm-4">
    {!! Form::label('status', 'Status:') !!}
    {!! Form::select(
        'status',
        $status,
        $opportunity->opportunity_status_id ?? null,
        [
            'id' => 'select-statuses',
            'class' => 'form-control',
            'placeholder' => 'Select status...',
        ]
    ) !!}
</div>

<script>
$('#select-statuses').selectize({
    create: false,
    persist: false,
    highlight: false,
    openOnFocus: true,
    maxOptions: 10,
    maxItems: 1,
    valueField: 'id',
    labelField: 'name',
    searchField: 'name',
    options: {!! json_encode($status) !!}
});
</script>

<div id="filler_status" class="form-group col-sm-8"><h2>&nbsp;</h2></div>


<!-- Accept Applications Toggle -->
<div class="form-group col-sm-4">
    {!! Form::button('Accept Applications', ['id' => 'btn_accept_applications', 'class' => 'btn btn-primary', 'onclick' => '$("#field_application_listing").toggle(); $("#filler_application_listing").toggle();']) !!}
{{--     {!! Form::button('No Applications', ['id' => 'btn_no_applications', 'class' => 'btn btn-primary', 'style' => 'display: none;', 'onclick' => '$("#field_application_listing").toggle(); $("#filler_application_listing").toggle(); $("#btn_accept_applications").show(); $("#btn_accept_applications").hide();']) !!} --}}
</div>


<div id="field_application_listing" class="form-group col-sm-8" style="display: none;">
    <!-- Listing Starts Field -->
    <div class="col-sm-6">
        {!! Form::label('listing_starts', 'Listing Starts:') !!}
        {!! Form::date('listing_starts', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Listing Ends Field -->
    <div class="col-sm-6">
        {!! Form::label('listing_ends', 'Listing Ends:') !!}
        {!! Form::date('listing_ends', null, ['class' => 'form-control']) !!}
    </div>
</div>
<div id="filler_application_listing" class="form-group col-sm-8"><p>&nbsp;</p></div>

<div class="form-group col-sm-12">
    {!! Form::button('Switch Deadline to Text', ['id' => 'btn_text_deadline', 'class' => 'btn btn-primary', 'onclick' => '$("#field_app_deadline_date").toggle(); $("#field_app_deadline_text").toggle();']) !!}
</div>

<div class="form-group col-sm-4">
    <!-- Application Deadline Field -->
    <div id="field_app_deadline_date" class="form-group col-sm-12">
        {!! Form::label('application_deadline', 'Application Deadline Date:') !!}
        {!! Form::date('application_deadline', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Application Deadline Text Field -->
    <div id="field_app_deadline_text" class="form-group col-sm-12" style="display: none;">
        {!! Form::label('application_deadline_text', 'Application Deadline Text:') !!}
        {!! Form::text('application_deadline_text', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Opportunity Begins Field -->
<div class="form-group col-sm-4">
    {!! Form::label('start_date', 'Opportunity Begins:') !!}
    {!! Form::date('start_date', null, ['class' => 'form-control']) !!}
</div>

<!-- Opportunity Ends Field -->
<div class="form-group col-sm-4">
    {!! Form::label('end_date', 'Opportunity Ends:') !!}
    {!! Form::date('end_date', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', 'Project Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Please describe the project in less than 150 words. Identify sustainability goals and challenges. Keep in mind that some information that could be included here, might have a more appropriate field elsewhere on this form (e.g. Project Deliverables, Application Instructions, etc.)']) !!}
</div>

<!-- Categories Field -->
<div class="form-group col-sm-6">
    {!! Form::label('categories', 'Categories:') !!}
    {!! Form::select(
        'categories[]',
        $categories,
        $opportunity->categories ?? null,
        [
            'id' => 'select-categories',
            'class' => 'form-control',
            'multiple' => 'multiple',
            'placeholder' => 'Select or type to add categories...',
        ]
    ) !!}
</div>

<script>
$('#select-categories').selectize({
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
    {!! Form::label('keywords', 'Keywords:') !!}
    {!! Form::select(
            'keywords[]',
            $keywords,
            $opportunity->keywords ?? null,
            [
                'id' => 'select-keywords',
                'class' => 'form-control',
                'multiple' => 'multiple',
            'placeholder' => 'Select or type to add keywords...',
            ]
        ) !!}
</div>

<script>
$('#select-keywords').selectize({
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

<!-- Addresses Block -->
<div class="form-group col-sm-6">
@if( isset($opportunity) )
    @foreach( $opportunity->addresses as $key => $address)
        @include('opportunities._address', [
            'count' => $key + 1,
            'address' => $address
        ])
    @endforeach
@else
    {!! Form::label("addresses[0][count]", "Location 1:") !!}
    {!! Form::text("addresses[0][city]", '', ['class' => 'form-control', 'placeholder' => 'City']) !!}
    {!! Form::text("addresses[0][state]", '', ['class' => 'form-control', 'placeholder' => 'State/Prov']) !!}
    {!! Form::text("addresses[0][country]", '', ['class' => 'form-control', 'placeholder' => 'Country']) !!}
    {!! Form::textarea("addresses[0][note]", '', ['class' => 'form-control', 'placeholder' => 'Note']) !!}
@endif
</div>

<!-- Compensation Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('opportunityable[compensation]', 'Student Compensation and Project Funds:') !!}
    {!! Form::textarea('opportunityable[compensation]', null, ['class' => 'form-control', 'placeholder' => 'Describe how students will be compensated in this project. If the student will not be paid, list other forms of compensation (metro pass, re-usable water bottles, etc.)']) !!}
</div>

<!-- Responsibilities Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('opportunityable[responsibilities]', 'Student Responsibilities:') !!}
    {!! Form::textarea('opportunityable[responsibilities]', null, ['class' => 'form-control', 'placeholder' => 'List tasks and responsibilities for students to perform in the project.']) !!}
</div>

<!-- Learning Outcomes Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('opportunityable[learning_outcomes]', 'Learning Outcomes:') !!}
    {!! Form::textarea('opportunityable[learning_outcomes]', null, ['class' => 'form-control', 'placeholder' => 'Describe what the student might learn from this experience.']) !!}
</div>

<!-- Project Deliverables Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('opportunityable[sustainability_contribution]', 'Project Deliverables:') !!}
    {!! Form::textarea('opportunityable[sustainability_contribution]', null, ['class' => 'form-control', 'placeholder' => 'Describe how the project will contribute towards sustainability.']) !!}
</div>

<!-- Qualifications Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('opportunityable[qualifications]', 'Qualifications:') !!}
    {!! Form::textarea('opportunityable[qualifications]', null, ['class' => 'form-control', 'placeholder' => 'Describe the minimum qualifications students must meet in order to participate in this project, as well as desired qualifications and experiences.']) !!}
</div>

<!-- Application Instructions Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('opportunityable[application_instructions]', 'Application Instructions:') !!}
    {!! Form::textarea('opportunityable[application_instructions]', null, ['class' => 'form-control', 'placeholder' => 'Describe the steps the participant must follow to request admission into the project']) !!}
</div>

<!-- Path to Implementation Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('opportunityable[implementation_paths]', 'Implementation Paths:') !!}
    {!! Form::textarea('opportunityable[implementation_paths]', null, ['class' => 'form-control', 'placeholder' => 'Enter any information needed concerning how this project might be implemented.']) !!}
</div>

<!-- Budget Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('opportunityable[budget_type]', 'Budget Available:') !!}
    {!! Form::text('opportunityable[budget_type]', null, ['class' => 'form-control', 'placeholder' => 'Enter whether there is a budget for the project. THebudget entails monetary and in-kind contributions.']) !!}
</div>

<!-- Budget Amount Field -->
<div class="form-group col-sm-6">
    {!! Form::label('opportunityable[budget_amount]', 'Budget Amount:') !!}
    {!! Form::text('opportunityable[budget_amount]', null, ['class' => 'form-control', 'placeholder' => 'If this project has a budget, state how large that budget is.']) !!}
</div>


<!-- Parent Opportunity Field -->
<div class="form-group col-sm-6">
    {!! Form::label('parent_opportunity_id', 'Predecessor Opportunity:') !!}
    {!! Form::select(
            'parent_opportunity_id',
            $allOpportunities,
            $opportunity->parentOpportunity->id ?? null,
            [
                'id' => 'select-parent-opportunity',
                'class' => 'form-control',
                'placeholder' => 'Select or type opportunity name...',
            ]
        ) !!}
</div>

<script>
$('#select-parent-opportunity').selectize({
    create: false,
    persist: false,
    highlight: true,
    openOnFocus: true,
    maxOptions: 10,
    maxItems: 1,
    valueField: 'id',
    labelField: 'title',
    searchField: 'title',
    options: {!! json_encode($allOpportunities) !!}
});
</script>

<!-- Organization Field -->
<div class="form-group col-sm-6">
    {!! Form::label('organization_id', 'Project Partner Organization:') !!}
    {!! Form::select(
            'organization_id',
            $allOrganizations,
            $opportunity->organization->id ?? null,
            [
                'id' => 'select-organization',
                'class' => 'form-control',
                'placeholder' => 'Select or type organization name...',
            ]
        ) !!}
</div>

<script>
$('#select-organization').selectize({
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

<!-- Opportunity Supervisor Field -->
<div class="form-group col-sm-6">
    {!! Form::label('owner_user_id', 'Project Supervisor:') !!}
    {!! Form::select(
            'owner_user_id',
            $users,
            $opportunity->ownerUser ?? null,
            [
                'id' => 'select-supervisor',
                'class' => 'form-control',
                'placeholder' => 'Select or type user name...',
            ]
        ) !!}
</div>

<script>
$('#select-supervisor').selectize({
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
<div class="form-group col-sm-6">
    {!! Form::label('program_lead', 'ASU Program Lead:') !!}
    {!! Form::text('program_lead', null, ['class' => 'form-control', 'placeholder' => 'If this project is part of a larger program, which is run through the School of Sustainability, GIOS, or another ASU initiative, then provide the name of the leader of that bigger program here. The program leader is typically different from the Project Supervisor listed above.']) !!}
</div>

<!-- Success Story Field -->
<div class="form-group col-sm-6">
    {!! Form::label('success_story', 'Success Story:') !!}
    {!! Form::text('success_story', null, ['class' => 'form-control', 'placeholder' => 'If a Success Story is published for this project, enter the url here.']) !!}
</div>

<!-- Library Collection Field -->
<div class="form-group col-sm-6">
    {!! Form::label('library_collection', 'Library Collection:') !!}
    {!! Form::text('library_collection', null, ['class' => 'form-control', 'placeholder' => 'If this project has been published in the ASU Library Collection, enter the url to that page.']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('projects.index') !!}" class="btn btn-default">Cancel</a>
</div>
