<div class="col">
    <div class="table-responsive">
        <table class="table table-hover">

            <tr>
                <th>{{ __('labels.backend.opportunity.projects.tabs.content.details.implementation_paths') }}</th>
                <td>@markdown($project->implementation_paths)</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.opportunity.projects.tabs.content.details.sustainability_contribution') }}</th>
                <td>@markdown($project->sustainability_contribution)</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.opportunity.projects.tabs.content.details.qualifications') }}</th>
                <td>@markdown($project->qualifications)</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.opportunity.projects.tabs.content.details.responsibilities') }}</th>
                <td>@markdown($project->responsibilities)</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.opportunity.projects.tabs.content.details.learning_outcomes') }}</th>
                <td>@markdown($project->learning_outcomes)</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.opportunity.projects.tabs.content.details.compensation') }}</th>
                <td>@markdown($project->compensation)</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.opportunity.projects.tabs.content.details.budget_type') }}</th>
                <td>{{ $project->budgetType->name ?? '' }}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.opportunity.projects.tabs.content.details.budget_amount') }}</th>
                <td>{{ $project->budget_amount }}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.opportunity.projects.tabs.content.details.application_instructions') }}</th>
                <td>@markdown($project->application_instructions)</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.opportunity.projects.tabs.content.details.success_story') }}</th>
                <td>{{ $project->success_story }}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.opportunity.projects.tabs.content.details.library_collection') }}</th>
                <td>{{ $project->library_collection }}</td>
            </tr>
{{--
            <tr>
                <th>{{ __('labels.backend.opportunity.projects.tabs.content.details.parent_opportunity') }}</th>
                <td>{{ $project->parentOpportunity->name ?? '' }}</td>
            </tr>
--}}
        </table>
    </div>
</div><!--table-responsive-->
