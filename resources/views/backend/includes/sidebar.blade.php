<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-title">
                {{ __('menus.backend.sidebar.general') }}
            </li>

            <li class="nav-item">
                <a class="nav-link {{ active_class(Active::checkUriPattern('admin/dashboard')) }}" href="{{ route('admin.dashboard') }}"><i class="icon-speedometer"></i> {{ __('menus.backend.sidebar.dashboard') }}</a>
            </li>

            <li class="nav-title">
                {{ __('menus.backend.sidebar.system') }}
            </li>

            @if ($logged_in_user->can('manage role') || $logged_in_user->can('manage user'))
                <li class="nav-item nav-dropdown {{ active_class(Active::checkUriPattern('admin/auth*'), 'open') }}">
                    <a class="nav-link nav-dropdown-toggle {{ active_class(Active::checkUriPattern('admin/auth*')) }}" href="#">
                        <i class="icon-user"></i> {{ __('menus.backend.access.title') }}

                        @if ($pending_approval > 0)
                            <span class="badge badge-danger">{{ $pending_approval }}</span>
                        @endif
                    </a>


                    <ul class="nav-dropdown-items">
                        @if ($logged_in_user->can('manage user'))
                        <li class="nav-item">
                            <a class="nav-link {{ active_class(Active::checkUriPattern('admin/auth/user*')) }}" href="{{ route('admin.auth.user.index') }}">
                                {{ __('labels.backend.access.users.management') }}

                                @if ($pending_approval > 0)
                                    <span class="badge badge-danger">{{ $pending_approval }}</span>
                                @endif
                            </a>
                        </li>
                        @endif

                        @if ($logged_in_user->can('manage role'))
                        <li class="nav-item">
                            <a class="nav-link {{ active_class(Active::checkUriPattern('admin/auth/role*')) }}" href="{{ route('admin.auth.role.index') }}">
                                {{ __('labels.backend.access.roles.management') }}
                            </a>
                        </li>
                        @endif
                    </ul>
                </li>

                <li class="nav-title">
                    {{ __('menus.backend.sidebar.catalog') }}
                </li>
            @endif

            @if ($logged_in_user->can('manage lookup'))
                <li class="nav-item nav-dropdown {{ active_class(Active::checkUriPattern('admin/lookup*'), 'open') }}">
                    <a class="nav-link nav-dropdown-toggle {{ active_class(Active::checkUriPattern('admin/lookup*')) }}" href="#">
                        <i class="icon-list"></i> {{ __('Lookup') }}
                    </a>

                    <ul class="nav-dropdown-items">

                        <li class="nav-item">
                            <a class="nav-link {{ active_class(Active::checkUriPattern('admin/lookup/affiliation*')) }}" href="{{ route('admin.lookup.affiliation.index') }}">
                                {{ __('Affiliations') }}
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ active_class(Active::checkUriPattern('admin/lookup/budget_type*')) }}" href="{{ route('admin.lookup.budget_type.index') }}">
                                {{ __('Budget Types') }}
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ active_class(Active::checkUriPattern('admin/lookup/category*')) }}" href="{{ route('admin.lookup.category.index') }}">
                                {{ __('Categories') }}
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ active_class(Active::checkUriPattern('admin/lookup/keyword*')) }}" href="{{ route('admin.lookup.keyword.index') }}">
                                {{ __('Keywords') }}
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ active_class(Active::checkUriPattern('admin/lookup/opportunity_review_status*')) }}" href="{{ route('admin.lookup.opportunity_review_status.index') }}">
                                {{ __('Opportunity Review Status') }}
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ active_class(Active::checkUriPattern('admin/lookup/opportunity_status*')) }}" href="{{ route('admin.lookup.opportunity_status.index') }}">
                                {{ __('Opportunity Statuses') }}
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ active_class(Active::checkUriPattern('admin/lookup/opportunity_type*')) }}" href="{{ route('admin.lookup.opportunity_type.index') }}">
                                {{ __('Opportunity Types') }}
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ active_class(Active::checkUriPattern('admin/lookup/organization_status*')) }}" href="{{ route('admin.lookup.organization_status.index') }}">
                                {{ __('Organization Statuses') }}
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ active_class(Active::checkUriPattern('admin/lookup/organization_type*')) }}" href="{{ route('admin.lookup.organization_type.index') }}">
                                {{ __('Organization Types') }}
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ active_class(Active::checkUriPattern('admin/lookup/relationship_type*')) }}" href="{{ route('admin.lookup.relationship_type.index') }}">
                                {{ __('Relationship Types') }}
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ active_class(Active::checkUriPattern('admin/lookup/student_degree_level*')) }}" href="{{ route('admin.lookup.student_degree_level.index') }}">
                                {{ __('Student Degree Levels') }}
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ active_class(Active::checkUriPattern('admin/lookup/user_type*')) }}" href="{{ route('admin.lookup.user_type.index') }}">
                                {{ __('User Types') }}
                            </a>
                        </li>

                    </ul>
                </li>
            @endif

            @if ($logged_in_user->can('manage internship') || $logged_in_user->can('manage project'))
                <li class="nav-item nav-dropdown {{ active_class(Active::checkUriPattern('admin/opportunity*'), 'open') }}">
                    <a class="nav-link nav-dropdown-toggle {{ active_class(Active::checkUriPattern('admin/opportunity*')) }}" href="#">
                        <i class="icon-notebook"></i> {{ __('Opportunity') }}
                    </a>

                    <ul class="nav-dropdown-items">

                        <li class="nav-item">
                            <a class="nav-link {{ active_class(Active::checkUriPattern('admin/opportunity/project*')) }}" href="{{ route('admin.opportunity.project.index') }}">
                                {{ __('Projects') }}
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ active_class(Active::checkUriPattern('admin/opportunity/internship*')) }}" href="{{ route('admin.opportunity.internship.index') }}">
                                {{ __('Internships') }}
                            </a>
                        </li>

                    </ul>
                </li>
            @endif

            @if ($logged_in_user->can('manage organization'))
                <li class="nav-item">
                    <a class="nav-link {{ active_class(Active::checkUriPattern('admin/organization*')) }}" href="{{ route('admin.organization.index') }}">
                        <i class="icon-organization"></i> {{ __('Organizations') }}
                    </a>
                </li>
            @endif

            {{--@if ($logged_in_user->can('manage reports'))--}}
                <li class="nav-item nav-dropdown {{ active_class(Active::checkUriPattern('admin/reports*'), 'open') }}">
                    <a class="nav-link nav-dropdown-toggle {{ active_class(Active::checkUriPattern('admin/reports*')) }}" href="#">
                        <i class="icon-notebook"></i> {{ __('Reports') }}
                    </a>

                    <ul class="nav-dropdown-items">
{{--
                        <li class="nav-item">
                            <a class="nav-link {{ active_class(Active::checkUriPattern('admin/reports/project_review*')) }}" href="{{ route('admin.reports.project_review') }}">
                                {{ __('Project Review') }}
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ active_class(Active::checkUriPattern('admin/reports/internship_review*')) }}" href="{{ route('admin.reports.internship_review') }}">
                                {{ __('Internship Review') }}
                            </a>
                        </li>
 --}}
                    </ul>
                </li>
            {{--@endif--}}

        </ul>
    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div><!--sidebar-->
