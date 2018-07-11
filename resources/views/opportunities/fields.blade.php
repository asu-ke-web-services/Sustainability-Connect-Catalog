<!-- Opportunityable Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('opportunityable_id', 'Opportunityable Id:') !!}
    {!! Form::number('opportunityable_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Opportunityable Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('opportunityable_type', 'Opportunityable Type:') !!}
    {!! Form::text('opportunityable_type', null, ['class' => 'form-control']) !!}
</div>

<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!-- Alt Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('alt_title', 'Alt Title:') !!}
    {!! Form::text('alt_title', null, ['class' => 'form-control']) !!}
</div>

<!-- Slug Field -->
<div class="form-group col-sm-6">
    {!! Form::label('slug', 'Slug:') !!}
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
    {!! Form::text('application_deadline', null, ['class' => 'form-control']) !!}
</div>

<!-- Opportunity Status Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('opportunity_status_id', 'Opportunity Status Id:') !!}
    {!! Form::number('opportunity_status_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Hidden Field -->
<div class="form-group col-sm-6">
    {!! Form::label('hidden', 'Hidden:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('hidden', false) !!}
        {!! Form::checkbox('hidden', '1', null) !!} 1
    </label>
</div>

<!-- Summary Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('summary', 'Summary:') !!}
    {!! Form::textarea('summary', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Parent Opportunity Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('parent_opportunity_id', 'Parent Opportunity Id:') !!}
    {!! Form::number('parent_opportunity_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Organization Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('organization_id', 'Organization Id:') !!}
    {!! Form::number('organization_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Owner User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('owner_user_id', 'Owner User Id:') !!}
    {!! Form::number('owner_user_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submitting User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('submitting_user_id', 'Submitting User Id:') !!}
    {!! Form::number('submitting_user_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('opportunities.index') !!}" class="btn btn-default">Cancel</a>
</div>
