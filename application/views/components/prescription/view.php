<style>
    @media print{
        aside, nav, .none, .panel-heading, .panel-footer{display: none !important;}
        .panel{
            border: 1px solid transparent;
            left: 0px;
            position: absolute;
            top: 0px;
            width: 100%;
        }
        .hide{display: block !important;}
        .info p{color: red !important;}
    }
    .table tr td, .table tr th {border: none !important;}
    .table {width: 100%;max-width: 91% !important;margin: 0 auto !important;}
</style>

<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading panal-header">
                <div class="panal-header-title">
                    <h1 class="pull-left">View Prescription</h1>
                    <a class="btn btn-primery pull-right" style="font-size: 14px; margin-top: 0;" onclick="window.print()"><i class="fa fa-print"></i> print</a>
                </div>
            </div>
            <div class="panel-body">
                <img class="img-responsive print-banner hide" src="<?php echo site_url("private/images/_banner.jpg"); ?>" alt="photo not found..!">
                <h4 class="hide text-center" style="margin-top: 0px;">Prescription</h4>
                <?php   
                    $medicine = json_decode($result[0]->medicine,true);
                    $test     = json_decode($result[0]->test,true);
                    $where = array ("name" => $result[0]->patient_name);
                    $patientInfo= $this->action->read('patient', $where);
                ?>
                        
                <table class="table table-responsive">
                    
                    <tr>
                        <th>Prescription ID</th>
                        <td><?php echo $result[0]->prescription_id; ?></td>
                        <th>Patient Name</th>
                        <td><?php echo $patientInfo[0]->name; ?></td>
                    </tr>
                            
                    <tr>
                        <th>Date</th>
                        <td><?php echo $result[0]->date; ?></td>
                        <th>Phone</th>
                        <td><?php echo $patientInfo[0]->mobile; ?></td>
                    </tr>
                    <tr>
                        <th>Symptoms</th>
                        <td><?php echo $result[0]->symptoms; ?></td>
                        <th>Patient Age</th>
                        <td><?php echo $patientInfo[0]->age; ?></td>
                    </tr>
                    <tr>
                        <th>Diagnosis</th>
                        <td><?php echo $result[0]->diagnosis; ?></td>
                        <th>Patient Gender</th>
                        <td><?php echo $patientInfo[0]->gender; ?></td>
                    </tr>
                </table>
                
                <div class="footer">&nbsp;</div>
                
                <hr style="border-bottom: 1px solid #8cbeff; margin-top: 0;">
                <div class="row">
                    <table class="table"> 
                        <caption style="margin-left: -10px; font-weight: 700; color: #151414;"> <b>Rx,</b> </caption>
                        <?php foreach ($medicine as $key => $value) { ?>
                        <tr>
                            <td width="50%"><span style="margin-right: 100px;"> <b><?php echo $value['medicine_type']; ?></b> &nbsp; <?php echo $value['medicine'];?></td>
                            <td><span> <?php echo $value['duration'];?> </span></td>
                        </tr>
                        <tr>
                            <td><span style="margin-left: 50px;"><?php echo $value['rules'];?> </span></td>
                            <td><span> <?php echo $value['note'];?> </span></td>
                        </tr>
                        <?php } ?>
                     </table>
                     
                    <table class="table"> 
                        <caption style="margin-left: -10px; font-weight: 700; color: #151414;"> <b>Test</b> </caption>
                        <?php foreach ($test as $key => $value) { ?>
                        <tr>
                            <td width="50%"> <span style="margin-right: 100px;"> <b><?php echo $value['test']; ?></b> &nbsp; <?php echo $value['note'];?></td>
                        </tr>
                        <?php } ?>
                     </table>
                </div>
            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>