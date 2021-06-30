<div class="panel panel-default">
    <div class="panel-heading">
        <div class="panal-header-title pull-left">
            <h1>All Admission</h1>
        </div>
    </div>

    <div class="panel-body">
        <?php  echo $this->session->flashdata('confirmation'); ?>
        <form action="" method="post" class="form-horizontal" >
            <div class="form-group">
                
                <div class="col-md-2">
                    <div class="input-group date" id="datetimepicker1">
                        <input type="text" id="dateFrom" name="search[dateFrom]" class="form-control" placeholder="Form">
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>
                
                <div class="col-md-2">
                    <div class="input-group date" id="datetimepicker2">
                        <input type="text" id="dateTo" name="search[dateTo]" class="form-control" placeholder="To">
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>
                
                <div class="col-md-2">
                    <input name="search[contact]" placeholder="Mobile No" class="form-control">
                </div>
                
                <div class="col-md-2">
                    <input name="search[room_no]" placeholder="Room No" class="form-control">
                </div>
                
                <div class="col-md-2">
                    <select name="search[gender]" class="form-control selectpicker" data-show-subtext="true" data-live-search="true">
                        <option value="" selected disabled> -- Select A Gender -- </option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
                
                <div class="col-md-1">
                    <select name="search[admit_type]" class="form-control selectpicker" data-show-subtext="true" data-live-search="true">
                        <option value="" selected disabled>Type</option>
                        <option value="cabin">Cabin</option>
                        <option value="seat">Seat</option>
                    </select>
                </div>
                
                <div class="col-md-1">
                    <div class="pull-right">
                        <div class="btn-group">
                            <input type="submit" value="Show" class="btn btn-primary">
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="panel-footer">&nbsp;</div>
</div>

<div class="panel panel-default">
    <div class="panel-heading">
        <div class="panal-header-title pull-left">
            <h1>All Admissions </h1>
        </div>
        <a href="#" class="pull-right none" style="margin-top: 0px; font-size: 14px;" onclick="window.print()">
            <i class="fa fa-print"></i>
            Print
        </a>
    </div>

    <div class="panel-body">
        <table class="table table-bordered" ng-cloak>
            <tr>
                <th style="width: 40px;">SL</th>
                <th>Date</th>
                <th>Name</th>
                <th>Gender</th>
                <th>Age</th>
                <th>Contact</th>
                <th>Admit Type</th>
                <th>Room No</th>
                <th>Seat No</th>
                <th>Cabin No</th>
                <th>No Of Day</th>
                <th>Pair</th>
                <th>Amount</th>
                <th>due</th>
                <th class="none">Action</th>
            </tr>
            <?php $total_due = $total = 0; if($admissions) foreach($admissions as $key=>$value) { ?>
            
            <tr>
                <td><?php echo ++$key?></td>
                <td><?php echo $value->date?></td>
                <td><?php echo $value->name?></td>
                <td><?php echo $value->gender?></td>
                <td><?php echo $value->age?></td>
                <td><?php echo $value->contact?></td>
                <td><?php echo ucfirst($value->admit_type)?></td>
                <td><?php echo $value->room_no?></td>
                <td><?php echo $value->seat_no?></td>
                <td><?php echo $value->cabin_no?></td>
                <td><?php echo $value->pair?></td>
                <td><?php echo $value->days?></td>
                <td><?php echo $value->amount; $total += $value->amount; ?></td>
                <td><?php echo $value->due; $total_due += $value->due; ?></td>
                <td>
                    <div class="btn-group">
                        <a href="<?php echo site_url('patient_admission/patient_admission/view/'.$value->id)?>" class="btn btn-info"><i class="fa fa-eye"></i></a>
                        <a href="<?php echo site_url('patient_admission/patient_admission/edit_admission/'.$value->id)?>" class="btn btn-info"><i class="fa fa-pencil"></i></a>
                        <a href="<?php echo site_url('patient_admission/due_collection/index/'.$value->id)?>" class="btn btn-success"><i class="fa fa-history"></i></a>
                        <a onclick="return confirm('Are You sure Delete This Data??')" href="<?php echo site_url('patient_admission/patient_admission/admission_delete/'.$value->id)?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                    </div>
                </td>
            </tr>
            <?php } ?>
            <tr>
                <th colspan="12" class="text-right">Total</th>
                <th style="text-align:left"><?php echo $total;?>TK</th>
                <th colspan="2" style="text-align:left"><?php echo $total_due;?>TK</th>
            </tr>
        </table>
    </div>
    <div class="panel-footer">&nbsp;</div>
</div>
<script>
    $('#datetimepicker1').datetimepicker({
        format: 'YYYY-MM-DD'
    });
    $('#datetimepicker2').datetimepicker({
        format: 'YYYY-MM-DD'
    });
</script>