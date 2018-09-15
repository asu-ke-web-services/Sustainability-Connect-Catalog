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
                        <td class="col col-sm-9 view-content">{!! $project->status->name !!}</td>
                    </tr>

                    <!-- Description -->
                    <tr>
                        <td class="col col-sm-3 view-label">Project Description</td>
                        <td class="col col-sm-9 view-content">{!! $project->description !!}</td>
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
                            <td class="col col-sm-9 view-content"><span class="badge badge-success">{!! $category->name !!}</span></td>
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
                            <td class="col col-sm-9 view-content"><span class="badge badge-success">{!! $keyword->name !!}</span></td>
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
                        <td class="col col-sm-9 view-content">{!! $project->start_date !!}</td>
                    </tr>
                    <!-- Project Ends -->
                    <tr>
                        <td class="col col-sm-3 view-label">Project Ends</td>
                        <td class="col col-sm-9 view-content">{!! $project->end_date !!}</td>
                    </tr>
                        </tbody>
            </table>
        </div>

        <h3>Application Process</h3>
        <div class="table-responsive">
            <table class="table table-striped">
                <tbody>
                    <!-- Application Deadline -->
                    <tr>
                        <td class="col col-sm-3 view-label">Application Deadline</td>
                        <td class="col col-sm-9 view-content">{!! $project->application_deadline !!}</td>
                    </tr>
                            <!-- Application Instructions -->
                    <tr>
                        <td class="col col-sm-3 view-label">Application Instructions</td>
                        <td class="col col-sm-9 view-content">{!! $project->opportunityable->application_instructions !!}</td>
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
                            <td class="col col-sm-9 view-content">{!! $address->city . ', ' . $address->state !!}</td>
                        </tr>
                    @endforeach

                    <!-- Project Deliverables -->
                    <tr>
                        <td class="col col-sm-3 view-label">Sustainability Contribution</td>
                        <td class="col col-sm-9 view-content">{!! $project->opportunityable->sustainability_contribution !!}</td>
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
                        <td class="col col-sm-9 view-content">{!! $project->opportunityable->qualifications !!}</td>
                    </tr>
                    <!-- Student Responsibilities -->
                    <tr>
                        <td class="col col-sm-3 view-label">Student Responsibilities</td>
                        <td class="col col-sm-9 view-content">{!! $project->opportunityable->responsibilities !!}</td>
                    </tr>
                    <!-- Student Learning Ourtcomes -->
                    <tr>
                        <td class="col col-sm-3 view-label">Student Learning Outcomes</td>
                        <td class="col col-sm-9 view-content">{!! $project->opportunityable->learning_outcomes !!}</td>
                    </tr>
                </tbody>
            </table>
        </div>
