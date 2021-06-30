<div class="container-fluid" ng-controller="CommissionUpdateCtrl">
    <div class="row">

        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panal-header-title pull-left">
                    <h1>Update Commission</h1>
                </div>
            </div>

            <div class="panel-body">
                <?php 
                echo $confirmation;
                $attr = array('class' => 'form-horizontal');
                echo form_open('', $attr); 
                ?> 

                <div class="form-group">
                    <label for="" class="col-md-2 control-label">Doctor's Name </label>
                    <div class="col-md-5">
                        <input 
                            type="text" 
                            name="person" 
                            list="doctors" 
                            ng-model="search.person" 
                            ng-keyup="getLastCommitionInfoFn()" 
                            ng-change="getLastCommitionInfoFn()" 
                            placeholder="Search by Name..." 
                            class="form-control">

                         <datalist id="doctors">
                          <?php foreach ($doctors as $key => $value) { ?>
                             <option value="<?php echo $value->fullName; ?>">   
                          <?php } ?>                                                
                        </datalist>
                        <input type="hidden" name="type" ng-value="dataset.type">
                        <input type="hidden" name="payment_id" ng-value="dataset.last_payment_id">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label">Total Commission(৳) </label>
                    <div class="col-md-5">
                        <input type="number" name="commission" ng-model="dataset.balance" class="form-control" step="any" readonly>
                    </div>
                </div>

                <div class="form-group">
                    <label for="" class="col-md-2 control-label">Paid(৳)</label>
                    <div class="col-md-5">
                        <input type="number" name="paid" ng-model="dataset.last_payment_amount" class="form-control" step="any" readonly>
                    </div>
                </div>

                <div class="form-group">
                    <label for="" class="col-md-2 control-label">Update Amount(৳) </label>
                    <div class="col-md-5">
                        <input type="number" name="amount" ng-model="amount" class="form-control" step="any">
                    </div>
                </div>

                <div class="form-group">
                    <label for="" class="col-md-2 control-label">Balance(৳) </label>
                    <div class="col-md-5">
                        <input type="number" name="balance" ng-value="totalBalanceFn()" class="form-control" step="any" readonly>
                    </div>
                </div>
             
                <div class="col-md-7">
                    <div class="btn-group pull-right">
                        <input class="btn btn-primary" type="submit" name="change" value="Update">
                        <input class="btn btn-danger" type="reset" value="Clear">
                    </div>
                </div>

                <?php echo form_close(); ?>
            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>

