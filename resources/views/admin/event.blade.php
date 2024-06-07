@extends('layouts.layout') 

@section('content')
<style>
    /* Custom styles for calendar and modal */
    #full_calendar_events {
        background: #f7f8fc;
        border-radius: 10px;
    }

    .fc-toolbar {
        background: #ffffff;
        color: #333;
        border-radius: 5px;
        padding: 10px;
    }

    .fc-button {
        background: #ff3434 !important;
        border: none !important;
        color: #ffffff !important;
        margin-right: 5px;
    }

    .fc-button:hover {
        background: #ffffff !important;
        color: #ff3434 !important;
    }

    .modal-content {
        border-radius: 10px;
    }

    .modal-header {
        background-color: #ffffff !important;   
        color: #333; /* Ensure text is visible */
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
    }

    .modal-footer {
        border-top: none;
        display: flex;
        justify-content: space-between;
    }
</style>

<div class="container">
    <div class="row align-items-center">
        <div class="col">
            <h2 class="page-title">Events</h2>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Events</li>
            </ul>
        </div>
        <div class="col-auto text-end ms-auto download-grp">
            <a href="#" data-bs-toggle="modal" data-bs-target="#my_event" class="btn btn-primary"><i class="fas fa-plus"></i> Add Event</a>
        </div>
    </div>
    
    <div class="row">
        <div class="col">
            <div id='full_calendar_events' class="rounded shadow p-3 mb-5 bg-white"></div>
        </div>
    </div>
    
</div>

<!-- Event Modal -->
<div class="modal fade" id="my_event" tabindex="-1" role="dialog" aria-labelledby="my_eventLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="my_eventLabel">Event Details</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="eventForm">
                <div class="modal-body">
                    <input type="hidden" id="eventId">
                    <div class="row">
                        <div class="col-12 mb-3">
                            <label for="eventName" class="form-label">Event Name <span class="login-danger">*</span></label>
                            <input type="text" id="eventName" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="eventStart" class="form-label">Event Start Date <span class="login-danger">*</span></label>
                            <input type="text" id="eventStart" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="eventEnd" class="form-label">Event End Date <span class="login-danger">*</span></label>
                            <input type="text" id="eventEnd" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="deleteEvent" class="btn btn-danger">Delete</button>
                    <button type="button" id="saveEvent" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection 

@section('script')
<script>
    $(document).ready(function () {
        var SITEURL = "{{ url('/') }}";

        // Initialize DateTimePicker
        $('#eventStart, #eventEnd').datetimepicker({
        format: 'YYYY-MM-DDTHH:mm', // Sesuaikan dengan format yang benar
        sideBySide: true // Menampilkan waktu dan tanggal secara bersamaan
    });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var calendar = $('#full_calendar_events').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            buttonText: {
                today: 'Hari Ini',
                month: 'Bulan',
                week: 'Minggu',
                day: 'Hari',
                list: 'Daftar',
            },
            editable: true,
            events: SITEURL + "/events/show",
            displayEventTime: true,
            eventRender: function (event, element, view) {
                var eventDuration = moment.duration(event.end.diff(event.start));
                var days = eventDuration.asDays();

                if (days > 1) {
                    // Render single pin if event spans multiple days
                    var eventPin = $('<div class="fc-event-container"></div>').css({
                        'background-color': '#FF5161',
                        'border-color': event.borderColor,
                        'color': event.textColor
                    }).html(event.title);

                    element.append(eventPin);
                } else {
                    // Render as usual if event spans only one day
                    element.tooltip({
                        title: `<strong>${event.title}</strong><br>${event.start.format('YYYY-MM-DD HH:mm')} - ${event.end.format('YYYY-MM-DD HH:mm')}`,
                        html: true,
                        container: 'body'
                    });
                    element.click(function() {
                        console.log('Event clicked:', event);
                        $('#eventId').val(event.id);
                        $('#eventName').val(event.title);
                        $('#eventStart').val(event.start.format('YYYY-MM-DDTHH:mm')); // Format datetime-local
                        $('#eventEnd').val(event.end.format('YYYY-MM-DDTHH:mm')); // Format datetime-local
                        $('#saveEvent').text('Update Event');
                        $('#deleteEvent').show(); // Show delete button when editing event
                        $('#my_event').modal('show'); // Show modal
                    });

                    // Change background color to red
                    element.css('background-color', '#FF5161'); // Soft red
                }
            },

            selectable: true,
            selectHelper: true,
            select: function (start, end, allDay) {
                $('#eventForm')[0].reset();
                $('#eventId').val('');
                $('#eventStart').val(moment(start).format('YYYY-MM-DDTHH:mm')); // Format datetime-local
                $('#eventEnd').val(moment(end).format('YYYY-MM-DDTHH:mm')); // Format datetime-local
                $('#saveEvent').text('Create Event');
                $('#deleteEvent').hide(); // Hide delete button when creating new
                $('#my_event').modal('show');
calendar.fullCalendar('unselect');
},
eventDrop: function (event, delta) {
var event_start = event.start; // Format datetime-local
var event_end = event.end ? event.end : event.start; // Make sure end date is not null

$.ajax({
                url: SITEURL + "/calendar-crud-ajax",
                type: "POST",
                data: {
                    id: event.id,
                    event_name: event.title,
                    event_start: event_start,
                    event_end: event_end,
                    type: 'edit'
                },
                success: function (response) {
                    displayMessage("Event updated");
                }
            });
        },
        eventClick: function (event) {
            $('#eventId').val(event.id);
            $('#eventName').val(event.title);
            $('#eventStart').val(moment(event.start).format('YYYY-MM-DDTHH:mm')); // Format datetime-local
            $('#eventEnd').val(moment(event.end ? event.end : event.start).format('YYYY-MM-DDTHH:mm')); // Make sure end date is not null and format datetime-local
            $('#saveEvent').text('Update Event');
            $('#deleteEvent').show(); // Show delete button when editing event
            $('#my_event').modal('show');
        }
    });

    $('#saveEvent').on('click', function() {
        var id = $('#eventId').val();
        var title = $('#eventName').val();
        var start = $('#eventStart').val();
        var end = $('#eventEnd').val();

        // Validate input values
        if (title && start && end) {
            var type = id ? 'edit' : 'create';
            $.ajax({
                url: SITEURL + "/calendar-crud-ajax",
                type: "POST",
                data: {
                    id: id,
                    event_name: title,
                    event_start: start,
                    event_end: end,
                    type: type
                },
                success: function (data) {
                    displayMessage(type == 'create' ? "Event created." : "Event updated.");
                    $('#my_event').modal('hide');
                    calendar.fullCalendar('refetchEvents');
                }
            });
        }
    });

    $('#deleteEvent').on('click', function() {
        var id = $('#eventId').val();

        if (id) {
            $.ajax({
                url: SITEURL + "/calendar-crud-ajax",
                type: "POST",
                data: {
                    id: id,
                    type: 'delete'
                },
                success: function (data) {
                    displayMessage("Event deleted.");
                    $('#my_event').modal('hide');
                    calendar.fullCalendar('refetchEvents');
                }
            });
        }
    });

    function displayMessage(message) {
        toastr.success(message, 'Event');            
    }
});
</script>
@endsection