<div class="container-fluid">
    <div class="row">
        <?php echo $this->session->flashdata('confirmation'); ?>
        <div class="panel panel-default print_none">
            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>Add Parameter</h1>
                </div>
            </div>
            <div class="panel-body">

                <?php $attr = array('class' => 'form-horizontal');
                echo form_open('alltest/parameter/store', $attr); ?>


                <?php if (!empty($info)) { ?>
                    <input type="hidden" name="id" value="<?php echo $info->id; ?>">
                <?php } ?>


                <div class="form-group">
                    <label class="col-md-2 control-label"> Parameter Name <span class="req">*</span></label>
                    <div class="col-md-5">
                        <input type="text" name="parameter_name"
                               value="<?php echo(!empty($info) ? $info->parameter_name : ''); ?>" placeholder=""
                               class="form-control" required>
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-2 control-label"> Ref Value </label>
                    <div class="col-md-5">
                        <input type="text" name="ref_value"
                               value="<?php echo(!empty($info) ? $info->ref_value : ''); ?>" placeholder=""
                               class="form-control">
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-2 control-label"> Result <span class="req">&nbsp;</span></label>
                    <div class="col-md-5">
                        <input type="text" name="result" value="<?php echo(!empty($info) ? $info->result : ''); ?>"
                               placeholder="" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label"> Unit </label>
                    <div class="col-md-5">
                        <input type="text" name="unit" value="<?php echo(!empty($info) ? $info->unit : ''); ?>"
                               placeholder="" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-7">
                        <input type="submit" value="<?php echo(!empty($info) ? 'Update' : 'Save'); ?>" name="save"
                               class="btn btn-primary pull-right">
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>


        <div class="panel panel-default loader-hide" id="data">
            <div class="panel-heading">
                <div class="panal-header-title">
                    <h1 class="pull-left">All Parameter</h1>
                    <a class="btn btn-primery pull-right" style="font-size: 14px; margin-top: 0;"
                       onclick="window.print()"><i class="fa fa-print"></i> Print</a>
                </div>
            </div>


            <div class="panel-body">
                <?php  $this->load->view('print'); ?>
                <table class="table table-bordered" id="DataTable">
                    <thead>
                    <tr>
                        <th width="30">SL</th>
                        <th>Parameter Name</th>
                        <th>Referral Value</th>
                        <th>Result</th>
                        <th>unit</th>
                        <th class="none" width="80">Action</th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php
                    if (!empty($results)) {
                        foreach ($results as $key => $row) {
                            ?>
                            <tr>
                                <td><?php echo ++$key; ?></td>
                                <td><?php echo $row->parameter_name; ?></td>
                                <td><?php echo $row->ref_value; ?></td>
                                <td><?php echo $row->result; ?></td>
                                <td><?php echo $row->unit; ?></td>
                                <td class="none">
                                    <a class="btn btn-warning" title="Edit"
                                       href="<?php echo site_url('alltest/parameter?id=') . $row->id; ?>"><i
                                                class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                    <a onclick="return confirm('Do you want to delete this data?');"
                                       class="btn btn-danger" title="Delete"
                                       href="<?php echo site_url("alltest/parameter/delete/$row->id"); ?>"><i
                                                class="fa fa-trash-o" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                        <?php }
                    } ?>
                    </tbody>
                </table>
            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>

<!-- Add data table -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/jqc-1.12.4/dt-1.10.22/datatables.min.css"/>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs/jqc-1.12.4/dt-1.10.22/datatables.min.js"></script>
<script>
    $(document).ready(function () {
        $('#DataTable').DataTable({
            'lengthMenu': [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
            'iDisplayLength': 100
        });
    });
</script>
