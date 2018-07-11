<!-- Title Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('title', 'Project Name:') !!}
    {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Project name can be up to 255 characters long']) !!}
</div>

<!-- Alt Title Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('alt_title', 'Project Name (for non-SOS Users):') !!}
    {!! Form::text('alt_title', null, ['class' => 'form-control', 'placeholder' => 'Placeholder help text']) !!}
</div>

<!-- Slug Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('slug', 'Project Slug:') !!}
    {!! Form::text('slug', null, ['class' => 'form-control']) !!}
</div>

<!-- Listing Expires Field -->
<div class="form-group col-sm-6">
    {!! Form::label('listing_expires', 'Listing Expires:') !!}
    {!! Form::date('listing_expires', null, ['class' => 'form-control']) !!}
</div>

<!-- Application Deadline Field -->
<div class="form-group col-sm-6">
    {!! Form::label('application_deadline', 'Application Deadline:') !!}
    {!! Form::date('application_deadline', null, ['class' => 'form-control']) !!}
</div>

<!-- Project Begins Field -->
<div class="form-group col-sm-6">
    {!! Form::label('start_date', 'Project Begins:') !!}
    {!! Form::date('start_date', null, ['class' => 'form-control']) !!}
</div>

<!-- Project Ends Field -->
<div class="form-group col-sm-6">
    {!! Form::label('end_date', 'Project Ends:') !!}
    {!! Form::date('end_date', null, ['class' => 'form-control']) !!}
</div>

<!-- Opportunity Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('opportunity_status_id', 'Status:') !!}
    {!! Form::select('opportunity_status_id', [1 => 'Idea Submission', 2 => 'Seeking Champion', 3 => 'Recruiting Participants', 5 => 'In Progress', 6 => 'Completed', 7 => 'Archived', ], '1', ['class' => 'form-control', 'placeholder' => 'Placeholder help text']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', 'Project Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Please describe the project in less than 150 words. Identify sustainability goals and challenges. Keep in mind that some information that could be included here, might have a more appropriate field elsewhere on this form (e.g. Project Deliverables, Application Instructions, etc.)']) !!}
</div>

<!-- Categories Field -->
<div class="form-group col-sm-6">
    {!! Form::label('categories', 'Categories:') !!}
    {!! Form::select('categories', [1 => 'SDG 1: Affordable and Clean Energy', 2 => 'SDG 2: Clean Water and Sanitation', 3 => 'SDG 3: Climate Action', 4 => 'SDG 4: Decent Work and Economic Growth', 5 => 'SDG 5: Gender Equality', 6 => 'SDG 6: Good Health and Well-Being'], null, ['class' => 'form-control', 'placeholder' => 'Example: select a category']) !!}
</div>

<!-- Keywords Field -->
<div class="form-group col-sm-6">
    {!! Form::label('keywords', 'Keywords:') !!}
    {!! Form::select('keywords', [1 => 'Air Quality', 2 => 'Alternative Fuels', 3 => 'Architecture', 5 => 'Biofuels', 6 => 'Citizen Action', 7 => 'Conservation Biology', ], null, ['class' => 'form-control', 'placeholder' => 'TODO: make into autoselect with multi-choice']) !!}
</div>

<!-- Compensation Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('compensation', 'Student Compensation and Project Funds:') !!}
    {!! Form::textarea('compensation', null, ['class' => 'form-control', 'placeholder' => 'Describe how students will be compensated in this project. If the student will not be paid, list other forms of compensation (metro pass, re-usable water bottles, etc.)']) !!}
</div>

<!-- Responsibilities Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('responsibilities', 'Student Responsibilities:') !!}
    {!! Form::textarea('responsibilities', null, ['class' => 'form-control', 'placeholder' => 'List tasks and responsibilities for students to perform in the project.']) !!}
</div>

<!-- Learning Outcomes Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('learning_outcomes', 'Learning Outcomes:') !!}
    {!! Form::textarea('learning_outcomes', null, ['class' => 'form-control', 'placeholder' => 'Describe what the student might learn from this experience.']) !!}
</div>

<!-- Project Deliverables Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('sustainability_contribution', 'Project Deliverables:') !!}
    {!! Form::textarea('sustainability_contribution', null, ['class' => 'form-control', 'placeholder' => 'Describe how the project will contribute towards sustainability.']) !!}
</div>

<!-- Qualifications Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('qualifications', 'Qualifications:') !!}
    {!! Form::textarea('qualifications', null, ['class' => 'form-control', 'placeholder' => 'Describe the minimum qualifications students must meet in order to participate in this project, as well as desired qualifications and experiences.']) !!}
</div>

<!-- Application Instructions Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('application_overview', 'Application Instructions:') !!}
    {!! Form::textarea('application_overview', null, ['class' => 'form-control', 'placeholder' => 'Describe the steps the participant must follow to request admission into the project']) !!}
</div>

<!-- Path to Implementation Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('project', 'Implementation Paths:') !!}
    {!! Form::textarea('implementation_paths', null, ['class' => 'form-control', 'placeholder' => 'Enter any information needed concerning how this project might be implemented.']) !!}
</div>

<!-- Budget Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('budget_type', 'Budget Type:') !!}
    {!! Form::text('budget_type', null, ['class' => 'form-control', 'placeholder' => 'Placeholder help text']) !!}
</div>

<!-- Budget Amount Field -->
<div class="form-group col-sm-6">
    {!! Form::label('budget_amount', 'Budget Amount:') !!}
    {!! Form::text('budget_amount', null, ['class' => 'form-control', 'placeholder' => 'Placeholder help text']) !!}
</div>


<!-- Parent Opportunity Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('parent_opportunity_id', 'Parent Opportunity Id:') !!}
    {!! Form::number('parent_opportunity_id', null, ['class' => 'form-control', 'placeholder' => 'Placeholder help text']) !!}
</div>

<!-- Organization Partner Field -->
<div class="form-group col-sm-6">
    {!! Form::label('organization', 'Organization Partner:') !!}
    {!! Form::number('organization', null, ['class' => 'form-control', 'placeholder' => 'TODO: autoselect existing orgnaization or create new record']) !!}
</div>


<!-- Organization Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('organization_id', 'Organization Id:') !!}
    {!! Form::number('organization_id', null, ['class' => 'form-control', 'placeholder' => 'Placeholder help text']) !!}
</div>

<!-- Owner User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('owner_user_id', 'Owner User Id:') !!}
    {!! Form::number('owner_user_id', null, ['class' => 'form-control', 'placeholder' => 'Placeholder help text']) !!}
</div>





<!-- Program Lead Field -->
<div class="form-group col-sm-6">
    {!! Form::label('program_lead', 'Program Lead:') !!}
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
