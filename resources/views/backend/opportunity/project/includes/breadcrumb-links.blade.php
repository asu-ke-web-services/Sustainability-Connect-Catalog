<li class="breadcrumb-menu">
    <div class="btn-group" role="group" aria-label="Button group">
        <div class="dropdown">
            <a class="btn dropdown-toggle" href="#" role="button" id="breadcrumb-dropdown-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">@lang('menus.backend.opportunity.filtered_views')</a>

            <div class="dropdown-menu" aria-labelledby="breadcrumb-dropdown-1">
                <a class="dropdown-item" href="{{ route('admin.opportunity.project.index') }}">@lang('menus.backend.opportunity.projects.all')</a>
                <a class="dropdown-item" href="{{ route('admin.opportunity.project.create') }}">@lang('menus.backend.opportunity.projects.create')</a>
                <a class="dropdown-item" href="{{ route('admin.opportunity.project.active') }}">@lang('menus.backend.opportunity.projects.active')</a>
                <a class="dropdown-item" href="{{ route('admin.opportunity.project.expired') }}">@lang('menus.backend.opportunity.projects.expired')</a>
                <a class="dropdown-item" href="{{ route('admin.opportunity.project.invalid_open') }}">@lang('menus.backend.opportunity.projects.invalid_open')</a>
                <a class="dropdown-item" href="{{ route('admin.opportunity.project.future') }}">@lang('menus.backend.opportunity.projects.future')</a>
                <a class="dropdown-item" href="{{ route('admin.opportunity.project.completed') }}">@lang('menus.backend.opportunity.projects.completed')</a>
                <a class="dropdown-item" href="{{ route('admin.opportunity.project.archived') }}">@lang('menus.backend.opportunity.projects.archived')</a>
                <a class="dropdown-item" href="{{ route('admin.opportunity.project.deleted') }}">@lang('menus.backend.opportunity.projects.deleted')</a>
                <a class="dropdown-item" href="{{ route('admin.opportunity.project.reviews') }}">@lang('menus.backend.opportunity.projects.reviews')</a>
                <a class="dropdown-item" href="{{ route('admin.opportunity.project.import_review') }}">@lang('menus.backend.opportunity.projects.import_review')</a>
            </div>
        </div><!--dropdown-->

        <!--<a class="btn" href="#">Static Link</a>-->
    </div><!--btn-group-->
</li>
