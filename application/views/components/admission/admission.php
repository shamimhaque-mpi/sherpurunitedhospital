<style type="text/css">
    .mb15{
        margin-bottom: 15px;
    }
    .bedbox{
        padding: 15px 0  0 15px;
        border: 1px solid #ddd;
    }
    .bedbox ul{
        list-style-type: none;
        overflow: auto;
        width: 100%;
    }
    .bedbox ul li{
        border-radius: 15px;
        border: 1px solid #ddd;
        box-shadow: 0 1px 2px #ddd;
        float: left;
        margin: 0 15px 15px 0;       
        display: inline-block;
    }
    .bedbox ul li label{
        display: block;
        margin-bottom: 0;
        line-height: 35px;
        padding: 0 10px;
        position: relative;
        color: #fff;
    }
    .bedbox ul li label input[type="checkbox"]{
        position: absolute;
        top: 0;
        left: 0;
        opacity: 0;
        width: 100%;
        height: 100%;
        margin-top: 0;
        cursor: pointer;
    }
    .comisstion-padding{
        padding-left: 0px;
    }

    .bedbox li{background: #008000;}
    .bedbox li.disabled{background: #787878;}
    .bedbox li label{cursor: pointer;}
    .bedbox li input[type="radio"]{visibility: hidden;}
</style>

<div class="container-fluid" ng-controller="NewAdmissionCtrl" ng-cloak>
    <div class="row">
        <?php echo $this->session->flashdata('confirmation'); ?>

        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panal-header-title pull-left">
                    <h1>New Patient</h1>
                </div>
            </div>

            <div class="panel-body">
                <?php 
                $attr = array('class' => 'form-horizontal');
                echo form_open('admission/newAdmission/add', $attr); 
                ?>

                <div class="row">
                    <div class="col-md-offset-1 col-md-5 mb15">
                        <label>Invoice No <span class="req">*</span></label>
                        <input type="text" name="voucher" class="form-control" value="<?php echo $voucher; ?>" readonly>
                    </div>

                    <div class="col-md-5 mb15">
                        <label>Date  <span class="req">*</span></label>
                        <div class="input-group date" id="datetimepicker">
                            <input type="text" name="date" class="form-control" value="<?php echo date("Y:m:d"); ?>" placeholder="YYYY-MM-DD" tabindex="2">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-offset-1 col-md-5 mb15">
                        <label>
                            Patient ID 
                            <span class="req">*</span>
                        </label>
                        <input 
                            type="text" 
                            name="pid" 
                            ng-init="pid='<?php echo $patient_Id; ?>'"
                            ng-model="pid" 
                            ng-change="getPatientInfoFn();"
                            ng-keyup="getPatientInfoFn();"
                            ng-paste="getPatientInfoFn();"
                            ng-blur="getPatientInfoFn();"
                            class="form-control" 
                            tabindex="1" 
                            readonly>
                    </div>
                    
                    <div class="col-md-5 mb15">
                        <label>Patient Name </label>
                        <input type="text" name="patient_name"  ng-value="patientInfo.name" class="form-control" placeholder="Patient Name">
                    </div>

                    <div class="col-md-offset-1 col-md-5 mb15">
                        <label>Age </label>
                        <input type="text" name="age"  ng-value="patientInfo.age" class="form-control" placeholder="Age">
                    </div>

                    <div class="col-md-5 mb15">
                        <label style="display: block;">Gender </label>  
                        <input type="radio" name="gender" value="Male" id="male" checked> <label for="male"> &nbsp;Male</label>&nbsp;
                        <input type="radio" name="gender" value="Female" id="female" ><label for="female"> &nbsp;Female</label>
                    </div>
                </div>

                <div class="row">

                    <div class="col-md-offset-1 col-md-5 mb15">
                        <label>Contact Number </label>
                        <input type="text" name="contact_number"  ng-value="patientInfo.contact" class="form-control" placeholder="Contact Number">
                    </div>
                    <div class="col-md-5 mb15">
                        <label>Guardian </label>
                        <input 
                            type="text" 
                            name="guardian" 
                            ng-value="patientInfo.guardian" 
                            class="form-control" >
                    </div>
                </div>
                <hr/>

                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-offset-2 col-md-10 mb15">
                                <label>Total</label>                       
                                <input type="number" name="total" ng-model="amount.total" class="form-control" placeholder="Total" step="any" required>
                            </div>
                        </div> 

                        <div class="row">   
                            <div class="col-md-offset-2 col-md-10 mb15">
                                <label>Discount</label>                       
                                <input type="number" name="discount" ng-model="amount.discount" class="form-control" placeholder="Discount" step="any">
                            </div>
                        </div>

                        <div class="row">    
                            <div class="col-md-offset-2 col-md-10 mb15">
                                <label>Grand Total</label>                       
                                <input type="number" name="grand_total" ng-model="amount.grandTotal" ng-value="grandTotalFn()" class="form-control" placeholder="Grand total" step="any">
                            </div>
                        </div> 

                        <div class="row">    
                            <div class="col-md-offset-2 col-md-10 mb15">
                                <label>Paid</label>                       
                                <input type="number" name="paid" ng-model="amount.paid" class="form-control" placeholder="Paid" step="any">
                            </div>
                        </div> 

                        <div class="row">   
                            <div class="col-md-offset-2 col-md-10 mb15">
                                <label>Due</label>                       
                                <input type="number" name="due" ng-model="amount.due" ng-value="getDueFn()" class="form-control" placeholder="Due" step="any">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-10 mb15">
                                <label>Remark </label>
                                <textarea name="remarks" placeholder="Remarks" class="form-control" rows="4" style="height: 330px;" tabindex="9"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                
                

                <div class="row">
                    <div class="col-md-11">
                        <div class="btn-group pull-right">
                            <input class="btn btn-primary" type="submit" name="createProfileBtn" value="Save" tabindex="16">
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

<script type="text/javascript">  
    // linking between two date
    $('#datetimepicker').datetimepicker({
        format: 'YYYY-MM-DD',
        useCurrent: false
    });
</script>