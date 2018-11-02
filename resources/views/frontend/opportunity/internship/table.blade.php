<div class="col-sm-12">
    <div class="table-responsive">
        <table class="table table-striped">
            <thead class="tableFloatingHeader">
                <tr>
                    <th class="col-md-4">Name</th>
                    <th class="col-md-4">Managing Organization</th>
                    <!-- <th class="col col-md-1" data-toggle="tooltip" data-container="body" title="Primary location for this internship">City <i class="fa fa-question-circle-o"></i></th> -->
                    <th class="col col-md-2" data-toggle="tooltip" data-container="body" title="" data-original-title="Hover mouse over icons for explanation of internship availability options">Availability <i class="fa fa-question-circle-o"></i></th>
                    <th data-toggle="tooltip" data-container="body" title="" data-original-title="Available in the Fall semester">Fall</th>
                    <th data-toggle="tooltip" data-container="body" title="" data-original-title="Available in the Spring semester">Spr</th>
                    <th data-toggle="tooltip" data-container="body" title="" data-original-title="Available in the Summer">Sum</th>
                    <th class="col col-md-1 text-center" data-toggle="tooltip" data-container="body" title="" data-original-title="Application Deadline">Apply By <i class="fa fa-question-circle-o"></i></th>
                    {{-- <th>Compensation</th>
                    <th>Responsibilities</th>
                    <th>Qualifications</th>
                    <th>Application Instructions</th>
                    <th>Comments</th>
                    <th>Program Lead</th>
                    <th>Success Story</th>
                    <th>Library Collection</th>
                    <th>Publish On</th>
                    <th>Publish Until</th>
                    <th colspan="3">Action</th> --}}
                </tr>
            </thead>
            <tbody>
            @foreach($opportunities as $opportunity)
                <tr>
                    <td><a href="internships/{!! $opportunity->id !!}">{!! $opportunity->name !!}</a></td>
                    <td>{!! $opportunity->organization->name !!}</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>{!! $opportunity->application_deadline_at !!}</td>
                    {{-- <td>
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
