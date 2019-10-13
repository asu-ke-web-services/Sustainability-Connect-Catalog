
            <tr>
                <th>@lang('labels.frontend.user.profile.professional.organization')</th>
                <td>{{ $logged_in_user->organization->name ?? null }}</td>
            </tr>

            <tr>
                <th>@lang('labels.frontend.user.profile.professional.phone')</th>
                <td>{{ $logged_in_user->phone }}</td>
            </tr>
