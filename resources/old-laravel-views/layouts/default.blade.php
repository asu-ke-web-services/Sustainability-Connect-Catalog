<!DOCTYPE html>
<html lang="en">
    <head>
        @include('partials.head')
    </head>
    <body class="home page page-template page-template-page-full-width page-template-page-full-width-php logged-in admin-bar  customize-support">
        <a href="#skippy" class="sr-only">Skip to Content</a>
        @unless (config('app.debug'))
            <!-- Google Tag Manager ASU Universal -->
            <noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-KDWN8Z"
            height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
            <script>(function(w,d,s,l,i) {w[l]=w[l]||[];w[l].push({'gtm.start':
            new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            '//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
            })(window,document,'script','SI_dataLayer','GTM-KDWN8Z');</script>
            <!-- End Google Tag Manager ASU Universal -->
        @endunless
        <div id="page-wrapper">
            <div id="page">
                <div id="asu_header">
                    @include('partials.header-asu')

                    <div id="site-name-desktop" class="section site-name-desktop">
                        <div class="container">
                            <div class="site-title" id="asu_school_name">
                                <span class="first-word"><a href="https://sustainability.asu.edu" id="org-link-site-title">Global Sustainability</a></span>&nbsp;|&nbsp;<a href="/" id="blog-name-site-title">Sustainability Connect</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /#asu_header -->

                <!-- Global Navigation -->
                <nav class="navbar navbar-ws">
                    <div class="container">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#ws-navbar-collapse-1">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="/">Sustainability Connect</a>
                        </div>
                        <div id="ws-navbar-collapse-1" class="navbar navbar-pf-vertical collapse navbar-collapse">
                            @include('partials.navbar-menu')
                            @if (false)
                                @include('partials.notifications-drawer')
                            @endif
                        </div>
                    </div><!-- /.navbar-collapse -->
                </nav>
                <!-- End Navigation -->

                <span id="skippy" class="sr-only"></span>

                <div id="main-wrapper" class="clearfix">
                    <div class="clearfix">
                        <div id="content" class="site-content">
                            <main id="main" class="site-main">
                                @include('partials.hero-block')
                                <div class="widecolumn">
                                    <div class="asu-breadcrumbs"><div class="container"><div class="row"><div class="col-md-12">
                                        <div id="breadcrumbs" class="breadcrumb">
                                            <span itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
                                                <span itemprop="title">
                                                    <!-- TODO: Breadcrumbs -->
                                                </span>
                                            </span>
                                        </div>
                                    </div></div></div></div>
                                </div>

                                <div class="container pad-bot-md pad-top-sm">

                                    <!-- TODO: Flash alerts -->
                                    @yield('content')

                                </div><!-- .entry-content -->
                            </main><!-- #main -->
                        </div><!-- #content -->
                    </div><!-- .clearfix -->
                </div><!-- #main-wrapper -->
            </div><!-- #page -->
        </div><!-- #page-wrapper -->
        @include('partials.footer-asu')
        <!-- TODO: scriptBottom -->
    </body>
</html>
