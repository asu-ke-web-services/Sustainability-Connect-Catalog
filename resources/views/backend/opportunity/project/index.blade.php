@extends ('backend.layouts.app')

@section ('title', app_name() . ' | '. __('Project Management'))

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    {{ __('Project Management') }}
                </h4>
            </div><!--col-->

            <div class="col-sm-7 pull-right">
                @include('backend.opportunity.project.includes.header-buttons')
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>{{ __('Project') }}</th>
                            <th>{{ __('Status') }}</th>
                            <th>{{ __('Location') }}</th>
                            <th>{{ __('Start Date') }}</th>
                            <th>{{ __('Apply By') }}</th>
                            <th>{{ __('Actions') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($projects as $project)
                            <tr>
                                <td>{{ ucwords($project->name) }}</td>
                                <td>{{ ucwords($project->status->name) }}</td>
                                <td>
                                    @if ($project->addresses->count())
                                        @foreach ($project->addresses as $address)
                                            {{ ucwords($address->city) }}
                                        @endforeach
                                    @else
                                        {{ __('None') }}
                                    @endif
                                </td>
                                <td>{{ $project->start_date }}</td>
                                <td>{{ $project->application_deadline }}</td>
                                <td>{!! $project->opportunityable->action_buttons !!}</td>
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
                                <td>{{ ucwords($project->status->name) }}</td>
                    {!! $projects->total() !!} {{ str_plural('project', $projects->total()) . ' total' }}
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
