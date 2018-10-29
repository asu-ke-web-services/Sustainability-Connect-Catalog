<div class="col">
    <div class="table-responsive">
        <table class="table table-hover">
            <tr>
                <th>{{ __('labels.backend.opportunity.projects.tabs.content.overview.name') }}</th>
                <td>{!! ucwords($project->name) !!}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.opportunity.projects.tabs.content.overview.public_name') }}</th>
                <td>{!! $project->public_name !!}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.opportunity.projects.tabs.content.overview.description') }}</th>
                <td>{!! $project->description !!}</td>
            </tr>

            <tr>
                <th>{{ __('Needs Review') }}</th>
                <td>{!! $project->opportunityable->needs_review === 1 ? true : false) !!}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.opportunity.projects.tabs.content.overview.status') }}</th>
                <td>{!! ucwords($project->status->name ?? '') !!}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.opportunity.projects.tabs.content.overview.review_status') }}</th>
                <td>{!! ucwords($project->opportunityable->reviewStatus->name ?? '') !!}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.opportunity.projects.tabs.content.overview.start_date') }}</th>
                <td>{{ isset($project->start_date) ? $project->start_date->toFormattedDateString() : '' }} {{ isset($project->start_date) ? '(' . $project->start_date->diffForHumans() . ')' : '' }}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.opportunity.projects.tabs.content.overview.end_date') }}</th>
                <td>{{ isset($project->end_date) ? $project->end_date->toFormattedDateString() : '' }} {{ isset($project->end_date) ? '(' . $project->end_date->diffForHumans() . ')' : '' }}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.opportunity.projects.tabs.content.overview.listing_starts') }}</th>
                <td>{{ isset($project->listing_starts) ? $project->listing_starts->toFormattedDateString() : '' }} {{ isset($project->listing_starts) ? '(' . $project->listing_starts->diffForHumans() . ')' : '' }}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.opportunity.projects.tabs.content.overview.listing_ends') }}</th>
                <td>{{ isset($project->listing_ends) ? $project->listing_ends->toFormattedDateString() : '' }} {{ isset($project->listing_ends) ? '(' . $project->listing_ends->diffForHumans() . ')' : '' }}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.opportunity.projects.tabs.content.overview.application_deadline') }}</th>
                <td>{{ isset($project->application_deadline) ? $project->application_deadline->toFormattedDateString() : '' }} {{ isset($project->application_deadline) ? '(' . $project->application_deadline->diffForHumans() . ')' : '' }}</td>
            </tr>


            <tr>
                <th>{{ __('labels.backend.opportunity.projects.tabs.content.overview.affiliations') }}</th>
                <td>
                    <ul>
                        @foreach($project->affiliations as $affiliation)
                            <li>{!! $affiliation->name !!}</li>
                        @endforeach
                    </ul>
                </td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.opportunity.projects.tabs.content.overview.categories') }}</th>
                <td>
                    <ul>
                        @foreach($project->categories as $category)
                            <li>{!! $category->name !!}</li>
                        @endforeach
                    </ul>
                </td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.opportunity.projects.tabs.content.overview.keywords') }}</th>
                <td>
                    <ul>
                        @foreach($project->keywords as $keyword)
                            <li>{!! $keyword->name !!}</li>
                        @endforeach
                    </ul>
                </td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.opportunity.projects.tabs.content.overview.location') }}</th>
                <td>
                    <ul>
                        @foreach($project->addresses as $address)
                            <li>{!! $address->city . ', ' . $address->state !!}</li>
                        @endforeach
                    </ul>
                </td>
            </tr>

        </table>
    </div>
</div><!--table-responsive-->
