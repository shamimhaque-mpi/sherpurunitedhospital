<div class="container-fluid">
    <div class="row">
        <?php  echo $this->session->flashdata('confirmation'); ?>
        <div class="panel panel-default">
            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                   <h1>Edit Company Name</h1>
                </div>
            </div>

            <div class="panel-body">
                <?php
                $attr = array('class' => "form-horizontal");
                echo form_open('brand/brand/edit' . '?id=' . $this->input->get('id'), $attr);
                ?>


                <div class="form-group">
                    <label class="col-md-3 control-label">Company Name <span class="req">*</span></label>
                    <div class="col-md-5">
                        <input
                            type="text"
                            name="brand"
                            value="<?php echo $brand[0]->name; ?>"
                            class="form-control" >
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="btn-group pull-right">
                        <input type="submit" value="Update" class="btn btn-success">
                    </div>
                </div>
               <?php echo form_close(); ?>
            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>
