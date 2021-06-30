<style>
    @media print{
        .form-group input.form-control, table.table tr td input.form-control { border: 1px solid transparent; }
        #datetimepicker .input-group-addon { display: none !important; }
        table.table tr td, table.table tr th { padding: 1px 4px !important; }
        .panel-body { padding-bottom: 0 !important;padding-top: 0 !important;} 
        .headline { text-align: center;display:flex;justify-content: center;align-items: center; }
        .form-group { margin-bottom: 0 !important;}
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
    .mb-3 { margin-bottom: 16px !important; }
    .mb-2 { margin-bottom: 8px !important; }
    .p-0 { padding: 0 !important; }
    .pr-2 { padding-right: 8px !important; }
    .width25 { width:25%; float:left; text-align:center; }
    .width50 { width:20%; float:left; text-align:center; }
    .width75 { width:75%; float:left; text-align:center; }
</style>

<div class="container-fluid">
    <div class="row">

        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panal-header-title">
                    <h1 class="pull-left">CBC</h1>
                    <a href="#" class="pull-right" style="margin-top: 0px; font-size: 14px;" onclick="window.print()">
                        <i class="fa fa-print"></i> Print
                    </a>
                </div>
            </div>
            
            <div class="panel-body">
                <!-- Print banner Start Here -->
                <?php  $this->load->view('print'); ?>
                
                <?php   echo $this->session->flashdata('confirmation'); ?>
                <form action="<?=site_url('reports/mixed_reports/store')?>" method="post" class="form-horizontal">
                <!-- Table Header Start Here -->
                <table class="table table-bordered header_table">
                    <tr>
                        <th width="200">Lab. No.</th>
                        <td>
                            <input type="text" name="patient[lab_no]" class="none form-control input_data" placeholder="Enter Patient Lab No." value="">
                            <span class="hide text-center"></span>
                        </td>
                        <th width="120">Date</th>
                        <td width="200">
                            <input type="date" name="patient[date]" class="none form-control input_data" placeholder="Date" value="">
                            <span class="hide text-center"></span>
                        </td>
                    </tr>
                    <tr>
                        <th>Patient Name</th>
                        <td>
                            <input type="text" name="patient[name]" class="none form-control input_data" placeholder="Enter Patient Name" value="">
                            <span class="hide"></span>
                        </td>
                        <th>Age</th>
                        <td>
                            <input type="text" name="patient[age]" class="none form-control input_data" placeholder="Enter Patient Age" value="">
                            <span class="hide text-center"></span>
                        </td>
                    </tr>
                    <tr>
                        <th>Refd: BY Dr./Prof.</th>
                        <td colspan="3">
                            <input type="text" name="patient[refd_doctor]" class="none form-control input_data" placeholder="Enter Patient Dr/Prof Name" value="">
                            <span class="hide"></span>
                        </td>
                    </tr>
                </table>
                <!-- Table Header End Here -->
                
                <!-- Table Headline Start Here -->
                <div class="headline">
                    <h4 class="hide text-center" style="margin-top: 10px;"> Blood Examination Report </h4>
                </div>
                <!-- Table Headline End Here -->
                
                <!-- Main Table Start Here -->
                <table class="table table-bordered">
                    <tr>
                        <td width="40" class="text-center none"><input type="checkbox" class="checked_all" value="all" ></td>
                        <th class="text-center" colspan="2">TEST</th>
                        <th width="150" class="text-center">RESULT</th>
                        <th width="130" class="text-center">UNIT</th>
                        <th width="200" class="text-center">Ref-Range</th>
                    </tr>
                    <tr>
                        <td class="text-center none"><input type="checkbox" class="chackbox" name="test[Haemoglo]" value="Haemoglobin_(Hb)" ></td>
                        <th colspan="2">Haemoglobin (Hb)</th>
                        <td>
                            <input type="text" class="none form-control input_data" name="result[Haemoglo]" placeholder="" value="">
                            <span class="hide text-center"></span>
                        </td>
                        <td class="text-center"> gm/dl </td>
                        <th class="text-right">
                            Male 14-18 gm/dl <br /> Female-12-16 gm/dl
                        </th>
                    </tr>
                    <tr>
                        <td class="text-center none"><input type="checkbox" class="chackbox" name="test[RBC]" value="Total_Count_(RBC)" ></td>
                        <th colspan="2">Total Count (RBC)</th>
                        <td>
                            <input type="text" class="none form-control input_data" name="result[RBC]" placeholder="" value="">
                            <span class="hide text-center"></span>
                        </td>
                        <td class="text-center"> </td>
                        <th class="text-right">
                            4.55.5 million per cu mm
                        </th>
                    </tr>
                    <tr>
                        <td class="text-center none"><input type="checkbox" class="chackbox" name="test[WBC]" value="Total_Count_(W.B.C)" ></td>
                        <th colspan="2">Total Count (W.B.C)</th>
                        <td>
                            <input type="text" class="none form-control input_data" name="result[WBC]" placeholder="" value="">
                            <span class="hide text-center"></span>
                        </td>
                        <td class="text-center">  </td>
                        <th class="text-right">
                            4000-11.000 per cu mm. of Blood
                        </th>
                    </tr>
                    <tr>
                        <td class="text-center none"><input type="checkbox" class="sub_option"></td>
                        <th class="tablewidth">
                            Differential Leukocyte Count
                        </th>
                        <td colspan="4">
                            <!-- SubTable Start Here -->
                            <table class="table table-bordered subtable">
                                <tr>
                                    <th>
                                        <label for="04.1">
                                            <input type="checkbox" id="04.1" class="none chackbox01" name="test[Neutrophil]" value="Neutrophil" >
                                            &nbsp;Neutrophil
                                        </label>
                                    </th>
                                    <td width="150">
                                        <input type="text" class="none form-control input_data" name="result[Neutrophil]" placeholder="" value="">
                                        <span class="hide text-center"></span>
                                    </td>
                                    <td width="130" class="text-center"> % </td>
                                    <th width="197" class="text-right"> (40-75%) </th>
                                </tr>
                                <tr>
                                    <th>
                                        <label for="04.2">
                                            <input type="checkbox" id="04.2" class="none chackbox01" name="test[Lymphocyte]" value="Lymphocyte" >
                                            &nbsp;Lymphocyte
                                        </label>
                                    </th>
                                    <td width="150">
                                        <input type="text" class="none form-control input_data" name="result[Lymphocyte]" placeholder="" value="">
                                        <span class="hide text-center"></span>
                                    </td>
                                    <td width="130" class="text-center"> % </td>
                                    <th width="197" class="text-right"> (20-54%) </th>
                                </tr>
                                <tr>
                                    <th>
                                        <label for="04.3">
                                            <input type="checkbox" id="04.3" class="none chackbox01" name="test[Monocyte]" value="Monocyte" >
                                            &nbsp;Monocyte
                                        </label>
                                    </th>
                                    <td width="150">
                                        <input type="text" class="none form-control input_data" name="result[Monocyte]" placeholder="" value="">
                                        <span class="hide text-center"></span>
                                    </td>
                                    <td width="130" class="text-center"> % </td>
                                    <th width="197" class="text-right">
                                        (2%-10%)
                                    </th>
                                </tr>
                                <tr>
                                    <th>
                                        <label for="04.4">
                                            <input type="checkbox" id="04.4" class="none chackbox01" name="test[Eeitinophih]" value="Eeitinophih" >
                                            &nbsp;Eeitinophih
                                        </label>
                                    </th>
                                    <td width="150">
                                        <input type="text" class="none form-control input_data" name="result[Eeitinophih]" placeholder="" value="">
                                        <span class="hide text-center"></span>
                                    </td>
                                    <td width="130" class="text-center"> % </td>
                                    <th width="197" class="text-right"> (1%-8%) </th>
                                </tr>
                                <tr>
                                    <th>
                                        <label for="04.5">
                                            <input type="checkbox" id="04.5" class="none chackbox01" name="test[Basephil]" value="Basephil" >
                                            &nbsp;Basephil
                                        </label>
                                    </th>
                                    <td width="150">
                                        <input type="text" class="none form-control input_data" name="result[Basephil]" placeholder="" value="">
                                        <span class="hide text-center"></span>
                                    </td>
                                    <td width="130" class="text-center"> % </td>
                                    <th width="197" class="text-right"> (0-1%) </th>
                                </tr>
                                <tr>
                                    <th>
                                        <label for="04.6">
                                            <input type="checkbox" id="04.6" class="none chackbox01" name="test[Atypical]" value="Atypical_Cell" >
                                            &nbsp;Atypical Cell
                                        </label>
                                    </th>
                                    <td width="150">
                                        <input type="text" class="none form-control input_data" name="result[Atypical]" placeholder="" value="">
                                        <span class="hide text-center"></span>
                                    </td>
                                    <td width="130" class="text-center">  </td>
                                    <th width="197" class="text-right">  </th>
                                </tr>
                            </table>
                            <!-- SubTable End Here -->
                        </td>
                    </tr>
                    
                    <tr>
                        <td class="text-center none"><input type="checkbox" class="chackbox" name="test[Sedimentation]" value="Erythrocyte_Sedimentation_Rate_ESR)_(West_Method)" ></td>
                        <th colspan="2">Erythrocyte Sedimentation Rate ESR) (West Method)</th>
                        <td>
                            <input type="text" class="none form-control input_data" name="result[Sedimentation]" placeholder="" value="">
                            <span class="hide text-center"></span>
                        </td>
                        <td class="text-center"> MM. Ist Hour </td>
                        <th class="text-right">
                            M 0-9, F 0-10
                        </th>
                    </tr>
                    <tr>
                        <td class="text-center none"><input type="checkbox" class="chackbox" name="test[Eosinophils]" value="Total_Circulating_Eosinophils" ></td>
                        <th colspan="2">Total Circulating Eosinophils</th>
                        <td>
                            <input type="text" class="none form-control input_data" name="result[Eosinophils]" placeholder="" value="">
                            <span class="hide text-center"></span>
                        </td>
                        <td class="text-center">  </td>
                        <th class="text-right">
                            40-440 per cu mm.
                        </th>
                    </tr>
                    <tr>
                        <td class="text-center none"><input type="checkbox" class="chackbox" name="test[Reticulocytes]" value="Reticulocytes" ></td>
                        <th colspan="2">Reticulocytes</th>
                        <td>
                            <input type="text" class="none form-control input_data" name="result[Reticulocytes]" placeholder="" value="">
                            <span class="hide text-center"></span>
                        </td>
                        <td class="text-center">  </td>
                        <th class="text-right">
                            02-20%
                        </th>
                    </tr>
                    <tr>
                        <td class="text-center none"><input type="checkbox" class="chackbox" name="test[LE_Cell]" value="LE_Cell" ></td>
                        <th colspan="2">LE Cell</th>
                        <td>
                            <input type="text" class="none form-control input_data" name="result[LE_Cell]" placeholder="" value="">
                            <span class="hide text-center"></span>
                        </td>
                        <td class="text-center">  </td>
                        <th class="text-right">
                        </th>
                    </tr>
                    <tr>
                        <td class="text-center none"><input type="checkbox" class="chackbox" name="test[Parasites]" value="Malarial_Parasites_(M.P)" ></td>
                        <th colspan="2">Malarial Parasites (M.P)</th>
                        <td>
                            <input type="text" class="none form-control input_data" name="result[Parasites]" placeholder="" value="">
                            <span class="hide text-center"></span>
                        </td>
                        <td class="text-center">  </td>
                        <th class="text-right">
                        </th>
                    </tr>
                    <tr>
                        <td class="text-center none"><input type="checkbox" class="chackbox" name="test[Bleeding]" value="Bleeding_time_(Ivy_Method)" ></td>
                        <th colspan="2">Bleeding time (Ivy Method)</th>
                        <td>
                            <input type="text" class="none form-control input_data" name="result[Bleeding]" placeholder="" value="">
                            <span class="hide text-center"></span>
                        </td>
                        <td class="text-center"> mim &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Sec </td>
                        <th class="text-right">
                            3-7 mim
                        </th>
                    </tr>
                    <tr>
                        <td class="text-center none"><input type="checkbox" class="chackbox" name="test[Clotting]" value="Clotting_time_(Capillary_Closing_Time)" ></td>
                        <th colspan="2">Clotting time (Capillary Closing Time)</th>
                        <td>
                            <input type="text" class="none form-control input_data" name="result[Clotting]" placeholder="" value="">
                            <span class="hide text-center"></span>
                        </td>
                        <td class="text-center"> mim &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Sec </td>
                        <th class="text-right">
                            5-11 mim
                        </th>
                    </tr>
                    <tr>
                        <td class="text-center none"><input type="checkbox" class="chackbox" name="test[Prothrombin]" value="Prothrombin_time_(Quick_one_stage)" ></td>
                        <th colspan="2">Prothrombin time (Quick one stage)</th>
                        <td>
                            <input type="text" class="none form-control input_data" name="result[Prothrombin]" placeholder="" value="">
                            <span class="hide text-center"></span>
                        </td>
                        <td class="text-center"> Sec </td>
                        <th class="text-right">
                            Control Sec. Range control + 2Sce.
                        </th>
                    </tr>
                    <tr>
                        <td class="text-center none"><input type="checkbox" class="chackbox" name="test[APTT]" value="APTT/PTT" ></td>
                        <th colspan="2">APTT/PTT</th>
                        <td>
                            <input type="text" class="none form-control input_data" name="result[APTT]" placeholder="" value="">
                            <span class="hide text-center"></span>
                        </td>
                        <td class="text-center"> Sec </td>
                        <th class="text-right">
                            Control &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Sec
                        </th>
                    </tr>
                    <tr>
                        <td class="text-center none"><input type="checkbox" class="chackbox" name="test[Platelet]" value="Platelet_Count" ></td>
                        <th colspan="2">Platelet Count</th>
                        <td>
                            <input type="text" class="none form-control input_data" name="result[Platelet]" placeholder="" value="">
                            <span class="hide text-center"></span>
                        </td>
                        <td class="text-center">  </td>
                        <th class="text-right">
                            1.50.000-4.50.000 per cu mm Control Sec
                        </th>
                    </tr>
                    <tr>
                        <td class="text-center none"><input type="checkbox" class="chackbox" name="test[Blood_Film]" value="Blood_Film" ></td>
                        <th colspan="2">Blood Film:</th>
                        <td>
                            <input type="text" class="none form-control input_data" name="result[Blood_Film]" placeholder="" value="">
                            <span class="hide text-center"></span>
                        </td>
                        <td class="text-center">  </td>
                        <th class="text-right">
                        </th>
                    </tr>
                    <tr>
                        <td class="text-center none"><input type="checkbox" class="chackbox" name="test[Comment]" value="Comment" ></td>
                        <th colspan="2">Comment:</th>
                        <td>
                            <input type="text" class="none form-control input_data" name="result[Comment]" placeholder="" value="">
                            <span class="hide text-center"></span>
                        </td>
                        <td class="text-center">  </td>
                        <th class="text-right">
                        </th>
                    </tr>
                    <tr>
                        <td class="text-center none"><input type="checkbox" class="chackbox" name="test[OTHERS]" value="OTHERS" ></td>
                        <th colspan="2">OTHERS</th>
                        <td>
                            <input type="text" class="none form-control input_data" name="result[OTHERS]" placeholder="" value="">
                            <span class="hide text-center"></span>
                        </td>
                        <td class="text-center">  </td>
                        <th class="text-right">
                        </th>
                    </tr>
                </table>
                <div class="col-xs-12">
                    <div class="btn-group pull-right none">
                        <input type="hidden" name="patient[type]" value="cbc">
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
        
        if(sub_option){
            (Object.values(checkbox01)).forEach((x)=>{
                x.closest('tr').classList.add('none');
                
                var p_tr = x.closest('tr').parentElement.closest('tr');
                (p_tr ? p_tr.classList.add('none') : '');
                
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
                if(sub_option){
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
                }
            });
        }
        
    })
</script>