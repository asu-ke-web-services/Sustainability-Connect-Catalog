@extends('layouts.asu-web-standards')

@section('content')
<div class="container pad-bot-md pad-top-sm">
    <div class="col-sm-9">
        <ul class="nav nav-tabs">
            <li role="presentation"><a href="{!! route('internships.show', ['id' => $opportunity->id ]) !!}">Standard View</a></li>
            <li role="presentation" class="active"><a href="{!! route('internships.show_admin', ['id' => $opportunity->id ]) !!}">Admin View</a></li>
        </ul>
        {!! Form::open(['route' => ['internships.destroy', $opportunity->id], 'method' => 'delete']) !!}
        <ul class="nav nav-pills">
            <li role="presentation" class="active"><a href="#">View</a></li>
            <li role="presentation"><a href="{!! route('internships.edit', ['id' => $opportunity->id ]) !!}">Edit</a></li>
            <li role="presentation">{!! Form::button('Delete', ['type' => 'submit', 'class' => 'btn btn-link', 'onclick' => "return confirm('Are you sure?')"]) !!}</li>
        </ul>
        {!! Form::close() !!}
        @include('internships.show_fields_admin')
        <a href="{!! route('internships.index') !!}" class="btn btn-default">Back</a>
    </div>


    <div class="col-sm-3 hidden-xs">
        <div id="secondary" class="widget-area row" role="complementary">
            <div id="sidebarNav" class="sidebar-nav affix-top">
                <aside id="internship-favorites" class="widget widget_internship_favorites">
                    <form action="#" id="ProjectUserRelationshipFollowForm" method="post" accept-charset="utf-8">
                        <button class="btn btn-primary disabled" onclick="submit();" type="submit"><i class="fa fa-plus-square" aria-hidden="true"></i> Follow</button>
                    </form>
                </aside>

                <div>&nbsp;</div>

                <aside id="internship-apply-now" class="widget widget_internship_apply-now">
                    <form action="#" id="ProjectUserRelationshipApplyNowForm" method="post" accept-charset="utf-8">
                        <button class="btn btn-primary disabled" onclick="submit();" type="submit">Apply Now</button>
                    </form>
                </aside>

                <aside id="internship-actions" class="widget widget_internship_actions">
                    <h3 class="widget-title">Actions</h3>
                    <ul>
                        <li>Upload a file to this internship</li>
                    </ul>
                </aside>
            </div>
        </div>
    </div>
</div>

@endsection
