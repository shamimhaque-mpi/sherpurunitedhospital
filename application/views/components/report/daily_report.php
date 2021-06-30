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
        .block-hide{
            display: none;
        }
    }
</style>

<div class="container-fluid block-hide">
    <div class="row">
    <?php echo $this->session->flashdata('confirmation'); ?>

    <!-- horizontal form -->
    <?php
    $attribute = array(
        'name' => '',
        'class' => 'form-horizontal',
        'id' => ''
    );
    echo form_open_multipart('', $attribute);
    ?>

        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panal-header-title pull-left">
                    <h1>Daily Report</h1>
                </div>
            </div>

            <div class="panel-body no-padding">
                <div class="no-title">&nbsp;</div>

                <!-- left side -->
                <div class="col-md-9">
                    <div class="form-group">
                        <label for="" class="col-md-3 control-label">Date</label>
                        <div class="input-group date col-md-7" id="datetimepicker2">
                            <input type="text" name="date" value="<?php echo date("Y:m:d"); ?>" class="form-control" >
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-7">
                            <div class="btn-group pull-right">
                                <input class="btn btn-primary" type="submit" name="show" value="Show">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>

        <?php echo form_close(); ?>
    </div>
</div>


<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading none">
                <div class="panal-header-title pull-left">
                    <h1>Daily Report</h1>
                </div>

                <a href="#" class="pull-right none" style="margin-top: 0px; font-size: 14px;" onclick="window.print()"><i class="fa fa-print"></i> Print</a>
            </div>

            <div class="panel-body">
                <!-- Print banner -->
                <img class="img-responsive print-banner hide" src="<?php echo site_url('private/images/banner.jpg'); ?>"> 

                <h3 class="hide text-center">Daily Expenditure <?php echo date('Y'); ?></h3>

                <span class="hide print-time text-center" style="margin-bottom: 5px;"><?php echo filter($this->data['name']) . ' | ' . date('Y, F j  h:i a'); ?></span>
                <div class="col-sm-6">


                <?php 
                        $consultancy = $diagnosis = $admission = 0;

                    if ($records != null){ 
                        foreach ($records as $key => $value) {
                            if ($value->title == 'consultancy') {
                                $consultancy += $value->grand_total;
                            }

                            if ($value->title == 'diagnosis') {
                                $diagnosis += $value->grand_total;
                            }

                            if ($value->title == 'admission') {
                                $admission += $value->grand_total;
                            }
                        }
                    }

                   $totalIncome =  ($consultancy + $diagnosis + $admission);
                    
                ?>


                    <table class="table table-bordered">
                        <tr>
                            <th colspan="3" style="text-align: center;">Income</th>
                        </tr>
                        <tr>   
                            <th width="50">SL</th>
                            <th>Type</th>
                            <th>Amount</th>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Consultancy</td>
                            <td><?php echo $consultancy; ?></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Diagnosis</td>
                            <td><?php echo $diagnosis; ?></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Admission</td>
                            <td><?php echo $admission; ?></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="text-right">Total </td>
                            <td ><?php echo $totalIncome;?> </td>
                        </tr>
                    </table>

                </div>    


                
                <!-- total cost  -->

                <div class="col-sm-6">
                    <?php 
                        $doctor = $staff = $genarel = 0;

                        if($doctor_records[0]->balance != null){
                             $doctor = $doctor_records[0]->balance;
                         }

                        if($staff_records[0]->amounts != null){
                             $staff = $staff_records[0]->amounts;
                         }

                        if($cost_records[0]->amount != null){
                             $genarel = $cost_records[0]->amount;
                         }

                        $totalCost = ($doctor + $staff + $genarel) ;
                        $cash = ($totalIncome - $totalCost);
                     ?>


                    <table class="table table-bordered">
                        <tr>
                            <th colspan="3" style="text-align: center;">Cost</th>
                        </tr>
                        <tr>   
                            <th width="50">SL</th>
                            <th>Type</th>
                            <th>Amount</th>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Doctor Payment</td>
                            <td><?php echo $doctor; ?></td>
                            
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>General Cost</td>
                            <td><?php echo $genarel;?></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Staff Payment</td>
                            <td><?php echo $staff;?></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="text-right">Total </td>
                            <td ><?php echo $totalCost;?></td>
                        </tr>
                    </table>
                </div>
                <div class="col-sm-12 ">
                    <div class="panel panel-info" style="display: block !important;">
                        <div class="panel-heading" style="text-align: center;display: block !important;">
                            Profit : <?php  if($cash > 0 ){ echo $cash;}else{echo 0;} ?> Tk || Loss: <?php  if($cash < 0 ){ echo str_replace("-"," ",$cash);}else{echo 0;} ?>
                           Tk 
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>

