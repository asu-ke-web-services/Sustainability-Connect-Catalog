<li class="{{ Request::is('organizations*') ? 'active' : '' }}">
    <a href="{!! route('organizations.index') !!}"><i class="fa fa-edit"></i><span>Organizations</span></a>
</li>

<li class="{{ Request::is('opportunities*') ? 'active' : '' }}">
    <a href="{!! route('opportunities.index') !!}"><i class="fa fa-edit"></i><span>Opportunities</span></a>
</li>

<li class="{{ Request::is('projects*') ? 'active' : '' }}">
    <a href="{!! route('projects.index') !!}"><i class="fa fa-edit"></i><span>Projects</span></a>
</li>

<li class="{{ Request::is('internships*') ? 'active' : '' }}">
    <a href="{!! route('internships.index') !!}"><i class="fa fa-edit"></i><span>Internships</span></a>
</li>

