
<div class="container-fluid" ng-controller="MarketerComPaymentCtrl">
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
                  echo form_open('marketer/cont/add', $attr); 
                ?> 

                <div class="form-group">
                    <label class="col-md-3 control-label">RF/PC </label>
                
                    <div class="col-md-5">
                        <select 
                            name="name" 
                            ng-model="search.person_id" 
                            ng-change="getCommitionInfoFn()" 
                            required class="selectpicker form-control" data-show-subtext="true" data-live-search="true">
                            <option selected disabled> -- Select -- </option>
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
                        <input type="number"  class="form-control" ng-model="dataset.total_comission" step="any" readonly>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Total Paid (TK) </label>
                    <div class="col-md-5">
                        <input type="number"  class="form-control" ng-model="dataset.total_paid" step="any" readonly>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Balance (TK) </label>
                    <div class="col-md-5">
                        <input type="number" name="balance" class="form-control" ng-value="totalBalanceFn()" step="any" readonly>
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-3 control-label">Payment (TK) </label>
                    <div class="col-md-5">
                        <input type="number" name="paid" ng-model="paid" class="form-control" max="{{dataset.total_comission}}" step="any">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Due (TK) </label>
                    <div class="col-md-5">
                        <input type="number" name="due" class="form-control" ng-value="totalDueFn()" ng-min="0" step="any" readonly>
                    </div>
                </div>
             
                <div class="col-md-8">
                    <div class="pull-right">
                        <input class="btn btn-primary" type="submit" name="create" value="Save">
                    </div>
                </div>

                <?php echo form_close(); ?>

            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>

