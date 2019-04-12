<div class="col">
    <div class="table-responsive">
        <table class="table table-hover">
            <tr>
                <th>{{ __('labels.backend.access.users.tabs.content.student.student_degree_level') }}</th>
                <td>{{ $user->studentDegreelevel->name ?? null }}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.access.users.tabs.content.student.degree_program') }}</th>
                <td>{{ $user->degree_program }}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.access.users.tabs.content.student.graduation_date') }}</th>
                <td>{{ $user->graduation_date }}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.access.users.tabs.content.student.phone') }}</th>
                <td>{{ $user->phone }}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.access.users.tabs.content.student.research_interests') }}</th>
                <td>{{ $user->research_interests }}</td>
            </tr>

        </table>
    </div>
</div><!--table-responsive-->
