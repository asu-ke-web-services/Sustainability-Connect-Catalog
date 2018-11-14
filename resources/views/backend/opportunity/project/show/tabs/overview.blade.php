<div class="col">
    <div class="table-responsive">
        <table class="table table-hover">
            <tr>
                <th>{{ __('labels.backend.opportunity.projects.tabs.content.overview.name') }}</th>
                <td>{!! ucwords($project->name) !!}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.opportunity.projects.tabs.content.overview.description') }}</th>
                <td>@markdown($project->description ?? null)</td>
            </tr>

            <tr>
                <th>{{ __('Needs Review') }}</th>
                <td>{{ $project->needs_review === 1 ? true : false }}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.opportunity.projects.tabs.content.overview.status') }}</th>
                <td>{!! ucwords($project->status->name ?? '') !!}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.opportunity.projects.tabs.content.overview.review_status') }}</th>
                <td>{!! ucwords($project->reviewStatus->name ?? '') !!}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.opportunity.projects.tabs.content.overview.opportunity_start_at') }}</th>
                <td>{{ isset($project->opportunity_start_at) ? $project->opportunity_start_at->toFormattedDateString() : '' }} {{ isset($project->opportunity_start_at) ? '(' . $project->opportunity_start_at->diffForHumans() . ')' : '' }}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.opportunity.projects.tabs.content.overview.opportunity_end_at') }}</th>
                <td>{{ isset($project->opportunity_end_at) ? $project->opportunity_end_at->toFormattedDateString() : '' }} {{ isset($project->opportunity_end_at) ? '(' . $project->opportunity_end_at->diffForHumans() . ')' : '' }}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.opportunity.projects.tabs.content.overview.listing_start_at') }}</th>
                <td>{{ isset($project->listing_start_at) ? $project->listing_start_at->toFormattedDateString() : '' }} {{ isset($project->listing_start_at) ? '(' . $project->listing_start_at->diffForHumans() . ')' : '' }}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.opportunity.projects.tabs.content.overview.listing_end_at') }}</th>
                <td>{{ isset($project->listing_end_at) ? $project->listing_end_at->toFormattedDateString() : '' }} {{ isset($project->listing_end_at) ? '(' . $project->listing_end_at->diffForHumans() . ')' : '' }}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.opportunity.projects.tabs.content.overview.application_deadline_at') }}</th>
                <td>{{ isset($project->application_deadline_at) ? $project->application_deadline_at->toFormattedDateString() : '' }} {{ isset($project->application_deadline_at) ? '(' . $project->application_deadline_at->diffForHumans() . ')' : '' }}</td>
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
