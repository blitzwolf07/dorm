<div class="modal fade" id="edit<?php echo $id ?>" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <form class="needs-validation" enctype="multipart/form-data" action="customerEdit.php" method="post" novalidate>
                                        <div class="modal-dialog modal-md">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="myExtraLargeModalLabel">Edit Customer</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                            <input type="hidden" name="id" value="<?php echo $id ?>">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label" for="validationCustom03">Customer Name</label>
                                                <input type="text" class="form-control" name="customer_name" id="validationCustom03" placeholder="Enter Customer Name" value="<?php echo $row_customer['customer_name'] ?>">
                                                <div class="invalid-feedback">
                                                    Please provide a valid data.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label" for="validationCustom03">Contact Person</label>
                                                <input type="text" class="form-control" name="contact_person" id="validationCustom03" placeholder="Enter Contact Person" value="<?php echo $row_customer['contact_person'] ?>">
                                                <div class="invalid-feedback">
                                                    Please provide a valid data.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label" for="validationCustom03">Address</label>
                                                <input type="text" class="form-control" name="customer_address" id="validationCustom03" placeholder="Customer Enter Address"  value="<?php echo $row_customer['customer_address'] ?>">
                                                <div class="invalid-feedback">
                                                    Please provide a valid data.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label" for="validationCustom03">Term</label>
                                                <input type="number" class="form-control" name="term" id="validationCustom03" placeholder="Enter Term"  value="<?php echo $row_customer['term'] ?>">
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
                                                <button type="submit" class="btn btn-primary w-md" name="btn_client"><i class="mdi mdi-check-bold"></i> Save</button>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>