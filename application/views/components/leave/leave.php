<div class="container-fluid">
    <div class="row">
    <?php echo $confirmation;
     ?>
        <div class="panel panel-default">

            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>
                        <?php //echo caption('Add_Employee') ;?>
                       Leave Setting 
                    </h1>
                </div>
            </div>

            <div class="panel-body">


                <!-- horizontal form -->
                <?php
                    $attr=array("class"=>"form-horizontal");
                    echo form_open_multipart('', $attr);
                ?>

                <div class="col-md-9">
                    <div class="form-group">
                        <label class="col-md-3 control-label">Employee ID <span class="req">*</span></label>
                        <div class="col-md-7">
                            <input type="text" name="emp_id" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Employee Name </label>
                        <div class="col-md-7">
                            <input type="text" name="employee_name" class="form-control" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Designation </label>
                        <div class="col-md-7" >
                            <input type="text" name="designation" class="form-control" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Department</label>
                        <div class="col-md-7" >
                            <input type="text" name="department" class="form-control" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label"> Joining Date </label>
                        <div class="input-group date col-md-7">
                            <input type="text" name="joining_date" class="form-control" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Total Leave <span class="req">*</span></label>
                        <div class="col-md-7">
                            <input type="text" name="Total_leave" class="form-control" required>
                        </div>
                    </div>


                    <div class="col-md-10">
                       <div class="row">
                            <div class="btn-group pull-right">
                                <input type="submit" name="leave_sub" value="Submit" class="btn btn-primary">
                            </div>
                       </div>
                    </div>
                </div>

                    <aside class="col-md-3">
                        <div class="border-top">&nbsp;</div>
                        <figure class="profile-pic">
                            <img style="margin-bottom: 0;" src="<?php echo site_url('public/img/pic-male.png'); ?>" alt="Photo not found!" class="img-responsive">
                        </figure>
                        <br/>
                    </aside>


                <?php echo form_close(); ?>

            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>
