<div class="form-group{{ $errors->has($name) ? ' has-error' : '' }} row">
    @if (isset($label))
        {{ html()->label($label)
                ->class('col-md-2 form-control-label')
                ->for($name) }}
    @endif

    <div class="col-md-10">
        {{ html()->multiselect(
            $name,
            $optionList,
            old($name) ?: (isset($object->{$name}) ? $object->{$name}->pluck('id')->toArray() : null)
        )
            ->class('form-control selectize-multiple')
            ->placeholder($placeholder ?? null)
            ->attribute($attribute ?? null)
            ->attributes($attributes ?? [])
        }}

        @if ($errors->has($name))
            <span class="help-block">
                <strong>{{ $errors->first($name) }}</strong>
            </span>
        @elseif (isset($help_text))
            <span class="help-block">{{ $help_text }}</span>
        @endif
    </div><!--col-->
</div><!--form-group-->
