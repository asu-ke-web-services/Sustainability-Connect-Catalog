<button
        id="{{ $name }}"
        type="{{ $type ?? 'button' }}"
        class="{{ $class ?? 'btn btn-primary' }}"
        name="{{ $name }}"
        value="{{ $value ?? null }}"
        onclick="{{ $onclick ?? null }}"
>{{ $text }}</button>
