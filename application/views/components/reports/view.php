<style>
    .print_content {position: relative;}
    .print_content .signature_box {
        display: inline-block;
        position: absolute;
        max-width: 220px;
        bottom: 45px;
        right: 55px;
        text-align: center;
    }
    .print_content .signature_box h6 {
        font-weight: 600;
        font-size: 16px;
        color: #000;
        margin-bottom: 5px;
    }
    .print_content .signature_box small {
        font-size: 14px;
        display: block;
        color: #000;
        line-height: 17px;
    }
    .test_table table.table tr th,
    .test_table table.table tr td {padding: 8px 12px;}
    .test_table h4 {
        text-align: center;
        width: fit-content;
        margin: auto;
        background: #ddd;
        padding: 11px 76px;
        margin-top: 60px;
    }
    .hide {display: none;}
    .header-table tr th {width: 220px;}
    .header-table tr, .header-table tr th, .header-table tr td {padding: 5px;}
    .table caption {font-weight: 600;color: #111;position: relative;}
    .group_name {
        background: #222;
        border-radius: 20px;
        margin: 0;
        color: #fff;
        display: inline;
        padding: 4px 20px;
    }
    .print_c {
        position: absolute;
        top: 0;
        right: 0;
    }
    table.table tr th:last-child,
    table.table tr td:last-child {
        text-align: center!important;
    }
    .table_demo table tr td, .table_demo table tr th {
        border-top: none!important;
    }
    
    .parameter_table td {
        font-size: 17px;
        padding: 4px 12px!important;
    }
    
    @media print {
        .print_content {
            min-height: calc(100vh - 325px);
            padding-bottom: 145px;
        }
        .report_lable_box {
            border: 1px solid #000 !important;
            padding: 8px 0;
        }
        .report_lable_box label {
            margin-bottom: 0;
            border: none;
        }
        .report_lable_box label {
            margin-bottom: 0;
            /*border-left: 1px solid black;*/
        }
    }
</style>

<div class="container-fluid">
    <div class="row">
        <?php  echo $this->session->flashdata('confirmation'); ?>
        
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panal-header-title">
                    <h1 class="pull-left">Test Report</h1>
                </div>
            </div>

            <div class="panel-body">
                <?php  $this->load->view('print'); ?>
                
                <div class="report_lable_box">
                    <div class="col-md-6 col-xs-6">
                        <div class="row">
                            <label class="col-xs-4" style="border-left: none">Name </label>
                            <label class="col-xs-8"><strong> <?php echo $patient_info[0]->name; ?></strong></label>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-6">
                        <div class="row">
                            <label class="col-xs-4" style="border-left: none">ID </label>
                            <label class="col-xs-8">
                                <strong><?php echo $patient_info[0]->pid; ?></strong>
                                <input type="hidden" name="pid" value="<?php echo $patient_info[0]->pid; ?>"> 
                            </label>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-6">
                        <div class="row">
                            <label class="col-xs-4" style="border-left: none">Age </label>
                            <label class="col-xs-8"><strong><?php echo $patient_info[0]->age; ?></strong></label>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-6">
                        <div class="row">
                            <label class="col-xs-4">Sample Date </label>
                            <label class="col-xs-8"><strong><?php echo date("Y-m-d G.i:s<br>", time()); ?></strong></label>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-6">
                        <div class="row">
                            <label class="col-xs-4">Gender </label>
                            <label class="col-xs-8"><strong><?php echo $patient_info[0]->gender; ?></strong></label>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-6">
                        <div class="row">
                            <label class="col-xs-4">Delivery Date </label>
                            <label class="col-xs-8"><strong><?php echo date("Y-m-d G.i:s<br>", time()); ?></strong></label>
                        </div>
                    </div>
                    <!--<div class="col-md-6 col-xs-6">
                        <div class="row">
                            <label class="col-xs-4"><strong>Date</strong> </label>
                            <label class="col-xs-8"> &nbsp; <?php echo $patient_info[0]->date; ?></label>
                        </div>
                    </div>-->
                    <!--<div class="col-md-6 col-xs-6">-->
                    <!--    <div class="row">-->
                    <!--        <label class="col-xs-4"><strong>Contact no</strong> </label>-->
                    <!--        <label class="col-xs-8"> &nbsp; <?php echo $patient_info[0]->contact; ?></label>-->
                    <!--    </div>-->
                    <!--</div>-->
                    <!--<div class="col-md-6 col-xs-6">-->
                    <!--    <div class="row">-->
                    <!--        <label class="col-xs-4"><strong>Address</strong> </label>-->
                    <!--        <label class="col-xs-8"> &nbsp; <?php echo $patient_info[0]->address; ?></label>-->
                    <!--    </div>-->
                    <!--</div>-->
                    <div class="col-md-12 col-xs-12">
                        <div class="row">
                            <label class="col-xs-2" style="border-left: none">Refd. By </label>
                            <label class="col-xs-10"> &nbsp; <strong></strong></label>
                        </div>
                    </div>
                </div>
                
                <div class="test_table">
                <?php
                    $groups = [];
                    foreach($all_test as $key=> $row){
                        $groups[$row['group_name']][$key] = $row;
                    }
                    foreach ($groups as $group => $result) { 
                ?>
                    <div class="print_content">
                        <table class="table table-bordered" style="margin-top: 20px;">
                            <tr>
                                <th class="none">SL</th>
                                <th width="25%" class="text-center">TEST NAME</th>
                                <th width="25%" class="text-center">RESULT</th>
                                <th width="25%" class="text-center">UNIT</th>
                                <th width="25%" class="text-center">NORMAL VALUE</th>
                            </tr>
                        </table>
                        
                        <h4 style="margin-bottom:30px"> <?=$group?> <a class="btn btn-primery pull-right none print_btn" style="font-size: 14px; margin-top: 0;" ><i class="fa fa-print"></i> Print</a></h4>
    
                        <?php if(isset($result[0]) && $result[0]['remarks']!=''){  ?>
                            <p><strong>Remarks : </strong><?=(isset($result[0]) ? $result[0]['remarks'] : '')?></p>
                        <?php } ?>
                        
                        <?php foreach($result as $key=> $row){ ?>
                        <div class="table_demo parameter_table">
                            <table class="table">
                                <!--<caption><h3><?=filter($row['test_name'])?></h3></caption>-->
                                <!--<tr>
                                    <th class="none">SL</th>
                                    <th colspan="4"><?=filter($row['test_name'])?></th> 
                                </tr>-->
                                <?php
                                    $comments = '';
                                    if(!empty($row['parameters'])){
                                        $is_duplicate = '';
                                    foreach($row['parameters'] as $p_key=> $p_row){
                                        if($is_duplicate!=$p_row->id){
                                            $is_duplicate = $p_row->id;
                                ?>
                                    <tr>
                                        <td class="none"><?php echo $p_key+1; ?></td>
                                        <td width="25%"><?php echo filter($p_row->parameter_name); ?></td>
                                        <td width="25%" class="text-center"><?=($p_row->value)?></td>
                                        <td width="25%" class="text-center"><?=($p_row->unit) ?></td>
                                        <td width="25%" class="text-center"><?=($p_row->ref_value)?></td>
                                    </tr>
                                <?php }}} ?>
                            </table>
                        </div>
                        <?php } ?>
                        
                        <?php
                            $settings = get_result('theme_setting');
                            if($settings){
                            $settings = json_decode($settings[0]->signature);  
                        ?>
                        <div class="signature_box hide">
                            <h6><?=($settings->name)?></h6>
                            <small><?=($settings->designation)?></small>
                        </div>
                        <?php } ?>
                    </div>
                <?php } ?>
                </div>

                <!--<div style="display: flex;">
                    <strong>Comments : </strong><?=(get_name('patient_histories', 'description', ['pid' => $row['pid']]))?>
                </div>-->
            </div>
            <div class="panel-footer"> </div>
        </div>
    </div>
</div>
<script>
    let print_content = Object.values(document.querySelectorAll('.print_content'));
    let print_btn = Object.values(document.querySelectorAll('.print_btn'));
    
    print_btn.forEach((value, key)=>{
        value.addEventListener('click', function(){
            
            print_content.forEach((tag)=>{
                tag.classList.add('none');
            });
            
            print_content[key].classList.remove('none');
            window.print();
        });
    });
        
</script>
