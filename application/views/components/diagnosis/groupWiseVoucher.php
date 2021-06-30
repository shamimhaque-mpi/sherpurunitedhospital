<style>
    .info-table{margin-bottom: 20px;}
    .info-table tr td{padding: 5px 0;}
    .info-table tr td strong{padding-left: 30px;}
    hr {border-top: 1px dotted #eee;}
    .mb-2 {margin-bottom: 16px;}
</style>

<div class="container-fluid">
    <div class="row" ng-controller="allConsultancyCtrl">
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
                
                <div class="customer-copy">
                    <h4 class="text-center hide" style="margin: 0;margin-bottom: 5px;">
                        Patient Copy
                        <hr style="margin: 5px 0;"/>
                    </h4>
                    
                    <?php 
                        $ultra_doctor_where = [];
                        if(!empty($diagnosis[0]->alt_doctor_id || $diagnosis[0]->alt_doctor_id !=0)){
                            $ultra_doctor_where = ['id'=>$diagnosis[0]->alt_doctor_id]; 
                        }
                       
                        $ultra_doctor =  get_name('doctors', 'fullName', $ultra_doctor_where);
                        $market = [];
                        if(isset($diagnosis[0]->reference_name)){
                            $market = $this->action->read('marketer', ['id'=>$diagnosis[0]->reference_name]);
                        }
                    ?>

                    <div class="row">
                        <div class="col-md-4 col-xs-6">
                            <div class="row">
                                <label class="col-xs-5">Patient No. </label>
                                <label class="col-xs-7">: <?php echo $bills[0]->voucher; ?></label>
                            </div>
                        </div>
                        <div class="col-md-4 col-xs-6">
                            <div class="row">
                                <label class="col-xs-5">Patient ID </label>
                                <label class="col-xs-7">: <?php echo $patientInfo[0]->pid; ?></label>
                            </div>
                        </div>
                        <div class="col-md-4 col-xs-6">
                            <div class="row">
                                <label class="col-xs-5">Date </label>
                                <label class="col-xs-7">: <?php echo $bills[0]->date; ?></label>
                            </div>
                        </div>
                        <div class="col-md-4 col-xs-6">
                            <div class="row">
                                <label class="col-xs-5">Patient Name </label>
                                <label class="col-xs-7">: <?php echo filter($patientInfo[0]->name); ?></label>
                            </div>
                        </div>
                        <div class="col-md-4 col-xs-6">
                            <div class="row">
                                <label class="col-xs-5">Age </label>
                                <label class="col-xs-7">: <?php echo $patientInfo[0]->age; ?></label>
                            </div>
                        </div>
                        <div class="col-md-4 col-xs-6">
                            <div class="row">
                                <label class="col-xs-5">Delivery Date </label>
                                <label class="col-xs-7">: <?php echo $diagnosis[0]->delivery; ?></label>
                            </div>
                        </div>
                        <div class="col-md-4 col-xs-6">
                            <div class="row">
                                <label class="col-xs-5">Gender </label>
                                <label class="col-xs-7">: <?= $patientInfo[0]->gender; ?></label>
                            </div>
                        </div>
                        <div class="col-md-4 col-xs-6">
                            <div class="row">
                                <label class="col-xs-5">Contact </label>
                                <label class="col-xs-7">: <?php echo $patientInfo[0]->contact; ?></label>
                            </div>
                        </div>
                        <?php if($ultra_doctor){ ?>
                        <div class="col-md-4 col-xs-6">
                            <div class="row">
                                <label class="col-xs-5">Ultra Doctor </label>
                                <label class="col-xs-7">: <?= (!empty($ultra_doctor) ? $ultra_doctor : '') ?></label>
                            </div>
                        </div>
                        <?php } ?>
                        <div class="col-md-4 col-xs-6">
                            <div class="row">
                                <label class="col-xs-5">Address </label>
                                <label class="col-xs-7">: <?= $patientInfo[0]->address ?></label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-xs-6">
                            <label class="col-sm-2 col-xs-3">VN :</label>
                            <figure class="col-sm-10 col-xs-9">
                                <?php 
                                     $voucher_barcode_url ='public/uploaded_barcode/'.$bills[0]->voucher.'.png';
                                     $patient_barcode_url = 'public/uploaded_barcode/'.$patientInfo[0]->pid.'.png';
                                ?>
                                <img class="img-responsive" src="<?php echo site_url($voucher_barcode_url); ?>" alt="voucher barcode" />
                            </figure>
                        </div>
                        <div class="col-xs-6">
                            <label class="col-sm-2 col-xs-3">HN :</label>
                            <figure class="col-sm-10 col-xs-9">
                                <img class="img-responsive" src="<?php echo site_url($patient_barcode_url); ?>" alt="voucher barcode" />
                            </figure>
                        </div>
                    </div>

                    <table class="table table-bordered">
                        <tr>
                            <th width="40" class="text-center">SL</th>                     
                            <th>Test Name</th>
                            <th>Test Group</th>
                            <th colspan="2">Room No</th>
                            <!-- <th width="140">Amount (TK)</th> -->
                        </tr>

                        <?php 
                        $getRemark = $this->action->read('remark');
                        foreach ($diagnosis as $key => $val) { 
                        ?>
                        
                        <tr>
                            <td><?php echo $key+1; ?></td>
                            <td><?php echo filter($val->test_name); ?></td>
                            <td><?php echo filter(str_replace("_"," ",$val->group_name)); ?></td>
                            <td colspan="2"><?php echo $val->room; ?></td>
                            <!-- <td><?php echo $val->fee; ?></td> -->
                        </tr>
                        <?php } ?>

                        <tr class="printPaddingLess">
                            <td rowspan="7" colspan="3" style="vertical-align: middle !important; text-align: center;">
                                <p style="margin: 0; font-size: 16px;"><strong>Inword:</strong> <span id="inword"></span></p>
                                <?php if($bills[0]->due <= 0){ ?>
                                <img style="width: 60px;" src="<?php echo site_url('public/img/paid.png'); ?>" alt="">
                                <?php } ?>
                            </td>
                            <th>Sub Total</th>
                            <th><?php echo $bills[0]->subtotal; ?></th>
                        </tr>
                        <tr class="printPaddingLess">
                            <th>Vat( <?php echo $bills[0]->vat; ?> % )</th>
                            <th><?php echo $bills[0]->vat_amount; ?></th>
                        </tr>
                        <tr class="printPaddingLess">
                            <th>Total</th>
                            <th><?php echo $bills[0]->total; ?></th>
                        </tr>
                        <tr class="printPaddingLess">
                            <th>Less <small>(<?= $bills[0]->less_type; ?>)</small></th>
                            <th><?php echo $bills[0]->discount; ?></th>
                        </tr>
                        <tr class="printPaddingLess">
                            <th>Grand Total</th>
                            <th><?php echo $bills[0]->grand_total; ?></th>
                        </tr>
                        <tr class="printPaddingLess">
                            <th>Paid</th>
                            <th><?php echo $bills[0]->paid; ?></th>
                        </tr>
                        <tr class="printPaddingLess">
                            <th >Due</th>
                            <th><?php echo $bills[0]->due; ?></th>
                        </tr>
                    </table>

                    <p class="text-center">
                        <strong>
                             Note: <?php echo (isset($getRemark[0]->remark) ? $getRemark[0]->remark :''); ?>
                        </strong>
                    </p>
                </div>
            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>

<script src="<?php echo site_url("private/js/inword.js"); ?>"></script>
<script>
    $(document).ready(function(){
        $("#inword").html(inWord(<?php echo $bills[0]->grand_total; ?>) + " " + "Taka Only.");
        $("#inword2").html(inWord(<?php echo $bills[0]->grand_total; ?>) + " " + "Taka Only.");
    });
</script>


