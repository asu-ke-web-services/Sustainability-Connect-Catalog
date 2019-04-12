<div class="col">
    <div class="table-responsive">
        <table class="table table-hover">
            <tr>
                <th>{{ __('labels.backend.access.users.tabs.content.faculty.department') }}</th>
                <td>{{ $user->department }}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.access.users.tabs.content.faculty.phone') }}</th>
                <td>{{ $user->phone }}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.access.users.tabs.content.faculty.research_interests') }}</th>
                <td>{{ $user->research_interests }}</td>
            </tr>

        </table>
    </div>
</div><!--table-responsive-->
