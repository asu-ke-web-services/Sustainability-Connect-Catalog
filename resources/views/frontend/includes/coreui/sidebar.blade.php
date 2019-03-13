<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-title">
                {{ __('menus.backend.sidebar.general') }}
            </li>

            <li class="nav-item">
                <a class="nav-link {{ active_class(Active::checkUriPattern('dashboard')) }}" href="{{ route('frontend.user.dashboard') }}"><i class="icon-speedometer"></i> {{ __('menus.backend.sidebar.dashboard') }}</a>
            </li>

            <li class="nav-title">
                {{ __('menus.backend.sidebar.system') }}
            </li>

            @if ($logged_in_user->can('manage internship') || $logged_in_user->can('manage project'))
                <li class="nav-item nav-dropdown {{ active_class(Active::checkUriPattern('admin/opportunity*'), 'open') }}">
                    <a class="nav-link nav-dropdown-toggle {{ active_class(Active::checkUriPattern('admin/opportunity*')) }}" href="#">
                        <i class="icon-notebook"></i> {{ __('Opportunity') }}
                    </a>

                    <ul class="nav-dropdown-items">

                        <li class="nav-item">
                            <a class="nav-link {{ active_class(Active::checkUriPattern('admin/opportunity/project*')) }}" href="#">
                                {{ __('Projects') }}
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ active_class(Active::checkUriPattern('admin/opportunity/internship*')) }}" href="#">
                                {{ __('Internships') }}
                            </a>
                        </li>

                    </ul>
                </li>
            @endif

            @if ($logged_in_user->can('manage organization'))
                <li class="nav-item">
                    <a class="nav-link {{ active_class(Active::checkUriPattern('admin/organization*')) }}" href="#">
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

                        <li class="nav-item nav-dropdown {{ active_class(Active::checkUriPattern('admin/reports/project*'), 'open') }}">
                            <a class="nav-link nav-dropdown-toggle {{ active_class(Active::checkUriPattern('admin/reports/project*')) }}" href="#">
                                <i class="fas fa-angle-double-right"></i> {{ __('Projects') }}
                            </a>
                            <ul class="nav-dropdown-items">

                                <li class="nav-item">
                                    <a class="nav-link {{ active_class(Active::checkUriPattern('admin/reports/project/active-users*')) }}" href="#">
                                        {{ __('Active Project Users') }}
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link {{ active_class(Active::checkUriPattern('admin/reports/project/active*')) }}" href="#">
                                        {{ __('Active Projects') }}
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link {{ active_class(Active::checkUriPattern('admin/reports/project/expired*')) }}" href="#">
                                        {{ __('Expired Projects') }}
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link {{ active_class(Active::checkUriPattern('admin/reports/project/invalid_open*')) }}" href="#">
                                        {{ __('Invalid Open Projects') }}
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link {{ active_class(Active::checkUriPattern('admin/reports/project/future*')) }}" href="#">
                                        {{ __('Future Projects') }}
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
