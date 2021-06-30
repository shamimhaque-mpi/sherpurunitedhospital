<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css" />

<style>
@media print{
    aside, nav, .none, .panel-heading, .panel-footer{display: none !important;}
    .panel{border: 1px solid transparent;left: 0px;position: absolute;top: 0px;width: 100%;}
    .hide{display: block !important;}
    .block-hide{display: none;}
}
</style>
<div class="container-fluid block-hide">
    <div class="row">
    <?php echo $this->session->flashdata('confirmation'); ?>
    <!-- horizontal form -->
    <?php $attribute = array('name' => '','class' => 'form-horizontal','id' => '');
    
    echo form_open('procedure/procedure/procedureEdit/'.$procedure[0]->id, $attribute); ?>
    
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panal-header-title pull-left">
                    <h1> Edit Parameter </h1>
                </div>
            </div>

            <div class="panel-body no-padding">
                <div class="no-title">&nbsp;</div>
                    <div class="form-group">
                        <label for="" class="col-md-3 control-label">Test Name </label>
                        <div class="col-md-5">
                            <select name="test_name" class="selectpicker form-control" data-show-subtext="true" data-live-search="true">
                                <option value="" selected disabled>&nbsp;</option>
                                <?php foreach ($test as $key => $value) {?>
                                <option value="<?php echo $value->test_name; ?>" <?= $procedure[0]->test_name == $value->test_name ? 'selected':'' ?>><?php echo $value->test_name; ?></option>
                                <?php } ?>                             
                            </select> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-md-3 control-label">Parameter </label>
                        <div class="col-md-5">
                            <input type="text" name="parameter" value="<?= $procedure[0]->parameter ?>" class="form-control" placeholder="">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="" class="col-md-3 control-label">Referral Value with Condition </label>
                        <div class="col-md-5">
                            <input type="text" name="referral_value" value="<?= $procedure[0]->referral_value ?>" class="form-control" placeholder="">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="" class="col-md-3 control-label">Unit </label>
                        <div class="col-md-5">
                            <input type="text" name="unit" value="<?= $procedure[0]->unit ?>" class="form-control" placeholder="">
                        </div>
                    </div>
                    
                    <div class="col-md-8">
                        <div class="btn-group pull-right" style="margin-bottom: 16px;">
                            <input class="btn btn-primary" type="submit" name="updateProcedureBtn" value="Save">
                        </div>
                    </div>
            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>

        <?php echo form_close(); ?>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>