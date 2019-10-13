<!DOCTYPE html>
@langrtl
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
@else
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
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
    {{ style(mix('css/frontend.css')) }}

    @stack('after-styles')
</head>

<body class="{{ config('backend.body_classes') }}">
    @include('frontend.includes.coreui.header')

    <div class="app-body">
        <div class="container-fluid">
            <div class="animated fadeIn">
                <div class="content-header">
                    @yield('page-header')
                </div><!--content-header-->
                @yield('content')
            </div><!--animated-->
        </div><!--container-fluid-->
    </div><!--app-body-->

    @include('frontend.includes.coreui.footer')

    <!-- Scripts -->
    @stack('before-scripts')
    {!! script(mix('js/manifest.js')) !!}
    {!! script(mix('js/vendor.js')) !!}
    {!! script(mix('js/frontend.js')) !!}
    @stack('scripts')
    @stack('after-scripts')

</body>
</html>
