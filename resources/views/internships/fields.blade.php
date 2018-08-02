
<!-- Title Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, [
        'class' => 'form-control',
        'placeholder' => 'Name can be up to 255 characters long',
        'required' => 'required'
    ]) !!}
</div>

<!-- Alt Title Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('public_name', 'Public Name (to show non-SOS Users):') !!}
    {!! Form::text('public_name', null, [
        'class' => 'form-control',
    ]) !!}
</div>

<!-- Slug Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('slug', 'Slug:') !!}
    {!! Form::text('slug', null, ['class' => 'form-control']) !!}
</div>

<!-- Listing Starts Field -->
<div class="form-group col-sm-4">
    {!! Form::label('listing_starts', 'Listing Starts:') !!}
    {!! Form::date('listing_starts', null, ['class' => 'form-control']) !!}
</div>

<!-- Listing Ends Field -->
<div class="form-group col-sm-4">
    {!! Form::label('listing_ends', 'Listing Ends:') !!}
    {!! Form::date('listing_ends', null, ['class' => 'form-control']) !!}
</div>

<!-- Application Deadline Field -->
<div class="form-group col-sm-4">
    {!! Form::label('application_deadline', 'Application Deadline:') !!}
    {!! Form::date('application_deadline', null, ['class' => 'form-control']) !!}
</div>

<!-- Application Deadline Text Field -->
<div class="form-group col-sm-4">
    {!! Form::label('application_deadline_text', 'Application Deadline:') !!}
    {!! Form::text('application_deadline_text', null, ['class' => 'form-control']) !!}
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

<!-- Opportunity Status Field -->
<div class="form-group col-sm-4">
    {!! Form::label('status', 'Status:') !!}
    {!! Form::select(
        'status',
        $status,
        $opportunity->opportunity_status_id ?? null,
        [
            'id' => 'select-status',
            'class' => 'form-control',
            'placeholder' => 'Select status...',
        ]
    ) !!}
</div>

<script>
$('#select-status').selectize({
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

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', 'Project Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Please describe the internship in less than 150 words. Identify sustainability goals and challenges. Keep in mind that some information that could be included here, might have a more appropriate field elsewhere on this form.']) !!}
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
    {!! Form::label('compensation', 'Student Compensation and Project Funds:') !!}
    {!! Form::textarea('compensation', null, ['class' => 'form-control', 'placeholder' => 'Describe how students will be compensated in this internship. If the student will not be paid, list other forms of compensation (metro pass, re-usable water bottles, etc.)']) !!}
</div>

<!-- Responsibilities Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('responsibilities', 'Student Responsibilities:') !!}
    {!! Form::textarea('responsibilities', null, ['class' => 'form-control', 'placeholder' => 'List tasks and responsibilities for students to perform in the internship.']) !!}
</div>

<!-- Qualifications Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('qualifications', 'Qualifications:') !!}
    {!! Form::textarea('qualifications', null, ['class' => 'form-control', 'placeholder' => 'Describe the minimum qualifications students must meet in order to participate in this internship, as well as desired qualifications and experiences.']) !!}
</div>

<!-- Application Instructions Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('application_overview', 'Application Instructions:') !!}
    {!! Form::textarea('application_overview', null, ['class' => 'form-control', 'placeholder' => 'Describe the steps the participant must follow to request admission into the internship']) !!}
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
    labelField: 'name',
    searchField: 'name',
    options: {!! json_encode($allOpportunities) !!}
});
</script>

<!-- Organization Field -->
<div class="form-group col-sm-6">
    {!! Form::label('organization_id', 'Partner Organization:') !!}
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
    {!! Form::label('supervisor_user_id', 'Internship Supervisor:') !!}
    {!! Form::select(
            'supervisor_user_id',
            $users,
            $opportunity->supervisorUser ?? null,
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
    <a href="{!! route('internships.index') !!}" class="btn btn-default">Cancel</a>
</div>
