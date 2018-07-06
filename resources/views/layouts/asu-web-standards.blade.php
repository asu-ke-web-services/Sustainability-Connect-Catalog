<!DOCTYPE html>
<html lang="en">
    <head>
        @component('partials.head')
            @slot('title')
                Test
            @endslot
        @endcomponent
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
                    <?php // ASU Header ?>
                    <header class="" id="masthead">
                        <div class="container">
                            <div class="region region-header">
                                <div id="block-asu-brand-asu-brand-header" class="block block-asu-brand">
                                    <div class="content">
                                        <!-- START /asuthemes/4.0-rsp-up.0/headers/default_white.shtml -->
                                        <div id="asu_hdr" class=" asu_hdr_white chrome">
                                            <div id="asu_mobile_menu" class="toggle_off">
                                                <div id="asu_nav_wrapper">
                                                    <h2 class="hidden">Sign In / Sign Out</h2>
                                                    <ul id="asu_login_module">
                                                        <li id="asu_hdr_ssi" class="end">
                                                            <a target="_top" href="https://weblogin.asu.edu/cgi-bin/login" onmouseover="this.href = ASUHeader.alterLoginHref(this.href);" onfocus="this.href = ASUHeader.alterLoginHref(this.href);" onclick="this.href = ASUHeader.alterLoginHref(this.href);">Sign In</a>
                                                        </li>
                                                    </ul>
                                                    <div id="asu_nav_menu">
                                                        <h2 class="hidden">Menu</h2>
                                                        <div id="asu_universal_nav">
                                                            <ul>
                                                                <li class="home"><a target="_top" href="http://www.asu.edu/" id="asu-home-link-asu-header">ASU Home</a></li>
                                                                <li class="myasu"><a target="_top" href="https://my.asu.edu/" id="my-asu-link-asu-header">My ASU</a></li>
                                                                <li class="parent colleges">
                                                                    <a target="_top" href="http://www.asu.edu/colleges/" id="colleges-and-schools-link-asu-header">Colleges &amp; Schools</a>
                                                                    <ul>
                                                                        <li><a class="first" href="//artsandsciences.asu.edu/" target="_top" title="Arts and Sciences website" id="arts-and-sciences-link-asu-header">Arts and Sciences</a></li>
                                                                        <li><a href="//wpcarey.asu.edu/" target="_top" title="W. P. Carey School of Business Web and Morrison School of Agribusiness website" id="business-link-asu-header">Business</a></li>
                                                                        <li><a href="//herbergerinstitute.asu.edu" target="_top" title="Herberger Institute for Design and the Arts website" id="design-and-the-arts-link-asu-header">Design and the Arts</a></li>
                                                                        <li><a href="//education.asu.edu/" target="_top" title="Mary Lou Fulton Teachers College website" id="education-link-asu-header">Education</a></li>
                                                                        <li><a href="//engineering.asu.edu/" target="_top" title="Engineering website" id="engineering-link-asu-header">Engineering</a></li>
                                                                        <li><a href="//sfis.asu.edu/" target="_top" title="Future of Innovation in Society website" id="future-of-innovation-in-society">Future of Innovation in Society</a></li>
                                                                        <li><a href="//graduate.asu.edu" target="_top" title="Graduate College website" id="graduate-link-asu-header">Graduate</a></li>
                                                                        <li><a href="https://chs.asu.edu/" target="_top" title="Health Solutions website" id="health-solutions-link-asu-header">Health Solutions</a></li>
                                                                        <li><a href="//honors.asu.edu/" target="_top" title="Barrett, The Honors College website" id="honors-link-asu-header">Honors</a></li>
                                                                        <li><a href="//cronkite.asu.edu" target="_top" title="Walter Cronkite School of Journalism and Mass Communication website" id="journalism-link-asu-header">Journalism</a></li>
                                                                        <li><a href="//www.law.asu.edu/" target="_top" title="Sandra Day O' Connor College of Law website" id="law-link-asu-header">Law</a></li>
                                                                        <li><a href="//nursingandhealth.asu.edu/" target="_top" title="College of Nursing and Health Innovation website" id="nursing-and-health-link-asu-header">Nursing and Health Innovation</a></li>
                                                                        <li><a href="//copp.asu.edu" target="_top" title="College of Public Programs website" id="public-programs-link-asu-header">Public Service and Community Solutions</a></li>
                                                                        <li><a href="//schoolofsustainability.asu.edu" target="_top" title="School of Sustainability website" id="sustainability-link-asu-header">Sustainability</a></li>
                                                                        <li><a href="//uc.asu.edu/" target="_top" title="University College website" id="university-college-link-asu-header">University College</a></li>
                                                                        <li><a target="_top" href="http://www.thunderbird.edu/" title="Thunderbird School of Global Management website" id="thunderbird-school-link-asu-header">Thunderbird School of Global Management</a></li>
                                                                    </ul>
                                                                </li>
                                                                <li class="parent map">
                                                                    <a target="_top" href="http://www.asu.edu/map/" id="map-and-locations-link-asu-header">Map &amp; Locations</a>
                                                                    <ul>
                                                                        <li><a target="_top" class="border first" href="http://www.asu.edu/map/" id="map-link-asu-header">Map</a></li>
                                                                        <li><a target="_top" href="//campus.asu.edu/tempe/" title="Tempe campus" id="tempe-link-asu-header">Tempe</a></li>
                                                                        <li><a target="_top" href="//campus.asu.edu/west/" title="West campus" id="west-link-asu-header">West</a></li>
                                                                        <li><a target="_top" href="//campus.asu.edu/polytechnic/" title="Polytechnic campus" id="polytechnic-link-asu-header">Polytechnic</a></li>
                                                                        <li><a target="_top" href="//campus.asu.edu/downtown/" title="Downtown Phoenix campus" id="downtown-phoenix-link-asu-header">Downtown Phoenix</a></li>
                                                                        <li><a target="_top" href="//asuonline.asu.edu/" title="Online and Extended campus" id="online-and-extended-link-asu-header">Online and Extended</a></li>
                                                                        <li><a target="_top" class="border" href="//havasu.asu.edu/" id="lake-havasu-link-asu-header">Lake Havasu</a></li>
                                                                        <li><a target="_top" href="//skysong.asu.edu/" id="skysong-link-asu-header">Skysong</a></li>
                                                                        <li><a target="_top" href="//asuresearchpark.com/" id="research-park-link-asu-header">Research Park</a></li>
                                                                        <li><a target="_top" href="//washingtoncenter.asu.edu/" id="washington-dc-link-asu-header">Washington D.C.</a></li>
                                                                        <li><a target="_top" href="//wpcarey.asu.edu/mba/china-program/english/" id="china-link-asu-header">China</a></li>
                                                                    </ul>
                                                                </li>
                                                                <li class="contact"><a target="_top" href="http://www.asu.edu/contactasu/" title="Directory, Index and other info" id="directory-link-asu-header">Directory</a></li>
                                                            </ul>
                                                            <img class="asu_touch" src="//www.asu.edu/asuthemes/4.0-rsp-up.0/images/ipad_close.gif" alt="">
                                                        </div>
                                                        <!-- /#asu_universal_nav -->
                                                    </div>
                                                    <!-- /#asu_nav_menu -->
                                                </div>
                                                <!-- /#asu_nav_wrapper -->
                                                <div id="asu_search">
                                                    <h2 class="hidden">Search</h2>
                                                    <div id="asu_search_module">
                                                        <form target="_top" action="https://search.asu.edu/search" method="get" name="gs">
                                                            <label class="hidden" for="asu_search_box">Search</label>
                                                            <input name="site" value="default_collection" type="hidden">
                                                            <input type="text" name="q" size="32" placeholder="Search ASU" id="asu_search_box" class="asu_search_box" onfocus="ASUHeader.searchFocus(this)" onblur="ASUHeader.searchBlur(this)">
                                                            <input type="submit" value="Search" title="Search" class="asu_search_button">
                                                            <input name="sort" value="date:D:L:d1" type="hidden">
                                                            <input name="output" value="xml_no_dtd" type="hidden">
                                                            <input name="ie" value="UTF-8" type="hidden">
                                                            <input name="oe" value="UTF-8" type="hidden">
                                                            <input name="client" value="asu_frontend" type="hidden">
                                                            <input name="proxystylesheet" value="asu_frontend" type="hidden">
                                                        </form>
                                                    </div>
                                                    <!-- /#asu_search_module -->
                                                </div>
                                                <!-- /#asu_search -->
                                            </div>
                                            <!-- /#asu_mobile_menu -->
                                            <div id="asu_mobile_hdr">
                                                <div id="asu_logo">
                                                    <a target="_top" href="http://www.asu.edu/" title="Arizona State University" id="asu-logo-in-header">
                                                        <img src="//www.asu.edu/asuthemes/4.0-rsp-up.0/images/logos/asu_logo_white.png" alt="Arizona State University" height="32" width="203" style="margin-top:14px" title="Arizona State University">
                                                    </a>
                                                </div>
                                                <!-- /#asu_logo  -->
                                                <img src="//www.asu.edu/asuthemes/4.0-rsp-up.0/images/logos/asu_logo_white.png" height="32" width="203" id="asu_print_logo" alt="ASU Logo" />
                                                <div id="asu_mobile_button" class="asushow"><a href="javascript:toggleASU();" data-target=".navbar-collapse" data-toggle="collapse">Menu</a></div>
                                            </div>
                                            <!-- /#asu_mobile_header  -->
                                        </div>
                                        <!-- /#asu_hdr -->
                                        <div style="clear:both;"></div>
                                        <!-- END /asuthemes/4.0-rsp-up.0/headers/default_white.shtml -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </header>
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
                            <ul id="menu-main-menu" class="nav navbar-nav">
                                <li><a href="/" title="Home"  id="home-icon-main-nav"><span class="fa fa-home hidden-xs hidden-sm" aria-hidden="true"></span><span class="hidden-md hidden-lg">Home</span></a></li>
                                <li class="menu-item menu-item-type-custom menu-item-object-custom"><a title="Projects" href="/projects" id="nav-item_projects">Projects</a></li>
                                <li class="menu-item menu-item-type-custom menu-item-object-custom"><a title="Internships" href="/internships" id="nav-item_internships">Internships</a></li>
                                <li class="menu-item menu-item-type-custom menu-item-object-custom"><a title="Submit Opportunity" href="#" id="nav-item_submit-opportunity">Submit Opportunity</a></li>
                                <li class="menu-item menu-item-type-custom menu-item-object-custom" ><a title="Success Stories" href="#">Success Stories</a></li>
                                <li class="menu-item menu-item-type-custom menu-item-object-custom" ><a title="News" href="#" id="nav-item_news">News</a></li>
                                <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children dropdown"><a title="About" href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true">About <span class="caret"></span></a>
                                    <ul role="menu" class=" dropdown-menu">
                                        <li class="menu-item menu-item-type-custom menu-item-object-custom" ><a title="About Us" href="#">About Us</a></li>
                                        <li class="menu-item menu-item-type-custom menu-item-object-custom" ><a title="Contact Us" href="#">Contact Us</a></li>
                                        <li class="menu-item menu-item-type-custom menu-item-object-custom" ><a title="Programs &amp; Partners" href="#">Programs &#038; Partners</a></li>
                                        <li class="menu-item menu-item-type-custom menu-item-object-custom" ><a title="Type of Opportunities" href="#">Type of Opportunities</a></li>
                                        <li class="menu-item menu-item-type-custom menu-item-object-custom" ><a title="Why Work With Us" href="#">Why Work With Us</a></li>
                                        <li class="menu-item menu-item-type-custom menu-item-object-custom" ><a title="FAQ" href="#">FAQ</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div><!-- /.navbar-collapse -->
                </nav>
                <!-- End Navigation -->

                <span id="skippy" class="sr-only"></span>

                <div id="main-wrapper" class="clearfix">
                    <div class="clearfix">
                        <div id="content" class="site-content">
                            <main id="main" class="site-main">

                                @component('partials.hero_block')

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
        <div class="footer">
            <div class="big-foot">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-sm-12 space-bot-md">
                            <h2>Sustainability Connect</h2>
                            <address>
                                a Unit of: <br/>
                                <a href="https://sustainability.asu.edu">Julie Ann Wrigley Global Institute of Sustainability</a><br/><br/>
                            </address>
                            <p><a class="contact-link" href="/about/contact-us/" id="contact-us-link-in-footer">Contact Us</a></p>
                            <ul class="social-media">
                                <li><a href="https://www.facebook.com/asusustainabilityconnect/" title="Facebook" id="facebook-link-in-footer"><i class="fa fa-facebook-square"></i><span class="sr-only">Facebook</span></a></li>
                                <li><a href="https://twitter.com/ASUSustConnect" title="Twitter" id="twitter-link-in-footer"><i class="fa fa-twitter-square"></i><span class="sr-only">Twitter</span></a></li>
                             </ul>
                        </div>
                        <ul id="menu-footer-menu" class="menu">
                            <div class="col-md-2 col-sm-3 space-bot-md">
                                <h2 data-toggle="collapse" data-target="#menu-item-98-nav" >Browse  <span class="caret hidden-sm hidden-md hidden-lg"></span></h2>
                                <ul class='big-foot-nav collapse' id='menu-item-98-nav'>
                                    <ul class="sub-menu">
                                        <li id="menu-item-102" class="menu-item menu-item-type-post_type menu-item-object-page"><a href="/projects" id="nav-item_102_under_98">Projects</a></li>
                                        <li id="menu-item-103" class="menu-item menu-item-type-post_type menu-item-object-page"><a href="/internships" id="nav-item_103_under_98">Internships</a></li>
                                    </ul>
                                </ul>
                            </div>
                            <div class="col-md-2 col-sm-3 space-bot-md">
                                <h2 data-toggle="collapse" data-target="#menu-item-100-nav" >Get Involved  <span class="caret hidden-sm hidden-md hidden-lg"></span></h2>
                                <ul class='big-foot-nav collapse' id='menu-item-100-nav'>
                                    <ul class="sub-menu">
                                        <li id="menu-item-133" class="menu-item menu-item-type-post_type menu-item-object-page"><a href="/submit-your-idea/" id="nav-item_133_under_135">Submit Your Idea</a></li>
                                        <li id="menu-item-106" class="menu-item menu-item-type-post_type menu-item-object-page"><a href="/about/types-of-opportunities/" id="nav-item_106_under_99">Types of Opportunities</a></li>
                                        <li id="menu-item-109" class="menu-item menu-item-type-post_type menu-item-object-page"><a href="/about/faq/" id="nav-item_109_under_100">FAQ</a></li>
                                    </ul>
                                </ul>
                            </div>
                            <div class="col-md-2 col-sm-3 space-bot-md">
                                <h2 data-toggle="collapse" data-target="#menu-item-99-nav" >About  <span class="caret hidden-sm hidden-md hidden-lg"></span></h2>
                                <ul class='big-foot-nav collapse' id='menu-item-99-nav'>
                                    <ul class="sub-menu">
                                        <li id="menu-item-104" class="menu-item menu-item-type-post_type menu-item-object-page"><a href="/about/" id="nav-item_about-us_under_99">About Us</a></li>
                                        <li id="menu-item-108" class="menu-item menu-item-type-post_type menu-item-object-page"><a href="/about/contact-us/" id="nav-item_108_under_99">Contact Us</a></li>
                                        <li id="menu-item-107" class="menu-item menu-item-type-post_type menu-item-object-page"><a href="/about/programs-partners/" id="nav-item_107_under_99">Programs &#038; Partners</a></li>
                                        <li id="menu-item-105" class="menu-item menu-item-type-post_type menu-item-object-page"><a href="/about/why-work-with-us/" id="nav-item_105_under_99">Why Work With Us</a></li>
                                    </ul>
                                </ul>
                            </div>
                        </ul>
                    </div><!-- /.row -->
                </div><!-- /.container -->
                <div class="container">
                    <div class="row">
                        <div class="col-md-12"></div>
                    </div>
                </div>
            </div><!-- /.big-foot -->
            <div id="innovation-bar">
                <div class="container">
                    <div class="row">
                        <div class="col-md-10 space-top-sm space-bot-sm">
                            <a href="http://yourfuture.asu.edu/rankings" target="_blank" id="asu-is-number-1-for-innovation">ASU is #1 in the U.S. for Innovation</a>
                        </div>
                        <div class="hidden-sm hidden-xs col-md-2 innovation-footer-image-wrapper">
                            <a href="http://yourfuture.asu.edu/rankings" target="_blank" id="best-colleges-us-news-bage-icon">
                                <img src="https://static.sustainability.asu.edu/asu-theme/asu-web-standards/img/footer/best-colleges-us-news-badge.png" alt="Best Colleges U.S. News Most Innovative 2016">
                            </a>
                        </div>
                    </div>
                </div>
            </div><!-- /#innovation-bar -->
            <div class="little-foot">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="little-foot__right">
                                <ul class="little-foot-nav">
                                    <li><a href="http://www.asu.edu/copyright/" id="copyright-trademark-legal-footer">Copyright &amp; Trademark</a></li>
                                    <li><a href="http://www.asu.edu/accessibility/" id="accessibility-legal-footer">Accessibility</a></li>
                                    <li><a href="http://www.asu.edu/privacy/" id="privacy-legal-footer">Privacy</a></li>
                                    <li><a href="http://www.asu.edu/asujobs" id="jobs-legal-footer">Jobs</a></li>
                                    <li><a href="https://cfo.asu.edu/emergency" id="emergency-legal-footer">Emergency</a></li>
                                    <li><a href="https://contact.asu.edu/" id="contact-asu-legal-footer">Contact ASU</a></li>
                                </ul>
                            </div>
                        </div>
                    </div><!-- /.row -->
                </div><!-- /.container -->
            </div><!-- /.little-foot -->
        </div><!-- /.footer -->
        <!-- End Footer -->
    </body>
</html>
