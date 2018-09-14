@extends ('backend.layouts.app')

@section ('title', __('Internship') . ' Management | Create New ' . __('Internship'))

@section('content')
{{ html()->form('POST', route('internship.store'))->class('form-horizontal')->open() }}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        {{ __('Internship Management') }}
                        <small class="text-muted">{{ __('Create New Internship') }}</small>
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr />

            <div class="row mt-4">
                <div class="col">
                    <div class="form-group row">
                        {{ html()->label(__('Text Field'))
                            ->class('col-md-2 form-control-label')
                            ->for('text_field') }}

                        <div class="col-md-10">
                            {{ html()->text('text_field')
                                ->class('form-control')
                                ->placeholder(__('Text Field'))
                                ->attribute('maxlength', 191)
                                ->required()
                                ->autofocus() }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('Email'))->class('col-md-2 form-control-label')->for('email') }}

                        <div class="col-md-10">
                            {{ html()->email('email')
                                ->class('form-control')
                                ->placeholder(__('Email'))
                                ->attribute('maxlength', 191)
                                ->required() }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('Associated Models'))
                            ->class('col-md-2 form-control-label')
                            ->for('associated_models') }}

                        <div class="col-md-10">
                            @if ($associated_models->count())
                                @foreach($associated_models as $associated_model)
                                    <div class="checkbox">
                                        {{ html()->label(
                                                html()->checkbox('associated_models[]', old('associated_models') && in_array($associated_model->name, old('associated_models')) ? true : false, $associated_model->name)
                                                      ->class('switch-input')
                                                      ->id('associated-model-'.$associated_model->id)
                                                . '<span class="switch-label"></span><span class="switch-handle"></span>')
                                            ->class('switch switch-sm switch-3d switch-primary')
                                            ->for('associated-model-'.$associated_model->id) }}
                                        {{ html()->label(ucwords($associated_model->name))->for('associated-model-'.$associated_model->id) }}
                                    </div>
                                @endforeach
                            @endif
                        </div><!--col-->
                    </div><!--form-group-->
                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->

        <div class="card-footer">
            <div class="row">
                <div class="col">
                    {{ form_cancel(route('internship.index'), 'Cancel') }}
                </div><!--col-->

                <div class="col text-right">
                    {{ form_submit('Create') }}
                </div><!--col-->
            </div><!--row-->
        </div><!--card-footer-->
    </div><!--card-->
{{ html()->form()->close() }}
@endsection
