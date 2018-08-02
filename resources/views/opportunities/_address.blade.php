<div class="form-group col-md-12">
    <label for="addresses[{{$key}}]">Location {{$key + 1}}:</label>
    @component('components.form.input_array', [
        'name'       => "addresses[{$key}][city]",
        'field'      => 'city',
        'label'      => 'City:',
        'attributes' => 'required',
        'object'     => $address ?? null,
    ])@endcomponent

    @component('components.form.input_array', [
        'name'       => "addresses[{$key}][state]",
        'field'      => 'state',
        'label'      => 'State/Prov:',
        'attributes' => 'required',
        'object'     => $address ?? null,
    ])@endcomponent

    @component('components.form.input_array', [
        'name'       => "addresses[{$key}][country]",
        'field'      => 'country',
        'label'      => 'Country:',
        'attributes' => 'required',
        'object'     => $address ?? null,
    ])@endcomponent

    @component('components.form.textarea_array', [
        'name'   => "addresses[{$key}][note]",
        'field'  => 'note',
        'label'  => 'Note:',
        'object' => $address ?? null,
    ])@endcomponent
</div>
