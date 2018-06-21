<table class="table table-responsive" id="internships-table">
    <thead>
        <tr>
            <th>Compensation</th>
        <th>Responsibilities</th>
        <th>Qualifications</th>
        <th>Application Instructions</th>
        <th>Comments</th>
        <th>Program Lead</th>
        <th>Success Story</th>
        <th>Library Collection</th>
        <th>Publish On</th>
        <th>Publish Until</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($internships as $internship)
        <tr>
            <td>{!! $internship->compensation !!}</td>
            <td>{!! $internship->responsibilities !!}</td>
            <td>{!! $internship->qualifications !!}</td>
            <td>{!! $internship->application_instructions !!}</td>
            <td>{!! $internship->comments !!}</td>
            <td>{!! $internship->program_lead !!}</td>
            <td>{!! $internship->success_story !!}</td>
            <td>{!! $internship->library_collection !!}</td>
            <td>{!! $internship->publish_on !!}</td>
            <td>{!! $internship->publish_until !!}</td>
            <td>
                {!! Form::open(['route' => ['internships.destroy', $internship->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('internships.show', [$internship->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('internships.edit', [$internship->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>