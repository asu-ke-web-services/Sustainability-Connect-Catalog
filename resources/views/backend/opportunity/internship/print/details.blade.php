<h2>Details</h2>

    <div class="table-responsive">
        <table class="table table-hover">

            <tr>
                <th>{{ __('labels.backend.opportunity.internships.tabs.content.details.qualifications') }}</th>
                <td>@markdown($internship->qualifications ?? '')</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.opportunity.internships.tabs.content.details.responsibilities') }}</th>
                <td>@markdown($internship->responsibilities ?? '')</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.opportunity.internships.tabs.content.details.compensation') }}</th>
                <td>@markdown($internship->compensation ?? '')</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.opportunity.internships.tabs.content.details.degree_program') }}</th>
                <td>@markdown($internship->degree_program ?? '')</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.opportunity.internships.tabs.content.details.application_instructions') }}</th>
                <td>@markdown($internship->application_instructions ?? '')</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.opportunity.internships.tabs.content.details.success_story') }}</th>
                <td>@unless (empty($internship->success_story))<a href="{!! $internship->success_story !!}">{!! $internship->success_story !!}</a>@endunless</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.opportunity.internships.tabs.content.details.library_collection') }}</th>
                <td>@unless (empty($internship->library_collection))<a href="{!! $internship->library_collection !!}">{!! $internship->library_collection !!}</a>@endunless</td>
            </tr>
{{--
            <tr>
                <th>{{ __('labels.backend.opportunity.internships.tabs.content.details.parent_opportunity') }}</th>
                <td>{!! $internship->parentOpportunity->name ?? null !!}</td>
            </tr>
 --}}
        </table>
    </div>
