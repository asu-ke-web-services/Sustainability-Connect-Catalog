@extends('layouts.asu-web-standards')

@section('content')
    <section class="content-header">
        <div class="pull-right">
           <a class="btn btn-primary pull-right" href="{!! route('projects.create') !!}">Add New</a>
        </div>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                @include('projects.table')
            </div>
        </div>
        <div class="text-center">

        </div>
    </div>
@endsection
