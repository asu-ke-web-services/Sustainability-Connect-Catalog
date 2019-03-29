@extends('frontend.layouts.asu')

@section('content')
    <noscript>
    You need to enable JavaScript to run this app.
    </noscript>
    <div class="container-fluid">
    	<div id="search"></div>
    </div>
@endsection

@push('scripts')
    <script src="{{mix('/js/manifest.js')}}" ></script>
    <script src="{{mix('js/vendor.js')}}" ></script>
    <script src="{{mix('js/searchProject.js')}}" ></script>
@endpush
