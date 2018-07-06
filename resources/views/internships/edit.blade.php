@extends('layouts.asu-web-standards')

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
                   {!! Form::model($internship, ['route' => ['internships.update', $internship->id], 'method' => 'patch']) !!}

                        @include('internships.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
