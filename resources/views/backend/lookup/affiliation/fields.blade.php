
                    @component('backend.includes.components.form.input', [
                        'name'        => 'name',
                        'label'       => 'Name',
                        'help_text'   => 'Names can be up to 250 characters long',
                        'attributes'  => [
                            'required' => 'required',
                            'maxlength' => '250',
                        ],
                        'object'      => $affiliation ?? null,
                    ])@endcomponent

                    @component('backend.includes.components.form.select', [
                        'name'        => 'opportunity_type_id',
                        'label'       => 'Opportunity Type',
                        'placeholder' => 'Select opportunity type...',
                        'optionList'  => $types,
                        'object'      => $affiliation ?? null,
                    ])@endcomponent

                    @component('backend.includes.components.form.checkbox', [
                        'name'        => 'access_control',
                        'label'       => 'Access Control?',
                        'default'     => 0,
                        'object'      => $affiliation ?? null,
                    ])@endcomponent

                    @component('backend.includes.components.form.checkbox', [
                        'name'        => 'public',
                        'label'       => 'Public Visible?',
                        'default'     => 1,
                        'object'      => $affiliation ?? null,
                    ])@endcomponent
