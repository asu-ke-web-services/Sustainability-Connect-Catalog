<nav class="navbar navbar-ws">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target="#ws-navbar-collapse-1" style="display: inline-block;">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="https://sustainability.asu.edu">Julie Ann Wrigley Global Institute of
                Sustainability</a>
        </div>
        <div id="ws-navbar-collapse-1" class="collapse navbar-collapse">
            <ul id="menu-header-menu-gios-simple" class="nav navbar-nav">
                <li class="menu_item active">
                    <a href="{{ config('app.sc_base_url') }}" title="Home" id="home-icon-main-nav">
                        <span class="fa fa-home hidden-xs hidden-sm" aria-hidden="true"></span>
                        <span class="hidden-md hidden-lg">Home</span>
                    </a>
                </li>
                <li class="menu-item menu-item-has-children dropdown">
                    <a title="Projects" href="/project" data-toggle="dropdown" class="menu-item" aria-haspopup="true">Projects <span class="caret"></span></a>
                    <ul role="menu" class=" dropdown-menu">
                        <li class="menu-item">
                            <a
                                title="Active Listings" href="/project"
                                class="menu-item">Active Listings</a>
                        </li>

                        <li role="separator" class="divider"></li>

                        <li class="menu-item">
                            <a
                                title="Past Listings" href="/project/completed"
                                class="menu-item">Past Listings</a>
                        </li>

                        <li role="separator" class="divider"></li>

                        <li class="menu-item">
                            <a
                                title="Culminating Experience" href="/project/completed?search=culminating"
                                class="menu-item">Culminating Experience</a>
                        </li>

                        <li class="menu-item">
                            <a
                                title="MSL Capstone" href="/project/completed?search=msl"
                                class="menu-item">MSL Capstone</a>
                        </li>

                        <li class="menu-item">
                            <a
                                title="MSUS Listings" href="/project/completed?search=msus"
                                class="menu-item">MSUS Listings</a>
                        </li>

                        <li class="menu-item">
                            <a
                                title="MSUS Listings" href="/project/completed?search=practicum"
                                class="menu-item">Practicum Listings</a>
                        </li>

                        <li class="menu-item">
                            <a
                                title="MSUS Listings" href="/project/completed?search=research"
                                class="menu-item">Research Listings</a>
                        </li>

                    </ul>
                </li>
                <li class="menu-item">
                    <a title="Internships" href="/internship" class="menu-item">Internships</a>
                </li>
                <li class="menu-item">
                    <a title="Workshops" href="/project/completed?search=workshop" class="menu-item">Workshops</a>
                </li>
                <li class="menu-item menu-item-has-children dropdown">
                    <a title="Submit an Opportunity" href="#" data-toggle="dropdown" class="menu-item" aria-haspopup="true">Submit an Opportunity <span class="caret"></span></a>
                    <ul role="menu" class=" dropdown-menu">
                        <li class="menu-item">
                            <a
                                title="Submit Project" href="{{ route('frontend.opportunity.project.public.create') }}"
                                class="menu-item">Submit Project</a>
                        </li>
                        {{-- <li class="menu-item">
                            <a
                                title="Submit Internship (Coming Soon)" href="#"
                                class="menu-item">Submit Internship (Coming Soon)</a>
                        </li> --}}
                    </ul>
                </li>
                <li class="menu-item">
                    <a title="Success Stories"
                        href="{{ config('app.sc_base_url') }}/news/sustainability-connect-successes/"
                        class="menu-item">Success Stories</a>
                </li>
                <li class="menu-item">
                    <a title="News" href="{{ config('app.sc_base_url') }}/news/sustainability-connect-news/"
                        class="menu-item">News</a>
                </li>
                <li class="menu-item menu-item-has-children dropdown">
                    <a title="About" href="#" data-toggle="dropdown" class="menu-item" aria-haspopup="true">About <span class="caret"></span></a>
                    <ul role="menu" class=" dropdown-menu">
                        <li class="menu-item">
                            <a
                                title="About Us" href="{{ config('app.sc_base_url') }}/about/"
                                class="menu-item">About Us</a>
                        </li>
                        <li class="menu-item">
                            <a
                                title="Contact Us" href="{{ config('app.sc_base_url') }}/about/contact-us/"
                                class="menu-item">Contact Us</a>
                        </li>
                        <li class="menu-item">
                            <a
                                title="Programs &amp; Partners"
                                href="{{ config('app.sc_base_url') }}/about/programs-partners/"
                                class="menu-item">Programs &amp;
                                Partners</a>
                        </li>
                        <li class="menu-item">
                            <a
                                title="Types of Opportunities"
                                href="{{ config('app.sc_base_url') }}/about/types-of-opportunities/"
                                class="menu-item">Types of Opportunities</a>
                        </li>
                        <li class="menu-item">
                            <a
                                title="Why Work With Us"
                                href="{{ config('app.sc_base_url') }}/about/why-work-with-us/"
                                class="menu-item">Why Work With Us</a>
                        </li>
                        <li class="menu-item"><a
                                title="Resources" href="{{ config('app.sc_base_url') }}/about/resources/"
                                class="menu-item">Resources</a>
                        </li>
                        <li class="menu-item">
                            <a title="FAQ"
                                href="{{ config('app.sc_base_url') }}/about/faq/"
                                class="menu-item">FAQ</a>
                        </li>
                    </ul>
                </li>
                @if (Auth::check())
                <li class="menu-item">
                    <a title="Dashboard" href="/" class="menu-item">Dashboard</a>
                </li>
                <li class="menu-item">
                    <a title="Sign Out" href="/logout" class="menu-item">Sign Out</a>
                </li>
                @else
                <li class="menu-item">
                    <a title="Dashboard" href="/login" class="menu-item">Dashboard</a>
                </li>
                @endif
            </ul>
        </div>
    </div><!-- /.navbar-collapse -->
</nav>
