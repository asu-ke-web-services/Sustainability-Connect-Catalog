
        <!-- Internship Name -->
        <h1>{!! $internship->name !!}</h1>

        <div class="table-responsive">
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <td>&nbsp;</td>
                        <td>
                        <!-- Affiliations -->
                        @foreach($internship->affiliations as $affiliation)
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

                    <!-- Opportunity Status -->
                    <tr>
                        <td class="col col-sm-3 view-label">Status</td>
                        <td class="col col-sm-9 view-content">{!! $internship->status->name !!}</td>
                    </tr>

                    <!-- Description -->
                    <tr>
                        <td class="col col-sm-3 view-label">Internship Description</td>
                        <td class="col col-sm-9 view-content">{!! $internship->description !!}</td>
                    </tr>

                </tbody>
            </table>
        </div>

        <h3>Categories</h3>
        <div class="table-responsive">
            <table class="table table-striped">
                <tbody>
                    <!-- Categories -->
                    @foreach($internship->categories as $category)
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
                    @foreach($internship->keywords as $keyword)
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
                        <td class="col col-sm-9 view-content">{!! $internship->application_deadline_at !!}</td>
                    </tr>
                    <!-- Semester Offered -->
                    <tr>
                        <td class="col col-sm-3 view-label">Semester Offered</td>
                        <td class="col col-sm-9 view-content">{!! $internship->opportunity_start_at !!}</td>
                    </tr>
                    <!-- Application Instructions -->
                    <tr>
                        <td class="col col-sm-3 view-label">Application Instructions</td>
                        <td class="col col-sm-9 view-content">{!! $internship->application_instructions !!}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <h3>Implementation</h3>
        <div class="table-responsive">
            <table class="table table-striped">
                <tbody>
                    <!-- Location -->
                    @foreach($internship->addresses as $address)
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
                        <td class="col col-sm-9 view-content">{!! $internship->responsibilities !!}</td>
                    </tr>

                    <!-- Qualifications -->
                    <tr>
                        <td class="col col-sm-3 view-label">Minimum and Desired Qualifications</td>
                        <td class="col col-sm-9 view-content">{!! $internship->qualifications !!}</td>
                    </tr>

                    <!-- Degrees Offering Credit -->
                    <tr>
                        <td class="col col-sm-3 view-label">Degrees Offering Credit</td>
                        <td class="col col-sm-9 view-content">{!! $internship->learning_outcomes !!}</td>
                    </tr>

                    <!-- Other Compensation -->
                    <tr>
                        <td class="col col-sm-3 view-label">Other Compensation</td>
                        <td class="col col-sm-9 view-content">{!! $internship->compensation !!}</td>
                    </tr>

                    <!-- Notes -->

                </tbody>
            </table>
        </div>
