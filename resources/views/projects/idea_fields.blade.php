<!-- Title Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('title', 'Name:') !!}
    {!! Form::text('title', null, [
        'class' => 'form-control',
        'placeholder' => 'Name can be up to 255 characters long',
        'required' => 'required'
    ]) !!}
</div>

<!-- Slug Field -->
{{-- <div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('slug', 'Project Slug:') !!}
    {!! Form::text('slug', null, ['class' => 'form-control']) !!}
</div> --}}

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
    {!! Form::select(
        'categories[]',
        $categories,
        $opportunity->categories ?? null,
        [
            'id' => 'select-categories',
            'class' => 'form-control',
            'multiple' => 'multiple',
            'placeholder' => 'Select or type for categories...',
        ]
    ) !!}
</div>

<script>
$('#select-categories').selectize({
    create: false,
    persist: false,
    highlight: true,
    openOnFocus: true,
    maxOptions: 10,
    maxItems: null,
    valueField: 'id',
    labelField: 'name',
    searchField: 'name',
    options: {!! json_encode($categories) !!}
});
</script>

<!-- Keywords Field -->
<div class="form-group col-sm-6">
    {!! Form::label('keywords', 'Keywords:') !!}
    {!! Form::select(
            'keywords[]',
            $keywords,
            $opportunity->keywords ?? null,
            [
                'id' => 'select-keywords',
                'class' => 'form-control',
                'multiple' => 'multiple',
                'placeholder' => 'Select or type for keywords...',
            ]
        ) !!}
</div>

<script>
$('#select-keywords').selectize({
    create: true,
    persist: true,
    highlight: true,
    openOnFocus: true,
    maxOptions: 10,
    maxItems: null,
    valueField: 'id',
    labelField: 'name',
    searchField: 'name',
    options: {!! json_encode($keywords) !!}
});
</script>

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

<!-- Organization Field -->
<div class="form-group col-sm-6">
    {!! Form::label('organization_id', 'Project Partner Organization:') !!}
    {!! Form::select(
            'organization_id',
            $allOrganizations,
            $opportunity->organization->id ?? null,
            [
                'id' => 'select-organization',
                'class' => 'form-control',
                'placeholder' => 'Select or type organization name...',
            ]
        ) !!}
</div>

<script>
$('#select-organization').selectize({
    create: false,
    persist: false,
    highlight: true,
    openOnFocus: true,
    maxOptions: 10,
    maxItems: 1,
    valueField: 'id',
    labelField: 'name',
    searchField: 'name',
    options: {!! json_encode($allOrganizations) !!}
});
</script>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('projects.index') !!}" class="btn btn-default">Cancel</a>
</div>
