<div class="container-fluid" ng-controller="EditInvestigationCtrl">
    <div class="row">

        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panal-header-title pull-left">
                    <h1>Edit</h1>
                </div>
            </div>

            <div class="panel-body">
                <?php 
                echo $confirmation;
                $attr = array('class' => 'form-horizontal');
                echo form_open('investigation/editInvestigation?id=' . $this->input->get('id'), $attr); 
                ?> 
                  
                <div class="form-group">
                    <label class="col-md-2 control-label"> Group <span class="req">*</span> </label>
                    <div class="col-md-5">
                        <select 
                        id="item" name="group" class="selectpicker form-control" data-show-subtext="true" data-live-search="true">
                        
                        <?php foreach ($group_name as $group) { ?>
                            <option <?php if($dataset[0]->group == $group->group_name){echo 'selected';}?> value="<?php echo $group->group_name; ?>"><?php echo filter($group->group_name); ?></option>
                        <?php } ?>
                        </select>
                    </div>
                   
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label"> Test <span class="req">*</span> </label>
                    <div class="col-md-5">
                        <select name="test_name" class="selectpicker form-control" data-show-subtext="true" data-live-search="true">
                        <?php foreach ($test_name as $test) { ?>
                            <option <?php if($dataset[0]->name == $test->test_name){echo 'selected';}?> value="<?php echo $test->test_name; ?>"><?php echo filter($test->test_name); ?></option>
                        <?php } ?>
                        </select>
                    </div>
                   
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label">Test Fee </label>
                    <div class="col-md-5">
                        <input type="text" name="test_fee" value="<?php echo $dataset[0]->test_fee; ?>" class="form-control">
                    </div>
                </div>
				
				<div class="form-group">
                    <label class="col-md-2 control-label">Cost</label>
                    <div class="col-md-5">
                        <input type="text" name="cost" value="<?php echo $dataset[0]->cost; ?>" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label">Room</label>
                    <div class="col-md-5">
                        <input type="text" name="room" value="<?php echo $dataset[0]->room; ?>" class="form-control">
                    </div>
                </div>

                <!--<div class="form-group">-->
                <!--    <label for="" class="col-md-2 control-label">Unit </label>-->
                <!--    <div class="col-md-5">-->
                <!--        <input type="text" name="unit" value="<?php echo $dataset[0]->unit; ?>" class="form-control">-->
                <!--    </div>-->
                <!--</div>-->

                <!--<div class="form-group">-->
                <!--    <label for="" class="col-md-2 control-label">Reference Value </label>-->
                <!--    <div class="col-md-5">-->
                <!--        <input type="text" name="reference_value" value="<?php echo $dataset[0]->reference_value; ?>" class="form-control">-->
                <!--    </div>-->
                <!--</div>-->
             
                <div class="col-md-7">
                    <div class="btn-group pull-right">
                        <input class="btn btn-primary" type="submit" name="change" value="Update">
                    </div>
                </div>

                <?php echo form_close(); ?>
            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>

