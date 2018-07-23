        <h2 style="margin-top:0">{!! $opportunity->title !!}</h2>
        <div class="table-responsive">
            <table class="table table-striped">
                <tbody>
                    <!-- Opportunity ID -->
                    <tr>
                        <td class="col col-sm-3 view-label">ID</td>
                        <td class="col col-sm-9 view-content">{!! $opportunity->id !!}</td>
                    </tr>

                    <!-- Managing Organization -->
                    <tr>
                        <td class="col col-sm-3 view-label">Managing Organization</td>
                        <td class="col col-sm-9 view-content">{!! $opportunity->organization->name !!}</td>
                    </tr>

                    <!-- Internship Supervisor -->
                    <tr>
                        <td class="col col-sm-3 view-label">Internship Supervisor</td>
                        <td class="col col-sm-9 view-content">{!! $opportunity->opportunityable->program_lead !!}</td>
                    </tr>

                    <!-- Description -->
                    <tr>
                        <td class="col col-sm-3 view-label">Internship Description</td>
                        <td class="col col-sm-9 view-content">{!! $opportunity->description !!}</td>
                    </tr>

                    <!-- Success Story -->
                    <tr>
                        <td class="col col-sm-3 view-label">Success Story</td>
                        <td class="col col-sm-9 view-content">{!! $opportunity->opportunityable->success_story !!}</td>
                    </tr>

                </tbody>
            </table>
        </div>

        <h3>Internship Status</h3>
        <div class="table-responsive">
            <table class="table table-striped">
                <tbody>
                    <!-- Opportunity Status -->
                    <tr>
                        <td class="col col-sm-3 view-label">Status</td>
                        <td class="col col-sm-9 view-content">{!! $opportunity->status->name !!}</td>
                    </tr>
                    <!-- Urgent -->
                    <tr>
                        <td class="col col-sm-3 view-label">Urgent</td>
                        <td class="col col-sm-9 view-content"></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <h3>Availability</h3>
        <div class="table-responsive">
            <table class="table table-striped">
                <tbody>
                    <!-- Publish Start -->
                    <tr>
                        <td class="col col-sm-3 view-label">Publish Start</td>
                        <td class="col col-sm-9 view-content">{!! $opportunity->listing_start !!}</td>
                    </tr>
                    <!-- Publish End -->
                    <tr>
                        <td class="col col-sm-3 view-label">Publish End</td>
                        <td class="col col-sm-9 view-content">{!! $opportunity->listing_end !!}</td>
                    </tr>
                    <!-- Application Deadline -->
                    <tr>
                        <td class="col col-sm-3 view-label">Apply By</td>
                        <td class="col col-sm-9 view-content">{!! $opportunity->application_deadline !!}</td>
                    </tr>
                    <!-- Availability -->
                    <tr>
                        <td class="col col-sm-3 view-label">Availability</td>
                        <td class="col col-sm-9 view-content"></td>
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

                    <!-- Paid Internship? -->
                    <tr>
                        <td class="col col-sm-3 view-label">Paid Internship?</td>
                        <td class="col col-sm-9 view-content">{!! $opportunity->opportunityable->is_paid !!}</td>
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
                </tbody>
            </table>
        </div>
