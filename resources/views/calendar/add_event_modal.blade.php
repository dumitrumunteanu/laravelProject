<div class="modal fade" id="addEvent" tabindex="-1" aria-labelledby="addEventLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-fullscreen-sm-down">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addEventLabel">Add new event</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form id="createEvent" name="createEvent" method="POST" action="{{ route('events.add') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <label for="title" class="col-2 col-form-label">Title</label>
                            <div class="col-10">
                                <select id="title" name="title" class="form-control @error('title') is-invalid @enderror">
                                    <option value="">Choose the course for the event</option>
                                    @foreach(Auth::user()->courses as $course)
                                        <option value="{{ $course->id }}" @if(old('title') === (string)$course->id) selected @endif>{{ $course->title }}</option>
                                    @endforeach
                                </select>
                                @error('title')
                                <div class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="start-date" class="col-2 col-form-label">Start</label>
                            <div class="col-5">
                                <input value="{{ old('start-date') }}" type="date" id="start-date" name="start-date" class="form-control @error('start-date') is-invalid @enderror">
                                @error('start-date')
                                <div class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                            </div>
                            <div class="col-5">
                                <input value="{{ old('start-time') }}" type="time" id="start-time" name="start-time" class="form-control @error('start-time') is-invalid @enderror">
                                @error('start-time')
                                <div class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="end_date" class="col-2 col-form-label">End</label>
                            <div class="col-5">
                                <input value="{{ old('end-date') }}" type="date" id="end-date" name="end-date" class="form-control @error('end-date') is-invalid @enderror">
                                @error('end-date')
                                <div class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                            </div>
                            <div class="col-5">
                                <input value="{{ old('end-time') }}" type="time" id="end-time" name="end-time" class="form-control @error('end-time') is-invalid @enderror">
                                @error('end-time')
                                <div class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="recurrence-type" class="col-2 col-form-label">Occurs</label>
                            <div class="col-10">
                                <select class="form-select @error('recurrence-type') is-invalid @enderror" name="recurrence-type" id="recurrence-type">
                                    <option value="once" @if(old('recurrence-type') === 'once') selected @endif>Just once</option>
                                    <option value="daily" @if(old('recurrence-type') === 'daily') selected @endif>Daily</option>
                                    <option value="weekly" @if(old('recurrence-type') === 'weekly') selected @endif>Weekly</option>
                                    <option value="monthly" @if(old('recurrence-type') === 'monthly') selected @endif>Monthly</option>
                                </select>
                                @error('recurrence-type')
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
                <button type="submit" form="createEvent" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>

@if ($errors->any())
    <script>
        var addEventDOM = document.getElementById("addEvent");
        addEventDOM.classList.remove("fade");
        var addEventModal = new bootstrap.Modal(addEventDOM, {});
        addEventModal.show();
        addEventDOM.classList.add("fade");
    </script>
@endif
