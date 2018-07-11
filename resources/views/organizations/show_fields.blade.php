<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $organization->id !!}</p>
</div>

<!-- Organization Type Id Field -->
<div class="form-group">
    {!! Form::label('organization_type_id', 'Organization Type Id:') !!}
    <p>{!! $organization->organization_type_id !!}</p>
</div>

<!-- Organization Status Id Field -->
<div class="form-group">
    {!! Form::label('organization_status_id', 'Organization Status Id:') !!}
    <p>{!! $organization->organization_status_id !!}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{!! $organization->name !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $organization->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $organization->updated_at !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $organization->deleted_at !!}</p>
</div>

