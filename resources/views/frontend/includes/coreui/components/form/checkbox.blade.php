<div class="form-group{{ $errors->has($name) ? ' has-error' : '' }} row">
    <div class="col-md-2">
        <div class="checkbox">
            {{ html()->label(
                    html()->checkbox($name, old($name) ?: ($object->{$name} ?? $default), '1')
                    . '<span data-checked="on" data-unchecked="off"></span>')
                ->for($name) }}
        </div>
        @if ($errors->has($name))
            <span class="help-block">
                <strong>{{ $errors->first($name) }}</strong>
            </span>
        @elseif (isset($help_text))
            <span class="help-block">{{ $help_text }}</span>
        @endif
    </div><!--col-->
    @if (isset($label))
        {{ html()->label($label)
                ->class('col-md-10 form-control-label')
                ->for($name) }}
    @endif
</div><!--form-group-->
