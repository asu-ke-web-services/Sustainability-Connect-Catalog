<div class="form-group{{ $errors->has($name) ? ' has-error' : '' }} row">
    @if (isset($label))
    <div class="col-md-2">
        {{ html()->label($label)
                ->class('form-control-label')
                ->for($name) }}
        </div>
    @endif
    <div class="col-md-10">
        <div id="{{ $name }}" class="input-group date" data-target-input="nearest">
            <div class="input-group-append">
                <div class="input-group-text" data-toggle="datetimepicker" data-target="#{{ $name }}"><span class="fa fa-calendar"></span></div>
            </div>
            {{ html()->input(
                'text',
                $name,
                old($name) ?: ($object->{$name} ?? '')
            )
                ->class('form-control datetimepicker-input')
                ->data('target', '#'.$name)
                ->data('toggle', 'datetimepicker')
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
            $("#{!! $name !!}").datetimepicker({
                format: 'Y-MM-DD'
            });
        });
    </script>
@endpush
