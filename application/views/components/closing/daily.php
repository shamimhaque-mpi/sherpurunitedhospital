<div class="container-fluid">
    <div class="row">
	    <?php echo $confirmation; ?>

        <div class="panel panel-default">

            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>Daily</h1>
                </div>
            </div>
            
            <div class="panel-body">
                <div class="row">

                   <div class="col-md-3">
                        <div class="dash-box dash-box-1">
                            <span>Opening Balance</span>
                            <h1><?php echo $pre_Cash; ?></h1>
                        </div>                    
                    </div>

                    <div class="col-md-3">
                        <div class="dash-box dash-box-2">
                            <span>Today's Income</span>
                            <h1><?php echo $income; ?></h1>
                        </div>                    
                    </div>

                    <div class="col-md-3">
                        <div class="dash-box dash-box-3">
                            <span>Today's Total Income</span>
                            <h1><?php echo $pre_Cash + $income; ?></h1>
                        </div>                    
                    </div>

                    <div class="col-md-3">
                        <div class="dash-box dash-box-4">
                            <span>Today's Cost</span>
                            <h1><?php echo $cost; ?></h1>
                        </div>                    
                    </div>

                    <div class="col-md-3">
                        <div class="dash-box dash-box-5">
                            <span>Today's Salary Cost</span>
                            <h1><?php echo $salary_cost; ?></h1>
                        </div>                    
                    </div>

                    <div class="col-md-3">
                        <div class="dash-box dash-box-6">
                            <span>Today's Bank Credit</span>
                            <h1><?php echo $bank; ?></h1>
                        </div>                    
                    </div>

                    <div class="col-md-3">
                        <div class="dash-box dash-box-7">
                            <span>Today's Total Cost</span>
                            <h1><?php echo $cost + $salary_cost + $bank; ?></h1>
                        </div>                    
                    </div>

                    <div class="col-md-3">
                        <div class="dash-box dash-box-8">
                            <span>Cash on Hand</span>
                            <h1><?php echo $curr_Cash; ?></h1>
                        </div>                    
                    </div> 
                </div>

                <?php echo form_open(''); ?>
                <input type="hidden" name="cost" value="<?php echo $cost ?>">
                <input type="hidden" name="salary_cost" value="<?php echo $salary_cost ?>">
                <input type="hidden" name="bank" value="<?php echo $bank ?>">
                <input type="hidden" name="curr_Cash" value="<?php echo $curr_Cash ?>">
                <input type="hidden" name="income" value="<?php echo $income ?>">
                <input type="hidden" value="<?php echo $pre_Cash; ?>" class="form-control" name="init_balance">

                <div class="pull-right">
                    <input type="submit" name="submit" class="btn btn-primary pull-right" value="Save Closing">
                </div>
                <?php echo form_close(); ?>
            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>

