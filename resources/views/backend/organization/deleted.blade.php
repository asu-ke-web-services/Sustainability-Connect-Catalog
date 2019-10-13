@extends ('backend.layouts.app')

@section ('title', __('labels.backend.organization.management') . ' | ' . __('labels.backend.organization.deleted'))

@section('breadcrumb-links')
    @include('backend.organization.includes.breadcrumb-links')
@endsection

@push('after-styles')
    <link href="/vendors/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
@endpush

@push('after-scripts')
    <script src="/vendors/datatables.net/js/jquery.dataTables.js"></script>
    <script src="/vendors/datatables.net-bs4/js/dataTables.bootstrap4.js"></script>
    <script>
        $('.datatable').DataTable({
            "order": [[ 0, "asc" ]],
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
                    @lang('labels.backend.organization.management')
                    <small class="text-muted">@lang('labels.backend.organization.deleted')</small>
                </h4>
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4">
            <div class="col">
                <table class="table table-striped table-bordered datatable">
                    <thead>
                    <tr>
                        <th>@lang('labels.backend.organization.table.name')</th>
                        <th>@lang('labels.backend.organization.table.status')</th>
                        <th>@lang('labels.backend.organization.table.type')</th>
                        <th>@lang('labels.backend.organization.table.last_updated')</th>
                        <th>@lang('labels.general.actions')</th>
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
                        <tr><td colspan="9"><p class="text-center">@lang('strings.backend.organization.no_deleted')</p></td></tr>
                    @endif
                    </tbody>
                </table>
            </div><!--col-->
        </div><!--row-->
        <div class="row">
            <div class="col-7">
                <div class="float-left">
                    {!! $organizations->total() !!} {{ trans_choice('labels.backend.organization.table.total', $organizations->total()) }}
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
