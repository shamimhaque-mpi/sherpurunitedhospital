<style>
    .message{
        border: 1px solid #ddd;
        border-radius: 10px;
        display: none;
        background: #E99126;
        color: #fff;
        padding: 15px;

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
    }
</style>

<div class="container-fluid" ng-controller="singlePatientsCtrl" ng-cloak>
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading none">
                <div class="panal-header-title pull-left">
                    <h1>Patient's Profile</h1>
                    <span>Details About The Patient</span>
                </div>
                <a href="#" class="pull-right none" style="margin-top: 0px; font-size: 14px;" onclick="window.print()"><i class="fa fa-print"></i> Print</a>
            </div>
            <?php //$pId = $pid; ?>
            
            <div class="panel-body" ng-init ="pid='<?php // echo $pId; ?>' " ng-model="pid">
                <!-- Print banner -->
                <img class="img-responsive hide" style="width: 100%; margin-bottom: 8px;" src="<?php echo site_url('private/images/banner.jpg'); ?>">
                <span class="hide print-time"><?php echo filter($this->data['name']) . ' | ' . date('Y, F j  h:i a'); ?></span>
                
                <h4 class="text-center hide" style="margin-top: 0; background: #ddd; line-height: 35px;"> Patient Information </h4>
                
                <table class="table table-bordered">
                    <tr>
                        <th>Patient ID</th>
                        <td><?php echo $info[0]->pid; ?></td>
                        <th>Date</th>
                        <td><?php echo $info[0]->date; ?></td>
                    </tr>
                    
                    <tr>
                        <th>Name</th>
                        <td><?php echo $info[0]->name; ?></td>
                        <th>Guardian Name</th>
                        <td><?php  $gname = json_decode($info[0]->guardian, true); echo  v_check($gname['Father'][0]); ?> </td>
                    </tr>
                    <tr>
                        <th>Gender</th>
                        <td><?php echo v_check($info[0]->gender); ?></td>
                        <th>Age</th>
                        <td><?php echo v_check($info[0]->age); ?></td>
                    </tr>
                    <tr>
                        <th>Contact Number</th>
                        <td><?php echo v_check($info[0]->contact); ?></td>
                        <th>Address</th>
                        <td><?php echo v_check($info[0]->address); ?></td>
                    </tr>
                </table>


                <?php 
                $admitInof = $conInof = $emrInof = $diagInof = null;
                $where = array("pid" => $info[0]->pid);
                $regiInfo = $this->action->read("registrations", $where);

                if($regiInfo[0]->type == "admissions"){
                    $admitInof = $this->action->read("admissions", $where);
                }elseif ($regiInfo[0]->type == "consultancies") {
                    $conInof = $this->action->read("consultancies", $where);
                }elseif ($regiInfo[0]->type == "emergencies") {
                    $emrInof = $this->action->read("emergencies", $where);
                }elseif ($regiInfo[0]->type == "diagnosis") {
                    $diagInof = $this->action->read("diagnosis", $where);
                }
                ?>
                
                <?php if($admitInof != null || $conInof != null || $diagInof != null){ ?>
                <h4 class="text-center" style="margin-top: 0; background: #ddd; line-height: 35px;"> Service Information </h4>                
                <!-- Admission information -->
                <?php if($admitInof != null){ ?>
                <table class="table table-bordered">
                    <tr>
                        <th>Service Type</th>
                        <td><?php echo filter($regiInfo[0]->type); ?></td>
                        <th>Seat</th>
                        <td><?php echo filter($admitInof[0]->seat); ?></td>
                    </tr>
                    <tr>
                       
                        <th>Status</th>
                        <td colspan="3"><?php echo filter($admitInof[0]->status); ?></td>
                    </tr>
                </table>


                <!-- Consultancies information -->
                <?php } if($conInof != null){ 
                 $docInfo = $this->action->read("doctors", array("id" => $conInof[0]->doctor));
                ?>                
                <table class="table table-bordered">
                    <tr>
                        <th>Service Type</th>
                        <td><?php echo filter($regiInfo[0]->type); ?></td>
                        <th>Consultant Doctor</th>
                        <td><?php echo filter($docInfo[0]->fullName); ?></td>
                    </tr>
                    <tr>
                        <th>Room No</th>
                        <td><?php echo v_check(filter($conInof[0]->room)); ?></td>
                        <th>Status</th>
                        <td><?php echo filter($conInof[0]->status); ?></td>
                    </tr>
                    <tr>
                        <th>Remarks</th>
                        <td colspan="3"><?php echo v_check(filter($conInof[0]->notes)); ?></td>
                    </tr>
                </table>


                <!-- Emergencies information -->
                <?php } if($emrInof != null){ ?>
                <table class="table table-bordered">
                    <tr>
                        <th>Service Type</th>
                        <td><?php echo filter($regiInfo[0]->type); ?></td>
                        <th>Status</th>
                        <td><?php echo filter($emrInof[0]->status); ?></td>
                    </tr>
                </table>


                <!-- Diagnosis information -->
                <?php } if($diagInof != null){ ?> 
                    <table class="table table-bordered">
                        <tr>
                            <th>Service Type</th>
                            <td><?php echo filter($regiInfo[0]->type); ?></td>
                            <th>Status</th>
                            <td><?php echo filter($diagInof[0]->status); ?></td>
                        </tr>
                    </table>
                <?php } } ?>


                <!-- Commission Information -->
                <?php 
                $regi_id = $regiInfo[0]->id;
                $checkID = explode(":", $commission[0]->ref);
                if($regi_id == $checkID[1]){ ?>
                <h4 class="text-center" style="margin-top: 0; background: #ddd; line-height: 35px;"> Commission Information </h4>

                <table class="table table-bordered">
                    <tr>
                        <?php 
                        foreach ($commission as $key => $val) {                                
                        $comID = explode(":", $val->ref);

                        if($regi_id == $comID[1]){ ?>
                            <?php if($val->type == "referred"){ ?>
                            <th>Referred Doctor</th>
                            <td><?php echo filter($val->person); ?></td>

                            <?php } if($val->type == "reference"){ ?>
                            <th>Marketer</th>
                            <td><?php echo filter($val->person); ?></td>
                        <?php } } } 
                        } ?>
                    </tr>
                </table> 
                 
            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>