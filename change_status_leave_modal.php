<div class="modal fade leave" id="status<?php echo $row_leave['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <form class="needs-validation" enctype="multipart/form-data" action="request_leave_status.php" method="post" novalidate>
        <input type="hidden" name="id" value="<?php echo $row_leave['id'] ?>">
                                        <div class="modal-dialog modal-md">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="myExtraLargeModalLabel">Change Status</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                        <input type="hidden" id="email" value="<?php echo $row_user['email_add'] ?>">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label" for="validationCustom03">Status</label>
                                                <select name="status" class="form-control">
                                                    <option selected="" disabled="">Select Status</option>
                                                    <option value="Approved">Approve</option>
                                                    <option value="Rejected">Reject</option>
                                                </select>
                                                <div class="invalid-feedback">
                                                    Please provide a valid data.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            <input type="hidden" id="subject" value="CLSU Dormitory Management System">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label" for="validationCustom03">Leave a message</label>
                                                <input name="message" class="form-control" id="body" rows="3">
                                                <div class="invalid-feedback">
                                                    Please provide a valid data.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <div>
                                <div class="modal-footer">
                                            <div class="btn-group float-end"  role="group">
                                                <button type="button" class="btn btn-danger w-md" data-bs-dismiss="modal"><i class="mdi mdi-close-thick"></i> Cancel </button> 
                                                <button class="btn btn-primary w-md waves-effect waves-light" type="submit" name="btn_leave" onclick="sendEmail();myFunction()">Send</button>
                                            </div>
                                        </div>
                                     </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
  <script type="text/javascript">
        function sendEmail() {
            var email = $("#email");
            var body = $("#body");
            var subject = $("#subject");

            if (isNotEmpty(email) && isNotEmpty(body) && isNotEmpty(subject)) {
                $.ajax({
                   url: 'send_message_email.php',
                   method: 'POST',
                   dataType: 'json',
                   data: {
                       email: email.val(),
                       body: body.val(),
                       subject: subject.val()
                   }, success: function (response) {
                        $('#myForm')[0].reset();
                       /* $('.sent-notification').text("Message Sent Successfully.");*/
                   }
                });
            }
        }

        function isNotEmpty(caller) {
            if (caller.val() == "") {
                caller.css('border', '1px solid red');
                return false;
            } else
                caller.css('border', '');

            return true;
        }
    </script>

     <script>
function myFunction() {
  alert("Notification was sent to your email!");
}
</script>