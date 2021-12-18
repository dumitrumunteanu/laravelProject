<div class="col">
    <div class="card shadow">
        <a href="{{ route('course.show') }}" class="card-block text-decoration-none text-dark">
            <img src="{{ asset('storage/course_img').'/'.$course->image }}" height="150" class="card-img-top" alt="img">
            <div class="card-body">
                <h5 class="card-title">{{ $course->title }}</h5>
            </div>
        </a>
    </div>
</div>
