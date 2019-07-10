<header class="app-header navbar">
    <button class="navbar-toggler sidebar-toggler d-lg-none mr-auto" type="button" data-toggle="sidebar-show">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="{{ config('app.sc_base_url') }}">
        <img class="navbar-brand-full" src="/img/logo-white.png" height="60" alt="Sustainability Connect Logo">
        <img class="navbar-brand-minimized" src="/img/logo-white.png" height="60" alt="Sustainability Connect Logo">
    </a>

    <ul class="nav navbar-nav d-md-down-none">
        <li class="nav-item px-3">
            <a class="nav-link" href="{{ route('frontend.index') }}"><i class="icon-home"></i></a>
        </li>

        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Projects</a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="{{ route('frontend.opportunity.project.public.active') }}">Active Listings</a>
                <a class="dropdown-item" href="{{ route('frontend.opportunity.project.public.completed') }}">Past Listings</a>
            </div>
        </li>

        <li class="nav-item px-3">
            <a class="nav-link" href="{{ route('frontend.opportunity.internship.public.active') }}">Internships</a>
        </li>

        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Submit an Opportunity</a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="{{ route('frontend.opportunity.project.public.create') }}">Submit Project</a>
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
</header>
