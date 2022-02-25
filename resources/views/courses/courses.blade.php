@extends(Auth::check() ? 'layouts.app_logged_in' : 'layouts.app_logged_out')

@section('content')
    <div class="container">
        <h1 class="display-4 fw-bold">
            @if(Auth::check())
                My Courses
            @else
                Courses
            @endif
        </h1>
        <hr>
    </div>

    @section('button')
        @if(Auth::check())
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCourse">
                <i class="fas fa-plus"></i> New Course
            </button>
        @endif
    @endsection
    @include('components.filter', ['courses' => $courses])

    <div class="container">
        <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 g-4">
            @foreach($courses as $course)
                @include('courses.course_card_template')
            @endforeach
        </div>
    </div>

    @if(Auth::check())
        <form id="createCourse" name="createCourse" method="POST" action="{{ route('course.create') }}" enctype="multipart/form-data">
            @csrf
            <div class="modal fade" id="addCourse" tabindex="-1" aria-labelledby="addCourseLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-fullscreen-sm-down">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h5 class="modal-title" id="addCourseLabel">Add new course</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="container-fluid">

                                    <div class="row mb-3">
                                        <label for="title" class="col-2 col-form-label">Title</label>
                                        <div class="col-10">
                                            <input value="{{ old('title') }}" type="text" id="title" name="title" placeholder="Course title" class="form-control @error('title') is-invalid @enderror">
                                            @error('title')
                                            <div class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="image" class="col-2 col-form-label">Wallpaper</label>
                                        <div class="col-10">
                                            <input id="image" name="image" type="file"  accept="image/*" class="form-control @error('image') is-invalid @enderror">
                                            @error('image')
                                            <div class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="description" class="col-2 col-form-label">Details</label>
                                        <div class="col-10">
                                            <textarea name="description" id="description" rows="3" placeholder="Course details/comments" class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                                            @error('description')
                                            <div class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    @endif

    <div class="row">
        {{$courses->links()}}
    </div>

    @if ($errors->any())
        <script>
            var addCourseDOM = document.getElementById("addCourse");
            addCourseDOM.classList.remove("fade");
            var addCourseModal = new bootstrap.Modal(addCourseDOM, {});
            addCourseModal.show();
            addCourseDOM.classList.add("fade");
        </script>
    @endif
@endsection
