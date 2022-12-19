<div class="modal fade user" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <form class="needs-validation" enctype="multipart/form-data" action="userAdd.php" method="post" novalidate>
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="myExtraLargeModalLabel">Add User</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="validationCustom03">Full Name</label>
                                                <input type="text" class="form-control" name="full_name" id="validationCustom03" placeholder="Enter Full Name"  required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid data.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="validationCustom03">Asign Dorm</label>
                                                <select name="dorm_id" class="form-control">
                                                    <option selected="" disabled="">Select Dorm. . .</option>
                                                    <?php
                                                    $dorm  = mysqli_query($conn,"select * from tbl_dorm") or die (mysqli_error($conn));
                                                    while ($row = mysqli_fetch_assoc($dorm)) { ?>
                                                       <option value="<?php echo $row['id'] ?>"><?php echo $row['dorm_name'] ?></option>
                                                  <?php } ?>
                                                </select>
                                                <div class="invalid-feedback">
                                                    Please provide a valid data.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label" for="validationCustom03">Profile Picture</label>
                                                <input type="file" class="form-control" name="id_picture" id="validationCustom03">
                                                <div class="invalid-feedback">
                                                    Please provide a valid data.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="mb-3">
                                                <label class="form-label" for="validationCustom03">Home Address</label>
                                                <input type="text" class="form-control" name="home_address" id="validationCustom03" placeholder="Enter Home Address" required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid data.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label" for="validationCustom03">Contact Number</label>
                                                <input type="number" class="form-control" name="contact_number" placeholder="Enter Contact Number" id="validationCustom03">
                                                <div class="invalid-feedback">
                                                    Please provide a valid data.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label" for="validationCustom03">Username</label>
                                                <input type="text" class="form-control" name="id_number" placeholder="Enter Username" id="validationCustom03">
                                                <div class="invalid-feedback">
                                                    Please provide a valid data.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label" for="validationCustom03">Password</label>
                                                <input type="password" class="form-control" name="password" id="validationCustom03" placeholder="Enter Password">
                                                <div class="invalid-feedback">
                                                    Please provide a valid data.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <div>
                                <div class="row">
                                    <div class="col-xl-12">
                                            <div class="btn-group btn-group-example mb-3 float-end"  role="group">
                                                <button type="button" class="btn btn-danger w-md" data-bs-dismiss="modal"><i class="mdi mdi-close-thick"></i> Cancel </button> 
                                                <button type="submit" class="btn btn-primary w-md" name="btn_user"><i class="mdi mdi-check-bold"></i> Save</button>
                                            </div>
                                        </div>
                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>