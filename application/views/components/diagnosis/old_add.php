<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css" />

<style type="text/css">
    .mb15{margin-bottom: 15px;}
    .cus-table tr td{padding-top: 0!important; padding-bottom: 0px !important;}
    .cus-table tr td .form-control{border: transparent; padding: 0}
    .tabel_opt option{ padding: 5px !important; font-size: 30px !important; }
</style>
<div class="container-fluid" ng-controller="PatientDiagnosisCtrl">
    <div class="row" ng-cloak>
        <?php echo $this->session->flashdata("confirmation"); ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panal-header-title pull-left">
                    <h1>New Diagnosis</h1>
                </div>
            </div>

            <div class="panel-body">
                <?php 
                $attr = array('class' => 'form-horizontal');
                echo form_open('diagnosis/addNewPatientDiagnosis/add', $attr); 
                ?>

                <div class="row">

                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-3">
                                <select name="patient" ng-model="patientHave" ng-init="patientHave='new_patient'" class="form-control">
                                    <option value="" disabled selected> --Select Patient--</option>
                                    <option value="consultancy_patient">Consultancy Patient</option>
                                    <option value="new_patient">New Patient</option>
                                </select>
                            </div>
                        </div>
                        <hr>
                    </div>

                    <div class="col-md-3 mb15">
                        <label>Invoice No <span class="req">*</span></label>
                         <input type="text"  class="form-control"  readonly name="voucher" value="<?php echo generate_voucher('bills'); ?>">
                    </div>                   

                    <div class="col-md-3 mb15">
                        <label>Date <span class="req">*</span></label>
                        <div class="input-group date" id="datetimepicker">
                            <input type="text" name="date" class="form-control" value="<?php echo date('Y-m-d'); ?>" placeholder="YYYY-MM-DD">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>

                    <div class="col-md-3 mb15">
                        <label>Delivery Date  <span class="req">*</span></label>
                        <div class="input-group date" id="datetimepicker1">
                            <input type="text" name="delivery_date" class="form-control"  placeholder="YYYY-MM-DD" value="<?php echo date('Y-m-d'); ?>">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                    
                    <div class="col-md-3 mb15" ng-if="patientHave=='new_patient'">
                        <label>
                            Patient ID 
                            <span class="req">*</span>
                        </label>
                        <input type="text" name="pid" value="<?php echo patientUniqueId('patients');?>" readonly class="form-control">
                        
                    </div>

                    <div class="col-md-3 mb15" ng-if="patientHave=='consultancy_patient'">
                        <label>
                            Patient ID 
                            <span class="req">*</span>
                        </label>
                        <input type="text" name="pid" ng-value="patientInfo.patient_id" class="form-control" readonly>
                    </div>
                    
                </div>


                <div class="row" ng-show="patientHave=='new_patient'">

                    <div class="col-md-3 mb15">
                        <label>Patient Name </label>
                        <input type="text" name="patient_name" class="form-control" placeholder="Patient Name" tabindex="2">
                    </div>

                    <div class="col-md-3 mb15">
                        <label>Age </label>
                        <input type="text" name="age" class="form-control" placeholder="Age" tabindex="3">
                    </div>

                    <div class="col-md-3 mb15">
                        <label>Contact Number</label>
                        <input type="text" name="contact_number" class="form-control" placeholder="Contact Number" tabindex="4">
                    </div>

                    <div class="col-md-3 mb15">
                        <label>Address </label>
                        <input type="text" name="address"  class="form-control" placeholder="Address" tabindex="5">
                    </div>
                </div>

            
                <div class="row" ng-show="patientHave=='consultancy_patient'">

                    <div class="col-md-3 mb15">
                        <label>Patient Name </label>
                        <select 
                            class="form-control selectpicker"
                            data-show-subtext="true"
                            data-live-search="true"
                            ng-model="id" 
                            ng-change="getPatientInfoFn();"
                            >
                            <option value="" selected disabled>--Select Patient--</option>
                            <?php if ($patient_idInfo != null) {
                                    foreach ($patient_idInfo as  $value) {
                                ?>
                                    <option value="<?php echo $value->pid;?>"><?php echo $value->name;?></option>
                                <?php }} ?>
                        </select>
                    </div>

                    <div class="col-md-3 mb15">
                        <label>Age </label>
                        <input type="text" class="form-control" ng-value="patientInfo.age" readonly>
                    </div>

                    <div class="col-md-3 mb15">
                        <label>Contact Number</label>
                        <input type="text" class="form-control" ng-value="patientInfo.contact" name="mobile" readonly>
                    </div>

                    <div class="col-md-3 mb15">
                        <label>Address </label>
                        <input type="text" class="form-control" ng-value="patientInfo.address" readonly>
                    </div>
                </div>
               

                <div class="row">
                    <div class="col-md-3 mb15">
                        <label>Gender </label>
                        <div class="checkbox" tabindex="6">

                            <label for="male" style="padding-left: 0;">
                                <input type="radio" name="gender" ng-checked="male_gender"  value="Male"> 
                                Male
                            </label>
    
                            <label for="female">
                                <input type="radio" name="gender" ng-checked="female_gender" value="Female"> 
                                Female
                            </label>

                        </div>
                    </div>
                    <div>
                        <div class="col-md-3 mb15">
                            <label>RF/PC </label>
                        
                            <select 
                                name="reference_name" 
                                ng-model="search.person_id" 
                                ng-init="search.person_id='<?=(isset($reference[0]) ? $reference[0]->id : '')?>'" 
                                ng-change="getCommitionInfoFn()" 
                                required class="selectpicker form-control" data-show-subtext="true" data-live-search="true" tabindex="6">
                                <option value="" selected disabled> -- Select -- </option>
                                <?php 
                                    foreach($reference as $key =>$row){
                                ?>
                                <option value="<?= $row->id; ?>"><?= filter($row->name); ?></option>
                                <?php }?>
                            
                            </select>
                        </div>
                        <div class="col-md-3 mb15">
                            <label>Referred Doctor</label>
                        
                            <select name="refereed_doctor"
                                class="selectpicker form-control"
                                data-show-subtext="true"
                                data-live-search="true">
                                <option value="" selected disabled> -- Select -- </option>
                                <?php 
                                    foreach($doctors as $key =>$row){
                                ?>
                                <option value="<?= $row->id; ?>" <?=($key == 0 ? 'selected' : '')?>><?= filter($row->fullName); ?></option>
                                <?php }?>
                            
                            </select>
                        </div>
                    </div>
                    <?php /* ?>
                    <div ng-if="patientHave =='consultancy_patient'">
                        <div class="col-md-3 mb15">
                            <label>RF/PC </label>
                        
                            <select 
                                ng-model="referenceId"
                                name="reference_name" 
                                class="form-control"
                                required 
                                >
                                <option value="" selected disabled> -- Select -- </option>
                                <?php 
                                    foreach($reference as $key =>$row){
                                ?>
                                <option value="<?= $row->id; ?>"><?= filter($row->name); ?></option>
                                <?php }?>
                            
                            </select>
                        </div>
                        <div class="col-md-3 mb15">
                            <label>Referred Doctor</label>
                        
                            <select  
                                ng-model="doctorId"
                                name="refereed_doctor"
                                class="form-control"
                            >
                                <option value="" selected disabled> -- Select -- </option>
                                <?php 
                                    foreach($doctors as $key =>$row){
                                ?>
                                <option value="<?= $row->id; ?>"><?= filter($row->fullName); ?></option>
                                <?php }?>
                            
                            </select>
                        </div>
                    </div> <?php */ ?>
                    
                </div>
                <div class="row" ng-show="altraTest">
                    <hr>
                    <div class="col-md-3 mb15">
                        <label>Doctor (Ultra)</label>
                    
                        <select name="alt_doctor_id" class="selectpicker form-control">
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
                        <input type="number" min="0" name="alt_doctor_fee" class="form-control">
                    </div>
                </div>

                <hr style="margin-top: 0; border-bottom: 1px solid #ddd;">

                <table class="table cus-table table-bordered">
                    <!-- <caption class="alert alert-info"><strong>To add more than one test first select a test name then press tab button from keyboard...</strong></caption> -->
                    <tr>
                        <th> SL </th>
                        <th> Test Name </th>
                        <th> Test Group </th>
                        <th> Room No </th>
                        <th> Amount (TK)  </th>
                        <!-- <th> Cost (TK)  </th> -->
                        <th> Action  </th>
                    </tr>

                    <tr ng-repeat="item in testList" ng-cloak>
                        <td style="padding: 4px 8px !important;">{{ $index + 1 }}</td>

                        <!-- <td class="tabel_opt" style="padding: 4px 8px !important; font-size: 30px;">
                            <input
                                list="test-opt" 
                                name="test_name[]" 
                                class="selectpicker form-control" 
                                data-show-subtext="true" 
                                data-live-search="true"
                                ng-model="item.testName"
                                ng-keyup="changeOldTestFn($index)"
                                ng-change="changeOldTestFn($index)"
                                ng-keydown="addNewTestFn($event, $index)"
                                placeholder="Select Test Name">

                            <datalist id="test-opt">
                                <?php foreach($allTestName as $val){ ?>
                                <option value="<?php echo $val->name; ?>">
                                <?php } ?>
                            </datalist> -->
                        <td>
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
                        </td> 

                        <td style="padding: 4px 8px !important;">
                            {{item.testGroup | textBeautify}}
                            <input type="hidden" name="test_group[]" class="form-control" ng-value="item.testGroup" readonly>
                        </td>

                        <td style="padding: 4px 8px !important;">
                            {{item.room}}
                            <input type="hidden" name="room_no[]" class="form-control" step="any" ng-value="item.room" readonly>
                        </td>
                        
                        <td style="padding: 4px 8px !important;">
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
                    <label class="col-md-offset-7 col-md-2 control-label">Subtotal </label>
                    <div class="col-md-3">
                        <input type="number" name="subtotal" ng-value="setSubtotalFn()" class="form-control" readonly>
                    </div>
                </div>

                <?php $vatPers = $this->action->read('vat');?>
                <div class="form-group">
                    <label class="col-md-offset-7 col-md-2 control-label">Vat ( <?php echo $vatPers[0]->percentage; ?> %)</label>
                    <div class="col-md-3">
                        <input type="hidden" name="vat" ng-model="vat"  ng-value='<?php echo $vatPers[0]->percentage; ?>'>
                        <input type="number" name="vat_amount" ng-value="vatAmountCalcFn()" class="form-control" step="any" readonly>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-offset-7 col-md-2 control-label">Total </label>
                    <div class="col-md-3">
                        <input type="number" name="total" ng-value="calculateVatFn()" class="form-control" readonly>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-offset-7 col-md-2 control-label">Less </label>
                    <div class="col-md-2">
                        <input tabindex="7" type="number" name="discount" ng-model="amount.discount" class="form-control" step="any">
                    </div>
                    
                    <div class="col-md-1 mb15">
                        
                        <select 
                            name="less_type" 
                            ng-model="less_type"
                            ng-init="less_type='Flat'"
                            required class="form-control">
                            <option value="Flat">Flat </option>
                            <option value="Percentage">Percentage</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-offset-7 col-md-2 control-label">Grand Total </label>
                    <div class="col-md-3">
                        <input type="number" name="grand_total" ng-value="getGrandTotal()" class="form-control" readonly>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-offset-7 col-md-2 control-label">Paid <span class="req">*</span> </label>
                    <div class="col-md-3">
                        <input tabindex="8" type="number" name="paid" ng-model="amount.paid" class="form-control" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-offset-7 col-md-2 control-label">Due</label>
                    <div class="col-md-3">
                        <input type="number" name="due" ng-value="getTotalDue()" class="form-control" readonly>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>