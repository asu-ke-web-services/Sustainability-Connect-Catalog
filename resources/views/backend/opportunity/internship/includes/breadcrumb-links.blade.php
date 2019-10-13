<li class="breadcrumb-menu">
    <div class="btn-group" role="group" aria-label="Button group">
        <div class="dropdown">
            <a class="btn dropdown-toggle" href="#" role="button" id="breadcrumb-dropdown-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">@lang('menus.backend.opportunity.filtered_views')</a>

            <div class="dropdown-menu" aria-labelledby="breadcrumb-dropdown-1">
                <a class="dropdown-item" href="{{ route('admin.opportunity.internship.index') }}">@lang('menus.backend.opportunity.internships.all')</a>
                <a class="dropdown-item" href="{{ route('admin.opportunity.internship.create') }}">@lang('menus.backend.opportunity.internships.create')</a>
                <a class="dropdown-item" href="{{ route('admin.opportunity.internship.active') }}">@lang('menus.backend.opportunity.internships.active')</a>
                <a class="dropdown-item" href="{{ route('admin.opportunity.internship.inactive') }}">@lang('menus.backend.opportunity.internships.inactive')</a>
                <a class="dropdown-item" href="{{ route('admin.opportunity.internship.deleted') }}">@lang('menus.backend.opportunity.internships.deleted')</a>
                <a class="dropdown-item" href="{{ route('admin.opportunity.internship.import_review') }}">@lang('menus.backend.opportunity.internships.import_review')</a>
            </div>
        </div><!--dropdown-->

        <!--<a class="btn" href="#">Static Link</a>-->
    </div><!--btn-group-->
</li>
