@extends('layouts.app_logged_in')

@section('content')
    <div class="container">
        <h1 class="display-4 fw-bold mt-3">Course 1</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="courses.html">My Courses</a></li>
                <li class="breadcrumb-item active" aria-current="page">Course 1</li>
            </ol>
        </nav>
        <hr>
    </div>

    <div class="container">
        <div class="card shadow my-3">
            <a href="taskdetails.html" class="card-block text-decoration-none text-dark">
                <div class="card-body">
                    <h5 class="card-title">Assignment example title</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Due: 12.12.1212</h6>
                </div>
            </a>
        </div>

        <div class="card shadow my-3">
            <div class="card-body">
                <h5 class="card-title">Another assignment here</h5>
                <h6 class="card-subtitle mb-2 text-muted">Due: 11.11.1111</h6>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="col">
            <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addTask">
                <i class="fas fa-plus"></i> New Assignment
            </a>
        </div>
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
                        <form id="createTask">
                            <div class="row mb-3">
                                <label for="taskTitle" class="col-2 col-form-label">Title</label>
                                <div class="col-10">
                                    <input type="text" id="taskTitle" name="taskTitle" placeholder="Task title" class="form-control">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="dateDue" class="col-2 col-form-label">Due</label>
                                <div class="col-5">
                                    <input type="date" id="dateDue" name="dateDue" class="form-control">
                                </div>
                                <div class="col-5">
                                    <input type="time" id="timeDue" name="timeDue" class="form-control">

                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="taskDescription" class="col-2 col-form-label">Details</label>
                                <div class="col-10">
                                    <textarea name="taskDescription" id="taskDescription" rows="3" placeholder="task details/comments" class="form-control"></textarea>
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
