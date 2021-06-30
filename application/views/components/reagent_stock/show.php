<?php   $themeSetting = $this->action->read("theme_setting");
        if(isset($themeSetting[0]->header)){$themeHeader = json_decode($themeSetting[0]->header,true);}
    	if(isset($themeSetting[0]->footer)){$themeFooter = json_decode($themeSetting[0]->footer,true);}
    	if(isset($themeSetting[0]->logo)){$logo = json_decode($themeSetting[0]->logo,true);} ?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css" />
<style>
    @media print{
        aside, nav, .none, .panel-heading, .panel-footer{
            display: none !important;
        }
        .panel{
            border: 1px solid transparent;
            left: 0px;
            position: absolute;
            top: 0px;
            width: 100%;
        }
        .hide{
            display: block !important;
        }
    }
</style>

<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default none">

            <div class="panel-heading">
                <div class="panal-header-title pull-left">
                    <h1>All  Stock</h1>
                </div>
            </div>

            <div class="panel-body">

                <?php
                echo $this->session->flashdata('confirmation');

                $attr = array("class" => "form-horizontal");
                echo form_open("", $attr);
                ?>
                

                <div class="form-group">
                    <label class="col-md-2 control-label">Voucher no </label>
                    <div class="col-md-3">
                        <input type="text" name="search[voucher_no]" class="form-control">
                    </div>
                
                    <label class="col-md-2 control-label">Reagent </label>
                    <div class="col-md-3">
                        <select name="search[reagent]" class="selectpicker form-control" data-show-subtext="true" data-live-search="true" >
                            <option value="" selected disabled> select Name</option>
                            <?php foreach ($allReagent as $key => $value) { ?>
                            <option value="<?php echo $value->reagent;?>" ><?php echo $value->reagent ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label">From </label>
                    <div class="col-md-3">
                        <div class="input-group date" id="datetimepickerFrom">
                            <input type="text" name="date[from]" class="form-control" placeholder="YYYY-MM-DD">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                
                    <label class="col-md-2 control-label">To </label>
                    <div class="col-md-3">
                        <div class="input-group date" id="datetimepickerTo">
                            <input type="text" name="date[to]" class="form-control" placeholder="YYYY-MM-DD">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                </div>
                   
                <div class="col-md-10">
                    <div class="btn-group pull-right">
                        <input type="submit" name="show" value="Show" class="btn btn-primary">
                    </div>
                </div>
                    
                <?php echo form_close(); ?>
            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panal-header-title ">
                    <h1 class="pull-left">Result</h1>
                    <a class="btn btn-primery pull-right" style="font-size: 14px; margin-top: 0;" onclick="window.print()"><i class="fa fa-print"></i> Print</a>
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
                
                <h4 class="text-center hide" style="margin-top: -10px;">All Reagent Stock</h4>
                
                <table class="table table-bordered table2">
                    <tr>
                        <th>SL</th>
                        <th>Voucher no</th>
                        <th>Reagent</th>
                        <th>Quantity</th>
                        <th width="120">Expire Date</th>
                        <!-- <th class="none text-center" width="216">Action</th> -->
                    </tr>
                    
                    <?php 
                        $total = 0;
                        $quantity = [];
                        foreach($result as $key => $val){ 
                    ?>
                    <tr>
                        <td style="width: 50px;"><?php echo ($key + 1); ?></td>
                        <td><?php echo $val->voucher_no; ?></td>
                        <td><?php echo $val->reagent; ?></td>
                        <td><?php echo $quantity[] = $val->quantity; ?></td>
                        <td><?php echo $val->expire_date; ?></td>

                       <!--  <td class="none" style="width: 70px;">
                           <a href="<?php // echo site_url('reagent_stock/reagent/view?vno=' . $val->voucher_no); ?>" class="btn btn-info">View </a>
                           <a href="<?php // echo site_url('reagent_stock/edit?vno=' . $val->voucher_no); ?>" class="btn btn-warning"> Edit</a>
                           <a onclick="return confirm('Are you sure to delete this data?');" href="<?php // echo site_url('reagent_stock/reagent/delete?id=' . $val->id); ?>" class="btn btn-danger">Delete </a>
                       </td> -->
                    </tr>

                    <?php } ?>
                    <!-- <tr>
                        <th colspan="4" class="text-right">Total</th>
                        <td> <?php // echo array_sum($quantity); ?> </td>
                        <td class="none"></td>
                    </tr>  -->
                    
                </table>
            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>

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
    $("#datetimepickerSMSFrom").on("dp.change", function (e) {
        $('#datetimepickerSMSTo').data("DateTimePicker").minDate(e.date);
    });
    $("#datetimepickerSMSTo").on("dp.change", function (e) {
        $('#datetimepickerSMSFrom').data("DateTimePicker").maxDate(e.date);
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>