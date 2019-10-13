<li class="breadcrumb-menu">
    <div class="btn-group" role="group" aria-label="Button group">
        <div class="dropdown">
            <a class="btn dropdown-toggle" href="#" role="button" id="breadcrumb-dropdown-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">@lang('menus.backend.organization.filtered_views')</a>

            <div class="dropdown-menu" aria-labelledby="breadcrumb-dropdown-1">
                <a class="dropdown-item" href="{{ route('admin.organization.index') }}">@lang('menus.backend.organization.all')</a>
                <a class="dropdown-item" href="{{ route('admin.organization.create') }}">@lang('menus.backend.organization.create')</a>
                <a class="dropdown-item" href="{{ route('admin.organization.active') }}">@lang('menus.backend.organization.active')</a>
                <a class="dropdown-item" href="{{ route('admin.organization.inactive') }}">@lang('menus.backend.organization.inactive')</a>
                <a class="dropdown-item" href="{{ route('admin.organization.deleted') }}">@lang('menus.backend.organization.deleted')</a>
            </div>
        </div><!--dropdown-->

        <!--<a class="btn" href="#">Static Link</a>-->
    </div><!--btn-group-->
</li>
