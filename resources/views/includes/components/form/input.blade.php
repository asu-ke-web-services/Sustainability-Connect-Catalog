<div class="form-group{{ $errors->has($name) ? ' has-error' : '' }} col-md-12">
    @if (isset($label))
        <label for="{{ $name }}" class="col-md-3 control-label">{{ $label }}</label>
    @endif
    <div class="col-md-9">
        <input id="{{ $name }}"
               type="{{ $type ?? 'text' }}"
               class="form-control"
               name="{{ $name }}"
               value="{{ old($name) ?: ($object->{$name} ?? '') }}"
               placeholder="{{ $placeholder ?? '' }}"
               {{ $attributes ?? '' }} >

        @if ($errors->has($name))
            <span class="help-block">
                <strong>{{ $errors->first($name) }}</strong>
            </span>
        @elseif (isset($help_text))
            <span class="help-block">{{ $help_text }}</span>
        @endif
    </div>
</div>
