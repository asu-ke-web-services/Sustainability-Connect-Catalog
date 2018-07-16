<table class="table table-responsive" id="opportunities-table">
    <thead>
        <tr>
            <th>Opportunityable Id</th>
            <th>Opportunityable Type</th>
            <th>Title</th>
            <th>Alt Title</th>
            <th>Slug</th>
            <th>Listing Expires</th>
            <th>Application Deadline</th>
            <th>Opportunity Status Id</th>
            <th>Hidden</th>
            <th>Summary</th>
            <th>Description</th>
            <th>Parent Opportunity Id</th>
            <th>Organization Id</th>
            <th>Owner User Id</th>
            <th>Submitting User Id</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($opportunities as $opportunity)
        <tr>
            <td>{!! $opportunity->opportunityable_id !!}</td>
            <td>{!! $opportunity->opportunityable_type !!}</td>
            <td>{!! $opportunity->title !!}</td>
            <td>{!! $opportunity->alt_title !!}</td>
            <td>{!! $opportunity->slug !!}</td>
            <td>{!! $opportunity->listing_expires !!}</td>
            <td>{!! $opportunity->application_deadline !!}</td>
            <td>{!! $opportunity->opportunity_status_id !!}</td>
            <td>{!! $opportunity->hidden !!}</td>
            <td>{!! $opportunity->summary !!}</td>
            <td>{!! $opportunity->description !!}</td>
            <td>{!! $opportunity->parent_opportunity_id !!}</td>
            <td>{!! $opportunity->organization_id !!}</td>
            <td>{!! $opportunity->owner_user_id !!}</td>
            <td>{!! $opportunity->submitting_user_id !!}</td>
            <td>
                {!! Form::open(['route' => ['opportunities.destroy', $opportunity->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('opportunities.show', [$opportunity->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('opportunities.edit', [$opportunity->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
