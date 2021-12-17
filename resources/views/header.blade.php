@if(Auth::check())
    <div class="fixed-top d-flex flex-column flex-shrink-0 bg-light vh-100 shadow" style="width: 4.5rem;">
        <ul class="nav nav-pills nav-flush flex-column mb-auto text-center">
            <li class="nav-item">
                <a href="#" class="nav-link py-3 border-bottom" title="My Courses" data-bs-toggle="tooltip" data-bs-placement="right">
                    <i class="fas fa-th-list fa-2x"></i>
                </a>
            </li>
            <li>
                <a href="#" class="nav-link py-3 border-bottom" title="Calendar" data-bs-toggle="tooltip" data-bs-placement="right">
                    <i class="fas fa-calendar-alt fa-2x"></i>
                </a>
            </li>
            <li>
                <a href="#" class="nav-link active py-3 border-bottom" title="Blog" data-bs-toggle="tooltip" data-bs-placement="right">
                    <i class="fas fa-pencil-alt fa-2x"></i>
                </a>
            </li>
            <li>
                <a href="#" class="nav-link py-3 border-bottom" title="Contact Us" data-bs-toggle="tooltip" data-bs-placement="right">
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
@else
    <header>
        <nav class="navbar fixed-top navbar-expand-md navbar-light bg-light shadow">
            <div class="container-fluid">
                <a class="navbar-brand fw-bold" href="/">Organizer</a>
                <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Blog</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Contact Us</a></li>
                    </ul>
                    <div class="ms-auto">
                        <a href="{{ route('login') }}" class="text-decoration-none mx-2">Log In</a>
                        <a href="{{ route('register') }}" class="text-decoration-none mx-2">Register</a>
                    </div>
                </div>
            </div>
        </nav>
    </header>
@endif
