@extends ('frontend.layouts.coreui')

@section ('title', __('labels.frontend.opportunity.projects.proposal') . ' | ' . __('labels.frontend.opportunity.projects.submit_opportunity'))

@section('content')
<div class="container pad-bot-md pad-top-sm">
    <div class="col-sm-9">
        {{ html()->form('POST', route('frontend.opportunity.project.store'))->class('form-horizontal')->open() }}

            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-5">
                            <h4 class="card-title mb-0">
                                {{ __('labels.frontend.opportunity.projects.proposal') }}
                                <small class="text-muted">Submit your idea</small>
                            </h4>
                        </div><!--col-->
                    </div><!--row-->

                    <hr />

                    @include('frontend.opportunity.project.fields')
                </div><!--card-body-->
            </div><!--card-->

        {{ html()->form()->close() }}
    </div>
</div>
@endsection
