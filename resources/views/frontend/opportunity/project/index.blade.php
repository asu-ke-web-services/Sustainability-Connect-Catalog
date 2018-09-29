@extends ('frontend.layouts.app')

@section ('title', app_name() . ' | '. __('labels.backend.opportunity.projects.management'))

@section('content')
<div class="container">
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    {{ __('labels.backend.opportunity.projects.management') }}
                </h4>
            </div><!--col-->

        </div><!--row-->

        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>{{ __('labels.backend.opportunity.projects.table.name') }}</th>
                            <th>Availability</th>
                            <th>{{ __('labels.backend.opportunity.projects.table.status') }}</th>
                            <th>{{ __('labels.backend.opportunity.projects.table.location') }}</th>
                            <th>{{ __('labels.backend.opportunity.projects.table.start_date') }}</th>
                            <th>{{ __('labels.backend.opportunity.projects.table.application_deadline') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($projects as $project)
                            <tr>
                                <td>
                                    <a href="{{ route('frontend.project.show', $project) }}" data-toggle="tooltip" data-placement="top" title="'.__('buttons.general.crud.view').'">{{ ucwords($project->name) }}</a>
                                </td>
                                <td>

                                <!-- Affiliations -->
                                @foreach($project->affiliations as $affiliation)
                                    <span
                                        @isset($affiliation->fa_icon)
                                            class="fa-stack"
                                        @endisset
                                        @isset($affiliation->help_text)
                                            data-toggle="tooltip"
                                            data-container="body"
                                            title=""
                                            data-original-title="{{ $affiliation->help_text }}"
                                        @endisset
                                    >
                                        @isset($affiliation->fa_icon)
                                            {!! $affiliation->fa_icon !!}
                                        @else
                                            <span class="badge badge-success">{{ ucwords($affiliation->name) }}</span>
                                        @endisset
                                    </span>
                                @endforeach
                                </td>
                                <td>{{ ucwords($project->status->name) }}</td>
                                <td>
                                    @if ($project->addresses->count())
                                        @foreach ($project->addresses as $address)
                                            {{ ucwords($address->city) }}
                                        @endforeach
                                    @else
                                        {{ __('labels.general.none') }}
                                    @endif
                                </td>
                                <td>{{ $project->start_date }}</td>
                                <td>{{ $project->application_deadline }}</td>
                            </tr>
                        @endforeach
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
<div class="container">
@endsection
