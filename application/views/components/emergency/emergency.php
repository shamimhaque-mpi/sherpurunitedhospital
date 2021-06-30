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
</style>

<div class="container-fluid" ng-controller="emergencyPatientCtrl" ng-cloak>
    <div class="row">
        <?php echo $this->session->flashdata('confirmation'); ?>

        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panal-header-title pull-left">
                    <h1>Emergency</h1>
                </div>
            </div>

            <div class="panel-body">
                <?php 
                $attr = array('class' => 'form-horizontal');
                echo form_open('emergency/newEmergency/add', $attr); 
                ?>

                <div class="row">
                    <div class="col-md-offset-1 col-md-5 mb15">
                        <label>
                            Voucher No
                            <span class="req">*</span>
                        </label>

                         <input type="text"  class="form-control"  readonly name="voucher" value="<?php echo generate_voucher('bills'); ?>">
                    </div>

                   

                    <div class="col-md-5 mb15">
                        <label>Date  <span class="req">*</span></label>
                        <div class="input-group date" id="datetimepicker">
                            <input type="text" name="date" class="form-control" ng-value="patientInfo.date" placeholder="YYYY-MM-DD" tabindex="2">
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
                            ng-init="pid='<?php echo $pid; ?>'"
                            ng-model="pid" 
                            ng-change="getPatientInfoFn();"
                            ng-keyup="getPatientInfoFn();"
                            ng-paste="getPatientInfoFn();"
                            ng-blur="getPatientInfoFn();"
                            class="form-control" 
                            tabindex="1" 
                            required>
                    </div>

                    <div class="col-md-5 mb15">
                        <label>Patient Name </label>
                        <input type="text" name="patient_name" ng-value="patientInfo.name" class="form-control" readonly placeholder="Patient Name" tabindex="3">
                    </div>

                    <div class="col-md-offset-1 col-md-5 mb15">
                        <label>Contact Number </label>
                        <input type="number" name="contact_number" ng-value="patientInfo.contact" class="form-control" readonly placeholder="Contact Address" tabindex="8">
                    </div>

                    <div class="col-md-5 mb15">
                        <label>Age </label>
                        <input type="text" name="age" class="form-control" ng-value="patientInfo.age" readonly placeholder="Age">
                    </div>
                </div>
                <hr>
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-offset-2 col-md-10 mb15">
                                <label>Total</label>                       
                                <input type="number" step="any" name="total" ng-model="amount.total" class="form-control">
                            </div>
                        </div> 
                        <div class="row">   
                            <div class="col-md-offset-2 col-md-10 mb15">
                                <label>Discount</label>                       
                                <input type="number" step="any" name="discount" max="{{amount.total}}" ng-model="amount.discount" class="form-control">
                            </div>
                        </div>
                        <div class="row">    
                            <div class="col-md-offset-2 col-md-10 mb15">
                                <label>Grand Total</label>                       
                                <input type="number" step="any" readonly name="grand_total"  ng-value="grandTotalCalFn();" class="form-control" >
                            </div>
                        </div>    
                        <div class="row">    
                            <div class="col-md-offset-2 col-md-10 mb15">
                                <label>Paid</label>                       
                                <input type="number" step="any" name="paid" max="{{ amount.grandTotal}}" ng-model="amount.paid" class="form-control" >
                            </div>
                        </div> 
                        <div class="row">   
                            <div class="col-md-offset-2 col-md-10 mb15">
                                <label>Due</label>                       
                                <input type="number" readonly step="any" name="due" ng-value="dueCalFn();" class="form-control" >
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-10 mb15">
                                <label>Remark </label>
                                <textarea name="remark" placeholder="Remark" class="form-control" rows="4" style="height: 330px;" tabindex="9"></textarea>
                            </div>
                        </div>
                    </div>
                </div>             
                <div class="row">
                    <div class="col-md-10">
                        <div class="btn-group pull-right">
                            <input class="btn btn-primary" type="submit" name="createProfileBtn" value="Save" >
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
    $('#datetimepicker').datetimepicker({
        format: 'YYYY-MM-DD',
        useCurrent: false
    });
</script>




