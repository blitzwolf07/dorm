<div class="modal fade paid<?php echo $id ?>" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <form class="needs-validation" enctype="multipart/form-data" action="soldAdd.php"  name="bla" method="post" novalidate>
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="myExtraLargeModalLabel">Inventory Sales and Releasing</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                        <input type="hidden" name="invoice_number" value="<?php echo $invoice_number ?>">
                        <input type="hidden" name="pt" value="<?php echo $_GET['id']; ?>" />
                        <input type="hidden" name="finalcode" value="<?php echo $finalcode; ?>">
                        <input type="hidden" name="total_amount" value="<?php echo $total ?>">
                                <div class="row">
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label class="form-label" for="validationCustom03">Reference</label>
                                        <select class="form-control" name="reference" d="validationCustom01" required="">
                                            <option value="Sales Invoice">Sales Invoice</option>
                                        </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label class="form-label" for="validationCustom03">Invoice #</label>
                                            <input type="text" class="form-control" name="invoice_number" id="validationCustom01" value="<?php echo $invoice_number ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label class="form-label" for="validationCustom03">Sales Agent</label>
                                    <select class="form-control" name="user_id" d="validationCustom01" required="">
                                            <option disabled="" selected="">Select Agent</option>
                                            <?php
                                            $sales_agent = mysqli_query($conn,"select * from tbl_users where position = 'Sales Agent' || position = 'sales agent' || position = 'Sale Agent' || position = 'Sales agent' || position = 'sales Agent' || position = 'Sales Agent'") or die (mysqli_error($conn));
                                            while ($row_agent = mysqli_fetch_assoc($sales_agent)) { ?>
                                                <option value="<?php echo $row_agent['id'] ?>"><?php echo $row_agent['code_name'] ?></option>
                                           <?php } ?>
                                        </select>
                                            </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-control">
                                            <h5 class="font-size-14">Value Added Taxation</h5>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="inclusive" id="radio1" value="12" onClick="summerize(this)">
                                                <label class="form-check-label" for="formRadios1">
                                                    Inclusive
                                                </label>
                                            </div>
                                            <div class="form-check">
                                            <input class="form-check-input" type="radio" name="exclusive" id="radio2" value="0" onClick="summerize(this)">
                                                <label class="form-check-label" for="formRadios2">
                                                    Exclusive
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label" for="validationCustom03">Customer Name</label>
                                                <select name="client_id" class="form-control" required="" id="client_id">
                                                    <option disabled="" selected="">Select Client</option>
                                                <?php 
                                                $customer = mysqli_query($conn,"select * from tbl_client") or die (mysqli_error($conn));
                                                while($row_customer = mysqli_fetch_assoc($customer)) {
                                                 ?>
                                                 <option value="<?php echo $row_customer['id'] ?>"><?php echo $row_customer['customer_name'] ?></option>
                                                <?php } ?>
                                                </select>                                               
                                                 <div class="invalid-feedback">
                                                    Please provide a valid data.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="mb-3">
                                                <label class="form-label" for="validationCustom03">Address</label>
                                                <input type="text" class="form-control" name="client_address" id="client_address" required="">                                            
                                                 <div class="invalid-feedback">
                                                    Please provide a valid data.
                                                </div>
                                            </div>
                                        </div>
                                    <div class="col-md-3 ms-auto mt-3">
                                        <div class="form-control">
                                            <div>
                                                <div class="form-check form-check-left">
                                                    <input class="form-check-input" type="radio" name="cash" id="radio1" 
                                                    value="Cash"/>
                                                    <label class="form-check-label" for="formRadiosRight1">
                                                        Cash
                                                    </label>
                                                </div>
                                            </div>

                                            <div>
                                                <div class="form-check form-check-left">
                                                    <input class="form-check-input" type="radio" name="charge" id="radio2" onClick="summerize(this)">
                                                    <label class="form-check-label" for="formRadiosRight2">
                                                        Charge
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <div>
                                <div class="row">
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                    <label class="form-label" for="validationCustom03">Customer PO #</label>
                                            <input type="text" class="form-control" name="client_po_no"  id="validationCustom01" required="">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                    <label class="form-label" for="validationCustom03">Credit Limit</label>
                                            <input type="text" class="form-control" name="credit_limit"  id="validationCustom01" value="0.00" required="">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                    <label class="form-label" for="validationCustom03">A/R Balance</label>
                                            <input type="text" class="form-control" name="ar_balance"  id="validationCustom01">
                                            </div>
                                        </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                    <label class="form-label" for="validationCustom03">Particular</label>
                                        <textarea class="form-control" name="particular"  id="validationCustom01"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                    <label class="form-label" for="validationCustom03">Special Instruction</label>
                                        <textarea class="form-control" name="special_instruction"  id="validationCustom01"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                    <label class="form-label" for="validationCustom03">Terms</label>
                                        <input type="text" class="form-control" name="terms"  id="validationCustom01" value="30 DAYS">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                    <label class="form-label" for="validationCustom03">Shipping Instruction</label>
                                    <input type="text" class="form-control" name="shipping_instruction"  id="validationCustom01" value="STS">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                <div class="col-md-3">
                                <div class="mb-3">
                                            <label class="form-label" for="validationCustom03">Total Sales (Vat Inclusive)</label>
                                <input type="text" class="form-control" id="total" onkeyup="sum();" name="total_amount" value="<?php echo $total ?>" >
                                </div>
                                </div>
                                <div class="col-md-2">
                                  <div class="mb-3">
                                    <label class="form-label" for="validationCustom03" style="font-size: 12px">Less: VAT</label>
                                            <input type="text" class="form-control" value="0" id="less_vat" onkeyup="sum()" name="less_vat">
                                  </div>
                                </div>
                                <div class="col-md-2">
                                  <div class="mb-3">
                                    <label class="form-label" for="validationCustom03" style="font-size: 12px">Amount Net of VAT</label>
                                            <input type="text" class="form-control" value="0" name="amount_net_vat" id="total_vat">
                                  </div>
                                </div>
                                <!-- <input type="hidden" name="total"> -->

                                <div class="col-md-2">
                                  <div class="mb-3">
                                    <label class="form-label" for="validationCustom03" style="font-size: 12px">Discount <b>%</b></label>
                                            <input type="text" class="form-control" name="percent_discount" value="0" id="discount" onkeyup="sum()">
                                  </div>
                                </div>
                                <div class="col-md-3">
                                  <div class="mb-3">
                                    <label class="form-label" for="validationCustom03">Total Amount Due</label>
                                        <input type="text" class="form-control" id="total_discounted_amount" name="total_discounted_amount" value="<?php echo $total ?>" onkeyup="sum();" readonly>
                                   </div>
                                 </div>
                                 <input type="text" class="form-control" name="discounted_amount" id="discounted_amount" onkeyup="sum()">
                                </div>
                              <div class="modal-footer">  
                                <div class="row">
                                    <div class="col-xl-12">
                                            <div class="btn-group btn-group-example mb-3 float-end"  role="group">
                                                <button type="button" class="btn btn-danger w-md" data-bs-dismiss="modal"><i class="mdi mdi-close-thick"></i> Cancel </button> 
                                                <button type="submit" class="btn btn-primary w-md" name="btn_sold"><i class="mdi mdi-check-bold"></i> Save</button>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="total">
                                        </div>
                                  
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

<script type="text/javascript">
  function sum() {
    var discount = document.getElementById('discount').value;
    var total = document.getElementById('total').value;
    var discounted_amount =  parseInt(discount)/ 100 * parseInt(total);
    var total_discounted_amount = total - discounted_amount;
    document.getElementById('total_discounted_amount').value = total_discounted_amount;

    document.getElementById('discounted_amount').value = discounted_amount;
  }
</script> 

<script type="text/javascript">
var globalSum = 0;
     function summerize(formfieldObj)
   {
globalSum = 0;
formulaObj = $(formfieldObj).parents("form");
$(formulaObj).find("input[type='radio']:checked").each(function()
{
 globalSum = parseInt($(this).val()) + globalSum;
$("#percent").html(globalSum);
$(formulaObj).find("input[name='total']").val(globalSum);

    var total = document.getElementById('total').value;
    var less_vat = parseInt(globalSum)/ 100 * parseInt(total);

    var total_vat = parseInt(total) - parseInt(less_vat);

    document.getElementById('less_vat').value = less_vat;

    document.getElementById('total_vat').value = total_vat;
;});
   }
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js">
  </script>