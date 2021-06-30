<div class="container-fluid">
    <div class="row">
        <?php echo $this->session->flashdata('confirmation'); ?>
        <div class="panel panel-default print_none">
            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>Add Group</h1>
                </div>
            </div>
            <div class="panel-body">
                <form action="" method="POST" class="form-horizontal">
                    <div class="form-group">
                        <label class="col-md-2 control-label"> Group Name <span class="req">*</span></label>
                        <div class="col-md-5">
                            <input type="text" name="group_name"
                                   value="<?= (isset($group) ? $group->group_name : '') ?>" class="form-control"
                                   required>
                            <?php if (isset($group)) { ?>
                                <input type="hidden" name="id" value="<?= ($group->id) ?>">
                            <?php } else { ?>
                                <input type="hidden" name="created_at" value="<?= (date('Y-m-d')) ?>">
                            <?php } ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label"> Price <span class="req">&nbsp;</span></label>
                        <div class="col-md-5">
                            <input type="text" name="price"
                                   value="<?= (isset($group) ? $group->price : '') ?>" class="form-control" placeholder="0">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-2 control-label"> Remarks <span class="req">&nbsp;</span></label>
                        <div class="col-md-5">
                            <input type="text" name="remarks"
                                   value="<?= (isset($group) ? $group->remarks : '') ?>" class="form-control" placeholder="Remarks">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-7">
                            <input type="submit" value="<?= (isset($group) ? 'Update' : 'Save') ?>"
                                   name="<?= (isset($group) ? 'update' : 'save') ?>" class="btn btn-primary pull-right">
                        </div>
                    </div>
                </form>
            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>


        <div class="panel panel-default loader-hide" id="data">
            <div class="panel-heading">
                <div class="panal-header-title">
                    <h1 class="pull-left">All Group</h1>
                    <a class="btn btn-primery pull-right" style="font-size: 14px; margin-top: 0;"
                       onclick="window.print()"><i class="fa fa-print"></i> Print</a>
                </div>
            </div>


            <div class="panel-body">
                <?php  $this->load->view('print'); ?>
                
                <table class="table table-bordered"  id="DataTable">
                    <thead>
                    <tr>
                        <th width="30">SL</th>
                        <th>Group Name</th>
                        <th>Price</th>
                        <th>Remarks</th>
                        <th class="none" width="80">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($groups as $key => $group) { ?>
                        <tr>
                            <td><?= (++$key) ?></td>
                            <td><?= ($group->group_name) ?></td>
                            <td><?= ($group->price) ?></td>
                            <td><?= ($group->remarks) ?></td>
                            <td class="none">
                                <a class="btn btn-warning" title="Edit"
                                   href="<?php echo site_url('alltest/group?id=' . $group->id); ?>"><i
                                            class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                <a onclick="return confirm('Do you want to delete this Data?');"
                                   class="btn btn-danger" title="Delete"
                                   href="<?php echo site_url('alltest/group/delete/' . $group->id); ?>"><i
                                            class="fa fa-trash-o" aria-hidden="true"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
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
        $('#DataTable').dataTable({
            'lengthMenu': [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
            'iDisplayLength': 100
        });
    });
</script>