
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="{{ route('admin.dashboard') }}" class="nav-link {{ (request()->is('admin/dashboard')) ? 'active' : '' }}">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item {{ (request()->is('admin/career*')) ? 'menu-open' : '' }}">
                <a href="#" class="nav-link {{ (request()->is('admin/career*')) ? 'active' : '' }}">
                    <i class="nav-icon fas fa-file-alt"></i>
                    <p>Career Management <i class="right fas fa-angle-left"></i></p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('admin.collection.list.all') }}" class="nav-link {{ (request()->is('admin/career/posts*')) ? 'active active_nav_link' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Posts</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.unit.list.all') }}" class="nav-link {{ (request()->is('admin/career/unit*')) ? 'active active_nav_link' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Units</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.subject.list.all') }}" class="nav-link {{ (request()->is('admin/career/subject*')) ? 'active active_nav_link' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Subjects</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.job_category.list.all') }}" class="nav-link {{ (request()->is('admin/career/job-category*')) ? 'active active_nav_link' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Job Categories</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.job.list') }}" class="nav-link {{ (request()->is('admin/career/job-vacancy*')) ? 'active active_nav_link' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Job Vacancies</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.blogs.list.all') }}" class="nav-link {{ (request()->is('admin/career/blogs*')) ? 'active active_nav_link' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Blogs</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item {{ (request()->is('admin/user/application*')) ? 'menu-open' : '' }}">
                <a href="#" class="nav-link {{ (request()->is('admin/user/application*')) ? 'active' : '' }}">
                    <i class="nav-icon fas fa-file-alt"></i>
                    <p>User Application <i class="right fas fa-angle-left"></i></p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('admin.user.application.list') }}" class="nav-link {{ (request()->is('admin/user/application/list*')) ? 'active active_nav_link' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Applications</p>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item {{ (request()->is('admin/user/content-management*')) ? 'menu-open' : '' }}">
                <a href="#" class="nav-link {{ (request()->is('admin/user/content-management*')) ? 'active' : '' }}">
                    <i class="nav-icon fas fa-file-alt"></i>
                    <p>Content Management <i class="right fas fa-angle-left"></i></p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('admin.extra-curricular') }}" class="nav-link {{ (request()->is('admin/user/content-management/extra-curricular*')) ? 'active active_nav_link' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Extra Curricular</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('admin.academics') }}" class="nav-link {{ (request()->is('admin/user/content-management/academics*')) ? 'active active_nav_link' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Academics</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('admin.contact_us') }}" class="nav-link {{ (request()->is('admin/user/content-management/contact_us*')) ? 'active active_nav_link' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Contact US</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('admin.social_media') }}" class="nav-link {{ (request()->is('admin/user/content-management/social_media*')) ? 'active active_nav_link' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Social Media</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('admin.lead') }}" class="nav-link {{ (request()->is('admin/user/content-management/lead*')) ? 'active active_nav_link' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Lead</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('admin.inner') }}" class="nav-link {{ (request()->is('admin/user/content-management/inner*')) ? 'active active_nav_link' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Inner</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('admin.choose_us') }}" class="nav-link {{ (request()->is('admin/user/content-management/choose_us*')) ? 'active active_nav_link' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Choose Us</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('admin.galary') }}" class="nav-link {{ (request()->is('admin/user/content-management/galary*')) ? 'active active_nav_link' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p> Galary</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="javascript:void(0)" onclick="event.preventDefault();document.getElementById('logout-form').submit()">
                    <i class="nav-icon fas fa-sign-out-alt"></i>
                    Logout
                </a>
            </li>
        </ul>
    </nav>
            