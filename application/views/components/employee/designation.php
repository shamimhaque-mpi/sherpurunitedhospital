<div class="container-fluid">
    <div class="row">
        <?php echo $this->session->flashdata('confirmation'); ?>
        <div class="panel panel-default">

            <div class="panel-heading">
                <div class="panal-header-title pull-left">
                    <h1>Designation</h1>
                </div>
            </div>

            <div class="panel-body">

                <?php echo form_open('employee/designation/store', ['class' => 'form-horizontal']); ?>

                <?php if (!empty($info)) { ?>
                    <input type="hidden" name="id" value="<?php echo $info->id; ?>">
                    <input type="hidden" name="old_designation_name" value="<?php echo $info->designation_name; ?>">
                <?php } ?>

                <div class="form-group">
                    <label for="" class="control-label col-md-3">Designation</label>
                    <div class="col-md-4">
                        <input type="text" name="designation_name"
                               value="<?php echo (!empty($info) ? $info->designation_name : ''); ?>" class="form-control">
                    </div>

                    <div class="col-md-2">
                        <input type="submit" name="save" value="<?php echo(!empty($info) ? 'Update' : 'Save'); ?>"
                               class="btn btn-primary">
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>

            <hr style="margin-top: 0px;">

            <div class="panel-body">
                <table class="table table-bordered">
                    <tr>
                        <th width="30">SL</th>
                        <th>Designation</th>
                        <th width="120" class="none">Action</th>
                    </tr>

                    <?php if (!empty($results)) {
                        foreach ($results as $key => $row) { ?>

                            <tr>
                                <td><?php echo ++$key; ?></td>
                                <td><?php echo $row->designation_name; ?></td>
                                <td>
                                    <a title="Edit" class="btn btn-warning" href="<?php echo site_url("employee/designation?id=$row->id"); ?>">
                                        <i class="fa fa-pencil-square-o"></i>
                                    </a>

                                    <a title="Delete" class="btn btn-danger" onclick="return confirm('Do you want to delete this data.')"
                                       href="<?php echo site_url("employee/designation/delete?id=$row->id"); ?>">
                                        <i class="fa fa-trash-o"></i>
                                    </a>
                                </td>
                            </tr>

                        <?php }
                    } else { ?>
                        <tr>
                            <th colspan="3" class="text-center">No records found....!</th>
                        </tr>
                    <?php } ?>
                </table>
            </div>


            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>