@extends ('frontend.layouts.coreui')

@section ('title', 'Project Proposal | Submit project')

@section('content')
{{ html()->form('POST', route('frontend.opportunity.project.submission.store'))->id('project-form')->class('form-horizontal')->open() }}

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        Project Proposal
                        <small class="text-muted">Submit your project</small>
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr />

            @include('frontend.opportunity.project.fields_basic')
        </div><!--card-body-->
    </div><!--card-->

{{ html()->form()->close() }}
@endsection
