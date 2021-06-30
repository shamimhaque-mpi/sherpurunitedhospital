<style type="text/css">
    .mb15{margin-bottom: 15px;}
    .cus-table tr td{padding-top: 0 !important;padding-bottom: 0 !important;}
    .cus-table tr td .form-control{border: transparent;padding: 0;}
</style>

<div class="container-fluid" ng-controller="AdmittedPatientDiagnosisCtrl">
    <div class="row">
    <?php echo $this->session->flashdata('confirmation'); ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panal-header-title pull-left">
                    <h1>Admitted Patient</h1>
                </div>
            </div>

            <div class="panel-body">
                <?php 
                $attr = array('class' => 'form-horizontal');
                echo form_open('diagnosis/admittedPatientDiagnosis/add', $attr); 
                ?>

                <div class="row">
                    <div class="col-md-4 mb15">
                        <label>Patient ID <span class="req">*</span></label>
                        <input type="text" name="patient_id" class="form-control" ng-model="search.patient_id" ng-keyup="getPatientInfoFn()" required>
                        <input type="hidden" name="voucher_number" value="<?php echo $voucher_number; ?>" class="form-control" readonly>
                    </div>

                    <div class="col-md-4 mb15">
                        <label>Date <span class="req">*</span></label>
                        <div class="input-group date" id="datetimepicker">
                            <input type="text" name="date" class="form-control" placeholder="YYYY-MM-DD" value="<?php echo date('Y-m-d'); ?>">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>

                    <div class="col-md-4 mb15">
                        <label>Referred Doctor  <span class="req">&nbsp;</span></label>
                        <input type="text" name="referred_by" ng-model="info.referred_by" class="form-control" readonly>
                    </div>  
                </div>

                <div class="row">
                    <div class="col-md-4 mb15">
                        <label>Patient Name </label>
                        <input type="text" name="patient_name" ng-model="info.name" class="form-control" readonly>
                    </div>

                    <div class="col-md-4 mb15">
                        <label>Patient Mobile <span class="req">*</span></label>
                        <input type="text" name="patient_mobile" ng-model="info.mobile" class="form-control" readonly >
                    </div>

                    <div class="col-md-2 mb15">
                        <label>Age</label>
                        <input type="text" name="age" ng-model="info.age" class="form-control" readonly>
                    </div>  

                    <div class="col-md-2 mb15">
                        <label>Gender </label>
                        <div class="checkbox">
                            <label for="male" style="padding-left: 0;">
                                <input type="radio" name="gender" ng-model="info.gender" value="Male"> 
                                Male
                            </label>

                            <label for="female">
                                <input type="radio" name="gender" ng-model="info.gender" value="Female"> 
                                Female
                            </label>
                        </div>
                    </div> 
                </div> 


                <div class="row">
                    <div class="col-md-4 mb15">
                        <label>PC Doctor</label>
                        <input type="text" name="pc" ng-model="info.pc" class="form-control" readonly>
                    </div>    

                    <div class="col-md-4 mb15">
                        <label>Marketer<span class="req">&nbsp;</span></label>                        
                        <input list="marketer_list" name="marketer" ng-model="info.marketer" class="form-control" readonly>
                        <datalist id="marketer_list">
                        <?php foreach ($marketers as $key => $value) { ?>
                            <option value="<?php echo $value->name; ?>">
                        <?php } ?>
                        </datalist>
                    </div>

                    <div class="col-md-4 mb15">
                        <label>Delivery Date <span class="req">*</span></label>
                        <div class="input-group date" id="datetimepicker2">
                            <input type="text" name="deliveryDate" class="form-control" placeholder="YYYY-MM-DD" value="<?php echo date('Y-m-d'); ?>" required>
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                </div>

                <hr style="margin-top: 0; border-bottom: 1px solid #ddd;">

                <table class="table cus-table table-bordered">
                    <tr>
                        <th> SL </th>
                        <th> Test Name </th>
                        <th> Test Group </th>
                        <th> Room NO</th>
                        <th> Amount (TK)  </th>
                        <th> Action  </th>
                    </tr>

                    <tr ng-repeat="item in testList" ng-cloak>
                        <td style="padding: 4px 8px !important;">{{ $index + 1 }}</td>                       

                        <td>
                            <input 
                                list="test-opt" 
                                name="test_name[]" 
                                class="form-control" 
                                ng-model="item.testName"
                                ng-keyup="changeOldTestFn($index)"
                                ng-change="changeOldTestFn($index)"
                                ng-keydown="addNewTestFn($event, $index)"
                                required>

                            <datalist id="test-opt">
                                <?php foreach($allTestName as $val){ ?>
                                <option value="<?php echo $val->test_name; ?>">
                                <?php } ?>
                            </datalist>
                        </td> 

                        <td>
                            {{item.testGroup}}
                            <input type="hidden" name="test_group[]" class="form-control" ng-value="item.testGroup" readonly>
                        </td>

                        <td>
                            {{item.room}}
                            <input type="hidden" name="room_no[]" class="form-control" step="any" ng-value="item.room" readonly>
                        </td>
                        
                        <td>
                            {{item.price}}
                            <input type="hidden" name="amount[]" class="form-control" step="any" ng-value="item.price" readonly>
                        </td>

                        <td style="text-align: center;">
                            <a class="btn btn-danger" ng-click="deleteTableRowFn($index);">
                                <i class="fa fa-times" aria-hidden="true"></i>
                            </a>
                        </td>
                    </tr>
                </table>

                <div class="form-group">
                    <label class="col-md-offset-5 col-md-2 control-label">Subtotal</label>
                    <div class="col-md-5">
                        <input type="number" name="subtotal" ng-value="setSubtotalFn()" class="form-control" readonly>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-offset-5 col-md-2 control-label">Vat</label>
                    <div class="col-md-5">
                        <input type="number" name="vat" ng-model="amount.vat" class="form-control">
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
                    <div class="col-md-5">
                        <input type="number" name="discount" ng-model="amount.discount" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-offset-5 col-md-2 control-label">Grand Total </label>
                    <div class="col-md-5">
                        <input type="number" name="grand_total" ng-value="getGrandTotal()" class="form-control" readonly>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-offset-5 col-md-2 control-label">Paid <span class="req">*</span> </label>
                    <div class="col-md-5">
                        <input type="number" name="paid" ng-model="amount.paid" class="form-control" required>
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
                            <input class="btn btn-primary" type="submit" name="createProfileBtn" value="Save">
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

