<div id="secondary" class="widget-area row" role="complementary">
    <div style="width: 285px;" id="sidebarNav" class="sidebar-nav affix-top">
    @if ($logged_in_user)
        <aside id="project-favorites" class="widget widget_project_favorites">
        @if ($logged_in_user && $isFollowed)
            {{ html()->form('POST', route('frontend.project.unfollow', $project))->class('form-horizontal')->open() }}
            {{ html()->button('Unfollow Project', 'submit')->class(['btn', 'btn-primary', 'btn-sm']) }}
            {{ html()->form()->close() }}
        @else
            {{ html()->form('POST', route('frontend.project.follow', $project))->class('form-horizontal')->open() }}
            {{ html()->button('Follow Project', 'submit')->class(['btn', 'btn-primary', 'btn-sm']) }}
            {{ html()->form()->close() }}
        @endif
        </aside>

        <div>&nbsp;</div>

        <aside id="project-apply-now" class="widget widget_project_apply">
            {{ html()->form('POST', route('frontend.project.apply', $project))->class('form-horizontal')->open() }}
            {{ html()->button('Request to Join', 'submit')->class(['btn', 'btn-primary', 'btn-sm']) }}
            {{ html()->form()->close() }}
        </aside>
    @endif
    </div>
</div>
