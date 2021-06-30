<div class="container-fluid" ng-controller="marketerCommisionCollect">
    <div class="row">

        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panal-header-title pull-left">
                    <h1>Edit Commission Payment</h1>
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
                            <input type="text" name="date" class="form-control"  placeholder="YYYY-MM-DD" value="<?php echo (!empty($rf_pc_commission_payment->date) ? $rf_pc_commission_payment->date : date('Y-m-d') ); ?>">
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
                            name="rf_pc_id" 
                            required class="selectpicker form-control" data-show-subtext="true" data-live-search="true">
                            <option selected disabled> -- Select -- </option>
                        <?php
                        if ($marketer != null) { 
                            foreach ($marketer as $value) { ?>
                            <option <?php echo (!empty($rf_pc_commission_payment->rf_pc_id==$value->id) ? 'selected' : ' '); ?> value="<?php echo $value->id; ?>"><?php echo filter($value->name); ?></option>
                        <?php } } ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Payment (TK) </label>
                    <div class="col-md-5">
                        <input type="number" name="payment" value="<?php echo (!empty($rf_pc_commission_payment->payment) ? $rf_pc_commission_payment->payment : 0 ); ?>" class="form-control"  step="any">
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="pull-right">
                        <input class="btn btn-success" type="submit" name="update" value="Update">
                    </div>
                </div>

                <?php echo form_close(); ?>

            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>

