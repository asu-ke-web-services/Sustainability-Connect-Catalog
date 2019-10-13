<h2>Details</h2>

    <div class="table-responsive">
        <table class="table table-hover">

            <tr>
                <th>@lang('labels.backend.opportunity.internships.tabs.content.details.implementation_paths')</th>
                <td>@markdown($internship->implementation_paths)</td>
            </tr>

            <tr>
                <th>@lang('labels.backend.opportunity.internships.tabs.content.details.sustainability_contribution')</th>
                <td>@markdown($internship->sustainability_contribution)</td>
            </tr>

            <tr>
                <th>@lang('labels.backend.opportunity.internships.tabs.content.details.qualifications')</th>
                <td>@markdown($internship->qualifications)</td>
            </tr>

            <tr>
                <th>@lang('labels.backend.opportunity.internships.tabs.content.details.responsibilities')</th>
                <td>@markdown($internship->responsibilities)</td>
            </tr>

            <tr>
                <th>@lang('labels.backend.opportunity.internships.tabs.content.details.learning_outcomes')</th>
                <td>@markdown($internship->learning_outcomes)</td>
            </tr>

            <tr>
                <th>@lang('labels.backend.opportunity.internships.tabs.content.details.compensation')</th>
                <td>@markdown($internship->compensation)</td>
            </tr>

            <tr>
                <th>@lang('labels.backend.opportunity.internships.tabs.content.details.budget_type')</th>
                <td>{{ $internship->budgetType->name ?? '' }}</td>
            </tr>

            <tr>
                <th>@lang('labels.backend.opportunity.internships.tabs.content.details.budget_amount')</th>
                <td>{{ $internship->budget_amount }}</td>
            </tr>

            <tr>
                <th>@lang('labels.backend.opportunity.internships.tabs.content.details.application_instructions')</th>
                <td>@markdown($internship->application_instructions)</td>
            </tr>

            <tr>
                <th>@lang('labels.backend.opportunity.internships.tabs.content.details.success_story')</th>
                <td>@unless (empty($internship->success_story))<a href="{!! $internship->success_story !!}">{!! $internship->success_story !!}</a>@endunless</td>
            </tr>

            <tr>
                <th>@lang('labels.backend.opportunity.internships.tabs.content.details.library_collection')</th>
                <td>@unless (empty($internship->library_collection))<a href="{!! $internship->library_collection !!}">{!! $internship->library_collection !!}</a>@endunless</td>
            </tr>
{{--
            <tr>
                <th>@lang('labels.backend.opportunity.internships.tabs.content.details.parent_opportunity')</th>
                <td>{{ $internship->parentOpportunity->name ?? '' }}</td>
            </tr>
--}}
        </table>
    </div>
