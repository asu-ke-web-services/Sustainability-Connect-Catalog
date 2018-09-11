@extends ('backend.layouts.app')

@section ('title', __('labels.backend.organizations.management') . ' | ' . __('labels.backend.organizations.deleted'))

@section('breadcrumb-links')
    @include('backend.auth.user.includes.breadcrumb-links')
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    {{ __('labels.backend.organizations.management') }}
                    <small class="text-muted">{{ __('labels.backend.organizations.deleted') }}</small>
                </h4>
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>{{ __('labels.backend.organizations.table.name') }}</th>
                            <th>{{ __('labels.backend.organizations.table.status') }}</th>
                            <th>{{ __('labels.backend.organizations.table.type') }}</th>
                            <th>{{ __('labels.backend.organizations.table.last_updated') }}</th>
                            <th>{{ __('labels.general.actions') }}</th>
                        </tr>
                        </thead>
                        <tbody>

                        @if ($organizations->count())
                            @foreach ($organizations as $organization)
                                <tr>
                                    <td>{{ $organization->name }}</td>
                                    <td>{{ $organization->status->name }}</td>
                                    <td>{{ $organization->type->name }}</td>
                                    <td>{{ $organization->updated_at->diffForHumans() }}</td>
                                    <td>{!! $organization->action_buttons !!}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr><td colspan="9"><p class="text-center">{{ __('strings.backend.organizations.no_deleted') }}</p></td></tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div><!--col-->
        </div><!--row-->
        <div class="row">
            <div class="col-7">
                <div class="float-left">
                    {!! $organizations->total() !!} {{ trans_choice('labels.backend.organizations.table.total', $organizations->total()) }}
                </div>
            </div><!--col-->

            <div class="col-5">
                <div class="float-right">
                    {!! $organizations->render() !!}
                </div>
            </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->
</div><!--card-->
@endsection
