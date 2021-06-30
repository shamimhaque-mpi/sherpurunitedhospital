<div class="container-fluid" ng-controller="PcComPaymentCtrl">
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
                  echo form_open('pc/cont/add', $attr); 
                ?> 

                <div class="form-group">
                    <label class="col-md-2 control-label">PC Name </label>
                    <div class="col-md-5">
                        <select 
                            name="person_id" 
                            ng-model="search.person_id" 
                            ng-change="getCommitionInfoFn()" 
                            class="form-control" 
                            required>
                            <option value="" selected disabled>&nbsp;</option>

                            <?php foreach ($pc as $key => $value) { ?>
                                <option value="<?php echo $value->id; ?>">  <?php echo $value->fullName; ?> </option>
                            <?php } ?>                                                
                        </select>

                        <input type="hidden" name="type" ng-value="dataset.type">                        
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label">Total Commission (৳) </label>
                    <div class="col-md-5">
                        <input type="number"  class="form-control" ng-model="dataset.total_comission" step="any" readonly>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label">Total Paid (৳) </label>
                    <div class="col-md-5">
                        <input type="number"  class="form-control" ng-model="dataset.total_paid" step="any" readonly>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label">Balance (৳) </label>
                    <div class="col-md-5">
                        <input type="number" name="balance" class="form-control" ng-value="totalBalanceFn()" step="any" readonly>
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-2 control-label">Payment (৳) </label>
                    <div class="col-md-5">
                        <input type="number" name="paid" ng-model="paid" class="form-control" max="{{dataset.total_comission}}" step="any">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label">Due (৳) </label>
                    <div class="col-md-5">
                        <input type="number" name="due" class="form-control" ng-value="totalDueFn()" ng-min="0" step="any" readonly>
                    </div>
                </div>
             
                <div class="col-md-7">
                    <div class="btn-group pull-right">
                        <input class="btn btn-primary" type="submit" name="create" value="Save">
                    </div>
                </div>

                <?php echo form_close(); ?>

            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>

