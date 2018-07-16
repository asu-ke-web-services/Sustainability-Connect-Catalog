
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
    {!! Form::label('opportunity_status_id', 'Opportunity Status:') !!}
    {!! Form::select('opportunity_status_id', [1 => 'Idea Submission', 2 => 'Seeking Champion', 3 => 'Recruiting Participants', 5 => 'In Progress', 6 => 'Completed', 7 => 'Archived', ], '1', ['class' => 'form-control', 'placeholder' => 'Placeholder help text']) !!}
</div>

<!-- Hidden Field -->
<div class="form-group col-sm-4">
    {!! Form::label('hidden', 'Hide Opportunity:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('hidden', false) !!}
        {!! Form::checkbox('hidden', '1', false) !!} 1
    </label>
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Summary Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('summary', 'Summary:') !!}
    {!! Form::textarea('summary', null, ['class' => 'form-control']) !!}
</div>


<!-- Categories Field -->
<div class="form-group col-sm-6">
    {!! Form::label('categories', 'Categories:') !!}
    {!! Form::select(
            'categories[]',
            $categories->toArray(),
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
            $keywords->toArray(),
            null,
            [
                'class' => 'form-control',
                'multiple' => 'multiple'
            ]
        ) !!}
</div>

<!-- Addresses Block -->
<div class="form-group col-sm-6">
@foreach( $opportunity->addresses as $key => $address)
    @include('opportunities._address', [
        'count' => $key + 1,
        'address' => $address
    ])
@endforeach
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
    {!! Form::label('owner_user_id', 'Opportunity Supervisor:') !!}
    {!! Form::select(
            'owner_user_id',
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
