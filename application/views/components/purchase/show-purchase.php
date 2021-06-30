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
                    <h1>All Purchase</h1>
                </div>
            </div>

            <div class="panel-body">

                <?php
                echo $this->session->flashdata('confirmation');

                $attr = array("class" => "form-horizontal");
                echo form_open("", $attr);
                ?>

                <!-- <div class="form-group">
                    <label class="col-md-2 control-label">Voucher no </label>
                    <div class="col-md-4">
                        <input type="text" name="search[voucher_no]" class="form-control">
                    </div>
                </div> -->

                <div class="form-group">
                    <label class="col-md-2 control-label">Voucher no </label>
                    <div class="input-group col-md-4">
                        <input type="text" name="search[voucher_no]" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                   <label class="col-md-2 control-label">Company</label>
                   <div class="col-md-4">
                        <select name="search[brand]" class="selectpicker form-control" data-show-subtext="true" data-live-search="true">
                           <option value="" selected disabled>Company</option>
                           <?php if($allBrands != NULL){ foreach ($allBrands as $key => $value) { ?>
                               <option value="<?php echo $value->name;?>"><?php echo $value->name; ?></option>
                           <?php } } ?>
                        </select>
                   </div>
               </div>

                <div class="form-group">
                    <label class="col-md-2 control-label">From </label>
                    <div class="input-group date col-md-4" id="datetimepickerFrom">
                        <input type="text" name="date[from]" class="form-control" placeholder="YYYY-MM-DD">
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label">To </label>
                    <div class="input-group date col-md-4" id="datetimepickerTo">
                        <input type="text" name="date[to]" class="form-control" placeholder="YYYY-MM-DD">
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>
                   
                <div class="col-md-6">
                    <div class="btn-group pull-right">
                        <input type="submit" name="show" value="Show" class="btn btn-primary">
                    </div>
                </div>
                    
                <?php echo form_close(); ?>
            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>

        <?php if($result != null){ ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panal-header-title ">
                    <h1 class="pull-left">Result</h1>
                    <a class="btn btn-primery pull-right" style="font-size: 14px; margin-top: 0;" onclick="window.print()"><i class="fa fa-print"></i> Print</a>
                </div>
            </div>

            <div class="panel-body">
                <!-- Print Banner -->
                <img class="img-responsive hide print-banner" src="<?php echo site_url('private/images/banner.jpg'); ?>">
                
                <h4 class="text-center hide" style="margin-top: -10px;">All Purchase</h4>
                
                <table class="table table-bordered table2">
                    <tr>
                        <th>SL</th>
                        <th width="120">Date</th>
                        <th>Voucher no</th>
                        <th>Company</th>
                        <th>Amount</th>
                        <th class="none text-center" width="216">Action</th>
                    </tr>
                    
                    <?php 
                        $total = 0;
                        foreach($result as $key => $val){ 
                    ?>
                    <tr>
                        <td style="width: 50px;"><?php echo ($key + 1); ?></td>
                        <td><?php echo $val->date; ?></td>
                        <td><?php echo $val->voucher_no; ?></td>
                        <td><?php echo $val->brand; ?></td>
                        <td><?php echo $val->grand_total; ?></td>

                        <td class="none" style="width: 70px;">
                            <a href="<?php echo site_url('purchase/purchase/view?vno=' . $val->voucher_no); ?>" class="btn btn-info">View </a>
                            <a href="<?php echo site_url('purchase/editPurchase?vno=' . $val->voucher_no); ?>" class="btn btn-warning"> Edit</a>
                            <a onclick="return confirm('Are you sure to delete this data?');" href="<?php echo site_url('purchase/purchase/delete_purchase?vno=' . $val->voucher_no); ?>" class="btn btn-danger">Delete </a>
                            <?php /* ?>
                            <div class="dropdown pull-right">
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-cog"></i>
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right ulbordertop">
                                    <li></li>
                                    <li>
                                        <a href="<?php echo site_url('purchase/purchase/view?vno=' . $val->voucher_no); ?>">View </a>
                                    </li>
                                    
                                    <li>
                                        <a href="<?php echo site_url('purchase/editPurchase?vno=' . $val->voucher_no); ?>"> Edit</a>
                                    </li>
                                   
                                    <li>
                                        <a href="<?php echo site_url('purchase/return_purchase?vno=' . $val->voucher_no); ?>"> Return</a>
                                    </li>
                                  

                                    <li>
                                        <a onclick="return confirm('Are you sure to delete this data?');" href="<?php echo site_url('purchase/purchase/delete_purchase?vno=' . $val->voucher_no); ?>">Delete </a>
                                    </li>
                                </ul>
                            </div>
                            <?php */ ?>
                        </td>
                    </tr>

                    <?php 
                        $total += $val->grand_total; 
                    } ?>

                    <tr>
                        <td colspan="4" class="text-right"><strong>সর্বমোট পরিমাণ
</strong></td>
                        <td colspan="2"><strong><?php echo $total; ?> টাকা</strong></td>
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
    $("#datetimepickerSMSFrom").on("dp.change", function (e) {
        $('#datetimepickerSMSTo').data("DateTimePicker").minDate(e.date);
    });
    $("#datetimepickerSMSTo").on("dp.change", function (e) {
        $('#datetimepickerSMSFrom').data("DateTimePicker").maxDate(e.date);
    });
</script>