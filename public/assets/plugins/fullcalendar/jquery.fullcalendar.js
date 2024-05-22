$(document).ready(function() {
    $('#calendar').fullCalendar({
        header: {
            left: 'month,agendaWeek,agendaDay,list',
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
        events: [],
        eventRender: function(event, element) {
            element.popover({
                title: event.title,
                content: event.description,
                trigger: 'hover',
                placement: 'top',
                container: 'body'
            });
        }
    });

    $('#saveEvent').click(function() {
        var eventName = $('#eventName').val();
        var eventStart = $('#eventStart').val();
        var eventEnd = $('#eventEnd').val();

        $.ajax({
            url: "{{ route('events.store') }}",
            type: "POST",
            data: {
                '_token': '{{ csrf_token() }}',
                eventName: eventName,
                eventStart: eventStart,
                eventEnd: eventEnd
            },
            success: function(response) {
                $('#calendar').fullCalendar('refetchEvents');
                $('#my_event').modal('hide');
            },
            error: function(xhr, status, error) {
                var err = eval("(" + xhr.responseText + ")");
                alert(err.message);
            }
        });
    });
});