<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $project->id !!}</p>
</div>


<!-- Opportunity.Title Field -->
<div class="form-group">
    {!! Form::label('title', 'Title:') !!}
    <p>{!! $project->opportunity->title !!}</p>
</div>

<!-- Opportunity.Slug Field -->
<div class="form-group">
    {!! Form::label('slug', 'Slug:') !!}
    <p>{!! $project->opportunity->slug !!}</p>
</div>

<!-- Opportunity.Description Field -->
<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    <p>{!! $project->opportunity->description !!}</p>
</div>

<!-- Opportunity.Status Field -->
<div class="form-group">
    {!! Form::label('status', 'Status:') !!}
    <p>{!! $project->opportunity->status->name !!}</p>
</div>

<!-- Opportunity.Organization Field -->
<div class="form-group">
    {!! Form::label('organization', 'Organization:') !!}
    <p>{!! $project->opportunity->organization->name !!}</p>
</div>

<!-- Opportunity.Addresses Field -->
<div class="form-group">
{!! Form::label('addresses', 'Addresses:') !!}
    <ul>
        @foreach($project->opportunity->addresses as $address)
            <li>{!! $address->city . ', ' . $address->state !!}</li>
        @endforeach
    </ul>
</div>

<!-- Opportunity.Categories Field -->
<div class="form-group">
{!! Form::label('categories', 'Categories:') !!}
    <ul>
        @foreach($project->opportunity->categories as $category)
            <li>{!! $category->name !!}</li>
        @endforeach
    </ul>
</div>

<!-- Opportunity.Keywords Field -->
<div class="form-group">
{!! Form::label('keywords', 'Keywords:') !!}
    <ul>
        @foreach($project->opportunity->keywords as $keyword)
            <li>{!! $keyword->name !!}</li>
        @endforeach
    </ul>
</div>

<!-- Opportunity.Notes Field -->
<div class="form-group">
{!! Form::label('notes', 'Notes:') !!}
    <ul>
        @foreach($project->opportunity->notes as $note)
            <li>{!! $note->body . ' : ' . $note->updated_at !!}</li>
        @endforeach
    </ul>
</div>

<!-- Opportunity.Manager Field -->
<div class="form-group">
    {!! Form::label('manager', 'Manager:') !!}
    <!-- <p>{!! $project->opportunity->ownerUser->first_name . ' ' . $project->opportunity->ownerUser->last_name !!}</p> -->
    <p>{!! $project->opportunity->ownerUser->name !!}</p>
</div>
<!-- Opportunity.Submitter Field -->
<div class="form-group">
    {!! Form::label('submitter', 'Submitter:') !!}
    <!-- <p>{!! $project->opportunity->submittingUser->first_name . ' ' . $project->opportunity->submittingUser->last_name !!}</p> -->
    <p>{!! $project->opportunity->submittingUser->name !!}</p>
</div>



<!-- Compensation Field -->
<div class="form-group">
    {!! Form::label('compensation', 'Compensation:') !!}
    <p>{!! $project->compensation !!}</p>
</div>

<!-- Responsibilities Field -->
<div class="form-group">
    {!! Form::label('responsibilities', 'Responsibilities:') !!}
    <p>{!! $project->responsibilities !!}</p>
</div>

<!-- Learning Outcomes Field -->
<div class="form-group">
    {!! Form::label('learning_outcomes', 'Learning Outcomes:') !!}
    <p>{!! $project->learning_outcomes !!}</p>
</div>

<!-- Sustainability Contribution Field -->
<div class="form-group">
    {!! Form::label('sustainability_contribution', 'Sustainability Contribution:') !!}
    <p>{!! $project->sustainability_contribution !!}</p>
</div>

<!-- Qualifications Field -->
<div class="form-group">
    {!! Form::label('qualifications', 'Qualifications:') !!}
    <p>{!! $project->qualifications !!}</p>
</div>

<!-- Application Overview Field -->
<div class="form-group">
    {!! Form::label('application_overview', 'Application Overview:') !!}
    <p>{!! $project->application_overview !!}</p>
</div>

<!-- Implementation Paths Field -->
<div class="form-group">
    {!! Form::label('implementation_paths', 'Implementation Paths:') !!}
    <p>{!! $project->implementation_paths !!}</p>
</div>

<!-- Budget Type Field -->
<div class="form-group">
    {!! Form::label('budget_type', 'Budget Type:') !!}
    <p>{!! $project->budget_type !!}</p>
</div>

<!-- Budget Amount Field -->
<div class="form-group">
    {!! Form::label('budget_amount', 'Budget Amount:') !!}
    <p>{!! $project->budget_amount !!}</p>
</div>

<!-- Program Lead Field -->
<div class="form-group">
    {!! Form::label('program_lead', 'Program Lead:') !!}
    <p>{!! $project->program_lead !!}</p>
</div>

<!-- Success Story Field -->
<div class="form-group">
    {!! Form::label('success_story', 'Success Story:') !!}
    <p>{!! $project->success_story !!}</p>
</div>

<!-- Library Collection Field -->
<div class="form-group">
    {!! Form::label('library_collection', 'Library Collection:') !!}
    <p>{!! $project->library_collection !!}</p>
</div>

