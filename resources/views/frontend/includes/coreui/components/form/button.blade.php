<div class="form-group row">
    @if (isset($label))
        {{ html()->label($label)
                ->class('col-md-2 form-control-label') }}
    @endif
    <div class="col-md-10">
        {{ html()->button($text, $type ?? 'button')
                ->class($class ?? 'btn btn-primary')
                ->attribute($attribute ?? null)
                ->attributes($attributes ?? []) }}

        @if (isset($help_text))
            <span class="help-block">{{ $help_text }}</span>
        @endif
    </div><!--col-->
</div><!--form-group-->

