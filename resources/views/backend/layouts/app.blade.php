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

    <!-- Icons-->
    <link href="/vendors/@coreui/icons/css/coreui-icons.min.css" rel="stylesheet">
    <link href="/vendors/flag-icon-css/css/flag-icon.min.css" rel="stylesheet">
    <link href="/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="/vendors/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">
    <link href="/vendors/selectize-bootstrap4-theme/css/selectize.bootstrap4.css" rel="stylesheet">

    {{-- See https://laravel.com/docs/5.5/blade#stacks for usage --}}
    @stack('before-styles')

    <!-- Check if the language is set to RTL, so apply the RTL layouts -->
    <!-- Otherwise apply the normal LTR layouts -->
    {{-- {{ style(mix('css/backend.css')) }} --}}

    <!-- Main styles for this application-->
    <link href="/css/coreui/style.css" rel="stylesheet">
    <link href="/vendors/pace-progress/css/pace.min.css" rel="stylesheet">

    @stack('after-styles')
</head>

<body class="{{ config('backend.body_classes') }}">
    @include('backend.includes.header')

    <div class="app-body">
        @include('backend.includes.sidebar')

        <main class="main">
            @include('includes.partials.logged-in-as')
            {!! Breadcrumbs::render() !!}

            <div class="container-fluid">
                <div class="animated fadeIn">
                    <div class="content-header">
                        @yield('page-header')
                    </div><!--content-header-->

                    @include('includes.partials.messages')
                    @yield('content')
                </div><!--animated-->
            </div><!--container-fluid-->
        </main><!--main-->

        @include('backend.includes.aside')
    </div><!--app-body-->

    @include('backend.includes.footer')

    <!-- Scripts -->
    @stack('before-scripts')

    <script src="/vendors/jquery/js/jquery.min.js"></script>
    <script src="/vendors/popper.js/js/popper.min.js"></script>
    <script src="/vendors/bootstrap/js/bootstrap.min.js"></script>
    <script src="/vendors/pace-progress/js/pace.min.js"></script>
    <script src="/vendors/perfect-scrollbar/js/perfect-scrollbar.min.js"></script>
    <script src="/vendors/@coreui/coreui-pro/js/coreui.min.js"></script>
    <script src="/vendors/selectize/js/standalone/selectize.min.js"></script>

    {!! script(mix('js/backend.js')) !!}

    @stack('after-scripts')
</body>
</html>
