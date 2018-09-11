@extends ('backend.layouts.app')

@section ('title', __('labels.backend.opportunity.projects.management') . ' | ' . __('labels.backend.opportunity.projects.deleted'))

@section('breadcrumb-links')
    @include('backend.auth.user.includes.breadcrumb-links')
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    {{ __('labels.backend.opportunity.projects.management') }}
                    <small class="text-muted">{{ __('labels.backend.opportunity.projects.deleted') }}</small>
                </h4>
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>{{ __('labels.backend.opportunity.projects.table.last_name') }}</th>
                            <th>{{ __('labels.backend.opportunity.projects.table.first_name') }}</th>
                            <th>{{ __('labels.backend.opportunity.projects.table.email') }}</th>
                            <th>{{ __('labels.backend.opportunity.projects.table.confirmed') }}</th>
                            <th>{{ __('labels.backend.opportunity.projects.table.roles') }}</th>
                            <th>{{ __('labels.backend.opportunity.projects.table.other_permissions') }}</th>
                            <th>{{ __('labels.backend.opportunity.projects.table.social') }}</th>
                            <th>{{ __('labels.backend.opportunity.projects.table.last_updated') }}</th>
                            <th>{{ __('labels.general.actions') }}</th>
                        </tr>
                        </thead>
                        <tbody>

                        @if ($projects->count())
                            @foreach ($projects as $project)
                                <tr>
                                    <td>{{ $project->last_name }}</td>
                                    <td>{{ $project->first_name }}</td>
                                    <td>{{ $project->email }}</td>
                                    <td>{!! $project->confirmed_label !!}</td>
                                    <td>{!! $project->roles_label !!}</td>
                                    <td>{!! $project->permissions_label !!}</td>
                                    <td>{!! $project->social_buttons !!}</td>
                                    <td>{{ $project->updated_at->diffForHumans() }}</td>
                                    <td>{!! $project->action_buttons !!}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr><td colspan="9"><p class="text-center">{{ __('strings.backend.opportunity.projects.no_deleted') }}</p></td></tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div><!--col-->
        </div><!--row-->
        <div class="row">
            <div class="col-7">
                <div class="float-left">
                    {!! $projects->total() !!} {{ trans_choice('labels.backend.opportunity.projects.table.total', $projects->total()) }}
                </div>
            </div><!--col-->

            <div class="col-5">
                <div class="float-right">
                    {!! $projects->render() !!}
                </div>
            </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->
</div><!--card-->
@endsection
