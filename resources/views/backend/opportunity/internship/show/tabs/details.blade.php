<div class="col">
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
                <th>{{ __('labels.backend.opportunity.internships.tabs.content.details.application_instructions') }}</th>
                <td>@markdown($internship->application_instructions ?? '')</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.opportunity.internships.tabs.content.details.success_story') }}</th>
                <td>{!! $internship->success_story ?? null !!}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.opportunity.internships.tabs.content.details.library_collection') }}</th>
                <td>{!! $internship->library_collection ?? null !!}</td>
            </tr>
{{--
            <tr>
                <th>{{ __('labels.backend.opportunity.internships.tabs.content.details.parent_opportunity') }}</th>
                <td>{!! $internship->parentOpportunity->name ?? null !!}</td>
            </tr>
 --}}
        </table>
    </div>
</div><!--table-responsive-->
