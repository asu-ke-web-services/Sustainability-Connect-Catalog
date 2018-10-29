<div class="col">
    <div class="table-responsive">
        <table class="table table-hover">
            <tr>
                <th>{{ __('labels.backend.opportunity.internships.tabs.content.overview.name') }}</th>
                <td>{!! ucwords($internship->name) !!}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.opportunity.internships.tabs.content.overview.public_name') }}</th>
                <td>{!! $internship->public_name !!}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.opportunity.internships.tabs.content.overview.description') }}</th>
                <td>{!! $internship->description !!}</td>
            </tr>

            <tr>
                <th>{{ __('Needs Review') }}</th>
                <td>{{ $internship->opportunityable->needs_review === 1 ? true : false }}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.opportunity.internships.tabs.content.overview.status') }}</th>
                <td>{!! ucwords($internship->status->name ?? '') !!}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.opportunity.internships.tabs.content.overview.review_status') }}</th>
                <td>{!! ucwords($internship->opportunityable->reviewStatus->name ?? '') !!}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.opportunity.internships.tabs.content.overview.start_date') }}</th>
                <td>{{ isset($internship->start_date) ? $internship->start_date->toFormattedDateString() : '' }} {{ isset($internship->start_date) ? '(' . $internship->start_date->diffForHumans() . ')' : '' }}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.opportunity.internships.tabs.content.overview.end_date') }}</th>
                <td>{{ isset($internship->end_date) ? $internship->end_date->toFormattedDateString() : '' }} {{ isset($internship->end_date) ? '(' . $internship->end_date->diffForHumans() . ')' : '' }}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.opportunity.internships.tabs.content.overview.listing_starts') }}</th>
                <td>{{ isset($internship->listing_starts) ? $internship->listing_starts->toFormattedDateString() : '' }} {{ isset($internship->listing_starts) ? '(' . $internship->listing_starts->diffForHumans() . ')' : '' }}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.opportunity.internships.tabs.content.overview.listing_ends') }}</th>
                <td>{{ isset($internship->listing_ends) ? $internship->listing_ends->toFormattedDateString() : '' }} {{ isset($internship->listing_ends) ? '(' . $internship->listing_ends->diffForHumans() . ')' : '' }}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.opportunity.internships.tabs.content.overview.application_deadline') }}</th>
                <td>{{ isset($internship->application_deadline) ? $internship->application_deadline->toFormattedDateString() : '' }} {{ isset($internship->application_deadline) ? '(' . $internship->application_deadline->diffForHumans() . ')' : '' }}</td>
            </tr>


            <tr>
                <th>{{ __('labels.backend.opportunity.internships.tabs.content.overview.affiliations') }}</th>
                <td>
                    <ul>
                        @foreach($internship->affiliations as $affiliation)
                            <li>{!! $affiliation->name !!}</li>
                        @endforeach
                    </ul>
                </td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.opportunity.internships.tabs.content.overview.categories') }}</th>
                <td>
                    <ul>
                        @foreach($internship->categories as $category)
                            <li>{!! $category->name !!}</li>
                        @endforeach
                    </ul>
                </td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.opportunity.internships.tabs.content.overview.keywords') }}</th>
                <td>
                    <ul>
                        @foreach($internship->keywords as $keyword)
                            <li>{!! $keyword->name !!}</li>
                        @endforeach
                    </ul>
                </td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.opportunity.internships.tabs.content.overview.location') }}</th>
                <td>
                    <ul>
                        @foreach($internship->addresses as $address)
                            <li>{!! $address->city . ', ' . $address->state !!}</li>
                        @endforeach
                    </ul>
                </td>
            </tr>

        </table>
    </div>
</div><!--table-responsive-->
