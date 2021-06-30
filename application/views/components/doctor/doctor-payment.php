<div class="container-fluid" ng-controller="doctorPaymentCTRL">
    <div class="row">

        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panal-header-title pull-left">
                    <h1>Payment</h1>
                </div>
            </div>

            <div class="panel-body">
                <?php 
                  echo $this->session->flashdata('confirmation');
                  $attr = array('class' => 'form-horizontal');
                  echo form_open('', $attr); 
                ?> 

                <div class="form-group">
                    <label class="col-md-3 control-label">Doctor's Name </label>
                
                    <div class="col-md-5">
                        <select 
                            name="doctor_id" 
                            ng-model="person_id" 
                            ng-change="getDoctorBalaceFn()" 
                            class="form-control selectpicker" 
                            data-show-subtext="true"
                            data-live-search="true"
                            >
                            <option value="" selected disabled>--Select Doctor--</option>
                            <?php
                                if ($doctors != null) { 
                                    foreach ($doctors as $value) { ?>
                                    <option value="<?php echo $value->id; ?>"><?php echo filter($value->fullName); ?></option>
                                <?php } } 
                            ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Balance (TK) </label>
                    <div class="col-md-5">
                        <input type="number" class="form-control" ng-value="totalBalanceFn()" step="any" readonly>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-md-3 control-label">Total Paid (TK) </label>
                    <div class="col-md-5">
                        <input type="number"  class="form-control" name="total_paid" ng-value="totalPaidFn()" step="any" readonly>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Payment (TK) </label>
                    <div class="col-md-5">
                        <input type="number" name="payment" ng-model="payment" value="0" class="form-control" step="any">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-md-3 control-label">Less (TK) </label>
                    <div class="col-md-5">
                        <input type="number" name="less" ng-model="less" value="0" class="form-control"  step="any">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Due (TK) </label>
                    <div class="col-md-5">
                        <input type="number" name="due" class="form-control" ng-value="totalDueFn()" step="any" readonly>
                    </div>
                </div>
             
                <div class="col-md-8">
                    <div class="pull-right">
                        <input class="btn btn-primary" type="submit" name="save" value="Save">
                    </div>
                </div>

                <?php echo form_close(); ?>

            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>

