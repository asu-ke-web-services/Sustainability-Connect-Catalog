@extends ('backend.layouts.app')

@section ('title', app_name() . ' | '. __('labels.backend.opportunity.projects.management') . ' | ' . __('labels.backend.opportunity.projects.expired'))

@section('breadcrumb-links')
    @include('backend.opportunity.project.includes.breadcrumb-links')
@endsection

@push('after-scripts')
    <script>
        $('.datatable').DataTable({
            "order": [[ 4, "{{ $defaultSort }}" ]],
            "lengthMenu": [[25, 50, -1], [25, 50, "All"]]
        });
        $('.datatable').attr('style', 'border-collapse: collapse !important');
    </script>
@endpush

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    {{ __('labels.backend.opportunity.projects.management') }}
                    <small class="text-muted">{{ __('labels.backend.opportunity.projects.expired') }}</small>
                </h4>
            </div><!--col-->
            <div class="col-sm-7 pull-right">
                @include('backend.opportunity.project.includes.header-buttons-add')
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4">
            <div class="col">
                <table class="table table-striped table-bordered datatable">
                    <thead>
                    <tr>
                        <th>{{ __('labels.backend.opportunity.projects.table.name') }}</th>
                        <th>{{ __('labels.backend.opportunity.projects.table.status') }}</th>
                        <th>{{ __('labels.backend.opportunity.projects.table.location') }}</th>
                        <th>{{ __('labels.backend.opportunity.projects.table.opportunity_start_at') }}</th>
                        <th>{{ __('labels.backend.opportunity.projects.table.listing_end_at') }}</th>
                        <th>{{ __('Created') }}</th>
                        <th>{{ __('labels.general.actions') }}</th>
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
                                    {{ __('labels.general.none') }}
                                @endif
                            </td>
                            <td>{{ null !== $project->opportunity_start_at ? $project->opportunity_start_at->toFormattedDateString() : null }}</td>
                            <td>{{ null !== $project->listing_end_at ? $project->listing_end_at->toFormattedDateString() : null }}</td>
                            <td>{{ null !== $project->created_at ? $project->created_at->toFormattedDateString() : null }}</td>
                            <td>{!! $project->action_buttons !!}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
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
