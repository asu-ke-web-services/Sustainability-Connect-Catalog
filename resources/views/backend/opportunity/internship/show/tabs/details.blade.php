<div class="col">
    <div class="table-responsive">
        <table class="table table-hover">

            <tr>
                <th>{{ __('labels.backend.opportunity.internships.tabs.content.details.implementation_paths') }}</th>
                <td>{!! $internship->opportunityable->implementation_paths ?? null !!}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.opportunity.internships.tabs.content.details.sustainability_contribution') }}</th>
                <td>{!! $internship->opportunityable->sustainability_contribution ?? null !!}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.opportunity.internships.tabs.content.details.qualifications') }}</th>
                <td>{!! $internship->opportunityable->qualifications ?? null !!}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.opportunity.internships.tabs.content.details.responsibilities') }}</th>
                <td>{!! $internship->opportunityable->responsibilities ?? null !!}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.opportunity.internships.tabs.content.details.learning_outcomes') }}</th>
                <td>{!! $internship->opportunityable->learning_outcomes ?? null !!}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.opportunity.internships.tabs.content.details.compensation') }}</th>
                <td>{!! $internship->opportunityable->compensation ?? null !!}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.opportunity.internships.tabs.content.details.budget_type') }}</th>
                <td>{!! $internship->opportunityable->budgetType->name ?? null !!}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.opportunity.internships.tabs.content.details.budget_amount') }}</th>
                <td>{!! $internship->opportunityable->budget_amount ?? null !!}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.opportunity.internships.tabs.content.details.application_instructions') }}</th>
                <td>{!! $internship->opportunityable->application_instructions ?? null !!}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.opportunity.internships.tabs.content.details.success_story') }}</th>
                <td>{!! $internship->opportunityable->success_story ?? null !!}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.opportunity.internships.tabs.content.details.library_collection') }}</th>
                <td>{!! $internship->opportunityable->library_collection ?? null !!}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.opportunity.internships.tabs.content.details.parent_opportunity') }}</th>
                <td>{!! $internship->parentOpportunity->name ?? null !!}</td>
            </tr>

        </table>
    </div>
</div><!--table-responsive-->
