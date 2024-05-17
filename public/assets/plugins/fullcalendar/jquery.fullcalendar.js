$(document).ready(function() {
    $('#calendar').fullCalendar({
        header: {
            left: 'month, agendaWeek, agendaDay, list',
            center: 'title',
            right: 'prev,today,next'
        },
        buttonText: {
            today: 'Today',
            month: 'Month',
            week: 'Week',
            day: 'Day',
            list: 'List',
        },
        events: [{
                title: 'Marko',
                start: '2024-05-17T09:00',
                end: '2024-05-18T13:00',
                color: 'blue'
            },
            {
                title: 'Andi Amalia',
                start: '2024-05-17T15:00',
                end: '2024-05-17T17:00'

            }

        ]

    });
});