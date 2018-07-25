        <div class="table-responsive">
            <table class="table table-striped">
                <tbody>
                    <!-- Opportunity ID -->
                    <tr>
                        <td class="col col-sm-3 view-label">ID</td>
                        <td class="col col-sm-9 view-content">{!! $opportunity->id !!}</td>
                    </tr>
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
                        <td class="col col-sm-9 view-content">{!! $opportunity->status->name !!}</td>
                    </tr>

                    <!-- Description -->
                    <tr>
                        <td class="col col-sm-3 view-label">Project Description</td>
                        <td class="col col-sm-9 view-content">{!! $opportunity->description !!}</td>
                    </tr>

                    <!-- Success Story -->
                    <tr>
                        <td class="col col-sm-3 view-label">Success Story</td>
                        <td class="col col-sm-9 view-content">{!! $opportunity->opportunityable->success_story !!}</td>
                    </tr>

                    <!-- Library Collection -->
                    <tr>
                        <td class="col col-sm-3 view-label">Library Collection</td>
                        <td class="col col-sm-9 view-content">{!! $opportunity->opportunityable->library_collection !!}</td>
                    </tr>

                </tbody>
            </table>
        </div>

        <h3>Project Status</h3>
        <div class="table-responsive">
            <table class="table table-striped">
                <tbody>
                    <!-- Project Status -->
                    <tr>
                        <td class="col col-sm-3 view-label">Project Status</td>
                        <td class="col col-sm-9 view-content">{!! $opportunity->status->name !!}</td>
                    </tr>
                    <!-- Review Status -->
                    <tr>
                        <td class="col col-sm-3 view-label">Review Status</td>
                        <td class="col col-sm-9 view-content">TODO</td>
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
                    <!-- Project Starts -->
                    <tr>
                        <td class="col col-sm-3 view-label">Project Starts</td>
                        <td class="col col-sm-9 view-content">{!! $opportunity->start_date !!}</td>
                    </tr>
                    <!-- Project Ends -->
                    <tr>
                        <td class="col col-sm-3 view-label">Project Ends</td>
                        <td class="col col-sm-9 view-content">{!! $opportunity->end_date !!}</td>
                    </tr>

                    <!-- Listing Starts -->
                    <tr>
                        <td class="col col-sm-3 view-label">Listing Starts</td>
                        <td class="col col-sm-9 view-content">{!! $opportunity->listing_starts !!}</td>
                    </tr>
                    <!-- Listing Ends -->
                    <tr>
                        <td class="col col-sm-3 view-label">Listing Ends</td>
                        <td class="col col-sm-9 view-content">{!! $opportunity->listing_ends !!}</td>
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
                        <td class="col col-sm-9 view-content">{!! $opportunity->application_deadline !!}</td>
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

                    <!-- Project Deliverables -->
                    <tr>
                        <td class="col col-sm-3 view-label">Sustainability Contribution</td>
                        <td class="col col-sm-9 view-content">{!! $opportunity->opportunityable->sustainability_contribution !!}</td>
                    </tr>

                    <!-- Project Implementation -->
                    <tr>
                        <td class="col col-sm-3 view-label">Implementation Notes</td>
                        <td class="col col-sm-9 view-content">{!! $opportunity->opportunityable->implementation_paths !!}</td>
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
                        <td class="col col-sm-9 view-content">{!! $opportunity->opportunityable->qualifications !!}</td>
                    </tr>
                    <!-- Student Responsibilities -->
                    <tr>
                        <td class="col col-sm-3 view-label">Student Responsibilities</td>
                        <td class="col col-sm-9 view-content">{!! $opportunity->opportunityable->responsibilities !!}</td>
                    </tr>
                    <!-- Student Learning Ourtcomes -->
                    <tr>
                        <td class="col col-sm-3 view-label">Student Learning Outcomes</td>
                        <td class="col col-sm-9 view-content">{!! $opportunity->opportunityable->learning_outcomes !!}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <h3>Compensation / Credit</h3>
        <div class="table-responsive">
            <table class="table table-striped">
                <tbody>
                    <!-- Budget Available -->
                    <tr>
                        <td class="col col-sm-3 view-label">Minimum and Desired Qualifications</td>
                        <td class="col col-sm-9 view-content">{!! $opportunity->opportunityable->qualifications !!}</td>
                    </tr>
                    <!-- Budget Amount -->
                    <tr>
                        <td class="col col-sm-3 view-label">Student Responsibilities</td>
                        <td class="col col-sm-9 view-content">{!! $opportunity->opportunityable->responsibilities !!}</td>
                    </tr>
                    <!-- Degree Programs Offering Credit -->
                    <tr>
                        <td class="col col-sm-3 view-label">Student Learning Outcomes</td>
                        <td class="col col-sm-9 view-content">{!! $opportunity->opportunityable->learning_outcomes !!}</td>
                    </tr>
                    <!-- Compensation Notes -->
                    <tr>
                        <td class="col col-sm-3 view-label">Compensation Description</td>
                        <td class="col col-sm-9 view-content">{!! $opportunity->opportunityable->compensation !!}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <h3>People</h3>
        <div class="table-responsive">
            <table class="table table-striped">
                <tbody>
                    <!-- Project Supervisor -->
                    <tr>
                        <td class="col col-sm-3 view-label">Project Supervisor</td>
                        <td class="col col-sm-9 view-content">{!! $opportunity->ownerUser->name ?? '' !!}</td>
                    </tr>
                    <!-- ASU Program Lead -->
                    <tr>
                        <td class="col col-sm-3 view-label">ASU Program Lead</td>
                        <td class="col col-sm-9 view-content">{!! $opportunity->opportunityable->program_lead !!}</td>
                    </tr>
                    <!-- Project Partner -->
                    <tr>
                        <td class="col col-sm-3 view-label">Project Partner</td>
                        <td class="col col-sm-9 view-content">{!! $opportunity->organization->name ?? '' !!}</td>
                    </tr>
                    <!-- Participants -->
                    <!-- Mentors -->
                    <!-- Predecessor Project -->
                </tbody>
            </table>
        </div>

        <h3>Notes</h3>
        <div class="table-responsive">
            <table class="table table-striped">
                <tbody>
                    <!-- Notes -->
                    @foreach($opportunity->notes as $note)
                        <tr>
                            <td class="col col-sm-9 view-content">{!! $note->user->name. ': ' . $note->body !!}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <h3>Database Info</h3>
        <div class="table-responsive">
            <table class="table table-striped">
                <tbody>
                    <!-- Created -->
                    <tr>
                        <td class="col col-sm-3 view-label">Project Created</td>
                        <td class="col col-sm-9 view-content">{!! $opportunity->created_at !!}</td>
                    </tr>
                    <!-- Created By -->
                    <tr>
                        <td class="col col-sm-3 view-label">Created By</td>
                        <td class="col col-sm-9 view-content">{!! $opportunity->created_by !!}</td>
                    </tr>
                    <!-- Updated -->
                    <tr>
                        <td class="col col-sm-3 view-label">Project Updated</td>
                        <td class="col col-sm-9 view-content">{!! $opportunity->updated_at !!}</td>
                    </tr>
                    <!-- Updated By -->
                    <tr>
                        <td class="col col-sm-3 view-label">Updated By</td>
                        <td class="col col-sm-9 view-content">{!! $opportunity->updated_by !!}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <h3>Documents</h3>
        <div class="table-responsive">
            <table class="table table-striped">
                <tbody>
                    <!-- Documents loop -->
                </tbody>
            </table>
        </div>

        <h3>Attached Users</h3>
        <div class="table-responsive">
            <table class="table table-striped">
                <tbody>
                    <!-- Related Users loop -->
                </tbody>
            </table>
        </div>
