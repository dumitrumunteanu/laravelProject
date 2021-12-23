<div class="fixed-top d-flex flex-column flex-shrink-0 bg-light vh-100 shadow" style="width: 4.5rem;">
    <ul class="nav nav-pills nav-flush flex-column mb-auto text-center">
        <li class="nav-item">
            <a href="{{ route('courses') }}" class="nav-link py-3 border-bottom {{ request()->routeIs('courses') ? 'active' : '' }}" title="My Courses" data-bs-toggle="tooltip" data-bs-placement="right">
                <i class="fas fa-th-list fa-2x"></i>
            </a>
        </li>
        <li>
            <a href="{{ route('calendar') }}" class="nav-link py-3 border-bottom {{ request()->routeIs('calendar') ? 'active' : '' }}" title="Calendar" data-bs-toggle="tooltip" data-bs-placement="right">
                <i class="fas fa-calendar-alt fa-2x"></i>
            </a>
        </li>
        <li>
            <a href="{{ route('blog') }}" class="nav-link py-3 border-bottom {{ request()->routeIs('blog', 'blog.new', 'blog.show') ? 'active' : '' }}" title="Blog" data-bs-toggle="tooltip" data-bs-placement="right">
                <i class="fas fa-pencil-alt fa-2x"></i>
            </a>
        </li>
        <li>
            <a href="{{ route('contact') }}" class="nav-link py-3 border-bottom {{ request()->routeIs('contact') ? 'active' : '' }}" title="Contact Us" data-bs-toggle="tooltip" data-bs-placement="right">
                <i class="fas fa-phone fa-2x"></i>
            </a>
        </li>
    </ul>
    <div class="dropdown border-top">
        <a href="#" class="d-flex align-items-center justify-content-center p-3 link-dark text-decoration-none dropdown-toggle" id="dropdownUser"
           data-bs-toggle="dropdown" aria-expanded="false">
            <img src="https://via.placeholder.com/150" alt="img" width="38" height="38" class="rounded-circle">
        </a>
        <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser">
            <li><a class="dropdown-item" href="/settings.html"><i class='fas fa-cog'></i> Settings</a></li>
            <li>
                <hr class="dropdown-divider">
            </li>
            <li><!--<a class="dropdown-item" href="/"><i class='fas fa-sign-out-alt'></i> Sign out</a>-->
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="
                            event.preventDefault();
                            document.getElementById('logout-form').submit();">
                    <i class='fas fa-sign-out-alt'></i> Logout
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
</div>
