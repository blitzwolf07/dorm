<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
$query ="select * from tbl_dorm";
$results = $db_handle->runQuery($query);
 ?>
 <script type="text/javascript" src="jquery.min.js"></script> 
 <script type="text/javascript">
   function get_dorm(val) {
    $.ajax({
      type: "POST",
      url: "get_dorm.php",
      data: 'id='+val,
      success: function(data) {
        $("#room_list").html(data);
      }
    });
   }
   function get_room(val) {
    $.ajax({
      type: "POST",
      url: "get_room_no.php",
      data: 'id='+val,
      success: function(data) {      
        $("#room_id").val(data);

      }
    });
   }
 </script>
<div class="modal fade add" id="add<?php echo $id ?>" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <form class="needs-validation" enctype="multipart/form-data" action="student_rent_room_edit.php" method="post" novalidate>
                                        <div class="modal-dialog modal-md">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="myExtraLargeModalLabel">Edit Rent</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <input type="hidden" name="id" value="<?php echo $id ?>">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label" for="validationCustom03">Student Name</label>
                                            <select name="user_id" class="form-control" id="validationCustom03" required="">
                                                <option value="<?php echo $row_users['id'] ?>"><?php echo $row_users['full_name'] ?></option>
                                            <?php
                                            $student = mysqli_query($conn,"select * from tbl_users where role_id = 2") or die (mysqli_error($conn));
                                            while($row_student = mysqli_fetch_assoc($student)) {
                                            ?>
                                            <option value="<?php echo $row_student['id'] ?>"><?php echo $row_student['full_name'] ?></option>
                                        <?php } ?>
                                            </select>
                                                <div class="invalid-feedback">
                                                    Please provide a valid data.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label" for="validationCustom03">Dorm</label>
                                 <select name="dorm_id" id="building-list" class="form-control" onChange="get_dorm1(this.value);" required>
                                        <option value="<?php echo $row_dorm['id'] ?>"><?php echo $row_dorm['dorm_name'] ?></option>
                                        <?php
                                        foreach($results as $dorm) {
                                         ?>
                                         <option value="<?php echo $dorm['id']; ?>"><?php echo $dorm['dorm_name'] ?></option>
                                        <?php } ?>
                                        </select>
                                                <div class="invalid-feedback">
                                                    Please provide a valid data.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label" for="validationCustom03">Room No.</label>
                                            <select name="room_id" id="room_id" class="form-control" onChange="get_room1(this.value);">
                                    <option value=""> Select Room No.</option>
                                    </select>
                                                <div class="invalid-feedback">
                                                    Please provide a valid data.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="">
                                                <label class="form-label" for="validationCustom03">Date In</label>
                                                <input type="date" class="form-control" name="date_in" id="validationCustom03"  value="<?php echo $row_rent['date_in'] ?>">
                                                <div class="invalid-feedback">
                                                    Please provide a valid data.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="">
                                                <label class="form-label" for="validationCustom03">Date Out</label>
                                                <input type="date" class="form-control" name="date_out" id="validationCustom03"  value="<?php echo $row_rent['date_out'] ?>">
                                                <div class="invalid-feedback">
                                                    Please provide a valid data.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <div>
                                <div class="modal-footer">
                                            <div class="btn-group btn-group-example mb-3 float-end"  role="group">
                                                <button type="button" class="btn btn-danger w-md" data-bs-dismiss="modal"><i class="mdi mdi-close-thick"></i> Cancel </button> 
                                                <button type="submit" class="btn btn-primary w-md" name="btn_rent"><i class="mdi mdi-check-bold"></i> Save</button>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>