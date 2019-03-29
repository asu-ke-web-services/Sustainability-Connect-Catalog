<header class="app-header navbar">
    <button class="navbar-toggler sidebar-toggler d-lg-none mr-auto" type="button" data-toggle="sidebar-show">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="{{ config('app.sc_base_url') }}">
        <img class="navbar-brand-full" src="/img/logo-color.png" height="60" alt="Sustainability Connect Logo">
        <img class="navbar-brand-minimized" src="/img/logo-color.png" height="60" alt="Sustainability Connect Logo">
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
                <a class="dropdown-item" href="{{ route('frontend.opportunity.project.search_active') }}">Active Listings</a>
                <a class="dropdown-item" href="{{ route('frontend.opportunity.project.search_completed') }}">Past Listings</a>
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
        <li class="nav-item d-md-down-none"></li>
    </ul>

    {{--<button class="navbar-toggler aside-menu-toggler" type="button">☰</button>--}}
</header>
