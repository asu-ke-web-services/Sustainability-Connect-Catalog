<div class="box">
    <div class="box-body no-padding">
        <table class="table table-striped">
            <tr>
                <th>@lang('labels.frontend.user.profile.avatar')</th>
                <td><img src="{{ $logged_in_user->picture }}" class="user-profile-image" /></td>
            </tr>
            <tr>
                <th>@lang('labels.frontend.user.profile.name')</th>
                <td>{{ $logged_in_user->name }}</td>
            </tr>
            <tr>
                <th>@lang('labels.frontend.user.profile.email')</th>
                <td>{{ $logged_in_user->email }}</td>
            </tr>

            @include('frontend.user.account.tabs.'.$logged_in_user->userType->slug)

            <tr>
                <th>Degree Program</th>
                <td>{{ $logged_in_user->degree_program }}</td>
            </tr>

            <tr>
                <th>Graduation Date</th>
                <td>{{ $logged_in_user->graduation_date }}</td>
            </tr>

            <tr>
                <th>Phone</th>
                <td>{{ $logged_in_user->phone }}</td>
            </tr>

            <tr>
                <th>Research Interests</th>
                <td>{{ $logged_in_user->research_interests }}</td>
            </tr>

            <tr>
                <th>Department</th>
                <td>{{ $logged_in_user->department }}</td>
            </tr>

            <tr>
                <th>@lang('labels.frontend.user.profile.created_at')</th>
                <td>{{ timezone()->convertToLocal($logged_in_user->created_at) }} ({{ $logged_in_user->created_at->diffForHumans() }})</td>
            </tr>
            <tr>
                <th>@lang('labels.frontend.user.profile.last_updated')</th>
                <td>{{ timezone()->convertToLocal($logged_in_user->updated_at) }} ({{ $logged_in_user->updated_at->diffForHumans() }})</td>
            </tr>
        </table>
    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->
