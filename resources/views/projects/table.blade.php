<div class="col-sm-12">
    <div class="table-responsive">
        <table class="table table-striped">
            <thead class="tableFloatingHeader">
                <tr>
                    <th class="col col-md-4">Name</th>
                    <th class="col col-md-2" data-toggle="tooltip" data-container="body" title="" data-original-title="Hover mouse over icons for explanation of project availability options">Availability <i class="fa fa-question-circle-o"></i></th>
                    <th class="col col-md-1" data-toggle="tooltip" data-container="body" title="" data-original-title="Primary location for this project">City <i class="fa fa-question-circle-o"></i></th>
                    <th class="col col-md-1" data-toggle="tooltip" data-container="body" title="Current Recruitment Status">Current Status <i class="fa fa-question-circle-o"></i></th>
                    <th class="col col-md-2 text-center" data-toggle="tooltip" data-container="body" title="" data-original-title="Project Begins">Begins <i class="fa fa-question-circle-o"></i></th>
                    <th class="col col-md-2 text-center" data-toggle="tooltip" data-container="body" title="" data-original-title="Project Ends">Ends <i class="fa fa-question-circle-o"></i></th>
                    <th class="col col-md-1 text-center" data-toggle="tooltip" data-container="body" title="" data-original-title="Application Deadline">Apply By <i class="fa fa-question-circle-o"></i></th>
                </tr>
            </thead>
            <tbody>
            @if(count($opportunities) > 0)
            @foreach($opportunities as $opportunity)
                <tr>
                    <td><a href="projects/{!! $opportunity->id !!}">{!! $opportunity->title !!}</a></td>
                    <td></td>
                    <!-- Location -->
                    <td>
                    @foreach($opportunity->addresses as $address)
                        {!! $address->city . ', ' . $address->state !!}
                    @endforeach
                    </td>
                    <td>{!! $opportunity->status->name !!}</td>
                    <td>{!! $opportunity->start_date !!}</td>
                    <td>{!! $opportunity->end_date !!}</td>
                    <td>{!! $opportunity->application_deadline !!}</td>
                    {{-- <td>
                        {!! Form::open(['route' => ['projects.destroy', $opportunity->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{!! route('projects.show', [$opportunity->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                            <a href="{!! route('projects.edit', [$opportunity->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                            {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                        </div>
                        {!! Form::close() !!}
                    </td> --}}
                </tr>
            @endforeach
            @else
                <tr>
                    <td colspan="7" class="text-danger">Result not found.</td>
                </tr>
            @endif
            </tbody>
        </table>
    </div>
    <!-- BEGIN Paginator -->
    <!-- END Paginator -->
</div>
