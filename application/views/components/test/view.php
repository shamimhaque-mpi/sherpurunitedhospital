<style>
    .cus-table tr th, .cus-table tr td{padding-top: 3px !important; padding-bottom: 3px !important;}
    #Pathology,#Patient{
        display: none;
    }
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
        #Pathology,#Patient{
        display: block;
        }
        .panel-body{
            page-break-after: always;
        }
        .panel-body:last-child{
            page-break-after: avoid;
        }
        @media print and (-webkit-min-device-pixel-ratio:0){
            .panel-body{
                height: 99vh;
            }
        }
        @-moz-document url-prefix(){
            .panel-body{
                height: 99vh;
                margin-top: 0 !important;
                margin-bottom: 0 !important;
                float:left;
            }
        }
    }
    .vou-print{
        padding: 0;
        margin: 0;
        line-height: 21px;
        font-weight: 100;
    }
</style>
<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading none">
                <div class="panal-header-title">
                    <div class="pull-left">
                        <h1>Test Slip</h1>
                        <span>Details About The Test</span>
                    </div>
                    <a href="#" class="pull-right" style="font-size: 14px;" onclick="window.print()"><i class="fa fa-print"></i> Print</a>
                </div>
            </div>

            <!--Body Start Here-->
            <div id="Office" class="panel-body">

                <!-- Print banner -->
                <img class="img-responsive hide print-banner" id="banner" src="<?php echo site_url('private/images/banner-office.jpg'); ?>">
                <span class="hide print-time"><?php echo filter($this->data['name']) . ' | ' . date('Y, F j  h:i a'); ?></span>
               
                <div class="row" style="margin-bottom: 10px;">
                    <div class="col-xs-4">
                        <p class="vou-print"><strong>Voucher Number:</strong> <?php echo $info[0]->voucher_no; ?></p>
                        <p class="vou-print"><strong>Patient Name:</strong> <?php echo $info[0]->patient_name; ?></p>
                        <p class="vou-print"><strong>Gender:</strong> <?php echo $info[0]->gender; ?></p>
                        <!-- <p class="vou-print none"><strong>PC Doctor:</strong> <?php echo v_check($info[0]->pc); ?></p> -->
                    </div>   

                    <div class="col-xs-4">
                        <p class="vou-print"><strong>Patient ID:</strong> <?php echo $info[0]->patient_id; ?></p>
                        <p class="vou-print"><strong>Mobile Number:</strong> <?php echo $info[0]->patient_mobile; ?></p>
                        <p class="vou-print"><strong>Refd. By : Dr./Prof.</strong> <?php echo v_check($info[0]->referred_by); ?></p>
                        <p class="vou-print none"><strong>Reference:</strong> <?php echo v_check($info[0]->marketer); ?></p>
                    </div>   

                    <div class="col-xs-4">
                        <p class="vou-print"><strong>Date:</strong> <?php echo $info[0]->date; ?></p>
                        <p class="vou-print"><strong>Age:</strong> <?php echo $info[0]->age; ?></p>
                        <p class="vou-print"><strong>Delivery Date:</strong> <?php echo v_check($info[0]->delivery_date); ?></p>
                    </div>   
                </div>

               <!--div class="row">
                   <div class="col-xs-8">
                   <div class="row">
                            <label class="control-label col-xs-4">Voucher Number</label>
                            <div class="col-xs-8">
                                <p><?php echo $info[0]->voucher_no; ?></p>
                            </div>
                       </div>
                       <div class="row">
                            <label class="control-label col-xs-4">Patient ID</label>
                            <div class="col-xs-8">
                                <p><?php echo $info[0]->patient_id; ?></p>
                            </div>
                       </div>

                       <div class="row">
                            <label class="control-label col-xs-4">Name of Patient</label>
                            <div class="col-xs-8">
                                <p><?php echo $info[0]->patient_name; ?></p>
                            </div>
                       </div> 

                       <div class="row">
                            <label class="control-label col-xs-4">Refd. By : Dr./Prof.</label>
                            <div class="col-xs-8">
                                <p><?php echo $info[0]->referred_by; ?></p>
                            </div>
                       </div>
                    </div>

                    <div class="col-xs-4">
                        <div class="row">
                             <label class="control-label col-xs-4">Date</label>
                            <div class="col-xs-8">
                                <p><?php echo $info[0]->date; ?></p>
                            </div>
                        </div>

                        <div class="row">
                            <label class="control-label col-xs-4">Age</label>
                            <div class="col-xs-8">
                                <p><?php echo $info[0]->age; ?></p>
                            </div>
                        </div>

                        <div class="row">
                            <label class="control-label col-xs-4">Gender</label>
                            <div class="col-xs-8">
                                <p><?php echo $info[0]->gender; ?></p>
                            </div>
                        </div>

                        <div class="row">
                            <label class="control-label col-xs-4">Delivery Date</label>
                            <div class="col-xs-8">
                                <p><?php echo $info[0]->delivery_date; ?></p>
                            </div>
                        </div>
                    </div>
               </div-->
                

                <table class="table cus-table table-bordered">
                    <tr>
                        <th>SL</th>
                        <th>Test Group</th>
                        <th>Test Name</th>
                        <th style="text-align: center;">Room No</th>
                        <th>Amount (TK)</th>
                    </tr>

                    <?php foreach ($info as $key => $value) { ?>
                        <tr>
                            <td style="width: 45px;"><?php echo $key+1; ?></td>
                            <td><?php echo $value->test_group; ?></td>
                            <td><?php echo $value->test_name; ?></td>
                            <td style="width: 150px; text-align: center;"><?php echo $value->room_no; ?></td>
                            <td style="width: 150px;"><?php echo $value->amount; ?></td>
                        </tr>
                    <?php } ?>
                    
                    <tr>
                        <th rowspan="7" colspan="3">In Word:&nbsp;<i id="inword"></i>TK only</th>
                        <th class="text-right">Sub Total</th>
                        <th><?php echo $info[0]->subtotal; ?></th>
                    </tr>

                    <tr>
                        <th class="text-right">VAT</th>
                        <th><?php echo $info[0]->vat; ?></th>
                    </tr>

                    <tr>
                        <th class="text-right">Total</th>
                        <th><?php echo $info[0]->total; ?></th>
                    </tr>

                    <tr>
                        <th class="text-right">Less</th>
                        <th><?php echo $info[0]->discount; ?></th>
                    </tr>
                    <tr>
                        <th class="text-right">Grand Total</th>
                        <th><?php echo $info[0]->grand_total; ?></th>
                    </tr>

                    <tr>
                        <th class="text-right">Paid</th>
                        <th><?php echo $info[0]->paid; ?></th>
                    </tr>

                     <tr>
                        <th class="text-right">Due</th>
                        <th><?php echo $info[0]->due; ?></th>
                    </tr>
                </table>

                <div class="pull-right hide">
                    <h4 style="border-top: 2px solid #333; margin-top: 50px;">Authorized signature</h4>
                </div>
            </div>
            <!--Body End Here-->
            <div id="Pathology"></div>
            <div id="Patient"></div>

            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('#inword').html(inWord(<?php echo $info[0]->grand_total; ?>));
    });
</script>

<script type="text/javascript">
    $(document).ready(function(){

        //Office Copy Start 
        $("#Pathology").html(
            '<div class="panel-body" >'+$("#Office").html()+'</div>'
        );

        $("#Pathology #banner")
        .attr({
            src: '<?php echo site_url("private/images/banner-pathology.jpg"); ?>'
        });
        //Office Copy End 

        //Patient Copy Start 
        $("#Patient").html(
            '<div class="panel-body" >'+$("#Office").html()+'</div>'
        );

        $("#Patient #banner")
        .attr({
            src: '<?php echo site_url("private/images/banner-patient.jpg"); ?>'
        });
        //Patient Copy End 
    });
</script>

