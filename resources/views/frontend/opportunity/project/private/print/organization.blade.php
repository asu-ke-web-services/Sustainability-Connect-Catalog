<h2>Organization</h2>

    <div class="table-responsive">
        <table class="table table-hover">

            <tr>
                <th>{{ __('labels.backend.opportunity.projects.tabs.content.organization.name') }}</th>
                <td>{{ $project->organization->name ?? '' }}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.opportunity.projects.tabs.content.organization.url') }}</th>
                <td>{{ $project->organization->url ?? '' }}</td>
            </tr>

        </table>
    </div>
