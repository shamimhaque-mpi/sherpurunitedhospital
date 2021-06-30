<style>
    .table2 tr td{
        padding: 0 !important;
    }
    .table2 tr td input{
        border: 1px solid transparent;
    }
    .new-row-1 .col-md-4{
        margin-bottom: 8px;
    }
</style>

<div class="container-fluid" ng-controller="PurchaseEntry">
    <div class="row">
        <?php echo $this->session->flashdata('confirmation'); ?>
        <div class="panel panel-default">

            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>Add Purchase</h1>
                </div>
            </div>

            <div class="panel-body">
                <!-- horizontal form -->
                <?php
                $attr = array("class" => "form-horizontal");
                echo form_open_multipart('', $attr);
                ?>

                <div class="row new-row-1">
                    <div class="col-md-3">
                        <div class="input-group date" id="datetimepicker">
                            <input type="text" name="date" class="form-control" value="<?php echo date('Y-m-d');?>" placeholder="<?php echo date("Y-m-d"); ?>" required>
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

                    <div class="col-md-3">
                        <input type="text" name="voucher_number" placeholder="Voucher no" class="form-control" required>
                    </div>

<!--                     <div class="col-md-4">
                        <select name="category" class="form-control" ng-model="category" 
                            ng-change="setAllProducts()" required>
                            <option value="" selected disabled>-- Category --</option>
                            <?php if($allCategory != null){ foreach($allCategory as $key => $row){ ?>
                            <option value="<?php echo $row->slug; ?>">
                                <?php echo str_replace('_', ' ', $row->category); ?>
                            </option>
                            <?php }} ?>
                        </select>
                    </div>
 -->

<!--                     <div class="col-md-4">
                        <select class="form-control" ng-model="product" name="product"
                            ng-change="setModel()" required>
                            <option value="" selected disabled>-- Select Product --</option>
                            <option ng-repeat="row in allProducts" ng-value="row.name">{{ row.name | textBeautify }}</option>
                        </select>
                    </div> -->

                    <div class="col-md-3">
                        <select class="form-control" ng-model="model_name" required>
                            <option value="" selected disabled>-- Select Model --</option>
                            <option ng-repeat="row in allModel" ng-value="row.code">{{ row.model | textBeautify }}</option>
                        </select>
                    </div>

                    <div class="col-md-3">
                        <input type="number" class="form-control" placeholder="Quantity" min="1" ng-model="quantity" required>
                    </div>


                    <div class="col-md-12">
                        <a class="btn btn-success pull-right" style="margin-top: 10px;"  ng-click="addNewProductFn()">
                            <i class="fa fa-plus fa-lg" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>

                <hr>

                <div ng-hide="active">
                    <table class="table table-bordered table2">
                        <tr>
                            <th style="width: 5%;">SL</th>
                            <th style="width: 25%;">Product Name</th>
                            <th style="width: 10%;">Price</th>
                            <th style="width: 10%;">Quantity</th>
                            <th style="width: 10%;">Discount</th>
                            <th style="width: 10%;">Total</th>
                            <th style="width: 5%">Action</th>
                        </tr>

                        <tr ng-repeat="item in cart" ng-cloak>
                            <td style="padding: 6px 8px !important;">{{ $index + 1 }}</td>

                            <td>
                                <!-- <input type="text"  class="form-control" ng-model="item.model" readonly>  -->
                                <input type="hidden" name="category[]" value="{{ item.category }}">
                                <input type="text" class="form-control"  name="subcategory[]" ng-model="item.model">
                                <input type="hidden" name="code[]" value="{{ item.code }}">
                                <input type="hidden" name="brand[]" value="{{ item.brand }}">
                               
                            </td>

                            <td style="width: 125px;">
                                <input type="number" name="price[]" class="form-control" min="0" ng-model="item.price" step="any">
                            </td>

                            <td style="width: 125px;">
                                <input type="number" name="quantity[]" class="form-control" min="1" ng-model="item.quantity">
                            </td>

                            <td style="width: 125px;">
                                <input type="number" name="discount[]" class="form-control" min="0" ng-model="item.discount" step="any">
                            </td>

                            <td style="width: 125px;">
                                <input type="text" name="subtotal[]" class="form-control" ng-model="item.subtotal" ng-value="setSubtotalFn($index)" readonly>
                            </td>

                            <td class="text-center">
                                <a title="Delete" class="btn btn-danger" ng-click="deleteItemFn($index)">
                                    <i class="fa fa-times fa-lg"></i>
                                </a>
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
                                <label class="col-md-4 control-label">Total Discount </label>
                                <div class="col-md-8">
                                    <input type="number" readonly name="total_discount" ng-value="getTotalDiscountFn()" class="form-control" step="any">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Transport Cost</label>
                                <div class="col-md-8">
                                    <input type="number" name="transport_cost" min="0" ng-model="amount.transport" class="form-control" step="any">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Grand Total</label>
                                <div class="col-md-8">
                                    <input type="number" readonly name="grand_total" ng-value="getGrandTotalFn()" class="form-control" step="any">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label"> Payment </label>
                                <div class="col-md-8">
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
                                <input type="submit" name="save" value="Save" class="btn btn-primary">
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
 