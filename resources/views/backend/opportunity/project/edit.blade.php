@extends ('backend.layouts.app')

@section ('title', __('Project') . ' Management | Edit ' . __('Project'))

@section('content')
{{ html()->form('POST', route('admin.opportunity.project.store'))->class('form-horizontal')->open() }}

@include('backend.opportunity.project.includes.fields')

{{ html()->form()->close() }}
@endsection
