<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">

            @can('view admin dashboard')
            <li class="nav-item">
                <a class="nav-link {{ active_class(Active::checkUriPattern('admin/dashboard')) }}" href="{{ route('admin.dashboard') }}"><i class="icon-speedometer"></i> Administration Dashboard</a>
            </li>
            @endcan

            <li class="nav-item">
                <a class="nav-link {{ active_class(Active::checkUriPattern('dashboard')) }}" href="{{ route('frontend.user.dashboard') }}"><i class="icon-speedometer"></i> Your Dashboard</a>
            </li>

            <li class="nav-title">
                Tasks
            </li>

            <li class="nav-item nav-dropdown {{ active_class(Active::checkUriPattern('admin/opportunity*'), 'open') }}">
                <a class="nav-link nav-dropdown-toggle {{ active_class(Active::checkUriPattern('admin/opportunity*')) }}" href="#">
                    <i class="icon-notebook"></i> {{ __('Projects') }}
                </a>

                <ul class="nav-dropdown-items">

                    <li class="nav-item">
                        <a class="nav-link {{ active_class(Active::checkUriPattern('admin/opportunity/project*')) }}" href="#">
                            Submit Project Proposal
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ active_class(Active::checkUriPattern('admin/opportunity/internship*')) }}" href="#">
                            Create Full Project Listing
                        </a>
                    </li>

                </ul>
            </li>

            <li class="nav-item nav-dropdown {{ active_class(Active::checkUriPattern('admin/opportunity*'), 'open') }}">
                <a class="nav-link nav-dropdown-toggle {{ active_class(Active::checkUriPattern('admin/opportunity*')) }}" href="#">
                    <i class="icon-notebook"></i> {{ __('Internships') }}
                </a>

                <ul class="nav-dropdown-items">

                    <li class="nav-item">
                        <a class="nav-link {{ active_class(Active::checkUriPattern('admin/opportunity/project*')) }}" href="#">
                            Submit Internship Proposal
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ active_class(Active::checkUriPattern('admin/opportunity/internship*')) }}" href="#">
                            Create Full Internship Listing
                        </a>
                    </li>

                </ul>
            </li>


        </ul>
    </nav>
</div><!--sidebar-->
