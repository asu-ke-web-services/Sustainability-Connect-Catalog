<div id="secondary" class="widget-area row" role="complementary">
    <div style="width: 285px;" id="sidebarNav" class="sidebar-nav affix-top">
    @if ($logged_in_user)
            {{--
            <aside id="internship-favorites" class="widget widget_internship_favorites">
            @if ($isFollowed)
                {{ html()->form('POST', route('frontend.internship.unfollow', $internship))->class('form-horizontal')->open() }}
                {{ html()->button('Unfollow Internship', 'submit')->class(['btn', 'btn-primary', 'btn-sm']) }}
                {{ html()->form()->close() }}
            @else
                {{ html()->form('POST', route('frontend.internship.follow', $internship))->class('form-horizontal')->open() }}
                {{ html()->button('Follow Internship', 'submit')->class(['btn', 'btn-primary', 'btn-sm']) }}
                {{ html()->form()->close() }}
            @endif
            </aside>

            <div>&nbsp;</div>

            <aside id="internship-apply-now" class="widget widget_internship_apply">
                {{ html()->form('POST', route('frontend.internship.apply', $internship))->class('form-horizontal')->open() }}
                {{ html()->button('Request to Join', 'submit')->class(['btn', 'btn-primary', 'btn-sm']) }}
                {{ html()->form()->close() }}
            </aside>
    --}}
    @endif
    </div>
</div>
