<div class="col">
    <div class="table-responsive">
        <table class="table table-hover">
            <tr>
                <th>Name</th>
                <td>{{ ucwords($organization->name) }}</td>
            </tr>

            <tr>
                <th>Type</th>
                <td>{!! ucwords($organization->type->name) !!}</td>
            </tr>

            <tr>
                <th>Status</th>
                <td>{!! ucwords($organization->status->name) !!}</td>
            </tr>
        </table>
    </div>
</div><!--table-responsive-->
