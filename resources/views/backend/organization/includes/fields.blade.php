
@component('backend.includes.components.form.input', [
'name'        => 'name',
'label'       => 'Name',
'help_text'   => 'Names can be up to 250 characters long',
'attributes'  => [
'required' => 'required',
'maxlength' => '250',
],
'object'      => $organization ?? null,
])@endcomponent

@component('backend.includes.components.form.select', [
    'name'        => 'organization_type_id',
    'label'       => 'Organization Type',
    'placeholder' => 'Select type...',
    'optionList'  => $organizationTypes,
    'object'      => $organization ?? null,
])@endcomponent

@component('backend.includes.components.form.select', [
    'name'        => 'organization_status_id',
    'label'       => 'Organization Status',
    'placeholder' => 'Select status...',
    'optionList'  => $organizationStatuses,
    'object'      => $organization ?? null,
])@endcomponent
