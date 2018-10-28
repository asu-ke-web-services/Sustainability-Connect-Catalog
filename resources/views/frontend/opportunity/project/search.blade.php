@extends('frontend.layouts.asu')

@section('content')
    <noscript>
    You need to enable JavaScript to run this app.
    </noscript>
	<ul class="nav nav-tabs">
	  <li role="presentation" class="active"><a href="#open">Open Listings</a></li>
	  <li role="presentation"><a href="#past">Past Projects</a></li>
	</ul>
	<div class="tab-content clearfix">
		<div class="tab-pane active" id="open">
			<div id="search"></div>
		</div>
		<div class="tab-pane" id="past">
			<div id="search"></div>
		</div>
	</div>
@endsection

@section('javascript')
    <script src="{{mix('js/searchProject.js')}}" ></script>
@endsection
