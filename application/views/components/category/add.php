<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css" />

<div class="container-fluid">
    <div class="row">
	<?php echo $this->session->flashdata('confirmation'); ?>
        <div class="panel panel-default">

            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>Add New Category</h1>
                </div>
            </div>

            <div class="panel-body">

                <?php $attr = array(
                    'class' =>'form-horizontal'
                    );
	            echo form_open('category/category/addCategory',$attr); ?>


                <div class="form-group">
                    <label class="col-md-2 control-label"> Category Name <span class="req">*</span></label>
                    <div class="col-md-5">
                        <input type="text" name="category" placeholder="" class="form-control" required>
                    </div>
                </div>


<!--                 <div class="form-group">
                    <label class="col-md-2 control-label">Brand <span class="req">*</span></label>
                    <div class="col-md-5">
                        <select name="brand" class="selectpicker form-control" data-show-subtext="true" data-live-search="true">
                          <option value="" selected disabled>&nbsp;</option>
                          <?php foreach ($info as $key => $value) {?>
                           <option value="<?php echo $value->name; ?> "><?php echo $value->name; ?></option>
                           <?php } ?>
                       </select>
                    </div>
                </div> -->

                <div class="form-group">
                    <div class="col-md-7">
                        <input type="submit" value="Save" name="catetory_submit" class="btn btn-primary pull-right">
                    </div>
                </div>

                <?php echo form_close(); ?>

            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>