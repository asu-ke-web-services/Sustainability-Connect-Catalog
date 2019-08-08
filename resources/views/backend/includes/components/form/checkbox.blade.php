<div class="form-group{{ $errors->has($name) ? ' has-error' : '' }} row">
@if (isset($label))
        <div class="col-md-2">
            {{ html()->label($label)
                    ->class('form-control-label') }}
        </div>
    @endif
    <div class="col-md-10">
        <div class="checkbox">
            {{ html()->label(
                    html()->checkbox($name, old($name) ?: ($object->{$name} ?? $default), '1')
                            ->class('switch-input')
                    . '<span class="switch-slider" data-checked="on" data-unchecked="off"></span>')
                ->class('switch switch-label switch-pill switch-primary mr-2')
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
</div><!--form-group-->
