@extends('frontend.layouts.asu')

@section('content')
    <div class="container-fluid" style="min-height: 700px">
        <div class="box">
        <div class="box-header">
          <h3 class="box-title">Active Projects</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body" style="font-size: .8em;">
          <table id="datatable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Availability</th>
                    <th>City</th>
                    <th>Begins</th>
                    <th>Ends</th>
                    <th>Apply By</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                    @php
                        $accessAffiliations = $project->affiliations
                            ->filter(function ($affiliation) {
                                return $affiliation->access_control;
                            })
                            ->map(function ($affiliation) {
                                return $affiliation->slug;
                            })->toArray();

                        $restrictAccess = false;
                        foreach ($accessAffiliations as $restriction) {
                            if (!in_array($restriction, $userAccessAffiliations )) {
                                $restrictAccess = true;
                            }
                        }
                    @endphp
                    <tr>
                        <td>
                        @if (!$canViewRestricted && $restrictAccess)
                            View Restricted for SOS majors only
                        @else
                            <b><a href="{!! route('frontend.opportunity.project.show', $project) !!}">{{ ucwords($project->name) }}</a></b>
                        @endif
                        </td>
                        <td class="icon-column">
                            @foreach ($project->affiliations as $icon)
                                @unless(empty($icon->frontend_fa_icon))
                                <span class="fa-stack" data-toggle="tooltip" data-container="body" title="{{ $icon->help_text }}">
                                    @php
                                        $icon = json_decode($icon->frontend_fa_icon);
                                    @endphp
                                    <div><div class="{{ $icon[0]->className ?? null }}">{{ $icon[0]->content ?? null }}</div></div>
                                    <div><div class="{{ $icon[1]->className ?? null }}">{{ $icon[1]->content ?? null }}</div>
                                    </div>
                                </span>
                                @endunless
                            @endforeach
                        </td>
                        <td>
                            @if ($project->addresses->count())
                                @foreach ($project->addresses as $address)
                                    {{ ucwords($address->city) }}
                                @endforeach
                            @else
                                {{ __('labels.general.none') }}
                            @endif
                        </td>
                        <td>{{ null !== $project->opportunity_start_at ? $project->opportunity_start_at->toDateString() : null }}</td>
                        <td>{{ null !== $project->opportunity_end_at ? $project->opportunity_end_at->toDateString() : null }}</td>
                        <td>{{
                             null != $project->application_deadline_text
                                ? $project->application_deadline_text
                                : (null !== $project->application_deadline_at ? $project->application_deadline_at->toDateString() : null)
                        }}</td>
                    </tr>
                @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
@endsection


@section('styles')
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <style>
        /*
         Font Awesome custom styles - for Affiliation Icons
         */

        .icon-column .fa,
        .icon-legend .fa {
          margin-right: .5rem;
        }

        .fa-maroon {
          color: #8c1d40;
        }

        .fa-brick-red {
          color: #d23153;
        }

        .fa-blue {
          color: #00a3e0;
        }

        .fa-blue-darkened {
          color: #010598;
        }

        .fa-green {
          color: #78be20;
        }

        .fa-green-darkened {
          color: #168026;
        }

        .fa-orange {
          color: #ff7f32;
        }

        .fa-gold {
          color: #ffc627;
        }

        .fa-gold-darkened {
          color: #c69304;
        }

        .fa-abbey {
          color: #4f5557;
        }

        .text-muted {
          margin-top: 9px;
          margin-left: 7px;
        }

        @media (max-width: 768px) {
          .input-group {
            margin-top: 30px;
          }
        }
    </style>
@endsection

@section('javascript')
    <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" ></script>
    <script>
        $(document).ready( function () {
            $('#datatable').DataTable({
                "order": [ 5, 'asc' ],
                "lengthMenu": [ [25, 50, 100], [25, 50, 100] ]
            });
            $('[data-toggle="tooltip"]').tooltip();
        } );
    </script>
@endsection
