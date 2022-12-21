<div class="modal fade update" id="update<?php echo $id ?>" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <form class="needs-validation" enctype="multipart/form-data" action="inventory_item_quantityUpdate.php" method="post" novalidate>
                                        <div class="modal-dialog modal-md">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="myExtraLargeModalLabel">Add Quantity</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <input type="hidden" name="id" value="<?php echo $id ?>">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label" for="validationCustom03">Supplier Name</label>
                                            <select name="supplier_id" class="form-control" id="validationCustom03" required="">
                                                <option disabled="" selected="">Select Supplier</option>
                                            <?php
                                            $supplier = mysqli_query($conn,"select * from tbl_supplier") or die (mysqli_error($conn));
                                            while($row_supplier = mysqli_fetch_assoc($supplier)) {
                                            ?>
                                            <option value="<?php echo $row_supplier['id'] ?>"><?php echo $row_supplier['supplier_name'] ?></option>
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
                                                <label class="form-label" for="validationCustom03">Expiry Date</label>
                                                <input type="date" class="form-control" name="exp_date" id="validationCustom03"  required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid data.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label" for="validationCustom03">Product Quantity</label>
                                                <input type="number" class="form-control" name="quantity" id="validationCustom03" placeholder="Enter quantity of product"  required>
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
                                                <button type="submit" class="btn btn-primary w-md" name="btn_quantity"><i class="mdi mdi-check-bold"></i> Save</button>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>