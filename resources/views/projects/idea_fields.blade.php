<!-- Title Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('title', 'Project Name:') !!}
    {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Project name can be up to 255 characters long']) !!}
</div>

<!-- Slug Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('slug', 'Project Slug:') !!}
    {!! Form::text('slug', null, ['class' => 'form-control']) !!}
</div>

<!-- Project Begins Field -->
<div class="form-group col-sm-6">
    {!! Form::label('start_date', 'Anticipated Project Start:') !!}
    {!! Form::date('start_date', null, ['class' => 'form-control']) !!}
</div>

<!-- Project Ends Field -->
<div class="form-group col-sm-6">
    {!! Form::label('end_date', 'Anticipated Project End:') !!}
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

<!-- Project Deliverables Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('sustainability_contribution', 'Project Deliverables:') !!}
    {!! Form::textarea('sustainability_contribution', null, ['class' => 'form-control', 'placeholder' => 'Describe how the project will contribute towards sustainability.']) !!}
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

<!-- Organization Partner Field -->
<div class="form-group col-sm-6">
    {!! Form::label('organization', 'Organization Partner:') !!}
    {!! Form::number('organization', null, ['class' => 'form-control', 'placeholder' => 'TODO: autoselect existing orgnaization or create new record']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('projects.index') !!}" class="btn btn-default">Cancel</a>
</div>
