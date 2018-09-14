@extends('layouts.basic_search')

@section('content')
    <noscript>
    You need to enable JavaScript to run this app.
    </noscript>

    <div id="search"></div>
@endsection


@section('css')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- <link rel="stylesheet" href="https://static.sustainability.asu.edu/asu-theme/asu-web-standards/css/bootstrap-asu.min.css"> -->
    <!-- <link rel="stylesheet" href="https://static.sustainability.asu.edu/asu-theme/asu-header/css/asu-nav.css"> -->
    <!-- <link href="asu_style.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/instantsearch.css@7.0.0/themes/algolia.css">
    {{-- <link rel="stylesheet" href="{{mix('css/app.css')}}"> --}}
    {{-- <link rel="stylesheet" href="{{mix('css/layout.css')}}"> --}}
@endsection


@section('scripts')
<!-- Scripts -->
@parent
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/patternfly/3.24.0/js/patternfly.min.js"></script>
@endsection


@section('javascript')
    <script src="{{mix('js/search.js')}}" ></script>
@endsection
