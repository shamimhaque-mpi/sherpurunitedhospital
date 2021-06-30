<?php   $themeSetting = $this->action->read("theme_setting");
        if(isset($themeSetting[0]->header)){$themeHeader = json_decode($themeSetting[0]->header,true);}
    	if(isset($themeSetting[0]->footer)){$themeFooter = json_decode($themeSetting[0]->footer,true);}
    	if(isset($themeSetting[0]->logo)){$logo = json_decode($themeSetting[0]->logo,true);} ?>
    	
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css" />

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


<style type="text/css">
    .btn-group { width: 100%!important ; }
    .multiselect { width: 100%!important; }
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
                    
                    <div class="col-md-3">
                        <select id="item" name="search[person_id]" class="selectpicker form-control" data-show-subtext="true" data-live-search="true">
                            <option selected disabled> -- Select Doctor-- </option>
                        <?php
                        if ($allDoctors != null) { 
                            foreach ($allDoctors as $value) { ?>
                            <option value="<?php echo $value->id; ?>"><?php echo filter($value->fullName); ?></option>
                        <?php } } ?>
                        </select>
                    </div>
                
                    <div class="col-md-3">
                        <div class="input-group date" id="datetimepickerFrom">
                            <input type="text" name="date[from]" class="form-control" placeholder="YYYY-MM-DD">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                
                    <div class="col-md-3">
                        <div class="input-group date" id="datetimepickerTo">
                            <input type="text" name="date[to]" class="form-control" placeholder="YYYY-MM-DD">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                
                    <div class="col-md-3">
                        <input type="submit" name="show" value="Show" class="btn btn-primary ">
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>




        <?php if ($doctorCom != null) {?>
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
                <!-- Print banner Start Here -->
                <div class="col-xs-12 hide" style="border: 1px solid #ddd; !important; margin-bottom: 15px;">
                    <div class="col-xs-3" style="padding: 0;">
                        <img class="img-responsive" style="width: 100%; margin-top: 6px;" src="<?php echo site_url($logo['logo']); ?>" alt="">
                    </div>
                    <div class="col-xs-9" style="padding: 0;">
                    	<h2 style="text-align:center;"><?php echo strtoupper($themeHeader['site_name']); ?></h2>
                    	<p style="text-align:center;"><?php echo $themeHeader['place_name'];?></p>
                    	<p style="text-align:center;"><?php echo $themeFooter['addr_moblile']; ?> || <?php echo $themeFooter['addr_email']; ?></p>
                    </div>
                </div>
                <h4 class="text-center hide">Commission</h4>
                <span class="hide print-time">
                    <?php echo filter($this->data['name']) . ' | ' . date('Y, F j  h:i a'); ?>
                </span>

                <table class="table table-bordered">
                    <tr>
                        <th style="cursor:pointer;" ng-click="sortField='sl';reverse = !reverse;">Sl</th>
                        <th>Doctor Name</th>
                        <th>Patient Name</th>
                        <th>ID</th>
                        <th>Bill</th>
                        <th>Commission</th>
                    </tr>

                    <?php
                        $counter = 0;
                        $commission = $totalCommission = $totalBill = 0; 
                        foreach ($doctorCom as $key => $row) {
                        $bill = 0;

                        $ID = explode(":", $row->ref);

                        $doctorInfo = $this->action->read("doctors", array("id" => $row->person_id));

                        $regInfo = $this->action->read("registrations", array("id" => $ID[1]));

                        $patientInfo = $this->action->read("patients", array("pid" =>  $regInfo[0]->pid));

                        $billInfo = $this->action->read("bills", array("pid" =>  $regInfo[0]->pid));

                        if ($doctorInfo != null && $billInfo != null && $patientInfo != null) {

                            foreach ($billInfo as $key => $row) {
                                $bill += $row->grand_total;
                            }

                            $commission = round(($bill * $doctorInfo[0]->commission ) / 100);
                            $totalCommission += $commission;
                            $totalBill += $bill;
                            $counter++;
                    ?>
                    <tr>
                        <td><?php echo $counter; ?></td>
                        <td><?php echo v_check(filter($doctorInfo[0]->fullName)); ?></td>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>