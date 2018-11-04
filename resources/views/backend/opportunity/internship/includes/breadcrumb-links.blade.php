<li class="breadcrumb-menu">
    <div class="btn-group" role="group" aria-label="Button group">
        <div class="dropdown">
            <a class="btn dropdown-toggle" href="#" role="button" id="breadcrumb-dropdown-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ __('menus.backend.opportunity.internships.main') }}</a>

            <div class="dropdown-menu" aria-labelledby="breadcrumb-dropdown-1">
                <a class="dropdown-item" href="{{ route('admin.opportunity.internship.index') }}">{{ __('menus.backend.opportunity.internships.all') }}</a>
                <a class="dropdown-item" href="{{ route('admin.opportunity.internship.create') }}">{{ __('menus.backend.opportunity.internships.create') }}</a>
                <a class="dropdown-item" href="{{ route('admin.opportunity.internship.archived') }}">{{ __('menus.backend.opportunity.internships.archived') }}</a>
                <a class="dropdown-item" href="{{ route('admin.opportunity.internship.closed') }}">{{ __('menus.backend.opportunity.internships.closed') }}</a>
                {{--<a class="dropdown-item" href="{{ route('admin.opportunity.internship.deleted') }}">{{ __('menus.backend.opportunity.internships.deleted') }}</a>--}}
                <a class="dropdown-item" href="{{ route('admin.opportunity.internship.import_review') }}">{{ __('menus.backend.opportunity.internships.import_review') }}</a>
            </div>
        </div><!--dropdown-->

        <!--<a class="btn" href="#">Static Link</a>-->
    </div><!--btn-group-->
</li>
