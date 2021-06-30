<style>
    .cus-table tr th, .cus-table tr td{padding-top: 3px !important; padding-bottom: 3px !important;}
    #Pathology,#Patient{display: none;}
    .vou-print{padding: 0;margin: 0;line-height: 21px;font-weight: 100;}
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
                <!-- Print banner Start Here -->
                <?php  $this->load->view('print'); ?>
                <!--<span class="hide print-time"><?php //echo filter($this->data['name']) . ' | ' . date('Y, F j  h:i a'); ?></span>-->
               
                <div class="row" style="margin-bottom: 10px;">
                    <div class="col-xs-4">
                        <p class="vou-print"><strong>Voucher Number:</strong> <?php echo $info[0]->voucher; ?></p>
                        <!--p class="vou-print"><strong>Patient Name:</strong> <?php echo $info[0]->patient_name; ?></p>
                        <p class="vou-print"><strong>Gender:</strong> <?php echo $info[0]->gender; ?></p>
                        <p class="vou-print none"><strong>PC Doctor:</strong> <?php echo v_check($info[0]->pc); ?></p-->
                    </div>   

                    <div class="col-xs-4">
                        <p class="vou-print"><strong>Patient ID:</strong> <?php echo $info[0]->pid; ?></p>
                        <!--p class="vou-print"><strong>Mobile Number:</strong> <?php echo $info[0]->patient_mobile; ?></p>
                        <p class="vou-print"><strong>Refd. By : Dr./Prof.</strong> <?php echo v_check($info[0]->referred_by); ?></p>
                        <p class="vou-print none"><strong>Marketer:</strong> <?php echo v_check($info[0]->marketer); ?></p-->
                    </div>   

                    <div class="col-xs-4">
                        <!--p class="vou-print"><strong>Date:</strong> <?php echo $info[0]->date; ?></p>
                        <p class="vou-print"><strong>Age:</strong> <?php echo $info[0]->age; ?></p>
                        <p class="vou-print"><strong>Delivery Date:</strong> <?php echo v_check($info[0]->delivery_date); ?></p-->
                    </div>   
                </div>              
                

                <table class="table cus-table table-bordered">
                    <tr>
                        <th>SL</th>
                        <th>Test Group</th>
                        <th>Test Name</th>
                        <th>Room No</th>
                        <th>Amount (TK)</th>                        
                    </tr>

                    <?php                                         
                         $where = array("bill"=> $info[0]->id);
                         $diagnosis = $this->retrieve->read("diagnosis",$where);
                         foreach ($diagnosis as $key => $value) {
                    ?>
                        <tr>
                            <td style="width: 45px;"><?php echo $key+1; ?></td>
                            <td><?php echo filter(str_replace("_"," ",$value->group)); ?></td>
                            <td><?php echo filter($value->name); ?></td>
                            <td><?php echo $value->room; ?></td>
                            <td style="width: 150px;"><?php echo $value->amount; ?></td>                            
                        </tr>
                    <?php } ?>
                    
                    <tr>
                        <th rowspan="8" colspan="3">In Word:&nbsp;<i id="inword"></i> TK only</th>
                        
                    </tr>
                    <tr>
                        <th class="text-right">Vat</th>
                        <th><?php echo $info[0]->vat; ?> %</th>
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

