<div class="form-group{{ $errors->has($name) ? ' has-error' : '' }} row">
    @if (isset($label))
        <div class="col-md-2">
        {{ html()->label($label)
                ->class('col-form-label')
                ->for($name) }}
        </div>
    @endif
    <div class="col-md-10 col-form-label">
        <div class="form-check">
            {{ html()->radio($name, old($name) ?: ($object->{$name} ?? $default), '1') }}
            {{ html()->label($label) }}
        </div>
        @if ($errors->has($name))
            <span class="help-block">
                <strong>{{ $errors->first($name) }}</strong>
            </span>
        @elseif (isset($help_text))
            <span class="help-block">{{ $help_text }}</span>
        @endif
    </div><!--col-->
</div><!--form-group-->

<div class="form-group{{ $errors->has($name) ? ' has-error' : '' }} row">
    @if (isset($label))
    <label class="col-md-2 col-form-label">$label</label>
    @endif
    <div class="col-md-10 col-form-label">
        <div class="form-check">
            <input class="form-check-input" id="radio1" type="radio" value="radio1" name="radios">
            <label class="form-check-label" for="radio1">Option 1</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" id="radio2" type="radio" value="radio2" name="radios">
            <label class="form-check-label" for="radio2">Option 2</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" id="radio3" type="radio" value="radio2" name="radios">
            <label class="form-check-label" for="radio3">Option 3</label>
        </div>
    </div>
</div>