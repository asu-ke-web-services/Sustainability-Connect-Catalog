
                    @component('includes.components.form.input', [
                        'name'        => 'name',
                        'label'       => 'Name',
                        'help_text'   => 'Names can be up to 250 characters long',
                        'attributes'  => [
                            'required' => 'required',
                            'maxlength' => '250',
                        ],
                        'object'      => $opportunityStatus ?? null,
                    ])@endcomponent

                    @component('includes.components.form.select', [
                        'name'        => 'opportunity_type_id',
                        'label'       => 'Opportunity Type',
                        'placeholder' => 'Select opportunity type...',
                        'optionList'  => $types,
                        'object'      => $opportunityStatus ?? null,
                    ])@endcomponent
