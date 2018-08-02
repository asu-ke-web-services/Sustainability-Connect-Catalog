<div class="form-group{{ $errors->has($name) ? ' has-error' : '' }} col-md-12">
    @if (isset($label))
        <label for="{{ $name }}" class="col-md-3 control-label">{{ $label }}</label>
    @endif

    <div class="col-md-9">
        <select id="{{ $name }}"
                class="form-control"
                name="{{ $name }}[]"
                @if (isset($placeholder)) placeholder="{{ $placeholder }}" @endif
                {{ $attributes ?? '' }} >

            @foreach($optionList as $option)
                <option value="{{ $option['id'] }}">{{ $option['name'] }}</option>
            @endforeach
        </select>

        @if ($errors->has($name))
            <span class="help-block">
                <strong>{{ $errors->first($name) }}</strong>
            </span>
        @elseif (isset($help_text))
            <span class="help-block">{{ $help_text }}</span>
        @endif
    </div>
</div>
