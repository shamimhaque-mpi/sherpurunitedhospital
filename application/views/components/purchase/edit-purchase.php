<style>
    .table2 tr td{ padding: 0 !important; }
    .table2 tr td input{ border: 1px solid transparent; }
    .new-row-1 .col-md-4 { margin-bottom: 8px; }
</style>

<div class="container-fluid" ng-controller="EditPurchaseEntry">
    <div class="row">
        <?php echo $this->session->flashdata('confirmation');; ?>
        <div class="panel panel-default">

            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>Edit</h1>
                </div>
            </div>


            <?php $voucherno = $this->input->get('vno'); ?>
            <div class="panel-body" ng-init="vno='<?php echo $voucherno; ?>'">
                <!-- horizontal form -->
                <?php
                $attr = array("class" => "form-horizontal");
                echo form_open('purchase/editPurchase?vno=' . $voucherno, $attr);
                ?>

                <div class="row new-row-1">
                    <div class="col-md-4">
                        <div class="input-group date" id="datetimepicker">
                            <input type="text" name="date" class="form-control" value="<?php echo $info[0]->date; ?>" required>
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                        <script type="text/javascript">
                            $(document).ready(function(){
                                $('#datetimepicker').datetimepicker({
                                    format: 'YYYY-MM-DD'
                                });
                            });
                        </script>
                    </div>

                    <div class="col-md-4">
                        <input type="text" name="voucher_number" value="<?php echo $info[0]->voucher_no; ?>" class="form-control" required>
                    </div>
                </div>

                <hr>

                <div>
                    <table class="table table-bordered table2">
                        <tr>
                            <th style="width: 5%;">SL</th>
                            <th style="width: 25%;">Product Name</th>
                            <th style="width: 10%;">Amount</th>
                            <th style="width: 10%;">Quantity</th>
                            <th style="width: 10%;">Discount</th>
                            <th style="width: 10%;">Total</th>
                        </tr>

                        <tr ng-repeat="item in allProducts">
                            <td style="padding: 6px 8px !important;">
                                {{ $index + 1 }}
                                <input type="hidden" name="id[]" value="{{ item.productID }}">
                            </td>

                            <td>
                                <input type="text" name="product[]" class="form-control" ng-model="item.product" readonly> 
                                <input type="hidden" name="category[]" value="{{ item.category }}">
                                <input type="hidden" name="subcategory[]" value="{{ item.subcategory }}">
                                <input type="hidden" name="code[]" value="{{ item.code }}">
                            </td>

                            <td style="width: 125px;">
                                <input type="number" name="price[]" class="form-control" min="0" ng-model="item.price" step="any">
                            </td>

                            <td style="width: 125px;">
                                <input type="hidden" name="oldQuantity[]" value="{{ oldRecord[$index].quantity }}">
                                <input type="number" name="quantity[]" class="form-control" min="1" ng-model="item.quantity">
                            </td>

                            <td style="width: 125px;">
                                <input type="number" name="discount[]" class="form-control" min="0" ng-model="item.discount" step="any">
                            </td>

                            <td style="width: 125px;">
                                <input type="text" name="subtotal[]" class="form-control" ng-model="item.subtotal" ng-value="getSubtotalFn($index)" readonly>
                            </td>
                        </tr>
                    </table>
                    <hr>

                    <div class="row">
                        <div class="col-md-offset-6 col-md-6">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Total</label>
                                <div class="col-md-8">
                                    <input type="number" readonly name="total" class="form-control" ng-value="getTotalFn()" step="any">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Total Discount</label>
                                <div class="col-md-8">
                                    <input type="number"  name="total_discount" ng-value="getTotalDiscountFn()" class="form-control" step="any">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Grand Total</label>
                                <div class="col-md-8">
                                    <input type="number" readonly name="grand_total" ng-value="getGrandTotalFn()" class="form-control" step="any">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Payment</label>
                                <div class="col-md-8" ng-init="amount.paid=<?php echo $info[0]->paid; ?>">
                                    <input type="number" name="paid" ng-model="amount.paid" class="form-control" step="any">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Due</label>
                                <div class="col-md-8">
                                    <input type="number" name="due" ng-value="getTotalDueFn()" class="form-control" step="any">
                                </div>
                            </div>

                            <div class="btn-group pull-right">
                                <input type="submit" name="save" value="Update" class="btn btn-primary">
                            </div>
                        </div>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>
 