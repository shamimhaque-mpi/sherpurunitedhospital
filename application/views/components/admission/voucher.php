<style>
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
    .hide{
        display: none;
    }
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
    <div class="row" ng-controller="allConsultancyCtrl">
    <?php echo $this->session->flashdata('confirmation'); ?>
        <div class="panel panel-default">
            <div class="panel-heading none">
                <div class="panal-header-title pull-left">
                    <h1>Voucher</h1>
                </div>
                <a href="#" class="pull-right none" style="margin-top: 0px; font-size: 14px;" onclick="window.print()"><i class="fa fa-print"></i> Print</a>
            </div>

            <div class="panel-body">

                <!-- Print banner -->
                <img class="img-responsive hide print-banner" src="<?php echo site_url('private/images/banner.jpg'); ?>">
                <span class="hide print-time"><?php echo filter($this->data['name']) . ' | ' . date('Y, F j  h:i a'); ?></span>

                <div class="row">
                    <!-- <label class="col-xs-6">Voucher No: <?php echo $billsInfo[0]->voucher;; ?></label> -->
                    <label class="col-xs-6 ">Date: <?php echo $info[0]->date; ?></label>
                </div>

                <div class="row">
                    <label class="col-xs-6">Patient ID: <?php echo $patientInfo[0]->pid; ?></label>
                    <label class="col-xs-6 text-right">Patient Name: <?php echo filter($patientInfo[0]->name); ?></label>
                </div>

                <div class="row" style="margin-bottom: 15px;">
                    <label class="col-xs-6">Age: <?php echo $patientInfo[0]->age; ?></label>
                    <label class="col-xs-6 text-right">Contact: <?php echo $patientInfo[0]->contact; ?></label>
                </div>
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


