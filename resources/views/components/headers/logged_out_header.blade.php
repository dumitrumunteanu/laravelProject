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
                    <li class="nav-item"><a class="nav-link" href="{{ route('courses') }}">Courses</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('blog') }}">Blog</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}">Contact Us</a></li>
                </ul>
                <div class="ms-auto">
                    <a href="{{ route('login') }}" class="text-decoration-none mx-2">Log In</a>
                    <a href="{{ route('register') }}" class="text-decoration-none mx-2">Register</a>
                </div>
            </div>
        </div>
    </nav>
</header>
