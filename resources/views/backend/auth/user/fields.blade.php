
            <div class="row mt-4 mb-4">
                <div class="col">

                    <!-- First Name -->
                    @component('backend.includes.components.form.input', [
                        'name'        => 'first_name',
                        'label'       => 'First Name',
                        'help_text'   => 'Name can be up to 255 characters long',
                        'attributes'  => [
                            'required'  => 'required',
                            'maxlength' => '255',
                            'autofocus' => 'autofocus',
                        ],
                        'object'      => $user ?? null,
                    ])@endcomponent

                    <!-- Last Name -->
                    @component('backend.includes.components.form.input', [
                        'name'        => 'last_name',
                        'label'       => 'Last Name',
                        'help_text'   => 'Name can be up to 255 characters long',
                        'attributes'  => [
                            'required' => 'required',
                            'maxlength' => '255',
                        ],
                        'object'      => $user ?? null,
                    ])@endcomponent

                    <!-- E-mail -->
                    @component('backend.includes.components.form.input', [
                        'type'       => 'email',
                        'name'       => 'email',
                        'label'      => 'E-mail Address',
                        'help_text'  => 'Email can be up to 255 characters long',
                        'attributes' => [
                            'required'  => 'required',
                            'maxlength' => '255',
                        ],
                        'object'      => $user ?? null,
                    ])@endcomponent

                    <!-- Active -->
                    @component('backend.includes.components.form.checkbox', [
                        'name'    => 'active',
                        'label'   => 'Account Active',
                        'default' => true,
                        'object'  => $user ?? null,
                    ])@endcomponent

                    <!-- Confirmed -->
                    @component('backend.includes.components.form.checkbox', [
                        'name'    => 'confirmed',
                        'label'   => 'Email Confirmed',
                        'default' => true,
                        'object'  => $user ?? null,
                    ])@endcomponent

                    @if (! config('access.users.requires_approval'))
                        <div class="form-group row">
                            {{ html()->label(__('validation.attributes.backend.access.users.send_confirmation_email') . '<br/>' . '<small>' .  __('strings.backend.access.users.if_confirmed_off') . '</small>')->class('col-md-2 form-control-label')->for('confirmation_email') }}

                            <div class="col-md-10">
                                <label class="switch switch-3d switch-primary">
                                    {{ html()->checkbox('confirmation_email', true, '1')->class('switch-input') }}
                                    <span class="switch-label"></span>
                                    <span class="switch-handle"></span>
                                </label>
                            </div><!--col-->
                        </div><!--form-group-->
                    @endif


                    <!-- Access Restrictions -->
                    @component('backend.includes.components.form.checkbox', [
                        'name'    => 'access_validated',
                        'label'   => 'Are Access Affiliations Verified?',
                        'help_text'  => 'SOS Affiliation needs to be confirmed in iSearch, then added to Affiliations field below',
                        'default' => false,
                        'object'  => $user ?? null,
                    ])@endcomponent

                    <!-- Affiliations Field -->
                    @component('backend.includes.components.form.multiselect', [
                        'name'        => 'affiliations',
                        'label'       => 'Access Affiliations',
                        'help_text' => 'Select any valid user affiliations that grant them full access to restricted listings',
                        'optionList'  => $affiliations,
                        'multivalue'  => true,
                        'object'      => $user ?? null,
                    ])@endcomponent

                    <!-- User Type -->
                    @component('backend.includes.components.form.select', [
                        'name'        => 'user_type_id',
                        'label'       => 'User Type',
                        'optionList'  => $userTypes,
                        'object'      => $user ?? null,
                    ])@endcomponent

                    <!-- Student Degree Level Type -->
                    @component('backend.includes.components.form.select', [
                        'name'        => 'student_degree_level_id',
                        'label'       => 'Student Degree Level',
                        'optionList'  => $studentDegreeLevels,
                        'object'      => $user ?? null,
                    ])@endcomponent

                    <!-- Degree Program -->
                    @component('backend.includes.components.form.textarea', [
                        'name'       => 'degree_program',
                        'label'      => 'Degree Program',
                        'help_text'  => '',
                        'attributes' => [
                            'rows' => 3,
                        ],
                        'object'      => $user ?? null,
                    ])@endcomponent

                    <!-- Graduation Date -->
                    @component('backend.includes.components.form.input', [
                        'type'        => 'date',
                        'name'        => 'graduation_date',
                        'label'       => 'Graduation Date',
                        'object'      => $user ?? null,
                    ])@endcomponent

                    <!-- Phone -->
                    @component('backend.includes.components.form.input', [
                        'name'        => 'phone',
                        'label'       => 'Phone',
                        'help_text'   => '',
                        'attributes'  => [
                            'maxlength' => '191',
                        ],
                        'object'      => $user ?? null,
                    ])@endcomponent

                    <!-- Research Interests -->
                    @component('backend.includes.components.form.textarea', [
                        'name'       => 'research_interests',
                        'label'      => 'Research Interests',
                        'help_text'  => '',
                        'attributes' => [
                            'rows' => 3,
                        ],
                        'object'      => $user ?? null,
                    ])@endcomponent

                    <!-- Department -->
                    @component('backend.includes.components.form.textarea', [
                        'name'       => 'department',
                        'label'      => 'Department',
                        'help_text'  => '',
                        'attributes' => [
                            'rows' => 3,
                        ],
                        'object'      => $user ?? null,
                    ])@endcomponent

                    <!-- Organization -->
                    @component('backend.includes.components.form.select', [
                        'name'        => 'organization_id',
                        'label'       => 'Organization',
                        'optionList'  => $organizations,
                        'object'      => $user->organization ?? null,
                    ])@endcomponent


                    <div class="form-group row">
                        {{ html()->label('Abilities')->class('col-md-2 form-control-label') }}

                        <div class="table-responsive col-md-10">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>@lang('labels.backend.access.users.table.roles')</th>
                                        <th>@lang('labels.backend.access.users.table.permissions')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            {{-- @dd($userRoles) --}}
                                            @if($roles->count())
                                                @foreach($roles as $role)
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <div class="checkbox d-flex align-items-center">
                                                                {{
                                                                    html()->label(
                                                                        html()->checkbox('roles[]', in_array($role->name, $userRoles), $role->name)
                                                                              ->class('switch-input')
                                                                              ->id('role-'.$role->id)
                                                                        . '<span class="switch-slider" data-checked="on" data-unchecked="off"></span>')
                                                                    ->class('switch switch-label switch-pill switch-primary mr-2')
                                                                    ->for('role-'.$role->id) }}
                                                                {{ html()->label(ucwords($role->name))->for('role-'.$role->id) }}
                                                            </div>
                                                        </div>
                                                        <div class="card-body">
                                                            @if($role->id != 1)
                                                                @if($role->permissions->count())
                                                                    <ul class="list-unstyled">
                                                                    @foreach($role->permissions as $permission)
                                                                        <li>
                                                                            <i class="fas fa-dot-circle"></i> {{ ucwords($permission->name) }}
                                                                        </li>
                                                                    @endforeach
                                                                    </ul>
                                                                @else
                                                                    @lang('labels.general.none')
                                                                @endif
                                                            @else
                                                                @lang('labels.backend.access.users.all_permissions')
                                                            @endif
                                                        </div>
                                                    </div><!--card-->
                                                @endforeach
                                            @endif
                                        </td>
                                        <td>
                                            @if($permissions->count())
                                                @foreach($permissions as $permission)
                                                    <div class="checkbox d-flex align-items-center">
                                                        {{ html()->label(
                                                                html()->checkbox('permissions[]', in_array($permission->name, $userPermissions), $permission->name)
                                                                      ->class('switch-input')
                                                                      ->id('permission-'.$permission->id)
                                                                    . '<span class="switch-slider" data-checked="on" data-unchecked="off"></span>')
                                                                ->class('switch switch-label switch-pill switch-primary mr-2')
                                                            ->for('permission-'.$permission->id) }}
                                                        {{ html()->label(ucwords($permission->name))->for('permission-'.$permission->id) }}
                                                    </div>
                                                @endforeach
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div><!--col-->
                    </div><!--form-group-->
                </div><!--col-->
            </div><!--row-->
