<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css" />
<style>
    .custome-table th{width: 50% !important;}
</style>
<div class="container-fluid">
    <div class="row">
    <?php echo $this->session->flashdata('confirmation'); ?>
        <div class="panel panel-default none">
            <div class="panel-heading">
                <div class="panal-header-title">
                    <h1>Diagnosis Report</h1>
                </div>
            </div>
            <div class="panel-body">
                <?php $attr = array ('class' => 'form-horizontal');
                echo form_open('', $attr); ?>
                <div class="form-group">
                    <label class="col-md-2 control-label">Test Name </label>
                    <div class="col-md-3">
                        <select class="selectpicker form-control" name="search[name]" data-show-subtext="true" data-live-search="true">
                            <option value="" disabled selected>--Select Test Name--</option>
                            <?php foreach ($testName as $key => $value){ ?>
                                <option value="<?php echo $value->name; ?>"><?php echo $value->name; ?></option>
                            <?php }?>
                        </select>
                    </div>
                    <label class="col-md-2 control-label">Test Group </label>
                    <div class="col-md-3">
                        <select class="selectpicker form-control" name="search[group]" data-show-subtext="true" data-live-search="true">
                            <option value="" disabled selected>--Select Group Name--</option>
                            <?php foreach ($groupName as $key => $value){ ?>
                                <option value="<?php echo $value->group; ?>"><?php echo $value->group; ?></option>
                            <?php }?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">From</label>
                    <div class="col-md-3">
                        <div class="input-group date" id="datetimepickerSMSFrom">
                            <input type="text" name="search[date_from]" class="form-control" placeholder="YYYY-MM-DD">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                    <label class="col-md-2 control-label">To</label>
                    <div class="col-md-3">
                        <div class="input-group date" id="datetimepickerSMSTo">
                            <input type="text" name="search[date_to]" class="form-control" placeholder="YYYY-MM-DD">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-md-10">
                    <div class="pull-right">
                        <div class="btn-group">
                            <input type="submit" name="show" value="Show"  class="btn btn-primary">
                        </div>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>

        <?php if ($report != NULL) { ?>
        <div class="panel panel-default">
            <div class="panel-heading panal-header-title none">
                <h1 class="pull-left">Show Results</h1>
                <a href="#" class="pull-right none" style="margin-top: 0px; font-size: 14px;" onclick="window.print()"><i class="fa fa-print"></i> Print</a>
            </div>
            <div class="panel-body">
                <!-- Print banner Start Here -->
                <?php  $this->load->view('print'); ?>
                <!--<span class="hide print-time"><?php //echo $this->data['name'] . ' | ' . date('Y, F j H:i a'); ?></span>       -->
                <h4 class="text-center hide">Diagnosis Report</h4>
                <table class="table table-bordered"s>
                    <tr>
                        <th class="text-center">Sl</th>
                        <th>Date</th>
                        <th>Patient ID</th>
                        <th>Patient Name</th> 
                        <th>Total</th>
                        <th>Referred Name</th>
                        <th>Referred Com</th>
                        <th>Reference Name</th>
                        <th>Reference Com</th>
                    </tr>

                 <?php 
                    $billInfo = $patInfo = null;
                    $grandTotal = $totalAmount =  $totalReferred = $totalPC = $totalMarketer = 0;
                    $referred = $referred_com = $pc = $pc_com = $marketer = $marketer_com = null;
                    foreach ($report as $key => $row) { 

                        $where = array("pid" => $row->pid);
                        $wheres = array("pid" => $row->pid,"type"=>"diagnosis");

                        $patInfo = $this->action->read("patients", $where);  
                        $billInfo = $this->action->read("bills",array("id"=>$row->bill)); 
                        
                        if($billInfo != NULL){
                            $totalAmount +=  $billInfo[0]->grand_total; 
                            $grandTotal = $billInfo[0]->grand_total;
                         }
                        
                        $registrations = $this->action->read('registrations',$wheres); 
                        if($registrations!=null){
                            $comissionWhere = array('ref'=>'registration:'.$registrations[0]->id);
                            $comission = $this->action->read('commissions',$comissionWhere); 
                       
                            if($comission != NULL){
                             foreach ($comission  as $value){
                                if($value->type == "referred"){
                                    $referred = $value->person;
                                    $referred_com = round(($grandTotal * $value->amount/100),2);
                                    $totalReferred +=$referred_com;
                                }elseif ($value->type == "marketer"){
                                    $marketer = $value->person;
                                    $marketer_com = round(($grandTotal * $value->amount/100),2);
                                    $totalMarketer +=$marketer_com;
                                }else{
                                }
                              } 
                            }
                        }

                    ?>               
                   
                    <tr>
                        <td style="width: 40px;"><?php echo $key + 1; ?></td>
                        <td><?php echo $row->date; ?></td>
                        <td><?php echo $row->pid; ?></td>       
                        <td>
                            <?php if($patInfo!=null){echo $patInfo[0]->name;} ?>
                        </td> 
                        <td><?php echo $grandTotal; ?></td> 
                        <td><?php echo $referred;?></td>
                        <td><?php echo $referred_com;?></td>
                        <!-- <td><?php //echo $pc;?></td>
                        <td><?php echo $pc_com;?></td> -->
                        <td><?php echo $marketer;?></td>
                        <td><?php echo $marketer_com;?></td>                      
                    </tr>
                    <?php } ?>
                    <tr>
                        <th colspan="4" class="text-right"> Grand Total </th>
                        <th><?php echo $totalAmount; ?></th>
                        <th class="text-right"> Total Referred Com </th>
                        <th><?php echo $totalReferred; ?></th>
                        <!-- <th class="text-right"> Total PC Com </th>
                        <th><?php echo $totalPC; ?></th> -->
                        <th class="text-right"> Total Marketer Com</th>
                        <th><?php echo $totalMarketer; ?></th>
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
    $('#datetimepickerSMSFrom').datetimepicker({
        format: 'YYYY-MM-DD',
        useCurrent: false
    });
    $('#datetimepickerSMSTo').datetimepicker({
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
