
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
        1,
        [
            'class' => 'form-control'
        ]
    ) !!}
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
            null,
            [
                'class' => 'form-control',
                'multiple' => 'multiple'
            ]
        ) !!}
</div>

<!-- Keywords Field -->
<div class="form-group col-sm-6">
    {!! Form::label('keywords', 'Keywords:') !!}
    {!! Form::select(
            'keywords[]',
            $keywords,
            null,
            [
                'class' => 'form-control',
                'multiple' => 'multiple'
            ]
        ) !!}
</div>

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
    {!! Form::label('opportunityable[budget_type]', 'Budget Type:') !!}
    {!! Form::text('opportunityable[budget_type]', null, ['class' => 'form-control', 'placeholder' => 'Placeholder help text']) !!}
</div>

<!-- Budget Amount Field -->
<div class="form-group col-sm-6">
    {!! Form::label('opportunityable[budget_amount]', 'Budget Amount:') !!}
    {!! Form::text('opportunityable[budget_amount]', null, ['class' => 'form-control', 'placeholder' => 'Placeholder help text']) !!}
</div>


<!-- Parent Opportunity Field -->
<div class="form-group col-sm-6">
    {!! Form::label('parent_opportunity_id', 'Parent Opportunity:') !!}
    {!! Form::select(
            'parent_opportunity_id',
            $allOpportunities,
            null,
            [
                'class' => 'form-control'
            ]
        ) !!}
</div>

<!-- Organization Field -->
<div class="form-group col-sm-6">
    {!! Form::label('organization_id', 'Organization:') !!}
    {!! Form::select(
            'organization_id',
            $allOrganizations,
            null,
            [
                'class' => 'form-control'
            ]
        ) !!}
</div>

<!-- Opportunity Supervisor Field -->
<div class="form-group col-sm-6">
    {!! Form::label('owner_user_id', 'Opportunity Supervisor:') !!}
    {!! Form::select(
            'owner_user_id',
            $users,
            null,
            [
                'class' => 'form-control'
            ]
        ) !!}
</div>

<!-- Program Lead Field -->
<div class="form-group col-sm-6">
    {!! Form::label('program_lead', 'ASU Program Lead:') !!}
    {!! Form::text('program_lead', null, ['class' => 'form-control', 'placeholder' => 'Placeholder help text']) !!}
</div>

<!-- Success Story Field -->
<div class="form-group col-sm-6">
    {!! Form::label('success_story', 'Success Story:') !!}
    {!! Form::text('success_story', null, ['class' => 'form-control', 'placeholder' => 'Placeholder help text']) !!}
</div>

<!-- Library Collection Field -->
<div class="form-group col-sm-6">
    {!! Form::label('library_collection', 'Library Collection:') !!}
    {!! Form::text('library_collection', null, ['class' => 'form-control', 'placeholder' => 'Placeholder help text']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('projects.index') !!}" class="btn btn-default">Cancel</a>
</div>
