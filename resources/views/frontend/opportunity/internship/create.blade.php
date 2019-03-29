@extends ('frontend.layouts.coreui')

@section ('title', 'Internship | Submit internship listing')

@section('content')
{{ html()->form('POST', route('frontend.opportunity.internship.submission.store'))->id('internship-form')->class('form-horizontal')->open() }}

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        Internship
                        <small class="text-muted">Submit internship listing</small>
                    </h4>
                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->
    </div><!--card-->

    @include('frontend.opportunity.internship.fields')

{{ html()->form()->close() }}
@endsection
