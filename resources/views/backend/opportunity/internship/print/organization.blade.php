<h2>Organization</h2>

    <div class="table-responsive">
        <table class="table table-hover">

            <tr>
                <th>@lang('labels.backend.opportunity.internships.tabs.content.organization.name')</th>
                <td>{{ $internship->organization->name ?? '' }}</td>
            </tr>

            <tr>
                <th>@lang('labels.backend.opportunity.internships.tabs.content.organization.url')</th>
                <td>{{ $internship->organization->url ?? '' }}</td>
            </tr>

        </table>
    </div>
