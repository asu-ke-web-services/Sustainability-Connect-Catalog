        <h2 style="margin-top:0">{!! $project->opportunity->title !!}</h2>
        <div class="table-responsive">
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <td>&nbsp;</td>
                        <td>
                            <span class="fa-stack" data-toggle="tooltip" data-container="body" title="" data-original-title="Restricted to students majoring in degrees from The School of Sustainability">
                                <i class="fa fa-square fa-green fa-stack-2x"></i>
                                <i class="fa fa-leaf fa-stack-1x"></i>
                            </span>
                            <span class="fa-stack" data-toggle="tooltip" data-container="body" title="" data-original-title="Can fulfill School of Sustainability Culminating Experience">
                                <i class="fa fa-square fa-gold fa-stack-2x"></i>
                                <i class="fa fa-graduation-cap fa-stack-1x"></i>
                            </span>
                            <span class="fa-stack" data-toggle="tooltip" data-container="body" title="" data-original-title="Available for Undergraduate Students">
                                <i class="fa fa-square fa-blue fa-stack-2x"></i>
                                <strong class="fa-stack-1x fa-inverse">U</strong>
                            </span>
                            <span class="fa-stack" data-toggle="tooltip" data-container="body" title="" data-original-title="Available for Graduate Students">
                                <i class="fa fa-square fa-blue-darkened fa-stack-2x"></i>
                                <strong class="fa-stack-1x fa-inverse">G</strong>
                            </span>
                        </td>
                    </tr>

                    <!-- Project Status -->
                    <tr>
                        <td class="col col-sm-3 view-label">Status</td>
                        <td class="col col-sm-9 view-content">{!! $project->opportunity->status->name !!}</td>
                    </tr>

                    <!-- Description -->
                    <tr>
                        <td class="col col-sm-3 view-label">Project Description</td>
                        <td class="col col-sm-9 view-content">{!! $project->opportunity->description !!}</td>
                    </tr>

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
                        <td class="col col-sm-9 view-content">{!! $project->opportunity->start_date !!}</td>
                    </tr>
                            <!-- Project Ends -->
                    <tr>
                        <td class="col col-sm-3 view-label">Project Ends</td>
                        <td class="col col-sm-9 view-content">{!! $project->opportunity->end_date !!}</td>
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
                        <td class="col col-sm-9 view-content">{!! $project->opportunity->application_deadline !!}</td>
                    </tr>
                            <!-- Application Instructions -->
                    <tr>
                        <td class="col col-sm-3 view-label">Application Instructions</td>
                        <td class="col col-sm-9 view-content">{!! $project->application_overview !!}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <h3>Implementation</h3>
        <div class="table-responsive">
            <table class="table table-striped">
                <tbody>
                    <!-- Location -->
                    @foreach($project->opportunity->addresses as $address)
                        <tr>
                            <td class="col col-sm-3 view-label">City, State</td>
                            <td class="col col-sm-9 view-content">{!! $address->city . ', ' . $address->state !!}</td>
                        </tr>
                    @endforeach

                    <!-- Project Deliverables -->
                    <tr>
                        <td class="col col-sm-3 view-label">Sustainability Contribution</td>
                        <td class="col col-sm-9 view-content">{!! $project->sustainability_contribution !!}</td>
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
                        <td class="col col-sm-9 view-content">{!! $project->qualifications !!}</td>
                    </tr>
                    <!-- Student Responsibilities -->
                    <tr>
                        <td class="col col-sm-3 view-label">Student Responsibilities</td>
                        <td class="col col-sm-9 view-content">{!! $project->responsibilities !!}</td>
                    </tr>
                    <!-- Student Learning Ourtcomes -->
                    <tr>
                        <td class="col col-sm-3 view-label">Student Learning Outcomes</td>
                        <td class="col col-sm-9 view-content">{!! $project->learning_outcomes !!}</td>
                    </tr>
                </tbody>
            </table>
        </div>
