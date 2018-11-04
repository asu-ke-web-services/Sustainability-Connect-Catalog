<div class="col">
    <div class="table-responsive">
        <table class="table table-hover">

            <tr>
                <th>{{ __('labels.backend.opportunity.internships.tabs.content.details.implementation_paths') }}</th>
                <td>{!! $internship->implementation_paths ?? null !!}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.opportunity.internships.tabs.content.details.sustainability_contribution') }}</th>
                <td>{!! $internship->sustainability_contribution ?? null !!}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.opportunity.internships.tabs.content.details.qualifications') }}</th>
                <td>{!! $internship->qualifications ?? null !!}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.opportunity.internships.tabs.content.details.responsibilities') }}</th>
                <td>{!! $internship->responsibilities ?? null !!}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.opportunity.internships.tabs.content.details.learning_outcomes') }}</th>
                <td>{!! $internship->learning_outcomes ?? null !!}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.opportunity.internships.tabs.content.details.compensation') }}</th>
                <td>{!! $internship->compensation ?? null !!}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.opportunity.internships.tabs.content.details.budget_type') }}</th>
                <td>{!! $internship->budgetType->name ?? null !!}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.opportunity.internships.tabs.content.details.budget_amount') }}</th>
                <td>{!! $internship->budget_amount ?? null !!}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.opportunity.internships.tabs.content.details.application_instructions') }}</th>
                <td>{!! $internship->application_instructions ?? null !!}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.opportunity.internships.tabs.content.details.success_story') }}</th>
                <td>{!! $internship->success_story ?? null !!}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.opportunity.internships.tabs.content.details.library_collection') }}</th>
                <td>{!! $internship->library_collection ?? null !!}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.opportunity.internships.tabs.content.details.parent_opportunity') }}</th>
                <td>{!! $internship->parentOpportunity->name ?? null !!}</td>
            </tr>

        </table>
    </div>
</div><!--table-responsive-->
