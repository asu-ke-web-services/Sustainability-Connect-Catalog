<div class="form-group{{ $errors->has($name) ? ' has-error' : '' }} row">
    @if (isset($label))
        {{ html()->label($label)
                ->class('col-md-2 form-control-label')
                ->for($name) }}
    @endif
    <div class="col-md-10">
        <div id="datetime-{!! $name !!}" class="input-group date" data-target-input="nearest">
            <div class="input-group-append" data-target="#datetime-{!! $name !!}" data-toggle="datetimepicker">
                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
            </div>
            {{ html()->input(
                'text',
                $name . (($multivalue ?? false) ? '[]' : ''),
                old($name) ?: ($object->{$name} ?? '')
            )
                ->class('form-control datetimepicker-input')
                ->attribute('data-target', "#datetime-$name")
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

@push('after-scripts')
    <script type="text/javascript">
        $(function () {
            $("datetime-{!! $name !!}").datetimepicker();
        });
    </script>
@endpush


