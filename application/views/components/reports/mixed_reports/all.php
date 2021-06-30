<style>
    @media print{
        .form-group input.form-control, table.table tr th input.form-control {border: 1px solid transparent;}
        #datetimepicker .input-group-addon {display: none !important;}
        table.table tr th, table.table tr th {padding: 1px 4px !important;}
        .panel-body {padding-bottom: 0 !important;padding-top: 0 !important;}
        .headline {
            text-align: center;
            display:flex;
            justify-content: center;
            align-items: center;
            
        }
        .form-group {margin-bottom: 0 !important;}
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
    .mb-3 {margin-bottom: 16px !important;}
    .mb-2 {margin-bottom: 8px !important;}
    .p-0 {padding: 0 !important;}
    .pr-2 {padding-right: 8px !important;}
    .width25 { width:25%; float:left; text-align:center; }
    .width50 { width:20%; float:left; text-align:center; }
    .width75 { width:75%; float:left; text-align:center; }
</style>


<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default none">
            <div class="panel-heading">
                <div class="panal-header-title">
                    <div class="pull-left"><h1>All Reports</h1></div>
                </div>
            </div>

            <div class="panel-body">

                <?php $attr = array('class' => 'form-horizontal');
                echo form_open('', $attr); ?>

                <div class="form-group">
                    <label class="col-md-2 control-label"> Type</label>
                    <div class="col-md-5">
                        <select name="type" class="form-control selectpicker" 
                            data-show-subtext="true"
                            data-live-search="true">
                            <option value="" selected disabled>&nbsp;</option>
                            <option value="saber">Serological</option>
                            <option value="biochemical">Biochemical</option>
                            <option value="cbc">CBC</option>
                            <option value="semen">Semen</option>
                            <option value="urine">Urine</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label">Date From</label>
                    <div class="col-md-5">
                        <div class="input-group date" id="datetimepickerFrom">
                            <input type="text" name="date[from]" class="form-control" placeholder="YYYY-MM-DD">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label">To</label>
                    <div class="col-md-5">
                        <div class="input-group date" id="datetimepickerTo">
                            <input type="text" name="date[to]" class="form-control" placeholder="YYYY-MM-DD">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-7">
                        <input type="submit" name="show" value="Show" class="btn btn-primary pull-right">
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>

<div class="container-fluid">
    <div class="row">

        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panal-header-title">
                    <h1 class="pull-left">All Reports</h1>
                </div>
            </div>
            
        
            <div class="panel-body">
                <!-- Print banner Start Here -->
                <?php $this->load->view('print');
                echo $this->session->flashdata('confirmation');?>
                
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th>SL</th>
                            <th>Date</th>
                            <th>Patient</th>
                            <th>Age</th>
                            <th>Refd Dr.</th>
                            <!--<th>Nature of Examination</th>-->
                            <th>Lab. No</th>
                            <th>Type</th>
                            <th>Total Test</th>
                            <th style="width: 160px;">Action</th>
                        </tr>
                        <?php foreach($patients as $key=>$value){ ?>
                        <tr>
                            <td><?=(++$key)?></td>
                            <td><?=($value->date)?></td>
                            <td><?=($value->name)?></td>
                            <td><?=($value->age)?></td>
                            <td><?=($value->refd_doctor)?></td>
                            <!--<td><?php //echo ($value->examination); ?></td>-->
                            <td><?=($value->lab_no)?></td>
                            <td><?= ucwords(($value->type == 'saber' ? "Serological" : $value->type))?></td>
                            <td><?=($value->total_test)?></td>
                            <td class="text-center">
                                <a href="<?php echo site_url('reports/mixed_reports/view_'.($value->type).'/'.$value->id); ?>" class="btn btn-info">View </a>
                                <a onclick="return confirm('Are you sure to delete this data?');" href="<?php echo site_url('reports/mixed_reports/delete/'.$value->id); ?>" class="btn btn-danger">Delete </a>
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
<script>
    
    $('#datetimepickerFrom').datetimepicker({
        format: 'YYYY-MM-DD',
        useCurrent: false
    });
    $('#datetimepickerTo').datetimepicker({
        format: 'YYYY-MM-DD',
        useCurrent: false
    });
    
</script>

