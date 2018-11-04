<div class="col">
    <div class="table-responsive">
        <table class="table table-hover">

            <tr>
                <th>{{ __('labels.backend.opportunity.projects.tabs.content.people.supervisor_user') }}</th>
                <td>{!! $project->supervisorUser->name !!}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.opportunity.projects.tabs.content.people.submitting_user') }}</th>
                <td>{!! $project->submittingUser->name !!}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.opportunity.projects.tabs.content.people.program_lead') }}</th>
                <td>{!! $project->program_lead !!}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.opportunity.projects.tabs.content.people.organization') }}</th>
                <td>{!! $project->organization->name !!}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.opportunity.projects.tabs.content.people.members') }}</th>
                <td></td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.opportunity.projects.tabs.content.people.followers') }}</th>
                <td></td>
            </tr>

        </table>
    </div>
</div><!--table-responsive-->
