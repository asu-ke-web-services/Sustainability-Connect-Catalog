@extends('frontend.layouts.asu')

@section('content')
    <div class="container-fluid" style="min-height: 700px">
        <div class="box">
        <div class="box-header">
          <h3 class="box-title">Past Projects</h3>
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
                  <th data-priority="4">Availability</th>
                  <th data-priority="4">City</th>
                  <th data-priority="2">Begins</th>
                  <th data-priority="3">Ends</th>
                  <th data-priority="1">Apply By</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                    <tr>
                        <td></td>
                        <td><a href="{!! route('frontend.opportunity.project.public.show', $project) !!}">{{ ucwords($project->name) }}</a></td>
                        <td>
                          @if ($project->categories->count())
                            @foreach($project->categories as $category)
                              {{ ucwords($category->name) }}
                            @endforeach
                          @endif
                        </td>
                        <td>
                          @if ($project->keywords->count())
                            @foreach($project->keywords as $keyword)
                              {{ ucwords($keyword->name) }}
                            @endforeach
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
              initComplete: function() {
                this.api().search(getUrlVars()['search']).draw();
              },
              "responsive": {
                "details": {
                  "type": "column"
                }
              },
              "columnDefs": [
                  {
                    "targets": [2,3],
                    "visible": false
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
                "order": [ 8, 'asc' ],
                "lengthMenu": [ [25, 50, 100], [25, 50, 100] ],
          } );
        } ) ;
      $('[data-toggle="tooltip"]').tooltip();

      // Read a page's GET URL variables and return them as an associative array.
      function getUrlVars()
        {
          var vars = {};
          var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
          vars[key] = decodeURI(value);
        });

        return vars;
        }
    </script>
@endpush
