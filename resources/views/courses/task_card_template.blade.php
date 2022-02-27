<div class="card shadow my-3">
    <div class="card-block text-decoration-none text-dark">
        <div class="card-body row row-cols-2 align-items-center">
            <div class="col">
                <h5 class="card-title">{{ $task->title }}</h5>
                <h6 class="card-subtitle mb-2 text-muted">Due: {{ date('d.m.Y H:i', strtotime($task->date_due)) }}</h6>
            </div>
            <div class="col text-end">
                <a href="" class="btn btn-primary">View</a>
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#removeTaskConfirmation">
                    <i class="fas fa-times"></i> Delete
                </button>
            </div>
        </div>
    </div>
</div>
