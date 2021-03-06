@extends('layouts.app_logged_in')

@section('content')
    <div class="container">
        <h1 class="display-4 fw-bold mt-3">{{ $course->title }}</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('courses') }}">My Courses</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $course->title }}</li>
            </ol>
        </nav>
        <div class="border-start border-primary border-4 rounded">
            <p class="border border-2 border-start-0 rounded-end p-2 text-break">
                {{ $course->description }}
            </p>
        </div>
    </div>

    <div class="container my-4">
        <div class="col">
            <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addTask">
                <i class="fas fa-plus"></i> New Assignment
            </a>
        </div>
    </div>

    <div class="container">
        <div class="accordion accordion-flush" id="accordion-enrolled">
            <div class="accordion-item border shadow">
                <h2 class="accordion-header" id="flush-headingOne">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#enrolled-list" aria-expanded="false" aria-controls="enrolled-list">
                        Course Users List
                    </button>
                </h2>
                <div id="enrolled-list" class="accordion-collapse collapse" aria-labelledby="heading" data-bs-parent="#accordion-enrolled">
                    <div class="accordion-body">
                        @include('courses.enrolled')
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        @foreach($tasks as $task)
            @include('courses.task_card_template')
        @endforeach
    </div>

    <div class="modal fade" id="addTask" tabindex="-1" aria-labelledby="addTaskLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-fullscreen-sm-down">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addTaskLabel">Add new task</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <form id="createTask" name="createTask" method="POST" action="{{ route('task.create', $course->id) }}" enctype="multipart/form-data">
                            @csrf

                            <div class="row mb-3">
                                <label for="title" class="col-2 col-form-label">Title</label>
                                <div class="col-10">
                                    <input value="{{ old('title') }}" type="text" id="title" name="title" placeholder="Task title" class="form-control @error('title') is-invalid @enderror">
                                    @error('title')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="date" class="col-2 col-form-label">Date</label>
                                <div class="col-10">
                                    <input value="{{ old('date') }}" type="date" id="date" name="date" class="form-control @error('date') is-invalid @enderror">
                                    @error('date')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="time" class="col-2 col-form-label">Time</label>
                                <div class="col-10">
                                    <input value="{{ old('time') }}" type="time" id="time" name="time" class="form-control @error('time') is-invalid @enderror">
                                    @error('time')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="description" class="col-2 col-form-label">Details</label>
                                <div class="col-10">
                                    <textarea name="description" id="description" rows="3" placeholder="Task details/comments" class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                                    @error('description')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" form="createTask" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>

    @if(sizeof($tasks) > 0)
        @include('courses.task_remove_confirmation_modal')
    @else
        <div class="container my-5">
            <h3 class="text-muted text-center">No tasks yet!</h3>
        </div>
    @endif

    @include('components.toast')

    @if ($errors->any())
        <script>
            var addEventDOM = document.getElementById("addTask");
            addEventDOM.classList.remove("fade");
            var addEventModal = new bootstrap.Modal(addEventDOM, {});
            addEventModal.show();
            addEventDOM.classList.add("fade");
        </script>
    @endif
@endsection
