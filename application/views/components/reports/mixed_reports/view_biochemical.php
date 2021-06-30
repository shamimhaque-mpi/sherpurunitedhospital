<style>
    @media print{
        .form-group input.form-control, table.table tr td input.form-control {border: 1px solid transparent;}
        #datetimepicker .input-group-addon {display: none !important;}
        table.table tr td, table.table tr th {padding: 1px 4px !important;}
        .panel-body {padding-bottom: 0 !important;padding-top: 0 !important;}
        .headline {
            text-align: center;
            display:flex;
            justify-content: center;
            align-items: center;
            
        }
        .form-group {margin-bottom: 0 !important;}
        .headline h4 {
            display: inline;
            background: #333 !important;
            color: #fff !important;
            text-transform: uppercase;
            font-weight: bold;
            padding: 5px 25px;
            border-radius: 15px;
        }
        .subtable, .header_table {margin-bottom: 0 !important;}
        .tablewidth {width:130px !important;}
    }
    .tablewidth {width:150px;}
    .mb-3 {margin-bottom: 16px !important;}
    .mb-2 {margin-bottom: 8px !important;}
    .p-0 {padding: 0 !important;}
    .pr-2 {padding-right: 8px !important;}
    .width25 { width:25%; float:left; text-align:center; }
    .width50 { width:20%; float:left; text-align:center; }
    .width75 { width:75%; float:left; text-align:center; }
</style>

<div class="container-fluid">
    <div class="row">

        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panal-header-title">
                    <h1 class="pull-left">Biochemical Exami</h1>
                    <a href="#" class="pull-right" style="margin-top: 0px; font-size: 14px;" onclick="window.print()">
                        <i class="fa fa-print"></i> Print
                    </a>
                </div>
            </div>
            
            <div class="panel-body">
                <!-- Print banner Start Here -->
                <?php $this->load->view('print');
                echo $this->session->flashdata('confirmation');?>
                <form action="<?=site_url('reports/mixed_reports/store')?>" method="post" class="form-horizontal">
                <!-- Table Header Start Here -->
                <table class="table table-bordered header_table">
                    <tr>
                        <th class="text-right" width="200">Lab. No.</th>
                        <td>
                            <span class=" text-center"><?=($patient->lab_no)?></span>
                        </td>
                        <th class="text-right" width="120">Date</th>
                        <td width="200">
                            <span class=" text-center"><?=($patient->date)?></span>
                        </td>
                    </tr>
                    <tr>
                        <th class="text-right">Patient Name</th>
                        <td>
                            <span class=" text-center"><?=($patient->name)?></span>
                        </td>
                        <th class="text-right" width="120">Age</th>
                        <td width="200">
                            <span class=" text-center"><?=($patient->age)?></span>
                        </td>
                    </tr>
                    <tr>
                        <th class="text-right">Refd: BY Dr./Prof.</th>
                        <td colspan="3">
                            <span class=" text-center"><?=($patient->refd_doctor)?></span>
                        </td>
                    </tr>
                    <tr>
                        <th class="text-right">Nature of Examination</th>
                        <td colspan="3">
                            <span class=" text-center"><?=($patient->examination)?></span>
                        </td>
                    </tr>
                </table>
                <!-- Table Header End Here -->
                
                <!-- Table Headline Start Here -->
                <div class="headline">
                    <h4 class="hide text-center" style="margin-top: 10px;">BIOCHEMICAL EXAMI</h4>
                </div>
                <!-- Table Headline End Here -->
                
                <!-- Main Table Start Here -->
                <table class="table table-bordered table1">
                    <tr>
                        <th class="text-center" colspan="3">TEST</th>
                        <th width="150" class="text-center">RESULT</th>
                        <th width="130" class="text-center">UNIT</th>
                        <th width="160" class="text-center">Ref-Range</th>
                    </tr>
                    <tr>
                        <th colspan="3">P. Glucose (Fasting/Random)</th>
                        <td>
                            <span class=" text-center"><?=(isset($tests['P._Glucose_(Fasting/Random)']) ? $tests['P._Glucose_(Fasting/Random)'] : '')?></span>
                        </td>
                        <td class="text-center"> mmo L/L </td>
                        <th class="text-right">
                            F- 4.2 - 6.4, R - < 7.8
                        </th>
                    </tr>
                    <tr>
                        <th colspan="3">Corr. Urine Sugar</th>
                        <td>
                            <span class=" text-center"><?=(isset($tests['Corr._Urine_Sugar']) ? $tests['Corr._Urine_Sugar'] : '')?></span>
                        </td>
                        <td class="text-center"> </td>
                        <th class="text-right">
                            Nil
                        </th>
                    </tr>
                    <tr>
                        <th colspan="3">P. Glucose 2 hr After 75 Gm Glucose/ Breakfast</th>
                        <td>
                            <span class=" text-center"><?=(isset($tests['P._Glucose_2_hr_After_75_Gm_Glucose/_Breakfast']) ? $tests['P._Glucose_2_hr_After_75_Gm_Glucose/_Breakfast'] : '')?></span>
                        </td>
                        <td class="text-center"> mmo L/L </td>
                        <th class="text-right">
                            < 7.8
                        </th>
                    </tr>
                    <tr>
                        <th colspan="3">Gorr. Urine Sugar</th>
                        <td>
                            <span class=" text-center"><?=(isset($tests['Gorr._Urine_Sugar']) ? $tests['Gorr._Urine_Sugar'] : '')?></span>
                        </td>
                        <td class="text-center"> </td>
                        <th class="text-right">
                            Nil
                        </th>
                    </tr>
                    <tr>
                        <th colspan="3">S. Bilirubin (Total)</th>
                        <td>
                            <span class=" text-center"><?=(isset($tests['S._Bilirubin_(Total)']) ? $tests['S._Bilirubin_(Total)'] : '')?></span>
                        </td>
                        <td class="text-center"> mg/dl </td>
                        <th class="text-right">
                            0.4 - 1.2
                        </th>
                    </tr>
                    <tr>
                        <th colspan="3">Direct Bilirubin</th>
                        <td>
                            <span class=" text-center"><?=(isset($tests['Direct_Bilirubin']) ? $tests['Direct_Bilirubin'] : '')?></span>
                        </td>
                        <td class="text-center"> mg/dl </td>
                        <th class="text-right">
                            0.1 - .03
                        </th>
                    </tr>
                    <tr>
                        <th colspan="3">Indirect Bilirubin</th>
                        <td>
                            <span class=" text-center"><?=(isset($tests['Indirect_Bilirubin']) ? $tests['Indirect_Bilirubin'] : '')?></span>
                        </td>
                        <td class="text-center"> mg/dl </td>
                        <th class="text-right">
                            0.2 - 0.7
                        </th>
                    </tr>
                    <tr>
                        <th colspan="3">S. AST (SGOT)</th>
                        <td>
                            <span class=" text-center"><?=(isset($tests['S._AST_(SGOT)']) ? $tests['S._AST_(SGOT)'] : '')?></span>
                        </td>
                        <td class="text-center"> U/L </td>
                        <th class="text-right">
                            Upto 37
                        </th>
                    </tr>
                    <tr>
                        <th colspan="3">S. ALT (SGPT)</th>
                        <td>
                            <span class=" text-center"><?=(isset($tests['S._ALT_(SGPT)']) ? $tests['S._ALT_(SGPT)'] : '')?></span>
                        </td>
                        <td class="text-center"> U/L </td>
                        <th class="text-right">
                            Upto 40
                        </th>
                    </tr>
                    <tr>
                        <th colspan="3">S. Alk Phosphatase</th>
                        <td>
                            <span class=" text-center"><?=(isset($tests['S._Alk_Phosphatase']) ? $tests['S._Alk_Phosphatase'] : '')?></span>
                        </td>
                        <td class="text-center"> U/L </td>
                        <th class="text-right"> Adult : 306 </th>
                    </tr>
                    <tr>
                        <th class="tablewidth">
                            LIPID <br />
                            PROFILE
                        </th>
                        <td colspan="5">
                            <!-- SubTable Start Here -->
                            <table class="table table-bordered subtable">
                                <tr>
                                    <th>S. Cholesterol</th>
                                    <td width="150">
                                        <span class=" text-center"><?=(isset($tests['S._Cholesterol']) ? $tests['S._Cholesterol'] : '')?></span>
                                    </td>
                                    <td width="130" class="text-center"> mg/dl </td>
                                    <th width="155" class="text-right"> Upto 200 </th>
                                </tr>
                                <tr>
                                    <th>S. HDL Cholesterol</th>
                                    <td width="150">
                                        <span class=" text-center"><?=(isset($tests['S._HDL_Cholesterol']) ? $tests['S._HDL_Cholesterol'] : '')?></span>
                                    </td>
                                    <td width="130" class="text-center"> mg/dl </td>
                                    <th width="155" class="text-right"> 30-70 </th>
                                </tr>
                                <tr>
                                    <th>S. LDL Cholesterol</th>
                                    <td width="150">
                                        <span class=" text-center"><?=(isset($tests['S._LDL_Cholesterol']) ? $tests['S._LDL_Cholesterol'] : '')?></span>
                                    </td>
                                    <td width="130" class="text-center"> md/dl </td>
                                    <th width="155" class="text-right">
                                        150
                                    </th>
                                </tr>
                                <tr>
                                    <th>S. Triglyceride</th>
                                    <td width="150">
                                        <span class=" text-center"><?=(isset($tests['S._Triglyceride']) ? $tests['S._Triglyceride'] : '')?></span>
                                    </td>
                                    <td width="130" class="text-center"> mg/dl </td>
                                    <th width="155" class="text-right"> 50-150 </th>
                                </tr>
                            </table>
                            <!-- SubTable End Here -->
                        </td>
                    </tr>
                    <tr>
                        <th colspan="3">S. Urea</th>
                        <td>
                            <span class=" text-center"><?=(isset($tests['S._Urea']) ? $tests['S._Urea'] : '')?></span>
                        </td>
                        <td class="text-center"> mg/dl </td>
                        <th class="text-right">
                            10-50
                        </th>
                    </tr>
                    <tr>
                        <th colspan="3">S. Creatinine</th>
                        <td>
                            <span class=" text-center"><?=(isset($tests['S._Creatinine']) ? $tests['S._Creatinine'] : '')?></span>
                        </td>
                        <td class="text-center"> mg/dl </td>
                        <th class="text-right">
                            0.6 - 1.4
                        </th>
                    </tr>
                    <tr>
                        <th colspan="3">S. Uric Acid</th>
                        <td>
                            <span class=" text-center"><?=(isset($tests['S._Uric_Acid']) ? $tests['S._Uric_Acid'] : '')?></span>
                        </td>
                        <td class="text-center"> mg/dl </td>
                        <th class="text-right">
                            M: 3.4-8.0, F: 2.4-6.0
                        </th>
                    </tr>
                    <tr>
                        <th colspan="3">S. Total Protein</th>
                        <td>
                            <span class=" text-center"><?=(isset($tests['S._Total_Protein']) ? $tests['S._Total_Protein'] : '')?></span>
                        </td>
                        <td class="text-center"> mg/dl </td>
                        <th class="text-right">
                            63-82
                        </th>
                    </tr>
                    <tr>
                        <th colspan="3">S. Albumin</th>
                        <td>
                            <span class=" text-center"><?=(isset($tests['S._Albumin']) ? $tests['S._Albumin'] : '')?></span>
                        </td>
                        <td class="text-center"> mg/dl </td>
                        <th class="text-right">
                            35-57
                        </th>
                    </tr>
                    <tr>
                        <th colspan="3">S. Globulin</th>
                        <td>
                            <span class=" text-center"><?=(isset($tests['S._Globulin']) ? $tests['S._Globulin'] : '')?></span>
                        </td>
                        <td class="text-center"> mg/dl </td>
                        <th class="text-right">
                            16-35
                        </th>
                    </tr>
                    <tr>
                        <th colspan="3">A/G Ratio</th>
                        <td>
                            <span class=" text-center"><?=(isset($tests['A/G_Ratio']) ? $tests['A/G_Ratio'] : '')?></span>
                        </td>
                        <td class="text-center">  </td>
                        <th class="text-right">
                            2.5 : 1 - 1 - 2 : 1
                        </th>
                    </tr>
                    <tr>
                        <th colspan="3">S. Calcium</th>
                        <td>
                            <span class=" text-center"><?=(isset($tests['S._Calcium']) ? $tests['S._Calcium'] : '')?></span>
                        </td>
                        <td class="text-center"> mg/dl </td>
                        <th class="text-right">
                            8.5 - 10.5
                        </th>
                    </tr>
                    <tr>
                        <th colspan="3">S. Phosphorus (Inorganic)</th>
                        <td>
                            <span class=" text-center"><?=(isset($tests['S._Phosphorus_(Inorganic)']) ? $tests['S._Phosphorus_(Inorganic)'] : '')?></span>
                        </td>
                        <td class="text-center"> mg/dl </td>
                        <th class="text-right">
                            A - 2.5 - 5.0C - 4.0 - 0
                        </th>
                    </tr>
                    <tr>
                        <th colspan="3">CK-MB</th>
                        <td>
                            <span class=" text-center"><?=(isset($tests['CK-MB']) ? $tests['CK-MB'] : '')?></span>
                        </td>
                        <td class="text-center"> U/L </td>
                        <th class="text-right">
                            Upto 25
                        </th>
                    </tr>
                    <tr>
                        <th colspan="3">CK-(Total)</th>
                        <td>
                            <span class=" text-center"><?=(isset($tests['CK-(Total)']) ? $tests['CK-(Total)'] : '')?></span>
                        </td>
                        <td class="text-center"> U/L </td>
                        <th class="text-right">
                            Upto 190
                        </th>
                    </tr>
                    <tr>
                        <th colspan="3">S. Amylase</th>
                        <td>
                            <span class=" text-center"><?=(isset($tests['S._Amylase']) ? $tests['S._Amylase'] : '')?></span>
                        </td>
                        <td class="text-center"> U/L </td>
                        <th class="text-right">
                            Upto 220
                        </th>
                    </tr>
                    <tr>
                        <th colspan="3">S. Lipase</th>
                        <td>
                            <span class=" text-center"><?=(isset($tests['S._Lipase']) ? $tests['S._Lipase'] : '')?></span>
                        </td>
                        <td class="text-center"> U/L </td>
                        <th class="text-right">
                            Upto 56 - 239
                        </th>
                    </tr>
                    <tr>
                        <th colspan="3">S. Lactate dehydrogenase (LDH) Total</th>
                        <td>
                            <span class=" text-center"><?=(isset($tests['S._Lactate_dehydrogenase_(LDH)_Total']) ? $tests['S._Lactate_dehydrogenase_(LDH)_Total'] : '')?></span>
                        </td>
                        <td class="text-center"> U/L </td>
                        <th class="text-right">
                            Upto 450
                        </th>
                    </tr>
                    <tr>
                        <th colspan="3">S. Acid phosphatase (Total)</th>
                        <td>
                            <span class=" text-center"><?=(isset($tests['S._Acid_phosphatase_(Total)']) ? $tests['S._Acid_phosphatase_(Total)'] : '')?></span>
                        </td>
                        <td class="text-center"> U/L </td>
                        <th class="text-right">
                            M - Upto 4.7, F - 3.7
                        </th>
                    </tr>
                    <tr>
                        <th colspan="3">OTHERS</th>
                        <td>
                            <span class=" text-center"><?=(isset($tests['OTHERS']) ? $tests['OTHERS'] : '')?></span>
                        </td>
                        <td class="text-center">  </td>
                        <th class="text-right">
                            
                        </th>
                    </tr>
                </table>
                <!-- Main Table Start Here -->
                <!-- signature style Start Here -->
                <div class="row">
                    <div class="signature">
                        <div class="col-sm-9 col-xs-8">
                            
                        </div>
                        <div class="col-sm-3 col-xs-4">
                            <h4 style="margin-top: 80px;" class="text-center print-font">
                                ------------------------------ <br>
                                signature
                            </h4>
                        </div>
                    </div>
                </div>
                <!-- signature style End Here -->
                </form>
            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>
<script>
    let table1 = Object.values(document.querySelectorAll('.table1 span'));
    let subtable = Object.values(document.querySelectorAll('.subtable span'));
    
    table1.forEach((x)=>{
        if((x.innerText).length==0){
            x.closest('tr').classList.add('none');
        }
    });
    
    let isEmpty = true;
    subtable.forEach((x)=>{
        if((x.innerText).length==0){
            x.closest('tr').classList.add('none');
        }else{
            isEmpty = false;
        }
    });
    if(isEmpty){
        document.querySelector('.subtable').closest('tr').classList.add('none');
    }
    
</script>

