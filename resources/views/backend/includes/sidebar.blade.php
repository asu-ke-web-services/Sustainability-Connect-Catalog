<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-title">
                @lang('menus.backend.sidebar.general')
            </li>

            <li class="nav-item">
                <a class="nav-link {{ active_class(Active::checkUriPattern('admin/dashboard')) }}" href="{{ route('admin.dashboard') }}"><i class="icon-speedometer"></i> Admin Dashboard</a>
            </li>

            <li class="nav-item">
                    <a class="nav-link" href="{{ route('frontend.user.dashboard') }}"><i class="icon-home"></i> Your Dashboard</a>
                </li>

            <li class="nav-title">
                @lang('menus.backend.sidebar.system')
            </li>

            @if ($logged_in_user->can('manage role') || $logged_in_user->can('manage user'))
                <li class="nav-item nav-dropdown {{ active_class(Active::checkUriPattern('admin/auth*'), 'open') }}">
                    <a class="nav-link nav-dropdown-toggle {{ active_class(Active::checkUriPattern('admin/auth*')) }}" href="#">
                        <i class="icon-user"></i> @lang('menus.backend.access.title')

                        @if ($pending_approval > 0)
                            <span class="badge badge-danger">{{ $pending_approval }}</span>
                        @endif
                    </a>


                    <ul class="nav-dropdown-items">
                        @if ($logged_in_user->can('manage user'))
                        <li class="nav-item">
                            <a class="nav-link {{ active_class(Active::checkUriPattern('admin/auth/user*')) }}" href="{{ route('admin.auth.user.index') }}">
                                @lang('labels.backend.access.users.management')

                                @if ($pending_approval > 0)
                                    <span class="badge badge-danger">{{ $pending_approval }}</span>
                                @endif
                            </a>
                        </li>
                        @endif

                        @if ($logged_in_user->can('manage role'))
                        <li class="nav-item">
                            <a class="nav-link {{ active_class(Active::checkUriPattern('admin/auth/role*')) }}" href="{{ route('admin.auth.role.index') }}">
                                @lang('labels.backend.access.roles.management')
                            </a>
                        </li>
                        @endif
                    </ul>
                </li>

                <li class="nav-title">
                    @lang('menus.backend.sidebar.catalog')
                </li>
            @endif

            @if ($logged_in_user->can('manage reference'))
                <li class="nav-item nav-dropdown {{ active_class(Active::checkUriPattern('admin/reference*'), 'open') }}">
                    <a class="nav-link nav-dropdown-toggle {{ active_class(Active::checkUriPattern('admin/reference*')) }}" href="#">
                        <i class="icon-list"></i> @lang('Lookup')
                    </a>

                    <ul class="nav-dropdown-items">

                        <li class="nav-item">
                            <a class="nav-link {{ active_class(Active::checkUriPattern('admin/reference/affiliation*')) }}" href="{{ route('admin.reference.affiliation.index') }}">
                                @lang('Affiliations')
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ active_class(Active::checkUriPattern('admin/reference/attachment-type*')) }}" href="{{ route('admin.reference.attachment_type.index') }}">
                                @lang('Attachment Types')
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ active_class(Active::checkUriPattern('admin/reference/budget-type*')) }}" href="{{ route('admin.reference.budget_type.index') }}">
                                @lang('Budget Types')
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ active_class(Active::checkUriPattern('admin/reference/category*')) }}" href="{{ route('admin.reference.category.index') }}">
                                @lang('Categories')
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ active_class(Active::checkUriPattern('admin/reference/keyword*')) }}" href="{{ route('admin.reference.keyword.index') }}">
                                @lang('Keywords')
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ active_class(Active::checkUriPattern('admin/reference/opportunity-review-status*')) }}" href="{{ route('admin.reference.opportunity_review_status.index') }}">
                                @lang('Opportunity Review Status')
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ active_class(Active::checkUriPattern('admin/reference/opportunity-status*')) }}" href="{{ route('admin.reference.opportunity_status.index') }}">
                                @lang('Opportunity Statuses')
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ active_class(Active::checkUriPattern('admin/reference/opportunity-type*')) }}" href="{{ route('admin.reference.opportunity_type.index') }}">
                                @lang('Opportunity Types')
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ active_class(Active::checkUriPattern('admin/reference/organization-status*')) }}" href="{{ route('admin.reference.organization_status.index') }}">
                                @lang('Organization Statuses')
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ active_class(Active::checkUriPattern('admin/reference/organization-type*')) }}" href="{{ route('admin.reference.organization_type.index') }}">
                                @lang('Organization Types')
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ active_class(Active::checkUriPattern('admin/reference/relationship-type*')) }}" href="{{ route('admin.reference.relationship_type.index') }}">
                                @lang('Relationship Types')
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ active_class(Active::checkUriPattern('admin/reference/student-degree-level*')) }}" href="{{ route('admin.reference.student_degree_level.index') }}">
                                @lang('Student Degree Levels')
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ active_class(Active::checkUriPattern('admin/reference/user-type*')) }}" href="{{ route('admin.reference.user_type.index') }}">
                                @lang('User Types')
                            </a>
                        </li>

                    </ul>
                </li>
            @endif

            @if ($logged_in_user->can('manage internship') || $logged_in_user->can('manage project'))
                <li class="nav-item nav-dropdown {{ active_class(Active::checkUriPattern('admin/opportunity*'), 'open') }}">
                    <a class="nav-link nav-dropdown-toggle {{ active_class(Active::checkUriPattern('admin/opportunity*')) }}" href="#">
                        <i class="icon-notebook"></i> @lang('Opportunity')
                    </a>

                    <ul class="nav-dropdown-items">

                        <li class="nav-item">
                            <a class="nav-link {{ active_class(Active::checkUriPattern('admin/opportunity/project*')) }}" href="{{ route('admin.opportunity.project.index') }}">
                                @lang('Projects')
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ active_class(Active::checkUriPattern('admin/opportunity/internship*')) }}" href="{{ route('admin.opportunity.internship.index') }}">
                                @lang('Internships')
                            </a>
                        </li>

                    </ul>
                </li>
            @endif

            @if ($logged_in_user->can('manage organization'))
                <li class="nav-item">
                    <a class="nav-link {{ active_class(Active::checkUriPattern('admin/organization*')) }}" href="{{ route('admin.organization.index') }}">
                        <i class="icon-organization"></i> @lang('Organizations')
                    </a>
                </li>
            @endif

            {{--@if ($logged_in_user->can('manage reports'))--}}
                <li class="nav-item nav-dropdown {{ active_class(Active::checkUriPattern('admin/reports*'), 'open') }}">
                    <a class="nav-link nav-dropdown-toggle {{ active_class(Active::checkUriPattern('admin/reports*')) }}" href="#">
                        <i class="icon-notebook"></i> @lang('Reports')
                    </a>

                    <ul class="nav-dropdown-items">

                        <li class="nav-item nav-dropdown {{ active_class(Active::checkUriPattern('admin/reports/project*'), 'open') }}">
                            <a class="nav-link nav-dropdown-toggle {{ active_class(Active::checkUriPattern('admin/reports/project*')) }}" href="#">
                                <i class="fas fa-angle-double-right"></i> @lang('Projects')
                            </a>
                            <ul class="nav-dropdown-items">

                                <li class="nav-item">
                                    <a class="nav-link {{ active_class(Active::checkUriPattern('admin/reports/project/active-users*')) }}" href="{{ route('admin.report.project.active_users') }}">
                                        @lang('Active Project Users')
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link {{ active_class(Active::checkUriPattern('admin/reports/project/active*')) }}" href="{{ route('admin.report.project.active') }}">
                                        @lang('Active Projects')
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link {{ active_class(Active::checkUriPattern('admin/reports/project/expired*')) }}" href="{{ route('admin.report.project.expired') }}">
                                        @lang('Expired Projects')
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link {{ active_class(Active::checkUriPattern('admin/reports/project/invalid_open*')) }}" href="{{ route('admin.report.project.invalid_open') }}">
                                        @lang('Invalid Open Projects')
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link {{ active_class(Active::checkUriPattern('admin/reports/project/future*')) }}" href="{{ route('admin.report.project.future') }}">
                                        @lang('Future Projects')
                                    </a>
                                </li>

                            </ul>
                        </li>
                    </ul>
                </li>
            {{--@endif--}}

        </ul>
    </nav>
</div><!--sidebar-->
