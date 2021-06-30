<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css" />
<style>
@media print{
    aside, nav, .none, .panel-heading, .panel-footer{display: none !important;}
        .panel{border: 1px solid transparent;left: 0px;position: absolute;top: 0px;width: 100%;}
        .hide{display: block !important;}
        .block-hide{display: none;}
        table.visible tr th, table.visible tr td, table.visible{border: transparent!important;}
        
    }
    .mb-3 {margin-bottom: 16px !important;}
    .mb-2 {margin-bottom: 8px !important;}
    .p-0 {padding: 0 !important;}
    .pr-2 {padding-right: 8px !important;}
    .input-group-btn {width: 24% !important; z-index: 9;}
    .custom_padding {padding: 0 9px !important;}
    .content-fixed-nav {z-index: 9;}
    .hide {display: none;}
    .header-table tr th {width: 150px;}
    /*.header-table tr, .header-table tr th, .header-table tr td {border: 1px solid transparent !important;}*/
    .header-table tr, .header-table tr th, .header-table tr td {padding: 5px !important;}
    .table caption {font-weight: 600;color: #111;}
    .ultra_title {
        border: 1px solid #aaa;
        margin: 35px 0 16px;
        text-align: center;
        padding: 10px 15px;
        font-weight: 600;
        font-size: 15px;
        color: #515151;
        text-transform: uppercase;
    }
    textarea {
        border: none;
        width: 100%;
    }
    .text {
        position: relative;
        overflow: hidden;
    }
    .text pre {
        background: none;
        padding: 0;
        border: 0;
        margin: 0;
    }
    .text .input_file {
        position: absolute;
        outline :none;
        border: none;
        height: 100%;
        width: 100%;
        opacity: 0;
        padding: 0;
        left: 0;
        top: 0;
    }
    .text span {
        min-height: 20px;
        display: block;
        padding: 0;
    }
    .text .input_file:focus {opacity: 1;}
    table.visible tr td {text-align: left!important;}
    table.visible tr td:first-child {
        text-align: center;
        padding: 5px;
    }
    @font-face {
      font-family: 'time-new-roman';
      src: url(<?php echo site_url('private/fonts/times-new-roman.ttf');?>);
    }
    .header-table tr td, .header-table tr th {
        padding: 8px!important;
    }
</style>

<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panal-header-title">
                    <h1 class="pull-left">New Report</h1>
                    <a href="#" class="pull-right" style="margin-top: 0px; font-size: 14px;" onclick="window.print()">
                        <i class="fa fa-print"></i> Print
                    </a>
                </div>
            </div>
            <div class="panel-body">
                <div class="no-title">&nbsp;</div>
                <?php  $this->load->view('print'); ?>
                <?php   echo $this->session->flashdata('confirmation'); 
                /* horizontal form */
                $attribute = array('name' => '','class' => 'form-horizontal','id' => '');
                echo form_open('', $attribute); ?>
                    <div class="form-group mb-5 none">
                        <label class="col-md-1 control-label">Type </label>
                            <div class="col-md-3">
                            <select name="specimen" class="selectpicker form-control" data-show-subtext="true" data-live-search="true" id="specimen" required>
                                <option value="" selected disabled>&nbsp;Select Specimen</option>
                                <option value="whole_abdomen" <?=(isset($_POST['specimen'])?($_POST['specimen']=='whole_abdomen' ? "selected":''):'')?>>&nbsp;Whole Abdomen</option>
                                <option value="lower_abdomen" <?=(isset($_POST['specimen'])?($_POST['specimen']=='lower_abdomen' ? "selected":''):'')?>>&nbsp;Lower Abdomen</option>
                                <option value="kub_and_prostate" <?=(isset($_POST['specimen'])?($_POST['specimen']=='kub_and_prostate' ? "selected":''):'')?>>&nbsp;KUB AND PROSTATE</option>
                                <option value="whole_abdomen_female" <?=(isset($_POST['specimen'])?($_POST['specimen']=='whole_abdomen_female' ? "selected":''):'')?>>&nbsp;Whole Abdomen Female</option>
                                
                                <option value="pregnancy_profile_5_7" <?=(isset($_POST['specimen'])?($_POST['specimen']=='pregnancy_profile_5_7' ? "selected":''):'')?>>&nbsp;Pregnancy Profile 5-7</option>
                                <option value="pregnancy_profile_8_12" <?=(isset($_POST['specimen'])?($_POST['specimen']=='pregnancy_profile_8_12' ? "selected":''):'')?>>&nbsp;Pregnancy Profile 8-12</option>
                                <option value="pregnancy_profile_15_24" <?=(isset($_POST['specimen'])?($_POST['specimen']=='pregnancy_profile_15_24' ? "selected":''):'')?>>&nbsp;Pregnancy Profile 15-24</option>
                                <option value="pregnancy_profile_25_40" <?=(isset($_POST['specimen'])?($_POST['specimen']=='pregnancy_profile_25_40' ? "selected":''):'')?>>&nbsp;Pregnancy Profile 25-40</option>
                                <!--<option value="pregnancy_profile" <?=(isset($_POST['specimen'])?($_POST['specimen']=='pregnancy_profile' ? "selected":''):'')?>>&nbsp;Pregnancy Profile</option>-->
                            </select>
                        </div>
                        <div class="col-md-3">
                            <select name="patient_id" class="selectpicker form-control" data-show-subtext="true" data-live-search="true" id="specimen" required>
                                <option value="" selected disabled>&nbsp;Select a Patient</option>
                                <?php if($all_patient) foreach($all_patient as $key=>$value): if($value->name!=''){ ?>
                                    <option value="<?php echo $value->id;?>" <?=(isset($_POST['patient_id'])?($value->id==$_POST['patient_id']?'selected':''):'')?>>&nbsp;<?=($value->name)?></option>
                                <?php } endforeach;?>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <div class="btn-group">
                                <input class="btn btn-primary" type="submit" value="Search">
                            </div>
                        </div>
                    </div>
                </form>
                
                <?php 
                    if($_POST) { 
                        $patient = get_result('patients', ['id'=>$_POST['patient_id']]);
                ?>
                    <form action="<?php echo site_url('reports/ultra_report/save')?>" method="POST">
                        <input type="hidden" name="patient_id" value="<?php echo $_POST['patient_id']?>">
                        <div class="row visible">
                            <div class="col-md-offset-1 col-md-10">
                                <table class="table table-bordered header-table">
                                    <tr>
                                        <td>NAME</td>
                                        <th width="300">
                                            <div class="text">
                                                <input type="text" name="name" class="input_file"  value="<?=($patient ? $patient[0]->name : '')?>" style="border: none; outline: 0">
                                                <span><?=($patient ? $patient[0]->name : '')?></span>
                                            </div>
                                        </th>
                                        <td>ID</td>
                                        <th width="300">
                                            <div class="text">
                                                <input type="text" name="pid" class="input_file"  value="<?=($patient ? $patient[0]->pid : '')?>" style="border: none; outline: 0" readonly>
                                                <span><?=($patient ? $patient[0]->pid : '')?></span>
                                            </div>
                                        </th>
                                    </tr>
                                    <tr>
                                        <td>AGE</td>
                                        <th>
                                            <div class="text">
                                                <input type="text" name="age" class="input_file" value="<?=($patient ? $patient[0]->age : '')?>" style="border: none; outline: 0">
                                                <span><?=($patient ? $patient[0]->age : '')?></span>
                                            </div>
                                        </th>
                                        <td>DATE</td>
                                        <th>
                                            <input type="hidden" name="created_at" value="<?php echo date("Y-m-d"); ?>" >  
                                            <?php echo date("Y-m-d G.i:s", time()); ?>
                                        </th>
                                    </tr>
                                    <tr>
                                        <td>GENDER</td>
                                        <th>
                                            <div class="text">
                                                <input type="text" name="gender" class="input_file" value="<?=($patient ? $patient[0]->gender : '')?>" style="border: none; outline: 0" readonly>
                                                <span><?=($patient ? $patient[0]->gender : '')?></span>
                                            </div>
                                        </th>
                                        <td>SPECIMEN</td>
                                        <th>
                                            <div id="specimen_text"><?=(isset($_POST['specimen'])? filter($_POST['specimen']):'')?></div>
                                            <input type="hidden" name="specimen_name" value="<?php if(!empty($_POST['specimen'])){ echo $_POST['specimen']; }else{ echo ''; } ?>" > 
                                        </th>
                                    </tr>
                                    <tr>
                                        <td>REFD : BY DR. :</td>
                                        <th colspan="3">
                                            <div class="text">
                                                <input type="text" name="reff_doctor"  class="input_file" value="" style="border: none; outline: 0">
                                                <span></span>
                                            </div>
                                        </th>
                                    </tr>
                                </table>
                                <p style="margin-top: -10px; margin-bottom: 25px;">Thank you for referring this case, Findings are given below.</p>
                            
                                <?php $this->load->view('components/reports/altra/'.$_POST['specimen'].'.php'); ?>
                                
                                <div class="form-group">
                                    <div class="btn-group pull-right">
                                        <input class="btn btn-primary" type="submit" name="save" value="Save">
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                </form>        
                   
                <?php } ?>
                
                
            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>

    </div>
</div>
<script>
    var specimen = document.querySelector('#specimen_text');
    if((specimen.innerText).slice(0, 9)=="Pregnancy"){
        specimen.innerText = (specimen.innerText).slice(0, 18) + ((specimen.innerText).slice(18)).replace(' ', '-');
    }
    $('.selectpicker').selectpicker();
</script>
<!--<script src="<?php echo site_url('public/js/testController.js')?>"></script>-->

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>