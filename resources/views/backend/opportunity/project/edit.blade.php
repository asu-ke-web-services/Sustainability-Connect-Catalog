@extends ('backend.layouts.app')

@section ('title', __('labels.backend.opportunity.projects.management') . ' | ' . __('labels.backend.opportunity.projects.edit'))

@section('content')
{{ html()->modelForm($project, 'PATCH', route('admin.opportunity.project.update', $project))->class('form-horizontal')->open() }}

@include('backend.opportunity.project.includes.fields')

{{ html()->closeModelForm() }}
@endsection
