<style>
    .custome-table th{
        width: 50% !important;
    }
</style>

<div class="container-fluid">
    <div class="row">
    <?php echo $this->session->flashdata('confirmation'); ?>
        <div class="panel panel-default none">
            <div class="panel-heading">
                <div class="panal-header-title">
                    <h1>Consultancy Report</h1>
                </div>
            </div>

            <div class="panel-body">
                <?php $attr = array ('class' => 'form-horizontal'); echo form_open('', $attr); ?>

                <div class="form-group">
                    <label for="" class="col-md-2 control-label">Doctor</label>
                    <div class="col-md-5">
                         <select name="doctor" class="form-control selectpicker" 
                            data-show-subtext="true" data-live-search="true">
                            <option value="" selected disabled> -- Select Doctor -- </option>
                            <?php foreach($doctors as $key =>$row){ ?>
                            <option value="<?= $row->id; ?>"><?= filter($row->fullName); ?></option>
                            <?php }?>
                        </select>
                    </div>
                </div>

                
                <div class="form-group">
                    <label for="" class="col-md-2 control-label">Date From</label>
                    <div class="col-md-5">
                        <div class="input-group date" id="datetimepickerSMSFrom">
                            <input type="text" name="search[from]" class="form-control" placeholder="YYYY-MM-DD">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="" class="col-md-2 control-label">To</label>
                    <div class="col-md-5">
                        <div class="input-group date" id="datetimepickerSMSTo">
                            <input type="text" name="search[to]" class="form-control" placeholder="YYYY-MM-DD">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-7">
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
        
        <?php if ($report != NULL) {?>
        <div class="panel panel-default">
            <div class="panel-heading panal-header-title none">
                <h1 class="pull-left">Show Results</h1>
                <a href="#" class="pull-right none" style="margin-top: 0px; font-size: 14px;" onclick="window.print()"><i class="fa fa-print"></i> Print</a>
            </div>

            <div class="panel-body">
                <?php  $this->load->view('print'); ?>
                
                <h4 class="hide">Consultancy Report</h4>
                <table class="table table-bordered"s>
                    <tr>
                        <th class="text-center">Sl</th>
                        <th>Date</th>
                        <th>Patient ID</th>
                        <th>Patient</th> 
                        <th>Total</th>
                        <th>Doctor</th>
                        <th>RF/PC</th>
                        <!-- <th>Referred Com</th> -->
                        <!-- <th>PC Name</th>
                        <th>PC Com</th>
                        <th>Marketer Name</th>
                        <th>Marketer Com</th> -->
                    </tr>

                   <?php 
                    $billInfo = $patInfo = null;
                    $grandTotal = $totalAmount =  $totalReferred = $totalPC = $totalMarketer = 0;
                    $referred = $referred_com = $pc = $pc_com = $marketer = $marketer_com = null;
                    foreach ($report as $key => $row) {
                        $get_docotro_name = get_name('doctors', 'fullName', ['id'=>$row->doctor]);
                        if ($row->pid != null) {
                            
                        $get_reference_name = get_row('marketer', ['id'=>$row->reference_name]);
                        
                        $where = array("pid" => $row->pid);
                        $wheres = array("pid" => $row->pid,"type"=>"consultancy");

                        $patInfo = $this->action->read("patients", $where);  
                        $billInfo = $this->action->read("bills",array("id"=>$row->bill)); 
                        
                        if($billInfo != NULL){
                            $totalAmount +=  $billInfo[0]->grand_total; 
                            $grandTotal = $billInfo[0]->grand_total;
                            $referred_com = ($grandTotal * (!empty($get_reference_name->commission) ? $get_reference_name->commission : 0)/100);
                            $totalReferred +=$referred_com;
                         }
                        
                        $registrations = $this->action->read('registrations',$wheres); 
                        if ($registrations != null) {
                            $comission = $this->action->read('commissions',array('ref'=>'registration:'.$registrations[0]->id));
                        }else{
                            $comission = null;
                        }
                        if($comission != NULL){
                         foreach ($comission  as $value){
                            if($value->type == "referred"){
                                $referred = $value->person;
                                
                            }elseif ($value->type == "pc"){
                                $pc = $value->person;
                                $pc_com = round(($grandTotal * $value->amount/100),2);
                                $totalPC +=$pc_com;
                            } elseif ($value->type == "marketer"){
                                $marketer = $value->person;
                                $marketer_com = round(($grandTotal * $value->amount/100),2);
                                $totalMarketer +=$marketer_com;
                            }else{
                            }
                          } 
                        }
                    ?> 

                    <tr>
                        <td style="width: 40px;"><?php echo $key + 1; ?></td>
                        <td><?php echo $row->date; ?></td>
                        <td><?php echo $row->pid; ?></td>       
                        <td>
                            <?php 
                                $name = $this->action->read('patients',array("pid" => $row->pid)); 
                                if($name!=null){echo $name[0]->name;}
                            ?>
                        </td> 
                        <td><?php echo $grandTotal; ?></td> 
                        <td><?php echo (!empty($get_docotro_name) ? $get_docotro_name : '');?></td>
                        <td><?php echo (!empty($get_reference_name->name) ? $get_reference_name->name : '');?></td>
                        <!-- <td><?php //echo $referred_com;?></td> -->
                        <?php /* ?>
                        <td><?php echo $pc;?></td>
                        <td><?php echo $pc_com;?></td>
                        <td><?php echo $marketer;?></td>
                        <td><?php echo $marketer_com;?></td>   
                        <?php */?>
                    </tr>
                    <?php } }?>
                   <tr>
                        <th colspan="4" class="text-right"> Grand Total </th>
                        <th><?php echo $totalAmount; ?></th>
                        <th></th> 
                        <th></th>
                       <!--  <th class="text-right"> Total Referred Com </th> -->
                        <!-- <th><?php // echo $totalReferred; ?></th> -->
                        <?php /* ?>
                        <th class="text-right"> Total PC Com </th>
                        <th><?php echo $totalPC; ?></th>
                        <th class="text-right"> Total Marketer Com</th>
                        <th><?php echo $totalMarketer; ?></th>
                        <?php */ ?>
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


