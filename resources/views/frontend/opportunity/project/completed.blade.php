@extends('frontend.layouts.asu')

@section('content')
    <noscript>
    You need to enable JavaScript to run this app.
    </noscript>
    <div class="container-fluid">
    	<div id="search"></div>
    </div>
@endsection

@section('javascript')
    <script src="{{mix('js/searchCompletedProject.js')}}" ></script>
@endsection
