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
                    <h1 class="pull-left">Serological Analysis & Blood Examination Report</h1>
                    <a href="#" class="pull-right" style="margin-top: 0px; font-size: 14px;" onclick="window.print()">
                        <i class="fa fa-print"></i> Print
                    </a>
                </div>
            </div>
            <form method="post" action="<?=site_url('reports/mixed_reports/store')?>">
                <div class="panel-body">
                    <!-- Print banner Start Here -->
                    <?php $this->load->view('print');
                    echo $this->session->flashdata('confirmation'); 
                    /* horizontal form */
                    $attribute = array('name' => '','class' => 'form-horizontal','id' => '');
                    echo form_open('', $attribute); ?>
                    
                    <!-- Table Header Start Here -->
                    <table class="table table-bordered header_table">
                        <tr>
                            <th width="200" class="">Lab. No.</th>
                            <td>
                                <input type="text" name="patient[lab_no]" class="none form-control input_data" placeholder="Enter Patient Lab No." value="">
                                <span class="hide text-center"></span>
                            </td>
                            <th width="120" class="">Age</th>
                            <td width="200">
                                <input type="text" name="patient[age]" class="none form-control input_data" placeholder="Enter Patient Age" value="">
                                <span class="hide text-center"></span>
                            </td>
                        </tr>
                        <tr>
                            <th class="">Patient Name</th>
                            <td>
                                <input type="text" name="patient[name]" class="none form-control input_data" placeholder="Enter Patient Name" value="">
                                <span class="hide"></span>
                            </td>
                            <th class="">Date</th>
                            <td>
                                <input type="date" name="patient[date]" class="none form-control input_data" placeholder="Date" value="">
                                <span class="hide text-center"></span>
                            </td>
                        </tr>
                        <tr>
                            <th class="">Refd: BY Dr./Prof.</th>
                            <td colspan="3">
                                <input type="text" name="patient[refd_doctor]" class="none form-control input_data" placeholder="Enter Patient Dr/Prof Name" value="">
                                <span class="hide"></span>
                            </td>
                        </tr>
                    </table>
                    <!-- Table Header End Here -->
                    
                    <!-- Table Headline Start Here -->
                    <div class="headline">
                        <h4 class="hide text-center" style="margin-top: 10px;">Serological Analysis & Blood Examination Report</h4>
                    </div>
                    <!-- Table Headline End Here -->
                    
                    <!-- Main Table Start Here -->
                    <table class="table table-bordered">
                        <tr>
                            <td width="40" class="text-center none"><input type="checkbox" class="checked_all" value="all" ></td>
                            <th class="text-center">TEST</th>
                            <th width="150" class="text-center">RESULT</th>
                            <th width="130" class="text-center">UNIT</th>
                            <th width="160" class="text-center">NORMAL VALUE</th>
                        </tr>
                        <tr>
                            <td class="text-center none"><input name="test[Hem]" type="checkbox" class="chackbox" value="Hemoglobin_(Hb)"></td>
                            <th>Hemoglobin (Hb)</th>
                            <td colspan="2">
                                <div class="width25">
                                    <input type="text" class="none form-control input_data" name="result[Hem][gm]">
                                    <span class="hide text-center"></span>
                                </div>
                                <div class="width25">
                                    gm/dl
                                </div>
                                <div class="width25">
                                    <input type="text" class="none form-control input_data" name="result[Hem][percent]">
                                    <span class="hide text-center"></span>
                                </div>
                                <div class="width25">
                                    %
                                </div>
                            </td>
                            <th class="text-right">
                                Male-16gm/dl=100% <br />
                                Female- 14.8gm/dl
                            </th>
                        </tr>
                        <tr>
                            <td class="text-center none"><input type="checkbox" class="chackbox" name="test[Erythrocy]" value="Erythrocyte_Sedimentation_Rate_(E.S.R)_(Westergren_Method)"></td>
                            <th>Erythrocyte Sedimentation Rate <br/> (E.S.R) (Westergren Method)</th>
                            <td colspan="2">
                                <div class="width75">
                                    <input type="text" name="result[Erythrocy]" class="none form-control input_data" placeholder="" value="">
                                    <span class="hide text-center"></span>
                                </div>
                                <div class="width25">
                                    gm/dl
                                </div>
                            </td>
                            <th class="text-right">
                                M 0-9, F 0-10
                            </th>
                        </tr>
                        <tr>
                            <td class="text-center none"><input type="checkbox" class="chackbox" name="test[Fasting]" value="P._Glucose_(Fasting/Random)" ></td>
                            <th>P. Glucose (Fasting/Random)</th>
                            <td>
                                <input type="text" name="result[Fasting]" class="none form-control input_data" placeholder="" value="">
                                <span class="hide text-center"></span>
                            </td>
                            <td class="text-center"> mmo/L/L </td>
                            <th class="text-right">
                                F-4.2-6.4, R- < 7.8
                            </th>
                        </tr>
                        <tr>
                            <td class="text-center none"><input type="checkbox" class="chackbox" name="test[Urine]" value="Corr._Urine_Sugar" ></td>
                            <th>Corr. Urine Sugar</th>
                            <td>
                                <input type="text" name="result[Urine]" class="none form-control input_data" placeholder="" value="">
                                <span class="hide text-center"></span>
                            </td>
                            <td class="text-center"> </td>
                            <th class="text-right">
                                Nil
                            </th>
                        </tr>
                        <tr>
                            <td class="text-center none"><input type="checkbox" class="chackbox" name="test[Break]" value="P._Glucose_2_hr_After_75_Gm_Glucose_/_Breakfast" ></td>
                            <th>P. Glucose 2 hr After 75 Gm <br/> Glucose/ Breakfast</th>
                            <td>
                                <input type="text" name="result[Break]" class="none form-control input_data" placeholder="" value="">
                                <span class="hide text-center"></span>
                            </td>
                            <td class="text-center"> mmo/L/L </td>
                            <th class="text-right">
                                < 7.8
                            </th>
                        </tr>
                        <tr>
                            <td class="text-center none"><input type="checkbox" class="chackbox" name="test[Sugar]" value="Gorr._Urine_Sugar" ></td>
                            <th>Gorr. Urine Sugar</th>
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
                            <td class="text-center none"><input type="checkbox" class="chackbox" name="test[Bilirubin]" value="S._Bilirubin_(Total)" ></td>
                            <th>S. Bilirubin (Total)</th>
                            <td>
                                <input type="text" name="result[Bilirubin]" class="none form-control input_data" placeholder="" value="">
                                <span class="hide text-center"></span>
                            </td>
                            <td class="text-center"> mg/dl </td>
                            <th class="text-right">
                                04.-1.2
                            </th>
                        </tr>
                        <tr>
                            <td class="text-center none"><input type="checkbox" class="chackbox" name="test[HBs_Ag]" value="HBs_Ag_(Screening_Test)" ></td>
                            <th>HBs Ag (Screening Test)</th>
                            <td>
                                <input type="text" name="result[HBs_Ag]" class="none form-control input_data" placeholder="" value="">
                                <span class="hide text-center"></span>
                            </td>
                            <td class="text-center">  </td>
                            <th class="text-right">
                                Negative
                            </th>
                        </tr>
                        <tr>
                            <td class="text-center none"><input type="checkbox" class="chackbox" name="test[HIV]" value="HIV_(Screening_Test)" ></td>
                            <th>HIV (Screening Test)</th>
                            <td>
                                <input type="text" name="result[HIV]" class="none form-control input_data" placeholder="" value="">
                                <span class="hide text-center"></span>
                            </td>
                            <td class="text-center">  </td>
                            <th class="text-right">
                                Negative
                            </th>
                        </tr>
                        <tr>
                            <td class="text-center none"><input type="checkbox" class="chackbox" name="test[VDRL]" value="VDRL_(Screening_Test)" ></td>
                            <th>VDRL (Screening Test)</th>
                            <td>
                                <input type="text" name="result[VDRL]" class="none form-control input_data" placeholder="" value="">
                                <span class="hide text-center"></span>
                            </td>
                            <td class="text-center">  </td>
                            <th class="text-right">
                                Non Reactive
                            </th>
                        </tr>
                        <tr>
                            <td class="text-center none"><input type="checkbox" class="chackbox" name="test[TPHA]" value="TPHA" ></td>
                            <th>TPHA</th>
                            <td>
                                <input type="text" name="result[TPHA]" class="none form-control input_data" placeholder="" value="">
                                <span class="hide text-center"></span>
                            </td>
                            <td class="text-center">  </td>
                            <th class="text-right">
                                Negative
                            </th>
                        </tr>
                        <tr>
                            <td class="text-center none"><input type="checkbox" class="chackbox" name="test[Blood_Group]" value="Blood_Group_System" ></td>
                            <th>Blood Group System</th>
                            <td>
                                <input type="text" name="result[Blood_Group]" class="none form-control input_data" placeholder="" value="">
                                <span class="hide text-center"></span>
                            </td>
                            <td class="text-center">  </td>
                            <th class="text-right"> </th>
                        </tr>
                        <tr>
                            <td class="text-center none"><input type="checkbox" class="chackbox" name="test[AB_O]" value="BLOOD_AB_O" ></td>
                            <th>BLOOD       AB O</th>
                            <td>
                                <input type="text" name="result[AB_O]" class="none form-control input_data" placeholder="" value="">
                                <span class="hide text-center"></span>
                            </td>
                            <td class="text-center">  </td>
                            <th class="text-right"> </th>
                        </tr>
                        <tr>
                            <td class="text-center none"><input type="checkbox" class="chackbox" name="test[Factor]" value="GROUP_Rh(D)_Factor" ></td>
                            <th>GROUP       Rh(D) Factor</th>
                            <td>
                                <input type="text" name="result[Factor]" class="none form-control input_data" placeholder="" value="">
                                <span class="hide text-center"></span>
                            </td>
                            <td class="text-center">  </td>
                            <th class="text-right"> </th>
                        </tr>
                        <tr>
                            <td class="text-center none"><input type="checkbox" class="chackbox" name="test[Kala_Azar]" value="At_(Kala_Azar)" ></td>
                            <th>At (Kala-Azar)</th>
                            <td>
                                <input type="text" name="result[Kala_Azar]" class="none form-control input_data" placeholder="" value="">
                                <span class="hide text-center"></span>
                            </td>
                            <td class="text-center">  </td>
                            <th class="text-right">
                                Negative
                            </th>
                        </tr>
                        <tr>
                            <td class="text-center none"><input type="checkbox" class="chackbox" name="test[Cress_Match]" value="Cress_Matching" ></td>
                            <th>Cress Matching</th>
                            <td>
                                <input type="text" name="result[Cress_Match]" class="none form-control input_data" placeholder="" value="">
                                <span class="hide text-center"></span>
                            </td>
                            <td class="text-center">  </td>
                            <th class="text-right"> </th>
                        </tr>
                        <tr>
                            <td class="text-center none"><input type="checkbox" class="chackbox" name="test[Aso_Titre]" value="Aso_Titre" ></td>
                            <th>Aso Titre</th>
                            <td>
                                <input type="text" name="result[Aso_Titre]" class="none form-control input_data" placeholder="" value="">
                                <span class="hide text-center"></span>
                            </td>
                            <td class="text-center">  </td>
                            <th class="text-right">
                                >200 iu/ml
                            </th>
                        </tr>
                        <tr>
                            <td class="text-center none"><input type="checkbox" class="chackbox" name="test[RA_Test]" value="RA_Test" ></td>
                            <th>RA Test</th>
                            <td>
                                <input type="text" name="result[RA_Test]" class="none form-control input_data" placeholder="" value="">
                                <span class="hide text-center"></span>
                            </td>
                            <td class="text-center">  </td>
                            <th class="text-right">
                                Negative
                            </th>
                        </tr>
                        <tr>
                            <td class="text-center none"><input type="checkbox" class="chackbox" name="test[Widal_Test]" value="Widal_Test_TO_AH" ></td>
                            <th>Widal Test  TO  AH</th>
                            <td>
                                <input type="text" name="result[Widal_Test]" class="none form-control input_data" placeholder="" value="">
                                <span class="hide text-center"></span>
                            </td>
                            <td class="text-center">  </td>
                            <th class="text-right">
                                1:80 &nbsp;&nbsp;&nbsp;&nbsp; 1:80
                            </th>
                        </tr>
                        <tr>
                            <td class="text-center none"><input type="checkbox" class="chackbox" name="test[TH_BH]" value="TH_BH" ></td>
                            <th>TH  BH</th>
                            <td>
                                <input type="text" name="result[TH_BH]" class="none form-control input_data" placeholder="" value="">
                                <span class="hide text-center"></span>
                            </td>
                            <td class="text-center">  </td>
                            <th class="text-right">
                                1:80 &nbsp;&nbsp;&nbsp;&nbsp; 1:80
                            </th>
                        </tr>
                        <tr>
                            <td class="text-center none"><input type="checkbox" class="chackbox" name="test[Pregnancy]" value="Pregnancy_Test" ></td>
                            <th>Pregnancy Test</th>
                            <td>
                                <input type="text" name="result[Pregnancy]" class="none form-control input_data" placeholder="" value="">
                                <span class="hide text-center"></span>
                            </td>
                            <td class="text-center">  </td>
                            <th class="text-right">
                                Negative
                            </th>
                        </tr>
                        <tr>
                            <td class="text-center none"><input type="checkbox" class="chackbox" name="test[ICT_For]" value="ICT_For_Kala_Azar" ></td>
                            <th>ICT For Kala-Azar</th>
                            <td>
                                <input type="text" name="result[ICT_For]" class="none form-control input_data" placeholder="" value="">
                                <span class="hide text-center"></span>
                            </td>
                            <td class="text-center">  </td>
                            <th class="text-right">
                                Negative
                            </th>
                        </tr>
                        <tr>
                            <td class="text-center none"><input type="checkbox" class="chackbox" name="test[CRP_]" value="CRP_(Serology_Test)" ></td>
                            <th>CRP (Serology Test)</th>
                            <td>
                                <input type="text" name="result[CRP_]" class="none form-control input_data" placeholder="" value="">
                                <span class="hide text-center"></span>
                            </td>
                            <td class="text-center">  </td>
                            <th class="text-right">
                                >6.0 mg/L
                            </th>
                        </tr>
                        <tr>
                            <td class="text-center none"><input type="checkbox" class="chackbox" name="test[Creatinine]" value="S._Creatinine" ></td>
                            <th>S. Creatinine</th>
                            <td>
                                <input type="text" name="result[Creatinine]" class="none form-control input_data" placeholder="" value="">
                                <span class="hide text-center"></span>
                            </td>
                            <td class="text-center"> mg/dl </td>
                            <th class="text-right">
                                0.6-1.4
                            </th>
                        </tr>
                        <tr>
                            <td class="text-center none"><input type="checkbox" class="chackbox" name="test[OTHERS]" value="OTHERS" ></td>
                            <th>OTHERS</th>
                            <td>
                                <input type="text" name="result[OTHERS]" class="none form-control input_data" placeholder="" value="">
                                <span class="hide text-center"></span>
                            </td>
                            <td class="text-center">  </td>
                            <th class="text-right">  </th>
                        </tr>
                    </table>
                    <div class="col-xs-12">
                        <div class="btn-group pull-right none">
                            <input type="hidden" name="patient[type]" value="saber">
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
                    <?php echo form_close(); ?>
                </div>
            </form>
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
                x.addEventListener('click', ()=>{
                    if(x.checked == true){
                        x.closest('tr').classList.remove('none');
                    }else{
                        x.closest('tr').classList.add('none');
                    }
                });
            });
            
            sub_option.addEventListener('click', ()=>{
                (Object.values(checkbox01)).forEach((x)=>{
                    if(sub_option.checked == true){
                        x.checked = true;
                        x.closest('tr').classList.remove('none');
                    }else{
                        x.checked = false;
                        x.closest('tr').classList.add('none');
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
                        (sub_option ? sub_option.checked = true : '');
                        x.closest('tr').classList.remove('none');
                    }else{
                        x.checked = false;
                        (sub_option ? sub_option.checked = false : '');
                        x.closest('tr').classList.add('none');
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