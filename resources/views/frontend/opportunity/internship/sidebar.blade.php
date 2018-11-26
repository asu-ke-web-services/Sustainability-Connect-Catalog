<div id="secondary" class="widget-area row" role="complementary">
    <div style="width: 285px;" id="sidebarNav" class="sidebar-nav affix-top">
    @if ($logged_in_user)
        <aside id="internship-favorites" class="widget widget_internship_favorites">
        @if ($isFollowed)
            {{ html()->form('POST', route('frontend.opportunity.internship.unfollow', $internship))->class('form-horizontal')->open() }}
            {{ html()->button('Unfollow Internship', 'submit')->class(['btn', 'btn-primary', 'btn-sm']) }}
            {{ html()->form()->close() }}
        @else
            {{ html()->form('POST', route('frontend.opportunity.internship.follow', $internship))->class('form-horizontal')->open() }}
            {{ html()->button('Follow Internship', 'submit')->class(['btn', 'btn-primary', 'btn-sm']) }}
            {{ html()->form()->close() }}
        @endif
        </aside>
{{--
        <div>&nbsp;</div>

        <aside id="internship-apply-now" class="widget widget_internship_apply">
            @if ($isApplicationSubmitted)
                <bold>Application Submitted</bold>
            @else
                {{ html()->form('POST', route('frontend.opportunity.internship.apply', $internship))->class('form-horizontal')->open() }}
                {{ html()->button('Request to Join', 'submit')->class(['btn', 'btn-primary', 'btn-sm']) }}
                {{ html()->form()->close() }}
            @endif
        </aside>
--}}
    @endif
    </div>
</div>
