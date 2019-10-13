
            <tr>
                <th>@lang('labels.frontend.user.profile.student.student_degree_level')</th>
                <td>{{ $logged_in_user->studentDegreelevel->name ?? null }}</td>
            </tr>

            <tr>
                <th>@lang('labels.frontend.user.profile.student.degree_program')</th>
                <td>{{ $logged_in_user->degree_program }}</td>
            </tr>

            <tr>
                <th>@lang('labels.frontend.user.profile.student.graduation_date')</th>
                <td>{{ $logged_in_user->graduation_date }}</td>
            </tr>

            <tr>
                <th>@lang('labels.frontend.user.profile.student.phone')</th>
                <td>{{ $logged_in_user->phone }}</td>
            </tr>

            <tr>
                <th>@lang('labels.frontend.user.profile.student.research_interests')</th>
                <td>{{ $logged_in_user->research_interests }}</td>
            </tr>
