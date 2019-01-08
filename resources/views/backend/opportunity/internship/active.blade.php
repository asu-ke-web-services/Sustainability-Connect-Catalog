@extends ('backend.layouts.app')

@section ('title', __('labels.backend.opportunity.internships.management') . ' | ' . __('labels.backend.opportunity.internships.active'))

@section('breadcrumb-links')
    @include('backend.opportunity.internship.includes.breadcrumb-links')
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    {{ __('labels.backend.opportunity.internships.management') }}
                    <small class="text-muted">{{ __('labels.backend.opportunity.internships.active') }}</small>
                </h4>
            </div><!--col-->
            {{-- <div class="col-sm-5">
                {{ html()->form('GET', route('admin.opportunity.project.index'))->open() }}
                @component('backend.includes.components.form.search', [
                    'name'        => 'search',
                    'placeholder' => 'Search',
                    'object'      => $searchRequest ?? null,
                ])@endcomponent
                {{ html()->form()->close() }}
            </div> --}}
        </div><!--row-->

        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>{{ __('labels.backend.opportunity.internships.table.name') }}</th>
                            <th>{{ __('labels.backend.opportunity.internships.table.status') }}</th>
                            <th>{{ __('labels.backend.opportunity.internships.table.location') }}</th>
                            <th>{{ __('labels.backend.opportunity.internships.table.opportunity_start_at') }}</th>
                            <th>{{ __('labels.backend.opportunity.internships.table.application_deadline_at') }}</th>
                            <th>{{ __('labels.general.actions') }}</th>
                        </tr>
                        </thead>
                        <tbody>
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
                                <td>{{ null !== $internship->opportunity_start_at ? $internship->opportunity_start_at->toFormattedDateString() : null }}</td>
                                <td>{{
                                     null != $internship->application_deadline_text
                                        ? $internship->application_deadline_text
                                        : (null !== $internship->application_deadline_at ? $internship->application_deadline_at->toFormattedDateString() : null)
                                }}</td>
                                <td>{!! $internship->action_buttons !!}</td>
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
