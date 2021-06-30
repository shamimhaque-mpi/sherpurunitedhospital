<div class="container-fluid">
    <div class="row">
        <?php // echo "<pre>"; print_r($emp_info); echo "</pre>"; ?>
        <?php echo $this->session->flashdata('confirmation'); ?>

        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panal-header-title ">
                    <h1 class="pull-left">All Employee <br> <small><?php echo count($emp_info) ?> Item Found</small>
                    </h1>
                    <a class="btn btn-primery pull-right" style="font-size: 14px; margin-top: 0;"
                       onclick="window.print()"><i class="fa fa-print"></i> Print</a>
                </div>
            </div>

            <div class="panel-body none">

                <?php echo form_open(); ?>

                <div class="row">
                    <div class="form-group">
                        <div class="col-md-4">
                            <select name="search[designation]" class="form-control">
                                <option value="">-- Select designation --</option>
                                <?php
                                if (!empty($allDesignation)) {
                                    foreach ($allDesignation as $value) { ?>
                                        <option value="<?php echo $value->designation_name; ?>"><?php echo $value->designation_name; ?></option>
                                        <?php
                                    }
                                } ?>
                            </select>
                        </div>

                        <div class="col-md-3">
                            <select name="search[type]" class="form-control">
                                <option value="">-- Select type --</option>
                                <option value="Daily">Daily</option>
                                <option value="Weekly">Weekly</option>
                                <option value="Monthly">Monthly</option>
                            </select>
                        </div>
                        
                        <div class="col-md-2">
                            <input type="submit" name="show" value="Search" class="btn btn-primary">
                        </div>
                    </div>
                </div>

                <?php echo form_close(); ?>
            </div>

            <hr style="margin-top: 0px;">


            <div class="panel-body">
                <!--Print Banner Start Here-->
                <?php  $this->load->view('print'); ?>

                <div class="">
                    <table class="table table-bordered">
                        <tr>
                            <th>SL</th>
                            <th>Joining Date</th>
                            <th>Employee ID</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Designation</th>
                            <th>Mobile Number</th>
                            <th>Status</th>
                            <th class="none">Action</th>
                        </tr>
                        <?php foreach ($emp_info as $key => $emp) { ?>

                            <tr>
                                <td> <?php echo $key + 1; ?> </td>
                                <td style="width: 130px;"> <?php echo $emp->joining_date; ?> </td>
                                <td style="width: 130px;"> <?php echo $emp->emp_id; ?> </td>
                                <td style="width: 50px;"><img src="<?php echo site_url($emp->path); ?>" width="40px"
                                                              height="40px" alt=""></td>
                                <td> <?php echo filter($emp->name); ?> </td>
                                <td> <?php echo filter($emp->designation); ?></td>
                                <td> <?php echo $emp->mobile; ?></td>
                                <td> <?php if ($emp->status == 'inactive') {
                                        echo 'Deactive';
                                    } else {
                                        echo 'Active';
                                    } ?></td>
                                <td class="none" style="width: 70px;">
                                    <div class="dropdown pull-right">
                                        <button type="button" class="btn btn-default dropdown-toggle"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-cog"></i>
                                            <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-right ulbordertop">
                                            <li></li>

                                            <?php //if(ck_action("employee","view")){ ?>
                                            <li>
                                                <a href="<?php echo site_url('employee/employee/profile?id=' . $emp->id); ?>">View</a>
                                            </li>
                                            <?php //} ?>


                                            <?php //if(ck_action("employee","edit")){ ?>
                                            <li>
                                                <a href="<?php echo site_url('employee/employee/edit_employee?id=' . $emp->id); ?>">Edit</a>
                                            </li>
                                            <?php //} ?>



                                            <?php //if(ck_action("employee","delete")){ ?>
                                            <li>
                                                <a onclick="return confirm('Are you sure to delete this data?');"
                                                   href="<?php echo site_url('/employee/employee/delete/' . $emp->id); ?>">
                                                    Delete</a>
                                            </li>
                                            <?php //} ?>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>

            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>
