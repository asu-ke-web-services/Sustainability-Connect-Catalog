<div class="col">
    <div class="table-responsive">
        <table class="table table-hover">

            <tr>
                <th>{{ __('labels.backend.opportunity.internships.tabs.content.people.supervisor_user') }}</th>
                <td>{!! $internship->supervisorUser->name !!}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.opportunity.internships.tabs.content.people.submitting_user') }}</th>
                <td>{!! $internship->submittingUser->name !!}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.opportunity.internships.tabs.content.people.program_lead') }}</th>
                <td>{!! $internship->opportunityable->program_lead !!}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.opportunity.internships.tabs.content.people.organization') }}</th>
                <td>{!! $internship->organization->name !!}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.opportunity.internships.tabs.content.people.members') }}</th>
                <td></td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.opportunity.internships.tabs.content.people.followers') }}</th>
                <td></td>
            </tr>

        </table>
    </div>
</div><!--table-responsive-->
