<div class="col-sm-12">
    <div class="table-responsive">
        <table class="table table-striped" style="padding: 0px;">
            <thead class="tableFloatingHeader" style="opacity: 0; display: none;">
                <tr>
                    <th class="col col-md-4">Name</th>
                    <th class="col col-md-2" data-toggle="tooltip" data-container="body" title="" data-original-title="Hover mouse over icons for explanation of project availability options">Availability <i class="fa fa-question-circle-o"></i></th>
                    <th class="col col-md-1" data-toggle="tooltip" data-container="body" title="" data-original-title="Primary location for this project">City <i class="fa fa-question-circle-o"></i></th>
                    <!--<th class="col col-md-1" data-toggle="tooltip" data-container="body" title="Current Recruitment Status">Current Status <i class="fa fa-question-circle-o"></i></th>-->
                    <th class="col col-md-2 text-center" data-toggle="tooltip" data-container="body" title="" data-original-title="Project Begins">Begins <i class="fa fa-question-circle-o"></i></th>
                    <th class="col col-md-2 text-center" data-toggle="tooltip" data-container="body" title="" data-original-title="Project Ends">Ends <i class="fa fa-question-circle-o"></i></th>
                    <th class="col col-md-1 text-center" data-toggle="tooltip" data-container="body" title="" data-original-title="Application Deadline">Apply By <i class="fa fa-question-circle-o"></i></th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($projects as $project)
                    <tr>
                        <td>{!! $project->opportunity->title !!}</td>
                        <td></td>
                        <td>Address City</td>
                        <td>Project Begins</td>
                        <td>{!! $project->opportunity->listing_expires !!}</td>
                        <td>{!! $project->opportunity->application_deadline !!}</td>
                        <td>
                            {!! Form::open(['route' => ['projects.destroy', $project->id], 'method' => 'delete']) !!}
                            <div class='btn-group'>
                                <a href="{!! route('projects.show', [$project->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                                <a href="{!! route('projects.edit', [$project->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                                {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                            </div>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
        </table>
    </div>
    <!-- BEGIN Paginator -->
    <!-- END Paginator -->
</div>
