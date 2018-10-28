<!DOCTYPE html>
@langrtl
    <html lang="{{ app()->getLocale() }}" dir="rtl">
@else
    <html lang="{{ app()->getLocale() }}">
@endlangrtl
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title', app_name())</title>
        <meta name="description" content="@yield('meta_description', 'Sustainability Connect Catalog')">
        <meta name="author" content="@yield('meta_author', 'Julie Ann Wrigley Global Institute of Sustainability')">
        @yield('meta')

        {{-- See https://laravel.com/docs/5.5/blade#stacks for usage --}}
        @stack('before-styles')

        <!-- Check if the language is set to RTL, so apply the RTL layouts -->
        <!-- Otherwise apply the normal LTR layouts -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto+Mono:300" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="https://static.sustainability.asu.edu/asu-theme/asu-web-standards/css/bootstrap-asu.min.css">
        {{-- @include('frontend.includes.asu.heads') --}}
        <link rel="stylesheet" href="https://static.sustainability.asu.edu/asu-theme/asu-header/css/asu-nav.css">
        {{-- style(mix('css/frontend.css')) --}}

        @stack('after-styles')

        <link rel="apple-touch-icon-precomposed" sizes="57x57" href="https://static.sustainability.asu.edu/asu-theme/asu-web-standards/img/favicon/apple-touch-icon-57x57.png" />
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="https://static.sustainability.asu.edu/asu-theme/asu-web-standards/img/favicon/apple-touch-icon-114x114.png" />
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="https://static.sustainability.asu.edu/asu-theme/asu-web-standards/img/favicon/apple-touch-icon-72x72.png" />
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="https://static.sustainability.asu.edu/asu-theme/asu-web-standards/img/favicon/apple-touch-icon-144x144.png" />
        <link rel="apple-touch-icon-precomposed" sizes="60x60" href="https://static.sustainability.asu.edu/asu-theme/asu-web-standards/img/favicon/apple-touch-icon-60x60.png" />
        <link rel="apple-touch-icon-precomposed" sizes="120x120" href="https://static.sustainability.asu.edu/asu-theme/asu-web-standards/img/favicon/apple-touch-icon-120x120.png" />
        <link rel="apple-touch-icon-precomposed" sizes="76x76" href="https://static.sustainability.asu.edu/asu-theme/asu-web-standards/img/favicon/apple-touch-icon-76x76.png" />
        <link rel="apple-touch-icon-precomposed" sizes="152x152" href="https://static.sustainability.asu.edu/asu-theme/asu-web-standards/img/favicon/apple-touch-icon-152x152.png" />
        <link rel="icon" type="icon" href="https://static.sustainability.asu.edu/asu-theme/asu-web-standards/img/favicon/favicon.ico" />
        <link rel="icon" type="image/png" href="https://static.sustainability.asu.edu/asu-theme/asu-web-standards/img/favicon/favicon-196x196.png" sizes="196x196" />
        <link rel="icon" type="image/png" href="https://static.sustainability.asu.edu/asu-theme/asu-web-standards/img/favicon/favicon-96x96.png" sizes="96x96" />
        <link rel="icon" type="image/png" href="https://static.sustainability.asu.edu/asu-theme/asu-web-standards/img/favicon/favicon-32x32.png" sizes="32x32" />
        <link rel="icon" type="image/png" href="https://static.sustainability.asu.edu/asu-theme/asu-web-standards/img/favicon/favicon-16x16.png" sizes="16x16" />
        <link rel="icon" type="image/png" href="https://static.sustainability.asu.edu/asu-theme/asu-web-standards/img/favicon/favicon-128.png" sizes="128x128" />
        <meta name="msapplication-TileColor" content="#FFFFFF" />
        <meta name="msapplication-TileImage" content="https://static.sustainability.asu.edu/asu-theme/asu-web-standards/img/favicon/mstile-144x144.png" />
        <meta name="msapplication-square70x70logo" content="https://static.sustainability.asu.edu/asu-theme/asu-web-standards/img/favicon/mstile-70x70.png" />
        <meta name="msapplication-square150x150logo" content="https://static.sustainability.asu.edu/asu-theme/asu-web-standards/img/favicon/mstile-150x150.png" />
        <meta name="msapplication-wide310x150logo" content="https://static.sustainability.asu.edu/asu-theme/asu-web-standards/img/favicon/mstile-310x150.png" />
        <meta name="msapplication-square310x310logo" content="https://static.sustainability.asu.edu/asu-theme/asu-web-standards/img/favicon/mstile-310x310.png" />
    </head>
    <body>
        <a href="#skippy" class="sr-only sr-only-focusable" tabindex="0">Skip to Content</a>
        <div id="page-wrapper">
            <div id="page">
                <div id="asu_header">
                    <header class="" id="masthead">
                        <div class="container">
                            <div class="region region-header">
                                <div id="block-asu-brand-asu-brand-header" class="block block-asu-brand">
                                    <div class="content">
                                        @include('frontend.includes.asu.asu_global_header')
                                    </div>
                              </div>
                            </div>
                        </div>
                    </header>

                    <div id="site-name-desktop" class="section site-name-desktop">
                        <div class="container">
                            <div class="site-title" id="asu_school_name">
                                <span class="first-word">
                                    <a href="@yield('parent_organization_url', 'https://sustainability.asu.edu/')" id="org-link-site-title">
                                        @yield('parent_organization', 'Global Sustainability')
                                    </a>
                                </span>&nbsp;|&nbsp;
                                <a href="{{ url('/') }}" id="blog-name-site-title">{{ app_name() }}</a>
                            </div>
                        </div>
                    </div><!-- #site-name-desktop -->
                </div><!-- #asu_header -->

                <!-- Global Navigation -->
                @include('frontend.includes.nav')
                <!-- End Navigation -->

                <span id="skippy" class="sr-only"></span>
                <div id="main-wrapper" class="clearfix">
                    <div class="clearfix">
                        <div id="content" class="site-content">
                            <main id="main" class="site-main">
                                @include('includes.partials.messages')
                                @yield('content')
                            </main>
                        </div>
                    </div><!-- #main -->
                </div><!-- #main-wrapper -->
            </div><!-- #page -->
        </div><!-- #page-wrapper -->
        <div class="footer">
            @include('frontend.includes.asu.asu_big_footer')
            @include('frontend.includes.asu.asu_global_footer')
        </div><!-- /.footer -->
        <!-- End Footer -->

        <!-- Scripts -->
        @stack('before-scripts')
        @include('frontend.includes.scripts')
        @stack('after-scripts')

        @section('javascript')
        @show

    </body>
</html>
