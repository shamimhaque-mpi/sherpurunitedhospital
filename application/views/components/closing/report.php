<style>
    @media print{
        aside, nav, .panel-heading, .none, .panel-footer{
            display: none !important;
        }
        .panel{
            border: 1px solid transparent;
            left: 0px;
            position: absolute;
            top: 0px;
            width: 100%;
        }
        .panel .box-width{
            width: 100%;
            float: left;
        }
        .hide{
            display: block !important;
        }
    }
</style>

<div class="container-fluid">
    <div class="row">

        <div class="panel panel-default">

            <div class="panel-heading">
                <div class="panal-header-title pull-left">
                    <h1>Report</h1>
                </div>
            </div>

            <div class="panel-body none">
                <div class="row">
                    <?php 
                    $attr = array ('class' => 'form-horizontal');
                    echo form_open('', $attr); 
                    ?>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Date</label>
                        <div class="input-group date col-md-5" id="datetimepickerFrom">
                            <input type="text" name="date" value="<?php echo date("Y-m-d"); ?>" class="form-control" placeholder="YYYY-MM-DD">

                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>

                    <div class="col-xs-7">
                        <div class="btn-group pull-right">
                            <input type="submit" value="Show" name="search" class="btn btn-primary">
                        </div>
                    </div>

                    <?php echo form_close(); ?>
                </div>
            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>
        



            <?php if($resultset != null){ ?>
            <div class="panel panel-default">
                
                <div class="panel-heading">
                    <div class="panal-header-title">
                        <h1 class=" pull-left">Result</h1>
                        <a class="btn btn-primery pull-right" style="font-size: 14px; margin-top: 0;" onclick="window.print()"><i class="fa fa-print"></i>Print </a>
                    </div>
                </div>

                <div class="panel-body">
                    <!-- Print Banner -->
                    <img class="img-responsive hide print-banner" src="<?php echo site_url('private/images/banner.jpg'); ?>">
                    
                    <h4 class="hide text-center" style="margin-top: -10px;">Report</h4>
                   
                    <div class="row">
                        <div class="col-md-12 box-width">
                            <!-- pre><?php print_r($resultset); ?></pre -->                       

                            <table class="table table-bordered ">
                                <tr>
                                    <td width="50%">Opening Balance</td>
                                    <td><?php echo $resultset['opening']; ?></td>
                                </tr>

                                <tr>
                                    <td>Income</td>
                                    <td><?php echo $resultset['income']; ?></td>
                                </tr>

                                <tr>
                                    <td>Cost</td>
                                    <td><?php echo $resultset['cost']; ?></td>
                                 </tr> 

                                 <tr>
                                    <td>Salary Cost</td>
                                    <td><?php echo $resultset['salary']; ?></td>
                                 </tr> 

                                 <tr>  
                                    <td>Bank Credit </td>
                                    <td><?php echo $resultset['bank']; ?></td>
                                </tr>

                                <tr>
                                    <td>Cash on hand</th>
                                    <td><?php echo $resultset['cash']; ?></td>
                                </tr>                        
                            </table>
                       </div>                  
                    </div>
                </div>

                <div class="panel-footer">&nbsp;</div>
            </div>
            <?php } ?>
 
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


