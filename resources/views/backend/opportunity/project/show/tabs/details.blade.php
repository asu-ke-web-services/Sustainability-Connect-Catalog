<div class="col">
    <ul class="list-group">
        <li class="list-group-item"><div><b>Description:</b></div> @markdown($project->description)</li>
        <li class="list-group-item"><span style="float: left; width: 200px;"><b>Organization:</b></span> {{ $project->organization->name ?? '' }}</li>
        <li class="list-group-item"><span style="float: left; width: 200px;"><b>Organization Website:</b></span> {{ $project->organization->url ?? '' }}</li>
        <li class="list-group-item"><div><b>Location:</b></div>
            <ul>
                @foreach($project->addresses as $address)
                    <li>{{ $address->city . ', ' . $address->state }}</li>
                @endforeach
            </ul>
        </li>
        <li class="list-group-item"><div><b>Envisioned Solution:</b></div> @markdown($project->implementation_paths)</li>
        <li class="list-group-item"><div><b>Sustainability Contribution:</b></div> @markdown($project->sustainability_contribution)</li>
        <li class="list-group-item"><div><b>Qualifications:</b></div> @markdown($project->qualifications)</li>
        <li class="list-group-item"><div><b>Responsibilities:</b></div> @markdown($project->responsibilities)</li>
        <li class="list-group-item"><div><b>Learning Outcomes:</b></div> @markdown($project->learning_outcomes)</li>
        <li class="list-group-item"><div><b>Compensation:</b></div> @markdown($project->compensation)</li>
        <li class="list-group-item"><span style="float: left; width: 200px;"><b>Budget Type:</b></span> {{ $project->budgetType->name ?? '' }}</li>
        <li class="list-group-item"><span style="float: left; width: 200px;"><b>Budget Amount:</b></span> {{ $project->budget_amount }}</li>
        <li class="list-group-item"><div><b>Application Instructions:</b></div> @markdown($project->application_instructions)</li>
        <li class="list-group-item"><span style="float: left; width: 200px;"><b>Success Story:</b></span> @unless (empty($project->success_story))<a href="{!! $project->success_story !!}">{!! $project->success_story !!}</a>@endunless</li>
        <li class="list-group-item"><span style="float: left; width: 200px;"><b>Library Collection:</b></span> @unless (empty($project->library_collection))<a href="{!! $project->library_collection !!}">{!! $project->library_collection !!}</a>@endunless</li>
    </ul>
</div>
