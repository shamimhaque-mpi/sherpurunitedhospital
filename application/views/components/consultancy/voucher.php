<style>
    .info-table{
        margin-bottom: 20px;
    }
    .info-table tr td{
        padding: 5px 0;
    }
   .info-table tr td strong{
    padding-left: 30px;
    }
</style>

<div class="container-fluid">
    <div class="row">
    <?php echo $this->session->flashdata('confirmation'); ?>
        <div class="panel panel-default">
            <div class="panel-heading none">
                <div class="panal-header-title pull-left">
                    <h1>Invoice</h1>
                </div>
                <a href="#" class="pull-right none" style="margin-top: 0px; font-size: 14px;" onclick="window.print()"><i class="fa fa-print"></i> Print</a>
            </div>

            <div class="panel-body">

                <!-- Print banner Start Here -->
                <?php  $this->load->view('print'); ?>
                
                <!--<span class="hide text-center print-time"><?php //echo filter($this->data['name']) . ' | ' . date('Y, F j  h:i a'); ?></span>-->
                
                <h4 class="text-center hide">Invoice</h4>
                <?php 
                    $patientInfo = $this->action->read('patients', array("pid" => $info[0]->pid));
                    $where = array("pid" => $info[0]->pid, "title" => "consultancy");
                    $billsInfo = $this->action->read('bills', $where);
                ?>

                <div class="row">
                    <div class="col-xs-6">
                        <div class="row">
                            <label class="col-xs-4">Invoice No </label>
                            <label class="col-xs-8">: <?php echo $billsInfo[0]->voucher; ?></label>
                            
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="row">
                            <label class="col-xs-4">Date </label>
                            <label class="col-xs-8">: <?php echo $info[0]->date; ?></label>
                            
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-6">
                        <div class="row">
                            <label class="col-xs-4">Patient ID </label>
                            <label class="col-xs-8">: <?php echo $patientInfo[0]->pid; ?></label>
                            
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="row">
                            <label class="col-xs-4">Patient Name </label>
                            <label class="col-xs-8">: <?php echo filter($patientInfo[0]->name); ?></label>
                            
                        </div>
                    </div>
                </div>

                <div class="row" style="margin-bottom: 15px;">
                    <div class="col-xs-6">
                        <div class="row">
                            <label class="col-xs-4">Age </label>
                            <label class="col-xs-8">: <?php echo $patientInfo[0]->age; ?></label>
                            
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="row">
                            <label class="col-xs-4">Contact </label>
                            <label class="col-xs-8">: <?php echo $patientInfo[0]->contact; ?></label>
                            
                        </div>
                    </div>
                </div>
                    

                <table class="table table-bordered">
                    <tr>
                        <th class="text-center">Qty</th>                     
                        <th>Doctor Name</th>
                        <th>Specialised In</th>
                        <th width="180px">Fee</th>
                    </tr>

                    <?php 
                    foreach ($info as $key => $val) {
                        $docInfo = get_result('doctors', ["id" => $val->doctor], ['fullName', 'specialised', 'fee']);
                    ?>
                    <tr>
                        <td style="width: 40px;"><?php echo $key + 1; ?></td>
                        <td><?php echo (!empty($docInfo[0]->fullName) ? $docInfo[0]->fullName : '') ?></td>
                        <td><?php echo (!empty($docInfo[0]->specialised) ? $docInfo[0]->specialised : '') ?></td>
                        <td><?php echo (!empty($docInfo[0]->fee) ? $docInfo[0]->fee : '') ?></td>
                    </tr>
                    <?php } ?>
                    <tr>
                        <td rowspan="5" colspan="2" style="vertical-align: middle !important;">
                            <p style="margin: 0; font-size: 16px;"><strong>Inword:</strong> <span id="inword"></span></p>
                        </td>
                        <th width="180px" class="text-right">Total Amount</th>
                        <th width="180px"><?php echo $billsInfo[0]->total; ?></th>
                    </tr>
                    <tr>
                        <th class="text-right">Total Less</th>
                        <th><?php echo $billsInfo[0]->discount; ?></th>
                    </tr>
                    <tr>
                        <th class="text-right">Grand Total</th>
                        <th><?php echo $billsInfo[0]->grand_total; ?></th>
                    </tr>
                    <tr>
                        <th class="text-right">Total Paid</th>
                        <th><?php echo $billsInfo[0]->paid; ?></th>
                    </tr>
                    <tr>
                        <th class="text-right" >Total Due</th>
                        <th><?php echo $billsInfo[0]->due; ?></th>
                    </tr>
                </table>
            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>

<script src="<?php echo site_url("private/js/inword.js"); ?>"></script>
<script>
    $(document).ready(function(){
        $("#inword").html(inWord(<?php echo $billsInfo[0]->grand_total; ?>) + " " + "Taka Only.");
    });
</script>


