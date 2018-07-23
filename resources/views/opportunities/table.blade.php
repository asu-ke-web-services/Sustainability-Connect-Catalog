<div class="col-sm-12">
    <div class="table-responsive">
        <table class="table table-striped">
            <thead class="tableFloatingHeader">
                <tr>
                    <th class="col col-md-4">Name</th>
                            {{-- <th class="col col-md-2" data-toggle="tooltip" data-container="body" title="" data-original-title="Hover mouse over icons for explanation of project availability options">Availability <i class="fa fa-question-circle-o"></i></th>
                            <th class="col col-md-1" data-toggle="tooltip" data-container="body" title="" data-original-title="Primary location for this project">City <i class="fa fa-question-circle-o"></i></th>
                            <th class="col col-md-1" data-toggle="tooltip" data-container="body" title="Current Recruitment Status">Current Status <i class="fa fa-question-circle-o"></i></th>
                            <th class="col col-md-2 text-center" data-toggle="tooltip" data-container="body" title="" data-original-title="Project Begins">Begins <i class="fa fa-question-circle-o"></i></th>
                            <th class="col col-md-2 text-center" data-toggle="tooltip" data-container="body" title="" data-original-title="Project Ends">Ends <i class="fa fa-question-circle-o"></i></th>
                            <th class="col col-md-1 text-center" data-toggle="tooltip" data-container="body" title="" data-original-title="Application Deadline">Apply By <i class="fa fa-question-circle-o"></i></th> --}}
                </tr>
            </thead>
            <tbody>
            @foreach($opportunities as $opportunity)
                <tr>
                    <td>{!! $opportunity !!}</td>
                    {{-- <td>{!! $project->opportunity->application_deadline !!}</td>
                    <td>{!! $project->opportunity->parent_opportunity_id !!}</td>
                    <td>{!! $project->opportunity->organization_id !!}</td>
                    <td>{!! $project->opportunity->owner_user_id !!}</td>
                    <td>{!! $project->opportunity->submitting_user_id !!}</td>
                    <td>
                        {!! Form::open(['route' => ['projects.destroy', $project->opportunity->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{!! route('projects.show', [$project->opportunity->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                            <a href="{!! route('projects.edit', [$project->opportunity->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                            {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                        </div>
                        {!! Form::close() !!}
                    </td> --}}
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <!-- BEGIN Paginator -->
    <!-- END Paginator -->
</div>
