<style type="text/css">
    .mb15{
        margin-bottom: 15px;
    }
    .cus-table tr td{
        padding: 0 !important;
    }
    .cus-table tr td .form-control{
        border: transparent;
    }
    select.bs-select-hidden, select.selectpicker{
        display: block !important;
    }
</style>
<div class="container-fluid">

    <div class="row" ng-controller="editDiagnosisCtrl">

        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panal-header-title pull-left">
                    <h1>Edit Diagnosis</h1>
                </div>
            </div>

            <div class="panel-body">

                <?php 
                    // fetch diagnosis info
                    $diagnosisInfo  = $this->action->read('diagnosis',array('bill' => $billInfo[0]->id));
                ?>

                <?php $attr = array('class' => 'form-horizontal');
                echo form_open('diagnosis/editTest/update?vno='.$this->input->get('vno'), $attr); ?>
                <?php $vno=$this->input->get('vno'); ?>

                <div class="row" ng-init="vno='<?php echo $vno; ?>'" ng-model="vno">

                    <div class="col-md-4 mb15">
                        <label>Patient ID </label>
                        <input type="text" name="patient_id"  ng-model="patient_id" class="form-control" readonly>
                    </div>
                    

                    <div class="col-md-4 mb15">
                       <label>Date </label>
                        <div class="input-group date" id="datetimepicker">
                            <input type="text" name="date" class="form-control" ng-model="date" readonly placeholder="YYYY-MM-DD" value="<?php echo date('Y-m-d'); ?>">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>

                    <div class="col-md-4 mb15">
                       <label>Delivery Date </label>
                        <div class="input-group date" id="datetimepicker">
                            <input type="text" name="delivery_date" class="form-control" ng-model="date" readonly placeholder="YYYY-MM-DD" ng-value="deliveryDate">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-4 mb15">
                        <label>Patient Name </label>
                        <input type="text" name="patient_name" ng-model="patient_name" class="form-control">
                    </div>

                    <div class="col-md-4 mb15">
                        <label>Patient Mobile </label>
                        <input type="text" name="patient_mobile" ng-model="patient_mobile" class="form-control" >
                    </div>

                    <div class="col-md-4 mb15">
                        <label>Patient Address </label>
                        <input type="text" name="patient_address" ng-model="address" class="form-control" >
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-2 mb15">
                        <label>Age </label>
                        <input type="text" name="age" ng-model="age" class="form-control" >
                    </div>

                    <div class="col-md-2 mb15">
                        <label>Gender </label>
                        <div class="checkbox">
                            <label for="male" style="padding-left: 0;">
                                <input type="radio" checked name="gender" ng-model="gender" id="male" value="Male" > 
                                Male
                            </label>

                            <label for="female">
                                <input type="radio" name="gender" id="female" ng-model="gender" value="Female" > 
                                Female
                            </label>
                        </div>
                    </div>

                    <div class="col-md-4 mb15">
                        <label> RF/PC </label>
                    
                        <select name="reference_name" ng-model="reference_name" class="form-control">
                            <option value="" selected disabled> -- Select -- </option>
                            <?php 
                                foreach($reference as $key =>$row){
                            ?>
                            <option value="<?= $row->id; ?>"><?= filter($row->name); ?></option>
                            <?php }?>
                        </select>
                    </div>
                    
                    
                    <div class="col-md-4 mb15">
                        <label>Referred Doctor </label>
                    
                        <select name="refereed_doctor" ng-model="refereedDoctor" class="form-control">
                            <option value="" selected disabled> -- Select -- </option>
                            <?php 
                                foreach($doctors as $key =>$row){
                            ?>
                            <option value="<?= $row->id; ?>" ><?= filter($row->fullName); ?></option>
                            <?php }?>
                        
                        </select>
                    </div>
                </div> 

                <div class="row" ng-if="altraTest">
                              
                    <hr>
                    <div class="col-md-3 mb15">
                        <label>Doctor (Ultra) </label>
                    
                        <select name="alt_doctor_id" ng-model="allDoctorId" ng-init="allDoctorId" class="selectpicker form-control">
                            <option value="" selected disabled> -- Select -- </option>
                            <?php 
                                foreach($doctors as $key =>$row){
                            ?>
                            <option value="<?= $row->id; ?>"><?= filter($row->fullName); ?></option>
                            <?php }?>
                        
                        </select>
                    </div>

                    <div class="col-md-3 mb15">
                        <label>Doctor Fee (Ultra) </label>
                        <input type="number" min="0" name="alt_doctor_fee" value="{{testList[0].alt_doctor_fee}}" class="form-control">
                    </div>
                </div>

                <hr style="margin-top: 0; border-bottom: 1px solid #ddd;">

                <input name="voucher" type="hidden" ng-value="voucher">
                <input name="billNo" type="hidden" ng-value="billNo">
                <table class="table cus-table table-bordered">
                    <tr>
                        <th> SL </th>
                        <th> Test Name </th>
                        <th> Test Group </th>
                        <th> Room No</th>
                        <th> Amount (TK)  </th>
                        <!--th> Action  </th-->
                    </tr>

                    <tr ng-repeat="item in testList" ng-cloak>
                        <td style="padding: 4px 8px !important;">{{ $index + 1 }}</td>                       

                        <td>
                            <!-- <input 
                                list="test-opt" 
                                name="test_name[]" 
                                class="form-control" 
                                ng-model="item.testName"
                                ng-keyup="changeOldTestFn($index)"
                                ng-change="changeOldTestFn($index)"
                                ng-keydown="addNewTestFn($event, $index)">

                            <datalist id="test-opt">
                                <?php foreach($allTestName as $val){ ?>
                                <option value="<?php echo $val->test_name; ?>">
                                <?php } ?>
                            </datalist> -->

                            <select 
                                class="form-control" 
                                name="test_id[]" 
                                ng-model='item.test_id'
                                ng-change="changeOldTestFn($index)" 
                                required >
                                <option value="" selected disable>--Select A Test--</option>
                                <?php foreach($allTestName as $val){ ?>
                                <option value="<?php echo $val->id; ?>"><?php echo $val->test_name; ?></option>
                                <?php } ?>
                            </select>

                             <input type="hidden" name="value_id[]" value="{{item.value_id}}">
                        </td>                 
                        
                        <td>
                            <input type="text" name="test_group[]" class="form-control" ng-value="item.testGroup" readonly>
                            <input type="hidden" name="group_id[]" ng-value="item.group_id" readonly>
                        </td>

                        <td>
                            <input type="number" name="room_no[]" class="form-control" step="any" ng-value="item.room" readonly>
                        </td>
                        
                        <td>
                            <input type="number" name="amount[]" class="form-control" step="any" ng-value="item.price" readonly>
                        </td>
                    </tr>
                </table>

                <div class="form-group">
                    <label class="col-md-offset-5 col-md-2 control-label">Subtotal</label>
                    <div class="col-md-5">
                        <input type="number" name="subtotal" ng-value="setSubtotalFn();" class="form-control" readonly>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-offset-5 col-md-2 control-label">Vat</label>
                    <div class="col-md-5">
                        <input type="number" name="vat" ng-model="amount.vat" readonly class="form-control">
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-offset-5 col-md-2 control-label">Total </label>
                    <div class="col-md-5">
                        <input type="number" name="total" ng-value="calculateVatFn()" class="form-control" readonly>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-offset-5 col-md-2 control-label">Less </label>
                    <div class="col-md-3">
                        <input type="number" name="discount" ng-model="amount.discount" class="form-control">
                    </div>

                    <div class="col-md-2 mb15">
                        
                        <select 
                            name="less_type" 
                            ng-model="less_type"
                            required class="form-control">
                            <option value="Flat">Flat </option>
                            <option value="Percentage">Percentage</option>
                        </select>
                    </div>

                </div>

                <div class="form-group">
                    <label class="col-md-offset-5 col-md-2 control-label">Grand Total </label>
                    <div class="col-md-5">
                        <input type="number" name="grand_total" ng-value="getGrandTotal()" class="form-control" readonly>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-offset-5 col-md-2 control-label">Paid </label>
                    <div class="col-md-5">
                        <input type="number" name="paid" ng-model="amount.paid" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-offset-5 col-md-2 control-label">Due </label>
                    <div class="col-md-5">
                        <input type="number" name="due" ng-value="getTotalDue()" class="form-control">
                    </div>
                </div>
               
                <div class="row">
                    <div class="col-md-12">
                        <div class="btn-group pull-right">
                            <input class="btn btn-primary" type="submit" name="createProfileBtn" value="Update">
                            <input class="btn btn-danger" type="reset" value="Clear">
                        </div>
                    </div>
                </div>
                
                <?php echo form_close(); ?>

            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>

<script>
    // linking between two date
    $('#datetimepicker').datetimepicker({
        format: 'YYYY-MM-DD',
        useCurrent: false
    });
  
</script>

