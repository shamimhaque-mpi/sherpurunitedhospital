<style>
    ul li a span.icon{
        float: right;
        margin-right: 20px;
    }
</style>

<!-- Sidebar -->
<aside id="sidebar-wrapper">
    <div class="sidebar-nav">
        <h3 class="sidebar-brand"><a href="#"><span><?php echo $this->data['name']; ?></span></a></h3>
    </div>

    <nav>
        <ul class="sidebar-nav">
            
            <?php if(ck_menu("dashboard")){ ?>
            <li id="dashboard">
                <a href="<?php echo site_url('admin/dashboard'); ?>">
                    <i class="fa fa-home"></i>
                    &nbsp; Dashboard
                </a>
            </li>
            <?php } ?>
            <?php if(ck_menu("alltest_menu")){ ?>
            <li id="alltest_menu">
                <a href="#test_submenu" data-toggle="collapse">
                    <i class="fa fa-flask" aria-hidden="true"></i>
                    &nbsp;Test
                    <span class="icon"><i class="fa fa-sort-desc"></i></span>
                </a>

                <ul id="test_submenu" class="sidebar-nav collapse">
                    <?php if(ck_action("alltest_menu","group")){ ?>
                    <li>
                        <a href="<?php echo site_url('alltest/group'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Group
                        </a>
                    </li>
                    <?php } ?>
                    <?php if(ck_action("alltest_menu","test")){ ?>
                    <li>
                        <a href="<?php echo site_url('alltest/test'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Test
                        </a>
                    </li>
                    <?php } ?>
                    <?php if(ck_action("alltest_menu","parameter")){ ?>
                    <li>
                        <a href="<?php echo site_url('alltest/parameter'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Parameter
                        </a>
                    </li>
                    <?php } ?>
                    <?php if(ck_action("alltest_menu","group_mapping")){ ?>
                    <li>
                        <a href="<?php echo site_url('alltest/group_mapping'); ?>">
                            <i class="fa fa-angle-right"></i>
                            group Mapping
                        </a>
                    </li>
                    <?php } ?>
                    <?php if(ck_action("alltest_menu","test_mapping")){ ?>
                    <li>
                        <a href="<?php echo site_url('alltest/test_mapping'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Test Mapping
                        </a>
                    </li>
                    <?php } ?>
                    <?php if(ck_action("alltest_menu","show_mapping")){ ?>
                    <li>
                        <a href="<?php echo site_url('alltest/show_mapping'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Show Mapping
                        </a>
                    </li>
                    <?php } ?>
                </ul>
            </li>
            <?php } ?>
            
            <?php if(ck_menu("doctor-menu")){ ?>
            <li id="doctor-menu">
                <a href="#doctor" data-toggle="collapse">
                    <i class="fa fa-user-md" aria-hidden="true"></i>
                    &nbsp;Doctors
                    <span class="icon"><i class="fa fa-sort-desc"></i></span>
                </a>

                <ul id="doctor" class="sidebar-nav collapse">
                    <?php if(ck_action("doctor-menu","add")){ ?>
                    <li>
                        <a href="<?php echo site_url('doctor/addNewDoctor'); ?>">
                            <i class="fa fa-angle-right"></i>
                             New doctor
                        </a>
                    </li>
                    <?php } ?>

                    <?php if(ck_action("doctor-menu","all")){ ?>
                    <li>
                        <a href="<?php echo site_url('doctor/allDoctors'); ?>">
                            <i class="fa fa-angle-right"></i>
                            All Doctors
                        </a>
                    </li>
                    <?php } ?>
                    
                    <?php if(ck_action("doctor-menu","payment")){ ?>
                    <li>
                        <a href="<?php echo site_url('doctor/payment'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Payment
                        </a>
                    </li>
                    <?php } ?>
                    
                    <?php if(ck_action("doctor-menu","payment_all")){ ?>
                    <li>
                        <a href="<?php echo site_url('doctor/payment/all'); ?>">
                            <i class="fa fa-angle-right"></i>
                            All Payment
                        </a>
                    </li>
                    <?php } ?>
                    
                    <?php if(ck_action("doctor-menu","alt_doctor_payment")){ ?>
                    <li>
                        <a href="<?php echo site_url('doctor/alt_doctor'); ?>">
                            <i class="fa fa-angle-right"></i>
                             Ultra Doctor Payment
                        </a>
                    </li>
                    <?php } ?>
                    
                    <?php if(ck_action("doctor-menu","altra_doctor_all_payment")){ ?>
                         <li>
                            <a href="<?php echo site_url('doctor/alt_doctor/all'); ?>">
                                <i class="fa fa-angle-right"></i>
                                All Ultra Doctor Payment
                            </a>
                        </li>
                    <?php } ?>
                </ul>
            </li>
            <?php } ?>
            
            <?php if(ck_menu("marketer-menu")){ ?>
                 <li id="marketer-menu">
                    <a href="#marketer" data-toggle="collapse">
                        <i class="fa fa-user-secret"></i>
                        &nbsp;RF/PC
                        <span class="icon"><i class="fa fa-sort-desc"></i></span>
                    </a>
    
                    <ul id="marketer" class="sidebar-nav collapse">
                        <?php if(ck_action("marketer-menu","add")){ ?>
                            <li>
                                <a href="<?php echo site_url('marketer/add'); ?>">
                                    <i class="fa fa-angle-right"></i>
                                    New RF/PC
                                </a>
                            </li>
                         <?php } ?>
                        
                         <?php if(ck_action("marketer-menu","all")){ ?>
                            <li>
                                <a href="<?php echo site_url('marketer/all'); ?>">
                                    <i class="fa fa-angle-right"></i>
                                    All RF/PC
                                </a>
                            </li>
                         <?php } ?>    
                        <?php /* ?>
                        <li>
                            <a href="<?php echo site_url('marketer/commission'); ?>">
                                <i class="fa fa-angle-right"></i>
                                Commission
                            </a>
                        </li>
                        
                        <li>
                            <a href="<?php echo site_url('marketer/commission/payment'); ?>">
                                <i class="fa fa-angle-right"></i>
                                Payment
                            </a>
                        </li>
    
                        <li>
                            <a href="<?php echo site_url('marketer/commission/details'); ?>">
                                <i class="fa fa-angle-right"></i>
                                Commission Details
                            </a>
                        </li>
                        <?php */ ?>
                        
                        
                        <?php if(ck_action("marketer-menu","commission-list")){ ?>
                            <li>
                                <a href="<?php echo site_url('marketer/commission_list'); ?>">
                                    <i class="fa fa-angle-right"></i>
                                    Commission List
                                </a>
                            </li>
                        <?php } ?>    
                        
                        <?php if(ck_action("marketer-menu","marketer_commision_collect")){ ?>
                            <li>
                                <a href="<?php echo site_url('marketer/marketer_commision_collect'); ?>">
                                    <i class="fa fa-angle-right"></i>
                                    Commission Payment
                                </a>
                            </li>
                        <?php } ?>    
                        
                        
                         <?php if(ck_action("marketer-menu","all_payment")){ ?>
                            <li>
                                <a href="<?php echo site_url('marketer/marketer_commision_collect/all'); ?>">
                                    <i class="fa fa-angle-right"></i>
                                    All Payment
                                </a>
                            </li>
                         <?php } ?>    
                        
                    </ul>
                </li>
            <?php } ?>
            
            
            <?php if(ck_menu("investigation-menu")){ ?>
            <li id="investigation-menu">
                <a href="#investigation" data-toggle="collapse">
                    <i class="fa fa-search" aria-hidden="true"></i>
                    &nbsp;Test
                    <span class="icon"><i class="fa fa-sort-desc"></i></span>
                </a>

                <ul id="investigation" class="sidebar-nav collapse">
                    <?php if(ck_action("investigation-menu","group")){ ?>
                    <li>
                        <a href="<?php echo site_url('investigation/addInvestigation/group'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Add Group
                        </a>
                    </li>
                    <?php } ?>
                    
                    <?php if(ck_action("investigation-menu","test")){ ?>
                    <li>
                        <a href="<?php echo site_url('investigation/addInvestigation/test'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Test
                        </a>
                    </li>
                    <?php } ?>
                    
                    <?php if(ck_action("investigation-menu","addMenu")){ ?>
                    <li>
                        <a href="<?php echo site_url('investigation/addInvestigation'); ?>">
                            <i class="fa fa-angle-right"></i>
                            New Investigation
                        </a>
                    </li>
                    <?php } ?>
                    
                    <?php if(ck_action("investigation-menu","all")){ ?>
                    <li>
                        <a href="<?php echo site_url('investigation/allInvestigation'); ?>">
                            <i class="fa fa-angle-right"></i>
                            All Investigation
                        </a>
                    </li>
                    <?php } ?>
                </ul>
            </li>
            <?php } ?>
            
              <?php if(ck_menu("consultancy-menu")){ ?>
            <li id="consultancy-menu">
                <a href="#consultancy" data-toggle="collapse">
                    <i class="fa fa-stethoscope" aria-hidden="true"></i>
                    &nbsp;Consultancy
                    <span class="icon"><i class="fa fa-sort-desc"></i></span>
                </a>
                
                <ul id="consultancy" class="sidebar-nav collapse">
                    <?php if(ck_action("consultancy-menu","add")){ ?>
                        <li>
                            <a href="<?php echo site_url('consultancy/newConsultancy'); ?>">
                                <i class="fa fa-angle-right"></i>
                                New Consultancy
                            </a>
                        </li>
                     <?php } ?>      
                    
                    
                     <?php if(ck_action("consultancy-menu","all")){ ?>
                        <li>
                            <a href="<?php echo site_url('consultancy/allConsultancy'); ?>">
                                <i class="fa fa-angle-right"></i>
                                All Consultancy
                            </a>
                        </li>
                     <?php } ?>      
                    
                     <?php if(ck_action("consultancy-menu","report")){ ?>
                        <li>
                            <a href="<?php echo site_url('consultancy/report'); ?>">
                                <i class="fa fa-angle-right"></i>
                                Report
                            </a>
                        </li>
                     <?php } ?>      
                </ul>
            </li>
          <?php } ?>    
            

            <?php if(ck_menu("diagnosis-menu")){ ?>
            <li id="diagnosis-menu">
                <a href="#diagnosis" data-toggle="collapse">
                    <i class="fa fa-stethoscope" aria-hidden="true"></i>
                    &nbsp;Diagnosis
                    <span class="icon"><i class="fa fa-sort-desc"></i></span>
                </a>

                <ul id="diagnosis" class="sidebar-nav collapse">
                    <?php if(ck_action("diagnosis-menu","add")){ ?>
                    <li>
                        <a href="<?php echo site_url('diagnosis/addNewPatientDiagnosis'); ?>">
                            <i class="fa fa-angle-right"></i>
                            New Diagnosis
                        </a>
                    </li>
                    <?php } ?>
                    
                    <?php if(ck_action("diagnosis-menu","all")){ ?>
                    <li>
                        <a href="<?php echo site_url('diagnosis/allPatientDiagnosis'); ?>">
                            <i class="fa fa-angle-right"></i>
                            All Diagnosis
                        </a>
                    </li>
                    <?php } ?>
                    
                     <?php if(ck_action("diagnosis-menu","due_list")){ ?>
                         <li>
                            <a href="<?php echo site_url('due_list/due_list'); ?>">
                                <i class="fa fa-angle-right"></i>
                                Due Report
                            </a>
                        </li>
                    <?php } ?>
                    
                     <?php if(ck_action("diagnosis-menu","com")){ ?>
                        <li>
                            <a href="<?php echo site_url('diagnosis/referral_commission'); ?>">
                                <i class="fa fa-angle-right"></i>
                                Referral comm
                            </a>
                        </li>
                    <?php } ?>    
                    
                    
                </ul>
            </li>
            <?php } ?>

            <?php if(ck_menu("tests")){ ?>
                <li id="tests">
                    <a href="#t_report" data-toggle="collapse">
                        <i class="fa fa-money" aria-hidden="true"></i>
                        &nbsp; Test Report
                        <span class="icon"><i class="fa fa-sort-desc"></i></span>
                    </a>
    
                    <ul id="t_report" class="sidebar-nav collapse">
                        <?php if(ck_action("tests","add")){ ?>
                            <li>
                                <a href="<?php echo site_url('reports/test'); ?>">
                                    <i class="fa fa-angle-right"></i>
                                    New Test Report
                                </a>
                            </li>
                        <?php }  ?>
                        
                        <?php if(ck_action("tests","list")){ ?>
                            <li>
                                <a href="<?php echo site_url('reports/test/testList'); ?>">
                                    <i class="fa fa-angle-right"></i>
                                    All Test Report
                                </a>
                            </li>
                        <?php }  ?>
                        
                    </ul>
                </li>
            <?php } ?>
            
             <?php if(ck_menu("ultra_test")){ ?>
                  <li id="altra">
                    <a href="#altra_report" data-toggle="collapse">
                        <i class="fa fa-money" aria-hidden="true"></i>
                        &nbsp; Ultra 
                        <span class="icon"><i class="fa fa-sort-desc"></i></span>
                    </a>
    
                    <ul id="altra_report" class="sidebar-nav collapse">
                        <?php if(ck_action("ultra_test","add_ultra")){ ?>
                            <li>
                                <a href="<?php echo site_url('reports/ultra_report'); ?>">
                                    <i class="fa fa-angle-right"></i>
                                    New Report
                                </a>
                            </li>
                        <?php }  ?>    
                        
                        <?php if(ck_action("ultra_test","all_ultra")){ ?>
                            <li>
                                <a href="<?php echo site_url('reports/ultra_report/all'); ?>">
                                    <i class="fa fa-angle-right"></i>
                                    All Report
                                </a>
                            </li>
                        <?php }  ?>    
                    </ul>
                </li>
             <?php } ?>
            
            
            
            
             <?php if(ck_menu("procedure")){ ?>  
                  <li id="procedure">
                    <a href="#t_procedure" data-toggle="collapse">
                        <i class="fa fa-money" aria-hidden="true"></i>
                        &nbsp;Parameter
                        <span class="icon"><i class="fa fa-sort-desc"></i></span>
                    </a>
    
                    <ul id="t_procedure" class="sidebar-nav collapse">
                        
                        <?php if(ck_action("procedure","add")){ ?>
                        <li>
                            <a href="<?php echo site_url('procedure/procedure'); ?>">
                                <i class="fa fa-angle-right"></i>
                                New Parameter
                            </a>
                        </li>
                        <?php } ?>
                        
                        <?php if(ck_action("procedure","list")){ ?>
                            <li>
                                <a href="<?php echo site_url('procedure/procedure/procedureList'); ?>">
                                    <i class="fa fa-angle-right"></i>
                                    All Parameter
                                </a>
                            </li>
                        <?php } ?>
                        
                    </ul>
                </li>
            <?php } ?>
            
            
              <?php if(ck_menu("mixed")){ ?>
                 <li id="mixed">
                    <a href="#mixed_report" data-toggle="collapse">
                        <i class="fa fa-money" aria-hidden="true"></i>
                        &nbsp; Mixed 
                        <span class="icon"><i class="fa fa-sort-desc"></i></span>
                    </a>
    
                    <ul id="mixed_report" class="sidebar-nav collapse">
                        
                        <?php if(ck_action("mixed","saber")){ ?>
                            <li>
                                <a href="<?php echo site_url('reports/mixed_reports'); ?>">
                                    <i class="fa fa-angle-right"></i>
                                    Serological
                                </a>
                            </li>
                        <?php }  ?>    
                        
                        
                        <?php if(ck_action("mixed","biochemical")){ ?>
                            <li>
                                <a href="<?php echo site_url('reports/mixed_reports/biochemical'); ?>">
                                    <i class="fa fa-angle-right"></i>
                                    Biochemical
                                </a>
                            </li>
                        <?php }  ?>    
                        
                        
                        <?php if(ck_action("mixed","cbc")){ ?>
                            <li>
                                <a href="<?php echo site_url('reports/mixed_reports/cbc'); ?>">
                                    <i class="fa fa-angle-right"></i>
                                    CBC
                                </a>
                            </li>
                         <?php }  ?>  
                        
                        <?php if(ck_action("mixed","semen")){ ?>
                            <li>
                                <a href="<?php echo site_url('reports/mixed_reports/semen'); ?>">
                                    <i class="fa fa-angle-right"></i>
                                    Semen
                                </a>
                            </li>
                         <?php }  ?>  
                        
                        <?php if(ck_action("mixed","urine")){ ?>
                            <li>
                                <a href="<?php echo site_url('reports/mixed_reports/urine'); ?>">
                                    <i class="fa fa-angle-right"></i>
                                    Urine
                                </a>
                            </li>
                         <?php }  ?>      
         
                        <?php if(ck_action("mixed","all")){ ?>
                            <li>
                                <a href="<?php echo site_url('reports/mixed_reports/all'); ?>">
                                    <i class="fa fa-angle-right"></i>
                                    All Report
                                </a>
                            </li>
                          <?php }  ?>      
                    </ul>
                </li>
            <?php } ?>
            
            
            
            
            <?php if(ck_menu("cost_menu")){ ?>
            <li id="cost_menu">
                <a href="#cost" data-toggle="collapse">
                    <i class="fa fa-money" aria-hidden="true"></i>
                    &nbsp;Cost
                    <span class="icon"><i class="fa fa-sort-desc"></i></span>
                </a>

                <ul id="cost" class="sidebar-nav collapse">
                    <?php if(ck_action("cost_menu","field")){ ?>
                    <li>
                        <a href="<?php echo site_url('cost/cost'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Field Of Cost
                        </a>
                    </li>
                    <?php } ?>
                    
                    <?php if(ck_action("cost_menu","new")){ ?>
                    <li>
                        <a href="<?php echo site_url('cost/cost/newcost'); ?>">
                            <i class="fa fa-angle-right"></i>
                            New Cost
                        </a>
                    </li>
                    <?php } ?>
                    
                    <?php if(ck_action("cost_menu","all")){ ?>
                    <li>
                        <a href="<?php echo site_url('cost/cost/allcost'); ?>">
                            <i class="fa fa-angle-right"></i>
                            All Cost
                        </a>
                    </li>
                    <?php } ?>
                </ul>
            </li>
            <?php } ?>
            
            <?php if(ck_menu("income_menu")){ ?>
            <li id="income_menu">
                <a href="#income" data-toggle="collapse">
                    <i class="fa fa-money" aria-hidden="true"></i>
                    &nbsp;Income
                    <span class="icon"><i class="fa fa-sort-desc"></i></span>
                </a>

                <ul id="income" class="sidebar-nav collapse">
                    <?php if(ck_action("income_menu","field")){ ?>
                    <li>
                        <a href="<?php echo site_url('income/income'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Field Of Income
                        </a>
                    </li>
                    <?php } ?>
                    
                    <?php if(ck_action("income_menu","new")){ ?>
                    <li>
                        <a href="<?php echo site_url('income/income/newincome'); ?>">
                            <i class="fa fa-angle-right"></i>
                            New Income
                        </a>
                    </li>
                    <?php } ?>
                    
                    <?php if(ck_action("income_menu","all")){ ?>
                    <li>
                        <a href="<?php echo site_url('income/income/allincome'); ?>">
                            <i class="fa fa-angle-right"></i>
                            All Income
                        </a>
                    </li>
                    <?php } ?>
                </ul>
            </li>
            <?php } ?>
            
             <?php if(ck_menu("bank_menu")){ ?>
             <li id="bank_menu">
                <a href="#bank" data-toggle="collapse">
                    <i class="fa fa-university"></i>
                    &nbsp; Banking
                    <span class="icon"><i class="fa fa-sort-desc"></i></span>
                </a>

                <ul id="bank" class="sidebar-nav collapse">
                    
                    <?php if(ck_action("bank_menu","add-bank")){ ?>
                        <li>
                            <a href="<?php echo site_url('bank/bankInfo/add_bank'); ?>">
                                <i class="fa fa-angle-right"></i>
                                 Add Bank
                            </a>
                        </li>
                    <?php } ?>
                    
                    <?php if(ck_action("bank_menu","add-new")){ ?>
                        <li>
                            <a href="<?php echo site_url('bank/bankInfo'); ?>">
                                <i class="fa fa-angle-right"></i>
                                 Add Account
                            </a>
                        </li>
                    <?php } ?>
                    
                    <?php if(ck_action("bank_menu","all-acc")){ ?>
                        <li>
                            <a href="<?php echo site_url('bank/bankInfo/all_account'); ?>">
                                <i class="fa fa-angle-right"></i>
                                 All Account
                            </a>
                        </li>
                    <?php } ?>
                    
                    <?php if(ck_action("bank_menu","add")){ ?>
                        <li>
                            <a href="<?php echo site_url('bank/bankInfo/transaction'); ?>">
                                <i class="fa fa-angle-right"></i>
                                 Add Transaction
                            </a>
                        </li>
                    <?php } ?>    
                    
                    <?php if(ck_action("bank_menu","ledger")){ ?>
                        <li>
                            <a href="<?php echo site_url('bank/bankInfo/ledger'); ?>">
                                <i class="fa fa-angle-right"></i>
                                 Bank Ledger
                            </a>
                        </li>
                    <?php } ?>    
                    
                    <?php if(ck_action("bank_menu","all")){ ?>
                        <li>
                            <a href="<?php  echo site_url('bank/bankInfo/allTransaction'); ?>">
                                <i class="fa fa-angle-right"></i>
                               All Transaction
                            </a>
                        </li>
                    <?php } ?>    
                    

                    <!--li>
                        <a href="<?php // echo site_url('bank/bankInfo/searchViewTransaction'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Search Trnasaction
                        </a>
                    </li-->
                </ul>
            </li>
            
            <?php } ?>
            
            
            
            <?php if(ck_menu("report_menu")){ ?>
            <li id="report_menu">
                <a href="#report" data-toggle="collapse">
                    <i class="fa fa-file" aria-hidden="true"></i>
                    &nbsp;Report
                    <span class="icon"><i class="fa fa-sort-desc"></i></span>
                </a>

                <ul id="report" class="sidebar-nav collapse">
                    <?php if(ck_action("report_menu","cost")){ ?>
                    <li>
                        <a href="<?php echo site_url('report/cost'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Cost
                        </a>
                    </li>
                    <?php } ?>
                    
                    <?php if(ck_action("report_menu","drCom")){ ?>
                    <li>
                        <a href="<?php echo site_url('report/drCom'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Doctor Commission
                        </a>
                    </li>
                    <?php } ?>
                    
                    <?php if(ck_action("report_menu","diagnosis")){ ?>
                    <li>
                        <a href="<?php echo site_url('report/diagnosis'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Diagnosis
                        </a>
                    </li>
                    <?php } ?>
                    
                    <?php if(ck_action("report_menu","patientReport")){ ?>
                    <li>
                        <a href="<?php echo site_url('report/patientReport'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Patient Report
                        </a>
                    </li>
                    <?php } ?>
                     <?php if(ck_action("report_menu","assets")){ ?>
                        <li>
                            <a href="<?php echo site_url('report/assets'); ?>">
                                <i class="fa fa-angle-right"></i>
                                Assets Report
                            </a>
                        </li>
                     <?php } ?>
                    
                    
                </ul>
            </li>
            <?php } ?>
            
            
            
             <?php if(ck_menu("opening_balance_menu")){ ?>
                <li id="opening_balance_menu">
                     <a href="<?php echo site_url('opening_balance/opening_balance'); ?>">
                        <i class="fa fa-calculator" aria-hidden="true"></i>
                        &nbsp; Opening Balance
                    </a>
                </li>
        
            <?php } ?>
            
            
            
            
            
            <?php if(ck_menu("balance_menu")){ ?>
            <li id="balance_menu">
                <a href="<?php echo site_url('balance/balance_report'); ?>">
                    <i class="fa fa-files-o"></i>
                    &nbsp; Balance Sheet
                </a>
            </li>
            <?php } ?>
            
            
            <?php if(ck_menu("employee_menu")){ ?>  
                <li id="employee_menu">
                    <a href="<?php echo site_url('employee/employee/show_employee'); ?>">
                        <i class="fa fa-users"></i>
                        &nbsp; Employee
                    </a>
                </li>
            <?php } ?>    
            
             
             <?php if(ck_menu("salary_menu")){ ?>
                <li id="salary_menu">
                    <a href="<?php echo site_url('salary/payment/all_payment'); ?>">
                        <i class="fa">৳</i>
                        &nbsp; Salary
                    </a>
                </li>
            <?php } ?>        
            
            
            
            
         <?php /*if(ck_menu("reagent_menu")){ ?>
            <li id="reagent_menu">
                <a href="#reagent" data-toggle="collapse">
                    <i class="fa fa-flask" aria-hidden="true"></i>
                    &nbsp;Reagent
                    <span class="icon"><i class="fa fa-sort-desc"></i></span>
                </a>

                <ul id="reagent" class="sidebar-nav collapse">
                    <?php if(ck_action("reagent_menu","add-new")){ ?>
                    <li>
                        <a href="<?php echo site_url('reagent/reagent'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Add New
                        </a>
                    </li>
                    <?php } ?>
                    
                    <?php if(ck_action("reagent_menu","all")){ ?>
                    <li>
                        <a href="<?php echo site_url('reagent/reagent'); ?>">
                            <i class="fa fa-angle-right"></i>
                            View All
                        </a>
                    </li>
                    <?php } ?>
                </ul>
            </li>
            <?php } ?>-->
            
          <!--  <?php if(ck_menu("reagent_stock_menu")){ ?>
            <li id="reagent_stock_menu">
                <a href="#reagent_stock" data-toggle="collapse">
                    <i class="fa fa-database" aria-hidden="true"></i>
                    &nbsp;Stock
                    <span class="icon"><i class="fa fa-sort-desc"></i></span>
                </a>

                <ul id="reagent_stock" class="sidebar-nav collapse">
                    <?php if(ck_action("reagent_stock_menu","add-new")){ ?>
                    <li>
                        <a href="<?php echo site_url('reagent_stock/reagent'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Add Stock
                        </a>
                    </li>
                    <?php } ?>
                    
                    <?php if(ck_action("reagent_stock_menu","outstock")){ ?>
                    <li>
                        <a href="<?php echo site_url('reagent_stock/reagent/outstock'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Out Stock
                        </a>
                    </li>
                    <?php } ?>
                    
                    <?php if(ck_action("reagent_stock_menu","all")){ ?>
                    <li>
                        <a href="<?php echo site_url('reagent_stock/reagent/show'); ?>">
                            <i class="fa fa-angle-right"></i>
                            All Stock
                        </a>
                    </li>
                    <?php } ?>
                </ul>
            </li>
            <?php } */ ?>
            
            
            
            <?php if(ck_menu("sms_menu")){ ?>
                <li id="sms_menu">
                    <a href="#sms" data-toggle="collapse">
                        <i class="fa fa-envelope-o" aria-hidden="true"></i>
                        &nbsp;SMS
                        <span class="icon"><i class="fa fa-sort-desc"></i></span>
                    </a>
    
                    <ul id="sms" class="sidebar-nav collapse">
                        <?php if(ck_action("sms_menu","send-sms")){ ?>
                            <li>
                                <a href="<?php echo site_url('sms/sendSms'); ?>">
                                    <i class="fa fa-angle-right"></i>
                                    Send SMS 
                                </a>
                            </li>
                         <?php } ?>
                        <?php if(ck_action("sms_menu","custom-sms")){ ?>
                            <li>
                                <a href="<?php echo site_url('sms/sendSms/send_custom_sms'); ?>">
                                    <i class="fa fa-angle-right"></i>
                                    Custom SMS
                                </a>
                            </li>
                         <?php } ?>    
                        
                        <?php if(ck_action("sms_menu","sms-report")){ ?>
                            <li>
                                <a href="<?php echo site_url('sms/sendSms/sms_report'); ?>">
                                    <i class="fa fa-angle-right"></i>
                                    SMS Report
                                </a>
                            </li>
                         <?php } ?>    
                    </ul>
                </li>
            <?php } ?>    
            
            <?php if(ck_menu("privilege-menu")){ ?>
            <li id="privilege-menu">
                <a href="<?php echo site_url('privilege/privilege');?>">
                    <i class="fa fa-user-plus"></i>&nbsp;
                    Set Privilege
                </a>
            </li>
            <?php } ?>
            
            <?php if(ck_menu("theme_menu")){ ?>    
            <li id="theme_menu">
                <a href="#theme" data-toggle="collapse">
                    <i class="fa fa-cogs" aria-hidden="true"></i>
                    &nbsp;Setting
                    <span class="icon"><i class="fa fa-sort-desc"></i></span>
                </a>

                <ul id="theme" class="sidebar-nav collapse">
                    <?php if(ck_action("theme_menu","logo")){ ?>
                    <li>
                        <a href="<?php echo site_url('theme/themeSetting'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Change Logo 
                        </a>
                    </li>
                    <?php } ?>
                    
                    <?php if(ck_action("theme_menu","tools")){ ?>
                    <li>
                        <a href="<?php echo site_url('theme/themeSetting/theme_tools'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Change Info
                        </a>
                    </li>
                    <?php } ?>
                </ul>
            </li>
            <?php } ?>
            
            <?php if(ck_menu("backup_menu")){ ?>
            <li id="backup_menu">
                <a href="#backup" data-toggle="collapse">
                    <i class="fa fa-database" aria-hidden="true"></i>
                    &nbsp;Data Backup
                    <span class="icon"><i class="fa fa-sort-desc"></i></span>
                </a>

                <ul id="backup" class="sidebar-nav collapse">
                    <?php if(ck_action("backup_menu","add-new")){ ?>
                    <li>
                        <a href="<?php echo site_url('data_backup'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Export 
                        </a>
                    </li>
                    <?php } ?>
                    
                    <?php if(ck_action("backup_menu","all")){ ?>
                    <li>
                        <a href="<?php echo site_url('data_backup/import_data'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Import
                        </a>
                    </li>
                    <?php } ?>
                </ul>
            </li>
            <?php } ?>
            
        </ul>
    </nav>
</aside>
<!-- /#sidebar-wrapper -->


<!--=================== online offline checker =========================-->
<style>
    .warning {
        height: 100vh;
        background: rgba(255, 255, 255, 0.85);
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
        position: fixed;
        z-index: 99999;
        top: 0;
        left: 0;
        user-select: none;
        color: red;
        font-family: serif;
        display: none;
    }
</style>

<div class="warning">
    <div>
        <h1>YOU'R OFFLINE</h1>
    </div>
</div>
<script>
    navigator.connection.onchange = function () {
        var warning = document.querySelector('.warning');
        if (navigator.onLine) {
            warning.style.display = 'none';
        } else {
            warning.style.display = 'flex';
        }
    }
</script>

<!--=================== End online offline checker =========================-->