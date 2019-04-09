@extends ('backend.layouts.app')

@section ('title', 'Internship | View Internship User')

@section('content')
<div class="col-md-12 mb-4 mt-4">
    <div class="row">
        <div class="col-sm-8">
            <h4 class="card-title mb-0">
                {{ ucwords($internship->name) }}
            </h4>
        </div><!--col-->

    </div><!--row-->

    <div class="row mt-4 mb-4">
        <div class="col">

            <h3>User</h3>
            <div class="table-responsive">
                <table class="table table-striped">
                    <tbody>

                        <!-- User -->
                        <tr>
                            <td class="col col-sm-3 view-label">User Name</td>
                            <td class="col col-sm-9 view-content">{{ $user->fullName ?? ''}}</td>
                        </tr>

                        <!-- Relationship -->
                        <tr>
                            <td class="col col-sm-3 view-label">Internship Relationship</td>
                            <td class="col col-sm-9 view-content"></td>
                        </tr>

                        <!-- Comments -->
                        <tr>
                            <td class="col col-sm-3 view-label">Comments</td>
                            <td class="col col-sm-9 view-content"></td>
                        </tr>

                    </tbody>
                </table>
            </div>

        </div><!--col-->
    </div><!--row-->

</div>
@endsection
