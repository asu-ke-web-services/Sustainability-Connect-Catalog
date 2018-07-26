@extends('layouts.asu-web-standards')

@push('styles')
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css">
@endpush

@push('scripts')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js"></script>
@endpush

@section('content')
    <section class="content-header">
        <h1>
            Internship
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($opportunity, ['route' => ['internships.update', $opportunity->id], 'method' => 'patch']) !!}

                        @include('internships.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
