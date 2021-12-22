<div class="modal fade" id="addEvent" tabindex="-1" aria-labelledby="addEventLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-fullscreen-sm-down">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addEventLabel">Add new event</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form id="createEvent">
                        <div class="row mb-3">
                            <label for="eventTitle" class="col-2 col-form-label">Title</label>
                            <div class="col-10">
                                <input id="eventTitle" list="userCourses" name="eventTitle" placeholder="Set or choose event title" class="form-control" autocomplete="off">
                                <datalist id="userCourses">
                                    @foreach(Auth::user()->courses as $course)
                                        <option data-value="{{ $course->id }}" value="{{ $course->title }}"></option>>
                                    @endforeach
                                </datalist>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="startDate" class="col-2 col-form-label">Start</label>
                            <div class="col-5">
                                <input type="date" id="startDate" name="startDate" class="form-control">
                            </div>
                            <div class="col-5">
                                <input type="time" id="startTime" name="startTime" class="form-control">

                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="endDate" class="col-2 col-form-label">End</label>
                            <div class="col-5">
                                <input type="date" id="endDate" name="startDate" class="form-control">
                            </div>
                            <div class="col-5">
                                <input type="time" id="endTime" name="endTime" class="form-control">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="repeatingEvent" class="col-2 col-form-label">Occurs</label>
                            <div class="col-10">
                                <select class="form-select" name="repeatingEvent" id="repeatingEvent">
                                    <option selected>Just once</option>
                                    <option value="1">Every weekday (Mon - Fri)</option>
                                    <option value="2">Daily</option>
                                    <option value="3">Weekly</option>
                                    <option value="4">Monthly</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="eventComments" class="col-2 col-form-label">Details</label>
                            <div class="col-10">
                                <textarea name="eventComments" id="eventComments" rows="3" placeholder="Event details/comments" class="form-control"></textarea>
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
