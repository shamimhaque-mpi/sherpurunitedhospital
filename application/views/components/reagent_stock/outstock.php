<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css" />
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

<div class="container-fluid" ng-controller="outStock" ng-cloak>
    <div class="row">
        <?php echo $this->session->flashdata('confirmation'); ?>
        <div class="panel panel-default">

            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>Outstock</h1>
                </div>
            </div>

            <div class="panel-body">
                <!-- horizontal form -->
                <?php
                $attr = array("class" => "form-horizontal");
                echo form_open('', $attr);
                ?>

                <div class="row new-row-1">
                    <div class="col-md-3">
                        <div class="input-group date" id="datetimepicker">
                            <input type="text" name="date" class="form-control" value="<?php echo date('Y-m-d');?>" placeholder="<?php echo date("Y-m-d"); ?>" required>
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <input type="text" name="voucher_number" value="<?php echo $stockID;?>" class="form-control" readonly>
                    </div>

                    <div class="col-md-3">
                        <select class="selectpicker form-control" data-show-subtext="true" data-live-search="true" ng-model="reagent" ng-change="getVoucherFn()" required>
                            <option value="" selected disabled>-- Select name --</option>
                            <option ng-repeat="row in allReagent" ng-value="row.reagent">{{ row.reagent | textBeautify }}</option>
                        </select>
                    </div>

                    <div class="col-md-3">
                        <select class="selectpicker form-control" ng-model="stock_voucher_no" data-show-subtext="true" data-live-search="true" required>
                            <option value="" selected disabled>-- Select Stock Voucher --</option>
                            <option ng-repeat="row in allVoucher" ng-value="row.voucher_no">{{ row.voucher_no }}</option>
                        </select>
                    </div>

                    <div class="col-md-1">
                        <a class="btn btn-success"  ng-click="addNewReagentFn()">
                            <i class="fa fa-plus fa-lg" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>

                <hr ng-hide="active">
                <div ng-hide="active">
                    <table class="table table-bordered table2">
                        <tr>
                            <th style="width: 2%;">SL</th>
                            <th style="width: 25%;">Reagent</th>
                            <th style="width: 25%;">Stock</th>
                            <th style="width: 10%;">Quantity</th>
                            <th style="width: 5%">Action</th>
                        </tr>                      

                        <tr ng-repeat="item in cart" ng-cloak>
                            <td style="padding: 6px 8px !important;">
                                {{ $index + 1 }}                                
                            </td>                         
                            <td>
                                <input type="text" class="form-control"  name="name[]" ng-value="item.name |textBeautify">
                                <input type="hidden" class="form-control"  name="stock_voucher_no[]" ng-value="item.voucher_number"> 
                           </td>

                            <td style="width: 125px;">
                                <input type="number" class="form-control" ng-model="item.maxQuantity" readonly >
                            </td>

                            <td style="width: 125px;">
                                <input type="number" name="quantity[]" class="form-control" min="1" max="{{ item.maxQuantity }}" ng-model="item.quantity">
                            </td>

                            <td class="text-center">
                                <a title="Delete" class="btn btn-danger" ng-click="deleteItemFn($index)">
                                    <i class="fa fa-times fa-lg"></i>
                                </a>
                            </td>
                        </tr>
                    </table>
                    <div class="btn-group pull-right">
                        <input type="submit" name="save" value="Save" class="btn btn-primary">
                    </div>
                </div>

                <?php echo form_close(); ?>
            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $('#datetimepicker').datetimepicker({
            format: 'YYYY-MM-DD'
        });
    });
   
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>