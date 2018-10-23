<div id="secondary" class="widget-area row" role="complementary">
    <div style="width: 285px;" id="sidebarNav" class="sidebar-nav affix-top">
        <aside id="internship-favorites" class="widget widget_internship_favorites">
            {{ html()->form('POST', route('frontend.internship.follow', $internship))->class('form-horizontal')->open() }}
            {{ html()->button('Follow Internship', 'submit')->class(['btn', 'btn-primary', 'btn-sm']) }}
            {{ html()->form()->close() }}
        </aside>

        <div>&nbsp;</div>

        <aside id="internship-apply-now" class="widget widget_internship_apply">
            {{ html()->form('POST', route('frontend.internship.apply', $internship))->class('form-horizontal')->open() }}
            {{ html()->button('Request to Join', 'submit')->class(['btn', 'btn-primary', 'btn-sm']) }}
            {{ html()->form()->close() }}
        </aside>
    </div>
</div>
