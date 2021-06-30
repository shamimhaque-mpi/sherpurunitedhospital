<style>
    .table2 tr td{
        padding: 0 !important;
    }
    .table2 tr td input{
        border: 1px solid transparent;
    }
    .table-bordered tr td:nth-child(1){
        text-align: center;
        line-height: 34px;
    }
</style>

<div class="container-fluid" ng-controller="SaleEntryCtrl">
    <div class="row">
        <?php echo $this->session->flashdata('confirmation');; ?>
        <div class="panel panel-default">

            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>Add Sales</h1>
                </div>
            </div>

            <div class="panel-body">
                <form ng-submit="getProductFn()">
                    <div class="row">
                        <div class="col-md-6" style="margin: 10px 0px;">
                            <select name="" ng-init="code=''" ng-model="code" class="selectpicker form-control" data-show-subtext="true" data-live-search="true">
                                <option value="" selected disable> Select product</option>
                                <?php foreach($allCodes as $row){ ?>
                                <option value="<?php echo $row->code; ?>"><?php echo $row->name; ?></option>
                                <?php } ?>
                            </select>                           
                        </div>
                        <div class="col-sm-2">
                            <input type="submit" style="margin: 10px 0px;" class="btn btn-success" value="&#x2713">
                        </div>
                    </div>
                </form>


                <!-- horizontal form -->
                <?php 
                $attribute = array(
                    'class' => 'form-horizontal',
                    'name'  => ''
                );
                echo form_open('', $attribute);
                ?>
                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="input-group date" id="datetimepicker">
                                    <input type="text" readonly name="date" value="<?php echo date('Y-m-d'); ?>" class="form-control" placeholder="YYYY-MM-DD" required>
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div> 

                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="text" name="voucher_number" class="form-control"  value="<?php echo $voucher_number; ?>" readonly >
                            </div>
                        </div>
                    </div>
                </div>

                <table class="table table-bordered table2">
                    <tr>
                        <th style="width: 40px;">SL</th>
                        <th>Product Name </th>
                        <th width="120">Stock </th>
                        <th width="120">Price </th>
                        <th width="120">Quantity </th>
                        <th width="120">Amount </th>
                        <th style="width: 50px;">Action </th>
                    </tr>

                    <tr ng-repeat="item in cart" ng-cloak>      
                        <td>{{ $index+1 }}</td>

                        <td>
                        <input type="hidden" value="{{ item.productname }}" name="product[]">
                        {{ item.productname }}
                        </td> 

                        <td>
                            <input type="number" readonly ng-model="item.maxQuantity" class="form-control">
                        </td>

                        <td>
                            <!-- some heddin fields -->
                            <input type="hidden" name="code[]" value="{{ item.code }}">

                            <input type="number" name="price[]" ng-model="item.price" class="form-control" min="0" step="any" required>
                        </td>

                        <td>
                            <input type="number" tabindex="2" name="quantity[]" ng-model="item.quantity" max="{{ item.maxQuantity }}" class="form-control" min="0" step="any">
                        </td>

                        <td>
                            <input type="text" name="subtotal[]" ng-model="item.subtotal" ng-value="setSubtotalFn($index)" class="form-control" readonly>
                        </td>

                        <td class="text-center">
                            <a title="Delete" ng-click="deleteItemFn($index)" class="btn btn-danger">
                                <i class="fa fa-times fa-lg"></i>
                            </a>
                        </td>
                    </tr>
                </table>
                <hr>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Name  </label>
                                <div class="col-md-8">
                                    <input type="text" tabindex="3" name="name" class="form-control">
                                </div>
                            </div>
                        </div>
            
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Mobile Number  </label>
                                <div class="col-md-8">
                                    <input type="text" tabindex="4" name="mobile" class="form-control">
                                </div>
                            </div>
                        </div>  
                    </div>

                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-md-4 control-label">Total  </label>
                        <div class="col-md-8">
                            <input type="number" name="total" ng-value="getTotalFn()" class="form-control" step="any" readonly>
                        </div>
                    </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Total Discount </label>
                    <div class="col-md-8">
                        <input type="number" tabindex="5" name="discount" ng-model="amount.totalDiscount" class="form-control" step="any">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Grand Total </label>
                    <div class="col-md-8">
                        <input type="number" name="grand_total" ng-value="getGrandTotalFn()" class="form-control" step="any" readonly>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Paid (Tk)  <span class="req">*</span></label>
                    <div class="col-md-8">
                        <input type="number" tabindex="6" name="paid" ng-model="amount.paid" class="form-control" step="any">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Due </label>
                    <div class="col-md-8">
                        <input type="number" name="due" ng-value="getTotalDueFn()" class="form-control" step="any" readonly>
                    </div>
                </div>

                </div>
                
                <div class="btn-group pull-right">
                    <input type="submit" tabindex="7" name="save" value="Sale" class="btn btn-primary">
                </div>

                <?php echo form_close(); ?>           
            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>

<!-- javascript include -->
<script type="text/javascript">
    $(document).ready(function(){
        $('#datetimepicker').datetimepicker({
            format: 'YYYY-MM-DD'
        });
    });
</script>