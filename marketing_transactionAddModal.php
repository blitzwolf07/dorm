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
        $("#item_list").html(data);
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
<div class="modal fade customer" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <form class="needs-validation" enctype="multipart/form-data" action="marketing_transactionAdd.php" method="post" novalidate>
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="myExtraLargeModalLabel">Inventory Transaction Form</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="validationCustom03">Client Name</label>
                                                <select class="form-control" name="client_id" id="validationCustom03" required>
                                                <option selected="" disabled="">Select Client</option>
                                                    <?php
                                                $client = mysqli_query($conn,"select * from tbl_client") or die (mysqli_error($conn));
                                                while($row_client = mysqli_fetch_assoc($client)) {
                                                     ?>
                                                    <option value="<?php echo $row_client['id'] ?>"><?php echo $row_client['customer_name'] ?></option>
                                                <?php } ?>
                                                </select>
                                                <div class="invalid-feedback">
                                                    Please provide a valid data.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="validationCustom03">Transaction</label>
                                                <select class="form-control" name="transaction" id="validationCustom03" required>
                                                <option selected="" disabled="">Select Transaction</option>
                                                <option value="inventory">Inventory</option>
                                                <option value="Total Sales">Total Sales</option>
                                                <option value="Total Per Kit">Total Per Kit</option>
                                                </select>
                                                <div class="invalid-feedback">
                                                    Please provide a valid data.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="validationCustom03">Invoice #</label>
                                                <input type="text" class="form-control" name="invoice_number" id="validationCustom03" placeholder="Enter Invoice #"  required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid data.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="validationCustom01">Product</label>
                                                <select name="product_id" class="form-control" id="validationCustom01 select2 supplier_id" onChange="getItem(this.value);" required>
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
                                <div class="col-md-6">
                                    <div class="mb-3">
                                            <label class="form-label" for="validationCustom01">Item</label>
                                            <select name="item_id" id="item_list" class="form-control" onChange="getCapacity(this.value);" required="">
                                            <option value=""> Select Item</option>
                                            </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="validationCustom03">Price</label>
                                                 <input type="text" class="form-control" name="item_price" id="item_price"  placeholder="Item Price">
                                                <div class="invalid-feedback">
                                                    Please provide a valid data.
                                                </div>
                                            </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label" for="validationCustom03">No. of Orders</label>
                                                <input type="text" class="form-control" onkeyup="sum();" name="no_of_orders" id="no_order" placeholder="Enter No. of Orders"  required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid data.
                                                </div>
                                         </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                            <label class="form-label" for="validationCustom01">Total Price</label>
                                            <input type="text" class="form-control" name="total_sale" id="total_sale" onkeyup="sum();" placeholder="Total Sale"  readonly="">
                                                <div class="invalid-feedback">
                                                    Please provide a valid data.
                                                </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                            <label class="form-label" for="validationCustom01">Date</label>
                                            <input type="date" class="form-control" name="date" id="date">
                                                <div class="invalid-feedback" required>
                                                    Please provide a valid data.
                                                </div>
                                    </div>
                                </div>
                            </div>
                                <div>
                                <div class="modal-footer">
                                            <div class="btn-group btn-group-example mb-3 float-end"  role="group">
                                                <button type="button" class="btn btn-danger w-md" data-bs-dismiss="modal"><i class="mdi mdi-close-thick"></i> Cancel </button> 
                                                <button type="submit" class="btn btn-primary w-md" name="btn_transaction"><i class="mdi mdi-check-bold"></i> Save</button>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
<script type="text/javascript">
  function sum() {
    var item_price = document.getElementById('item_price').value;
    var no_order = document.getElementById('no_order').value;
    var total_sale = parseFloat(item_price) * parseFloat(no_order);

    document.getElementById('total_sale').value = total_sale;
  }
</script>