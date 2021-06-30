<style>
    @media print{
        aside, nav, .none, .panel-heading, .panel-footer{display: none !important;}
        .panel{
            border: 1px solid transparent;
            left: 0px;
            position: absolute;
            top: 0px;
            width: 100%;
        }
        .hide{display: block !important;}
        .title{font-size: 25px;}
    }
    .red{ color: red; }
</style>

<div class="container-fluid">
    <div class="row">
        <?php  echo $this->session->flashdata('confirmation'); ?>
        <div class="panel panel-default none">

            <div class="panel-heading">
                <div class="panal-header-title pull-left">
                    <h1>All Prescription</h1>
                </div>
            </div>
            <div class="panel-body">
                <?php $attribute = array('class' => 'form-horizontal'); echo form_open('', $attribute); ?>
                 <div class="form-group row">
                    <label class="col-md-2 control-label">Prescription ID</label>
                    <div class="col-md-5">
                        <input type="text" name="search[prescription_id]" class="form-control">
                    </div>
                </div>
                 
                <div class="form-group row">
                    <label class="col-md-2 control-label">From</label>
                    <div class="input-group date col-md-5" id="datetimepickerSMSFrom">
                        <input type="text" name="date[from]" class="form-control" placeholder="YYYY-MM-DD">
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-2 control-label">To</label>
                    <div class="input-group date col-md-5" id="datetimepickerSMSTo">
                        <input type="text" name="date[to]" class="form-control" placeholder="YYYY-MM-DD">
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>

                <div class="col-md-7">
                    <div class="btn-group pull-right">
                        <input type="submit" value="Show" name="find" class="btn btn-primary">
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panal-header-title">
                    <h1 class=" pull-left">See Result</h1>
                    <a class="btn btn-primery pull-right" style="font-size: 14px; margin-top: 0;" onclick="window.print()"><i class="fa fa-print"></i> Print</a>
                </div>
            </div>
            <div class="panel-body">
                <!-- print banner -->
                <img class="img-responsive print-banner hide" src="<?php echo site_url("private/images/_banner.jpg"); ?>" alt="photo not found..!">
                <h4 class="hide text-center" style="margin-top: 0px;">Prescription</h4>
                <table class="table table-bordered table-hover">
                    <tr>
                        <th width="40px">SL</th>
                        <th>Date</th>
                        <th>Prescription ID</th>
                        <th>Patient Name</th>
                        <th>Symptoms</th>
                        <th class="none" width="160px">Action</th>
                    </tr>
                    <?php foreach ($result as $key => $value) { ?>
                    <tr>
                        <td> <?php echo $key+1; ?> </td>
                        <td> <?php echo $value->date; ?> </td>
                        <td> <?php echo $value->prescription_id; ?> </td>
                        <td> <?php echo $value->patient_name; ?> </td>
                        <td> <?php echo $value->symptoms; ?> </td>
                        <td class="none">
                            <a title="View" class="btn btn-primary" href="<?php echo site_url('prescription/prescription/view/'.$value->id);?>"><i class="fa fa-eye" aria-hidden="true"></i></a>
                            <a title="Edit" class="btn btn-warning" href="<?php echo site_url('prescription/prescription/edit/'.$value->id);?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                            <a  title="Delete" class="btn btn-danger" onclick="return confirm('Are you sure to delete this data?');" href="<?php echo site_url('prescription/prescription/delete/'.$value->id);?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>
<script>
    // linking between two date
    $('#datetimepickerSMSFrom').datetimepicker({
        format: 'YYYY-MM-DD',
        useCurrent: false
    });
    $('#datetimepickerSMSTo').datetimepicker({
        format: 'YYYY-MM-DD',
        useCurrent: false
    });
    $("#datetimepickerSMSFrom").on("dp.change", function (e) {
        $('#datetimepickerSMSTo').data("DateTimePicker").minDate(e.date);
    });
    $("#datetimepickerSMSTo").on("dp.change", function (e) {
        $('#datetimepickerSMSFrom').data("DateTimePicker").maxDate(e.date);
    });
</script>