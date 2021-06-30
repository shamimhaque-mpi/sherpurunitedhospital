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
                
                <?php   echo $this->session->flashdata('confirmation'); 
                /* horizontal form */
                $attribute = array('name' => '','class' => 'form-horizontal','id' => '');
                echo form_open('', $attribute); ?>
                
                <!-- Table Header Start Here -->
                <table class="table table-bordered header_table">
                    <tr>
                        <th width="200">Lab. No.</th>
                        <td>
                            <span class=" text-center"><?=($patient->lab_no)?></span>
                        </td>
                        <th width="120">Date</th>
                        <td width="200">
                            <span class=" text-center"><?=($patient->date)?></span>
                        </td>
                    </tr>
                    <tr>
                        <th>Patient Name</th>
                        <td>
                            <span class=""><?=($patient->name)?></span>
                        </td>
                        <th>Age</th>
                        <td>
                            <span class=" text-center"><?=($patient->age)?></span>
                        </td>
                    </tr>
                    <tr>
                        <th>Refd: BY Dr./Prof.</th>
                        <td colspan="3">
                            <span class=""><?=($patient->refd_doctor)?></span>
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
                <table class="table table-bordered table1">
                    <tr>
                        <th class="text-center" colspan="2">TEST</th>
                        <th width="150" class="text-center">RESULT</th>
                        <th width="130" class="text-center">UNIT</th>
                        <th width="200" class="text-center">Ref-Range</th>
                    </tr>
                    <tr>
                        <th colspan="2">Haemoglobin (Hb)</th>
                        <td>
                            <span class=" text-center"><?=(isset($tests['Haemoglobin_(Hb)']) ? $tests['Haemoglobin_(Hb)'] : '')?></span>
                        </td>
                        <td class="text-center"> gm/dl </td>
                        <th class="text-right">
                            Male 14-18 gm/dl <br /> Female-12-16 gm/dl
                        </th>
                    </tr>
                    <tr>
                        <th colspan="2">Total Count (RBC)</th>
                        <td>
                            <span class=" text-center"><?=(isset($tests['Total_Count_(RBC)']) ? $tests['Total_Count_(RBC)'] : '')?></span>
                        </td>
                        <td class="text-center"> </td>
                        <th class="text-right">
                            4.55.5 million per cu mm
                        </th>
                    </tr>
                    <tr>
                        <th colspan="2">Total Count (W.B.C)</th>
                        <td>
                            <span class=" text-center"><?=(isset($tests['Total_Count_(W.B.C)']) ? $tests['Total_Count_(W.B.C)'] : '')?></span>
                        </td>
                        <td class="text-center">  </td>
                        <th class="text-right">
                            4000-11.000 per cu mm. of Blood
                        </th>
                    </tr>
                    <tr>
                        <th class="tablewidth">
                            Differential Leukocyte Count
                        </th>
                        <td colspan="4">
                            <!-- SubTable Start Here -->
                            <table class="table table-bordered subtable">
                                <tr>
                                    <th>Neutrophil</th>
                                    <td width="150">
                                        <span class=" text-center"><?=(isset($tests['Neutrophil']) ? $tests['Neutrophil'] : '')?></span>
                                    </td>
                                    <td width="130" class="text-center"> % </td>
                                    <th width="195" class="text-right"> (40-75%) </th>
                                </tr>
                                <tr>
                                    <th>Lymphocyte</th>
                                    <td width="150">
                                        <span class=" text-center"><?=(isset($tests['Lymphocyte']) ? $tests['Lymphocyte'] : '')?></span>
                                    </td>
                                    <td width="130" class="text-center"> % </td>
                                    <th width="195" class="text-right"> (20-54%) </th>
                                </tr>
                                <tr>
                                    <th>Monocyte</th>
                                    <td width="150">
                                        <span class=" text-center"><?=(isset($tests['Monocyte']) ? $tests['Monocyte'] : '')?></span>
                                    </td>
                                    <td width="130" class="text-center"> % </td>
                                    <th width="195" class="text-right">
                                        (2%-10%)
                                    </th>
                                </tr>
                                <tr>
                                    <th>Eeitinophih</th>
                                    <td width="150">
                                        <span class=" text-center"><?=(isset($tests['Eeitinophih']) ? $tests['Eeitinophih'] : '')?></span>
                                    </td>
                                    <td width="130" class="text-center"> % </td>
                                    <th width="195" class="text-right"> (1%-8%) </th>
                                </tr>
                                <tr>
                                    <th>Basephil</th>
                                    <td width="150">
                                        <span class=" text-center"><?=(isset($tests['Basephil']) ? $tests['Basephil'] : '')?></span>
                                    </td>
                                    <td width="130" class="text-center"> % </td>
                                    <th width="195" class="text-right"> (0-1%) </th>
                                </tr>
                                <tr>
                                    <th>Atypical Cell</th>
                                    <td width="150">
                                        <span class=" text-center"><?=(isset($tests['Atypical_Cell']) ? $tests['Atypical_Cell'] : '')?></span>
                                    </td>
                                    <td width="130" class="text-center">  </td>
                                    <th width="195" class="text-right">  </th>
                                </tr>
                            </table>
                            <!-- SubTable End Here -->
                        </td>
                    </tr>
                    
                    <tr>
                        <th colspan="2">Erythrocyte Sedimentation Rate ESR) (West Method)</th>
                        <td>
                            <span class=" text-center"><?=(isset($tests['Erythrocyte_Sedimentation_Rate_ESR)_(West_Method)']) ? $tests['Erythrocyte_Sedimentation_Rate_ESR)_(West_Method)'] : '')?></span>
                        </td>
                        <td class="text-center"> MM. Ist Hour </td>
                        <th class="text-right">
                            M 0-9, F 0-10
                        </th>
                    </tr>
                    <tr>
                        <th colspan="2">Total Circulating Eosinophils</th>
                        <td>
                            <span class=" text-center"><?=(isset($tests['Total_Circulating_Eosinophils']) ? $tests['Total_Circulating_Eosinophils'] : '')?></span>
                        </td>
                        <td class="text-center">  </td>
                        <th class="text-right">
                            40-440 per cu mm.
                        </th>
                    </tr>
                    <tr>
                        <th colspan="2">Reticulocytes</th>
                        <td>
                            <span class=" text-center"><?=(isset($tests['Reticulocytes']) ? $tests['Reticulocytes'] : '')?></span>
                        </td>
                        <td class="text-center">  </td>
                        <th class="text-right">
                            02-20%
                        </th>
                    </tr>
                    <tr>
                        <th colspan="2">LE Cell</th>
                        <td>
                            <span class=" text-center"><?=(isset($tests['LE_Cell']) ? $tests['LE_Cell'] : '')?></span>
                        </td>
                        <td class="text-center">  </td>
                        <th class="text-right">
                        </th>
                    </tr>
                    <tr>
                        <th colspan="2">Malarial Parasites (M.P)</th>
                        <td>
                            <span class=" text-center"><?=(isset($tests['Malarial_Parasites_(M.P)']) ? $tests['Malarial_Parasites_(M.P)'] : '')?></span>
                        </td>
                        <td class="text-center">  </td>
                        <th class="text-right">
                        </th>
                    </tr>
                    <tr>
                        <th colspan="2">Bleeding time (Ivy Method)</th>
                        <td>
                            <span class=" text-center"><?=(isset($tests['Bleeding_time_(Ivy_Method)']) ? $tests['Bleeding_time_(Ivy_Method)'] : '')?></span>
                        </td>
                        <td class="text-center"> mim &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Sec </td>
                        <th class="text-right">
                            3-7 mim
                        </th>
                    </tr>
                    <tr>
                        <th colspan="2">Clotting time (Capillary Closing Time)</th>
                        <td>
                            <span class=" text-center"><?=(isset($tests['Clotting_time_(Capillary_Closing_Time)']) ? $tests['Clotting_time_(Capillary_Closing_Time)'] : '')?></span>
                        </td>
                        <td class="text-center"> mim &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Sec </td>
                        <th class="text-right">
                            5-11 mim
                        </th>
                    </tr>
                    <tr>
                        <th colspan="2">Prothrombin time (Quick one stage)</th>
                        <td>
                            <span class=" text-center"><?=(isset($tests['Prothrombin_time_(Quick_one_stage)']) ? $tests['Prothrombin_time_(Quick_one_stage)'] : '')?></span>
                        </td>
                        <td class="text-center"> Sec </td>
                        <th class="text-right">
                            Control Sec. Range control + 2Sce.
                        </th>
                    </tr>
                    <tr>
                        <th colspan="2">APTT/PTT</th>
                        <td>
                            <span class=" text-center"><?=(isset($tests['APTT/PTT']) ? $tests['APTT/PTT'] : '')?></span>
                        </td>
                        <td class="text-center"> Sec </td>
                        <th class="text-right">
                            Control &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Sec
                        </th>
                    </tr>
                    <tr>
                        <th colspan="2">Platelet Count</th>
                        <td>
                            <span class=" text-center"><?=(isset($tests['Platelet_Count']) ? $tests['Platelet_Count'] : '')?></span>
                        </td>
                        <td class="text-center">  </td>
                        <th class="text-right">
                            1.50.000-4.50.000 per cu mm Control Sec
                        </th>
                    </tr>
                    <tr>
                        <th colspan="2">Blood Film:</th>
                        <td>
                            <span class=" text-center"><?=(isset($tests['Blood_Film']) ? $tests['Blood_Film'] : '')?></span>
                        </td>
                        <td class="text-center">  </td>
                        <th class="text-right">
                        </th>
                    </tr>
                    <tr>
                        <th colspan="2">Comment:</th>
                        <td>
                            <span class=" text-center"><?=(isset($tests['Comment']) ? $tests['Comment'] : '')?></span>
                        </td>
                        <td class="text-center">  </td>
                        <th class="text-right">
                        </th>
                    </tr>
                    <tr>
                        <th colspan="2">OTHERS</th>
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
                <?php echo form_close(); ?>
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