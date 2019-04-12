@extends ('frontend.layouts.coreui')

@section ('title', 'Internship | Edit internship listing')

@section('content')
{{ html()->form('POST', route('frontend.opportunity.internship.private.update', $internship))->class('form-horizontal')->open() }}

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        Full Internship Listing
                        <small class="text-muted">Edit internship listing</small>
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr />

            @include('frontend.opportunity.internship.private.fields')
        </div><!--card-body-->
    </div><!--card-->

{{ html()->form()->close() }}
@endsection
