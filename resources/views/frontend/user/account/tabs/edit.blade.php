{{ html()->modelForm($logged_in_user, 'PATCH', route('frontend.user.profile.update'))->id('form-profile-edit')->class('form-horizontal')->attribute('enctype', 'multipart/form-data')->open() }}
{{--
    <div class="form-group">
        {{ html()->label(__('validation.attributes.frontend.avatar'))->for('avatar') }}

        <div class="col-sm-10">
            <input type="radio" name="avatar_type" value="gravatar" {{ $logged_in_user->avatar_type == 'gravatar' ? 'checked' : '' }} /> Gravatar
            <input type="radio" name="avatar_type" value="storage" {{ $logged_in_user->avatar_type == 'storage' ? 'checked' : '' }} /> Upload

            @foreach ($logged_in_user->providers as $provider)
                @if (strlen($provider->avatar))
                    <input type="radio" name="avatar_type" value="{{ $provider->provider }}" {{ $logged_in_user->avatar_type == $provider->provider ? 'checked' : '' }} /> {{ ucfirst($provider->provider) }}
                @endif
            @endforeach

            <div class="form-group hidden" id="avatar_location">
                {{ html()->file('avatar_location')->class('form-control') }}
            </div><!--form-group-->
        </div>
    </div> --}}

    <!-- First Name Field -->
    @component('frontend.includes.coreui.components.form.input', [
        'name'        => 'first_name',
        'label'       => 'First Name *',
        'help_text' => __('validation.attributes.frontend.first_name'),
        'attributes'  => [
            'required'  => 'required',
            'autofocus' => 'autofocus',
            'maxlength' => '191',
        ],
        'object'      => $logged_in_user ?? null,
    ])@endcomponent

    <!-- Last Name Field -->
    @component('frontend.includes.coreui.components.form.input', [
        'name'        => 'last_name',
        'label'       => 'Last Name *',
        'help_text' => __('validation.attributes.frontend.last_name'),
        'attributes'  => [
            'required'  => 'required',
            'maxlength' => '191',
        ],
        'object'      => $logged_in_user ?? null,
    ])@endcomponent

    @if ($logged_in_user->canChangeEmail())
        <div class="alert alert-info">
            <i class="fas fa-info-circle"></i> {{  __('strings.frontend.user.change_email_notice') }}
        </div>

        <div class="form-group">
            {{ html()->label(__('validation.attributes.frontend.email'))->for('email') }}

            {{ html()->email('email')
                ->class('form-control')
                ->placeholder(__('validation.attributes.frontend.email'))
                ->attribute('maxlength', 191)
                ->required() }}
        </div><!--form-group-->
    @endif

    <!-- User Type Field -->
    @component('frontend.includes.coreui.components.form.select', [
        'name'        => 'user_type_id',
        'label'       => 'User Type *',
        'help_text'   => 'Select your user type',
        'optionList'  => $userTypes,
        'object'      => $logged_in_user->userType ?? null,
    ])@endcomponent

    <!-- Degree Program Field -->
    @component('frontend.includes.coreui.components.form.input', [
        'name'        => 'degree_program',
        'label'       => 'Degree Program',
        'help_text' => 'Enter your Major degree program',
        'attributes'  => [
            'maxlength' => '191',
        ],
        'object'      => $logged_in_user ?? null,
    ])@endcomponent

    <!-- Graduation Date Field -->
    @component('frontend.includes.coreui.components.form.input', [
        'type'   => 'date',
        'name'   => 'graduation_date',
        'label'  => 'Graduation Date',
        'help_text' => 'Enter when you expect to graduate (if applicable)',
        'attributes'  => [
            'nullable' => 'nullable',
        ],
        'object' => $logged_in_user ?? null,
    ])@endcomponent

    <!-- Phone Number Field -->
    @component('frontend.includes.coreui.components.form.input', [
        'name'        => 'phone',
        'label'       => 'Phone Number',
        'help_text' => 'Enter your contact phone number',
        'attributes'  => [
            'maxlength' => '191',
        ],
        'object'      => $logged_in_user ?? null,
    ])@endcomponent

    <!-- Research Interests Field -->
    @component('frontend.includes.coreui.components.form.textarea', [
        'name'        => 'research_interests',
        'label'       => 'Research Interests',
        'help_text'   => 'Enter your research topics',
        'attributes'  => [
            'rows'     => 5,
        ],
        'object'      => $logged_in_user ?? null,
    ])@endcomponent

    <!-- Research Interests Field -->
    @component('frontend.includes.coreui.components.form.textarea', [
        'name'        => 'department',
        'label'       => 'University Department',
        'help_text'   => 'Enter your university department, if relevant',
        'attributes'  => [
            'rows'     => 5,
        ],
        'object'      => $logged_in_user ?? null,
    ])@endcomponent

    <div class="form-group">
        {{ form_submit(__('labels.general.buttons.update')) }}
    </div><!--form-group-->
{{ html()->closeModelForm() }}

@push('after-scripts')
    <script>
        $(function() {
            var avatar_location = $("#avatar_location");

            if ($('input[name=avatar_type]:checked').val() === 'storage') {
                avatar_location.show();
            } else {
                avatar_location.hide();
            }

            $('input[name=avatar_type]').change(function() {
                if ($(this).val() === 'storage') {
                    avatar_location.show();
                } else {
                    avatar_location.hide();
                }
            });
        });
    </script>
@endpush

@push('scripts')
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js" ></script>
    <script>
        //# sourceMappingURL=text-editor.js.map
        $('#form-profile-edit').validate({
            rules: {
                "first_name": {
                    required: true,
                    maxlength: 191
                },
                "last_name": {
                    required: true,
                    maxlength: 191
                },
                "user_type_id": 'required',
            },
            messages: {
                "first_name": {
                    required: 'Please enter your first name',
                    maxlength: 'Your first name may not be longer than 191 characters'
                },
                "last_name": {
                    required: 'Please enter your last name',
                    maxlength: 'Your last name may not be longer than 191 characters'
                },
                "user_type_id": 'Please select your User Type',
            },
            errorElement: 'em',
            errorPlacement: function errorPlacement(error, element) {
                error.addClass('invalid-feedback');

                if (element.prop('type') === 'checkbox') {
                    error.insertAfter(element.parent('label'));
                } else {
                    error.insertAfter(element);
                }
            },
            // eslint-disable-next-line object-shorthand
            highlight: function highlight(element) {
                $(element).addClass('is-invalid').removeClass('is-valid');
            },
            // eslint-disable-next-line object-shorthand
            unhighlight: function unhighlight(element) {
                $(element).addClass('is-valid').removeClass('is-invalid');
            }
        });
        //# sourceMappingURL=validation.js.map
    </script>
@endpush
