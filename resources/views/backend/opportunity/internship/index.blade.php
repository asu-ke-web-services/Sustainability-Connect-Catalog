@extends ('backend.layouts.app')

@section ('title', app_name() . ' | '. __('Internship Management'))

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    {{ __('Internship Management') }}
                </h4>
            </div><!--col-->

            <div class="col-sm-7 pull-right">
                @include('backend.opportunity.internship.includes.header-buttons')
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>{{ __('Internship') }}</th>
                            <th>{{ __('Email') }}</th>
                            <th>{{ __('Associated Models') }}</th>
                            <th>{{ __('Actions') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($internships as $internship)
                            <tr>
                                <td>{{ ucwords($internship->name) }}</td>
                                <td>{{ ucwords($internship->email) }}</td>
                                <td>
                                    @if ($internship->associated_models->count())
                                        @foreach ($internship->associated_models as $associated_model)
                                            {{ ucwords($associated_model->name) }}
                                        @endforeach
                                    @else
                                        {{ __('None') }}
                                    @endif
                                </td>
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
                    {!! $internships->total() !!} {{ str_plural('internship', $internships->total()) . ' total' }}
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
