<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css" />
<style>
    @media print{
        aside, nav, .none, .panel-heading, .panel-footer {
            display: none !important;
        }
        .panel{
            border: 1px solid transparent;
            left: 0px;
            position: absolute;
            top: 0px;
            width: 100%;
        }
        .panel .hide{
            display: block !important;
        }
        .title{
            font-size: 25px;        
        }
    }
</style>

<div class="container-fluid">
    <div class="row">
    <?php echo $this->session->flashdata('confirmation'); ?>
        <div class="panel panel-default">

            <div class="panel-heading panal-header none">
                <div class="panal-header-title pull-left">
                    <h1>Add Test</h1>
                </div>
            </div>

            <div class="panel-body none">
                <!-- horizontal form -->
                
                <?php
                $attr=array('class'=>'form-horizontal');
                echo form_open('',$attr);
                ?>
                
                <div class="form-group">
                    <label class="col-md-2 control-label">Group Name <span class="req">*</span></label>
                     <div class="col-md-5">
                        <select name="group_name" class="form-control selectpicker" data-show-subtext="true" data-live-search="true" required>
                            <option value="" selected disabled> --Select--</option>
                            <?php if($allGroups !=null){ foreach($allGroups as $group) {?>
                            <option value="<?php echo $group->group_name;?>" <?php if($group->group_name==$testInfo[0]->group_name) echo "selected" ?>  > <?php echo filter(str_replace("_"," ",$group->group_name)); ?></option>
                            <?php } }?>
                        </select>
                    </div>
                </div>
                <input type="hidden" name="test_id" value="<?php echo  $testInfo[0]->id;?>">
                <div class="form-group">
                    <label class="col-md-2 control-label">Test Name <span class="req">*</span></label>
                    
                     <div class="col-md-5">
                        <input type="text" name="test_name" class="form-control" value="<?php echo str_replace('_',' ',$testInfo[0]->test_name);?>" required>
                    </div>
                </div>

                <div class="col-md-7">
                    <div class="btn-group pull-right">
                        <input type="submit" value="Save" name="change" class="btn btn-primary">
                    </div>
                </div>

                <?php echo form_close(); ?>
            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>
