<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        #calendar-container {
            position: fixed;
            top: 0;
            left: 4.5rem;
            right: 0;
            bottom: 0;
            z-index: 1000;
            min-height: 100vh;
        }

        .fc-header-toolbar {
            padding-top: 1.5rem;
            padding-left: 1em;
            padding-right: 1em;
        }
    </style>

    <link rel="stylesheet" href="{{ asset('css/calendar.css') }}">
    <script src="{{ asset('js/calendar.js') }}"></script>

    <script src="https://kit.fontawesome.com/aac533ff8d.js" crossorigin="anonymous"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                height: '100%',
                expandRows: true,
                slotMinTime: '06:00',
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
                },
                locale: {
                    code: 'en-gb',
                    week: {
                        dow: 1,
                        doy: 4,
                    }
                },
                initialView: 'dayGridMonth',
                navLinks: true,
                editable: true,
                nowIndicator: true,
                dayMaxEvents: true,
                businessHours: true,
                selectable: true,
                selectMirror: true,
                select: function(arg) {
                    var addEventModal = new bootstrap.Modal(document.getElementById("addEvent"), {});

                    addEventModal.show();
                    document.getElementById("startDate").value = arg.startStr.split(/[T,\+]/)[0];
                    document.getElementById("startTime").value = arg.startStr.split(/[T,\+]/)[1];
                    document.getElementById("endDate").value = arg.endStr.split(/[T,\+]/)[0];
                    document.getElementById("endTime").value = arg.endStr.split(/[T,\+]/)[1];

                    // if (title) {
                    calendar.addEvent({
                        // title: title,
                        start: arg.start,
                        end: arg.end,
                        allDay: arg.allDay
                    })
                    //}
                    calendar.unselect()
                },
                eventClick: function(arg) {
                    if (confirm('Are you sure you want to delete this event?')) {
                        arg.event.remove()
                    }
                },
                events: [
                    {
                        title: 'My repeating event',
                        startTime: '10:30:00',
                        endTime: '12:00:00',
                        daysOfWeek: ['1', '4']
                        //color: 'red' //can also be hex
                    },
                    {
                        title: 'Meeting',
                        start: '2021-11-12T10:30:00',
                        end: '2021-11-12T12:30:00'
                    },
                    {
                        title: 'Lunch',
                        start: '2021-11-12T12:00:00'
                    },
                    {
                        title: 'Meeting',
                        start: '2021-11-12T14:30:00'
                    },
                    {
                        title: 'Happy Hour',
                        start: '2021-11-12T17:30:00'
                    },
                    {
                        title: 'Dinner',
                        start: '2021-11-12T20:00:00'
                    },
                    {
                        title: 'Birthday Party',
                        start: '2021-11-13T07:00:00'
                    }
                ]
            });

            calendar.render();
        });
    </script>
</head>
    <body class="bg-light">
        @include('components.headers.logged_in_header')

        <div id="calendar-container"><div id="calendar"></div></div>

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
                                        <input id="eventTitle" list="userCourses" name="eventTitle" placeholder="Set or choose event title" class="form-control">
                                        <datalist id="userCourses">
                                            <option value="Datastructures and Algorithms">
                                            <option value="Computer Graphics">
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

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script>
            (function () {
                var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
                tooltipTriggerList.forEach(function (tooltipTriggerEl) {
                    new bootstrap.Tooltip(tooltipTriggerEl);
                })
            })()
        </script>
    </body>
</html>
