<div class="container-fluid">
    <div class="row">
        <?php echo $confirmation;?>
        <div class="panel panel-default">

            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>
                       Employee Leave Status
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
                        <label class="col-md-4 control-label">Employee ID <span class="req">*</span></label>
                        <div class="col-md-6">
                            <input type="text" name="emp_id" class="form-control" required>
                        </div>
                        <div class="col-md-2">
                            <div class="btn-group">
                                <input type="submit" name="leave_sub" value="Submit" class="btn btn-primary">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <table class="table table-bordered">
                        <tr>
                            <th width="40">SL</th>
                            <th>Employee Name</th>
                            <th>Photo</th>
                            <th>Designation</th>
                            <th>Department</th>
                            <th>Leave Date</th>
                            <th>Leave Record</th>
                            <th class="none">Action</th>
                        </tr>

                        <tr>
                            <td> </td>
                            <td> </td>
                            <td style="width: 50px;"> <img src="<?php echo site_url('public/img/pic-male.png'); ?>" width="50px" height="50px" alt=""></td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td></td>
                            <td class="none " style="width: 180px;">
                                <div class="dropdown text-center">
                                    <!--a title="Edit" class="btn btn-warning" href="<?php echo site_url('leave/leave/view'); ?>" ><i class="fa fa-eye" aria-hidden="true"></i></a>
                                    <a class="btn btn-info" href="<?php echo site_url('leave/leave/edit'); ?>"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                    <a title="Delete" class="btn btn-danger" onclick="return confirm('Do you want to delete this Category?');" href="#"><i class="fa fa-trash-o" aria-hidden="true"></i></a -->
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th colspan="6"> <p class="pull-right">Total Leave</p> </th>
                            <td colspan="2"> </td>
                        </tr>
                        <tr>
                            <th colspan="6"> <p class="pull-right">Balanced Leave</p> </th>
                            <td colspan="2">  </td>
                        </tr>
                    </table>
                </div>
                <?php echo form_close(); ?>
            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>