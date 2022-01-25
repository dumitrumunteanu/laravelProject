@extends('layouts.app_logged_out')

@section('content')
    <div style="margin-top: 6rem">
        <div class="container my-5 text-center">
            <h1 class="display-4 fw-normal">Easy planning</h1>
            <h2 class="h2 fw-light">Use this calendar app to schedule your lectures</h2>
            <a href="/login" class="btn btn-primary btn-lg mt-2 text-uppercase" role-button>Get Started Now</a>
        </div>

        <div class="container-fluid my-3  py-4 bg-info shadow">
            <h1 class="display-6 fw-normal text-center pt-3">Made for students</h1>
            <div class="row py-3">
                <div class="col col-sm-12 offset-lg-1 col-lg-4 px-5 pb-3">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <i class="fas fa-calendar-alt fa-8x"></i>
                        </div>

                        <div class="flex-grow-1 ms-3">
                            <h5 class="card-title">Schedule / Organize</h5>
                            <p class="card-text"><p class="card-text">You can organize your lectures using the calendar. Create your personalized timetable and visualize it on the calendar.</p>
                        </div>
                    </div>
                </div>

                <div class="col col-sm-12 offset-lg-1 col-lg-4 px-5 py-3">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <i class="far fa-calendar-check fa-8x"></i>
                        </div>

                        <div class="flex-grow-1 ms-3">
                            <h5 class="card-title">Course Enrollment</h5>
                            <p class="card-text"><p class="card-text">Students who wish to add enroll themselves to classes have this option on our website. Enroll yourself to courses and learn new things.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container mt-3 mb-5">
            <h1 class="display-6 fw-normal text-center py-3">Popular Blog Posts</h1>
            <div id="carouselControls" class="carousel carousel-dark slide" data-bs-ride="carousel">
                <div class="carousel-inner w-75 mx-auto">
                    @for($i = 0; $i < count($popularPosts) - 1; $i++)
                        <div class="carousel-item {{ $i == 0 ? 'active' : '' }}">
                            <div class="card-group d-flex flex-wrap">
                                <div class="card mx-2">
                                    <div class="card-body d-flex flex-column">
                                        <h5 class="card-title">{{ $popularPosts[$i]->title }}</h5>
                                        <p class="card-text text-truncate">{{ $popularPosts[$i]->description }}</p>
                                        <a href="{{ route('blog.show', $popularPosts[$i]->id) }}" class="card-link text-end text-decoration-none mt-auto">Read more</a>
                                    </div>
                                </div>

                                <div class="card mx-2">
                                    <div class="card-body d-flex flex-column">
                                        <h5 class="card-title">{{ $popularPosts[$i + 1]->title }}</h5>
                                        <p class="card-text text-truncate">{{ $popularPosts[$i + 1]->description }}</p>
                                        <a href="{{ route('blog.show', $popularPosts[$i + 1]->id) }}" class="card-link text-end text-decoration-none mt-auto">Read more</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>

                <button class="carousel-control-prev" type="button" data-bs-target="#carouselControls" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>

                <button class="carousel-control-next" type="button" data-bs-target="#carouselControls" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>
@endsection
