<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css" />
<style>
   @media print{
       aside, nav, .none, .panel-heading, .panel-footer{display: none !important;}
       .panel{border: 1px solid transparent;left: 0px;position: absolute;top: 0px;width: 100%;}
       .hide{display: block !important;}
       .block-hide{display: none;}
       table.visible tr th, table.visible tr td, table.visible{border: transparent!important;}
   }
   .hide {display: none;}
</style>
<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panal-header-title">
                    <h1 class="pull-left">Admission Information</h1>
                    <a href="#" class="pull-right" style="margin-top: 0px; font-size: 14px;" onclick="window.print()">
                        <i class="fa fa-print"></i> Print
                    </a>
                </div>
            </div>
            <?php if($patient_admission):?>
            <div class="panel-body">
                
                <?php  $this->load->view('print'); ?>
                
                <table class="table table-bordered header-table">
                    <tr>
                        <th>Name</th>
                        <td><?=($patient_admission->name ? $patient_admission->name : 'N/A')?></td>
                        <th>Date</th>
                        <td><?=($patient_admission->date)?></td>
                        <th>Gender</th>
                        <td><?=($patient_admission->gender)?></td>
                    </tr>
                    <tr>
                        <th>Seat No</th>
                        <td><?=($patient_admission->seat_no ? $patient_admission->seat_no : 'N/A')?></td>
                        <th>Cabin No</th>
                        <td><?=($patient_admission->cabin_no ? $patient_admission->cabin_no : 'N/A')?></td>
                        <th>Days</th>
                        <td><?=($patient_admission->days)?></td>
                    </tr>
                    <tr>
                        <th>Room No</th>
                        <td><?=($patient_admission->room_no ? $patient_admission->room_no : 'N/A')?></td>
                        <th>Age</th>
                        <td><?=($patient_admission->age ? $patient_admission->age : 'N/A')?></td>
                        <th>Type</th>
                        <td><?=($patient_admission->admit_type)?></td>
                    </tr>
                    <tr>
                        <th>Contact</th>
                        <td><?=($patient_admission->contact ? $patient_admission->contact : 'N/A')?></td>
                        <th>Address</th>
                        <td><?=($patient_admission->address ? $patient_admission->address : 'N/A')?></td>
                        <th>Due</th>
                        <td><?=($patient_admission->due ? $patient_admission->due : 'N/A')?></td>
                    </tr>
                </table>
            </div>
            <?php endif;?>
            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>