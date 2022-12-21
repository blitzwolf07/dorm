<div class="modal fade" id="order_status<?php echo $id ?>" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <form class="needs-validation" enctype="multipart/form-data" action="order_change_sattusUpdate.php" method="post" novalidate>
                                        <div class="modal-dialog modal-md">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="myExtraLargeModalLabel">Change Status Modal</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                <input type="hidden" name="id" value="<?php echo $id ?>">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label" for="validationCustom03">Change Satus. . .</label>
                                                <select class="form-control" name="status" id="validationCustom03" required> 
                                                <option selected="" disabled="">Select status</option>
                                                  <option value="3">Approve</option>
                                                  <option value="4">Reject</option>  
                                                </select>
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
                                                <button type="submit" class="btn btn-primary w-md" name="btn_order_status"><i class="mdi mdi-check-bold"></i> Save</button>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>