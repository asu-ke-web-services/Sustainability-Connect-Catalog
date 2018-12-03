@extends('frontend.layouts.asu')

@section('title', app_name() . ' | '. __('navs.frontend.dashboard') )

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-3">
                <!-- Profile -->
                <div class="box box-primary">
                    <div class="box-body box-profile">
                        <h3 class="profile-username text-center">{{ $logged_in_user->name }}</h3>

                        {{-- <p class="text-muted text-center">{{ $logged_in_user->type->name }}</p> --}}
{{--
                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>Followers</b> <a class="pull-right">1,322</a>
                            </li>
                            <li class="list-group-item">
                                <b>Following</b> <a class="pull-right">543</a>
                            </li>
                            <li class="list-group-item">
                                <b>Friends</b> <a class="pull-right">13,287</a>
                            </li>
                        </ul>
--}}
                        <a href="{{ route('frontend.user.account')}}" class="btn btn-primary btn-block"><i class="fa fa-user-circle"></i> {{ __('navs.frontend.user.account') }}</a>
                        @can('view admin dashboard')
                            &nbsp;<a href="{{ route ('admin.dashboard')}}" class="btn btn-primary btn-block">
                                <i class="fa fa-user-secret"></i> {{ __('navs.frontend.user.administration') }}
                            </a>
                        @endcan
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">

                @if (count($followedProjects))
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Projects I'm Following</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                        <table class="table table-striped">
                            <tr>
                                <th>Project</th>
                                <th>Coordinator</th>
                                <th>Updated Last</th>
                                <th style="width: 40px">Actions</th>
                            </tr>
                            @foreach($followedProjects as $project)
                                <tr>
                                    <td>{!! $project->name !!}</td>
                                    <td>{!! $project->supervisorUser->full_name ?? null !!}</td>
                                    <td>{!! $project->updated_at !!}</td>
                                    <td><a href="{{ route('frontend.opportunity.project.show', $project)  }}" data-toggle="tooltip" data-placement="top" title="{{ __('buttons.general.crud.view') }}" class="btn btn-primary"><i class="fa fa-eye"></i></a></td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
                @endif

                @if (count($projectApplications))
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">My Project Applications Awaiting Approval</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body no-padding">
                            <table class="table table-striped">
                                <tr>
                                    <th>Project</th>
                                    <th>Coordinator</th>
                                    <th>Updated Last</th>
                                    <th style="width: 40px">Actions</th>
                                </tr>
                                @foreach($projectApplications as $project)
                                    <tr>
                                        <td>{!! $project->name !!}</td>
                                        <td>{!! $project->supervisorUser->full_name ?? null !!}</td>
                                        <td>{!! $project->updated_at !!}</td>
                                        <td><a href="{{ route('frontend.opportunity.project.show', $project)  }}" data-toggle="tooltip" data-placement="top" title="{{ __('buttons.general.crud.view') }}" class="btn btn-primary"><i class="fa fa-eye"></i></a></td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                @endif

                @if (count($participatingInProjects ))
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">My Active Projects</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                        <table class="table table-striped">
                            <tr>
                                <th>Project</th>
                                <th>Coordinator</th>
                                <th>Updated Last</th>
                                <th style="width: 40px">Actions</th>
                            </tr>
                            @foreach($participatingInProjects as $project)
                                <tr>
                                    <td>{!! $project->name !!}</td>
                                    <td>{!! $project->supervisorUser->full_name ?? null !!}</td>
                                    <td>{!! $project->updated_at !!}</td>
                                    <td><a href="{{ route('frontend.opportunity.project.show', $project)  }}" data-toggle="tooltip" data-placement="top" title="{{ __('buttons.general.crud.view') }}" class="btn btn-primary"><i class="fa fa-eye"></i></a></td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
                @endif

                @if (count($followedInternships))
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Internships I'm Following</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body no-padding">
                            <table class="table table-striped">
                                <tr>
                                    <th>Internship</th>
                                    <th>Coordinator</th>
                                    <th>Updated Last</th>
                                    <th style="width: 40px">Actions</th>
                                </tr>
                                @foreach($followedInternships as $internship)
                                    <tr>
                                        <td>{!! $internship->name !!}</td>
                                        <td>{!! $internship->supervisorUser->full_name ?? null !!}</td>
                                        <td>{!! $internship->updated_at !!}</td>
                                        <td><a href="{{ route('frontend.opportunity.internship.show', $internship)  }}" data-toggle="tooltip" data-placement="top" title="{{ __('buttons.general.crud.view') }}" class="btn btn-primary"><i class="fa fa-eye"></i></a></td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                @endif

            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
@endsection
