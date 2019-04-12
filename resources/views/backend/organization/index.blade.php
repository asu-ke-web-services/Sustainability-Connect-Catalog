@extends ('backend.layouts.app')

@section ('title', app_name() . ' | '. __('labels.backend.organization.management') . ' | ' . __('labels.backend.organization.all'))

@section('breadcrumb-links')
    @include('backend.organization.includes.breadcrumb-links')
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    {{ __('labels.backend.organization.management') }}
                    <small class="text-muted">{{ __('labels.backend.organization.all') }}</small>
                </h4>
            </div><!--col-->
            <div class="col-sm-5">
                {{ html()->form('GET', route('admin.organization.index'))->open() }}
                @component('backend.includes.components.form.search', [
                    'name'        => 'search',
                    'placeholder' => 'Search',
                    'object'      => $searchRequest ?? null,
                ])@endcomponent
                {{ html()->form()->close() }}
            </div>
            <div class="col-sm-2 pull-right">
                @include('backend.organization.includes.header-buttons-add')
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>{{ __('labels.backend.organization.table.name') }}</th>
                            <th>{{ __('labels.backend.organization.table.status') }}</th>
                            <th>{{ __('labels.backend.organization.table.type') }}</th>
                            <th>{{ __('labels.backend.organization.table.last_updated') }}</th>
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
                            <tr><td colspan="9"><p class="text-center">{{ __('strings.backend.organization.no_deleted') }}</p></td></tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div><!--col-->
        </div><!--row-->
        <div class="row">
            <div class="col-7">
                <div class="float-left">
                    {!! $organizations->total() !!} {{ str_plural('organization', $organizations->total()) . ' total' }}
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
