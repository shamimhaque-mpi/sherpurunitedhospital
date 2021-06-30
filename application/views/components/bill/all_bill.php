<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css" />
<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panal-header-title">
                    <h1 class="pull-left">All Bill</h1>
                    <a href="#" class="pull-right" style="margin-top: 0px; font-size: 14px;" onclick="window.print()">
                        <i class="fa fa-print"></i> Print
                    </a>
                </div>
            </div>
            <div class="panel-body">
                <?php echo $this->session->flashdata('confirmation'); ?>
                <!-- print banner here -->
                <?php  $this->load->view('print'); ?>
                
                <form action="" method="post">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <div class="input-group date" id="datetimepickerFrom">
                                    <input type="text" name="date[from]" value="<?php echo (isset($_POST['date']['from']) ? $_POST['date']['from'] : date("Y-m-d")); ?>" class="form-control" placeholder="From">
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <div class="input-group date" id="datetimepickerTo">
                                    <input type="text" name="date[to]" value="<?php echo (isset($_POST['date']['to']) ? $_POST['date']['to'] : date("Y-m-d")); ?>" class="form-control" placeholder="To">
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-3">
                            <select name="search[patient_id]"  id="patient_id" class="form-control" ng-model="code">
                                <option value="">Select Patient</option>
                                <?php if($patients) foreach($patients as $value){ ?>
                                <option value="<?php echo $value->id?>" <?php if(isset($_POST['search']['patient_id']) &&  $_POST['search']['patient_id'] == $value->id) echo "selected";?>><?=($value->name)?></option>
                                <?php } ?>
                            </select>
                        </div>
                        
                        <div class="col-md-3">
                            <input type="text" name="search[voucher]" placeholder="Voucher No" class="form-control"> 
                        </div>
                        
                        <div class="col-md-2">
                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" value="Search">
                            </div>
                        </div>
                    </div>
                </form>
                    
                <hr>
                
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th width="50">SL</th>
                            <th>Date</th>
                            <th>Voucher No</th>
                            <th>Patient</th>
                            <th>Bill By</th>
                            <th>Total Qty</th>
                            <th>Grand Total</th>
                            <th class="none" width="142">Action</th>
                        </tr>
                        <?php if($all_bill) foreach($all_bill as $key=>$value){?>
                        <tr>
                            <td><?=(++$key)?></td>
                            <td><?=($value->date)?></td>
                            <td><?=($value->voucher)?></td>
                            <td><?=($value->name)?></td>
                            <td><?=($value->bill_by)?></td>
                            <td><?=($value->total_qty)?></td>
                            <td><?=($value->grand_total)?></td>
                            <td class="none">
                                <div class="btn-group">
                                    <a title="View" class="btn btn-primary" href="<?php echo site_url('bill/bill/view/'.$value->id);?>"><i class="fa fa-eye"></i></a>
                                    <a title="Edit" class="btn btn-success" href="<?php echo site_url('bill/bill/edit/'.$value->voucher);?>"><i class="fa fa-pencil"></i></a>
                                    <a title="Delete" class="btn btn-danger" href="<?php echo site_url('bill/bill/delete/'.$value->voucher);?>" onclick="return confirm('Are You Sure Delete This Data??')"><i class="fa fa-trash"></i></a>
                                </div>
                            </td>
                        </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>

<script>
    $('#patient_id').select2();
    // linking between two date
    $('#datetimepickerFrom').datetimepicker({
        format: 'YYYY-MM-DD',
        useCurrent: false
    });
    $('#datetimepickerTo').datetimepicker({
        format: 'YYYY-MM-DD',
        useCurrent: false
    });
</script>