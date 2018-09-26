<div class="form-group{{ $errors->has($name) ? ' has-error' : '' }} row">
    @if (isset($label))
        {{ html()->label($label)
                ->class('col-md-2 form-control-label')
                ->for($name) }}
    @endif
    <div class="col-md-10">
        <div class="form-check checkbox">
            <label class="switch switch-3d switch-primary">
                {{ html()->checkbox($name, old($name) ?: ($object->{$name} ?? $default), '1')->class('switch-input') }}
                <span class="switch-label"></span>
                <span class="switch-handle"></span>
            </label>
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
