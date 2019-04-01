<header class="app-header navbar">
    <button class="navbar-toggler sidebar-toggler d-lg-none mr-auto" type="button" data-toggle="sidebar-show">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="{{ config('app.sc_base_url') }}">
        <img class="navbar-brand-full" src="/img/logo-white.png" height="60" alt="Sustainability Connect Logo">
        <img class="navbar-brand-minimized" src="/img/logo-white.png" height="60" alt="Sustainability Connect Logo">
    </a>
    <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button" data-toggle="sidebar-lg-show">
        <span class="navbar-toggler-icon"></span>
    </button>

    <ul class="nav navbar-nav d-md-down-none">
        <li class="nav-item px-3">
            <a class="nav-link" href="{{ route('frontend.index') }}"><i class="icon-home"></i></a>
        </li>

        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Projects</a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="{{ route('frontend.opportunity.project.active') }}">Active Listings</a>
                <a class="dropdown-item" href="{{ route('frontend.opportunity.project.completed') }}">Past Listings</a>
            </div>
        </li>

        <li class="nav-item px-3">
            <a class="nav-link" href="{{ route('frontend.opportunity.internship.search_active') }}">Internships</a>
        </li>

        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Submit an Opportunity</a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="{{ route('frontend.opportunity.project.create') }}">Submit Project</a>
            </div>
        </li>

        <li class="nav-item px-3">
            <a class="nav-link" href="{{ config('app.sc_base_url') }}/news/sustainability-connect-successes/">Success Stories</a>
        </li>

        <li class="nav-item px-3">
            <a class="nav-link" href="{{ config('app.sc_base_url') }}/news/sustainability-connect-news/">News</a>
        </li>

        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">About</a>
            <div class="dropdown-menu">
                <a title="About Us" class="dropdown-item" href="{{ config('app.sc_base_url') }}/about/">About Us</a>
                <a title="Contact Us" class="dropdown-item" href="{{ config('app.sc_base_url') }}/about/contact-us/">Contact Us</a>
                <a title="Programs &amp; Partners" class="dropdown-item" href="{{ config('app.sc_base_url') }}/about/programs-partners/">Programs &amp; Partners</a>
                <a title="Types of Opportunities" class="dropdown-item" href="{{ config('app.sc_base_url') }}/about/types-of-opportunities/">Types of Opportunities</a>
                <a title="Why Work With Us" class="dropdown-item" href="{{ config('app.sc_base_url') }}/about/why-work-with-us/">Why Work With Us</a>
                <a title="Resources" class="dropdown-item" href="{{ config('app.sc_base_url') }}/about/resources/">Resources</a>
                <a title="FAQ" class="dropdown-item" href="{{ config('app.sc_base_url') }}/about/faq/">FAQ</a>
            </div>
        </li>

        <li class="nav-item px-3">
            <a class="nav-link" href="{{ route('frontend.user.dashboard') }}">Dashboard</a>
        </li>

        @if (config('locale.status') && count(config('locale.languages')) > 1)
            <li class="nav-item px-3 dropdown">
                <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    <span class="d-md-down-none">{{ __('menus.language-picker.language') }} ({{ strtoupper(app()->getLocale()) }})</span>
                </a>

                @include('includes.partials.lang')
            </li>
        @endif
    </ul>

    <ul class="nav navbar-nav ml-auto">
        <li class="nav-item d-md-down-none">
            <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <i class="icon-bell"></i>
                {{-- <span class="badge badge-pill badge-danger">5</span> --}}
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg">
                {{--                <div class="dropdown-header text-center">
                                    <strong>You have 2 notifications</strong>
                                </div>
                                <a class="dropdown-item" href="#">
                                    <i class="icon-user-follow text-success"></i> New user registered</a>
                                <a class="dropdown-item" href="#">
                                    <i class="icon-user-unfollow text-danger"></i> User deleted</a>
                                <a class="dropdown-item" href="#">
                                    <i class="icon-chart text-info"></i> Sales report is ready</a>
                                <a class="dropdown-item" href="#">
                                    <i class="icon-basket-loaded text-primary"></i> New client</a>
                                <a class="dropdown-item" href="#">
                                    <i class="icon-speedometer text-warning"></i> Server overloaded</a>
                                <div class="dropdown-header text-center">
                                    <strong>Server</strong>
                                </div>
                                <a class="dropdown-item" href="#">
                                    <div class="text-uppercase mb-1">
                                        <small>
                                            <b>CPU Usage</b>
                                        </small>
                                    </div>
                                    <span class="progress progress-xs">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </span>
                                    <small class="text-muted">348 Processes. 1/4 Cores.</small>
                                </a>
                                <a class="dropdown-item" href="#">
                                    <div class="text-uppercase mb-1">
                                        <small>
                                            <b>Memory Usage</b>
                                        </small>
                                    </div>
                                    <span class="progress progress-xs">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                    </span>
                                    <small class="text-muted">11444GB/16384MB</small>
                                </a>
                                <a class="dropdown-item" href="#">
                                    <div class="text-uppercase mb-1">
                                        <small>
                                            <b>SSD 1 Usage</b>
                                        </small>
                                    </div>
                                    <span class="progress progress-xs">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 95%" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                                    </span>
                                    <small class="text-muted">243GB/256GB</small>
                                </a> --}}
            </div>
        </li>
        <li class="nav-item dropdown d-md-down-none">
            <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <i class="icon-list"></i>
                {{-- <span class="badge badge-pill badge-danger">5</span> --}}
            </a>
            {{--            <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg">
                            <div class="dropdown-header text-center">
                                <strong>You have 0 pending tasks</strong>
                            </div>
                            <a class="dropdown-item" href="#">
                                <div class="small mb-1">Upgrade NPM & Bower
                                    <span class="float-right">
                                        <strong>0%</strong>
                                    </span>
                                </div>
                                <span class="progress progress-xs">
                                    <div class="progress-bar bg-info" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                </span>
                            </a>
                            <a class="dropdown-item" href="#">
                                <div class="small mb-1">ReactJS Version
                                    <span class="float-right">
                                        <strong>25%</strong>
                                    </span>
                                </div>
                                <span class="progress progress-xs">
                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </span>
                            </a>
                            <a class="dropdown-item" href="#">
                                <div class="small mb-1">VueJS Version
                                    <span class="float-right">
                                        <strong>50%</strong>
                                    </span>
                                </div>
                                <span class="progress progress-xs">
                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                </span>
                            </a>
                            <a class="dropdown-item" href="#">
                                <div class="small mb-1">Add new layouts
                                    <span class="float-right">
                                        <strong>75%</strong>
                                    </span>
                                </div>
                                <span class="progress progress-xs">
                                    <div class="progress-bar bg-info" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                </span>
                            </a>
                            <a class="dropdown-item" href="#">
                                <div class="small mb-1">Angular 2 Cli Version
                                    <span class="float-right">
                                        <strong>100%</strong>
                                    </span>
                                </div>
                                <span class="progress progress-xs">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                </span>
                            </a>
                            <a class="dropdown-item text-center" href="#">
                                <strong>View all tasks</strong>
                            </a>
            </div> --}}
        </li>
        <li class="nav-item dropdown d-md-down-none">
            <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <img src="{{ $logged_in_user->picture }}" class="img-avatar" alt="{{ $logged_in_user->email }}">
                <span class="d-md-down-none">{{ $logged_in_user->full_name }}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
{{--                <div class="dropdown-header text-center">
                    <strong>Account</strong>
                </div>
                <a class="dropdown-item" href="#">
                    <i class="fa fa-bell"></i> Updates
                    <span class="badge badge-info">42</span>
                </a>
                <a class="dropdown-item" href="#">
                    <i class="fa fa-envelope"></i> Messages
                    <span class="badge badge-success">42</span>
                </a>
                <a class="dropdown-item" href="#">
                    <i class="fa fa-tasks"></i> Tasks
                    <span class="badge badge-danger">42</span>
                </a>
                <a class="dropdown-item" href="#">
                    <i class="fa fa-comments"></i> Comments
                    <span class="badge badge-warning">42</span>
                </a> --}}
                <div class="dropdown-header text-center">
                    <strong>Settings</strong>
                </div>
                <a class="dropdown-item" href="{{ route('frontend.user.account') }}">
                    <i class="fa fa-user"></i> Profile
                </a>
                <div class="divider"></div>
                <a class="dropdown-item" href="{{ route('frontend.auth.logout') }}">
                    <i class="fas fa-lock"></i> @lang('navs.general.logout')
                </a>
            </div>
        </li>
    </ul>

    {{--<button class="navbar-toggler aside-menu-toggler" type="button">☰</button>--}}
</header>
