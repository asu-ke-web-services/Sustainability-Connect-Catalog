@extends('frontend.layouts.asu')
@section('content')
    <div class="container-fluid" style="min-height: 700px">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Active Internships</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="font-size: .8em;">
                <table id="datatable" class="table table-bordered table-striped dt-responsive nowrap" width="100%">
                <thead>
                    <tr>
                        <th>More</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Keywords</th>
                        <th data-priority="2">Organization</th>
                        <th data-priority="4">Availability</th>
                        <th data-priority="4">City</th>
                        <th data-priority="1">Apply By</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($internships as $internship)
                        @php
                            $accessAffiliations = $internship->affiliations
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
                            <td></td>
                            <td>
                                @if (!$canViewRestricted && $restrictAccess)
                                    View Restricted for SOS majors only
                                @else
                                    <b><a href="{!! route('frontend.opportunity.internship.public.show', $internship) !!}">{{ ucwords($internship->name) }}</a></b>
                                @endif
                            </td>
                            <td>
                                @foreach($internship->categories as $category)
                                    {{ ucwords($category->name) }}
                                @endforeach
                            </td>
                            <td>
                                @foreach($internship->keywords as $keyword)
                                    {{ ucwords($keyword->name) }}
                                @endforeach
                            </td>
                            <td>
                                @if (!$canViewRestricted && $restrictAccess)
                                    View Restricted for SOS majors only
                                @else
                                    {{ ucwords($internship->organization->name) }}
                                @endif
                            </td>
                            <td class="icon-column">
                                @foreach ($internship->affiliations as $icon)
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
                                @if ($internship->addresses->count())
                                    @foreach ($internship->addresses as $address)
                                        {{ ucwords($address->city) }}
                                    @endforeach
                                @else
                                    {{ __('labels.general.none') }}
                                @endif
                            </td>
                            <td>{{
                                !empty($internship->application_deadline_text)
                                    ? $internship->application_deadline_text
                                    : (!empty($internship->application_deadline_at) ? $internship->application_deadline_at->toDateString() : null)
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
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css">
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

@push('scripts')
    <script src="//cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js" ></script>
    <script src="//cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js" ></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script>
        $(document).ready( function () {
            $('#datatable').DataTable({
                "responsive": {
                  "details": {
                    "type": "column"
                  }
                },
                "columnDefs": [
                  {
                    "visible": false,
                    "targets": [2,3]
                  },
                  {
                    "className": "control",
                    "orderable": false,
                    "targets":   0
                  },
                  {
                    "className": "all",
                    "targets": 1
                  }
                ],
                "order": [ 5, 'asc' ],
                "lengthMenu": [ [25, 50, 100], [25, 50, 100] ]
            });
            $('[data-toggle="tooltip"]').tooltip();
        } );
    </script>
@endpush
