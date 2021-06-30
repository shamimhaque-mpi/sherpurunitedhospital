<style>
    .action-btn a { margin: 3px 0;}
</style>
<div class="container-fluid">
    <div class="row">
        <?php echo $this->session->flashdata('confirmation'); ?>
        <div class="panel panel-default loader-hide" id="data">
            <div class="panel-heading">
                <div class="panal-header-title">
                    <h1 class="pull-left">All Report</h1>
                    <a class="btn btn-primery pull-right" style="font-size: 14px; margin-top: 0;" onclick="window.print()"><i class="fa fa-print"></i> Print</a>
                </div>
            </div>
            <div class="panel-body">
                <form action="" method="POST" class="form-horizontal print_none" >
                    <div class="form-group">
                        
                        <div class="col-md-2">
                            <div class="input-group date" id="datetimepicker1">
                                <input type="text" name="dateFrom" class="form-control" placeholder="Form">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                        
                        <div class="col-md-2">
                            <div class="input-group date" id="datetimepicker2">
                                <input type="text" name="dateTo" class="form-control" placeholder="To">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                        
                        <div class="col-md-2">
                            <input type="text" name="pid" class="form-control" placeholder="Voucher">
                        </div>
                        
                        <div class="col-md-2">
                            <input type="text" name="contact" class="form-control" placeholder="Mobile">
                        </div>
                        
                        <div class="col-md-2">
                            <select name="gender" class="form-control select2">
                                <option value="">Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Others">Others</option>
                            </select>
                        </div>
                        
                        <div class="col-md-1">
                            <div class="pull-right">
                                <div class="btn-group">
                                    <input type="submit" value="Show" class="btn btn-primary">
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </form>
                <!-- Print banner Start Here -->
                <?php  $this->load->view('print'); ?>

                <table class="table table-bordered table-hover">
                    <tr>
                        <th width="50">SL</th>
                        <th>Date</th>
                        <th>Voucher</th>
                        <th>Patient Name</th>
                        <th>Gender</th>
                        <th>Age</th>
                        <th>contact</th>
                        <!--<th>Test</th>-->
                        <th class="none" style="width: 160px;">Action</th>
                    </tr>
                    <?php $id=0; foreach($patient_histories as $info): ?>
                    <tr>
                        <td><?= ++$id ?></td>
                        <td><?= substr($info->created_at, 0, 10) ?></td>
                        <td><?= $info->pid ?></td>
                        <td><?= $info->name ?></td>
                        <td><?= $info->gender ?></td>
                        <td><?= $info->age ?></td>
                        <td><?= $info->contact ?></td>
                        <!--<td><?= $info ?></td>-->
                        <td class="none action-btn">
                            <a class="btn btn-info" title="View" href="<?php echo site_url('reports/test/view/'.$info->pid);?>"><i class="fa fa-eye" aria-hidden="true"></i></a> 
                            <a class="btn btn-warning" title="Edit" href="<?php echo site_url('reports/test/edit/'.$info->pid);?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> 
                            <a onclick="return confirm('Do you want to delete this Company?');" class="btn btn-danger"
                                title="Delete" href="<?php echo site_url('reports/test/report_delete/'.$info->pid); ?>"> <i class="fa fa-trash-o" aria-hidden="true"></i>
                            </a>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </table>
            </div>
            <div class="panel-footer"> </div>
        </div>
    </div>
</div>

<script>
    $('#datetimepicker2').datetimepicker({
        format: 'YYYY-MM-DD'
    });
    $('.select2').select2();
</script>