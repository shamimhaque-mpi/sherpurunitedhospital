<style>
     @media print {
        aside, nav, .none, .panel-heading, .panel-footer{display: none !important;}
        .panel{
            border: 1px solid transparent;
            left: 0px;
            position: absolute;
            top: 0px;
            width: 100%;
        }
        .hide{display: block !important;}
    }
</style>

<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default none">
            <div class="panel-heading">
                <div class="panal-header-title">
                    <div class="pull-left"><h1>Commission</h1></div>
                </div>
            </div>

            <div class="panel-body">

                <?php $attr = array('class' => 'form-horizontal');
                echo form_open('', $attr); ?>

                <div class="form-group">
                    <label class="col-md-2 control-label"> Name</label>
                    <div class="col-md-5">
                        <select name="search[person_id]" class="form-control">
                            <option value="" selected disabled>&nbsp;</option>
                            <?php 
                            if ($allPC != null) {
                            foreach ($allPC as $row) { ?>
                            <option value="<?php echo $row->id ?>"><?php echo $row->fullName ?></option>
                            <?php } } ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label">Date From</label>
                    <div class="col-md-5">
                        <div class="input-group date" id="datetimepickerFrom">
                            <input type="text" name="date[from]" class="form-control" placeholder="YYYY-MM-DD">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label">To</label>
                    <div class="col-md-5">
                        <div class="input-group date" id="datetimepickerTo">
                            <input type="text" name="date[to]" class="form-control" placeholder="YYYY-MM-DD">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-7">
                        <input type="submit" name="show" value="Show" class="btn btn-primary pull-right">
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>




        <?php if ($pcCom != null) {?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panal-header-title">
                    <div class="pull-left"><h1>Show Result</h1></div>

                    <a href="#" class="pull-right" style="font-size: 14px;" onclick="window.print()">
                        <i class="fa fa-print"></i> 
                        Print
                    </a>
                </div>
            </div>


            <div class="panel-body">
                <!-- Print banner -->
                <img class="img-responsive hide print-banner" src="<?php echo site_url('private/images/banner.jpg'); ?>">

                <span class="hide print-time">
                    <?php echo filter($this->data['name']) . ' | ' . date('Y, F j  h:i a'); ?>
                </span>

                <table class="table table-bordered">
                    <tr>
                        <th style="cursor:pointer;" ng-click="sortField='sl';reverse = !reverse;">Sl</th>
                        <th>PC Name</th>
                        <th>Patient Name</th>
                        <th>ID</th>
                        <th>Bill</th>
                        <th>Commission</th>
                    </tr>

                    <?php
                        $counter = 0;
                        $commission = $totalCommission = $totalBill = 0; 
                        foreach ($pcCom as $key => $row) {
                        $bill = 0;

                        $pcID = explode(":", $row->ref);

                        $pcInfo = $this->action->read("pc", array("id" => $row->person_id));

                        $regInfo = $this->action->read("registrations", array("id" => $pcID[1]));

                        $patientInfo = $this->action->read("patients", array("pid" =>  $regInfo[0]->pid));

                        $billInfo = $this->action->read("bills", array("pid" =>  $regInfo[0]->pid));

                        if ($pcInfo != null && $billInfo != null && $patientInfo != null) {

                            foreach ($billInfo as $key => $row) {
                                $bill += $row->grand_total;
                            }

                            $commission = round(($bill * $pcInfo[0]->commission ) / 100);
                            $totalCommission += $commission;
                            $totalBill += $bill;
                            $counter++
                    ?>
                    <tr>
                        <td><?php echo $counter; ?></td>
                        <td><?php echo v_check(filter($pcInfo[0]->fullName)); ?></td>
                        <td><?php echo v_check(filter($patientInfo[0]->name)); ?></td>
                        <td><?php echo $patientInfo[0]->pid; ?></td>
                        <td><?php echo $bill . " ৳ "; ?></td>
                        <td><?php echo $commission . " ৳ "; ?></td>
                    </tr>
                    <?php } } ?>

                    <tr>
                        <th colspan="4" class="text-right">Total</th>
                        <th><?php echo $totalBill . " ৳ "; ?></th>
                        <th><?php echo $totalCommission . " ৳ "; ?></th>
                    </tr>
                </table>
            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>
        <?php } ?>
    </div>
</div>

<script>
    // linking between two date
    $('#datetimepickerFrom').datetimepicker({
        format: 'YYYY-MM-DD',
        useCurrent: false
    });
    $('#datetimepickerTo').datetimepicker({
        format: 'YYYY-MM-DD',
        useCurrent: false
    });
    $("#datetimepickerFrom").on("dp.change", function (e) {
        $('#datetimepickerTo').data("DateTimePicker").minDate(e.date);
    });
    $("#datetimepickerTo").on("dp.change", function (e) {
        $('#datetimepickerFrom').data("DateTimePicker").maxDate(e.date);
    });
</script>


