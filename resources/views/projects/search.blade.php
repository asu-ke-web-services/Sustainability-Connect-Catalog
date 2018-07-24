@extends('layouts.asu-web-standards')

@section('content')
    <section class="content-header">
        <div class="col-md-2"><h1>Projects</h1></div>
        <div class="col-md-6">
            <div class="input-group" id="search-box">
                <div class="input-group-btn">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span>Genre</span>
                        <span class="caret"></span>
                    </button>
                    <ul id="genres" class="dropdown-menu">
                    </ul>
                </div><!-- /btn-group -->
            </div>

        </div>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                <div class="col-sm-12">
                    <div class="table-responsive">
                        <table class="table table-striped" style="padding: 0px;">
                            <thead class="tableFloatingHeader">
                                <tr>
                                    <th class="col col-md-4">Name</th>
                                    <th class="col col-md-2" data-toggle="tooltip" data-container="body" title="" data-original-title="Hover mouse over icons for explanation of project availability options">Availability <i class="fa fa-question-circle-o"></i></th>
                                    <th class="col col-md-1" data-toggle="tooltip" data-container="body" title="" data-original-title="Primary location for this project">City <i class="fa fa-question-circle-o"></i></th>
                                    <!--<th class="col col-md-1" data-toggle="tooltip" data-container="body" title="Current Recruitment Status">Current Status <i class="fa fa-question-circle-o"></i></th>-->
                                    <th class="col col-md-2 text-center" data-toggle="tooltip" data-container="body" title="" data-original-title="Project Begins">Begins <i class="fa fa-question-circle-o"></i></th>
                                    <th class="col col-md-2 text-center" data-toggle="tooltip" data-container="body" title="" data-original-title="Project Ends">Ends <i class="fa fa-question-circle-o"></i></th>
                                    <th class="col col-md-1 text-center" data-toggle="tooltip" data-container="body" title="" data-original-title="Application Deadline">Apply By <i class="fa fa-question-circle-o"></i></th>
                                </tr>
                            </thead>
                            <tbody id="search-hits"></tbody>
                        </table>
                    </div>
                    <!-- BEGIN Paginator -->
                    <!-- END Paginator -->
                </div>
            </div>
        </div>
        <div class="text-center">
            <div id="search-pagination"></div>
        </div>
    </div>
@endsection


@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/instantsearch.js/1/instantsearch.min.css" />
@endsection


@section('scripts')
<!-- Scripts -->
@parent
<script language="javascript" src="https://cdn.jsdelivr.net/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/instantsearch.js/1/instantsearch.min.js"></script>
@endsection


@section('javascript')
    {{-- <script src="{{mix('js/search.js')}}" ></script> --}}

<script type="text/javascript" id="hits-temp">
<tr>
    <td data-title="Name"><a href="/projects/@{{objectID}}">@{{{_highlightResult.title.value}}}</a></td>
    <td class="icon-column" data-title="Availability"><span class="fa-stack" data-toggle="tooltip" data-container="body" title="" data-original-title="Restricted to students majoring in degrees from The School of Sustainability">
            <i class="fa fa-square fa-green fa-stack-2x"></i>
            <i class="fa fa-leaf fa-stack-1x"></i>
        </span>
        <span class="fa-stack" data-toggle="tooltip" data-container="body" title="" data-original-title="Can fulfill School of Sustainability Culminating Experience">
            <i class="fa fa-square fa-gold fa-stack-2x"></i>
            <i class="fa fa-graduation-cap fa-stack-1x"></i>
        </span>
        <span class="fa-stack" data-toggle="tooltip" data-container="body" title="" data-original-title="Available for Undergraduate Students">
            <i class="fa fa-square fa-blue fa-stack-2x"></i>
            <strong class="fa-stack-1x fa-inverse">U</strong>
        </span>
        <span class="fa-stack" data-toggle="tooltip" data-container="body" title="" data-original-title="Available for Graduate Students">
            <i class="fa fa-square fa-blue-darkened fa-stack-2x"></i>
            <strong class="fa-stack-1x fa-inverse">G</strong>
        </span></td>
    <td data-title="City">@{{addresses}}</td>
    <td data-title="Begins">@{{start_date}}</td>
    <td data-title="Ends">@{{end_date}}</td>
    <td data-title="Apply By">@{{application_deadline}}</td>
</tr>
</script>


<script language="javascript">
    var search = instantsearch({
        appId: 'OISWB86UY6',
        apiKey: '5b3f49bc4c117cce7b99c028562f51c0',
        indexName: 'opportunities',
        urlSync: true
    });

    search.addWidget(
        instantsearch.widgets.searchBox({
            container: '#search-box',
            placeholder: 'Search by artist, song, or lyrics',
            wrapInput: false,
            cssClasses: {
                input: 'form-control'
            }
        })
    );

    search.addWidget(
        instantsearch.widgets.hits({
            container: '#search-hits',
            templates: {
                item: $('#hits-temp').html(),
                empty: 'No opportunity was found!',
                header: '<h2>Opportunities</h2>'
            }
        })
    );

    search.addWidget(
        instantsearch.widgets.menu({
            container: '#categories',
            attributeName: 'categories',
            limit: 10,
            templates: {
                header: '',
                footer: '',
                item: '<li><a href="@{{url}}">@{{name}}</></li>'
            }
        })
    );

    search.addWidget(
        instantsearch.widgets.pagination({
            container: '#search-pagination'
        })
    );

    search.start();
</script>

@endsection
