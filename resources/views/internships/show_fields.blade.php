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

                    <!-- Opportunity Status -->
                    <tr>
                        <td class="col col-sm-3 view-label">Status</td>
                        <td class="col col-sm-9 view-content">{!! $opportunity->status->name !!}</td>
                    </tr>

                    <!-- Description -->
                    <tr>
                        <td class="col col-sm-3 view-label">Internship Description</td>
                        <td class="col col-sm-9 view-content">{!! $opportunity->description !!}</td>
                    </tr>

                </tbody>
            </table>
        </div>

        <h3>Categories</h3>
        <div class="table-responsive">
            <table class="table table-striped">
                <tbody>
                    <!-- Categories -->
                    @foreach($opportunity->categories as $category)
                        <tr>
                            <td class="col col-sm-9 view-content">{!! $category->name !!}</td>
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
                    @foreach($opportunity->keywords as $keyword)
                        <tr>
                            <td class="col col-sm-9 view-content">{!! $keyword->name !!}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <h3>Availability</h3>
        <div class="table-responsive">
            <table class="table table-striped">
                <tbody>
                    <!-- Application Deadline -->
                    <tr>
                        <td class="col col-sm-3 view-label">Apply By</td>
                        <td class="col col-sm-9 view-content">{!! $opportunity->application_deadline !!}</td>
                    </tr>
                    <!-- Semester Offered -->
                    <tr>
                        <td class="col col-sm-3 view-label">Semester Offered</td>
                        <td class="col col-sm-9 view-content">{!! $opportunity->start_date !!}</td>
                    </tr>
                    <!-- Application Instructions -->
                    <tr>
                        <td class="col col-sm-3 view-label">Application Instructions</td>
                        <td class="col col-sm-9 view-content">{!! $opportunity->opportunityable->application_instructions !!}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <h3>Implementation</h3>
        <div class="table-responsive">
            <table class="table table-striped">
                <tbody>
                    <!-- Location -->
                    @foreach($opportunity->addresses as $address)
                        <tr>
                            <td class="col col-sm-3 view-label">City, State</td>
                            <td class="col col-sm-9 view-content">{!! $address->city . ', ' . $address->state !!}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <h3>Student Expectations</h3>
        <div class="table-responsive">
            <table class="table table-striped">
                <tbody>
                    <!-- Student Responsibilities -->
                    <tr>
                        <td class="col col-sm-3 view-label">Student Responsibilities</td>
                        <td class="col col-sm-9 view-content">{!! $opportunity->opportunityable->responsibilities !!}</td>
                    </tr>

                    <!-- Qualifications -->
                    <tr>
                        <td class="col col-sm-3 view-label">Minimum and Desired Qualifications</td>
                        <td class="col col-sm-9 view-content">{!! $opportunity->opportunityable->qualifications !!}</td>
                    </tr>

                    <!-- Degrees Offering Credit -->
                    <tr>
                        <td class="col col-sm-3 view-label">Degrees Offering Credit</td>
                        <td class="col col-sm-9 view-content">{!! $opportunity->opportunityable->learning_outcomes !!}</td>
                    </tr>

                    <!-- Other Compensation -->
                    <tr>
                        <td class="col col-sm-3 view-label">Other Compensation</td>
                        <td class="col col-sm-9 view-content">{!! $opportunity->opportunityable->compensation !!}</td>
                    </tr>

                    <!-- Notes -->

                </tbody>
            </table>
        </div>
