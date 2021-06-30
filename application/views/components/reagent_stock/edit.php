<style>
    .table2 tr td{ padding: 0 !important; }
    .table2 tr td input{ border: 1px solid transparent; }
    .new-row-1 .col-md-4 { margin-bottom: 8px; }
</style>

<div class="container-fluid" ng-controller="EditReagentEntry">
    <div class="row">
        <?php echo $this->session->flashdata('confirmation');; ?>
        <div class="panel panel-default">

            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>Edit</h1>
                </div>
            </div>


            <?php $voucherno = $this->input->get('vno'); ?>
            <div class="panel-body" ng-init="vno='<?php echo $voucherno; ?>'">
                <!-- horizontal form -->
                <?php
                $attr = array("class" => "form-horizontal");
                echo form_open('reagent_stock/edit?vno=' . $voucherno, $attr);
                ?>

                <div class="row new-row-1">
                    <div class="col-md-4">
                        <div class="input-group date" id="datetimepicker">
                            <input type="text" name="date" class="form-control" value="<?php echo $info[0]->date; ?>" required>
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                        <script type="text/javascript">
                            $(document).ready(function(){
                                $('#datetimepicker').datetimepicker({
                                    format: 'YYYY-MM-DD'
                                });
                            });
                        </script>
                    </div>

                    <div class="col-md-4">
                        <input type="text" name="voucher_number" value="<?php echo $info[0]->voucher_no; ?>" class="form-control" required>
                    </div>
                </div>

                <hr>

                <div>
                    <table class="table table-bordered table2">
                        <tr>
                            <th style="width: 5%;">SL</th>
                            <th style="width: 25%;">Reagent</th>
                            <th style="width: 10%;">Quantity</th>
                            <th style="width: 10%;">Expire Date</th>
                        </tr>

                        <tr ng-repeat="item in allReagent">
                            <td style="padding: 6px 8px !important;">
                                {{ $index + 1 }}
                                <input type="hidden" name="id[]" value="{{ item.reagentID }}">
                            </td>

                            <td>
                                <input type="text" name="reagent[]" class="form-control" ng-model="item.reagent" readonly> 
                            </td>

                            <td style="width: 125px;">
                                <input type="number" name="quantity[]" class="form-control" min="1" ng-model="item.quantity">
                            </td>

                            <td style="width: 125px;">
                                <input type="text" name="expire_date[]" class="form-control" ng-model="item.expire_date">
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="btn-group pull-right">
                    <input type="submit" name="save" value="Update" class="btn btn-primary">
                </div>
                <?php echo form_close(); ?>
            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>
 