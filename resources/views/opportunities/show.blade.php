@extends('layouts.asu-web-standards')

@section('content')
    <section class="content-header">
        <h1>
            Opportunity
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('opportunities.show_fields')
                    <a href="{!! route('opportunities.index') !!}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
