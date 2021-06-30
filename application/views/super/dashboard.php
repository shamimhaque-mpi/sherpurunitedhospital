<div class="container-fluid">
    <div class="row">
        <?php echo $this->session->flashdata('error'); ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1 class="text-center">Welcome to Dashboard...!</h1>
            </div>       
            <div class="panel-body">  
                <div class="col-md-3">
                    <a href="<?=site_url('/doctor/allDoctors')?>">
                        <div class="dash-box dash-box-1">
                            <span>Doctors</span>
                            <h1><?php if($doctors != NULL){ echo count($doctors); } else { echo 0; } ?></h1>
                        </div>   
                    </a>
                </div>                
               
                <!-- <div class="col-md-3">
                    <div class="dash-box dash-box-2">
                        <span>PC Doctor</span>
                        <h1><?php if($pcDoctors != NULL){ echo count($pcDoctors); } else { echo 0; } ?></h1>
                    </div>                    
                </div> -->
               
                <!-- <div class="col-md-3">
                    <div class="dash-box dash-box-3">
                        <span>Reference</span>
                        <h1><?php if($marketer != NULL) { echo count($marketer); } else { echo 0; } ?></h1>
                    </div>                    
                </div>
                         
                <div class="col-md-3">
                    <div class="dash-box dash-box-4">
                        <span>Employee</span>
                        <h1><?php if($employee != NULL) {echo count($employee); }else{ echo 0; } ?></h1>
                    </div>                    
                </div>
                 -->

                <div class="col-md-3">
                    <a href="<?=site_url('consultancy/allConsultancy')?>">
                        <div class="dash-box dash-box-6">
                           <span>Todays Consultancy</span>
                           <h1><?php if($today_consultancy != NULL){ echo count($today_consultancy); }else{ echo 0; } ?></h1>
                       </div> 
                    </a>                    
                </div>
                
                <div class="col-md-3">
                    <a href="<?=site_url('diagnosis/allPatientDiagnosis')?>">
                        <div class="dash-box dash-box-6">
                           <span>Todays Diagnosis</span>
                           <h1><?php echo(!empty($today_diagnosis) ? count($today_diagnosis) : 0) ?></h1>
                       </div> 
                    </a>                    
                </div>
                
                
                
                <div class="col-md-3">
                    <a href="<?=site_url('diagnosis/allPatientDiagnosis')?>">
                        <div class="dash-box dash-box-6">
                           <span>Todays Total Report</span>
                           <h1><?php echo(!empty($today_total_report) ? count($today_total_report) : 0) ?></h1>
                       </div> 
                    </a>                    
                </div>                
                

                <div class="col-md-3">
                    <a href="<?=site_url('investigation/allInvestigation')?>">
                        <div class="dash-box dash-box-5">
                            <span>Total Investigation</span>
                            <h1><?php if($today_investigation != NULL){ echo count($today_investigation); }else{ echo 0; } ?></h1>
                        </div> 
                    </a>                    
                </div>
                
                <!-- <div class="col-md-3">
                    <div class="dash-box dash-box-8">
                        <span>Todays Operation </span>
                        <h1><?php if($today_operations != NULL){ echo count($today_operations); }else{ echo 0; } ?></h1>
                    </div>                    
                </div> -->

                <div class="col-md-3">   
                    <a href="<?=site_url('due_list/due_list')?>">
                        <div class="dash-box dash-box-7">
                            <span>Today Due</span>
                            <h1><?php  echo float_number($totalDue); ?></h1>
                        </div>
                    </a>                 
                </div>
                
                <div class="col-md-3">
                    <a href="<?=site_url('cost/cost/allcost')?>">
                        <div class="dash-box dash-box-9">
                            <span>Today Costs </span>
                            <h1>
                                <?php
                                    $total=0;
                                    foreach ($costs as $cost) { $total+=$cost->amount; }
                                    echo float_number($total); 
                                ?>
                            </h1>
                        </div>
                    </a>                    
                </div> 

                <div class="col-md-3">
                    <a href="<?=site_url('income/income/allincome')?>">
                        <div class="dash-box dash-box-7">
                            <span>Today Income</span>
                            <h1><?php  echo float_number($toIncome); ?></h1>
                        </div>
                    </a>                    
                </div>
            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
  </div>
</div>
