<div class="col">
    <div class="table-responsive">
        <table class="table table-hover">
            <tr>
                <th>{{ __('labels.backend.access.users.tabs.content.staff.department') }}</th>
                <td>{{ $user->department }}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.access.users.tabs.content.staff.phone') }}</th>
                <td>{{ $user->phone }}</td>
            </tr>

        </table>
    </div>
</div><!--table-responsive-->
