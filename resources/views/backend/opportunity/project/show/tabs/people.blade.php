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
                <th>{{ __('labels.backend.opportunity.projects.tabs.content.people.participants') }}</th>
                <td>
                    <ul>
                        @foreach($project->participants as $participant)
                            <li><span style="width: 150px; margin-right: 10px;">{!! $participant->full_name !!}</span>{!! $project->user_action_buttons !!}</li>
                        @endforeach
                    </ul>
                </td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.opportunity.projects.tabs.content.people.mentors') }}</th>
                <td>
                    <ul>
                        @foreach($project->mentors as $mentor)
                            <li><span style="width: 150px; margin-right: 10px;">{!! $mentor->full_name !!}</span>{!! $project->user_action_buttons !!}</li>
                        @endforeach
                    </ul>
                </td>
            </tr>{!! $project->organization->name !!}

            <tr>
                <th>{{ __('labels.backend.opportunity.projects.tabs.content.people.followers') }}</th>
                <td>
                    <ul>
                        @foreach($project->followers as $follower)
                            <li><span style="width: 150px; margin-right: 10px;">{!! $follower->full_name !!}</span>{!! $project->user_action_buttons !!}</li>
                        @endforeach
                    </ul>
                </td>
            </tr>

        </table>
    </div>
</div><!--table-responsive-->
