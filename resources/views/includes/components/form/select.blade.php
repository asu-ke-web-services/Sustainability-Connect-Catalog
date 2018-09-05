<div class="form-group{{ $errors->has($name) ? ' has-error' : '' }} row">
    @if (isset($label))
        <label for="{{ $name }}" class="col-md-2 form-control-label">{{ $label }}</label>
    @endif

    <div class="col-md-10">
        <select id="{{ $name }}"
                class="form-control"
                name="{{ $name }}"
                @if (isset($placeholder)) placeholder="{{ $placeholder }}" @endif
                {{ $attributes ?? '' }} >

            @foreach($optionList as $option)
                <option value="{{ $option['id'] }}" {{ (old($name) ?: ($object->{$name} ?? null)) === $option['id'] ? 'selected' : '' }}>{{ $option['name'] }}</option>
            @endforeach
        </select>

        @if ($errors->has($name))
            <span class="help-block">
                <strong>{{ $errors->first($name) }}</strong>
            </span>
        @elseif (isset($help_text))
            <span class="help-block">{{ $help_text }}</span>
        @endif
    </div><!--col-->
</div><!--form-group-->
