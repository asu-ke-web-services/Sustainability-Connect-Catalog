<div class="form-group{{ $errors->has($name) ? ' has-error' : '' }} col-md-12">
    @if (isset($label))
        <label for="{{ $name }}" class="col-md-3 control-label">{{ $label }}</label>
    @endif
    <div class="col-md-9">
        <textarea
                id="{{ $name }}"
                class="form-control"
                name="{{ $name }}"
                placeholder="{{ $placeholder ?? '' }}"
                rows="{{ $rows ?? 5 }}"
                cols="{{ $columns ?? 20 }}"
                {{ $attributes ?? '' }}
        >{{ old($name) ?: ($object->{$field} ?? '') }}</textarea>

        @if ($errors->has($name))
            <span class="help-block">
                <strong>{{ $errors->first($name) }}</strong>
            </span>
        @endif
    </div>
</div>
