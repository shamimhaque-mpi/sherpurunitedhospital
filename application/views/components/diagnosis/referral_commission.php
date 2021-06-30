<style>
    .custome-table th{width: 50% !important;}
</style>

<div class="container-fluid">
    <div class="row">
    <?php echo $this->session->flashdata('confirmation'); ?>
        <div class="panel panel-default none">
            <div class="panel-heading">
                <div class="panal-header-title">
                    <h1>RF/PC</h1>
                </div>
            </div>

            <div class="panel-body">
                <?php $attr = array ('class' => 'form-horizontal'); echo form_open('', $attr); ?>

                    <div class="form-group">
                        <label for="" class="col-md-2 control-label">RF/PC</label>
                        <div class="col-md-5">
                            <select 
                                name="reference_name" class="selectpicker form-control" data-show-subtext="true" data-live-search="true" tabindex="6">
                                <option value="" selected disabled> -- Select -- </option>
                                <?php foreach($reference as $key =>$row){ ?>
                                <option value="<?= $row->id; ?>"><?= filter($row->name); ?></option>
                                <?php } ?>
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
        
       
        <div class="panel panel-default">
            <div class="panel-heading panal-header-title none">
                <h1 class="pull-left">Show Results</h1>
                <a href="#" class="pull-right none" style="margin-top: 0px; font-size: 14px;" onclick="window.print()"><i class="fa fa-print"></i> Print</a>
            </div>

            <div class="panel-body">
                <!-- Print banner Start Here -->
                <?php  $this->load->view('print'); ?>
                
                <h4 class="hide">RF/PC Report</h4>
                <table class="table table-bordered"s>
                    <tr>
                        <th class="text-center">Sl</th>
                        <th>Date</th>
                        <th>Patient ID</th>
                        <th>Patient Name</th> 
                        <th>RF/PC</th>
                        <th>Total</th>
                        <th>Comm</th>
                    </tr>

                    <?php 
                        $total_g = 0.00;
                        $total_c = 0.00;
                    ?>
                    <?php foreach($result as $key=>$row){ ?>   
                    <tr>
                        <td style="width: 40px;"><?=$key+1?></td>
                        <td><?=$row->date?></td>
                        <td><?=$row->pid?></td> 
                        <td><?=$row->patient_name?></td>       
                        <td>
                            <?php 
                                $get_result = get_result('marketer', ['id'=>$row->reference_name]);
                                if($get_result){
                                    echo $get_result[0]->name;
                                }
                            ?>
                        </td>
                        <td>
                            <?php
                                echo $g_total = round($row->grand_total);
                                $comm = (($g_total * $row->commission) / 100);
                                $total_c += round($comm);
                                $total_g += round($g_total);
                            ?>
                        </td> 
                        <td><?=round($comm)?></td>
                    </tr>
                   <?php } ?>
                   <tr>
                        <th colspan="5" class="text-right"> Grand Total </th>
                        <th><?=round($total_g)?>&nbsp;TK</th>
                        <th><?=round($total_c)?>&nbsp;TK</th>
                       
                    </tr>
                    <?php 
                        if($_POST){ 
                    ?>
                    <tr>
                        <th colspan="5" class="text-right">Payment</th>
                        <th colspan="2" style="text-align: left!important"><?php echo (isset($sum) ? $sum : 0)?> TK</th>
                    </tr>
                    <?php } ?>
                </table>
            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>
        

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


