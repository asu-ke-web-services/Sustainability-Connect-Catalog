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

            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#">
                    <i class="icon-notebook"></i> {{ __('Projects') }}
                </a>

                <ul class="nav-dropdown-items">

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('frontend.opportunity.project.submission.create') }}">
                            Submit Project Proposal
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('frontend.opportunity.project.create') }}">
                            Create Full Project Listing
                        </a>
                    </li>

                </ul>
            </li>
        </ul>
    </nav>
</div><!--sidebar-->
