<div class="container-fluid">
    <div class="row">

        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panal-header-title pull-left">
                    <h1>Add Meta Information</h1>
                </div>
            </div>

            <div class="panel-body">
                <?php 
                echo $this->session->flashdata('confirmation');
                $attr = array('class' => 'form-horizontal');
                echo form_open('', $attr);
                ?>

                <div class="col-md-9">
                    <div class="form-group">
                        <label class="col-md-3 control-label">
                            VAT <span class="req">*</span>
                        </label>

                        <div class="col-md-7">
						
							<div class="input-group">
							  <input type="text" name="metadata[vat]" class="form-control" placeholder="VAT">
							  <span class="input-group-addon"><i class="fa fa-percent" aria-hidden="true"></i></span>
							</div>

                        </div>
                    </div>  
                    
                    <div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-7">
                            <div class="btn-group pull-right">
                                <input class="btn btn-primary" type="submit" name="create" value="Save">
                            </div>
                        </div>
                    </div>
                </div>

                <?php echo form_close(); ?>
            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>

