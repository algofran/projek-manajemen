$(document).ready(function() {
    $('#calendar').fullCalendar({
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
        },
        events: @json($events),
        editable: true,
        selectable: true,
        selectHelper: true,
        select: function(start, end) {
            var title = prompt('Event Title:');
            var eventData;
            if (title) {
                eventData = {
                    title: title,
                    start: start,
                    end: end
                };
                $.ajax({
                    url: '{{ route('
                    events.store ') }}',
                    method: 'POST',
                    data: eventData,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        $('#calendar').fullCalendar('renderEvent', {
                            id: response.id,
                            title: title,
                            start: start,
                            end: end
                        }, true);
                        $('#calendar').fullCalendar('unselect');
                    }
                });
            }
        },
        eventDrop: function(event, delta, revertFunc) {
            updateEvent(event, revertFunc);
        },
        eventResize: function(event, delta, revertFunc) {
            updateEvent(event, revertFunc);
        },
        eventClick: function(event) {
            var isDelete = confirm('Do you really want to delete this event?');
            if (isDelete) {
                $.ajax({
                    url: '/events/' + event.id,
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function() {
                        $('#calendar').fullCalendar('removeEvents', event.id);
                    }
                });
            }
        }
    });

    function updateEvent(event, revertFunc) {
        var eventData = {
            id: event.id,
            title: event.title,
            start: event.start.format(),
            end: event.end ? event.end.format() : null
        };
        $.ajax({
            url: '/events/' + event.id,
            method: 'PUT',
            data: eventData,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                // Event updated
            },
            error: function() {
                revertFunc();
            }
        });
    }
});