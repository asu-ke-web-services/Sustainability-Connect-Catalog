@extends ('frontend.layouts.asu')

@section ('title', app_name() . ' | '. __('labels.backend.opportunity.internships.management'))

@section('content')
<div class="container">
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    {{ __('labels.backend.opportunity.internships.management') }}
                </h4>
            </div><!--col-->

        </div><!--row-->

        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>{{ __('labels.backend.opportunity.internships.table.name') }}</th>
                            <th>Availability</th>
                            <th>{{ __('labels.backend.opportunity.internships.table.status') }}</th>
                            <th>{{ __('labels.backend.opportunity.internships.table.location') }}</th>
                            <th>{{ __('labels.backend.opportunity.internships.table.start_date') }}</th>
                            <th>{{ __('labels.backend.opportunity.internships.table.application_deadline') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($internships as $internship)
                            <tr>
                                <td>
                                    <a href="{{ route('frontend.internship.show', $internship) }}" data-toggle="tooltip" data-placement="top" title="'.__('buttons.general.crud.view').'">{{ ucwords($internship->name) }}</a>
                                </td>
                                <td>

                                <!-- Affiliations -->
                                @foreach($internship->affiliations as $affiliation)
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
                                <td>{{ $internship->start_date }}</td>
                                <td>{{ $internship->application_deadline }}</td>
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
</div>
@endsection
