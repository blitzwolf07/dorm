<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
$query ="select * from tbl_supplier";
$results = $db_handle->runQuery($query);
 ?>
 <script type="text/javascript" src="jquery.min.js"></script> 
 <script type="text/javascript">
 
   function getItem(val) {
    $.ajax({
      type: "POST",
      url: "getItem.php",
      data: 'id='+val,
      success: function(data) {
        $(".item-list").html(data);
      }
    });
   }
 </script>
 <style type="text/css">
       .select2
  {
    width: 100%;
  }
  .select2-container .select2-selection--single {
    height: 38px!important;
    padding-top: 5px;
}
  </style>

<div class="modal fade sales" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <form enctype="multipart/form-data" class="needs-validation" action="orderAdd.php" method="post" novalidate>
                                        <div class="modal-dialog modal-md">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="myExtraLargeModalLabel">Order Product</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                            <input type="hidden" name="pt" value="<?php echo $_GET['id']; ?>" />
                            <input type="hidden" name="invoice_number" value="<?php echo $_GET['invoice_number'] ?>">
                            <div class="row">
                                <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label" for="validationCustom01">Product</label>
                                                <select name="supplier_id" class="form-control " id="validationCustom01 supplier_id" onChange="getItem(this.value);" required>
                                                <option disabled="" selected="">Select Product</option>
                                                    <?php
                                        foreach($results as $supplier) {
                                         ?>
                                         <option value="<?php echo $supplier['id']; ?>"><?php echo $supplier['supplier_name'] ?></option>
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
                                    <div class="mb-3">
                                            <label class="form-label" for="validationCustom01">Item</label>
                                            <select name="item_id" id="validationCustom01" class="form-control item-list" onChange="getCapacity(this.value);">
                                            <option value=""> Select Item</option>
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
                                                <label class="form-label" for="validationCustom01">Quantity</label>
                                                <input type="number" class="form-control" name="quantity_order" id="validationCustom01" required>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                <div>
                            <div class="modal-footer">
                                <div class="row">
                                    <div class="col-xl-12">
                                            <div class="btn-group btn-group-example mb-3 float-end" role="group">
                                                <button type="button" class="btn btn-danger w-md" data-bs-dismiss="modal"><i class="mdi mdi-close-thick"></i>No</button> 
                                                <button type="submit" class="btn btn-primary w-md" name="btn_sales"><i class="mdi mdi-check-bold"></i>Add</button>
                                            </div>
                                        </div>
                                </div>
                            </div>
                                        </div>
                                                </div>

                                            </div>
                                            <!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                        </form>
                                    </div><!-- /.modal -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
                    <script type="text/javascript">
    $('.select2').select2();
</script>