<div class="col">
    <div class="table-responsive">
        <table class="table table-hover">

            <tr>
                <th>{{ __('labels.backend.opportunity.projects.tabs.content.details.implementation_paths') }}</th>
                <td>{!! $project->implementation_paths ?? null !!}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.opportunity.projects.tabs.content.details.sustainability_contribution') }}</th>
                <td>{!! $project->sustainability_contribution ?? null !!}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.opportunity.projects.tabs.content.details.qualifications') }}</th>
                <td>{!! $project->qualifications ?? null !!}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.opportunity.projects.tabs.content.details.responsibilities') }}</th>
                <td>{!! $project->responsibilities ?? null !!}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.opportunity.projects.tabs.content.details.learning_outcomes') }}</th>
                <td>{!! $project->learning_outcomes ?? null !!}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.opportunity.projects.tabs.content.details.compensation') }}</th>
                <td>{!! $project->compensation ?? null !!}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.opportunity.projects.tabs.content.details.budget_type') }}</th>
                <td>{!! $project->budgetType->name ?? null !!}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.opportunity.projects.tabs.content.details.budget_amount') }}</th>
                <td>{!! $project->budget_amount ?? null !!}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.opportunity.projects.tabs.content.details.application_instructions') }}</th>
                <td>{!! $project->application_instructions ?? null !!}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.opportunity.projects.tabs.content.details.success_story') }}</th>
                <td>{!! $project->success_story ?? null !!}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.opportunity.projects.tabs.content.details.library_collection') }}</th>
                <td>{!! $project->library_collection ?? null !!}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.opportunity.projects.tabs.content.details.parent_opportunity') }}</th>
                <td>{!! $project->parentOpportunity->name ?? null !!}</td>
            </tr>

        </table>
    </div>
</div><!--table-responsive-->
