@extends('layouts.asu-web-standards')

@section('content')
    <section class="content-header">
        <h1>
            Project
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'projects.store']) !!}

                        @include('projects.idea_fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
