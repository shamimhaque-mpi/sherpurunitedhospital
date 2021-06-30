<div class="container-fluid" ng-controller="marketerCommisionCollect">
    <div class="row">

        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panal-header-title pull-left">
                    <h1>Commission Payment</h1>
                </div>
            </div>

            <div class="panel-body">
                <?php 
                  echo $this->session->flashdata('confirmation');
                  $attr = array('class' => 'form-horizontal');
                  echo form_open('', $attr); 
                ?> 
                <div class="form-group">
                    <label  class="col-md-3 control-label"> Date  <span class="req">*</span></label>
                    
                    <div class="col-md-5 mb15">
                        <div class="input-group date" id="datetimepicker1">
                            <input type="text" name="date" class="form-control"  placeholder="YYYY-MM-DD" value="<?php echo date('Y-m-d'); ?>">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                    
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">RF/PC </label>
                
                    <div class="col-md-5">
                        <select 
                            name="rf_pc_id" ng-model="rf_id"  ng-change="getCommissionFn(rf_id)"
                            required class="selectpicker form-control" data-show-subtext="true" data-live-search="true">
                            <option value=""> -- Select -- </option>
                        <?php
                        if ($marketer != null) { 
                            foreach ($marketer as $value) { ?>
                            <option value="<?php echo $value->id; ?>"><?php echo filter($value->name); ?></option>
                        <?php } } ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Total Commission (TK) </label>
                    <div class="col-md-5">
                        <input type="number" ng-model="totalCommission" class="form-control"  step="any" readonly>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-md-3 control-label">Payment (TK) </label>
                    <div class="col-md-5">
                        <input type="number" name="payment" ng-model="payment" class="form-control"  step="any" required>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-md-3 control-label">Due (TK) </label>
                    <div class="col-md-5">
                        <input type="number" value="{{totalCommission - payment}}" class="form-control"  step="any" readonly>
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

