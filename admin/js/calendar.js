
$(document).ready(function () {
    var calendar = $('#calendar').fullCalendar({
        editable: true,
        events: "appointmentGet.php",
        displayEventTime: false,
        eventRender: function (event, element, view) {
            if (event.allDay === 'true') {
                event.allDay = true;
            } else {
                event.allDay = false;
            }
        },
        selectable: true,
        selectHelper: true,
        select: function (start, end, allDay) {
            
            $('#addAppointment').modal('show');
            var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
            var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");

            $('body').on('click', '#requestSubmit', function(e) {
              
                e.preventDefault();

               
                var title = $('#appointmentTitle').val();
                var description = $('#appointmentDescription').val();
                var time = $('#appointmentTime').val();
                var name = $('#appointmentVehicleName').val();
                var model = $('#appointmentVehicleModel').val();
                var brand = $('#appointmentVehicleBrand').val();
                var address = $('#appointmentAddress').val();
                if(title=="" || description==""){
                    return false;
                }else{

                $.ajax({
                    url: 'appointmentAdd.php',
                    data: 'title=' + title + '&start=' + start + '&end=' + end +'&description='+ description +'&time='+ time +'&name='+ name +'&model='+ model +'&brand='+ brand +'&address='+ address,
                    type: "POST",
                    success: function (data) {
                        alert(data);
                        $("#appointmentForm")[0].reset();
                    }
                });
                calendar.fullCalendar('renderEvent',
                        {
                            title: title,
                            start: start,
                            end: end,
                            allDay: allDay
                        },
                true
                        );
                    }
            })
            calendar.fullCalendar('unselect');
        },
        
        editable: true,
        eventDrop: function (event, delta) {
                    var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
                    var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
                    $.ajax({
                        url: 'appointmentAdd.php',
                        data: 'title=' + event.title + '&start=' + start + '&end=' + end + '&id=' + event.id,
                        type: "POST",
                        success: function (response) {
                            displayMessage("Updated Successfully");
                        }
                    });
                },
        eventClick: function (event) {
            var deleteMsg = confirm("Do you really want to delete?");
            if (deleteMsg) {
                $.ajax({
                    type: "POST",
                    url: "appointmentDelete.php",
                    data: "&id=" + event.id,
                    success: function (response) {
                        if(parseInt(response) > 0) {
                            $('#calendar').fullCalendar('removeEvents', event.id);
                            alert("Deleted Successfully");
                        }
                    }
                });
            }
        }

    });
});

function displayMessage(message) {
        $(".response").html("<div class='success'>"+message+"</div>");
    setInterval(function() { $(".success").fadeOut(); }, 1000);
}