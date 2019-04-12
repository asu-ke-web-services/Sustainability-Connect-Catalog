@extends('frontend.layouts.coreui')

@section('title', app_name() . ' | ' . __('strings.backend.dashboard.title'))

@section('content')
@unless (count($submittedProjects) || count($followedProjects) || count($participatingInProjects) || count($submittedInternships) || count($followedInternships) || count($participatingInInternships))
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="clearfix">
                    <h4 class="pt-3">No opportunities to report.</h4>
                    <p class="text-muted">You are not following or participating in any opportunities.</p>
                    <a class="btn btn-info" href="{{ route('frontend.opportunity.project.public.active') }}" role="button">Browse Projects</a>
                    <a class="btn btn-warning" href="{{ route('frontend.opportunity.internship.public.active') }}" role="button">Browse Internships</a>
                </div>
            </div>
        </div>
    </div>
@endunless

@if (count($submittedProjects) || count($followedProjects) || count($participatingInProjects))
    <h3>Projects</h3>
    @if (count($submittedProjects))
    {{-- User's Submitted Projects --}}
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-accent-info">
                <div class="card-header">
                    <strong>Your Recent Project Submissions</strong>
                </div><!--card-header-->
                <div class="card-body">
                    <table class="table table-responsive-sm table-striped">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Submitted</th>
                            <th>Updated Last</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($submittedProjects as $project)
                            <tr>
                                <td>{!! $project->name !!}</td>
                                <td>{!! $project->status->name ?? '' !!}</td>
                                <td>{!! $project->created_at !!}</td>
                                <td>{!! $project->updated_at !!}</td>
                                <td>
                                    <div class="btn-group btn-group-sm" role="group" aria-label="Actions">
                                        <a href="{{ route('frontend.opportunity.project.private.show', $project) }}" data-toggle="tooltip" data-placement="top" title="{{ __('buttons.general.crud.view') }}" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                        <a href="{{ route('frontend.opportunity.project.public.edit', $project) }}" class="btn btn-primary"><i class="fas fa-edit" data-toggle="tooltip" data-placement="top" title="{{ __('buttons.general.crud.edit') }}"></i></a>
                                        {{-- <a href="{{ route('frontend.opportunity.project.private.edit', $project) }}" class="btn btn-primary"><i class="fas fa-edit" data-toggle="tooltip" data-placement="top" title="{{ __('buttons.general.crud.edit') }}"></i></a> --}}
                                        {{-- <a href="{{ route('frontend.opportunity.project.private.print', $project) }}" class="btn btn-secondary"><i class="fas fa-print" data-toggle="tooltip" data-placement="top" title="Print View"></i></a> --}}
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div><!-- /.col-->
    </div><!-- /.row-->
    @endif

    @if (count($followedProjects))
    {{-- Following Projects --}}
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-accent-info">
                <div class="card-header">
                    <strong>Projects You're Following</strong>
                </div><!--card-header-->
                <div class="card-body">
                    <table class="table table-responsive-sm table-striped">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Submitted</th>
                            <th>Updated Last</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($followedProjects as $project)
                            <tr>
                                <td>{!! $project->name !!}</td>
                                <td>{!! $project->status->name ?? '' !!}</td>
                                <td>{!! $project->created_at !!}</td>
                                <td>{!! $project->updated_at !!}</td>
                                <td>
                                    <div class="btn-group btn-group-sm" role="group" aria-label="Actions">
                                        <a href="{{ route('frontend.opportunity.project.public.show', $project) }}" data-toggle="tooltip" data-placement="top" title="{{ __('buttons.general.crud.view') }}" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                        {{-- <a href="{{ route('frontend.opportunity.project.public.edit', $project) }}" class="btn btn-primary"><i class="fas fa-edit" data-toggle="tooltip" data-placement="top" title="{{ __('buttons.general.crud.edit') }}"></i></a> --}}
                                        {{-- <a href="{{ route('frontend.opportunity.project.private.edit', $project) }}" class="btn btn-primary"><i class="fas fa-edit" data-toggle="tooltip" data-placement="top" title="{{ __('buttons.general.crud.edit') }}"></i></a> --}}
                                        {{-- <a href="{{ route('frontend.opportunity.project.private.print', $project) }}" class="btn btn-secondary"><i class="fas fa-print" data-toggle="tooltip" data-placement="top" title="Print View"></i></a> --}}
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div><!-- /.col-->
    </div><!-- /.row-->
    @endif

    @if (count($participatingInProjects))
    {{-- Projects that User is member of --}}
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-accent-info">
                <div class="card-header">
                    <strong>Your Active Projects</strong>
                </div><!--card-header-->
                <div class="card-body">
                    <table class="table table-responsive-sm table-striped">
                        <thead>
                        <tr>
                            <th>Project</th>
                            <th>Your Role</th>
                            <th>Project Status</th>
                            <th>Start Date</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($participatingInProjects as $project)
                            <tr>
                                <td>{!! $project->name !!}</td>
                                <td>{!! $project->supervisorUser->full_name ?? null !!}</td>
                                <td>{!! $project->status->name !!}</td>
                                <td>{!! $project->opportunity_start_at !!}</td>
                                <td>
                                    <div class="btn-group btn-group-sm" role="group" aria-label="Actions">
                                        <a href="{{ route('frontend.opportunity.project.private.show', $project) }}" data-toggle="tooltip" data-placement="top" title="{{ __('buttons.general.crud.view') }}" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                        {{-- <a href="{{ route('frontend.opportunity.project.public.edit', $project) }}" class="btn btn-primary"><i class="fas fa-edit" data-toggle="tooltip" data-placement="top" title="{{ __('buttons.general.crud.edit') }}"></i></a> --}}
                                        <a href="{{ route('frontend.opportunity.project.private.edit', $project) }}" class="btn btn-primary"><i class="fas fa-edit" data-toggle="tooltip" data-placement="top" title="{{ __('buttons.general.crud.edit') }}"></i></a>
                                        {{-- <a href="{{ route('frontend.opportunity.project.private.print', $project) }}" class="btn btn-secondary"><i class="fas fa-print" data-toggle="tooltip" data-placement="top" title="Print View"></i></a> --}}
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div><!-- /.col-->
    </div><!-- /.row-->
    @endif
@endif

@if (count($submittedInternships) || count($followedInternships) || count($participatingInInternships))
    <h3>Internships</h3>
    {{-- User's Submitted Internships --}}
    @if (count($submittedInternships))
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-accent-warning">
                <div class="card-header">
                    <strong>Your Recent Internship Submissions</strong>
                </div><!--card-header-->
                <div class="card-body">
                    <table class="table table-responsive-sm table-striped">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Submitted</th>
                            <th>Updated Last</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($submittedInternships as $internship)
                            <tr>
                                <td>{!! $internship->name !!}</td>
                                <td>{!! $internship->status->name ?? '' !!}</td>
                                <td>{!! $internship->created_at !!}</td>
                                <td>{!! $internship->updated_at !!}</td>
                                <td>
                                    <div class="btn-group btn-group-sm" role="group" aria-label="Actions">
                                        <a href="{{ route('frontend.opportunity.internship.private.show', $internship) }}" data-toggle="tooltip" data-placement="top" title="{{ __('buttons.general.crud.view') }}" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                        <a href="{{ route('frontend.opportunity.internship.public.edit', $internship) }}" class="btn btn-primary"><i class="fas fa-edit" data-toggle="tooltip" data-placement="top" title="{{ __('buttons.general.crud.edit') }}"></i></a>
                                        {{-- <a href="{{ route('frontend.opportunity.internship.private.edit', $internship) }}" class="btn btn-primary"><i class="fas fa-edit" data-toggle="tooltip" data-placement="top" title="{{ __('buttons.general.crud.edit') }}"></i></a> --}}
                                        {{-- <a href="{{ route('frontend.opportunity.internship.private.print', $internship) }}" class="btn btn-secondary"><i class="fas fa-print" data-toggle="tooltip" data-placement="top" title="Print View"></i></a> --}}
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div><!-- /.col-->
    </div><!-- /.row-->
    @endif

    @if (count($followedInternships))
    {{-- Following Internships --}}
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-accent-warning">
                <div class="card-header">
                    <strong>Internships You're Following</strong>
                </div><!--card-header-->
                <div class="card-body">
                    <table class="table table-responsive-sm table-striped">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Submitted</th>
                            <th>Updated Last</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($followedInternships as $internship)
                            <tr>
                                <td>{!! $internship->name !!}</td>
                                <td>{!! $internship->status->name ?? '' !!}</td>
                                <td>{!! $internship->created_at !!}</td>
                                <td>{!! $internship->updated_at !!}</td>
                                <td>
                                    <div class="btn-group btn-group-sm" role="group" aria-label="Actions">
                                        <a href="{{ route('frontend.opportunity.internship.public.show', $internship) }}" data-toggle="tooltip" data-placement="top" title="{{ __('buttons.general.crud.view') }}" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                        {{-- <a href="{{ route('frontend.opportunity.internship.public.edit', $internship) }}" class="btn btn-primary"><i class="fas fa-edit" data-toggle="tooltip" data-placement="top" title="{{ __('buttons.general.crud.edit') }}"></i></a> --}}
                                        {{-- <a href="{{ route('frontend.opportunity.internship.private.edit', $internship) }}" class="btn btn-primary"><i class="fas fa-edit" data-toggle="tooltip" data-placement="top" title="{{ __('buttons.general.crud.edit') }}"></i></a> --}}
                                        {{-- <a href="{{ route('frontend.opportunity.internship.private.print', $internship) }}" class="btn btn-secondary"><i class="fas fa-print" data-toggle="tooltip" data-placement="top" title="Print View"></i></a> --}}
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div><!-- /.col-->
    </div><!-- /.row-->
    @endif

    @if (count($participatingInInternships))
    {{-- Internships that User is member of --}}
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-accent-warning">
                <div class="card-header">
                    <strong>Your Active Internships</strong>
                </div><!--card-header-->
                <div class="card-body">
                    <table class="table table-responsive-sm table-striped">
                        <thead>
                        <tr>
                            <th>Project</th>
                            <th>Your Role</th>
                            <th>Project Status</th>
                            <th>Start Date</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($participatingInInternships as $internship)
                            <tr>
                                <td>{!! $internship->name !!}</td>
                                <td>{!! $internship->supervisorUser->full_name ?? null !!}</td>
                                <td>{!! $internship->status->name !!}</td>
                                <td>{!! $internship->opportunity_start_at !!}</td>
                                <td>{!! $internship->frontend_private_action_buttons !!}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div><!-- /.col-->
    </div><!-- /.row-->
    @endif
@endif
@endsection
