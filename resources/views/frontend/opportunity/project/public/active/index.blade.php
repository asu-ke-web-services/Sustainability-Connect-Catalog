@extends('frontend.layouts.asu')

@section('content')
    <div class="container-fluid" style="min-height: 700px">
      <div class="row">
          <div class="col-xs-12">
              <h1 class="h3">Current Projects</h1>
          </div>
      </div>

      <div class="row collapse in" id="control-bar" style="padding-top: 1em;">
            <form class="form">
                <div class="col-sm-12 col-md-4">
                    <div id="category-controls" class="form-group">
                        <label for="category_dropdown" class="sr-only">Category: </label>
                        <select name="category_dropdown" class="form-control sc-drop-down category_dropdown">
                            <option value="">-- Choose Category --</option>
                            @foreach($categories as $cat)
                                <option value="{{$cat}}">{{$cat}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4">
                    <div id="tag-controls" class="form-group">
                        <label for="exampleInputEmail2" class="sr-only">Affiliation: </label>
                        <select name="affiliation_dropdown" class="form-control sc-drop-down affiliation_dropdown">
                            <option value="">-- Choose Tag --</option>
                            @foreach($affiliations as $aff)
                                <option value="{{$aff}}">{{$aff}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4">
                    <div class="form-group">
                        <div class="input-group">
                            <label for="customFilter" class="sr-only">Search: </label>
                            <input type="search" id="customFilter" class="form-control" aria-controls="datatable" placeholder="Search...">
                            <span class="input-group-btn">
                                <button name="clear_filters" type="button" class="btn btn-primary clear_filters">Clear</button>
                            </span>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <small class="hidden-md hidden-lg"><a href="#control-bar" data-toggle="collapse"> >> Show/Hide Search</a></small>

          <table id="datatable" class="table table-bordered table-striped dt-responsive nowrap" width="100%">
            <thead>
                <tr>
                    <th>More</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Keywords</th>
                    <th data-priority="4">Availability</th>
                    <th>Availability Name</th>
                    <th>Order</th>
                    <th data-priority="4">City</th>
                    <th data-priority="2">Begins</th>
                    <th data-priority="3">Ends</th>
                    <th data-priority="1">Apply By</th>
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
                        <td></td>
                        <td>
                        @if (!$canViewRestricted && $restrictAccess)
                            View Restricted for SOS majors only
                        @else
                            <b><a href="{!! route('frontend.opportunity.project.public.show', $project) !!}">{{ ucwords($project->name) }}</a></b>
                        @endif
                        </td>
                        <td>
                          @if (count($project->categories))
                            @foreach($project->categories as $category)
                              {{ ucwords($category->name) }}
                            @endforeach
                          @endif
                        </td>
                        <td>
                          @if (count($project->keywords))
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
                            @foreach ($project->affiliations as $affiliation)
                                {{$affiliation->name}}
                            @endforeach
                        </td>
                        <td>
                            @foreach ($project->affiliations as $affiliation)
                                @if($affiliation->slug == 'urgent')
                                    1
                                    @break
                                @endif
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
@endsection


@section('styles')
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css">
    <style>
        /*
         Font Awesome custom styles - for Affiliation Icons
         */

        .table-wrapper {
          font-size: .8em;
        }

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
    </style>
@endsection

@push('scripts')
    <script src="//cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js" ></script>
    <script src="//cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js" ></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script>
        $(document).ready( function () {
            $('#datatable').dataTable({
                initComplete: function() {
                },
                /* put the table in a table-wrapper div, with info on top, then table, then paging controls */
                "dom": '<"table-wrapper"itp>',
                /* perform a search when the table is ready */
                "search": {
                    "search": getUrlVars()['search']
                },
                "responsive": {
                  "details": {
                    "type": "column"
                  }
                },
                "columnDefs": [
                  {
                    "visible": false,
                    "targets": [2,3,5,6]
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
                "order": [[ 6, 'desc' ], [10, 'asc']],
                "lengthMenu": [ [25, 50, 100], [25, 50, 100] ]
            });
            $('[data-toggle="tooltip"]').tooltip();
        } );

      // Read a page's GET URL variables and return them as an associative array.
        function getUrlVars()
        {
          var vars = {};
          var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
          vars[key] = decodeURI(value);
          });

          return vars;
        }

        function preventUndefined( term )
        {
          return ( typeof(term) == 'undefined' ? '' : $.trim( term ) )
        }

     // when the value a select box changes, update the search
      $('.sc-drop-down').change( function() {
        var categoryTerm = preventUndefined( $(".category_dropdown").val() );
        var affiliationTerm = preventUndefined( $('.affiliation_dropdown').val() );
        var searchTerm = categoryTerm + ' ' + affiliationTerm;
        $('#customFilter').val( searchTerm );
        $("#datatable").DataTable().search(searchTerm).draw();
      });

      // clears the drop-downs and searches for '' (aka no filters)
      $('.clear_filters').click( function(e) {
          e.preventDefault();
          $('.sc-drop-down, #customFilter').val('');
          $("#datatable").DataTable().search('').draw();
      });

      $('#customFilter').keyup( function() {
          searchTerm = $('#customFilter').val();
          $("#datatable").DataTable().search( searchTerm ).draw();
      });
    </script>
@endpush
