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
                                <span class=" text-center"><?=($patient->lab_no)?></span>
                            </td>
                            <th width="120" class="">Age</th>
                            <td width="200">
                                <span class=" text-center"><?=($patient->age)?></span>
                            </td>
                        </tr>
                        <tr>
                            <th class="">Patient Name</th>
                            <td>
                                <span class=""><?=($patient->name)?></span>
                            </td>
                            <th class="">Date</th>
                            <td>
                                <span class=" text-center"><?=($patient->date)?></span>
                            </td>
                        </tr>
                        <tr>
                            <th class="">Refd: BY Dr./Prof.</th>
                            <td colspan="3">
                                <span class=""><?=($patient->refd_doctor)?></span>
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
                    <table class="table table-bordered table1">
                        <tr>
                            <th class="text-center">TEST</th>
                            <th width="150" class="text-center">RESULT</th>
                            <th width="130" class="text-center">UNIT</th>
                            <th width="160" class="text-center">NORMAL VALUE</th>
                        </tr>
                        <tr>
                            <th>Hemoglobin (Hb)</th>
                            <td colspan="2">
                                <div class="width25">
                                    <span class=" text-center"><?print_r(isset($tests['Hemoglobin_(Hb)']) ? (isset($tests["Hemoglobin_(Hb)"]->percent) ? $tests["Hemoglobin_(Hb)"]->percent : '') : '')?></span>
                                </div>
                                <div class="width25">
                                    gm/dl
                                </div>
                                <div class="width25">
                                    <span class=" text-center"><?print_r(isset($tests['Hemoglobin_(Hb)']) ? (isset($tests["Hemoglobin_(Hb)"]->gm) ? $tests["Hemoglobin_(Hb)"]->gm : '') : '')?></span>
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
                            <th>Erythrocyte Sedimentation Rate <br/> (E.S.R) (Westergren Method)</th>
                            <td colspan="2">
                                <div class="width75">
                                    <span class=" text-center"><?=(isset($tests['Erythrocyte_Sedimentation_Rate_(E.S.R)_(Westergren_Method)']) ? $tests['Erythrocyte_Sedimentation_Rate_(E.S.R)_(Westergren_Method)'] : '')?></span>
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
                            <th>P. Glucose (Fasting/Random)</th>
                            <td>
                                <span class=" text-center"><?=(isset($tests['P._Glucose_(Fasting/Random)']) ? $tests['P._Glucose_(Fasting/Random)'] : '')?></span>
                            </td>
                            <td class="text-center"> mmo/L/L </td>
                            <th class="text-right">
                                F-4.2-6.4, R- < 7.8
                            </th>
                        </tr>
                        <tr>
                            <th>Corr. Urine Sugar</th>
                            <td>
                                <span class=" text-center"><?=(isset($tests['Corr._Urine_Sugar']) ? $tests['Corr._Urine_Sugar'] : '')?></span>
                            </td>
                            <td class="text-center"> </td>
                            <th class="text-right">
                                Nil
                            </th>
                        </tr>
                        <tr>
                            <th>P. Glucose 2 hr After 75 Gm <br/> Glucose/ Breakfast</th>
                            <td>
                                <span class=" text-center"><?=(isset($tests['P._Glucose_2_hr_After_75_Gm_Glucose_/_Breakfast']) ? $tests['P._Glucose_2_hr_After_75_Gm_Glucose_/_Breakfast'] : '')?></span>
                            </td>
                            <td class="text-center"> mmo/L/L </td>
                            <th class="text-right">
                                < 7.8
                            </th>
                        </tr>
                        <tr>
                            <th>Gorr. Urine Sugar</th>
                            <td>
                                <span class=" text-center"><?=(isset($tests['Corr._Urine_Sugar']) ? $tests['Corr._Urine_Sugar'] : '')?></span>
                            </td>
                            <td class="text-center"> </td>
                            <th class="text-right">
                                Nil
                            </th>
                        </tr>
                        <tr>
                            <th>S. Bilirubin (Total)</th>
                            <td>
                                <span class=" text-center"><?=(isset($tests['S._Bilirubin_(Total)']) ? $tests['S._Bilirubin_(Total)'] : '')?></span>
                            </td>
                            <td class="text-center"> mg/dl </td>
                            <th class="text-right">
                                04.-1.2
                            </th>
                        </tr>
                        <tr>
                            <th>HBs Ag (Screening Test)</th>
                            <td>
                                <span class=" text-center"><?=(isset($tests['HBs_Ag_(Screening_Test)']) ? $tests['HBs_Ag_(Screening_Test)'] : '')?></span>
                            </td>
                            <td class="text-center">  </td>
                            <th class="text-right">
                                Negative
                            </th>
                        </tr>
                        <tr>
                            <th>HIV (Screening Test)</th>
                            <td>
                                <span class=" text-center"><?=(isset($tests['HIV_(Screening_Test)']) ? $tests['HIV_(Screening_Test)'] : '')?></span>
                            </td>
                            <td class="text-center">  </td>
                            <th class="text-right">
                                Negative
                            </th>
                        </tr>
                        <tr>
                            <th>VDRL (Screening Test)</th>
                            <td>
                                <span class=" text-center"><?=(isset($tests['VDRL_(Screening_Test)']) ? $tests['VDRL_(Screening_Test)'] : '')?></span>
                            </td>
                            <td class="text-center">  </td>
                            <th class="text-right">
                                Non Reactive
                            </th>
                        </tr>
                        <tr>
                            <th>TPHA</th>
                            <td>
                                <span class=" text-center"><?=(isset($tests['TPHA']) ? $tests['TPHA'] : '')?></span>
                            </td>
                            <td class="text-center">  </td>
                            <th class="text-right">
                                Negative
                            </th>
                        </tr>
                        <tr>
                            <th>Blood Group System</th>
                            <td>
                                <span class=" text-center"><?=(isset($tests['Blood_Group_System']) ? $tests['Blood_Group_System'] : '')?></span>
                            </td>
                            <td class="text-center">  </td>
                            <th class="text-right"> </th>
                        </tr>
                        <tr>
                            <th>BLOOD AB O</th>
                            <td>
                                <span class=" text-center"><?=(isset($tests['BLOOD_AB_O']) ? $tests['BLOOD_AB_O'] : '')?></span>
                            </td>
                            <td class="text-center">  </td>
                            <th class="text-right"> </th>
                        </tr>
                        <tr>
                            <th>GROUP Rh(D) Factor</th>
                            <td>
                                <span class=" text-center"><?=(isset($tests['GROUP_Rh(D)_Factor']) ? $tests['GROUP_Rh(D)_Factor'] : '')?></span>
                            </td>
                            <td class="text-center">  </td>
                            <th class="text-right"> </th>
                        </tr>
                        <tr>
                            <th>At (Kala-Azar)</th>
                            <td>
                                <span class=" text-center"><?=(isset($tests['At_(Kala_Azar)']) ? $tests['At_(Kala_Azar)'] : '')?></span>
                            </td>
                            <td class="text-center">  </td>
                            <th class="text-right">
                                Negative
                            </th>
                        </tr>
                        <tr>
                            <th>Cress Matching</th>
                            <td>
                                <span class=" text-center"><?=(isset($tests['Cress_Matching']) ? $tests['Cress_Matching'] : '')?></span>
                            </td>
                            <td class="text-center">  </td>
                            <th class="text-right"> </th>
                        </tr>
                        <tr>
                            <th>Aso Titre</th>
                            <td>
                                <span class=" text-center"><?=(isset($tests['Aso_Titre']) ? $tests['Aso_Titre'] : '')?></span>
                            </td>
                            <td class="text-center">  </td>
                            <th class="text-right">
                                >200 iu/ml
                            </th>
                        </tr>
                        <tr>
                            <th>RA Test</th>
                            <td>
                                <span class=" text-center"><?=(isset($tests['RA_Test']) ? $tests['RA_Test'] : '')?></span>
                            </td>
                            <td class="text-center">  </td>
                            <th class="text-right">
                                Negative
                            </th>
                        </tr>
                        <tr>
                            <th>Widal Test  TO  AH</th>
                            <td>
                                <span class=" text-center"><?=(isset($tests['Widal_Test_TO_AH']) ? $tests['Widal_Test_TO_AH'] : '')?></span>
                            </td>
                            <td class="text-center">  </td>
                            <th class="text-right">
                                1:80 &nbsp;&nbsp;&nbsp;&nbsp; 1:80
                            </th>
                        </tr>
                        <tr>
                            <th>TH  BH</th>
                            <td>
                                <span class=" text-center"><?=(isset($tests['TH_BH']) ? $tests['TH_BH'] : '')?></span>
                            </td>
                            <td class="text-center">  </td>
                            <th class="text-right">
                                1:80 &nbsp;&nbsp;&nbsp;&nbsp; 1:80
                            </th>
                        </tr>
                        <tr>
                            <th>Pregnancy Test</th>
                            <td>
                                <span class=" text-center"><?=(isset($tests['Pregnancy_Test']) ? $tests['Pregnancy_Test'] : '')?></span>
                            </td>
                            <td class="text-center">  </td>
                            <th class="text-right">
                                Negative
                            </th>
                        </tr>
                        <tr>
                            <th>ICT For Kala-Azar</th>
                            <td>
                                <span class=" text-center"><?=(isset($tests['ICT_For_Kala_Azar']) ? $tests['ICT_For_Kala_Azar'] : '')?></span>
                            </td>
                            <td class="text-center">  </td>
                            <th class="text-right">
                                Negative
                            </th>
                        </tr>
                        <tr>
                            <th>CRP (Serology Test)</th>
                            <td>
                                <span class=" text-center"><?=(isset($tests['CRP_(Serology_Test)']) ? $tests['CRP_(Serology_Test)'] : '')?></span>
                            </td>
                            <td class="text-center">  </td>
                            <th class="text-right">
                                >6.0 mg/L
                            </th>
                        </tr>
                        <tr>
                            <th>S. Creatinine</th>
                            <td>
                                <span class=" text-center"><?=(isset($tests['S._Creatinine']) ? $tests['S._Creatinine'] : '')?></span>
                            </td>
                            <td class="text-center"> mg/dl </td>
                            <th class="text-right">
                                0.6-1.4
                            </th>
                        </tr>
                        <tr>
                            <th>OTHERS</th>
                            <td>
                                <span class=" text-center"><?=(isset($tests['OTHERS']) ? $tests['OTHERS'] : '')?></span>
                            </td>
                            <td class="text-center">  </td>
                            <th class="text-right">  </th>
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
                    <?php echo form_close(); ?>
                </div>
            </form>
            <div class="panel-footer">&nbsp;</div>
        </div>

    </div>
</div>

<script>
    let table = Object.values(document.querySelectorAll('.table1 span'));
    table.forEach((x)=>{
        if((x.innerText).length==0){
            x.closest('tr').classList.add('none');
        };
    });
</script>