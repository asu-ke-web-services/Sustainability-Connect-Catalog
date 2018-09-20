@extends ('backend.layouts.app')

@section ('title', __('labels.backend.opportunity.internships.management') . ' | ' . __('labels.backend.opportunity.internships.deleted'))

@section('breadcrumb-links')
    @include('backend.auth.user.includes.breadcrumb-links')
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    {{ __('labels.backend.opportunity.internships.management') }}
                    <small class="text-muted">{{ __('labels.backend.opportunity.internships.deleted') }}</small>
                </h4>
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>{{ __('labels.backend.opportunity.internships.table.last_name') }}</th>
                            <th>{{ __('labels.backend.opportunity.internships.table.first_name') }}</th>
                            <th>{{ __('labels.backend.opportunity.internships.table.email') }}</th>
                            <th>{{ __('labels.backend.opportunity.internships.table.confirmed') }}</th>
                            <th>{{ __('labels.backend.opportunity.internships.table.roles') }}</th>
                            <th>{{ __('labels.backend.opportunity.internships.table.other_permissions') }}</th>
                            <th>{{ __('labels.backend.opportunity.internships.table.social') }}</th>
                            <th>{{ __('labels.backend.opportunity.internships.table.last_updated') }}</th>
                            <th>{{ __('labels.general.actions') }}</th>
                        </tr>
                        </thead>
                        <tbody>

                        @if ($internships->count())
                            @foreach ($internships as $internship)
                                <tr>
                                    <td>{{ $internship->last_name }}</td>
                                    <td>{{ $internship->first_name }}</td>
                                    <td>{{ $internship->email }}</td>
                                    <td>{!! $internship->confirmed_label !!}</td>
                                    <td>{!! $internship->roles_label !!}</td>
                                    <td>{!! $internship->permissions_label !!}</td>
                                    <td>{!! $internship->social_buttons !!}</td>
                                    <td>{{ $internship->updated_at->diffForHumans() }}</td>
                                    <td>{!! $internship->action_buttons !!}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr><td colspan="9"><p class="text-center">{{ __('strings.backend.opportunity.internships.no_deleted') }}</p></td></tr>
                        @endif
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
