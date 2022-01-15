<div class="card shadow my-3">
    <a href="" class="card-block text-decoration-none text-dark">
        <div class="card-body">
            <h5 class="card-title">{{ $task->title }}</h5>
            <h6 class="card-subtitle mb-2 text-muted">Due: {{ date('d.m.Y H:i', strtotime($task->date_due)) }}</h6>
        </div>
    </a>
</div>
