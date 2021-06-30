<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panal-header-title">
                    <h1 class="pull-left">Add Items</h1>
                    <a href="#" class="pull-right" style="margin-top: 0px; font-size: 14px;" onclick="window.print()">
                        <i class="fa fa-print"></i> Print
                    </a>
                </div>
            </div>
            <div class="panel-body">
                <?php echo $this->session->flashdata('confirmation'); ?>
                <!-- print banner here -->
                <?php  $this->load->view('print'); ?>
                
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th width="5%">SL</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th width="15%">Status</th>
                            <th width="100" class="none" style="text-align: center;">Action</th>
                        </tr>
                        <?php if($items) foreach($items as $key=>$value){ ?>
                        <tr>
                            <td><?=(++$key)?></td>
                            <td><?=($value->name)?></td>
                            <td><?=($value->price)?></td>
                            <td><?=($value->status)?></td>
                            <td class="none">
                                <div class="btn-group">
                                    <a href="<?php echo site_url('bill/items/edit/'.$value->id);?>" class="btn btn-success"><i class="fa fa-pencil"></i></a>
                                    <a href="<?php echo site_url('bill/items/delete/'.$value->id);?>" onclick="return confirm('Are You sure ??')" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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