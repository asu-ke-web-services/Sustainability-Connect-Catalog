<!-- Organization Type Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('organization_type_id', 'Organization Type Id:') !!}
    {!! Form::number('organization_type_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Organization Status Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('organization_status_id', 'Organization Status Id:') !!}
    {!! Form::number('organization_status_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('organizations.index') !!}" class="btn btn-default">Cancel</a>
</div>
