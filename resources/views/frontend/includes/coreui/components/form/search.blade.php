<div class="form-group{{ $errors->has($name) ? ' has-error' : '' }} row">
    <div class="col-md-12">
        <div class="input-group">
            {{ html()->input(
                $type ?? 'text',
                $name . (($multivalue ?? false) ? '[]' : ''),
                old($name) ?: ($object->{$name} ?? '')
            )
                ->class('form-control')
                ->placeholder($placeholder ?? '')
                ->attribute($attribute ?? null)
                ->attributes($attributes ?? [])
                ->child('<div class="input-group-append">
                <button class="btn btn-outline-secondary" type="button">
                    <i class="fa fa-search"></i>
                </button>
            </div>')
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
