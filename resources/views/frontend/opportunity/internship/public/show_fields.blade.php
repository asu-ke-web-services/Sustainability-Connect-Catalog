
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
                        <td class="col col-sm-9 view-content">{{ $internship->status->name }}</td>
                    </tr>

                    <!-- Description -->
                    <tr>
                        <td class="col col-sm-3 view-label">Internship Description</td>
                        <td class="col col-sm-9 view-content">@markdown($internship->description ?? null)</td>
                    </tr>

                    <!-- Success Story -->
                    @unless (empty($internship->success_story))
                    <tr>
                        <td class="col col-sm-3 view-label">Success Story</td>
                        <td class="col col-sm-9 view-content"><a href="{!! $internship->success_story !!}">{!! $internship->success_story !!}</a></td>
                    </tr>
                    @endunless

                    <!-- Library Collection -->
                    @unless (empty($internship->library_collection))
                    <tr>
                        <td class="col col-sm-3 view-label">Library Collection Archive</td>
                        <td class="col col-sm-9 view-content"><a href="{!! $internship->library_collection !!}">{!! $internship->library_collection !!}</a></td>
                    </tr>
                    @endunless

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
                            <td class="col col-sm-9 view-content">{{ $category->name }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <h3>Keywords</h3>
        <div class="table-responsive">
            <table class="table table-striped">
                <tbody>
                    <!-- Keywords -->
                    @foreach($internship->keywords as $keyword)
                        <tr>
                            <td class="col col-sm-9 view-content">{{ $keyword->name }}</td>
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
                        <td class="col col-sm-9 view-content">{{
                             $internship->application_deadline_text > ''
                                ? $internship->application_deadline_text
                                : (null !== $internship->application_deadline_at ? $internship->application_deadline_at->toFormattedDateString() : '')
                        }}</td>
                    </tr>

                    <!-- Application Instructions -->
                    <tr>
                        <td class="col col-sm-3 view-label">Application Instructions</td>
                        <td class="col col-sm-9 view-content">@markdown($internship->application_instructions ?? null)</td>
                    </tr>
                </tbody>
            </table>
        </div>

        @if(isset($internship->organization))
        <h3>Sponsor Organization</h3>
        <div class="table-responsive">
            <table class="table table-striped">
                <tbody>
                    <!-- Organization Name -->
                    <tr>
                        <td class="col col-sm-3 view-label">Organization</td>
                        <td class="col col-sm-9 view-content">{{ $internship->organization->name ?? null }}</td>
                    </tr>

                    @if(!empty($internship->organization->url))
                    <!-- Organization URL -->
                    <tr>
                        <td class="col col-sm-3 view-label">Web Address</td>
                        <td class="col col-sm-9 view-content"><a href="{{ $internship->organization->url ?? null }}">{{ $internship->organization->url ?? null }}</a></td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
        @endif

        <h3>Implementation</h3>
        <div class="table-responsive">
            <table class="table table-striped">
                <tbody>
                    <!-- Location -->
                    @foreach($internship->addresses as $address)
                        <tr>
                            <td class="col col-sm-3 view-label">City, State</td>
                            <td class="col col-sm-9 view-content">{{ $address->city . ', ' . $address->state }}</td>
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
                        <td class="col col-sm-9 view-content">@markdown($internship->responsibilities ?? null)</td>
                    </tr>

                    <!-- Qualifications -->
                    <tr>
                        <td class="col col-sm-3 view-label">Minimum and Desired Qualifications</td>
                        <td class="col col-sm-9 view-content">@markdown($internship->qualifications ?? null)</td>
                    </tr>

                    <!-- Degrees Offering Credit -->
                    <tr>
                        <td class="col col-sm-3 view-label">SOS Degree Credit</td>
                        <td class="col col-sm-9 view-content">@markdown($internship->degree_program ?? null)</td>
                    </tr>

                    <!-- Other Compensation -->
                    <tr>
                        <td class="col col-sm-3 view-label">Other Compensation</td>
                        <td class="col col-sm-9 view-content">@markdown($internship->compensation ?? null)</td>
                    </tr>

                    <!-- Notes -->

                </tbody>
            </table>
        </div>

        <h3>Internship Documents</h3>
        <div class="table-responsive">
            <table class="table table-striped">
                <tbody>
                    @foreach($publicAttachments as $attachment)
                        <tr>
                            <td>{{ ucwords($attachment->name) }}</td>
                            <td><a href="{{ $attachment->getUrl() }}">{{ $attachment->file_name }}</a></td>
                            <td>{{ $attachment->getCustomProperty('type') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
