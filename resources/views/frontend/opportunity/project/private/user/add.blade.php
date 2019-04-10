@extends ('frontend.layouts.coreui')

@section ('title', 'Project | ' . __('Add User'))

@section('content')
{{ html()->modelForm($project, 'POST', route('frontend.opportunity.project.private.user.store', $project))->class('form-horizontal')->open() }}

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        Project
                        <small class="text-muted">Add User</small>
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr />

            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-5">
                            <h4 class="card-title mb-0">
                                Add User
                            </h4>
                        </div><!--col-->
                    </div><!--row-->

                    <hr />

                    <div class="row mt-4">
                        <div class="col">

                            <!-- Project User -->
                            @component('frontend.includes.coreui.components.form.select', [
                                'name'        => 'user_id',
                                'label'       => 'Project User',
                                'help_text'   => 'Begin typing to select user',
                                'optionList'  => $users,
                                'object'      => null,
                            ])@endcomponent

                            <!-- Relationship Type Field -->
                            @component('frontend.includes.coreui.components.form.select', [
                                'name'        => 'relationship_type_id',
                                'label'       => 'Relationship to Project',
                                'optionList'  => $relationships,
                                'object'      => null,
                            ])@endcomponent

                            <!-- Comments Field -->
                            @component('frontend.includes.coreui.components.form.richtext', [
                                'name'        => 'comments',
                                'label'       => 'User Comments',
                                // 'help_text'   => 'What specific sustainability problem do you need solved?',
                                'attributes' => [
                                    'rows' => 5,
                                ],
                                'object'      => null,
                            ])@endcomponent

                        </div><!--col-->
                    </div><!--row-->
                    <div class="row">
                        <div class="col">
                            {{ form_cancel( url()->previous(), __('buttons.general.cancel') ) }}
                        </div><!--col-->

                        <div class="col text-right">
                            {{ form_submit( __('buttons.general.submit') ) }}
                        </div><!--col-->
                    </div><!--row-->
                </div><!--card-body-->
            </div><!--card-->

        </div><!--card-body-->
    </div><!--card-->

{{ html()->closeModelForm() }}
@endsection
