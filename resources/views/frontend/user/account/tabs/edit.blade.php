{{ html()->modelForm($logged_in_user, 'PATCH', route('frontend.user.profile.update'))->class('form-horizontal')->attribute('enctype', 'multipart/form-data')->open() }}

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
    </div>

    <div class="form-group">
        {{ html()->label(__('validation.attributes.frontend.first_name'))->for('first_name') }}

        {{ html()->text('first_name')
            ->class('form-control')
            ->placeholder(__('validation.attributes.frontend.first_name'))
            ->attribute('maxlength', 191)
            ->required()
            ->autofocus() }}
    </div><!--form-group-->

    <div class="form-group">
        {{ html()->label(__('validation.attributes.frontend.last_name'))->for('last_name') }}

        {{ html()->text('last_name')
            ->class('form-control')
            ->placeholder(__('validation.attributes.frontend.last_name'))
            ->attribute('maxlength', 191)
            ->required() }}
    </div><!--form-group-->

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

    <div class="form-group">
        {{ html()->label()->for('degree_program') }}

        {{ html()->text('degree_program')
            ->class('form-control')
            ->placeholder('Enter your Major degree program')
            ->attribute('maxlength', 191) }}
    </div><!--form-group-->

    <div class="form-group">
        {{ html()->label()->for('graduation_date') }}

        {{ html()->date('graduation_date')
            ->class('form-control')
            ->placeholder('Enter your graduation date') }}
    </div><!--form-group-->

    <div class="form-group">
        {{ html()->label()->for('phone') }}

        {{ html()->text('phone')
            ->class('form-control')
            ->placeholder('Enter your contact phone number') }}
    </div><!--form-group-->

    <div class="form-group">
        {{ html()->label()->for('research_interests') }}

        {{ html()->text('research_interests')
            ->class('form-control')
            ->placeholder('Enter your research topics') }}
    </div><!--form-group-->

    <div class="form-group">
        {{ html()->label()->for('department') }}

        {{ html()->text('department')
            ->class('form-control')
            ->placeholder('Enter your research topics') }}
    </div><!--form-group-->



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
