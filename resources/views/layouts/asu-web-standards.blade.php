<!DOCTYPE html>
<html lang="en">
    <head>
        @component('components.head')
            @slot('title')
                {!! $pageTitle !!}
            @endslot
        @endcomponent
    </head>
    <body class="home page page-template page-template-page-full-width page-template-page-full-width-php logged-in admin-bar  customize-support">
        <a href="#skippy" class="sr-only">Skip to Content</a>
        @unless (config('app.debug'))
            @component('components.asu.asu-gtm')
                @slot('gtm-id')
                    {!! $googleTagManagerId !!}
                @endslot
            @endcomponent
        @endunless
        <div id="page-wrapper">
            <div id="page">
                @include('partials.asu.asu_global_header')
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
                            @include('partials.navbar_menu')
                        </div>
                    </div><!-- /.navbar-collapse -->
                </nav>
                <!-- End Navigation -->

                <span id="skippy" class="sr-only"></span>

                <div id="main-wrapper" class="clearfix">
                    <div class="clearfix">
                        <div id="content" class="site-content">
                            <main id="main" class="site-main">
                                <div class="column">
                                    <div class="region region-content">
                                        <div class="block block-system">
                                            <div class="content">
                                                <div class="panel-display clearfix">
                                                    <section class="hero-slim theme-color-background">
                                                        <div class="container">
                                                            <div class="row">
                                                                <div class="fdt-home-container fdt-home-column-content clearfix panel-panel row-fluid container">
                                                                    <div class="fdt-home-column-content-region fdt-home-row panel-panel span12">
                                                                        <div class="panel-pane pane-fieldable-panels-pane pane-fpid-12 pane-bundle-text">
                                                                            <h1 class="pane-title">{!! $pageTitle !!}</h1>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </section>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="widecolumn">
                                    <div class="asu-breadcrumbs"><div class="container"><div class="row"><div class="col-md-12">
                                        <div id="breadcrumbs" class="breadcrumb">
                                            <span itemscope="" itemtype="https://data-vocabulary.org/Breadcrumb">
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
        @include('partials.asu.asu_footer')
    </body>
    @section('javascript')
    @show
</html>
