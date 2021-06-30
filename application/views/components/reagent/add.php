<div class="container-fluid">
    <div class="row">
        <?php echo $this->session->flashdata('confirmation'); ?>
        <div class="panel panel-default">
            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>Add New Reagent</h1>
                </div>
            </div>
            <div class="panel-body">
                <?php $attr = array(
                'class' =>'form-horizontal'
                );
                echo form_open('reagent/reagent/addReagent',$attr); ?>
                <div class="form-group">
                    <label class="col-md-2 control-label"> Reagent Name <span class="req">*</span></label>
                    <div class="col-md-5">
                        <input type="text" name="reagent" placeholder="" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-7">
                        <input type="submit" value="Save" name="submit" class="btn btn-primary pull-right">
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>