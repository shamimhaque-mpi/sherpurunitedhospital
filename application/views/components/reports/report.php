<style>
    .action-btn a{margin-right: 0;margin: 3px 0;}
</style>

<div class="container-fluid">
    <div class="row">
        <?php  echo $this->session->flashdata('confirmation'); ?>
        <div class="panel panel-default loader-hide" id="data">
            <div class="panel-heading">
                <div class="panal-header-title">
                    <h1 class="pull-left">View All Company</h1>
                    <a class="btn btn-primery pull-right" style="font-size: 14px; margin-top: 0;" onclick="window.print()"><i class="fa fa-print"></i> Print</a>
                </div>
            </div>

            <div class="panel-body">
                <!-- Print banner Start Here -->
                <?php  $this->load->view('print'); ?>

                <table class="table table-bordered table-hover">
                    <tr>
                        <th width="50">SL</th>
                        <th>Name</th>
                        <th class="none" style="width: 160px;">Action</th>
                    </tr>

                    <tr>
                        <input type="hidden">
                        <td></td>
                        <td></td>
                        <td class="none action-btn">
                            <a class="btn btn-warning" title="Edit" href="<?php echo site_url('');?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> 

                            <a
                                onclick="return confirm('Do you want to delete this Company?');" class="btn btn-danger"
                                title="Delete"
                                href="<?php echo site_url(''); ?>">
                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                            </a>
                        </td>
                    </tr>
                </table>
                
            </div>

            <div class="panel-footer"> </div>
        </div>
    </div>
</div>
