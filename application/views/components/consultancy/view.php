<?php   $themeSetting = $this->action->read("theme_setting");
        if(isset($themeSetting[0]->header)){$themeHeader = json_decode($themeSetting[0]->header,true);}
    	if(isset($themeSetting[0]->footer)){$themeFooter = json_decode($themeSetting[0]->footer,true);}
    	if(isset($themeSetting[0]->logo)){$logo = json_decode($themeSetting[0]->logo,true);} ?>
<style>
    .cus-table tr th, .cus-table tr td{padding-top: 3px !important; padding-bottom: 3px !important;}
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
                        <h1>consultancy Slip</h1>
                        <span>Details About The consultancy</span>
                    </div>
                    <a href="#" class="pull-right" style="font-size: 14px;" onclick="window.print()"><i class="fa fa-print"></i> Print</a>
                </div>
            </div>

            <div class="panel-body">

                <!-- Print banner Start Here -->
                <div class="col-xs-12 hide" style="border: 1px solid #ddd; !important; margin-bottom: 15px;">
                    <div class="col-xs-3" style="padding: 0;">
                        <img class="img-responsive" style="width: 100%; margin-top: 6px;" src="<?php echo site_url($logo['logo']); ?>" alt="">
                    </div>
                    <div class="col-xs-9" style="padding: 0;">
                    	<h2 style="text-align:center;"><?php echo strtoupper($themeHeader['site_name']); ?></h2>
                    	<p style="text-align:center;"><?php echo $themeHeader['place_name'];?></p>
                    	<p style="text-align:center;"><?php echo $themeFooter['addr_moblile']; ?> || <?php echo $themeFooter['addr_email']; ?></p>
                    </div>
                </div>
                <span class="hide print-time"><?php echo filter($this->data['name']) . ' | ' . date('Y, F j  h:i a'); ?></span>
                        
                <div class="row" style="margin-bottom: 10px;">
                    <div class="col-xs-4">
                        <p class="vou-print"><strong>SL No:</strong> <?php echo $info[0]->consultancy_no; ?></p>
                        <p class="vou-print"><strong>Patient Name:</strong> <?php echo $info[0]->patient_name; ?></p>
                        <p class="vou-print"><strong>Gender:</strong> <?php echo $info[0]->gender; ?></p>
                        <p class="vou-print none"><strong>Marketer:</strong> <?php echo v_check($info[0]->marketer); ?></p>
                    </div>   

                    <div class="col-xs-4">
                        <p class="vou-print"><strong>Patient ID:</strong> <?php echo $info[0]->patient_id; ?></p>
                        <p class="vou-print"><strong>Mobile Number:</strong> <?php echo $info[0]->patient_mobile; ?></p>
                        <p class="vou-print"><strong>Refd. By : Dr./Prof.</strong> <?php echo v_check($info[0]->referred_by); ?></p>
                    </div>   

                    <div class="col-xs-4">
                        <p class="vou-print"><strong>Date:</strong> <?php echo $info[0]->date; ?></p>
                        <p class="vou-print"><strong>Age:</strong> <?php echo $info[0]->age; ?></p>
                        <p class="vou-print none"><strong>PC Doctor:</strong> <?php echo v_check($info[0]->pc); ?></p>
                    </div>   
                </div>
               
               <!--div class="row">
                   <div class="col-xs-8">
                        <div class="row">
                            <label class="control-label col-xs-4">Consultancy Number</label>
                            <div class="col-xs-8">
                                <p><?php echo $info[0]->consultancy_no; ?></p>
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
                             <label class="control-label col-xs-5">Date</label>
                            <div class="col-xs-7">
                                <p><?php echo $info[0]->date; ?></p>
                            </div>
                        </div>

                        <div class="row">
                            <label class="control-label col-xs-5">Age</label>
                            <div class="col-xs-7">
                                <p><?php echo $info[0]->age; ?></p>
                            </div>
                        </div>

                        <div class="row">
                            <label class="control-label col-xs-5">Patient Mobile</label>
                            <div class="col-xs-7">
                                <p><?php echo $info[0]->patient_mobile; ?></p>
                            </div>
                       </div> 

                        <div class="row">
                            <label class="control-label col-xs-5">Gender</label>
                            <div class="col-xs-7">
                                <p><?php echo $info[0]->gender; ?></p>
                            </div>
                        </div>
                    </div>
               </div-->
                

                <table class="table cus-table table-bordered">
                    <tr>
                        <th>SL</th>
                        <th>Doctor Name</th>
                        <th>Specialised In</th>
                        <th style="text-align: center;">Room No</th>
                        <th>Fee (TK)</th>
                    </tr>

                    <?php foreach ($info as $key => $value) { ?>
                        <tr>
                            <td style="width: 45px;"><?php echo $key+1; ?></td>
                            <td><?php echo $value->doctor_name; ?></td>
                            <td><?php echo $value->specialised; ?></td>
                            <td style="width: 150px; text-align: center;"><?php echo $value->room_no; ?></td>
                            <td style="width: 150px;"><?php echo $value->fee; ?></td>
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

            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $('#inword').html(inWord(<?php echo $info[0]->grand_total; ?>));
    });
</script>