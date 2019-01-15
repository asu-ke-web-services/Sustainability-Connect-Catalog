<div class="col">
    <div class="table-responsive">
        <table class="table table-hover">

            <tr>
                <th>{{ __('labels.backend.opportunity.internships.tabs.content.organization.name') }}</th>
                <td>{{ $internship->organization->name ?? '' }}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.opportunity.internships.tabs.content.organization.url') }}</th>
                <td>{{ $internship->organization->url ?? '' }}</td>
            </tr>

        </table>
    </div>
</div><!--table-responsive-->
