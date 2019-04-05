<div class="col">
    <ul class="list-group">
        <li class="list-group-item"><span style="float: left; width: 200px;"><b>Status:</b></span> {{ ucwords($internship->status->name ?? '') }}</li>
        <li class="list-group-item"><span style="float: left; width: 200px;"><b>Internship Starts:</b></span> {{ isset($internship->opportunity_start_at) ? $internship->opportunity_start_at->toFormattedDateString() : '' }} {{ isset($internship->opportunity_start_at) ? '(' . $internship->opportunity_start_at->diffForHumans() . ')' : '' }}</li>
        <li class="list-group-item"><span style="float: left; width: 200px;"><b>Internship Ends:</b></span> {{ isset($internship->opportunity_end_at) ? $internship->opportunity_end_at->toFormattedDateString() : '' }} {{ isset($internship->opportunity_end_at) ? '(' . $internship->opportunity_end_at->diffForHumans() . ')' : '' }}</li>
        <li class="list-group-item"><span style="float: left; width: 200px;"><b>Listing Starts:</b></span> {{ isset($internship->listing_start_at) ? $internship->listing_start_at->toFormattedDateString() : '' }} {{ isset($internship->listing_start_at) ? '(' . $internship->listing_start_at->diffForHumans() . ')' : '' }}</li>
        <li class="list-group-item"><span style="float: left; width: 200px;"><b>Listing Ends:</b></span> {{ isset($internship->listing_end_at) ? $internship->listing_end_at->toFormattedDateString() : '' }} {{ isset($internship->listing_end_at) ? '(' . $internship->listing_end_at->diffForHumans() . ')' : '' }}</li>
        <li class="list-group-item"><span style="float: left; width: 200px;"><b>Application Deadline:</b></span> {{
            $internship->application_deadline_text > ''
                ? $internship->application_deadline_text
                : (null !== $internship->application_deadline_at ? $internship->application_deadline_at->toFormattedDateString() : '') }}</li>
        <li class="list-group-item"><div><b>Affiliations:</b></div>
            <ul>
                @foreach($internship->affiliations as $affiliation)
                    <li>{{ $affiliation->name }}</li>
                @endforeach
            </ul>
        </li>
        <li class="list-group-item"><div><b>Categories:</b></div>
            <ul>
                @foreach($internship->categories as $category)
                    <li>{{ $category->name }}</li>
                @endforeach
            </ul>
        </li>
        <li class="list-group-item"><div><b>Keywords:</b></div>
            <ul>
                @foreach($internship->keywords as $keyword)
                    <li>{{ $keyword->name }}</li>
                @endforeach
            </ul>
        </li>
    </ul>
</div>
