<div class="panel panel-default">
    <div class="panel-heading">
        <div class="panal-header-title pull-left">
            <h1>All Collection</h1>
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
            <h1>All Collection </h1>
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
                <th>Mobile</th>
                <th>Paid Amount</th>
                <th class="none">Action</th>
            </tr>
            <?php $total_due = $total = 0; if($all_collection) foreach($all_collection as $key=>$value) { ?>
            <tr>
                <td><?php echo ++$key?></td>
                <td><?php echo $value->date?></td>
                <td><?php echo $value->name?></td>
                <td><?php echo $value->contact?></td>
                <td><?php echo $value->paid?></td>
                <td>
                    <div class="btn-group">
                        <a onclick="return confirm('Are You sure Delete This Data??')" href="<?php echo site_url('patient_admission/due_collection/delete/'.$value->id)?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                    </div>
                </td>
            </tr>
            <?php } ?>
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