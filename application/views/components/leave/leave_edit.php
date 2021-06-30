 <div class="container-fluid">
    <div class="row">
    <?php echo $confirmation;
     ?>
        <div class="panel panel-default">

            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>Leave View</h1>
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
                        <label class="col-md-3 control-label">Employee ID </label>
                        <div class="col-md-7">
                            <input type="text" name="emp_id" class="form-control" >
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Employee Name </label>
                        <div class="col-md-7">
                            <input type="text" name="employee_name" class="form-control" >
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Department</label>
                        <div class="col-md-7" >
                            <select name="designation" class="form-control" >
                                <option value="">-- Select Your Option --</option>
                                <?php foreach (config_item('department') as $value) { ?>
                                    <option value="<?php echo $value; ?>"><?php echo $value; ?></option>
                                <?php } ?>

                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Designation</label>
                        <div class="col-md-7" >
                            <select name="designation" class="form-control" >
                                <option value="">-- Select Your Option --</option>
                                <?php foreach (config_item('desigation') as $value) { ?>
                                    <option value="<?php echo $value; ?>"><?php echo $value; ?></option>
                                <?php } ?>

                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label"> Joining Date </label>
                        <div class="input-group date col-md-7" id="datetimepicker3">
                            <input type="text" name="joining_date" class="form-control" >
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Leave Type </label>
                        <div class="col-md-7">
                            <select name="leave_type" class="form-control" >
                                <option value="">-- Select --</option>
                                <option value="Absent">Absent</option>
                                <option value="Sickness">Sickness</option>
                                <option value="Casual">Casual</option>
                                <option value="Break">Break</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Total Leave </label>
                        <div class="col-md-7">
                            <input type="text" name="Total_leave" class="form-control" >
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Leave From </label>
                        <div class="input-group date col-md-7" id="datetimepicker1">
                            <input type="text" name="leave_form" class="form-control">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Leave To </label>
                        <div class="input-group date col-md-7" id="datetimepicker2">
                            <input type="text" name="leave_to" class="form-control">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Balanced Leave </label>
                        <div class="col-md-7">
                            <input type="text" name="balanced_leave" class="form-control" >
                        </div>
                    </div>



                    <div class="col-md-10">
                        <div class="row">
                            <div class="btn-group pull-right">
                                <input type="submit" name="leave_sub" value="Save" class="btn btn-primary">
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
<script>
    $('#datetimepicker1').datetimepicker({
        format: 'YYYY-MM-DD',
        useCurrent: false
    });

     $('#datetimepicker2').datetimepicker({
        format: 'YYYY-MM-DD',
        useCurrent: false
    });

     $('#datetimepicker3').datetimepicker({
        format: 'YYYY-MM-DD',
        useCurrent: false
    });
</script> 