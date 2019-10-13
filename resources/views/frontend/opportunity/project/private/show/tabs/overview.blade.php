<div class="col">
    <ul class="list-group">
        <li class="list-group-item"><span style="float: left; width: 200px;"><b>Status:</b></span> {{ ucwords($project->status->name ?? '') }}</li>
        <li class="list-group-item"><span style="float: left; width: 200px;"><b>Review Status:</b></span> {{ ucwords($project->reviewStatus->name ?? '') }}</li>
        <li class="list-group-item"><span style="float: left; width: 200px;"><b>Project Starts:</b></span> {{ isset($project->opportunity_start_at) ? $project->opportunity_start_at->toFormattedDateString() : '' }} {{ isset($project->opportunity_start_at) ? '(' . $project->opportunity_start_at->diffForHumans() . ')' : '' }}</li>
        <li class="list-group-item"><span style="float: left; width: 200px;"><b>Project Ends:</b></span> {{ isset($project->opportunity_end_at) ? $project->opportunity_end_at->toFormattedDateString() : '' }} {{ isset($project->opportunity_end_at) ? '(' . $project->opportunity_end_at->diffForHumans() . ')' : '' }}</li>
        <li class="list-group-item"><span style="float: left; width: 200px;"><b>Listing Starts:</b></span> {{ isset($project->listing_start_at) ? $project->listing_start_at->toFormattedDateString() : '' }} {{ isset($project->listing_start_at) ? '(' . $project->listing_start_at->diffForHumans() . ')' : '' }}</li>
        <li class="list-group-item"><span style="float: left; width: 200px;"><b>Listing Ends:</b></span> {{ isset($project->listing_end_at) ? $project->listing_end_at->toFormattedDateString() : '' }} {{ isset($project->listing_end_at) ? '(' . $project->listing_end_at->diffForHumans() . ')' : '' }}</li>
        <li class="list-group-item"><span style="float: left; width: 200px;"><b>Application Deadline:</b></span> {{
            $project->application_deadline_text > ''
                ? $project->application_deadline_text
                : (null !== $project->application_deadline_at ? $project->application_deadline_at->toFormattedDateString() : '') }}</li>
        <li class="list-group-item"><div><b>Affiliations:</b></div>
            <ul>
                @foreach($project->affiliations as $affiliation)
                    <li>{{ $affiliation->name }}</li>
                @endforeach
            </ul>
        </li>
        <li class="list-group-item"><div><b>Categories:</b></div>
            <ul>
                @foreach($project->categories as $category)
                    <li>{{ $category->name }}</li>
                @endforeach
            </ul>
        </li>
        <li class="list-group-item"><div><b>Keywords:</b></div>
            <ul>
                @foreach($project->keywords as $keyword)
                    <li>{{ $keyword->name }}</li>
                @endforeach
            </ul>
        </li>
    </ul>
</div>
