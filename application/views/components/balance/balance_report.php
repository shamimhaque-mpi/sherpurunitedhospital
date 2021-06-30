<?php $themeSetting = $this->action->read("theme_setting");
    if(isset($themeSetting[0]->header)){$themeHeader = json_decode($themeSetting[0]->header,true);}
    if(isset($themeSetting[0]->footer)){$themeFooter = json_decode($themeSetting[0]->footer,true);}
    if(isset($themeSetting[0]->logo)){$logo = json_decode($themeSetting[0]->logo,true);} 
?>
<style>
    .balance {background: rgb(245, 245, 245); padding: 0 0 20px 0;}
    .balance h4{line-height: 48px; font-weight: bold;}
    .red {color: red;}
    .green{color: green;}
</style>
<?php echo $this->session->flashdata('confirmation'); ?>
<div class="panel panel-default none">
    <div class="panel-heading">
        <div class="panal-header-title pull-left">
            <h1>Search</h1>
        </div>
    </div>
   <div class="panel-body">
        <!-- horizontal form -->
        <?php $attribute = array( 'name' => '', 'class' => 'form-horizontal', 'id' => '' );
        echo form_open('', $attribute); ?>
        <div class="form-group">
            <div class="col-md-5">
                <label class="col-md-4 control-label">Date From</label>
                <div class="input-group date col-md-8" id="datetimepickerFrom">
                    <input type="text" name="date[from]" class="form-control" value="<?php echo $from;?>" required >
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
            <div class="col-md-5">
                <label class="col-md-4 control-label">Date to</label>
                <div class="input-group date col-md-8" id="datetimepickerTo">
                    <input type="text" name="date[to]" class="form-control" value="<?php echo $to;?>" required >
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
            <div class="col-md-2">
                <div class="btn-group">
                    <input class="btn btn-primary" type="submit" name="show" value="Show">
                </div>
            </div>
        </div>
        <?php echo form_close(); ?>
    </div>
    <div class="panel-footer">&nbsp;</div>
</div>

<div class="panel panel-default">
    <div class="panel-heading ">
        <div class="panal-header-title">
            <h1 class="pull-left">Closing Balance</h1>
            <a href="#" class="pull-right " style="margin-top: 0px; font-size: 14px;" onclick="window.print()"><i class="fa fa-print"></i> Print</a>
        </div>
    </div>
    <div class="panel-body">
        <!-- Print banner Start Here -->
        <?php  $this->load->view('print'); ?>
      
        <h4 class="hide">Balance Sheet</h4>
        <div class="row">
            <div class="col-md-6">
                <?php 
                   $testIncome = $totalIncome = $totalCost = $totalSalary = $total_bill = $total_admission_amount = 0;
                   $total_pc_payment = 0;
                   $total_doctor_payment =0;
                   $total_doctor_less = 0;
                   $total_altra_doctor_payment = 0;
                   $total_collection = 0;
                   $consultancieTotal = 0;
                   $total_due_collection_ = 0;
                   
                if($allTest != NUll) { ?>
                <table class="table table-bordered">
                    <caption>
                        <h4 class="text-center">Diagonis Income</h4>
                    </caption>
                    <tr>
                        <!--<th width="50">SL</th>-->
                        <!--<th>Test Name</th>-->
                        <th>Date</th>
                        <th>Patients Name</th>
                        <th width="100">Voucher</th>
                        <th width="100">Amount</th>
                    </tr>
                    <?php
                        $testIncome = 0;
                        foreach ($allTest as $key => $value) {
                            $collected_due = get_result('due_payment', ['voucher_number'=>$value->voucher], 'SUM(paid) as due_sum', 'voucher_number');    
                            $due_with_paid = $value->paid;
                            if($collected_due){
                                $due_with_paid += $collected_due[0]->due_sum;
                            }
                            $testIncome += $due_with_paid; 
                    ?>
                    <tr>
                        <!--<td><?php echo $key+1; ?></td>-->
                        <!--<td><?php echo filter($value->name); ?></td>-->
                        <td><?php echo filter($value->date); ?></td>
                        <td><?php echo filter($value->patient_name); ?></td>
                        <td><?php echo $value->voucher; ?></td>
                        <td><?php echo $due_with_paid; ?></td>
                        <?php /*<td><?php echo $testInfo[0]->test_fee; $testIncome += $testInfo[0]->test_fee; ?></td> */?>
                    </tr>
                    <?php } ?>
                    <tr>
                        <th colspan="3" class="text-right">Total</th>
                        <th><?php echo $testIncome;?> TK</th>
                    </tr>
                </table>
                <?php } if($patient_admissions !=NULL) { ?>
                <table class="table table-bordered">
                    <caption>
                        <h4 class="text-center">Patient Admission</h4>
                    </caption>
                    <tr>
                        <th>Date</th>
                        <th>Name</th>
                        <th>Amount</th>
                    </tr>
                    <?php 
                        foreach($patient_admissions as $key=>$value){ 
                        $total_admission_amount += $value->paid;
                    ?>
                    <tr>
                        <td><?=($value->date)?></td>
                        <td><?=($value->name)?></td>
                        <td><?=($value->paid)?></td>
                    </tr>
                    <?php } ?>
                    <tr>
                        <th colspan="2" style="text-align:right">Total</th>
                        <th><?=($total_admission_amount)?></th>
                    </tr>
                </table>
                <?php } if($all_bills !=NULL) { ?>
                <table class="table table-bordered">
                    <caption>
                        <h4 class="text-center">All Bills</h4>
                    </caption>
                    <tr>
                        <th>Date</th>
                        <th>Voucher</th>
                        <th>Amount</th>
                    </tr>
                    <?php 
                        foreach($all_bills as $key=>$value){ 
                        $total_bill += $value->total_amount;
                    ?>
                    <tr>
                        <td><?=($value->date)?></td>
                        <td><?=($value->voucher)?></td>
                        <td><?=($value->total_amount)?></td>
                    </tr>
                    <?php } ?>
                    <tr>
                        <th colspan="2" style="text-align:right">Total</th>
                        <th><?=($total_bill)?></th>
                    </tr>
                </table>
                <?php } if($consultancies !=NULL) { ?>
                <table class="table table-bordered">
                    <caption>
                        <h4 class="text-center">Consultancies Income</h4>
                    </caption>
                    <tr>
                        <!--<th width="50">SL</th>-->
                        <th>Voucher</th>
                        <th>Amount</th>
                    </tr>
                    <?php
                        $consultancieTotal = 0;
                        foreach ($consultancies as $key => $value) {
                        $consultancieTotal += $value->paid; 
                    ?>
                    <tr>
                        <!--<td><?php echo $key+1; ?></td>-->
                        <td><?php echo $value->voucher; ?></td>
                        <td><?php echo $value->paid; ?></td>
                    </tr>
                    <?php } ?>
                    <tr>
                        <th colspan="1" class="text-right">Total</th>
                        <th><?php echo $consultancieTotal; ?> TK</th>
                    </tr>
                </table>
                <?php } if($otherIncome != NULL) { ?>
                <table class="table table-bordered">
                    <caption>
                        <h4 class="text-center">Other Income</h4>
                    </caption>
                    <tr>
                        <!--<th width="50">SL</th>-->
                        <th>Field</th>
                        <th width="100">Amount</th>
                    </tr>
                    <?php 
                    $totalIncome = 0.00;
                    foreach ($otherIncome as $key => $value) { ?>
                    <tr>
                        <!--<td><?php echo $key+1; ?></td>-->
                        <td><?php echo $value->income_field; ?></td>
                        <td><?php echo $value->amount;$totalIncome += $value->amount; ?></td>
                    </tr>
                    <?php } ?>
                    <tr>
                        <th colspan="1" class="text-right">Total</th>
                        <th><?php echo $totalIncome ?> TK</th>
                    </tr>
                </table>
                <?php } ?>
            </div>
            <div class="col-md-6">
                <?php if($allCost != NULL) { ?>
                <table class="table table-bordered">
                    <caption>
                        <h4 class="text-center">General Cost</h4>
                    </caption>
                    <tr>
                        <!--<th width="50">SL</th>-->
                        <th>Date</th>
                        <th>Field</th>
                        <th width="100">Amount</th>
                    </tr>
                    <?php 
                        $totalCost = 0.00;
                        foreach ($allCost as $key => $value) { 
                    ?>
                    <tr>
                        <!--<td><?php echo $key+1; ?></td>-->
                        <td><?php echo $value->date?></td>
                        <td><?php echo $value->cost_field?></td>
                        <td><?php echo $value->amount; ?></td>
                    </tr>
                    <?php $totalCost += $value->amount; } ?>
                    <tr>
                        <th colspan="2" class="text-right">Total</th>
                        <th><?php echo $totalCost; ?> TK</th>
                    </tr>
                </table>
                <?php } if(!empty($all_due)){ ?>
                <table class="table table-bordered">
                    <caption>
                        <h4 class="text-center">Due</h4>
                    </caption>
                    <tr>
                        <th>Date</th>
                        <th>Voucher</th>
                        <th width="100">Due</th>
                    </tr>
                    <?php 
                        foreach($all_due as $key=>$value){ 
                        $value = (object)$value;
                        $total_due_collection_ += $value->due;
                    ?>
                        <tr>
                            <td><?=($value->date)?></td>
                            <td><?=($value->voucher)?></td>
                            <td><?=($value->due)?></td>
                        </tr>
                    <?php } ?>
                    <tr>
                        <th colspan="2" style="text-align:right">Total</th>
                        <th><?=($total_due_collection_)?></th>
                    </tr>
                </table>
                <?php } if(!empty($altra_doctor_payment)){ ?>
                <table class="table table-bordered">
                    <caption>
                        <h4 class="text-center">Ultra Doctor Payment</h4>
                    </caption>
                    <tr>
                        <!--<th width="50">SL</th>-->
                        <th>Name</th>
                        <th>Amount</th>
                    </tr>
                    <?php 
                        $total_altra_doctor_payment = 0.00;
                        foreach ($altra_doctor_payment as $key => $value) { 
                        $total_altra_doctor_payment += $value->payment;
                    ?>
                    <tr>
                        <!--<td><?php echo $key+1; ?></td>-->
                        <td><?php echo $value->fullName; ?></td>
                        <td><?php echo $value->payment; ?></td>
                    </tr>
                    <?php } ?>
                    <tr>
                        <th class="text-right" colspan="1">Total</th>
                        <th><?php echo $total_altra_doctor_payment; ?> TK</th>
                    </tr>
                </table>
                <?php } if(!empty($rf_pc_payment)){ ?>
                <table class="table table-bordered">
                    <caption>
                        <h4 class="text-center">RF/PC Payment</h4>
                    </caption>
                    <tr>
                        <!--<th width="50">SL</th>-->
                        <th>Date</th>
                        <th>Name</th>
                        <th>Amount</th>
                    </tr>
                    <?php 
                        $total_pc_payment = 0.00;
                        foreach ($rf_pc_payment as $key => $value) { 
                        $total_pc_payment += $value->payment;
                        if($value->payment > 0){
                    ?>
                    <tr>
                        <!--<td><?php echo $key+1; ?></td>-->
                        <td><?php echo $value->date; ?></td>
                        <td><?php echo $value->name; ?></td>
                        <td><?php echo $value->payment; ?></td>
                    </tr>
                    <?php }} ?>
                    <tr>
                        <th class="text-right" colspan="2">Total</th>
                        <th><?php echo $total_pc_payment; ?> TK</th>
                    </tr>
                </table>
                <?php } if(!empty($doctor_payment)){ ?>
                <table class="table table-bordered">
                  <caption>
                     <h4 class="text-center">Doctor Payment</h4>
                  </caption>
                  <tr>
                     <!--<th width="50">SL</th>-->
                     <th>Name</th>
                     <th>Payment</th>
                     <th>Less</th>
                  </tr>
                  <?php 
                     $total_doctor_payment =0;
                     $total_doctor_less = 0;
                     foreach ($doctor_payment as $key => $value) { 
                         $total_doctor_payment += $value->payment;
                         $total_doctor_less += $value->less
                     ?>
                  <tr>
                     <!--<td><?php echo $key+1; ?></td>-->
                     <td><?php echo $value->fullName; ?></td>
                     <td><?php echo $value->payment; ?></td>
                     <td><?php echo $value->less; ?></td>
                  </tr>
                  <?php } ?>
                  <tr>
                     <th class="text-right" colspan="1">Total</th>
                     <th><?php echo $total_doctor_payment; ?> TK</th>
                     <th><?php echo $total_doctor_less; ?> TK</th>
                  </tr>
               </table>
                <?php } ?>
            </div>
         
            <?php 
                $closingBalance = 0.00;
                
                // read last closing balance
                $today = (isset($_POST['date']['to'])? $_POST['date']['to'] : date('Y-m-d'));
                $previousDay = date('Y-m-d', strtotime('-1 day', strtotime($today)));
                
                $where = array('date' => $previousDay);
                $closingInfo    = $this->action->read('opening_balance', $where);
                
               /* echo "<pre>";
                print_r($closingInfo);
                die;*/
            
                $closingBalance = ($closingInfo)? $closingInfo[0]->closing_amount : 0.00;
                
                $balance    = ($consultancieTotal + $testIncome + $totalIncome + $total_collection + $closingBalance + $total_bill + $total_admission_amount) - ($totalCost + $totalSalary+$total_doctor_payment+$total_doctor_less+$total_pc_payment+$total_due_collection_) ;
                
                $today_cash = $balance-$closingBalance;
                ?>
            <?php echo form_open('balance/balance_report/close_balance');?>
            <div class="col-sm-12 col-xs-12">
                <div class="balance text-center">
                    <h4>Opening Balance: <?php echo $closingBalance; ?> TK</h4>
                    <h4>Total Cash: <?php echo $today_cash; ?> TK</h4>
                    <h4>
                        <span class="<?php echo($balance < 0)? 'red':'green'; ?>">Closing Balance :</span>
                        <strong> <span class="<?php echo($balance < 0)? 'red':'green'; ?>"><?php echo $balance; ?></span> TK</strong>
                    </h4>
                    
                    
                    <input type="hidden" value="<?php echo $today;?>" name="date">
                    <input type="hidden" value="<?php echo $balance;?>" name="closing_balance">
                    
                    <?php if($_POST && $_POST['date']['from'] == $_POST['date']['to']){ ?>
                    <input type="submit" class="btn btn-primary" name="close" value="close">
                    <?php }else if(!$_POST){ ?>
                    <input type="submit" class="btn btn-primary" name="close" value="close">
                    <?php } ?>
                </div>
            </div>
            <?php echo form_close();?>
        </div>
    </div>
    <div class="panel-footer">&nbsp;</div>
</div>
<script>
    $('#datetimepickerFrom').datetimepicker({
        format: 'YYYY-MM-DD',
        useCurrent: false
    });
    $('#datetimepickerTo').datetimepicker({
        format: 'YYYY-MM-DD',
        useCurrent: false
    });
</script>