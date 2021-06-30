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
                    <div class="pull-left"><h1>All Payment</h1></div>
                </div>
            </div>

            <div class="panel-body">

                <?php $attr = array('class' => 'form-horizontal');
                echo form_open('', $attr); ?>

                <div class="form-group">
                    <label class="col-md-2 control-label"> Name</label>
                    <div class="col-md-5">
                        <select name="rf_pc_id" class="form-control selectpicker" 
                            data-show-subtext="true"
                            data-live-search="true">
                            <option value="" selected disabled>&nbsp;</option>
                            <?php 
                            if ($marketer != null) {
                                foreach ($marketer as $row) { ?>
                                <option value="<?php echo $row->id; ?>"><?php echo $row->name; ?></option>
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



        <?php if($rf_pc_payment){ ?>
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
                <?php echo $this->session->flashdata("confirmation"); ?>
                <!-- Print banner -->
                <img class="img-responsive hide print-banner" src="<?php echo site_url('private/images/banner.jpg'); ?>">
                <h4 class="text-center hide">All Payment</h4>
                <hr class="hide">
                <table class="table table-bordered">
                    <tr>
                        <th width="40">Sl</th>
                        <th>Date</th>
                        <th>Name</th>
                        <th>Amount</th>
                        <th width="150" class="none">Action</th>
                    </tr>

                    <?php
                        $totalPaid = 0; 
                        foreach ($rf_pc_payment as $key => $row) {
                            $totalPaid += $row->payment;
                    ?>
                    <tr>
                        <td><?php echo $key+1; ?></td>
                        <td><?php echo $row->date ?></td>
                        <td><?php echo $row->name; ?></td>
                        <td><?php echo $row->payment; ?></td>
                        <td class="none">
                            <a title="Edit" class="btn btn-warning" href="<?php echo site_url('marketer/marketer_commision_collect/edit/'.$row->id); ?>">Edit</a>
                            <a class="btn btn-danger" onclick="return confirm('This Data Will Delete Permanently..!');" href="<?php echo site_url('marketer/marketer_commision_collect/delete/'.$row->id); ?>">Delete</a>
                        </td>
                    </tr>
                    <?php  } ?>

                    <tr>
                        <th colspan="3" class="text-right">Total</th>
                        <th><?php echo $totalPaid; ?></th>
                        <th class="none"></th>
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


