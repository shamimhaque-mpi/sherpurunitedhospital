<style>
    .deshitem {margin-bottom:15px !important;}
    .delete{color: red;}
    .view{color: green;}
    .edit{color: #EC971F;}

    .checkbox-inline,
    .checkbox label,
    .radio label{
        padding-left: 0;
        font-weight: bold;
    }

    .checkbox label:after,
    .radio label:after {
        content: '';
        display: table;
        clear: both;
    }

    .checkbox .cr,
    .radio .cr {
        position: relative;
        display: inline-block;
        border: 1px solid #a9a9a9;
        border-radius: .25em;
        width: 1.3em;
        height: 1.3em;
        float: left;
    }

    .radio .cr {
        border-radius: 50%;
    }

    .checkbox .cr .cr-icon,
    .radio .cr .cr-icon {
        position: absolute;
        font-size: .8em;
        line-height: 0;
        top: 50%;
        left: 20%;
    }

    .radio .cr .cr-icon {
        margin-left: 0.04em;
    }

    .checkbox label input[type="checkbox"],
    .radio label input[type="radio"] {
        display: none;
    }

    .checkbox label input[type="checkbox"] + .cr > .cr-icon,
    .radio label input[type="radio"] + .cr > .cr-icon {
        transform: scale(3) rotateZ(-20deg);
        opacity: 0;
        transition: all .3s ease-in;
    }

    .checkbox label input[type="checkbox"]:checked + .cr > .cr-icon,
    .radio label input[type="radio"]:checked + .cr > .cr-icon {
        transform: scale(1) rotateZ(0deg);
        opacity: 1;
    }

    .checkbox label input[type="checkbox"]:disabled + .cr,
    .radio label input[type="radio"]:disabled + .cr {
        opacity: .5;
    }
    #progress{display: none ;}
</style>
<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default">

            <div class="panel-heading panal-header">
                <div class="panal-header-title">
                    <h1 class="pull-left">Set Privilege</h1>
                    <img id="progress" class="pull-right" src="#" alt=""></span>
                </div>
            </div>

            <div class="panel-body">
                <form action="" class="form-horizontal">
                    <div class="form-group">
                        <label class="col-md-2 control-label">Privilege  <span class="req">*</span></label>
                        <div class="col-md-5">
                            <select name="privilege" id="privilege" class="form-control" required>
                                <option value="">-- Select --</option>
                                <?php foreach ($privileges as $privilege) { ?>
                                <option value="<?php echo $privilege->privilege; ?>"><?php echo filter($privilege->privilege); ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">User Name<span class="req">*</span></label>
                        <div class="col-md-5">
                            <select name="user_id" id="user_id" class="form-control" required> </select>
                        </div>
                        <div class="col-md-12">
                            <hr style="margin-bottom: 0">
                        </div>
                    </div>
                </form>

                <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr  class="active">
                            <th rowspan="2" class="text-center" style="vertical-align: middle;">Menu Item</th>
                            <th colspan="3" class="text-center">Navbar Items</th>
                        </tr>
                    </thead>


                    <tbody>
                        <!-- Row Start here -->
                        <?php if(ck_menu("dashboard")){ ?>
                            <tr>
                                <th>
                                    <div class="checkbox checkbox-inline view">
                                      <label>
                                        <input type="checkbox" data-item="menu" value="dashboard">
                                        <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                        <span style="margin-left: 10px;">Dashboard</span>
                                      </label>
                                    </div>
                                </th>
    
                                <td colspan="3" width="">
    
                                    <?php if(ck_action("dashboard","doctors")){ ?>
                                        <div class="deshitem checkbox checkbox-inline view">
                                          <label>
                                            <input type="checkbox" data-menu="dashboard" data-item="action" value="doctors">
                                            <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                            &nbsp;DOCTORS
                                          </label>
                                        </div>
                                     <?php } ?>
    
                                     <?php if(ck_action("dashboard","todays_consultancy")){ ?>
                                        <div class="deshitem checkbox checkbox-inline view">
                                          <label>
                                            <input type="checkbox" data-menu="dashboard" data-item="action" value="todays_consultancy">
                                            <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                            &nbsp;Todays Consultancy
                                          </label>
                                        </div>
                                     <?php } ?>    
    
                                    <?php if(ck_action("dashboard","todays_total_report")){ ?>
                                        <div class="deshitem checkbox checkbox-inline view">
                                          <label>
                                            <input type="checkbox" data-menu="dashboard" data-item="action" value="todays_total_report">
                                            <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                            &nbsp;Todays Total Report
                                          </label>
                                        </div>
                                     <?php } ?>    
    
                                    <?php if(ck_action("dashboard","total_diagnosis")){ ?>
                                        <div class="deshitem checkbox checkbox-inline view">
                                          <label>
                                            <input type="checkbox" data-menu="dashboard" data-item="action" value="total_diagnosis">
                                            <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                            &nbsp;Todays Diagnosis
                                          </label>
                                        </div>
                                     <?php } ?>
    
                                    <?php if(ck_action("dashboard","total_investigation")){ ?>    
                                        <div class="deshitem checkbox checkbox-inline view">
                                          <label>
                                            <input type="checkbox" data-menu="dashboard" data-item="action" value="total_investigation">
                                            <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                            &nbsp;Total Investigation
                                          </label>
                                        </div>
                                     <?php } ?>
                                    
                                    <?php if(ck_action("dashboard","todays_due")){ ?>    
                                        <div class="deshitem checkbox checkbox-inline view">
                                          <label>
                                            <input type="checkbox" data-menu="dashboard" data-item="action" value="todays_due">
                                            <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                            &nbsp;Today Due
                                          </label>
                                        </div>
                                     <?php } ?>
    
                                    <?php if(ck_action("dashboard","total_cost")){ ?>    
                                        <div class="deshitem checkbox checkbox-inline view">
                                          <label>
                                            <input type="checkbox" data-menu="dashboard" data-item="action" value="total_cost">
                                            <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                            &nbsp;Today Costs
                                          </label>
                                        </div>
                                     <?php } ?>
    
                                    <?php if(ck_action("dashboard","total_income")){ ?>    
                                        <div class="deshitem checkbox checkbox-inline view">
                                          <label>
                                            <input type="checkbox" data-menu="dashboard" data-item="action" value="total_income">
                                            <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                            &nbsp;Today Income
                                          </label>
                                        </div>
                                     <?php } ?>
                                    
                                </td>
                            </tr>
                        <?php  } ?>    
                        <!-- Row End here -->



                        <!-- Row Start here -->
                        <?php if(ck_menu("doctor-menu")){ ?>
                            <tr>
                                <th>
                                    <div class="checkbox checkbox-inline view">
                                      <label>
                                        <input type="checkbox" data-item="menu" value="doctor-menu">
                                        <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                        <span style="margin-left: 10px;">Doctors</span>
                                      </label>
                                    </div>
                                </th>
    
                                <td colspan="3" width="320">
                                    <?php if(ck_action("doctor-menu","add")){ ?>
                                        <div class="deshitem checkbox checkbox-inline view">
                                          <label>
                                            <input type="checkbox" data-menu="doctor-menu" data-item="action" value="add">
                                            <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                            &nbsp; New doctor
                                          </label>
                                        </div>
                                     <?php } ?>    
    
                                    <?php if(ck_action("doctor-menu","all")){ ?>
                                        <div class="deshitem checkbox checkbox-inline view">
                                          <label>
                                            <input type="checkbox" data-menu="doctor-menu" data-item="action" value="all">
                                            <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                            &nbsp; All Doctors
                                          </label>
                                        </div>
                                     <?php } ?>    
                                    
                                    <?php if(ck_action("doctor-menu","payment")){ ?>
                                        <div class="deshitem checkbox checkbox-inline view">
                                          <label>
                                            <input type="checkbox" data-menu="doctor-menu" data-item="action" value="payment">
                                            <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                            &nbsp; Payment
                                          </label>
                                        </div>
                                     <?php } ?>    
                                    
                                      <?php if(ck_action("doctor-menu","payment_all")){ ?>
                                        <div class="deshitem checkbox checkbox-inline view">
                                          <label>
                                            <input type="checkbox" data-menu="doctor-menu" data-item="action" value="payment_all">
                                            <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                            &nbsp; All Payment
                                          </label>
                                        </div>
                                       <?php } ?>    
                                    
                                     <?php if(ck_action("doctor-menu","alt_doctor_payment")){ ?>
                                        <div class="deshitem checkbox checkbox-inline view">
                                          <label>
                                            <input type="checkbox" data-menu="doctor-menu" data-item="action" value="alt_doctor_payment">
                                            <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                            &nbsp;  Ultra Doctor Payment
                                          </label>
                                        </div>
                                     <?php } ?>    
                                    
                                    
                                     <?php if(ck_action("doctor-menu","altra_doctor_all_payment")){ ?>
                                        <div class="deshitem checkbox checkbox-inline view">
                                          <label>
                                            <input type="checkbox" data-menu="doctor-menu" data-item="action" value="altra_doctor_all_payment">
                                            <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                            &nbsp; All Ultra Doctor Payment
                                          </label>
                                        </div>
                                     <?php } ?>    
                                    
                                </td>
                            </tr>
                        <?php } ?>    
                        <!-- Row End here -->






                        <!-- Row Start here -->
                         <?php if(ck_menu("marketer-menu")){ ?>
                            <tr>
                                <th>
                                    <div class="checkbox checkbox-inline view">
                                      <label>
                                        <input type="checkbox" data-item="menu" value="marketer-menu">
                                        <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                        <span style="margin-left: 10px;">RF/PC</span>
                                      </label>
                                    </div>
                                </th>
    
                                <td colspan="3" width="320">
                                     <?php if(ck_action("marketer-menu","add")){ ?>
                                        <div class="deshitem checkbox checkbox-inline view">
                                          <label>
                                            <input type="checkbox" data-menu="marketer-menu" data-item="action" value="add">
                                            <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                            &nbsp;  New RF/PC
                                          </label>
                                        </div>
                                       <?php } ?>          
    
                                      <?php if(ck_action("marketer-menu","all")){ ?>
                                        <div class="deshitem checkbox checkbox-inline view">
                                          <label>
                                            <input type="checkbox" data-menu="marketer-menu" data-item="action" value="all">
                                            <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                            &nbsp;  All RF/PC
                                          </label>
                                        </div>
                                       <?php } ?>          
                                    
                                      <?php if(ck_action("marketer-menu","marketer_commision_collect")){ ?>    
                                        <div class="deshitem checkbox checkbox-inline view">
                                          <label>
                                            <input type="checkbox" data-menu="marketer-menu" data-item="action" value="marketer_commision_collect">
                                            <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                            &nbsp;  Commission Payment
                                          </label>
                                        </div>
                                       <?php } ?>          
                                    
                                     <?php if(ck_action("marketer-menu","all_payment")){ ?>        
                                        <div class="deshitem checkbox checkbox-inline view">
                                          <label>
                                            <input type="checkbox" data-menu="marketer-menu" data-item="action" value="all_payment">
                                            <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                            &nbsp; All Payment
                                          </label>
                                        </div>
                                     <?php } ?>      
                                    
                                    
                                </td>
                            </tr>
                        <?php } ?>    
                            <!-- Row End here -->

                        <!-- Row Start here -->
                        <?php if(ck_menu("investigation-menu")){ ?>
                            <tr>
                                <th>
                                    <div class="checkbox checkbox-inline view">
                                      <label>
                                        <input type="checkbox" data-item="menu" value="investigation-menu">
                                        <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                        <span style="margin-left: 10px;">Test</span>
                                      </label>
                                    </div>
                                </th>
    
                                <td colspan="3" width="320">
                                    <?php if(ck_action("investigation-menu","group")){ ?>
                                        <div class="deshitem checkbox checkbox-inline view">
                                          <label>
                                            <input type="checkbox" data-menu="investigation-menu" data-item="action" value="group">
                                            <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                            &nbsp;Add Group
                                          </label>
                                        </div>
                                    <?php } ?>    
    
                                    <?php if(ck_action("investigation-menu","test")){ ?>
                                        <div class="deshitem checkbox checkbox-inline view">
                                          <label>
                                            <input type="checkbox" data-menu="investigation-menu" data-item="action" value="test">
                                            <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                            &nbsp;Test
                                          </label>
                                        </div>
                                    <?php } ?>    
                                    
                                    <?php if(ck_action("investigation-menu","addMenu")){ ?>
                                        <div class="deshitem checkbox checkbox-inline view">
                                          <label>
                                            <input type="checkbox" data-menu="investigation-menu" data-item="action" value="addMenu">
                                            <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                            &nbsp;New Investigation
                                          </label>
                                        </div>
                                    <?php } ?>    
                                    
                                    <?php if(ck_action("investigation-menu","all")){ ?>
                                        <div class="deshitem checkbox checkbox-inline view">
                                          <label>
                                            <input type="checkbox" data-menu="investigation-menu" data-item="action" value="all">
                                            <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                            &nbsp;All Investigation
                                          </label>
                                        </div>
                                    <?php } ?>    
                                    
                                </td>
                            </tr>
                         <?php } ?>        
                        <!-- Row End here -->


                    <!-- Row Start here -->
                        <?php if(ck_menu("consultancy-menu")){ ?>
                        <tr>
                            <th>
                                <div class="checkbox checkbox-inline view">
                                  <label>
                                    <input type="checkbox" data-item="menu" value="consultancy-menu">
                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                    <span style="margin-left: 10px;">Consultancy</span>
                                  </label>
                                </div>
                            </th>

                            <td colspan="3" width="320">
                                <?php if(ck_action("consultancy-menu","add")){ ?>
                                    <div class="deshitem checkbox checkbox-inline view">
                                      <label>
                                        <input type="checkbox" data-menu="consultancy-menu" data-item="action" value="add">
                                        <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                        &nbsp; New Consultancy
                                      </label>
                                    </div>
                                 <?php } ?>       

                                <?php if(ck_action("consultancy-menu","all")){ ?>
                                    <div class="deshitem checkbox checkbox-inline view">
                                      <label>
                                        <input type="checkbox" data-menu="consultancy-menu" data-item="action" value="all">
                                        <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                        &nbsp; All Consultancy
                                      </label>
                                    </div>
                                 <?php } ?>       
                                
                                <?php if(ck_action("consultancy-menu","report")){ ?>
                                    <div class="deshitem checkbox checkbox-inline view">
                                      <label>
                                        <input type="checkbox" data-menu="consultancy-menu" data-item="action" value="report">
                                        <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                        &nbsp;  Report
                                      </label>
                                    </div>
                                 <?php } ?>       
                            </td>
                        </tr>
                        <!-- Row End here -->
                         <?php } ?>       




                        <!-- Row Start here -->
                    <?php if(ck_menu("diagnosis-menu")){ ?>
                        <tr>
                            <th>
                                <div class="checkbox checkbox-inline view">
                                  <label>
                                    <input type="checkbox" data-item="menu" value="diagnosis-menu">
                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                    <span style="margin-left: 10px;">Diagnosis</span>
                                  </label>
                                </div>
                            </th>

                            <td colspan="3" width="320">

                                <?php if(ck_action("diagnosis-menu","add")){ ?>
                                    <div class="deshitem checkbox checkbox-inline view">
                                      <label>
                                        <input type="checkbox" data-menu="diagnosis-menu" data-item="action" value="add">
                                        <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                        &nbsp;New Diagnosis
                                      </label>
                                    </div>
                                 <?php } ?>

                                <?php if(ck_action("diagnosis-menu","all")){ ?>
                                    <div class="deshitem checkbox checkbox-inline view">
                                      <label>
                                        <input type="checkbox" data-menu="diagnosis-menu" data-item="action" value="all">
                                        <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                        &nbsp;All Diagnosis
                                      </label>
                                    </div>
                                 <?php } ?>
                                
                                <?php if(ck_action("diagnosis-menu","due_list")){ ?>
                                    <div class="deshitem checkbox checkbox-inline view">
                                      <label>
                                        <input type="checkbox" data-menu="diagnosis-menu" data-item="action" value="due_list">
                                        <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                        &nbsp;Due Report
                                      </label>
                                    </div>
                                 <?php } ?>

                                <?php if(ck_action("diagnosis-menu","com")){ ?>
                                    <div class="deshitem checkbox checkbox-inline view">
                                      <label>
                                        <input type="checkbox" data-menu="diagnosis-menu" data-item="action" value="com">
                                        <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                        &nbsp;Referral comm
                                      </label>
                                    </div>
                                 <?php } ?>
                                
                                
                                
                            </td>
                        </tr>
                        <!-- Row End here -->
                       <?php } ?>    



                        <!-- Row Start here -->
                        <?php if(ck_menu("tests")){ ?>
                        <tr>
                            <th>
                                <div class="checkbox checkbox-inline view">
                                  <label>
                                    <input type="checkbox" data-item="menu" value="procedure">
                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                    <span style="margin-left: 10px;">Parameter</span>
                                  </label>
                                </div>
                            </th>

                            <td colspan="3" width="320">
                                 <?php if(ck_action("tests","add")){ ?>
                                    <div class="deshitem checkbox checkbox-inline view">
                                      <label>
                                        <input type="checkbox" data-menu="procedure" data-item="action" value="add">
                                        <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                        &nbsp;Add 
                                      </label>
                                    </div>
                                <?php } ?> 
                                
                                
                                <?php if(ck_action("tests","list")){ ?>
                                    <div class="deshitem checkbox checkbox-inline view">
                                      <label>
                                        <input type="checkbox" data-menu="procedure" data-item="action" value="list">
                                        <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                        &nbsp;List
                                      </label>
                                    </div>
                                 <?php } ?> 
                                 
                                 
                                <?php /*if(ck_action("tests","add_ultra")){ ?>
                                    <div class="deshitem checkbox checkbox-inline view">
                                      <label>
                                        <input type="checkbox" data-menu="tests" data-item="action" value="add_ultra">
                                        <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                        &nbsp; New Ultra
                                      </label>
                                    </div>
                                 <?php } ?> 
                                 
                                <?php if(ck_action("tests","all_ultra")){ ?>
                                    <div class="deshitem checkbox checkbox-inline view">
                                      <label>
                                        <input type="checkbox" data-menu="tests" data-item="action" value="all_ultra">
                                        <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                        &nbsp; All Ultra
                                      </label>
                                    </div>
                                 <?php } ?> 
                                 
                                <?php if(ck_action("mixed","saber")){ ?>
                                    <div class="deshitem checkbox checkbox-inline view">
                                      <label>
                                        <input type="checkbox" data-menu="mixed" data-item="action" value="saber">
                                        <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                        &nbsp; Mixed Report
                                      </label>
                                    </div>
                                 <?php }*/ ?>     
                                
                                
                            </td>
                        </tr>
                         <?php } ?>
                        <!-- Row End here -->




                     <!-- Row Start here -->
                        <?php if(ck_menu("ultra_test")){ ?>
                            <tr>
                                <th>
                                    <div class="checkbox checkbox-inline view">
                                      <label>
                                        <input type="checkbox" data-item="menu" value="ultra_test">
                                        <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                        <span style="margin-left: 10px;">Ultra</span>
                                      </label>
                                    </div>
                                </th>
    
                                <td colspan="3" width="320">
    
                                    <?php if(ck_action("ultra_test","add_ultra")){ ?>
                                        <div class="deshitem checkbox checkbox-inline view">
                                          <label>
                                            <input type="checkbox" data-menu="ultra" data-item="action" value="add_ultra">
                                            <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                            &nbsp;New  Ultra  
                                          </label>
                                        </div>
                                    <?php } ?>    
    
                                    <?php if(ck_action("ultra_test","all_ultra")){ ?>
                                        <div class="deshitem checkbox checkbox-inline view">
                                          <label>
                                            <input type="checkbox" data-menu="ultra" data-item="action" value="all_ultra">
                                            <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                            &nbsp;All  Ultra Report
                                          </label>
                                        </div>
                                    <?php } ?>     
                                </td>
                            </tr>
                        <?php } ?>    
                        <!-- Row End here -->




                        <!-- Row Start here -->
                        
                        <?php if(ck_menu("procedure")){ ?>  
                            <tr>
                                <th>
                                    <div class="checkbox checkbox-inline view">
                                      <label>
                                        <input type="checkbox" data-item="menu" value="tests">
                                        <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                        <span style="margin-left: 10px;">Test Report</span>
                                      </label>
                                    </div>
                                </th>
    
                                <td colspan="3" width="320">
                                      <?php if(ck_action("procedure","add")){ ?>
                                             <div class="deshitem checkbox checkbox-inline view">
                                              <label>
                                                <input type="checkbox" data-menu="tests" data-item="action" value="add">
                                                <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                                &nbsp;Add 
                                              </label>
                                            </div>
                                         <?php } ?>
    
                                         <?php if(ck_action("procedure","list")){ ?>
                                            <div class="deshitem checkbox checkbox-inline view">
                                              <label>
                                                <input type="checkbox" data-menu="tests" data-item="action" value="list">
                                                <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                                &nbsp;List
                                              </label>
                                            </div>
                                         <?php } ?>    
                                </td>
                            </tr>
                        <?php } ?>    
                        <!-- Row End here -->



                        <!-- Row Start here -->
                        <?php if(ck_menu("cost_menu")){ ?>
                        <tr>
                            <th>
                                <div class="checkbox checkbox-inline view">
                                  <label>
                                    <input type="checkbox" data-item="menu" value="cost_menu">
                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                    <span style="margin-left: 10px;">Cost</span>
                                  </label>
                                </div>
                            </th>
                            <td colspan="3" width="320">
                                 <?php if(ck_action("cost_menu","field")){ ?>
                                    <div class="deshitem checkbox checkbox-inline view">
                                      <label>
                                        <input type="checkbox" data-menu="cost_menu" data-item="action" value="field">
                                        <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                        &nbsp;Field Of Cost
                                      </label>
                                    </div>
                                 <?php } ?>    
                                
                                 <?php if(ck_action("cost_menu","new")){ ?>    
                                    <div class="deshitem checkbox checkbox-inline view">
                                      <label>
                                        <input type="checkbox" data-menu="cost_menu" data-item="action" value="new">
                                        <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                        &nbsp;New Cost
                                      </label>
                                    </div>
                                 <?php } ?>    
                                
                                 <?php if(ck_action("cost_menu","all")){ ?>    
                                    <div class="deshitem checkbox checkbox-inline view">
                                      <label>
                                        <input type="checkbox" data-menu="cost_menu" data-item="action" value="all">
                                        <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                        &nbsp;All Cost
                                      </label>
                                    </div>
                                 <?php } ?>    
                            </td>
                        </tr>
                        <?php } ?>
                        <!-- Row End here -->



                        <!-- Row Start here -->
                        <?php if(ck_menu("income_menu")){ ?>
                            <tr>
                                <th>
                                    <div class="checkbox checkbox-inline view">
                                      <label>
                                        <input type="checkbox" data-item="menu" value="income_menu">
                                        <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                        <span style="margin-left: 10px;">Income </span>
                                      </label>
                                    </div>
                                </th>
    
                                <td colspan="3" width="320">
    
                                    <?php if(ck_action("income_menu","field")){ ?>
                                        <div class="deshitem checkbox checkbox-inline view">
                                          <label>
                                            <input type="checkbox" data-menu="income_menu" data-item="action" value="field">
                                            <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                            &nbsp;Field Of Income
                                          </label>
                                        </div>
                                    <?php } ?>    
    
                                    <?php if(ck_action("income_menu","new")){ ?>    
                                        <div class="deshitem checkbox checkbox-inline view">
                                          <label>
                                            <input type="checkbox" data-menu="income_menu" data-item="action" value="new">
                                            <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                            &nbsp;New Income
                                          </label>
                                        </div>
                                    <?php } ?>
                                    
                                    <?php if(ck_action("income_menu","all")){ ?>    
                                        <div class="deshitem checkbox checkbox-inline view">
                                          <label>
                                            <input type="checkbox" data-menu="income_menu" data-item="action" value="all">
                                            <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                            &nbsp;All Income
                                          </label>
                                        </div>
                                    <?php } ?>    
                                </td>
                            </tr>
                            <?php } ?>
                        <!-- Row End here -->




                        <!-- Row Start here -->
                    <?php if(ck_menu("bank_menu")){ ?>
                        <tr>
                            <th>
                                <div class="checkbox checkbox-inline view">
                                  <label>
                                    <input type="checkbox" data-item="menu" value="bank_menu">
                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                    <span style="margin-left: 10px;">Banking </span>
                                  </label>
                                </div>
                            </th>

                            <td colspan="3" width="320">

                                <?php if(ck_action("bank_menu","add-bank")){ ?>
                                    <div class="deshitem checkbox checkbox-inline view">
                                      <label>
                                        <input type="checkbox" data-menu="bank_menu" data-item="action" value="add-bank">
                                        <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                        &nbsp;Add Bank
                                      </label>
                                    </div>
                                 <?php } ?>
                                 
                                 
                                <?php if(ck_action("bank_menu","add-new")){ ?>
                                    <div class="deshitem checkbox checkbox-inline view">
                                      <label>
                                        <input type="checkbox" data-menu="bank_menu" data-item="action" value="add-new">
                                        <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                        &nbsp;Add Account
                                      </label>
                                    </div>
                                 <?php } ?>
                                
                                
                                <?php if(ck_action("bank_menu","all-acc")){ ?>    
                                    <div class="deshitem checkbox checkbox-inline view">
                                      <label>
                                        <input type="checkbox" data-menu="bank_menu" data-item="action" value="all-acc">
                                        <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                        &nbsp;All Account
                                      </label>
                                    </div>
                                 <?php } ?>
                                
                                <?php if(ck_action("bank_menu","add")){ ?>    
                                    <div class="deshitem checkbox checkbox-inline view">
                                      <label>
                                        <input type="checkbox" data-menu="bank_menu" data-item="action" value="add">
                                        <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                        &nbsp;Add Transaction
                                      </label>
                                    </div>
                                 <?php } ?>

                                <?php if(ck_action("bank_menu","ledger")){ ?>    
                                    <div class="deshitem checkbox checkbox-inline view">
                                      <label>
                                        <input type="checkbox" data-menu="bank_menu" data-item="action" value="ledger">
                                        <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                        &nbsp;Bank Ledger
                                      </label>
                                    </div>
                                 <?php } ?>
                                
                                <?php if(ck_action("bank_menu","all")){ ?>    
                                    <div class="deshitem checkbox checkbox-inline view">
                                      <label>
                                        <input type="checkbox" data-menu="bank_menu" data-item="action" value="all">
                                        <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                        &nbsp;All Transaction
                                      </label>
                                    </div>
                                 <?php } ?>
                                
                                
                            </td>
                        </tr>
                     <?php } ?>    
                        <!-- Row End here -->
                        
                     <?php if(ck_menu("opening_balance_menu")){ ?>     
                         <tr>
                            <th>
                                <div class="checkbox checkbox-inline view">
                                  <label>
                                    <input type="checkbox" data-item="menu" value="opening_balance_menu">
                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                    <span style="margin-left: 10px;">Opening Balance</span>
                                  </label>
                                </div>
                            </th>
                            <tdcolspan="3" width="320"></td>
                        </tr>
                     <?php } ?>    
                        
                        
                        <!-- Row Start here -->
                    <?php if(ck_menu("balance_menu")){ ?>         
                        <tr>
                            <th>
                                <div class="checkbox checkbox-inline view">
                                  <label>
                                    <input type="checkbox" data-item="menu" value="balance_menu">
                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                    <span style="margin-left: 10px;">Balance Sheet</span>
                                  </label>
                                </div>
                            </th>
                            <tdcolspan="3" width="320"></td>
                        </tr>
                        <!-- Row End here -->
                     <?php } ?>       

                    <?php if(ck_menu("employee_menu")){ ?>      
                         <tr>
                            <th>
                                <div class="checkbox checkbox-inline view">
                                  <label>
                                    <input type="checkbox" data-item="menu" value="employee_menu">
                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                    <span style="margin-left: 10px;">Employee</span>
                                  </label>
                                </div>
                            </th>
                            <tdcolspan="3" width="320"></td>
                        </tr>
                    <?php } ?>        
                        
                    <?php if(ck_menu("salary_menu")){ ?>      
                             <tr>
                                <th>
                                    <div class="checkbox checkbox-inline view">
                                      <label>
                                        <input type="checkbox" data-item="menu" value="salary_menu">
                                        <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                        <span style="margin-left: 10px;">Salary</span>
                                      </label>
                                    </div>
                                </th>
                                <tdcolspan="3" width="320"></td>
                            </tr>
                    <?php } ?>    
                        <!-- Row Start here -->
                        
                        
                     <?php if(ck_menu("report_menu")){ ?>    
                        <tr>
                            <th>
                                <div class="checkbox checkbox-inline view">
                                  <label>
                                    <input type="checkbox" data-item="menu" value="report_menu">
                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                    <span style="margin-left: 10px;">Report</span>
                                  </label>
                                </div>
                            </th>

                            <td colspan="3" width="320">

                                 <?php if(ck_action("report_menu","cost")){ ?>
                                    <div class="deshitem checkbox checkbox-inline view">
                                      <label>
                                        <input type="checkbox" data-menu="report_menu" data-item="action" value="cost">
                                        <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                        &nbsp;Cost
                                      </label>
                                    </div>
                                 <?php } ?>  

                                    
                                 <?php if(ck_action("report_menu","drCom")){ ?>    
                                    <div class="deshitem checkbox checkbox-inline view">
                                      <label>
                                        <input type="checkbox" data-menu="report_menu" data-item="action" value="drCom">
                                        <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                        &nbsp;Doctor Commission
                                      </label>
                                    </div>
                                 <?php } ?>  
                                 
                                 <?php if(ck_action("report_menu","diagnosis")){ ?>
                                    <div class="deshitem checkbox checkbox-inline view">
                                      <label>
                                        <input type="checkbox" data-menu="report_menu" data-item="action" value="diagnosis">
                                        <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                        &nbsp;Diagnosis
                                      </label>
                                    </div>
                                 <?php } ?>  
                                 
                                    
                                 <?php if(ck_action("report_menu","patientReport")){ ?>    
                                    <div class="deshitem checkbox checkbox-inline view">
                                      <label>
                                        <input type="checkbox" data-menu="report_menu" data-item="action" value="patientReport">
                                        <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                        &nbsp;Patient Report
                                      </label>
                                    </div>
                                 <?php } ?>  
                                 
                                 <?php if(ck_action("report_menu","assets")){ ?>     
                                     <div class="deshitem checkbox checkbox-inline view">
                                      <label>
                                        <input type="checkbox" data-menu="report_menu" data-item="action" value="balance_menu">
                                        <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                        &nbsp;Assets Report
                                      </label>
                                    </div>
                                 <?php } ?>  
                                
                            </td>
                        </tr>
                        <!-- Row End here -->
                         <?php } ?>  
                        
                        


                        <!-- Row Start here -->
                        <!--<tr>
                            <th>
                                <div class="checkbox checkbox-inline view">
                                  <label>
                                    <input type="checkbox" data-item="menu" value="reagent_menu">
                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                    <span style="margin-left: 10px;">Reagent</span>
                                  </label>
                                </div>
                            </th>

                            <td colspan="3" width="320">

                                <div class="deshitem checkbox checkbox-inline view">
                                  <label>
                                    <input type="checkbox" data-menu="reagent_menu" data-item="action" value="add-new">
                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                    &nbsp;Add New
                                  </label>
                                </div>

                                <div class="deshitem checkbox checkbox-inline view">
                                  <label>
                                    <input type="checkbox" data-menu="reagent_menu" data-item="action" value="all">
                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                    &nbsp;View All
                                  </label>
                                </div>
                            </td>
                        </tr>-->
                        <!-- Row End here -->



                        <!-- Row Start here -->
                      <!--  <tr>
                            <th>
                                <div class="checkbox checkbox-inline view">
                                  <label>
                                    <input type="checkbox" data-item="menu" value="reagent_stock_menu">
                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                    <span style="margin-left: 10px;">Stock</span>
                                  </label>
                                </div>
                            </th>
                            <td colspan="3" width="320">

                                <div class="deshitem checkbox checkbox-inline view">
                                  <label>
                                    <input type="checkbox" data-menu="reagent_stock_menu" data-item="action" value="add-new">
                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                    &nbsp;Add Stock
                                  </label>
                                </div>

                                <div class="deshitem checkbox checkbox-inline view">
                                  <label>
                                    <input type="checkbox" data-menu="reagent_stock_menu" data-item="action" value="outstock">
                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                    &nbsp;Out Stock
                                  </label>
                                </div>

                                <div class="deshitem checkbox checkbox-inline view">
                                  <label>
                                    <input type="checkbox" data-menu="reagent_stock_menu" data-item="action" value="all">
                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                    &nbsp;All Stock
                                  </label>
                                </div>
                            </td>
                        </tr>-->
                        
                        
                        
                        
                        <!-- Row Start here -->
                        <?php if(ck_menu("sms_menu")){ ?>
                            <tr>
                                <th>
                                    <div class="checkbox checkbox-inline view">
                                      <label>
                                        <input type="checkbox" data-item="menu" value="sms_menu">
                                        <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                        <span style="margin-left: 10px;">SMS</span>
                                      </label>
                                    </div>
                                </th>
    
                                <td colspan="3" width="320">
    
                                    <?php if(ck_action("sms_menu","send-sms")){ ?>
                                        <div class="deshitem checkbox checkbox-inline view">
                                          <label>
                                            <input type="checkbox" data-menu="sms_menu" data-item="action" value="send-sms">
                                            <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                            &nbsp;Send SMS
                                          </label>
                                        </div>
                                     <?php } ?>    
    
                                    <?php if(ck_action("sms_menu","custom-sms")){ ?>
                                        <div class="deshitem checkbox checkbox-inline view">
                                          <label>
                                            <input type="checkbox" data-menu="sms_menu" data-item="action" value="custom-sms">
                                            <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                            &nbsp;Custom SMS
                                          </label>
                                        </div>
                                     <?php } ?>    
    
                                    <?php if(ck_action("sms_menu","sms-report")){ ?>
                                        <div class="deshitem checkbox checkbox-inline view">
                                          <label>
                                            <input type="checkbox" data-menu="sms_menu" data-item="action" value="sms-report">
                                            <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                            &nbsp;SMS Report
                                          </label>
                                        </div>
                                     <?php } ?>    
    
                                </td>
                            </tr>
                        <?php } ?>    
                        <!-- Row End here -->



                        <!-- Row Start here -->
                        <?php if(ck_menu("privilege-menu")){ ?>
                            <tr>
                                <th>
                                    <div class="checkbox checkbox-inline view">
                                      <label>
                                        <input type="checkbox" data-item="menu" value="privilege-menu">
                                        <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                        <span style="margin-left: 10px;">Set Privilege</span>
                                      </label>
                                    </div>
                                </th>
    
                                <td colspan="3" width="320"></td>
                            </tr>
                        <?php } ?>    
                        <!-- Row End here -->



                        
                        <!-- Row Start here -->
                        <?php if(ck_menu("theme_menu")){ ?>    
                        <tr>
                            <th>
                                <div class="checkbox checkbox-inline view">
                                  <label>
                                    <input type="checkbox" data-item="menu" value="theme_menu">
                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                    <span style="margin-left: 10px;"> Settings</span>
                                  </label>
                                </div>
                            </th>

                            <td colspan="3" width="320">
                                 <?php if(ck_action("theme_menu","logo")){ ?>
                                    <div class="deshitem checkbox checkbox-inline view">
                                      <label>
                                        <input type="checkbox" data-menu="theme_menu" data-item="action" value="logo">
                                        <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                        &nbsp;Change Logo
                                      </label>
                                    </div>
                                 <?php } ?>    

                                <?php if(ck_action("theme_menu","tools")){ ?>
                                        <div class="deshitem checkbox checkbox-inline view">
                                          <label>
                                            <input type="checkbox" data-menu="theme_menu" data-item="action" value="tools">
                                            <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                            &nbsp;Change Info
                                          </label>
                                        </div>
                                 <?php } ?>        
                            </td>
                        </tr>
                        <!-- Row End here -->
                         <?php } ?>      


                        <!-- Row Start here -->
                        <?php if(ck_menu("backup_menu")){ ?>
                            <tr>
                                <th>
                                    <div class="checkbox checkbox-inline view">
                                      <label>
                                        <input type="checkbox" data-item="menu" value="backup_menu">
                                        <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                        <span style="margin-left: 10px;">Data Backup</span>
                                      </label>
                                    </div>
                                </th>
    
                                <td colspan="3" width="320">
    
                                     <?php if(ck_action("backup_menu","add-new")){ ?>
                                        <div class="deshitem checkbox checkbox-inline view">
                                          <label>
                                            <input type="checkbox" data-menu="backup_menu" data-item="action" value="add-new">
                                            <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                            &nbsp;Export
                                          </label>
                                        </div>
                                    <?php } ?>    
    
                                    <!--<div class="deshitem checkbox checkbox-inline view">
                                      <label>
                                        <input type="checkbox" data-menu="backup_menu" data-item="action" value="all">
                                        <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                        &nbsp;Import
                                      </label>
                                    </div>-->
    
                                </td>
                            </tr>
                         <?php } ?> 
                        <!-- Row End here -->

                    </tbody>
                </table>
                </div>
            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>



<script>
    $(document).ready(function(){

        // get all users
        $('select#privilege').on("change",function(){
            var data = [];
            var obj = { 'privilege' : $(this).val() };

            $.ajax({
                type : "POST",
                url  : "<?php echo site_url("ajax/retrieveBy/users"); ?>",
                data : "condition=" + JSON.stringify(obj)
            }).done(function(response){
                var items = $.parseJSON(response);
                data.push('<option value="">-- Select --</option>');
                $.each(items,function(i,el){
                    data.push('<option value="'+ el.id+'">'+ el.username +'</option>');
                });

                $('select#user_id').html(data);

            });
        });

        $("#check_view").on('change', function(event) {
            if($(this).is(":checked")){
                $('input[type="checkbox"][value="view"]').prop({checked:true});
            }else{
                $('input[type="checkbox"][value="view"]').prop({checked:false});
            }
        });


        $("#check_edit").on('change', function(event) {
            if($(this).is(":checked")){
                $('input[type="checkbox"][value="edit"]').prop({checked:true});
            }else{
                $('input[type="checkbox"][value="edit"]').prop({checked:false});
            }
        });

        $("#check_delete").on('change', function(event) {
            if($(this).is(":checked")){
                $('input[type="checkbox"][value="delete"]').prop({checked:true});
            }else{
                $('input[type="checkbox"][value="delete"]').prop({checked:false});
            }
        });
        //Getting All Menu Name It's Just for use the data
        var input = $('input[type="checkbox"][data-item="menu"]');
        var list = [];
        $.each(input,function(index, el) {
            list.push($(el).val());
        });
        // console.log(list);

        //Set Privilege Data Start
        $('input[type="checkbox"]').on('change', function(event) {
            if($('select[name="privilege"]').val()!="" && $('select[name="user_id"]').val()!=""){
                $("#progress").fadeIn(300);
                //Collecting all data start here
                var access_item = {};

                var input = $('input[type="checkbox"]');

                $.each(input,function(index, el) {
                    if($(el).is(":checked")){
                        //access_item.push($(el).val());
                        if($(el).data("item")=="menu"){
                            //action data collection Start here
                            var ac_el = $('input[data-menu="'+$(el).val()+'"]');
                            var action_data = [];
                            $.each(ac_el,function(ac_i, ac_el) {
                                if($(ac_el).is(":checked")){
                                    action_data.push($(ac_el).val());
                                }
                            });
                            //action data collection End here
                            access_item[$(el).val()] = action_data;
                        }
                    }
                });
                //console.log(access_item);

                var access = JSON.stringify(access_item);
                //console.log(access);
                var privilege_name = $('select[name="privilege"]').val();
                var user_id = $('select[name="user_id"]').val();
                //Collecting All data end here


                //Sending Request Start here
                $.ajax({
                    url: '<?php echo site_url("privilege/privilege/set_privilege_ajax"); ?>',
                    type: 'POST',
                    data: {
                        privilege_name: privilege_name,
                        user_id : user_id ,
                        access : access
                    }
                })
                .done(function(response) {
                    //console.log(response);
                    $("#progress").fadeOut(300);
                });
                //Sending Request End here
            }else{
                alert("Please select a Privilege and User Name.");
                return false
            }
        });
        //Set Privilege Data End

        //Get Privilege Data Start
        $('select[name="user_id"]').on('change', function(event) {
            $('input[type="checkbox"]').prop({checked:false});
            //Sending Request Start here
            var user_id = $(this).val();
            var privilege_name = $('#privilege').val();
            $.ajax({
                url: '<?php echo site_url("privilege/privilege/get_privilege_ajax"); ?>',
                type: 'POST',
                data: {user_id : user_id , privilege_name:privilege_name}
            }).done(function(response) {
                if(response!="error"){
                    var data = $.parseJSON(response);
                    access = $.parseJSON(data.access);

                    //console.log(access);
                    $.each(access,function(access_index,access_val){
                        //console.log(access_index);
                        //data-item="menu" value="theme_ettings"
                        $('input[data-item="menu"][value="'+access_index+'"]').prop({checked: true});
                        $.each(access_val,function(action_in,action_val){
                            $('input[data-item="action"][data-menu="'+access_index+'"][value="'+action_val+'"]').prop({checked: true});
                        });
                        //$('input[name="'+el.module_name+'"][value="'+access_val+'"]').prop({checked: true});
                    });
                }
            });
            //Sending Request End here
        });
        //Get Privilege Data End
    });
</script>