<?php   $themeSetting = $this->action->read("theme_setting");
        if(isset($themeSetting[0]->header)){$themeHeader = json_decode($themeSetting[0]->header,true);}
    	if(isset($themeSetting[0]->footer)){$themeFooter = json_decode($themeSetting[0]->footer,true);}
    	if(isset($themeSetting[0]->logo)){$logo = json_decode($themeSetting[0]->logo,true);} ?>
<style type="text/css">
    .mb15{margin-bottom: 15px;}
    .cus-table tr td{padding: 0 !important;}
    .cus-table tr td .form-control{border: transparent;}
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
                <!-- Print banner Start Here -->
                <div class="col-xs-12 hide" style="border: 1px solid #ddd; !important; margin-bottom: 15px;">
                    <div class="col-xs-3" style="padding: 0;">
                        <img class="img-responsive" style="width: 100%; margin-top: 6px;" src="<?php echo site_url($logo['logo']); ?>" alt="">
                    </div>
                    <div class="col-xs-9" style="padding: 0;">
                    	<h2 style="text-align:center;"><?php echo strtoupper($themeHeader['site_name']); ?></h2>
                    	<p style="text-align:center;"><?php echo $themeHeader['place_name'];?></p>
                    	<p style="text-align:center;"><?php echo $themeFooter['addr_moblile']; ?> || <?php echo $themeFooter['addr_email']; ?></p>
                    </div>
                </div>
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
                        <label>Patient Name <span class="req">*</span></label>
                        <input type="text" name="patient_name" ng-model="info.name" class="form-control" readonly>
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
                </div>

                <div class="row">
                    <div class="col-md-4 mb15">
                        <label>Gender <span class="req">*</span></label>
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

                    <div class="col-md-4 mb15">
                        <label>Age <span class="req">*</span></label>
                        <input type="text" name="age" ng-model="info.age" class="form-control" readonly>
                    </div>

                    <div class="col-md-4 mb15">
                        <label>Refered Doctor  <span class="req">&nbsp;</span></label>
                        <input type="text" name="referred_by" ng-model="info.consultant_doctor" class="form-control" readonly>
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
                            <input type="text" name="test_group[]" class="form-control" ng-value="item.testGroup" readonly>
                        </td>

                        <td>
                            <input type="number" name="room_no[]" class="form-control" step="any" ng-value="item.room" readonly>
                        </td>
                        
                        <td>
                            <input type="number" name="amount[]" class="form-control" step="any" ng-value="item.price" readonly>
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
                    <label class="col-md-offset-5 col-md-2 control-label">Vat<span class="req">*</span></label>
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
                    <label class="col-md-offset-5 col-md-2 control-label">Paid <span class="req">*</span></label>
                    <div class="col-md-5">
                        <input type="number" name="paid" ng-model="amount.paid" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-offset-5 col-md-2 control-label">Due <span class="req">*</span></label>
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

