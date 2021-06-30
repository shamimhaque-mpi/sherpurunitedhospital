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
                        <h1>Patient Slip</h1>
                        <span>Details About Patient Slip</span>
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
                        <p class="vou-print"><strong>Patient ID :</strong> <?php echo $info[0]->patient_id; ?></p>
                        <p class="vou-print"><strong>Gender :</strong> <?php echo $info[0]->gender; ?></p>
                    </div>   

                    <div class="col-xs-4">
                        <p class="vou-print"><strong>Name :</strong> <?php echo $info[0]->name; ?></p>
                        <p class="vou-print"><strong>Age :</strong> <?php echo $info[0]->age; ?></p>
                       
                    </div>   

                    <div class="col-xs-4">
                        <p class="vou-print"><strong>Date :</strong> <?php echo $info[0]->date; ?></p>
                        <p class="vou-print"><strong>Contact Number :</strong> <?php echo $info[0]->mobile; ?></p>
                    </div>   
                </div>
                <table class="table cus-table table-bordered">
                    <tr>
                        <th>Sl</th>
                        <th>Fee Name</th>
                        <th>Total</th>
                    </tr>
                    
                    <!-- <?php foreach ($info as $key => $value) { ?>
                    
                        <tr>
                            <td style="width: 45px;"><?php echo $key+1; ?></td>
                        </tr>
                        <tr>
                            <t>Admission Fee</t>
                            <td><?php echo $value->fee; ?></td>
                        </tr>
                        <tr>
                            <th>Ward/Cabin rent</th>
                            <td><?php echo $value->rent; ?></td>
                        </tr>
                    
                    <?php } ?> -->

                    <?php $total = 0.00; ?>

                    <tr>
                        <td>1</td>
                        <td>Admission Fee</td>
                        <td><?php echo $info[0]->fee; $total += $info[0]->fee; ?></td>
                    </tr>

                     <tr>
                        <td>02</td>
                        <td>Ward/Cabin rent</td>
                        <td><?php echo $info[0]->rent; $total += $info[0]->rent; ?></td>
                    </tr>
                    <tr>
                        <td colspan="2">Total</td>
                        <td><?php echo $total; ?> TK</td>
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

