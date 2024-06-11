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
        <div class="col-auto mb-3 download-grp">
            <a href="#" data-bs-toggle="modal" data-bs-target="#my_event" class="btn btn-outline-danger"><i class="fas fa-plus"></i> Add Event</a>
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

    $('#eventStart, #eventEnd').datetimepicker({
        format: 'YYYY-MM-DD HH:mm',
        sideBySide: true
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
            right: 'month,agendaWeek,agendaDay,listMonth'
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
        eventRender: function (event, element) {
            element.css('background-color', '#F58872');
            element.tooltip({
                title: `<strong>${event.title}</strong><br>${moment(event.start).format('YYYY-MM-DD HH:mm')} - ${moment(event.end).format('YYYY-MM-DD HH:mm')}`,
                html: true,
                container: 'body'
            });
            element.click(function() {
                $('#eventId').val(event.id);
                $('#eventName').val(event.title);
                $('#eventStart').val(moment(event.start).format('YYYY-MM-DD HH:mm'));
                $('#eventEnd').val(moment(event.end).format('YYYY-MM-DD HH:mm'));
                $('#saveEvent').text('Update Event');
                $('#deleteEvent').show();
                $('#my_event').modal('show');
            });
        },
        selectable: true,
        selectHelper: true,
        select: function (start, end) {
            $('#eventForm')[0].reset();
            $('#eventId').val('');
            $('#eventStart').val(moment(start).format('YYYY-MM-DD HH:mm'));
            $('#eventEnd').val(moment(end).format('YYYY-MM-DD HH:mm'));
            $('#saveEvent').text('Create Event');
            $('#deleteEvent').hide();
            $('#my_event').modal('show');
            calendar.fullCalendar('unselect');
        },
        eventDrop: function (event) {
            $.ajax({
                url: SITEURL + "/calendar-crud-ajax",
                type: "POST",
                data: {
                    id: event.id,
                    event_name: event.title,
                    event_start: event.start.format('YYYY-MM-DD HH:mm'),
                    event_end: event.end ? event.end.format('YYYY-MM-DD HH:mm') : event.start.format('YYYY-MM-DD HH:mm'),
                    type: 'edit'
                },
                success: function () {
                    displayMessage("Event updated");
                }
            });
        },
        eventClick: function (event) {
            $('#eventId').val(event.id);
            $('#eventName').val(event.title);
            $('#eventStart').val(moment(event.start).format('YYYY-MM-DD HH:mm'));
            $('#eventEnd').val(moment(event.end ? event.end : event.start).format('YYYY-MM-DD HH:mm'));
            $('#saveEvent').text('Update Event');
            $('#deleteEvent').show();
            $('#my_event').modal('show');
        }
    });

    $('#saveEvent').on('click', function() {
        var id = $('#eventId').val();
        var title = $('#eventName').val();
        var start = $('#eventStart').val();
        var end = $('#eventEnd').val();

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
                success: function () {
                    displayMessage(type === 'create' ? "Event created." : "Event updated.");
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
                success: function () {
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