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
                        <select name="search[person_id]" class="selectpicker form-control" data-show-subtext="true" data-live-search="true">
                            <option value="" selected disabled>&nbsp;</option>
                            <?php 
                            if ($allmarketer != null) {
                            foreach ($allmarketer as $row) { ?>
                            <option value="<?php echo $row->id ?>"><?php echo $row->name ?></option>
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




        <?php if ($marketerCom != null) { ?>
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
                        <th>Sl</th>
                        <th>Date</th>
                        <th>Reference Name</th>
                        <th>Balnce</th>
                        <th>Paid</th>
                        <th>Due</th>
                    </tr>

                    <?php
                        $totalPaid = 0; 
                        foreach ($marketerCom as $key => $row) {

                        $marketerInfo = $this->action->read("marketer", array("id" => $row->person_id));

                        $totalPaid += $row->paid;
                    ?>
                    
                    <tr>
                        <td><?php echo $key+1; ?></td>
                        <td><?php echo $row->payment_date ?></td>
                        <td><?php echo v_check(filter($marketerInfo[0]->name)); ?></td>
                        <td><?php echo $row->balance ?></td>
                        <td><?php echo $row->paid ?></td>
                        <td><?php echo $row->due ?></td>
                    </tr>
                    <?php  } ?>

                    <tr>
                        <th colspan="4" class="text-right">Total</th>
                        <th><?php echo $totalPaid; ?></th>
                        <th></th>
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


