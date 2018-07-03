<table class="table table-responsive" id="projects-table">
    <thead>
        <tr>
            <th>Title</th>
            <th>Summary</th>
            <th>Status</th>
            <th>Expires</th>
            <th>Deadline</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($projects as $project)
        <tr>
            <td>{!! $project->opportunity->title !!}</td>
            <td>{!! $project->opportunity->summary !!}</td>
            <td>{!! $project->opportunity->status->name !!}</td>
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
    </tbody>
</table>
