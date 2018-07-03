<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $opportunity->id !!}</p>
</div>

<!-- Opportunityable Id Field -->
<div class="form-group">
    {!! Form::label('opportunityable_id', 'Opportunityable Id:') !!}
    <p>{!! $opportunity->opportunityable_id !!}</p>
</div>

<!-- Opportunityable Type Field -->
<div class="form-group">
    {!! Form::label('opportunityable_type', 'Opportunityable Type:') !!}
    <p>{!! $opportunity->opportunityable_type !!}</p>
</div>

<!-- Title Field -->
<div class="form-group">
    {!! Form::label('title', 'Title:') !!}
    <p>{!! $opportunity->title !!}</p>
</div>

<!-- Alt Title Field -->
<div class="form-group">
    {!! Form::label('alt_title', 'Alt Title:') !!}
    <p>{!! $opportunity->alt_title !!}</p>
</div>

<!-- Slug Field -->
<div class="form-group">
    {!! Form::label('slug', 'Slug:') !!}
    <p>{!! $opportunity->slug !!}</p>
</div>

<!-- Listing Expires Field -->
<div class="form-group">
    {!! Form::label('listing_expires', 'Listing Expires:') !!}
    <p>{!! $opportunity->listing_expires !!}</p>
</div>

<!-- Application Deadline Field -->
<div class="form-group">
    {!! Form::label('application_deadline', 'Application Deadline:') !!}
    <p>{!! $opportunity->application_deadline !!}</p>
</div>

<!-- Opportunity Status Id Field -->
<div class="form-group">
    {!! Form::label('opportunity_status_id', 'Opportunity Status Id:') !!}
    <p>{!! $opportunity->opportunity_status_id !!}</p>
</div>

<!-- Hidden Field -->
<div class="form-group">
    {!! Form::label('hidden', 'Hidden:') !!}
    <p>{!! $opportunity->hidden !!}</p>
</div>

<!-- Summary Field -->
<div class="form-group">
    {!! Form::label('summary', 'Summary:') !!}
    <p>{!! $opportunity->summary !!}</p>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    <p>{!! $opportunity->description !!}</p>
</div>

<!-- Parent Opportunity Id Field -->
<div class="form-group">
    {!! Form::label('parent_opportunity_id', 'Parent Opportunity Id:') !!}
    <p>{!! $opportunity->parent_opportunity_id !!}</p>
</div>

<!-- Organization Id Field -->
<div class="form-group">
    {!! Form::label('organization_id', 'Organization Id:') !!}
    <p>{!! $opportunity->organization_id !!}</p>
</div>

<!-- Owner User Id Field -->
<div class="form-group">
    {!! Form::label('owner_user_id', 'Owner User Id:') !!}
    <p>{!! $opportunity->owner_user_id !!}</p>
</div>

<!-- Submitting User Id Field -->
<div class="form-group">
    {!! Form::label('submitting_user_id', 'Submitting User Id:') !!}
    <p>{!! $opportunity->submitting_user_id !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $opportunity->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $opportunity->updated_at !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $opportunity->deleted_at !!}</p>
</div>

<!-- Compensation Field -->
<div class="form-group">
    {!! Form::label('compensation', 'Compensation:') !!}
    <p>{!! $opportunity->opportunityable->compensation !!}</p>
</div>

