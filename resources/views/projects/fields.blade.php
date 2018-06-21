<!-- Compensation Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('compensation', 'Compensation:') !!}
    {!! Form::textarea('compensation', null, ['class' => 'form-control']) !!}
</div>

<!-- Responsibilities Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('responsibilities', 'Responsibilities:') !!}
    {!! Form::textarea('responsibilities', null, ['class' => 'form-control']) !!}
</div>

<!-- Learning Outcomes Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('learning_outcomes', 'Learning Outcomes:') !!}
    {!! Form::textarea('learning_outcomes', null, ['class' => 'form-control']) !!}
</div>

<!-- Sustainability Contribution Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('sustainability_contribution', 'Sustainability Contribution:') !!}
    {!! Form::textarea('sustainability_contribution', null, ['class' => 'form-control']) !!}
</div>

<!-- Qualifications Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('qualifications', 'Qualifications:') !!}
    {!! Form::textarea('qualifications', null, ['class' => 'form-control']) !!}
</div>

<!-- Application Overview Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('application_overview', 'Application Overview:') !!}
    {!! Form::textarea('application_overview', null, ['class' => 'form-control']) !!}
</div>

<!-- Implementation Paths Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('implementation_paths', 'Implementation Paths:') !!}
    {!! Form::textarea('implementation_paths', null, ['class' => 'form-control']) !!}
</div>

<!-- Budget Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('budget_type', 'Budget Type:') !!}
    {!! Form::text('budget_type', null, ['class' => 'form-control']) !!}
</div>

<!-- Budget Amount Field -->
<div class="form-group col-sm-6">
    {!! Form::label('budget_amount', 'Budget Amount:') !!}
    {!! Form::text('budget_amount', null, ['class' => 'form-control']) !!}
</div>

<!-- Program Lead Field -->
<div class="form-group col-sm-6">
    {!! Form::label('program_lead', 'Program Lead:') !!}
    {!! Form::text('program_lead', null, ['class' => 'form-control']) !!}
</div>

<!-- Success Story Field -->
<div class="form-group col-sm-6">
    {!! Form::label('success_story', 'Success Story:') !!}
    {!! Form::text('success_story', null, ['class' => 'form-control']) !!}
</div>

<!-- Library Collection Field -->
<div class="form-group col-sm-6">
    {!! Form::label('library_collection', 'Library Collection:') !!}
    {!! Form::text('library_collection', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('projects.index') !!}" class="btn btn-default">Cancel</a>
</div>
