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

<!-- Qualifications Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('qualifications', 'Qualifications:') !!}
    {!! Form::textarea('qualifications', null, ['class' => 'form-control']) !!}
</div>

<!-- Application Instructions Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('application_instructions', 'Application Instructions:') !!}
    {!! Form::textarea('application_instructions', null, ['class' => 'form-control']) !!}
</div>

<!-- Comments Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('comments', 'Comments:') !!}
    {!! Form::textarea('comments', null, ['class' => 'form-control']) !!}
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

<!-- Publish On Field -->
<div class="form-group col-sm-6">
    {!! Form::label('publish_on', 'Publish On:') !!}
    {!! Form::date('publish_on', null, ['class' => 'form-control']) !!}
</div>

<!-- Publish Until Field -->
<div class="form-group col-sm-6">
    {!! Form::label('publish_until', 'Publish Until:') !!}
    {!! Form::date('publish_until', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('internships.index') !!}" class="btn btn-default">Cancel</a>
</div>
