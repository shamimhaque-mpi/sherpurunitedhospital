<?php  $themeSetting = $this->action->read("theme_setting");
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
         <h1>Search Balance</h1>
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
                   <input type="text" name="date[from]" class="form-control" value="<?=($from)?>" required >
                   <span class="input-group-addon">
                   <span class="glyphicon glyphicon-calendar"></span>
                   </span>
                </div>
            </div>
             <div class="col-md-5">
                <label class="col-md-4 control-label">Date to</label>
                <div class="input-group date col-md-8" id="datetimepickerTo">
                   <input type="text" name="date[to]" class="form-control" value="<?=($to)?>" required >
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
         <h1 class="pull-left">Profit Report</h1>
         <a href="#" class="pull-right " style="margin-top: 0px; font-size: 14px;" onclick="window.print()"><i class="fa fa-print"></i> Print</a>
      </div>
   </div>
   <div class="panel-body">
      <!-- Print banner Start Here -->
      <?php  $this->load->view('print'); ?>
      <h4 class="hide">Profit Report</h4>
    <div class="row">
        <?php
            $total_income = $total_cost = 0;
        ?>
        <div class="col-md-6"> 
            <?php if($allTest) { ?>
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
                    foreach($allTest as $key => $value)
                    {
                        $collected_due = get_result('due_payment', ['voucher_number'=>$value->voucher], 'SUM(paid) as due_sum', 'voucher_number');    
                        $due_with_paid = $value->paid;
                        if($collected_due){
                            $due_with_paid += $collected_due[0]->due_sum;
                        }
                        $testIncome += $due_with_paid; 
                        $total_income += $due_with_paid; 
                    ?>
               <tr>
                  <!--<td><?php echo $key+1; ?></td>-->
                  <!--<td><?php echo filter($value->name); ?></td>-->
                  <td><?php echo filter($value->date); ?></td>
                  <td><?php echo filter($value->patient_name); ?></td>
                  <td><?php echo $value->voucher; ?></td>
                  <td><?php echo $value->paid; ?></td>
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
                        $total_admission_amount = 0;
                        foreach($patient_admissions as $key=>$value){ 
                        $total_admission_amount += $value->paid;
                        $total_income           += $value->paid;
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
            <?php } if($all_bills) {  ?>
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
                        $total_bill = 0;
                        foreach($all_bills as $key=>$value){ 
                        $total_bill   += $value->total_amount;
                        $total_income += $value->total_amount;
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
            <?php } ?>
        </div>
        
        <div class="col-md-6">
            <div class="row">
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
                        $totalCost += $value->amount;    
                        $total_cost += $value->amount;    
                    ?>
                    <tr>
                        <!--<td><?php echo $key+1; ?></td>-->
                        <td><?php echo $value->date?></td>
                        <td><?php echo $value->cost_field?></td>
                        <td><?php echo $value->amount; ?></td>
                    </tr>
                    <?php } ?>
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
                        $total_due_collection_ = 0;
                        foreach($all_due as $key=>$value){ 
                        $value = (object)$value;
                        $total_due_collection_ += $value->due;
                        $total_cost += $value->due;
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
                         $total_cost += $value->payment;
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
                         $total_cost += $value->payment;
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
                         $total_doctor_payment  += $value->payment;
                         $total_doctor_less     += $value->less;
                         $total_cost            += $value->payment;
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
        </div>
        
        <div class="col-md-12">
            <div class="col-md-6" style="padding-left:0">
                <table class="table table-bordered">
                    <tr>
                        <th>Total Income</th>
                        <th><?php echo $total_income;?></th>
                    </tr>
                    <tr>
                        <th>Total Cost</th>
                        <th><?php echo $total_cost;?></th>
                    </tr>
                    <tr>
                        <th>Profit</th>
                        <th><?php echo ($total_income - $total_cost);?></th>
                    </tr>
                </table>
            </div>
        </div>
        
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