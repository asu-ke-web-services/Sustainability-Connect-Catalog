<div class="col">
    <div class="table-responsive">
        <table class="table table-hover">
            <tr>
                <th>{{ __('labels.backend.opportunity.internships.tabs.content.overview.name') }}</th>
                <td>{{ ucwords($internship->name) }}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.opportunity.internships.tabs.content.overview.description') }}</th>
                <td>@markdown($internship->description ?? null)</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.opportunity.internships.tabs.content.overview.status') }}</th>
                <td>{{ ucwords($internship->status->name ?? '') }}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.opportunity.internships.tabs.content.overview.opportunity_start_at') }}</th>
                <td>{{ isset($internship->opportunity_start_at) ? $internship->opportunity_start_at->toFormattedDateString() : '' }} {{ isset($internship->opportunity_start_at) ? '(' . $internship->opportunity_start_at->diffForHumans() . ')' : '' }}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.opportunity.internships.tabs.content.overview.opportunity_end_at') }}</th>
                <td>{{ isset($internship->opportunity_end_at) ? $internship->opportunity_end_at->toFormattedDateString() : '' }} {{ isset($internship->opportunity_end_at) ? '(' . $internship->opportunity_end_at->diffForHumans() . ')' : '' }}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.opportunity.internships.tabs.content.overview.listing_start_at') }}</th>
                <td>{{ isset($internship->listing_start_at) ? $internship->listing_start_at->toFormattedDateString() : '' }} {{ isset($internship->listing_start_at) ? '(' . $internship->listing_start_at->diffForHumans() . ')' : '' }}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.opportunity.internships.tabs.content.overview.listing_end_at') }}</th>
                <td>{{ isset($internship->listing_end_at) ? $internship->listing_end_at->toFormattedDateString() : '' }} {{ isset($internship->listing_end_at) ? '(' . $internship->listing_end_at->diffForHumans() . ')' : '' }}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.opportunity.internships.tabs.content.overview.application_deadline_at') }}</th>
                <td>{{
                     $internship->application_deadline_text > ''
                        ? $internship->application_deadline_text
                        : (null !== $internship->application_deadline_at ? $internship->application_deadline_at->toFormattedDateString() : '')
                }}</td>
            </tr>


            <tr>
                <th>{{ __('labels.backend.opportunity.internships.tabs.content.overview.affiliations') }}</th>
                <td>
                    <ul>
                        @foreach($internship->affiliations as $affiliation)
                            <li>{{ $affiliation->name }}</li>
                        @endforeach
                    </ul>
                </td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.opportunity.internships.tabs.content.overview.categories') }}</th>
                <td>
                    <ul>
                        @foreach($internship->categories as $category)
                            <li>{{ $category->name }}</li>
                        @endforeach
                    </ul>
                </td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.opportunity.internships.tabs.content.overview.keywords') }}</th>
                <td>
                    <ul>
                        @foreach($internship->keywords as $keyword)
                            <li>{{ $keyword->name }}</li>
                        @endforeach
                    </ul>
                </td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.opportunity.internships.tabs.content.overview.location') }}</th>
                <td>
                    <ul>
                        @foreach($internship->addresses as $address)
                            <li>{{ $address->city . ', ' . $address->state }}</li>
                        @endforeach
                    </ul>
                </td>
            </tr>

        </table>
    </div>
</div><!--table-responsive-->
