@extends ('frontend.layouts.coreui')

@section ('title', 'Internship | Edit internship submission')

@section('content')
{{ html()->form('POST', route('frontend.opportunity.internship.submission.update', $internship))->id('internship-form')->class('form-horizontal')->open() }}

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        Internship Listing
                        <small class="text-muted">Edit internship submission</small>
                    </h4>
                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->
    </div><!--card-->

    @include('frontend.opportunity.internship.public.fields')

{{ html()->form()->close() }}
@endsection
