document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
        height: '100%',
        expandRows: true,
        scrollTime: '06:00',
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
            // calendar.addEvent({
            //     title: title,
            //     start: arg.start,
            //     end: arg.end,
            //     allDay: arg.allDay
            // })
            //}
            calendar.unselect()
        },
        // eventClick: function(arg) {
        //     if (confirm('Are you sure you want to delete this event?')) {
        //         arg.event.remove()
        //     }
        // },
        events: '/calendar/events'
    });

    calendar.render();
});
