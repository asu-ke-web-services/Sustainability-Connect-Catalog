
        <!-- Project Name -->
        <h1>{{ $project->name }}</h1>

        <div class="table-responsive">
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <td>&nbsp;</td>
                        <td>
                        <!-- Affiliations -->
                        @foreach($project->affiliations as $affiliation)
                            <span
                                @unless(empty($affiliation->fa_icon))
                                    class="fa-stack"
                                @endunless
                                @unless(empty($affiliation->help_text))
                                    data-toggle="tooltip"
                                    data-container="body"
                                    title=""
                                    data-original-title="{{ $affiliation->help_text }}"
                                @endunless
                            >
                                @unless(empty($affiliation->fa_icon))
                                    {!! $affiliation->fa_icon !!}
                                @else
                                    <span class="badge badge-success">{{ ucwords($affiliation->name) }}</span>
                                @endunless
                            </span>
                        @endforeach
                        </td>
                    </tr>

                    <!-- Project Status -->
                    <tr>
                        <td class="col col-sm-3 view-label">Status</td>
                        <td class="col col-sm-9 view-content">{{ $project->status->name }}</td>
                    </tr>

                    <!-- Description -->
                    <tr>
                        <td class="col col-sm-3 view-label">Project Description</td>
                        <td class="col col-sm-9 view-content">@markdown($project->description ?? null)</td>
                    </tr>

                </tbody>
            </table>
        </div>

        <h3>Categories</h3>
        <div class="table-responsive">
            <table class="table table-striped">
                <tbody>
                    <!-- Categories -->
                    @foreach($project->categories as $category)
                        <tr>
                            <td class="col col-sm-9 view-content"><span class="badge badge-success">{{ $category->name }}</span></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <h3>Keywords</h3>
        <div class="table-responsive">
            <table class="table table-striped">
                <tbody>
                    <!-- Categories -->
                    @foreach($project->keywords as $keyword)
                        <tr>
                            <td class="col col-sm-9 view-content"><span class="badge badge-success">{{ $keyword->name }}</span></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <h3>Availability</h3>
        <div class="table-responsive">
            <table class="table table-striped">
                <tbody>
                    <!-- Project Starts -->
                    <tr>
                        <td class="col col-sm-3 view-label">Project Starts</td>
                        <td class="col col-sm-9 view-content">{{ $project->opportunity_start_at !== null ? $project->opportunity_start_at->toFormattedDateString() : '' }}</td>
                    </tr>
                    <!-- Project Ends -->
                    <tr>
                        <td class="col col-sm-3 view-label">Project Ends</td>
                        <td class="col col-sm-9 view-content">{{ $project->opportunity_end_at !== null ? $project->opportunity_end_at->toFormattedDateString() : '' }}</td>
                    </tr>
                        </tbody>
            </table>
        </div>

        @if(isset($project->organization))
        <h3>Sponsor Organization</h3>
        <div class="table-responsive">
            <table class="table table-striped">
                <tbody>
                    <!-- Organization Name -->
                    <tr>
                        <td class="col col-sm-3 view-label">Organization</td>
                        <td class="col col-sm-9 view-content">{{ $project->organization->name ?? null }}</td>
                    </tr>

                    @if(!empty($project->organization->url))
                    <!-- Organization URL -->
                    <tr>
                        <td class="col col-sm-3 view-label">Web Address</td>
                        <td class="col col-sm-9 view-content"><a href="{{ $project->organization->url ?? null }}">{{ $project->organization->url ?? null }}</a></td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
        @endif

        <h3>Application Process</h3>
        <div class="table-responsive">
            <table class="table table-striped">
                <tbody>
                    <!-- Application Deadline -->
                    <tr>
                        <td class="col col-sm-3 view-label">Application Deadline</td>
                        <td class="col col-sm-9 view-content">{{
                             $project->application_deadline_text > ''
                                ? $project->application_deadline_text
                                : (null !== $project->application_deadline_at ? $project->application_deadline_at->toFormattedDateString() : '')
                        }}</td>
                    </tr>
                            <!-- Application Instructions -->
                    <tr>
                        <td class="col col-sm-3 view-label">Application Instructions</td>
                        <td class="col col-sm-9 view-content">@markdown($project->application_instructions ?? null)</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <h3>Implementation</h3>
        <div class="table-responsive">
            <table class="table table-striped">
                <tbody>
                    <!-- Location -->
                    @foreach($project->addresses as $address)
                        <tr>
                            <td class="col col-sm-3 view-label">City, State</td>
                            <td class="col col-sm-9 view-content">{{ $address->city . ', ' . $address->state }}</td>
                        </tr>
                    @endforeach

                    <!-- Project Deliverables -->
                    <tr>
                        <td class="col col-sm-3 view-label">Sustainability Contribution</td>
                        <td class="col col-sm-9 view-content">@markdown($project->sustainability_contribution ?? null)</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <h3>Student Expectations</h3>
        <div class="table-responsive">
            <table class="table table-striped">
                <tbody>
                    <!-- Qualifications -->
                    <tr>
                        <td class="col col-sm-3 view-label">Minimum and Desired Qualifications</td>
                        <td class="col col-sm-9 view-content">@markdown($project->qualifications ?? null)</td>
                    </tr>
                    <!-- Student Responsibilities -->
                    <tr>
                        <td class="col col-sm-3 view-label">Student Responsibilities</td>
                        <td class="col col-sm-9 view-content">@markdown($project->responsibilities ?? null)</td>
                    </tr>
                    <!-- Student Learning Ourtcomes -->
                    <tr>
                        <td class="col col-sm-3 view-label">Student Learning Outcomes</td>
                        <td class="col col-sm-9 view-content">@markdown($project->learning_outcomes ?? null)</td>
                    </tr>
                </tbody>
            </table>
        </div>
