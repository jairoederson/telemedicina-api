$(document).ready(function() {

    /* Calendar */
    function ini_events(ele) {
        ele.each(function() {

            // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
            // it doesn't need to have a start or end
            var eventObject = {
                title: $.trim($(this).text()) // use the element's text as the event title
            };

            // store the Event Object in the DOM element so we can get to it later
            $(this).data('eventObject', eventObject);

            // make the event draggable using jQuery UI
            $(this).draggable({
                zIndex: 1070,
                revert: true, // will cause the event to go back to its
                revertDuration: 0 //  original position after the drag
            });

        });
    }
    ini_events($('#external-events div.external-event'));


    /* initialize the calendar
     -----------------------------------------------------------------*/
    //Date for the calendar events (dummy data)
    //Date for the calendar events (dummy data)
    var date = new Date();
    var d = date.getDate(),
        m = date.getMonth(),
        y = date.getFullYear();
    $('#calendar').fullCalendar({
        displayEventTime: false,
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
        },
        buttonText: {
            prev: "",
            next: "",
            today: 'Today',
            month: 'Month',
            week: 'Week',
            day: 'Day'
        },
        //Random events
        events: [{
            title: 'Team Out',
            start: new Date(y, m, 1),
            backgroundColor: ('#418BCA')
        },
            {
                title: 'Holiday',
                start: new Date(y, m,  10),
                backgroundColor: ('#01BC8C')
            }, {
                title: 'Seminar',
                start: new Date(y, m, 12),
                backgroundColor: ('#67C5DF')
            }, {
                title: 'Product Seminar',
                start: '2018-01-18',
                end: '2018-01-20',
                backgroundColor: "#A9B6BC"
            },{
                title: 'Anniversary Celebrations',
                start: new Date(y, m, 22),
                backgroundColor: ('#EF6F6C')
            },{
                title: 'Event Day',
                start: new Date(y, m, 31),
                backgroundColor: ('#EF6F6C')
            }, {
                title: 'Product Seminar',
                start: '2018-01-22',
                end: '2018-01-25',
                backgroundColor: "#A9B6BC"
            }, {
                title: 'Product Seminar',
                start: '2018-02-18',
                end: '2018-02-20',
                backgroundColor: "#A9B6BC"
            }, {
                title: 'Product Seminar',
                start: '2018-02-10',
                end: '2018-02-15',
                backgroundColor: "#A9B6BC"
            }, {
                title: 'Product Seminar',
                start: '2018-02-14T04:20:15',
                end: '2018-02-18T04:20:15',
                backgroundColor: "#A9B6BC"
            }, {
                title: 'Product Seminar',
                start: '2018-02-4T04:20:15 ',
                end: '2018-02-5T04:20:15',
                backgroundColor: "#A9B6BC"
            }],
        eventClick: function(calEvent, jsEvent, view) {
            evt_obj=calEvent;
            $("#event_title").val(evt_obj.title);
            currColor=evt_obj.backgroundColor;
            colorChooser.css({
                "background-color": evt_obj.backgroundColor,
                "border-color": evt_obj.backgroundColor
            }).html('Type <span class="caret"></span>');
            $('#evt_modal').modal('show').on("shown.bs.modal",function(){
                $("#event_title").focus();
            }).on("hidden.bs.modal",function () {
                evt_obj="";
            });
            $(".text_save").on("click",function () {
                evt_obj.title=$("#event_title").val();
                evt_obj.backgroundColor=currColor;
                $('#calendar').fullCalendar('updateEvent', evt_obj);
                // setTimeout(setpopover,100);
            });
        },
        editable: true,
        eventLimit: true,
        droppable: true,
        drop: function(date, allDay) {

            // retrieve the dropped element's stored Event Object
            var originalEventObject = $(this).data('eventObject');

            // we need to copy it, so that multiple events don't have a reference to the same object
            var copiedEventObject = $.extend({}, originalEventObject);
            var $calendar_badge= $(".calendar_badge");
            // assign it the date that was reported
            copiedEventObject.start = date;
            copiedEventObject.allDay = allDay;
            copiedEventObject.backgroundColor = $(this).css("background-color");
            copiedEventObject.borderColor = $(this).css("border-color");

            $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);
            $calendar_badge.text(parseInt($calendar_badge.text()) + 1);
            // is the "remove after drop" checkbox checked?
            if ($('#drop-remove').is(':checked')) {
                $(this).remove();
            }
            // setpopover();
        },
        eventDrop: function() {
            // setTimeout(setpopover,100);
        },
        eventResize:function() {
            // setTimeout(setpopover,100);
        }
    });

    /* ADDING EVENTS */
    var defaultColor = "#A9B6BC";
    var lettercolor = "#fff"; //default
    $("#color-chooser-btn").css({ "background-color": defaultColor, "color": lettercolor });
    //Color chooser button
    var colorChooser = $(".color-chooser");
    $('.reset').on('click',function(){
        $('#new-event').val('');
    });
    $("#color-chooser > li > a").click(function(e) {
        e.preventDefault();
        var colorChooser = $(this).closest('.input-group-btn').find(".color-chooser");

        //Save color
        currColor = $(this).css("background-color");
        //Add color effect to button
        colorChooser
            .css({
                "background-color": currColor,
                "border-color": currColor
            })
            .html($(this).text() + ' <span class="caret"></span>');
    });
    $("#add-new-event").click(function(e) {
        e.preventDefault();
        //Get value and make sure it is not null
        var val = $("#new-event").val();
        if (val.length == 0) {
            return;
        }

        //Create event
        var event = $("<div />");
        event.css({
            "background-color": currColor,
            "border-color": currColor,
            "color": "#fff"
        }).addClass("external-event");
        event.html(val).append('<i class="fa fa-times event-clear" aria-hidden="true" style="margin-left: 3px;"></i>');
        $('#external-events').prepend(event);

        //Add draggable funtionality
        ini_events(event);

    });
    //Remove event from text input
    $('.createevent_btn').on("click", function() {
        $("#new-event").val(" ");
    });
    $(document).on('click', '.event-clear', function() {
        $(this).closest('div').remove();
    });
});
$('input[type="checkbox"].custom-checkbox').iCheck({
    checkboxClass: 'icheckbox_minimal-blue',
    increaseArea: '20%'
});

function setpopover() {
    $(".fc-month-view").find(".fc-event-container a").each(function() {
        $(this).popover({
            placement: 'top',
            html: true,
            content: $(this).text(),
            trigger: 'hover'
        });
    });
    $(".fc-month-button").on('click',function () {
        $(".fc-event-container a").each(function() {
            $(this).popover({
                placement: 'top',
                html: true,
                content: $(this).text(),
                trigger: 'hover'
            });
        });
        return false;
    })
}
$(".fc-center").find('h2').css("font-size",'18px');
// setpopover();
$(".fc-button-group button,.fc-today-button").removeClass("fc-state-default");

