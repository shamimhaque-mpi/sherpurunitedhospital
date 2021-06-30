<style>
    .last-child-left tr th:last-child,
    .last-child-left tr td:last-child {text-align: left !important;}
</style>
<div class="container-fluid">
    <div class="row">
        <?php echo $this->session->flashdata('confirmation'); ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panal-header-title">
                    <h1 class="pull-left">Show Mapping</h1>
                    <a class="btn btn-primery pull-right" style="font-size: 14px; margin-top: 0;"
                       onclick="window.print()"><i class="fa fa-print"></i> Print</a>
                </div>
            </div>


            <div class="panel-body" ng-cloak>
                <?php  $this->load->view('print'); ?>
                
                <table class="table last-child-left table-bordered">
                    <?php
                    if (!empty($results)) {
                        foreach ($results as $g_row) { ?>
                            <tr>
                                <th colspan="6" class="btn-info"><?php echo $g_row['group_name']; ?></th>
                            </tr>
                            <?php if (!empty($g_row['test'])) { ?>
                                <tr>
                                    <th width="30">SL</th>
                                    <th>Test Name</th>
                                    <th>Room</th>
                                    <th>Fee</th>
                                    <th>Cost</th>
                                    <th>Parameter</th>
                                </tr>
                                <?php foreach ($g_row['test'] as $t_key => $t_row) { ?>
                                    <tr>
                                        <td><?php echo ++$t_key; ?></td>
                                        <td><?php echo $t_row['test_name']; ?></td>
                                        <td><?php echo $t_row['room']; ?></td>
                                        <td><?php echo $t_row['fee']; ?></td>
                                        <td><?php echo $t_row['cost']; ?></td>
                                        <td>
                                            <?php
                                            if (!empty($t_row['parameter'])) {
                                                $count = count($t_row['parameter']);
                                                foreach ($t_row['parameter'] as $p_key => $p_item) {
                                                    echo $p_item->parameter_name . ' ' . $p_item->ref_value . ' ' . $p_item->unit;
                                                    if (++$p_key < $count){
                                                        echo ', <br>';
                                                    }
                                                }
                                            } ?>
                                        </td>
                                    </tr>
                                <?php }
                            } ?>
                        <?php }
                    } ?>

                </table>
            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>