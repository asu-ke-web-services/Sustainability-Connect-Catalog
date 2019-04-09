<div class="col">
    <ul class="list-group">
        <li class="list-group-item"><div><b>Description:</b></div> @markdown($internship->description)</li>
        <li class="list-group-item"><span style="float: left; width: 200px;"><b>Organization:</b></span> {{ $internship->organization->name ?? '' }}</li>
        <li class="list-group-item"><span style="float: left; width: 200px;"><b>Organization Website:</b></span> {{ $internship->organization->url ?? '' }}</li>
        <li class="list-group-item"><div><b>Location:</b></div>
            <ul>
                @foreach($internship->addresses as $address)
                    <li>{{ $address->city . ', ' . $address->state }}</li>
                @endforeach
            </ul>
        </li>
        <li class="list-group-item"><div><b>Envisioned Solution:</b></div> @markdown($internship->implementation_paths)</li>
        <li class="list-group-item"><div><b>Sustainability Contribution:</b></div> @markdown($internship->sustainability_contribution)</li>
        <li class="list-group-item"><div><b>Qualifications:</b></div> @markdown($internship->qualifications)</li>
        <li class="list-group-item"><div><b>Responsibilities:</b></div> @markdown($internship->responsibilities)</li>
        <li class="list-group-item"><div><b>Learning Outcomes:</b></div> @markdown($internship->learning_outcomes)</li>
        <li class="list-group-item"><div><b>Compensation:</b></div> @markdown($internship->compensation)</li>
        <li class="list-group-item"><span style="float: left; width: 200px;"><b>Budget Type:</b></span> {{ $internship->budgetType->name ?? '' }}</li>
        <li class="list-group-item"><span style="float: left; width: 200px;"><b>Budget Amount:</b></span> {{ $internship->budget_amount }}</li>
        <li class="list-group-item"><div><b>Application Instructions:</b></div> @markdown($internship->application_instructions)</li>
        <li class="list-group-item"><span style="float: left; width: 200px;"><b>Success Story:</b></span> @unless (empty($internship->success_story))<a href="{!! $internship->success_story !!}">{!! $internship->success_story !!}</a>@endunless</li>
        <li class="list-group-item"><span style="float: left; width: 200px;"><b>Library Collection:</b></span> @unless (empty($internship->library_collection))<a href="{!! $internship->library_collection !!}">{!! $internship->library_collection !!}</a>@endunless</li>
    </ul>
</div>
