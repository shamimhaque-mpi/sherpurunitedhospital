<style>
    .action-btn a { margin-right: 0;margin: 3px 0; }
</style>

<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default none">
            <div class="panel-heading">
                <div class="panal-header-title">
                    <h1>All Parameter</h1>
                </div>
            </div>

            <div class="panel-body">
                <form action="" method="POST" class="form-horizontal" >
                <div class="form-group">
                    <div class="col-md-3">
                        <select name="test_name" class="form-control selectpicker"  data-show-subtext="true" data-live-search="true" >
                            <option value="" selected disabled> -- Select Test Name -- </option>
                            <?php foreach($allTestName as $key =>$row){ ?>
                            <option value="<?= $row->test_name; ?>"><?= filter($row->test_name); ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="col-md-1">
                        <div class="pull-right">
                            <div class="btn-group">
                                <input type="submit" name="show" value="Show" class="btn btn-primary">
                            </div>
                        </div>
                    </div>

                </div>

                </form>
            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>
        
        <?php  echo $this->session->flashdata('confirmation'); ?>
        <div class="panel panel-default loader-hide" id="data">
            <div class="panel-heading">
                <div class="panal-header-title">
                    <h1 class="pull-left">View All Parameter</h1>
                    <a class="btn btn-primery pull-right" style="font-size: 14px; margin-top: 0;" onclick="window.print()"><i class="fa fa-print"></i> Print</a>
                </div>
            </div>

            <div class="panel-body">
                <!-- Print banner Start Here -->
                <?php  $this->load->view('print'); ?>

                <table class="table table-bordered table-hover">
                    <tr>
                        <th width="50">SL</th>
                        <th>Test Name</th>
                        <th>Parameter</th>
                        <th>Referral Value with Condition</th>
                        <th>Unit</th>
                        <th class="none" style="width: 160px;">Action</th>
                    </tr>
                    <?php $i=0; foreach($procedures as $procedure){ ?>
                    <tr>
                        <input type="hidden">
                        <td><?= ++$i ?></td>
                        <td><?= filter($procedure->test_name) ?></td>
                        <td><?= $procedure->parameter ?></td>
                        <td><?= $procedure->referral_value ?></td>
                        <td><?= $procedure->unit ?></td>
                        <td class="none action-btn">
                            <a class="btn btn-warning" title="Edit" href="<?php echo site_url('procedure/procedure/procedureEdit/'.$procedure->id);?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> 

                            <a onclick="return confirm('Do you want to delete this Company?');" class="btn btn-danger"
                               title="Delete" href="<?php echo site_url('procedure/procedure/delete/'.$procedure->id); ?>">
                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                            </a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                
            </div>

            <div class="panel-footer"> </div>
        </div>
    </div>
</div>
