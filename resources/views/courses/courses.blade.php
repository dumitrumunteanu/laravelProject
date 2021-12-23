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
    @include('components.filter')

    <div class="container">
        <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 g-4">
            @foreach($courses as $course)
                @include('courses.course_card_template')
            @endforeach
        </div>
    </div>

    <div class="modal fade" id="addCourse" tabindex="-1" aria-labelledby="addCourseLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-fullscreen-sm-down">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addCourseLabel">Add new course</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <form id="createCourse">
                            <div class="row mb-3">
                                <label for="courseTitle" class="col-2 col-form-label">Title</label>
                                <div class="col-10">
                                    <input type="text" id="courseTitle" name="courseTitle" placeholder="Course title" class="form-control">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="courseBg" class="col-2 col-form-label">Wallpaper</label>
                                <div class="col-10">
                                    <input class="form-control" type="file" id="courseBg" accept="image/*">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="courseDescription" class="col-2 col-form-label">Details</label>
                                <div class="col-10">
                                    <textarea name="courseDescription" id="courseDescription" rows="3" placeholder="Course details/comments" class="form-control"></textarea>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" form="createEvent" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
@endsection
