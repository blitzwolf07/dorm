<div class="modal fade book" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <form enctype="multipart/form-data" class="needs-validation" action="dorm_add.php" method="post" novalidate>
                                        <div class="modal-dialog modal-md">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="myExtraLargeModalLabel">Add Dorm </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-4">
                                                <label class="form-label" for="validationCustom01">Dorm Name</label>
                                                <input type="text" class="form-control" name="dorm_name" id="validationCustom01" placeholder="Enter Dorm Name"  required>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-4">
                                                <label class="form-label" for="validationCustom01">Number of Rooms</label>
                                                <input type="text" class="form-control" name="number_rooms" id="validationCustom01" placeholder="Enter No. of Rooms"  required>
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
                                                <button type="submit" class="btn btn-primary w-md" name="btn_dorm"><i class="mdi mdi-check-bold"></i> Save</button>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>  <!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </form>
            </div><!-- /.modal -->