
            <div class="row mt-4 mb-4">
                <div class="col">

                    <!-- First Name -->
                    @component('includes.components.form.input', [
                        'name'        => 'first_name',
                        'label'       => 'First Name',
                        'help_text'   => 'Name can be up to 191 characters long',
                        'attributes'  => [
                            'required'  => 'required',
                            'maxlength' => '191',
                            'autofocus' => 'autofocus',
                        ],
                        'object'      => $user ?? null,
                    ])@endcomponent

                    <!-- Last Name -->
                    @component('includes.components.form.input', [
                        'name'        => 'last_name',
                        'label'       => 'Last Name',
                        'help_text'   => 'Name can be up to 191 characters long',
                        'attributes'  => [
                            'required' => 'required',
                            'maxlength' => '191',
                        ],
                        'object'      => $user ?? null,
                    ])@endcomponent

                    <!-- E-mail -->
                    @component('includes.components.form.input', [
                        'type'       => 'email',
                        'name'       => 'email',
                        'label'      => 'E-mail Address',
                        'help_text'  => 'Email can be up to 191 characters long',
                        'attributes' => [
                            'required'  => 'required',
                            'maxlength' => '191',
                        ],
                        'object'      => $user ?? null,
                    ])@endcomponent

                    <!-- E-mail -->
                    {{-- @component('includes.components.form.input', [
                        'type'       => 'password',
                        'name'       => 'password',
                        'label'      => 'Password',
                        'attributes' => [
                            'required'  => 'required',
                        ],
                        'object'      => $user ?? null,
                    ])@endcomponent --}}

                    <!-- E-mail Confirmation -->
                    {{-- @component('includes.components.form.input', [
                        'type'       => 'password',
                        'name'       => 'password_confirmation',
                        'label'      => 'Password Confirmation',
                        'attributes' => [
                            'required'  => 'required',
                        ],
                        'object'      => $user ?? null,
                    ])@endcomponent --}}

                    <!-- Active -->
                    @component('includes.components.form.checkbox', [
                        'name'    => 'active',
                        'label'   => 'Active',
                        'default' => true,
                        'object'  => $user ?? null,
                    ])@endcomponent

                    <!-- Confirmed -->
                    @component('includes.components.form.checkbox', [
                        'name'    => 'confirmed',
                        'label'   => 'Confirmed',
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

                    <!-- User Type -->
                    @component('includes.components.form.select', [
                        'name'        => 'user_type_id',
                        'label'       => 'User Type',
                        'optionList'  => $userTypes,
                        'object'      => $user ?? null,
                    ])@endcomponent

                    <!-- ASURITE -->
                    @component('includes.components.form.input', [
                        'name'        => 'asurite',
                        'label'       => 'ASURITE',
                        'help_text'   => 'Be careful when changing this value',
                        'attributes'  => [
                            'maxlength' => '191',
                        ],
                        'object'      => $user ?? null,
                    ])@endcomponent

                    <!-- Student Degree Level Type -->
                    @component('includes.components.form.select', [
                        'name'        => 'student_degree_level_id',
                        'label'       => 'Student Degree Level',
                        'optionList'  => $studentDegreeLevels,
                        'object'      => $user ?? null,
                    ])@endcomponent

                    <!-- Degree Program -->
                    @component('includes.components.form.textarea', [
                        'name'       => 'degree_program',
                        'label'      => 'Degree Program',
                        'help_text'  => '',
                        'attributes' => [
                            'rows' => 3,
                        ],
                        'object'      => $user ?? null,
                    ])@endcomponent

                    <!-- Graduation Date -->
                    @component('includes.components.form.input', [
                        'type'        => 'date',
                        'name'        => 'graduation_date',
                        'label'       => 'Graduation Date',
                        'object'      => $user ?? null,
                    ])@endcomponent

                    <!-- Phone -->
                    @component('includes.components.form.input', [
                        'name'        => 'phone',
                        'label'       => 'Phone',
                        'help_text'   => '',
                        'attributes'  => [
                            'maxlength' => '191',
                        ],
                        'object'      => $user ?? null,
                    ])@endcomponent

                    <!-- Research Interests -->
                    @component('includes.components.form.textarea', [
                        'name'       => 'research_interests',
                        'label'      => 'Research Interests',
                        'help_text'  => '',
                        'attributes' => [
                            'rows' => 3,
                        ],
                        'object'      => $user ?? null,
                    ])@endcomponent

                    <!-- Department -->
                    @component('includes.components.form.textarea', [
                        'name'       => 'department',
                        'label'      => 'Department',
                        'help_text'  => '',
                        'attributes' => [
                            'rows' => 3,
                        ],
                        'object'      => $user ?? null,
                    ])@endcomponent

                    <!-- Organization -->
                    @component('includes.components.form.select', [
                        'name'        => 'organization_id',
                        'label'       => 'Organization',
                        'optionList'  => $organizations,
                        'object'      => $user->organization ?? null,
                    ])@endcomponent








                    <div class="form-group row">
                        {{ html()->label('Abilities')->class('col-md-2 form-control-label') }}

                        <div class="col-md-10">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>{{ __('labels.backend.access.users.table.roles') }}</th>
                                        <th>{{ __('labels.backend.access.users.table.permissions') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>
                                            @if ($roles->count())
                                                @foreach($roles as $role)
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <div class="checkbox">
                                                                {{ html()->label(
                                                                        html()->checkbox('roles[]', old('roles') && in_array($role->name, old('roles')) ? true : false, $role->name)
                                                                              ->class('switch-input')
                                                                              ->id('role-'.$role->id)
                                                                        . '<span class="switch-label"></span><span class="switch-handle"></span>')
                                                                    ->class('switch switch-sm switch-3d switch-primary')
                                                                    ->for('role-'.$role->id) }}
                                                                {{ html()->label(ucwords($role->name))->for('role-'.$role->id) }}
                                                            </div>
                                                        </div>
                                                        <div class="card-body">
                                                            @if ($role->id != 1)
                                                                @if ($role->permissions->count())
                                                                    @foreach ($role->permissions as $permission)
                                                                    <div>
                                                                        <i class="fas fa-dot-circle"></i> {{ ucwords($permission->name) }}
                                                                    </div>
                                                                    @endforeach
                                                                @else
                                                                    {{ __('labels.general.none') }}
                                                                @endif
                                                            @else
                                                                {{ __('labels.backend.access.users.all_permissions') }}
                                                            @endif
                                                        </div>
                                                    </div><!--card-->
                                                @endforeach
                                            @endif
                                        </td>
                                        <td>
                                            @if ($permissions->count())
                                                @foreach($permissions as $permission)
                                                    <div class="checkbox">
                                                        {{ html()->label(
                                                                html()->checkbox('permissions[]', old('permissions') && in_array($permission->name, old('permissions')) ? true : false, $permission->name)
                                                                      ->class('switch-input')
                                                                      ->id('permission-'.$permission->id)
                                                                . '<span class="switch-label"></span><span class="switch-handle"></span>')
                                                            ->class('switch switch-sm switch-3d switch-primary')
                                                            ->for('permission-'.$permission->id) }}
                                                        {{ html()->label(ucwords($permission->name))->for('permission-'.$permission->id) }}
                                                    </div>
                                                @endforeach
                                            @endif
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div><!--col-->
                    </div><!--form-group-->
                </div><!--col-->
            </div><!--row-->
