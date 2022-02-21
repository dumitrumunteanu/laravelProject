import { Calendar } from '@fullcalendar/core';
import dayGridPlugin from '@fullcalendar/daygrid';
import timeGridPlugin from '@fullcalendar/timegrid';
import listPlugin from '@fullcalendar/list';

document.addEventListener('DOMContentLoaded', function() {
    let calendarEl = document.getElementById('calendar');

    let calendar = new Calendar(calendarEl, {
        plugins: [ dayGridPlugin, timeGridPlugin, listPlugin ],
        initialView: 'dayGridMonth',
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
        navLinks: true,
        nowIndicator: true,
        dayMaxEvents: true,
        businessHours: true,
        selectable: true,
        selectMirror: true,
        select: function(arg) {
            let addEventModal = new bootstrap.Modal(document.getElementById("addEvent"), {});
            addEventModal.show();

            document.getElementById("start-date").value = arg.startStr.split(/[T,\+]/)[0];
            document.getElementById("start-time").value = arg.startStr.split(/[T,\+]/)[1].slice(0, 5);
            document.getElementById("end-date").value = arg.endStr.split(/[T,\+]/)[0];
            document.getElementById("end-time").value = arg.endStr.split(/[T,\+]/)[1].slice(0, 5);

            calendar.unselect()
        },
        events: '/calendar/events'
    });

    calendar.render();
});
