<div class="container-fluid" ><!--ng-controller="addSubcategoryCtrl"  -->
    <div class="row">
	<?php echo $this->session->flashdata('confirmation'); ?>
        <div class="panel panel-default">

            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>Add New Company</h1>
                </div>
            </div>

            <div class="panel-body">
                <?php
				$attr = array('class' =>'form-horizontal');
	            echo form_open('brand/brand/add', $attr);
				?>
                

                <div class="form-group">
                    <label class="col-md-3 control-label">Company Name <span class="req">*</span></label>

                    <div class="col-md-5">
                        <input type="text" name="brand" placeholder="" class="form-control" required>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="btn-group pull-right">
                        <input type="submit" value="Save" name="catetory_submit" class="btn btn-primary">
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>
