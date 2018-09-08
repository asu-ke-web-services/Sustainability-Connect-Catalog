@extends ('backend.layouts.app')

@section ('title', __('labels.backend.opportunity.projects.management') . ' | ' . __('labels.backend.opportunity.projects.create'))

@section('content')
{{ html()->form('POST', route('admin.opportunity.project.store'))->class('form-horizontal')->open() }}

@include('backend.opportunity.project.includes.fields')

{{ html()->form()->close() }}
@endsection
