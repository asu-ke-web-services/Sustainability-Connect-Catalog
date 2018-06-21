<table class="table table-responsive" id="projects-table">
    <thead>
        <tr>
            <th>Compensation</th>
        <th>Responsibilities</th>
        <th>Learning Outcomes</th>
        <th>Sustainability Contribution</th>
        <th>Qualifications</th>
        <th>Application Overview</th>
        <th>Implementation Paths</th>
        <th>Budget Type</th>
        <th>Budget Amount</th>
        <th>Program Lead</th>
        <th>Success Story</th>
        <th>Library Collection</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($projects as $project)
        <tr>
            <td>{!! $project->compensation !!}</td>
            <td>{!! $project->responsibilities !!}</td>
            <td>{!! $project->learning_outcomes !!}</td>
            <td>{!! $project->sustainability_contribution !!}</td>
            <td>{!! $project->qualifications !!}</td>
            <td>{!! $project->application_overview !!}</td>
            <td>{!! $project->implementation_paths !!}</td>
            <td>{!! $project->budget_type !!}</td>
            <td>{!! $project->budget_amount !!}</td>
            <td>{!! $project->program_lead !!}</td>
            <td>{!! $project->success_story !!}</td>
            <td>{!! $project->library_collection !!}</td>
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