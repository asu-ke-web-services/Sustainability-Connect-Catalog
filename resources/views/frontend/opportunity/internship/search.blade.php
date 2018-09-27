@extends('frontend.layouts.search_app')

@section('content')
    <noscript>
    You need to enable JavaScript to run this app.
    </noscript>

    <div id="search"></div>
@endsection

@section('javascript')
    <script src="{{mix('js/searchInternship.js')}}" ></script>
@endsection
