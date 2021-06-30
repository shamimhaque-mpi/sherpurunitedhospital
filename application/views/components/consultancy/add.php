<style type="text/css">
    .mb15{margin-bottom: 15px;}
    .cus-table tr td{padding-top: 0 !important;padding-bottom: 0 !important;}
    .cus-table tr td .form-control{border: transparent; padding: 0;}
</style>

<div class="container-fluid" ng-controller="NewConsultancyCtrl">
    <div class="row">
        <?php echo $this->session->flashdata("confirmation"); ?>
        
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panal-header-title pull-left">
                    <h1>New Consultancy </h1>
                </div>
            </div>

            <div class="panel-body">
                <?php 
                $attr = array('class' => 'form-horizontal');
                echo form_open('consultancy/newConsultancy/add', $attr); 
                ?>

                <div class="row">
                    <div class="col-md-3 mb15">
                        <label>
                            Invoice No
                            <span class="req">*</span>
                        </label>

                        <input type="text"  class="form-control" readonly name="voucher" value="<?php echo generate_voucher('bills'); ?>">
                    </div>

                    <div class="col-md-3 mb15">
                        <label>Date  <span class="req">*</span></label>
                        <div class="input-group date" id="datetimepicker">
                            <input type="text" name="date" class="form-control" value="<?php echo date("Y-m-d"); ?>" placeholder="YYYY-MM-DD">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>

                    <div class="col-md-3 mb15">
                        <label>
                            Patient ID 
                            <span class="req">*</span>
                        </label>

                        <!--<input 
                            type="text" 
                            list="patient_id" 
                            name="pid" 
                            ng-model="pid"
                            ng-change="getPatientInfoFn();" 
                            ng-keyup="getPatientInfoFn();" 
                            ng-paste="getPatientInfoFn();" 
                            ng-blur="getPatientInfoFn();" 
                            class="form-control" 
                            tabindex="1" 
                            required >
                            <datalist id="patient_id">
                                <?php if ($patient_idInfo != null) {
                                    foreach ($patient_idInfo as  $value) {
                                ?>
                                  <option value="<?php echo $value->pid;?>"><?php echo $value->name;?></option>
                                <?php }} ?>
                            </datalist> -->
                            
                            <!--<input type="text" class="form-control" name="pid" required>-->
                            
                            <input type="text" class="form-control" name="pid" value="<?php echo generateUniqueId('patients'); ?>" required readonly>
                    </div>

                    <div class="col-md-3 mb15">
                        <label>Patient Name </label>
                        <input type="text" name="patient_name" ng-value="patientInfo.name" class="form-control" placeholder="Patient Name" tabindex="2">
                    </div>

                </div>

                <div class="row">

                    <div class="col-md-3 mb15">
                        <label>Contact Number </label>
                        <input type="number" name="contact_number" ng-value="patientInfo.contact" class="form-control" placeholder="Contact Address" tabindex="3">
                    </div>

                    <div class="col-md-3 mb15">
                        <label>Age </label>
                        <input type="text" name="age" class="form-control" ng-value="patientInfo.age" placeholder="Age" tabindex="4">
                    </div>

                    <div class="col-md-3 mb15">
                        <label>Address </label>
                        <input type="text" name="address" ng-value="patientInfo.address" class="form-control" placeholder="Address" tabindex="5">
                    </div>

                    <div class="col-md-3 mb15">
                        <label>Gender </label>
                        <div class="checkbox" tabindex="6">

                            <label for="male" style="padding-left: 0;">
                                <input type="radio"  name="gender"  ng-checked="male_gender" id="male" value="Male"> 
                                Male
                            </label>
    
                            <label for="female">
                                <input type="radio" name="gender" ng-checked="female_gender"   id="female" value="Female"> 
                                Female
                            </label>

                        </div>
                    </div>
                </div>
                
                <div class="row">

                    <div class="col-md-3 mb15">
                        <label> RF/PC </label>
                    
                        <select 
                            name="reference_name" 
                            ng-model="search.person_id" 
                            ng-change="getCommitionInfoFn()" 
                            required class="selectpicker form-control" data-show-subtext="true" data-live-search="true" tabindex="6">
                            <option value=""> -- Select -- </option>
                        <?php
                        if ($marketer != null) { 
                            foreach ($marketer as $value) { ?>
                            <option value="<?php echo $value->id; ?>"><?php echo filter($value->name); ?></option>
                        <?php } } ?>
                        </select>
                        
                    </div>

                </div>
				
                <h6>&nbsp;</h6>
                <hr style="margin-top: 0; border-bottom: 1px solid #ddd;">

                <table class="table cus-table table-bordered">
                    <caption class="alert alert-info"><strong>To add more than one consultancy first select a doctor's name then press tab key from keyboard...</strong></caption>
                    <tr>
                        <th> SL </th>
                        <th> Doctor Name </th>
                        <th> Specialised In </th>
                        <th> Room No </th>
                        <th> Fee (TK)  </th>
                        <th> Action  </th>
                    </tr>

                    <tr ng-repeat="item in consultancyList" ng-cloak>
                        <td style="padding: 4px 8px !important;">{{ $index + 1 }}</td>

                        <td>
                            <input 
                                placeholder="Select Doctor Name." 
                                list="test-opt"
                                class="form-control" 
                                ng-model="item.doctorName"
                                ng-keyup="changeOldFn($index)"
                                ng-change="changeOldFn($index)"
                                ng-keydown="addNewFn($event, $index)"
                                ng-required="true"
                                >

                            <datalist id="test-opt">
                                <?php foreach($doctors as $val){ ?>
                                <option value="<?php echo $val->fullName; ?>">
                                <?php } ?>
                            </datalist>

                            <input type="hidden" name="doctors[]" ng-value="item.doctorID">
                        </td> 

                        <td>
                            {{item.specialised}}
                            <input type="hidden" name="specialised[]" class="form-control" ng-value="item.specialised" readonly>
                        </td>

                        <td>
                            <input type="number" name="room[]" class="form-control" step="any" ng-value="item.room">
                        </td>
                        
                        <td>
                            {{item.fee}}
                            <input type="hidden" name="fee[]" class="form-control" step="any" ng-value="item.fee" readonly>
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
                        <input type="number" ng-value="setSubtotalFn()" class="form-control" readonly>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-offset-5 col-md-2 control-label">Vat (%)</span></label>
                    <div class="col-md-5">
                        <?php $vatPers = $this->action->read('vat');?>
                        <input type="hidden" ng-model="amount_vat"  ng-value='<?php echo $vatPers[0]->percentage; ?>'>
                        <input type="number" value="<?php echo $vatPers[0]->percentage; ?>" class="form-control" step="any" readonly>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-offset-5 col-md-2 control-label">Total </span></label>
                    <div class="col-md-5">
                        <input type="number" name="total" ng-value="calculateVatFn()" class="form-control" step="any" readonly>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-offset-5 col-md-2 control-label">Less </label>
                    <div class="col-md-5">
                        <input type="number" name="discount" ng-model="amount.discount" class="form-control" step="any" tabindex="7">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-offset-5 col-md-2 control-label">Grand Total </label>
                    <div class="col-md-5">
                        <input type="number" name="grand_total" ng-value="getGrandTotal()" class="form-control" readonly step="any">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-offset-5 col-md-2 control-label">Paid </label>
                    <div class="col-md-5">
                        <input type="number" name="paid" ng-model="amount.paid" min="1" class="form-control" step="any" tabindex="8">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-offset-5 col-md-2 control-label">Due </label>
                    <div class="col-md-5">
                        <input type="number" name="due" ng-value="getTotalDue()" class="form-control" step="any" readonly>
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

