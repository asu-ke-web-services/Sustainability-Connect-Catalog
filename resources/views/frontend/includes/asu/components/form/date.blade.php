<div class="form-group{{ $errors->has($name) ? ' has-error' : '' }} row">
    @if (isset($label))
        {{ html()->label($label)
                ->class('col-md-2 form-control-label')
                ->for($name) }}
    @endif
    <div class="col-md-10">
        <div class="input-group">
            <span class="input-group-prepend">
                <span class="input-group-text">
                    <span class="fa fa-calendar"></span>
                </span>
            </span>

            {{ html()->input(
                $type ?? 'text',
                $name . (($multivalue ?? false) ? '[]' : ''),
                old($name) ?: ($object->{$name} ?? '')
            )
                ->class('form-control datepicker')
                ->placeholder($placeholder ?? 'mm/dd/yyyy')
                ->attribute($attribute ?? null)
                ->attributes($attributes ?? [])
            }}
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
