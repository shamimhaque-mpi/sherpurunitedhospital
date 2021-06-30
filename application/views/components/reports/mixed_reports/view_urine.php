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
        .width70 { width: auto !important; }
        .width90 { width: auto !important; }
        .width200 { width: auto !important; }
        .width280 { width: auto !important; }
        .width300 { width: auto !important; }
    }
    .fontsize { font-size: 18px; text-transform: uppercase; padding: 0 !important; }
    .width70 { width: 70px; }
    .width90 { width: 90px; }
    .width200 { width: 200px; }
    .width280 { width: 280px; }
    .width300 { width: 300px; }
    
    .tablewidth {width:150px;}
    .mb-3 { margin-bottom: 16px !important; }
    .mb-2 { margin-bottom: 8px !important; }
    .p-0 { padding: 0 !important; }
    .pr-2 { padding-right: 8px !important; }
    .width25 { width:25%; float:left; text-align:center; }
    .width50 { width:20%; float:left; text-align:center; }
    .width75 { width:75%; float:left; text-align:center; }
</style>

<?php if($patient && $tests){ ?>
<?php
    // echo "<pre>";
    // print_r($tests);
    // die();
?>
<div class="container-fluid">
    <div class="row">

        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panal-header-title">
                    <h1 class="pull-left">Urine Examination Report</h1>
                    <a href="#" class="pull-right" style="margin-top: 0px; font-size: 14px;" onclick="window.print()">
                        <i class="fa fa-print"></i> Print
                    </a>
                </div>
            </div>
            
            <div class="panel-body">
                <!-- Print banner Start Here -->
                <?php   $this->load->view('print');
                        echo $this->session->flashdata('confirmation'); ?>
                <form action="<?=site_url('reports/mixed_reports/store')?>" method="post" class="form-horizontal">
                <!-- Table Header Start Here -->
                <table class="table table-bordered header_table">
                    <tr>
                        <th class="width200 ">Lab. No.</th>
                        <td>
                            <span class=" text-center"><?=($patient->lab_no)?></span>
                        </td>
                        <th class="width90 ">Gender</th>
                        <td class="width200">
                            <span class=" text-center"><?=($patient->gender)?></span>
                        </td>
                        <th class="width70 ">Age</th>
                        <td class="width200">
                            <span class=" text-center"><?=($patient->age)?></span>
                        </td>
                    </tr>
                    <tr>
                        <th class="">Patient Name</th>
                        <td colspan="3">
                            <span class=""><?=($patient->name)?></span>
                        </td>
                        <th class="">Date</th>
                        <td>
                            <span class=""><?=($patient->date)?></span>
                        </td>
                    </tr>
                    <tr>
                        <th class="">Refd: BY Dr./Prof.</th>
                        <td colspan="5">
                            <span class=""><?=($patient->refd_doctor)?></span>
                        </td>
                    </tr>
                </table>
                <!-- Table Header End Here -->
                
                <!-- Table Headline Start Here -->
                <div class="headline">
                    <h4 class="hide text-center" style="margin-top: 10px;">Urine Examination Report</h4>
                </div>
                <!-- Table Headline End Here -->
                
                <!-- Main Table Start Here -->
                <div class="row">
                    <div class="col-xs-6">
                        <table class="table table-bordered table1">
                            <tr>
                                <th colspan="2" class="text-center fontsize">Physical Examination</th>
                            </tr>
                            <tr>
                                <th>Colour</th>
                                <td class="width300">
                                    <span class=" text-center"><?=(isset($tests['Colour']) ? $tests['Colour'] : '')?></span>
                                </td>
                            </tr>
                            <tr>
                                <th>Appearance</th>
                                <td>
                                    <span class=" text-center"><?=(isset($tests['Appearance']) ? $tests['Appearance'] : '')?></span>
                                </td>
                            </tr>
                            <tr>
                                <th>Sediment</th>
                                <td>
                                    <span class=" text-center"><?=(isset($tests['Sediment']) ? $tests['Sediment'] : '')?></span>
                                </td>
                            </tr>
                            <tr>
                                <th>Specific Gravity</th>
                                <td>
                                    <span class=" text-center"><?=(isset($tests['Specific_Gravity']) ? $tests['Specific_Gravity'] : '')?></span>
                                </td>
                            </tr>
                        </table>
                        
                        <table class="table table-bordered table2">
                            <tr>
                                <th colspan="2" class="text-center fontsize">Chemical Examination</th>
                            </tr>
                            <tr>
                                <th>Reaction</th>
                                <td class="width300">
                                    <span class=" text-center"><?=(isset($tests['Reaction']) ? $tests['Reaction'] : '')?></span>
                                </td>
                            </tr>
                            <tr>
                                <th>Excess Of Hosphate</th>
                                <td>
                                    <span class=" text-center"><?=(isset($tests['Excess_Of_Hosphate']) ? $tests['Excess_Of_Hosphate'] : '')?></span>
                                </td>
                            </tr>
                            <tr>
                                <th>Albumin</th>
                                <td>
                                    <span class=" text-center"><?=(isset($tests['Albumin']) ? $tests['Albumin'] : '')?></span>
                                </td>
                            </tr>
                            <tr>
                                <th>Sugar</th>
                                <td>
                                    <span class=" text-center"><?=(isset($tests['Sugar']) ? $tests['Sugar'] : '')?></span>
                                </td>
                            </tr>
                            <tr>
                                <th>Acetone</th>
                                <td>
                                    <span class=" text-center"><?=(isset($tests['Acetone']) ? $tests['Acetone'] : '')?></span>
                                </td>
                            </tr>
                            <tr>
                                <th>Bile Salt</th>
                                <td>
                                    <span class=" text-center"><?=(isset($tests['Bile_Salt']) ? $tests['Bile_Salt'] : '')?></span>
                                </td>
                            </tr>
                            <tr>
                                <th>Urobiliongen</th>
                                <td>
                                    <span class=" text-center"><?=(isset($tests['Urobiliongen']) ? $tests['Urobiliongen'] : '')?></span>
                                </td>
                            </tr>
                        </table>
                    </div>
                    
                    <div class="col-xs-6">
                        <table class="table table-bordered table3">
                            <tr>
                                <th colspan="2" class="text-center fontsize">Microscopic Examination</th>
                            </tr>
                            <tr>
                                <th>Epithelial</th>
                                <td class="width280">
                                    <span class=" text-center"><?=(isset($tests['Epithelial']) ? $tests['Epithelial'] : '')?></span>
                                </td>
                            </tr>
                            <tr>
                                <th>Pus Cells</th>
                                <td>
                                    <span class=" text-center"><?=(isset($tests['Pus_Cells']) ? $tests['Pus_Cells'] : '')?></span>
                                </td>
                            </tr>
                            <tr>
                                <th>RBC</th>
                                <td>
                                    <span class=" text-center"><?=(isset($tests['RBC']) ? $tests['RBC'] : '')?></span>
                                </td>
                            </tr>
                            <tr>
                                <th>Caste</th>
                                <td>
                                    <span class=" text-center"><?=(isset($tests['Caste']) ? $tests['Caste'] : '')?></span>
                                </td>
                            </tr>
                            <tr>
                                <th>Calcium Oxalate</th>
                                <td>
                                    <span class=" text-center"><?=(isset($tests['Calcium_Oxalate']) ? $tests['Calcium_Oxalate'] : '')?></span>
                                </td>
                            </tr>
                            <tr>
                                <th>Uric Acid/Urate</th>
                                <td>
                                    <span class=" text-center"><?=(isset($tests['Uric_Acid/Urate']) ? $tests['Uric_Acid/Urate'] : '')?></span>
                                </td>
                            </tr>
                            <tr>
                                <th>Sulhonamide Crystale</th>
                                <td>
                                    <span class=" text-center"><?=(isset($tests['Sulhonamide_Crystale']) ? $tests['Sulhonamide_Crystale'] : '')?></span>
                                </td>
                            </tr>
                            <tr>
                                <th>Triple Phosphate</th>
                                <td>
                                    <span class=" text-center"><?=(isset($tests['Triple_Phosphate']) ? $tests['Triple_Phosphate'] : '')?></span>
                                </td>
                            </tr>
                            <tr>
                                <th>Amor Phosphate</th>
                                <td>
                                    <span class=" text-center"><?=(isset($tests['Amor_Phosphate']) ? $tests['Amor_Phosphate'] : '')?></span>
                                </td>
                            </tr>
                            <tr>
                                <th>Pregnancy Test</th>
                                <td>
                                    <span class=" text-center"><?=(isset($tests['Pregnancy_Test']) ? $tests['Pregnancy_Test'] : '')?></span>
                                </td>
                            </tr>
                            <tr>
                                <th>Others</th>
                                <td>
                                    <span class=" text-center"><?=(isset($tests['Others']) ? $tests['Others'] : '')?></span>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <!--<div class="col-xs-12">
                        <div class="btn-group none pull-right">
                            <input type="submit" value="Submit" class="btn btn-success">
                        </div>
                    </div>-->
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
<?php } ?>

<script>
    let table1 = Object.values(document.querySelectorAll('.table1 span'));
    let table2 = Object.values(document.querySelectorAll('.table2 span'));
    let table3 = Object.values(document.querySelectorAll('.table3 span'));
    
    let isEmpty = false;
    table1.forEach((x)=>{
        if((x.innerText).length>0){
            isEmpty = true;
        }
        else{
            x.closest('tr').classList.add('none');
        }
    });
    if(!isEmpty){
        table1[0].closest('.table').classList.add('none');
    }
    
    isEmpty = false;
    table2.forEach((x)=>{
        if((x.innerText).length>0){
            isEmpty = true;
        }
        else{
            x.closest('tr').classList.add('none');
        }
    });
    if(!isEmpty){
        table2[0].closest('.table').classList.add('none');
    }
    
    isEmpty = false;
    table3.forEach((x)=>{
        if((x.innerText).length>0){
            isEmpty = true;
        }
        else{
            x.closest('tr').classList.add('none');
        }
    });
    if(!isEmpty){
        table3[0].closest('.table').classList.add('none');
    }
    
</script>