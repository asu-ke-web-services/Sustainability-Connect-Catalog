@extends('layouts.asu-web-standards')

@section('content')
<div class="container pad-bot-md pad-top-sm">
    <div class="col-sm-9">
        @include('internships.show_fields')
        <a href="{!! route('internships.index') !!}" class="btn btn-default">Back</a>
    </div>


    <div class="col-sm-3 hidden-xs">
        <div id="secondary" class="widget-area row" role="complementary">
            <div id="sidebarNav" class="sidebar-nav affix-top">
                <aside id="internship-favorites" class="widget widget_internship_favorites">
                    <form action="#" id="ProjectUserRelationshipFollowForm" method="post" accept-charset="utf-8">
                        <button class="btn btn-primary" onclick="submit();" type="submit"><i class="fa fa-plus-square" aria-hidden="true"></i> Follow</button>
                    </form>
                </aside>

                <div>&nbsp;</div>

                <aside id="internship-apply-now" class="widget widget_internship_apply-now">
                    <form action="#" id="ProjectUserRelationshipApplyNowForm" method="post" accept-charset="utf-8">
                        <button class="btn btn-primary" onclick="submit();" type="submit">Apply Now</button>
                    </form>
                </aside>

                <aside id="internship-actions" class="widget widget_internship_actions">
                    <h3 class="widget-title">Actions</h3>
                    <ul>
                        <li><a href="#">Upload a file to this internship</a></li>
                        <li><a href="#">Management View</a></li>
                    </ul>
                </aside>
            </div>
        </div>
    </div>
</div>

@endsection
