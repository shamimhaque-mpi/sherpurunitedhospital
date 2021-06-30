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
            <li id="dashboard">
                <a href="<?php echo site_url('super/dashboard'); ?>">
                    <i class="fa fa-home"></i>
                    &nbsp; Dashboard
                </a>
            </li>
            
            <!--Start a menu seaction-->
            <li id="alltest_menu">
                <a href="#test_submenu" data-toggle="collapse">
                    <i class="fa fa-flask" aria-hidden="true"></i>
                    &nbsp;Test
                    <span class="icon"><i class="fa fa-sort-desc"></i></span>
                </a>

                <ul id="test_submenu" class="sidebar-nav collapse">
                    <li>
                        <a href="<?php echo site_url('alltest/group'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Group
                        </a>
                    </li>
                    
                    <li>
                        <a href="<?php echo site_url('alltest/test'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Test
                        </a>
                    </li>
                    
                    <li>
                        <a href="<?php echo site_url('alltest/parameter'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Parameter
                        </a>
                    </li>
                    
                    <li>
                        <a href="<?php echo site_url('alltest/group_mapping'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Group Mapping
                        </a>
                    </li>
                    
                    <li>
                        <a href="<?php echo site_url('alltest/test_mapping'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Test Mapping
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('alltest/show_mapping'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Show Mapping
                        </a>
                    </li>
                    
                    <li>
                        <a href="<?php echo site_url('alltest/sort/test'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Test Sort
                        </a>
                    </li>
                    
                    <li>
                        <a href="<?php echo site_url('alltest/sort/group'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Group Sort
                        </a>
                    </li>
                    
                    <li>
                        <a href="<?php echo site_url('alltest/sort/parameter'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Parameter Sort
                        </a>
                    </li>
                    
                </ul>
            </li>
            
            <!--Start a menu seaction-->
            <li id="doctor-menu">
                <a href="#doctor" data-toggle="collapse">
                    <i class="fa fa-user-md" aria-hidden="true"></i>
                    &nbsp; Doctors
                    <span class="icon"><i class="fa fa-sort-desc"></i></span>
                </a>

                <ul id="doctor" class="sidebar-nav collapse">
                    <li>
                        <a href="<?php echo site_url('doctor/addNewDoctor'); ?>">
                            <i class="fa fa-angle-right"></i>
                             New doctor
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('doctor/allDoctors'); ?>">
                            <i class="fa fa-angle-right"></i>
                            All Doctors
                        </a>
                    </li>
                    
                    <li>
                        <a href="<?php echo site_url('doctor/payment'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Payment
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('doctor/payment/all'); ?>">
                            <i class="fa fa-angle-right"></i>
                            All Payment
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('doctor/alt_doctor'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Ultra Doctor Payment
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('doctor/alt_doctor/all'); ?>">
                            <i class="fa fa-angle-right"></i>
                            All Ultra Doctor Payment
                        </a>
                    </li>
                    
                    <?php /* ?>
                    <li>
                        <a href="<?php echo site_url('doctor/commission'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Commission
                        </a>
                    </li>
                    
                    <li>
                        <a href="<?php echo site_url('doctor/commissionPayment'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Payment
                        </a>
                    </li>
                    
                    <li>
                        <a href="<?php echo site_url('doctor/commissionDetails'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Commission Details
                        </a>
                    </li>
                <?php */ ?>
                </ul>
            </li>

            <!-- <li id="marketer-menu">
                <a href="<?php // echo site_url('marketer/all'); ?>">
                    <i class="fa fa-user-secret"></i>
                    &nbsp; Reference
                </a>
            </li> -->

            <li id="marketer-menu">
                <a href="#reference" data-toggle="collapse">
                    <i class="fa fa-user-secret"></i>
                    &nbsp;RF/PC
                    <span class="icon"><i class="fa fa-sort-desc"></i></span>
                </a>

                <ul id="reference" class="sidebar-nav collapse">
                    <li>
                        <a href="<?php echo site_url('marketer/add'); ?>">
                            <i class="fa fa-angle-right"></i>
                            New RF/PC
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('marketer/all'); ?>">
                            <i class="fa fa-angle-right"></i>
                            All RF/PC
                        </a>
                    </li>
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
                    
                    <li>
                        <a href="<?php echo site_url('marketer/commission_list'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Commission List
                        </a>
                    </li>
                    
                    <li>
                        <a href="<?php echo site_url('marketer/marketer_commision_collect'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Commission Payment
                        </a>
                    </li>
                    
                    <li>
                        <a href="<?php echo site_url('marketer/marketer_commision_collect/all'); ?>">
                            <i class="fa fa-angle-right"></i>
                            All Payment
                        </a>
                    </li>
                    
                </ul>
            </li>
            <?php /*
            <li id="investigation-menu">
                <a href="#investigation" data-toggle="collapse">
                    <i class="fa fa-search" aria-hidden="true"></i>
                    &nbsp;Test
                    <span class="icon"><i class="fa fa-sort-desc"></i></span>
                </a>

                <ul id="investigation" class="sidebar-nav collapse">
                    <li>
                        <a href="<?php echo site_url('investigation/addInvestigation/group'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Add Group
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('investigation/addInvestigation/test'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Test
                        </a>
                    </li>
                    
                    <li>
                        <a href="<?php echo site_url('investigation/addInvestigation'); ?>">
                            <i class="fa fa-angle-right"></i>
                            New Investigation
                        </a>
                    </li>
                    
                    <li>
                        <a href="<?php echo site_url('investigation/allInvestigation'); ?>">
                            <i class="fa fa-angle-right"></i>
                            All Investigation
                        </a>
                    </li>
                </ul>
            </li>
            */?>
            <!-- <li id="patient-menu">
                <a href="<?php echo site_url('admission/newAdmission'); ?>">
                    <i class="fa fa-users"></i>
                    &nbsp; Patient
                </a>
            </li> -->

            <li id="consultancy-menu">
                <a href="#consultancy" data-toggle="collapse">
                    <i class="fa fa-stethoscope" aria-hidden="true"></i>
                    &nbsp;Consultancy
                    <span class="icon"><i class="fa fa-sort-desc"></i></span>
                </a>
                
                <ul id="consultancy" class="sidebar-nav collapse">
                    <li>
                        <a href="<?php echo site_url('consultancy/newConsultancy'); ?>">
                            <i class="fa fa-angle-right"></i>
                            New Consultancy
                        </a>
                    </li>
                    
                    <li>
                        <a href="<?php echo site_url('consultancy/allConsultancy'); ?>">
                            <i class="fa fa-angle-right"></i>
                            All Consultancy
                        </a>
                    </li>
                    
                    <li>
                        <a href="<?php echo site_url('consultancy/report'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Report
                        </a>
                    </li>
                </ul>
            </li>
            
            
            <li id="diagnosis-menu">
                <a href="#diagnosis" data-toggle="collapse">
                    <i class="fa fa-stethoscope" aria-hidden="true"></i>
                    &nbsp;Diagnosis
                    <span class="icon"><i class="fa fa-sort-desc"></i></span>
                </a>

                <ul id="diagnosis" class="sidebar-nav collapse">
                    <li>
                        <a href="<?php echo site_url('diagnosis/addNewPatientDiagnosis'); ?>">
                            <i class="fa fa-angle-right"></i>
                            New Diagnosis
                        </a>
                    </li>
                    
                    <li>
                        <a href="<?php echo site_url('diagnosis/allPatientDiagnosis'); ?>">
                            <i class="fa fa-angle-right"></i>
                            All Diagnosis
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('due_list/due_list'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Due Report
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('diagnosis/referral_commission'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Referral comm
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('diagnosis/group_wise_diagnosis'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Group Wise Diagnosis
                        </a>
                    </li>

                </ul>
            </li>
            
            <li id="patient_admission_menu">
                <a href="#patient_admission" data-toggle="collapse">
                    <i class="fa fa-stethoscope" aria-hidden="true"></i>
                    &nbsp;Patient Admission
                    <span class="icon"><i class="fa fa-sort-desc"></i></span>
                </a>

                <ul id="patient_admission" class="sidebar-nav collapse">
                    <li>
                        <a href="<?php echo site_url('patient_admission/patient_admission/admit_type'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Admit Type
                        </a>
                    </li>
                    
                    <li>
                        <a href="<?php echo site_url('patient_admission/patient_admission'); ?>">
                            <i class="fa fa-angle-right"></i>
                            patient Admission
                        </a>
                    </li>
                    
                    <li>
                        <a href="<?php echo site_url('patient_admission/patient_admission/all_admission'); ?>">
                            <i class="fa fa-angle-right"></i>
                            All Admission
                        </a>
                    </li>
                    
                    <li>
                        <a href="<?php echo site_url('patient_admission/due_collection/all'); ?>">
                            <i class="fa fa-angle-right"></i>
                            All Collection
                        </a>
                    </li>

                </ul>
            </li>

            <!--Start a menu seaction-->
            <li id="bill_menu">
                <a href="#bill_subMenu" data-toggle="collapse">
                    <i class="fa fa-flask" aria-hidden="true"></i>
                    &nbsp;Bill
                    <span class="icon"><i class="fa fa-sort-desc"></i></span>
                </a>

                <ul id="bill_subMenu" class="sidebar-nav collapse">
                    <li>
                        <a href="<?php echo site_url('bill/bill/add_bill'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Add Bill
                        </a>
                    </li>
                    
                    <li>
                        <a href="<?php echo site_url('bill/bill'); ?>">
                            <i class="fa fa-angle-right"></i>
                            All Bill
                        </a>
                    </li>
                    
                    <li>
                        <a href="<?php echo site_url('bill/items/add'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Add Item
                        </a>
                    </li>
                    
                    <li>
                        <a href="<?php echo site_url('bill/items'); ?>">
                            <i class="fa fa-angle-right"></i>
                            All Item
                        </a>
                    </li>
                </ul>
            </li>

            <!-- <li id="prescription-menu">
                <a href="<?php echo site_url('prescription/prescription'); ?>">
                    <i class="glyphicon glyphicon-list-alt"></i>
                    &nbsp; Prescription
                </a>
            </li>
            
            <li id="test_menu">
                <a href="<?php echo site_url('test/add/all'); ?>">
                    <i class="fa fa-hospital-o"></i>
                    &nbsp; Test Report
                </a>
            </li> -->


            <!-- <li id="test_report">
                <a href="<?php echo site_url('due_list/due_list'); ?>">
                    <i class="fa fa-money"></i>
                    &nbsp; Report Delivery
                </a>
            </li> -->
            
            <!--<li id="procedure">
                <a href="#t_procedure" data-toggle="collapse">
                    <i class="fa fa-money" aria-hidden="true"></i>
                    &nbsp;Parameter
                    <span class="icon"><i class="fa fa-sort-desc"></i></span>
                </a>

                <ul id="t_procedure" class="sidebar-nav collapse">
                    <li>
                        <a href="<?php echo site_url('procedure/procedure'); ?>">
                            <i class="fa fa-angle-right"></i>
                            New Parameter
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('procedure/procedure/procedureList'); ?>">
                            <i class="fa fa-angle-right"></i>
                            All Parameter
                        </a>
                    </li>
                    
                </ul>
            </li>
            -->
            <li id="tests">
                <a href="#t_report" data-toggle="collapse">
                    <i class="fa fa-money" aria-hidden="true"></i>
                    &nbsp; Test Report
                    <span class="icon"><i class="fa fa-sort-desc"></i></span>
                </a>

                <ul id="t_report" class="sidebar-nav collapse">
                    <li>
                        <a href="<?php echo site_url('reports/test'); ?>">
                            <i class="fa fa-angle-right"></i>
                            New Report
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('reports/test/testList'); ?>">
                            <i class="fa fa-angle-right"></i>
                            All Report
                        </a>
                    </li>
                   <!-- <li>
                        <a href="<?php //echo site_url('reports/ultra_report'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Ultra Report
                        </a>
                    </li>
                    <li>
                        <a href="<?php //echo site_url('reports/mixed_reports'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Mixed Report
                        </a>
                    </li>-->
                    
                </ul>
            </li>
            
            <li id="altra">
                <a href="#altra_report" data-toggle="collapse">
                    <i class="fa fa-money" aria-hidden="true"></i>
                    &nbsp; Ultra 
                    <span class="icon"><i class="fa fa-sort-desc"></i></span>
                </a>

                <ul id="altra_report" class="sidebar-nav collapse">
                    <li>
                        <a href="<?php echo site_url('reports/ultra_report'); ?>">
                            <i class="fa fa-angle-right"></i>
                            New Report
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('reports/ultra_report/all'); ?>">
                            <i class="fa fa-angle-right"></i>
                            All Report
                        </a>
                    </li>
                </ul>
            </li>
            
           <!-- <li id="mixed">
                <a href="#mixed_report" data-toggle="collapse">
                    <i class="fa fa-money" aria-hidden="true"></i>
                    &nbsp; Mixed 
                    <span class="icon"><i class="fa fa-sort-desc"></i></span>
                </a>

                <ul id="mixed_report" class="sidebar-nav collapse">
                    <li>
                        <a href="<?php echo site_url('reports/mixed_reports'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Serological
                        </a>
                    </li>
                    
                    <li>
                        <a href="<?php echo site_url('reports/mixed_reports/biochemical'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Biochemical
                        </a>
                    </li>
                    
                    <li>
                        <a href="<?php echo site_url('reports/mixed_reports/cbc'); ?>">
                            <i class="fa fa-angle-right"></i>
                            CBC
                        </a>
                    </li>
                    
                    <li>
                        <a href="<?php echo site_url('reports/mixed_reports/semen'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Semen
                        </a>
                    </li>
                    
                    <li>
                        <a href="<?php echo site_url('reports/mixed_reports/urine'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Urine
                        </a>
                    </li>
     
                    <li>
                        <a href="<?php echo site_url('reports/mixed_reports/all'); ?>">
                            <i class="fa fa-angle-right"></i>
                            All Report
                        </a>
                    </li>
                </ul>
            </li>-->
            
            
            <li id="cost_menu">
                <a href="#cost" data-toggle="collapse">
                    <i class="fa fa-money" aria-hidden="true"></i>
                    &nbsp;Cost
                    <span class="icon"><i class="fa fa-sort-desc"></i></span>
                </a>

                <ul id="cost" class="sidebar-nav collapse">
                    <li>
                        <a href="<?php echo site_url('cost/cost'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Field Of Cost
                        </a>
                    </li>
                    
                    <li>
                        <a href="<?php echo site_url('cost/cost/newcost'); ?>">
                            <i class="fa fa-angle-right"></i>
                            New Cost
                        </a>
                    </li>
                    
                    <li>
                        <a href="<?php echo site_url('cost/cost/allcost'); ?>">
                            <i class="fa fa-angle-right"></i>
                            All Cost
                        </a>
                    </li>
                </ul>
            </li>
            
            <li id="income_menu">
                <a href="#income" data-toggle="collapse">
                    <i class="fa fa-money" aria-hidden="true"></i>
                    &nbsp;Income
                    <span class="icon"><i class="fa fa-sort-desc"></i></span>
                </a>

                <ul id="income" class="sidebar-nav collapse">
                    <li>
                        <a href="<?php echo site_url('income/income'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Field Of Income
                        </a>
                    </li>
                    
                    <li>
                        <a href="<?php echo site_url('income/income/newincome'); ?>">
                            <i class="fa fa-angle-right"></i>
                            New Income
                        </a>
                    </li>
                    
                    <li>
                        <a href="<?php echo site_url('income/income/allincome'); ?>">
                            <i class="fa fa-angle-right"></i>
                            All Income
                        </a>
                    </li>
                </ul>
            </li>
            
            <li id="bank_menu">
                <a href="#bank" data-toggle="collapse">
                    <i class="fa fa-university"></i>
                    &nbsp; Banking
                    <span class="icon"><i class="fa fa-sort-desc"></i></span>
                </a>

                <ul id="bank" class="sidebar-nav collapse">
                    <li>
                        <a href="<?php echo site_url('bank/bankInfo/add_bank'); ?>">
                            <i class="fa fa-angle-right"></i>
                             Add Bank
                        </a>
                    </li>
                    
                    <li>
                        <a href="<?php echo site_url('bank/bankInfo'); ?>">
                            <i class="fa fa-angle-right"></i>
                             Add Account
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('bank/bankInfo/all_account'); ?>">
                            <i class="fa fa-angle-right"></i>
                             All Account
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('bank/bankInfo/transaction'); ?>">
                            <i class="fa fa-angle-right"></i>
                             Add Transaction
                        </a>
                    </li>
                    
                    <li>
                        <a href="<?php echo site_url('bank/bankInfo/ledger'); ?>">
                            <i class="fa fa-angle-right"></i>
                             Bank Ledger
                        </a>
                    </li>
                    
                    <li>
                        <a href="<?php  echo site_url('bank/bankInfo/allTransaction'); ?>">
                            <i class="fa fa-angle-right"></i>
                            All Transaction
                        </a>
                    </li>

                    <!--li>
                        <a href="<?php // echo site_url('bank/bankInfo/searchViewTransaction'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Search Trnasaction
                        </a>
                    </li-->
                </ul>
            </li>
            
            <!--<li id="opening_balance_menu">-->
            <!--    <a href="<?php echo site_url('opening_balance/opening_balance'); ?>">-->
            <!--        <i class="fa fa-calculator" aria-hidden="true"></i>-->
            <!--        &nbsp; Opening Balance-->
            <!--    </a>-->
            <!--</li>-->
            
            
             <!--<li id="balance_menu">
                <a href="<?php echo site_url('balance/balance_report'); ?>">
                    <i class="fa fa-files-o"></i>
                    &nbsp;Balance Sheet
                </a>
            </li>
            -->
            
            
            <!-- 
            <li id="bank_menu">
                <a href="<?php// echo site_url('bank/bankInfo/all_account'); ?>">
                    <i class="fa fa-university"></i>
                    &nbsp; Bank
                </a>
            </li>
            
            <li id="employee_menu">
                <a href="<?php// echo site_url('employee/employee/show_employee'); ?>">
                    <i class="fa fa-users"></i>
                    &nbsp; Employee
                </a>
            </li>
            
            <li id="salary_menu">
                <a href="<?php// echo site_url('salary/payment/all_payment'); ?>">
                    <i class="fa">৳</i>
                    &nbsp; Salary
                </a>
            </li>
            
            <li id="leave_menu">
                <a href="<?php// echo site_url('leave/leave/status'); ?>">
                    <i class="fa fa-male"></i>
                    &nbsp; Employee Leave
                </a>
            </li> 
            -->
            
             <li id="employee_menu">
                <a href="<?php echo site_url('employee/employee/show_employee'); ?>">
                    <i class="fa fa-users"></i>
                    &nbsp; Employee
                </a>
            </li>
            
             <li id="salary_menu">
                <a href="<?php echo site_url('salary/payment/all_payment'); ?>">
                    <i class="fa">৳</i>
                    &nbsp; Salary
                </a>
            </li>
            
            
              <!--<li id="barcode_menu">
                <a href="#barcode" data-toggle="collapse">
                   <i class="fa fa-money"></i>
                        &nbsp; Barcode
                    <span class="icon"><i class="fa fa-sort-desc"></i></span>
                </a>
                <ul id="barcode" class="sidebar-nav collapse">
                    
                    <li>
                        <a href="<?php echo site_url('barcode/barcodeSetting'); ?>">
                            <i class="fa fa-tags" aria-hidden="true" style="font-size: 15px;"></i>
                            Voucher Barcode Setting
                        </a>
                    </li>
                    
                    <li>
                        <a href="<?php echo site_url('barcode/barcodeGenerate'); ?>">
                            <i class="fa fa-tag" aria-hidden="true"></i>
                            Voucher Barcode Print
                        </a>
                    </li>
                    
                    
                    
                     <li>
                        <a href="<?php echo site_url('barcode/barcodeSettingPatient'); ?>">
                            <i class="fa fa-tags" aria-hidden="true" style="font-size: 15px;"></i>
                            Patient Barcode Setting
                        </a>
                    </li>
                    
                    <li>
                        <a href="<?php echo site_url('barcode/barcodeGeneratePatient'); ?>">
                            <i class="fa fa-tag" aria-hidden="true"></i>
                            Patient Barcode Print
                        </a>
                    </li>
                    
                    <!--<li>
                        <a href="<?php echo site_url('barcode/barcodeGenerate/show_purchase'); ?>">
                            <i class="fa fa-tag" aria-hidden="true"></i>
                           Barcode Genarate
                        </a>
                    </li>                    
                    
                    <li>
                        <a href="<?php echo site_url('barcode/barcodeGenerate/purchase_wise'); ?>">
                            <i class="fa fa-tag" aria-hidden="true"></i>
                          Purchase Wise Barcode
                        </a>
                    </li>
                </ul>
            </li>-->
            
            
            
            
            
            
            <li id="report_menu">
                <a href="#report" data-toggle="collapse">
                    <i class="fa fa-file" aria-hidden="true"></i>
                    &nbsp;Report
                    <span class="icon"><i class="fa fa-sort-desc"></i></span>
                </a>

                <ul id="report" class="sidebar-nav collapse">
                    <li>
                        <a href="<?php echo site_url('report/cost'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Cost
                        </a>
                    </li>
                    
                    <li>
                        <a href="<?php echo site_url('report/drCom'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Doctor Commission
                        </a>
                    </li>
                    
                    <li>
                        <a href="<?php echo site_url('report/diagnosis'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Diagnosis
                        </a>
                    </li>
                    
                    <li>
                        <a href="<?php echo site_url('report/patientReport'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Patient Report
                        </a>
                    </li>
                    
                    <li>
                        <a href="<?php echo site_url('report/assets'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Assets Report
                        </a>
                    </li>
                    
                    <li>
                        <a href="<?php echo site_url('balance/balance_report'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Balance Sheet
                        </a>
                    </li>
                    
                    <li>
                        <a href="<?php echo site_url('report/profit_report'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Profit Report
                        </a>
                    </li>
                    
                </ul>
            </li>
            
           
            
            <!--<li id="reagent_menu">-->
            <!--    <a href="#reagent" data-toggle="collapse">-->
            <!--        <i class="fa fa-flask" aria-hidden="true"></i>-->
            <!--        &nbsp;Reagent-->
            <!--        <span class="icon"><i class="fa fa-sort-desc"></i></span>-->
            <!--    </a>-->

            <!--    <ul id="reagent" class="sidebar-nav collapse">-->
            <!--        <li>-->
            <!--            <a href="<?php echo site_url('reagent/reagent'); ?>">-->
            <!--                <i class="fa fa-angle-right"></i>-->
            <!--                Add New-->
            <!--            </a>-->
            <!--        </li>-->
                    
            <!--        <li>-->
            <!--            <a href="<?php echo site_url('reagent/reagent'); ?>">-->
            <!--                <i class="fa fa-angle-right"></i>-->
            <!--                View All-->
            <!--            </a>-->
            <!--        </li>-->
            <!--    </ul>-->
            <!--</li>-->
            
            <!--<li id="reagent_stock_menu">-->
            <!--    <a href="#reagent_stock" data-toggle="collapse">-->
            <!--        <i class="fa fa-database" aria-hidden="true"></i>-->
            <!--        &nbsp;Stock-->
            <!--        <span class="icon"><i class="fa fa-sort-desc"></i></span>-->
            <!--    </a>-->

            <!--    <ul id="reagent_stock" class="sidebar-nav collapse">-->
            <!--        <li>-->
            <!--            <a href="<?php echo site_url('reagent_stock/reagent'); ?>">-->
            <!--                <i class="fa fa-angle-right"></i>-->
            <!--                Add Stock-->
            <!--            </a>-->
            <!--        </li>-->
                    
            <!--        <li>-->
            <!--            <a href="<?php echo site_url('reagent_stock/reagent/outstock'); ?>">-->
            <!--                <i class="fa fa-angle-right"></i>-->
            <!--                Out Stock-->
            <!--            </a>-->
            <!--        </li>-->
                    
            <!--        <li>-->
            <!--            <a href="<?php echo site_url('reagent_stock/reagent/show'); ?>">-->
            <!--                <i class="fa fa-angle-right"></i>-->
            <!--                All Stock-->
            <!--            </a>-->
            <!--        </li>-->
            <!--    </ul>-->
            <!--</li>-->
            
            
            <!-- 
            <li id="brand_menu">
                <a href="<?php //echo site_url('brand/brand');?>">
                    <i class="fa fa-building"></i>&nbsp;
                    Company
                </a>
            </li>
            
            <li id="category_menu">
                <a href="<?php //echo site_url('category/category');?>">
                    <i class="fa fa-user-plus"></i>&nbsp;
                    Category
                </a>
            </li>
            
            <li id="product-menu">
                <a href="<?php //echo site_url('product/product');?>">
                    <i class="fa fa-bars"></i>&nbsp;
                    Products
                </a>
            </li>
            
            <li id="purchase_menu">
                <a href="#purchase" data-toggle="collapse">
                    <i class="fa fa-cart-plus" aria-hidden="true"></i>
                    Purchase
                    <span class="icon"><i class="fa fa-sort-desc"></i></span>
                </a>
        
                <ul id="purchase" class="sidebar-nav collapse">
                    <li>
                        <a href="<?php //echo site_url('purchase/purchase'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Add Purchase
                        </a>
                    </li>
        
                    <li>
                        <a href="<?php //echo site_url('purchase/purchase/show_purchase'); ?>">
                            <i class="fa fa-angle-right"></i>
                           All Purchase
                        </a>
                    </li>
                </ul>
            </li>
            
            <li id="sale_menu">
                <a href="#sale" data-toggle="collapse">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                    Sales
                    <span class="icon"><i class="fa fa-sort-desc"></i></span>
                </a>
        
                <ul id="sale" class="sidebar-nav collapse">
                    <li>
                        <a href="<?php //echo site_url('sale/sale'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Add Sale
                        </a>
                    </li>
        
                    <li>
                        <a href="<?php //echo site_url('sale/saleToday'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Today Sale
                        </a>
                    </li>
        
                    <li>
                        <a href="<?php //echo site_url('sale/searchSale'); ?>">
                            <i class="fa fa-angle-right"></i>
                            All Sale
                        </a>
                    </li>
                </ul>
            </li>
             -->
            
            <!-- <li id="report_menu">
                <a href="<?php //echo site_url('report/daily_report'); ?>">
                    <i class="fa fa-file-text-o"></i>
                    &nbsp; Daily Report
                </a>
            </li> -->
            
            
            
            
            
            <li id="sms_menu">
                <a href="#sms" data-toggle="collapse">
                    <i class="fa fa-envelope-o" aria-hidden="true"></i>
                    &nbsp;SMS
                    <span class="icon"><i class="fa fa-sort-desc"></i></span>
                </a>

                <ul id="sms" class="sidebar-nav collapse">
                    <li>
                        <a href="<?php echo site_url('sms/sendSms'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Send SMS 
                        </a>
                    </li>
                    
                    <li>
                        <a href="<?php echo site_url('sms/sendSms/send_custom_sms'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Custom SMS
                        </a>
                    </li>
                    
                    <li>
                        <a href="<?php echo site_url('sms/sendSms/sms_report'); ?>">
                            <i class="fa fa-angle-right"></i>
                            SMS Report
                        </a>
                    </li>
                </ul>
            </li>
            
            <li id="privilege-menu">
                <a href="<?php echo site_url('privilege/privilege');?>">
                    <i class="fa fa-user-plus"></i>&nbsp;
                    Set Privilege
                </a>
            </li>
                      
            <li id="theme_menu">
                <a href="#theme" data-toggle="collapse">
                    <i class="fa fa-cogs" aria-hidden="true"></i>
                    &nbsp;Setting
                    <span class="icon"><i class="fa fa-sort-desc"></i></span>
                </a>

                <ul id="theme" class="sidebar-nav collapse">
                    <li>
                        <a href="<?php echo site_url('theme/themeSetting'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Change Logo 
                        </a>
                    </li>
                    
                    <li>
                        <a href="<?php echo site_url('theme/themeSetting/theme_tools'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Change Info
                        </a>
                    </li>
                </ul>
            </li>
            
            <li id="backup_menu">
                <a href="#backup" data-toggle="collapse">
                    <i class="fa fa-database" aria-hidden="true"></i>
                    &nbsp;Data Backup
                    <span class="icon"><i class="fa fa-sort-desc"></i></span>
                </a>

                <ul id="backup" class="sidebar-nav collapse">
                    <li>
                        <a href="<?php echo site_url('data_backup'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Export 
                        </a>
                    </li>
                    
                    <!--<li>
                        <a href="<?php echo site_url('data_backup/import_data'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Import
                        </a>
                    </li>-->
                </ul>
            </li>
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
if(typeof navigator.connection !== 'undefined'){
    navigator.connection.onchange = function () {
        var warning = document.querySelector('.warning');
        if (navigator.onLine) {
            warning.style.display = 'none';
        } else {
            warning.style.display = 'flex';
        }
    }
}
</script>

<!--=================== End online offline checker =========================-->