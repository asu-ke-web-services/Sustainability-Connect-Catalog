@extends ('backend.layouts.app')

@section ('title', app_name() . ' | '. __('Student Degree Level Management'))

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    {{ __('Student Degree Level Management') }}
                </h4>
            </div><!--col-->

            <div class="col-sm-7 pull-right">
                @include('backend.lookup.student_degree_level.includes.header-buttons')
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>{{ __('Order') }}</th>
                            <th>{{ __('Student Degree Level') }}</th>
                            <th>{{ __('Slug') }}</th>
                            <th>{{ __('Actions') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($student_degree_levels as $student_degree_level)
                            <tr>
                                <td>{{ $student_degree_level->order }}</td>
                                <td>{{ ucwords($student_degree_level->name) }}</td>
                                <td>{{ $student_degree_level->slug }}</td>
                                <td>{!! $student_degree_level->action_buttons !!}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div><!--col-->
        </div><!--row-->
        <div class="row">
            <div class="col-7">
                <div class="float-left">
                    {!! $student_degree_levels->total() !!} {{ str_plural('student degree level', $student_degree_levels->total()) . ' total' }}
                </div>
            </div><!--col-->

            <div class="col-5">
                <div class="float-right">
                    {!! $student_degree_levels->render() !!}
                </div>
            </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->
</div><!--card-->
@endsection
