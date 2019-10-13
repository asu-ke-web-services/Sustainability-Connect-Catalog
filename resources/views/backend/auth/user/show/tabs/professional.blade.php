<div class="col">
    <div class="table-responsive">
        <table class="table table-hover">
            <tr>
                <th>@lang('labels.backend.access.users.tabs.content.professional.organization')</th>
                <td>{{ $user->organization->name ?? null }}</td>
            </tr>

            <tr>
                <th>@lang('labels.backend.access.users.tabs.content.professional.phone')</th>
                <td>{{ $user->phone }}</td>
            </tr>

        </table>
    </div>
</div><!--table-responsive-->
