@extends ('backend.layouts.app')

@section ('title', app_name() . ' | '. __('labels.backend.opportunity.internships.management'))

@section('breadcrumb-links')
    @include('backend.opportunity.internship.includes.breadcrumb-links')
@endsection

@push('after-scripts')
    <script>
        $('.datatable').DataTable({
            "order": [[ 5, "{{ $defaultSort }}" ]],
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
                    {{ __('labels.backend.opportunity.internships.review') }}
                </h4>
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4">
            <div class="col">
                <table class="table table-striped table-bordered datatable">
                    <thead>
                    <tr>
                        <th>{{ __('labels.backend.opportunity.internships.table.name') }}</th>
                        <th>{{ __('labels.backend.opportunity.internships.table.status') }}</th>
                        <th>{{ __('labels.backend.opportunity.internships.table.location') }}</th>
                        <th>{{ __('labels.backend.opportunity.internships.table.opportunity_start_at') }}</th>
                        <th>{{ __('labels.backend.opportunity.internships.table.application_deadline_at') }}</th>
                        <th>{{ __('Created') }}</th>
                        <th>{{ __('labels.general.actions') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if ($internships->count())
                        @foreach ($internships as $internship)
                        <tr>
                            <td>{{ ucwords($internship->name) }}</td>
                            <td>{{ ucwords($internship->status->name) }}</td>
                            <td>
                                @if ($internship->addresses->count())
                                    @foreach ($internship->addresses as $address)
                                        {{ ucwords($address->city) }}
                                    @endforeach
                                @else
                                    {{ __('labels.general.none') }}
                                @endif
                            </td>
                            <td>{{ null !== $internship->opportunity_start_at ? $internship->opportunity_start_at->toDateString() : null }}</td>
                            <td>{{
                                 null != $internship->application_deadline_text
                                    ? $internship->application_deadline_text
                                    : (null !== $internship->application_deadline_at ? $internship->application_deadline_at->toDateString() : null)
                            }}</td>
                            <td>{{ null !== $internship->created_at ? $internship->created_at->toDateString() : null }}</td>
                            <td>{!! $internship->action_buttons !!}</td>
                        </tr>
                        @endforeach
                    @else
                        <tr><td colspan="9"><p class="text-center">No Listing Reviews To Display</p></td></tr>
                    @endif
                    </tbody>
                </table>
            </div><!--col-->
        </div><!--row-->
        <div class="row">
            <div class="col-7">
                <div class="float-left">
                    {!! $internships->total() !!} {{ trans_choice('labels.backend.opportunity.internships.table.total', $internships->total()) }}
                </div>
            </div><!--col-->

            <div class="col-5">
                <div class="float-right">
                    {!! $internships->render() !!}
                </div>
            </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->
</div><!--card-->
@endsection
