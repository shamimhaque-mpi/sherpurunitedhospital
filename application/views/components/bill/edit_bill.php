<script src="<?php echo site_url('private/js/ngscript/app.js');?>"></script>
<script src="<?php echo site_url('private/js/ngscript/addBillCtrl.js');?>"></script>
<div class="container-fluid" ng-controller="editBillCtrl">
    <div class="row">
        <?php echo $this->session->flashdata('confirmation'); ?>
        <div class="panel panel-default">
            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                  <h1>Edit Bill Voucher</h1>
                </div>
            </div>
            <div class="panel-body" ng-cloak>
            <?php  $attr = array('class' => 'form-horizontal');
                echo form_open('', $attr); ?>
                <input type="hidden" name="patient_id" ng-value="patient_id">
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="input-group date" id="datetimepicker">
                                    <input type="text" name="date" ng-value="date" class="form-control" placeholder="YYYY-MM-DD" required readonly>
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-2">
                        <input type="text" name="voucher" class="form-control" ng-model="voucher" ng-init="voucher='<?php echo ($voucher);?>'" readonly> 
                    </div>
                    
                    <div class="col-md-4">
                        <input type="text" name="bill_by" ng-value="bill_by" placeholder="Bill By" class="form-control"> 
                    </div>
                    
                    <div class="col-md-4">
                        <select ui-select2="{ allowClear: true}" class="form-control" ng-model="code" ng-change="addNewItemFn(code)" data-placeholder="Select Product">
                            <option value="">--select a item --</option>
                            <?php if($items) foreach($items as $value){ ?>
                            <option value="<?php echo $value->id?>"><?=($value->name)?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                    
                <hr>
                    
                <table class="table table-bordered table2">
                    <tr>
                        <th style="width: 40px;">SL</th>
                        <th style="width:275px;">Item</th>
                        <th width="80px">Price</th>
                        <th width="80px">Quantity</th>
                        <th width="80px">Total</th>
                        <th style="width: 50px;">Action</th>
                    </tr>
                    <tr ng-repeat="item in cart">
                        <td style="padding: 6px 8px !important;">{{ $index + 1 }}</td>
                        
                        <td>
                            <input type="text" name="name[]" class="form-control" ng-model="item.name" readonly>
                            <input type="hidden" name="item_id[]" class="form-control" ng-value="item.id" readonly>
                        </td>
                        
                        <td>
                            <input type="text" name="price[]" class="form-control" ng-model="item.price" ng-change="editPriceFn()">
                        </td>
                        
                        <td>
                            <input type="number" name="quantity[]" class="form-control" min="1" ng-model="item.quantity" step="any" ng-change="qtyUpdateFn($index)">
                        </td>
                        
                        <td>
                            <input type="number" name="total[]" class="form-control" min="1" ng-model="item.total" step="any"  ng-change="editTotalFn($index)">
                        </td>
                        
                        <td class="text-center">
                            <a title="Delete" class="btn btn-danger" ng-click="deleteItemFn($index)">
                                <i class="fa fa-times fa-lg"></i>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <th colspan="4" style="text-align:right">Grand Total</th>
                        <td colspan="2" style="text-align:left">{{total}}TK</td>
                    </tr>
                </table>
                
                <div class="btn-group pull-right">
                    <input type="submit" name="save" value="Save" class="btn btn-primary" ng-init="isDisabled=false;" >
                </div>
             <?php echo form_close(); ?>
            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>

<script>
    var specimen = document.querySelectorAll('.specimen_text');
    Object.values(specimen).forEach((val)=>{
        if((val.innerText).slice(0, 9)=="Pregnancy"){
            val.innerText = (val.innerText).slice(0, 18) + ((val.innerText).slice(18)).replace(' ', '-');
        }
    });
    
    // linking between two date
    $('#datetimepickerFrom').datetimepicker({
        format: 'YYYY-MM-DD',
        useCurrent: false
    });
    $('#datetimepickerTo').datetimepicker({
        format: 'YYYY-MM-DD',
        useCurrent: false
    });
    $("#datetimepickerSMSFrom").on("dp.change", function (e) {
        $('#datetimepickerSMSTo').data("DateTimePicker").minDate(e.date);
    });
    $("#datetimepickerSMSTo").on("dp.change", function (e) {
        $('#datetimepickerSMSFrom').data("DateTimePicker").maxDate(e.date);
    });
</script>