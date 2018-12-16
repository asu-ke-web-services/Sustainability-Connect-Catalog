<li class="breadcrumb-menu">
    <div class="btn-group" role="group" aria-label="Button group">
        <div class="dropdown">
            <a class="btn dropdown-toggle" href="#" role="button" id="breadcrumb-dropdown-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ __('menus.backend.opportunity.filtered_views') }}</a>

            <div class="dropdown-menu" aria-labelledby="breadcrumb-dropdown-1">
                <a class="dropdown-item" href="{{ route('admin.opportunity.project.index') }}">{{ __('menus.backend.opportunity.projects.all') }}</a>
                <a class="dropdown-item" href="{{ route('admin.opportunity.project.create') }}">{{ __('menus.backend.opportunity.projects.create') }}</a>
                <a class="dropdown-item" href="{{ route('admin.opportunity.project.active') }}">{{ __('menus.backend.opportunity.projects.active') }}</a>
                <a class="dropdown-item" href="{{ route('admin.opportunity.project.expired') }}">{{ __('menus.backend.opportunity.projects.expired') }}</a>
                <a class="dropdown-item" href="{{ route('admin.opportunity.project.completed') }}">{{ __('menus.backend.opportunity.projects.completed') }}</a>
                <a class="dropdown-item" href="{{ route('admin.opportunity.project.archived') }}">{{ __('menus.backend.opportunity.projects.archived') }}</a>
                <a class="dropdown-item" href="{{ route('admin.opportunity.project.deleted') }}">{{ __('menus.backend.opportunity.projects.deleted') }}</a>
                <a class="dropdown-item" href="{{ route('admin.opportunity.project.reviews') }}">{{ __('menus.backend.opportunity.projects.reviews') }}</a>
                <a class="dropdown-item" href="{{ route('admin.opportunity.project.import_review') }}">{{ __('menus.backend.opportunity.projects.import_review') }}</a>
            </div>
        </div><!--dropdown-->

        <!--<a class="btn" href="#">Static Link</a>-->
    </div><!--btn-group-->
</li>
