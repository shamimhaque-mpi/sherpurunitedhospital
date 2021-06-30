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
                        <th class="" width="200">Lab. No.</th>
                        <td>
                            <input type="text" name="patient[lab_no]" class="none form-control input_data" placeholder="Enter Patient Lab No." value="">
                            <span class="hide text-center"></span>
                        </td>
                        <th class="" width="120">Date</th>
                        <td width="200">
                            <input type="date" name="patient[date]" class="none form-control input_data" placeholder="Date" value="">
                            <span class="hide text-center"></span>
                        </td>
                    </tr>
                    <tr>
                        <th class="">Patient Name</th>
                        <td>
                            <input type="text" name="patient[name]" class="none form-control input_data" placeholder="Enter Patient Name" value="">
                            <span class="hide text-center"></span>
                        </td>
                        <th class="" width="120">Age</th>
                        <td width="200">
                            <input type="text" name="patient[age]" class="none form-control input_data" placeholder="Enter Patient Age" value="">
                            <span class="hide text-center"></span>
                        </td>
                    </tr>
                    <tr>
                        <th class="">Refd: BY Dr./Prof.</th>
                        <td colspan="3">
                            <input type="text" name="patient[refd_doctor]" class="none form-control input_data" placeholder="Enter Patient Dr/Prof Name" value="">
                            <span class="hide text-center"></span>
                        </td>
                    </tr>
                    <tr>
                        <th class="">Nature of Examination</th>
                        <td colspan="3">
                            <input type="text" name="patient[examination]" class="none form-control input_data" placeholder="Enter Patient Dr/Prof Name" value="">
                            <span class="hide text-center"></span>
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
                <table class="table table-bordered">
                    <tr>
                        <td width="40" class="text-center none">
                            <input type="checkbox" class="checked_all" value="all" >
                        </td>
                        <th class="text-center" colspan="3">TEST</th>
                        <th width="150" class="text-center">RESULT</th>
                        <th width="130" class="text-center">UNIT</th>
                        <th width="160" class="text-center">Ref-Range</th>
                    </tr>
                    <tr>
                        <td class="text-center none"><input type="checkbox" name="test[Fasting]" class="chackbox" value="P._Glucose_(Fasting/Random)" ></td>
                        <th colspan="3">P. Glucose (Fasting/Random)</th>
                        <td>
                            <input type="text" name="result[Fasting]" class="none form-control input_data" placeholder="" value="">
                            <span class="hide text-center"></span>
                        </td>
                        <td class="text-center"> mmo L/L </td>
                        <th class="text-right">
                            F- 4.2 - 6.4, R - < 7.8
                        </th>
                    </tr>
                    <tr>
                        <td class="text-center none"><input type="checkbox" class="chackbox" name="test[Corr]" value="Corr._Urine_Sugar" ></td>
                        <th colspan="3">Corr. Urine Sugar</th>
                        <td>
                            <input type="text" name="result[Corr]" class="none form-control input_data" placeholder="" value="">
                            <span class="hide text-center"></span>
                        </td>
                        <td class="text-center"> </td>
                        <th class="text-right">
                            Nil
                        </th>
                    </tr>
                    <tr>
                        <td class="text-center none"><input type="checkbox" class="chackbox" name="test[Break]" value="P._Glucose_2_hr_After_75_Gm_Glucose/_Breakfast" ></td>
                        <th colspan="3">P. Glucose 2 hr After 75 Gm Glucose/ Breakfast</th>
                        <td>
                            <input type="text" name="result[Break]" class="none form-control input_data" placeholder="" value="">
                            <span class="hide text-center"></span>
                        </td>
                        <td class="text-center"> mmo L/L </td>
                        <th class="text-right">
                            < 7.8
                        </th>
                    </tr>
                    <tr>
                        <td class="text-center none"><input type="checkbox" name="test[Sugar]" class="chackbox" value="Gorr._Urine_Sugar" ></td>
                        <th colspan="3">Gorr. Urine Sugar</th>
                        <td>
                            <input type="text" name="result[Sugar]" class="none form-control input_data" placeholder="" value="">
                            <span class="hide text-center"></span>
                        </td>
                        <td class="text-center"> </td>
                        <th class="text-right">
                            Nil
                        </th>
                    </tr>
                    <tr>
                        <td class="text-center none"><input type="checkbox" name="test[Biliru]" class="chackbox" value="S._Bilirubin_(Total)" ></td>
                        <th colspan="3">S. Bilirubin (Total)</th>
                        <td>
                            <input type="text" name="result[Biliru]" class="none form-control input_data" placeholder="" value="">
                            <span class="hide text-center"></span>
                        </td>
                        <td class="text-center"> mg/dl </td>
                        <th class="text-right">
                            0.4 - 1.2
                        </th>
                    </tr>
                    <tr>
                        <td class="text-center none"><input type="checkbox" name="test[Direct]" class="chackbox" value="Direct_Bilirubin" ></td>
                        <th colspan="3">Direct Bilirubin</th>
                        <td>
                            <input type="text" name="result[Direct]" class="none form-control input_data" placeholder="" value="">
                            <span class="hide text-center"></span>
                        </td>
                        <td class="text-center"> mg/dl </td>
                        <th class="text-right">
                            0.1 - .03
                        </th>
                    </tr>
                    <tr>
                        <td class="text-center none"><input type="checkbox" name="test[Indirect]" class="chackbox" value="Indirect_Bilirubin" ></td>
                        <th colspan="3">Indirect Bilirubin</th>
                        <td>
                            <input type="text" name="result[Indirect]" class="none form-control input_data" placeholder="" value="">
                            <span class="hide text-center"></span>
                        </td>
                        <td class="text-center"> mg/dl </td>
                        <th class="text-right">
                            0.2 - 0.7
                        </th>
                    </tr>
                    <tr>
                        <td class="text-center none"><input type="checkbox" name="test[SGOT]" class="chackbox" value="S._AST_(SGOT)" ></td>
                        <th colspan="3">S. AST (SGOT)</th>
                        <td>
                            <input type="text" name="result[SGOT]" class="none form-control input_data" placeholder="" value="">
                            <span class="hide text-center"></span>
                        </td>
                        <td class="text-center"> U/L </td>
                        <th class="text-right">
                            Upto 37
                        </th>
                    </tr>
                    <tr>
                        <td class="text-center none"><input type="checkbox" name="test[ALT]" class="chackbox" value="S._ALT_(SGPT)" ></td>
                        <th colspan="3">S. ALT (SGPT)</th>
                        <td>
                            <input type="text" name="result[ALT]" class="none form-control input_data" placeholder="" value="">
                            <span class="hide text-center"></span>
                        </td>
                        <td class="text-center"> U/L </td>
                        <th class="text-right">
                            Upto 40
                        </th>
                    </tr>
                    <tr>
                        <td class="text-center none"><input type="checkbox" name="test[Phosphatase]" class="chackbox" value="S._Alk_Phosphatase" ></td>
                        <th colspan="3">S. Alk Phosphatase</th>
                        <td>
                            <input type="text" name="result[Phosphatase]" class="none form-control input_data" placeholder="" value="">
                            <span class="hide text-center"></span>
                        </td>
                        <td class="text-center"> U/L </td>
                        <th class="text-right"> Adult : 306 </th>
                    </tr>
                    <tr>
                        <td class="text-center none"><input type="checkbox" class="sub_option" value="" ></td>
                        <th class="tablewidth">
                            LIPID <br />
                            PROFILE
                        </th>
                        <td colspan="5">
                            <!-- SubTable Start Here -->
                            <table class="table table-bordered subtable">
                                <tr>
                                    <th>
                                        <label for="11.1">
                                            <input type="checkbox" id="11.1" name="test[Cholest]" class="none chackbox01" value="S._Cholesterol" >
                                            &nbsp;S. Cholesterol
                                        </label>
                                    </th>
                                    <td width="150">
                                        <input type="text" name="result[Cholest]" class="none form-control input_data" placeholder="" value="">
                                        <span class="hide text-center"></span>
                                    </td>
                                    <td width="130" class="text-center"> mg/dl </td>
                                    <th width="155" class="text-right"> Upto 200 </th>
                                </tr>
                                <tr>
                                    <th>
                                        <label for="11.2">
                                            <input type="checkbox" id="11.2" name="test[HDL]" class="none chackbox01" value="S._HDL_Cholesterol" >
                                            &nbsp;S. HDL Cholesterol
                                        </label>
                                    </th>
                                    <td width="150">
                                        <input type="text" name="result[HDL]" class="none form-control input_data" placeholder="" value="">
                                        <span class="hide text-center"></span>
                                    </td>
                                    <td width="130" class="text-center"> mg/dl </td>
                                    <th width="155" class="text-right"> 30-70 </th>
                                </tr>
                                <tr>
                                    <th>
                                        <label for="11.3">
                                            <input type="checkbox" id="11.3" class="none chackbox01" name="test[LDL]" value="S._LDL_Cholesterol" >
                                            &nbsp;S. LDL Cholesterol
                                        </label>
                                    </th>
                                    <td width="150">
                                        <input type="text" name="result[LDL]" class="none form-control input_data" placeholder="" value="">
                                        <span class="hide text-center"></span>
                                    </td>
                                    <td width="130" class="text-center"> md/dl </td>
                                    <th width="155" class="text-right">
                                        150
                                    </th>
                                </tr>
                                <tr>
                                    <th>
                                        <label for="11.4">
                                            <input type="checkbox" id="11.4" class="none chackbox01" name="test[Trigly]" value="S._Triglyceride" >
                                            &nbsp;S. Triglyceride
                                        </label>
                                    </th>
                                    <td width="150">
                                        <input type="text" name="result[Trigly]" class="none form-control input_data" placeholder="" value="">
                                        <span class="hide text-center"></span>
                                    </td>
                                    <td width="130" class="text-center"> mg/dl </td>
                                    <th width="155" class="text-right"> 50-150 </th>
                                </tr>
                            </table>
                            <!-- SubTable End Here -->
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center none"><input type="checkbox" class="chackbox" name="test[Urea]" value="S._Urea" ></td>
                        <th colspan="3">S. Urea</th>
                        <td>
                            <input type="text" name="result[Urea]" class="none form-control input_data" placeholder="" value="">
                            <span class="hide text-center"></span>
                        </td>
                        <td class="text-center"> mg/dl </td>
                        <th class="text-right">
                            10-50
                        </th>
                    </tr>
                    <tr>
                        <td class="text-center none"><input type="checkbox" class="chackbox" name="test[Creat]" value="S._Creatinine" ></td>
                        <th colspan="3">S. Creatinine</th>
                        <td>
                            <input type="text" name="result[Creat]" class="none form-control input_data" placeholder="" value="">
                            <span class="hide text-center"></span>
                        </td>
                        <td class="text-center"> mg/dl </td>
                        <th class="text-right">
                            0.6 - 1.4
                        </th>
                    </tr>
                    <tr>
                        <td class="text-center none"><input type="checkbox" class="chackbox" name="test[Acid]" value="S._Uric_Acid" ></td>
                        <th colspan="3">S. Uric Acid</th>
                        <td>
                            <input type="text" name="result[Acid]" class="none form-control input_data" placeholder="" value="">
                            <span class="hide text-center"></span>
                        </td>
                        <td class="text-center"> mg/dl </td>
                        <th class="text-right">
                            M: 3.4-8.0, F: 2.4-6.0
                        </th>
                    </tr>
                    <tr>
                        <td class="text-center none"><input type="checkbox" class="chackbox" name="test[Protein]" value="S._Total_Protein" ></td>
                        <th colspan="3">S. Total Protein</th>
                        <td>
                            <input type="text" name="result[Protein]" class="none form-control input_data" placeholder="" value="">
                            <span class="hide text-center"></span>
                        </td>
                        <td class="text-center"> mg/dl </td>
                        <th class="text-right">
                            63-82
                        </th>
                    </tr>
                    <tr>
                        <td class="text-center none"><input type="checkbox" class="chackbox" name="test[Albumin]" value="S._Albumin" ></td>
                        <th colspan="3">S. Albumin</th>
                        <td>
                            <input type="text" name="result[Albumin]" class="none form-control input_data" placeholder="" value="">
                            <span class="hide text-center"></span>
                        </td>
                        <td class="text-center"> mg/dl </td>
                        <th class="text-right">
                            35-57
                        </th>
                    </tr>
                    <tr>
                        <td class="text-center none"><input type="checkbox" class="chackbox" name="test[Globulin]" value="S._Globulin" ></td>
                        <th colspan="3">S. Globulin</th>
                        <td>
                            <input type="text" name="result[Globulin]" class="none form-control input_data" placeholder="" value="">
                            <span class="hide text-center"></span>
                        </td>
                        <td class="text-center"> mg/dl </td>
                        <th class="text-right">
                            16-35
                        </th>
                    </tr>
                    <tr>
                        <td class="text-center none"><input type="checkbox" class="chackbox" name="test[Ratio]" value="A/G_Ratio" ></td>
                        <th colspan="3">A/G Ratio</th>
                        <td>
                            <input type="text" name="result[Ratio]" class="none form-control input_data" placeholder="" value="">
                            <span class="hide text-center"></span>
                        </td>
                        <td class="text-center">  </td>
                        <th class="text-right">
                            2.5 : 1 - 1 - 2 : 1
                        </th>
                    </tr>
                    <tr>
                        <td class="text-center none"><input type="checkbox" class="chackbox" name="test[Calcium]" value="S._Calcium" ></td>
                        <th colspan="3">S. Calcium</th>
                        <td>
                            <input type="text" name="result[Calcium]" class="none form-control input_data" placeholder="" value="">
                            <span class="hide text-center"></span>
                        </td>
                        <td class="text-center"> mg/dl </td>
                        <th class="text-right">
                            8.5 - 10.5
                        </th>
                    </tr>
                    <tr>
                        <td class="text-center none"><input type="checkbox" class="chackbox" name="test[Inorganic]" value="S._Phosphorus_(Inorganic)" ></td>
                        <th colspan="3">S. Phosphorus (Inorganic)</th>
                        <td>
                            <input type="text" name="result[Inorganic]" class="none form-control input_data" placeholder="" value="">
                            <span class="hide text-center"></span>
                        </td>
                        <td class="text-center"> mg/dl </td>
                        <th class="text-right">
                            A - 2.5 - 5.0C - 4.0 - 0
                        </th>
                    </tr>
                    <tr>
                        <td class="text-center none"><input type="checkbox" class="chackbox" name="test[CK-MB]" value="CK-MB" ></td>
                        <th colspan="3">CK-MB</th>
                        <td>
                            <input type="text" name="result[CK-MB]" class="none form-control input_data" placeholder="" value="">
                            <span class="hide text-center"></span>
                        </td>
                        <td class="text-center"> U/L </td>
                        <th class="text-right">
                            Upto 25
                        </th>
                    </tr>
                    <tr>
                        <td class="text-center none"><input type="checkbox" class="chackbox" name="test[CK-]" value="CK-(Total)" ></td>
                        <th colspan="3">CK-(Total)</th>
                        <td>
                            <input type="text" name="result[CK-]" class="none form-control input_data" placeholder="" value="">
                            <span class="hide text-center"></span>
                        </td>
                        <td class="text-center"> U/L </td>
                        <th class="text-right">
                            Upto 190
                        </th>
                    </tr>
                    <tr>
                        <td class="text-center none"><input type="checkbox" class="chackbox" name="test[Amylase]" value="S._Amylase" ></td>
                        <th colspan="3">S. Amylase</th>
                        <td>
                            <input type="text" name="result[Amylase]" class="none form-control input_data" placeholder="" value="">
                            <span class="hide text-center"></span>
                        </td>
                        <td class="text-center"> U/L </td>
                        <th class="text-right">
                            Upto 220
                        </th>
                    </tr>
                    <tr>
                        <td class="text-center none"><input type="checkbox" class="chackbox" name="test[Lipase]" value="S._Lipase" ></td>
                        <th colspan="3">S. Lipase</th>
                        <td>
                            <input type="text" name="result[Lipase]" class="none form-control input_data" placeholder="" value="">
                            <span class="hide text-center"></span>
                        </td>
                        <td class="text-center"> U/L </td>
                        <th class="text-right">
                            Upto 56 - 239
                        </th>
                    </tr>
                    <tr>
                        <td class="text-center none"><input type="checkbox" class="chackbox" name="test[Lactate]" value="S._Lactate_dehydrogenase_(LDH)_Total" ></td>
                        <th colspan="3">S. Lactate dehydrogenase (LDH) Total</th>
                        <td>
                            <input type="text" name="result[Lactate]" class="none form-control input_data" placeholder="" value="">
                            <span class="hide text-center"></span>
                        </td>
                        <td class="text-center"> U/L </td>
                        <th class="text-right">
                            Upto 450
                        </th>
                    </tr>
                    <tr>
                        <td class="text-center none"><input type="checkbox" class="chackbox" name="test[phospha]" value="S._Acid_phosphatase_(Total)" ></td>
                        <th colspan="3">S. Acid phosphatase (Total)</th>
                        <td>
                            <input type="text" name="result[phospha]" class="none form-control input_data" placeholder="" value="">
                            <span class="hide text-center"></span>
                        </td>
                        <td class="text-center"> U/L </td>
                        <th class="text-right">
                            M - Upto 4.7, F - 3.7
                        </th>
                    </tr>
                    <tr>
                        <td class="text-center none"><input type="checkbox" class="chackbox" name="test[OTHERS]" value="OTHERS" ></td>
                        <th colspan="3">OTHERS</th>
                        <td>
                            <input type="text" name="result[OTHERS]" class="none form-control input_data" placeholder="" value="">
                            <span class="hide text-center"></span>
                        </td>
                        <td class="text-center">  </td>
                        <th class="text-right">
                            
                        </th>
                    </tr>
                </table>
                <div class="col-xs-12">
                    <div class="btn-group pull-right none">
                        <input type="hidden" name="patient[type]" value="biochemical">
                        <input type="submit" value="Submit" class="btn btn-success">
                    </div>
                </div>
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
    window.addEventListener('load', ()=>{
        let chackbox = document.querySelectorAll('.chackbox');
        (Object.values(chackbox)).forEach((x)=>{
            x.closest('tr').classList.add('none')
            x.addEventListener('click', ()=>{
                if(x.checked==false){
                    x.closest('tr').classList.add('none');
                }
                else{
                   x.closest('tr').classList.remove('none'); 
                }
            });
        });
        
        let input_data = document.querySelectorAll('.input_data');
        (Object.values(input_data)).forEach((x)=>{
            x.addEventListener('input', ()=>{
                (x.nextElementSibling).innerText = x.value;
            });
        });
        
        let sub_option = document.querySelector('.sub_option');
        let checkbox01 = document.querySelectorAll('.chackbox01');
        
        (Object.values(checkbox01)).forEach((x)=>{
            x.closest('tr').classList.add('none');
            // x.closest('tr').classList.closest('tr').classList.add('none');
            var p_tr = x.closest('tr').parentElement.closest('tr');
            (p_tr ? p_tr.classList.add('none') : '')
            x.addEventListener('click', ()=>{
                if(x.checked == true){
                    x.closest('tr').classList.remove('none');
                }else{
                    x.closest('tr').classList.add('none');
                }
                var table = false;
                (Object.values(checkbox01)).forEach((x)=>{
                    if(x.checked==true){
                        table = true;
                    }
                });
                if(table){
                    (p_tr ? p_tr.classList.remove('none') : '')
                }
                else{
                    (p_tr ? p_tr.classList.add('none') : '')
                }
            });
        });
        
        if(sub_option){
            sub_option.addEventListener('click', ()=>{
                (Object.values(checkbox01)).forEach((x)=>{
                    if(sub_option.checked == true){
                        x.checked = true;
                        x.closest('tr').classList.remove('none');
                        sub_option.closest('tr').classList.remove('none');
                    }else{
                        x.checked = false;
                        x.closest('tr').classList.add('none');
                        sub_option.closest('tr').classList.add('none');
                    }
                });
            });
        }
        
        let checked_all = document.querySelector('.checked_all');
        if(checked_all){
            checked_all.addEventListener('click', ()=>{
                (Object.values(chackbox)).forEach((x)=>{
                    if(checked_all.checked == true){
                        x.checked = true;
                        sub_option.checked = true;
                        x.closest('tr').classList.remove('none');
                        sub_option.closest('tr').classList.remove('none');
                    }else{
                        x.checked = false;
                        sub_option.checked = false;
                        x.closest('tr').classList.add('none');
                        sub_option.closest('tr').classList.add('none');
                    }
                });
                
                (Object.values(checkbox01)).forEach((z)=>{
                    if(checked_all.checked == true){
                        z.checked = true;
                        z.closest('tr').classList.remove('none');
                    }
                    else{
                        z.checked = false;
                        z.closest('tr').classList.add('none');
                    }
                });
                
            });
        }
        
    })
</script>