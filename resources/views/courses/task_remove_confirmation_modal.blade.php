<div class="modal fade" id="removeTaskConfirmation" tabindex="-1" aria-labelledby="confirmationLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-fullscreen-sm-down">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addCourseLabel">Are you sure you want to remove this task?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
                <form action="{{ route('task.delete', ['courseId' => $course->id,'taskId' => $task->id]) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary">Yes</button>
                </form>
            </div>
        </div>
    </div>
</div>
