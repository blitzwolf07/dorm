<div class="modal fade" id="edit<?php echo $id ?>" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <form enctype="multipart/form-data" class="needs-validation" action="room_edit.php" method="post" novalidate>
        <input type="hidden" name="id" value="<?php echo $id ?>">
                                        <div class="modal-dialog modal-md">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="myExtraLargeModalLabel">Add Rooms </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-4">
                                                <label class="form-label" for="validationCustom01">Dorm Name</label>
                                                <select class="form-control" name="dorm_id">
                                                    <option value="<?php echo $row_dorm['id'] ?>"><?php echo $row_dorm['dorm_name'] ?></option>
                                                <?php
                                                $dorm = mysqli_query($conn,"select * from tbl_dorm") or die (mysqli_error($conn));
                                                while($row = mysqli_fetch_assoc($dorm)) {
                                                 ?>
                                                 <option value="<?php echo $row['id'] ?>"><?php echo $row['dorm_name'] ?></option>
                                                <?php } ?>
                                                </select>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-4">
                                                <label class="form-label" for="validationCustom01">Room Number</label>
                                                <input type="text" class="form-control" name="room_number" id="validationCustom01" value="<?php echo $row_rooms['room_number'] ?>">
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <div>
                            <div class="modal-footer">
                                            <div class="btn-group float-end" role="group">
                                                <button type="button" class="btn btn-danger w-md" data-bs-dismiss="modal"><i class="mdi mdi-close-thick"></i> Cancel </button> 
                                                <button type="submit" class="btn btn-primary w-md" name="btn_room"><i class="mdi mdi-check-bold"></i> Save</button>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>  <!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </form>
            </div><!-- /.modal -->