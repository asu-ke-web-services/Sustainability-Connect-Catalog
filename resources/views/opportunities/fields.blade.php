
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
    {!! Form::label('public_name', 'Public Name (for non-SOS Users):') !!}
    {!! Form::text('public_name', null, [
        'class' => 'form-control',
        'placeholder' => 'Placeholder help text'
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
    {!! Form::label('status', 'Opportunity Status:') !!}
    {!! Form::select(
        'status',
        $status,
        1,
        [
            'class' => 'form-control'
        ]
    ) !!}
</div>
{{--
<!-- Hidden Field -->
<div class="form-group col-sm-4">
    {!! Form::label('hidden', 'Hide Opportunity:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('hidden', false) !!}
        {!! Form::checkbox('hidden', '1', false) !!} 1
    </label>
</div>
 --}}
<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>
{{--
<!-- Summary Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('summary', 'Summary:') !!}
    {!! Form::textarea('summary', null, ['class' => 'form-control']) !!}
</div>
 --}}

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

<!-- Parent Opportunity Field -->
<div class="form-group col-sm-6">
    {!! Form::label('parent_opportunity_id', 'Parent Opportunity:') !!}
    {!! Form::select(
            'parent_opportunity_id',
            $parentOpportunities->toArray(),
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
            $organizations->toArray(),
            null,
            [
                'class' => 'form-control'
            ]
        ) !!}
</div>

<!-- Opportunity Supervisor Field -->
<div class="form-group col-sm-6">
    {!! Form::label('supervisor_user_id', 'Opportunity Supervisor:') !!}
    {!! Form::select(
            'supervisor_user_id',
            $users->toArray(),
            null,
            [
                'class' => 'form-control'
            ]
        ) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('opportunities.index') !!}" class="btn btn-default">Cancel</a>
</div>
