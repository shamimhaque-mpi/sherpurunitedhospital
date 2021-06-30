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
   .content-fixed-nav {
   z-index: 9;
   }
   .hide {display: none;}
   .header-table tr th {width: 150px;}
   /*.header-table tr, .header-table tr th, .header-table tr td {border: 1px solid transparent !important;}*/
   .header-table tr, .header-table tr th, .header-table tr td {padding: 5px !important;}
   .table caption {font-weight: 600;color: #111;}
   textarea {
   width: 100%;
   border: none;
   }
   .text{
   position: relative;
   }
   .text pre{
   margin: 0;
   padding: 0;
   background: none;
   border: 0;
   }
   .text .input_file{
   position: absolute;
   top: 0;
   left: 0;
   width: 100%;
   height: 100%;
   padding-left: 10px;
   opacity: 0;
   outline :none;
   border: none;
   }
   .text span{
   padding: 10px;
   display: block;
   }
   .text .input_file:focus {
   opacity: 1;
   }
   table.visible tr td {
   padding: 0px;
   text-align: left!important;
   }
   table.visible tr td:first-child {
   text-align: center;
   padding: 5px;
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
            <div class="row">
               <div class="col-md-12">
                  <table class="table table-bordered header-table">
                     <tr>
                       
                        <th>Lab. No.</th>
                        <td width="300">
                           <div class="text">
                              <span></span>
                           </div>
                        </td>
                        
                        <th>Patient Name</th>
                        <td width="300">
                           <div class="text">
                              <span></span>
                           </div>
                        </td>
                        <th>AGE</th>
                        <td>
                           <div class="text">
                              <span></span>
                           </div>
                        </td>
                     </tr>
                     <tr>
                        <th>Refd: BY Dr./Prof.</th>
                        <td>
                           
                        </td>
                        <th>DATE</th>
                        <td>
                            
                        </td>
                     </tr>
                     
                  </table>
                  
                  <table class="table table-bordered header-table">
                     <tr>
                        <th style="width: 15px;">Sl.</th>
                        <th>Test Name</th>
                        <th>Report</th>
                     </tr>
                     <?php foreach($result as $key => $row){ ?>
                     <tr>
                         <td><?= ($key+1); ?></td>
                        <td>
                            <?php echo filter($row->test_name); ?>
                        </td>
                        <td>
                            <?php echo filter($row->test_report); ?>
                        </td>
                     </tr>
                     <?php } ?>
                     
                  </table>
                  
               </div>
            </div>
         </div>
         <div class="panel-footer">&nbsp;</div>
      </div>
   </div>
</div>
<script>
   $('.selectpicker').selectpicker();
</script>
<!--<script src="<?php echo site_url('public/js/testController.js')?>"></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>