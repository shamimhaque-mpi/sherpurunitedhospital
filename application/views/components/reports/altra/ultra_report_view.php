<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css" />
<style>
   .mb-3 {margin-bottom: 16px !important;}
   .mb-2 {margin-bottom: 8px !important;}
   .p-0 {padding: 0 !important;}
   .pr-2 {padding-right: 8px !important;}
   .input-group-btn {width: 24% !important; z-index: 9;}
   .custom_padding {padding: 0 9px !important;}
   .content-fixed-nav {z-index: 9;}
   .hide {display: none;}
   .table caption {font-weight: 600;color: #111;}
    .header_table .table-bordered>tbody>tr>td, 
    .header_table .table-bordered>tbody>tr>th, 
    .header_table .table-bordered>thead>tr>td, 
    .header_table .table-bordered>thead>tr>th {
        padding: 8px 12px !important;
        border-color: #ccc !important;
    } 
    textarea {
       border: none;
       width: 100%;
    }
   .text {position: relative;}
   .text pre {
       background: none;
       padding: 0;
       margin: 0;
       border: 0;
   }
   .text .input_file {
       padding-left: 10px;
       position: absolute;
       outline :none;
       border: none;
       height: 100%;
       width: 100%;
       opacity: 0;
       left: 0;
       top: 0;
   }
   .text span {
       display: block;
       padding: 10px;
   }
    .text .input_file:focus {opacity: 1;}
    table.visible tr td {
       padding: 0px;
       text-align: left!important;
    }
    table.visible tr td:first-child {
       text-align: center;
       padding: 5px;
    }
    .report_type {
        border: 1px solid #ddd;
        margin: 35px 0 16px;
        text-align: center;
        padding: 10px 15px;
        font-weight: 600;
        font-size: 15px;
        color: #515151;
        text-transform: uppercase;
    }
    .comment_box {
        border: 1px solid #ddd;
        padding: 12px 8px;
        font-size: 15px;
        color: #515151;
    }
    @media print {
        .report_type {border: 1px solid #000;}
        .comment_box {
            border: 1px solid #000;
            padding: 2px 8px;
        }
    }
</style>
<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panal-header-title">
                    <h1 class="pull-left">Ultrasonography Report</h1>
                    <a href="" class="pull-right" style="margin-top: 0px; font-size: 14px;" onclick="window.print()">
                        <i class="fa fa-print"></i> Print
                    </a>
                </div>
            </div>
            <div class="panel-body">
                <?php  $this->load->view('print'); ?>
                
                <div class="row">
                   <div class="col-md-12">
                       <div class="header_table">  
                            <table class="table table-bordered">
                                <tr>
                                    <?php 
                                        $p_id = $this->uri->segment(4);
                                        $patient_info = $this->action->read('ultra_patient', array('patient_id' => $p_id));
                                    ?>
                                    <td width="173">Name</td>
                                    <th width="345">
                                        <span><?php if(!empty($patient_info)){ echo $patient_info[0]->name; } ?></span>
                                    </th>
                                    
                                    <td width="173">ID:</td>
                                    <th>
                                        <?php if(!empty($patient_info)){ echo $patient_info[0]->patient_id; } ?>
                                    </th>
                                </tr>
                                <tr>
                                    <td>Age</td>
                                    <th>
                                       <?php if(!empty($patient_info)){ echo $patient_info[0]->age; } ?>
                                    </th>
                                    
                                    <td>Date </td>
                                    <th style="white-space: nowrap;">
                                        <?php if(!empty($patient_info)){ echo $patient_info[0]->created_at; } ?>
                                    </th>
                                </tr>
                                <tr>
                                    <td>Gender </td>
                                    <th style="white-space: nowrap;">
                                        <?php if(!empty($patient_info)){ echo $patient_info[0]->gender; } ?>
                                    </th>
                                    
                                    <td>Specimen</td>
                                    <th>
                                        <span id="specimen_text" class="none">
                                           <?php if(!empty($patient_info)){ echo filter($patient_info[0]->specimen); } ?>
                                        </span>
                                        <span id="specimen_text2" class="hide">
                                            <?php if(!empty($patient_info)){ echo filter($patient_info[0]->specimen); } ?>
                                        </span>
                                    </th>
                                </tr>
                                <tr>
                                    <td>Refd. By</td>
                                    <th colspan="3">
                                        <?php if(!empty($patient_info)){ echo $patient_info[0]->reff_doctor; } ?>
                                    </th>
                                </tr>
                            </table>
                        </div>
                        
                        <p style="margin-top: -10px; margin-bottom: 25px;">Thank you for referring this case, Findings are given below.</p>
                        <h3 class="report_type" id="report_title">Ultrasonography Report</h3>
                        
                        <table class="table table-bordered print_view">
                            <tr class="none">
                                <th width="180">Test Name</th>
                                <th>Report</th> 
                            </tr>
                            <?php $comment = ''; foreach($result as $key => $row){ if(strtolower($row->test_name) != 'comments'){ ?>
                            <tr>
                                <th> <?php echo filter($row->test_name); ?> </th>
                                <td> :
                                    <?php echo filter($row->test_report); ?>
                                </td>
                            </tr>
                            <?php }} if(strtolower($row->test_name) == 'comments'){$comment = $row->test_report; } ?>
                        </table>
                        
                        <p class="comment_box">Comments : <?=($comment)?></p>
                        
                        <p>Adv: Follow Up</p>
                    </div>
                </div>
            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>
<style>
    @media print {
        .header_table {
            border: 1px solid #000 !important;
            margin-bottom: 20px;
            padding: 8px 1px;
        }
        .header_table .table {margin: 0;}
        .header_table .table-bordered>tbody>tr>td, 
        .header_table .table-bordered>tbody>tr>th, 
        .header_table .table-bordered>tfoot>tr>td, 
        .header_table .table-bordered>tfoot>tr>th, 
        .header_table .table-bordered>thead>tr>td, 
        .header_table .table-bordered>thead>tr>th {
            border: 1px solid #fff !important;
            padding: 0 8px !important;
            width: auto !important;
        }
        .print_view>tbody>tr>td,
        .print_view>tbody>tr>th {
             vertical-align: top !important;
             padding: 0 8px !important;
             border: none !important;
        }
        .print_view>tbody>tr>th {white-space: nowrap;}
    }
</style>

<script>
    var specimen = document.querySelector('#specimen_text');
    var specimen2 = document.querySelector('#specimen_text2');
    var report_title = document.querySelector('#report_title');
    if((specimen.innerText).slice(0, 9)=="Pregnancy"){
        report_title.innerText = "USG OF FETAL CONDITION.";
        specimen.innerText  = (specimen.innerText).slice(0, 18) + ((specimen.innerText).slice(18)).replace(' ', '-');
        specimen2.innerText = (specimen.innerText).slice(0, 18);
    }
   $('.selectpicker').selectpicker();
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>