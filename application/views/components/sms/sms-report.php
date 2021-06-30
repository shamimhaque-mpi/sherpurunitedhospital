<div class="container-fluid">
    <div class="row">

        <div class="panel panel-default">

            <div class="panel-heading panal-header">
                <div class="panal-header-title">
                    <h1>SMS Report</h1>
                </div>
            </div>

            <div class="panel-body">

                <div>
                <?php 
                	$sent_sms=0;
                	foreach($all_sms as $sms){
                		$sent_sms+=$sms->total_messages;
                	}

                ?>                                                                                                      
                    <p class="text-center">Total SMS  <strong><?php echo $total_sms; ?></strong>, &nbsp; Total Send SMS : <strong><?php echo $sent_sms; ?></strong>, &nbsp; Remaining SMS : <strong><?php echo $total_sms-$sent_sms; ?></strong></p>
                </div>

                <?php
                $attr=array('class'=>'form-horizontal');
                echo form_open('',$attr); ?>
                    
                <div class="row">
                    <div class="col-md-12">

                        <div class="form-group">

                            <div class="col-md-5">
                                <label class="col-md-4 control-label">From</label>
                                <div class="input-group date" id="datetimepickerSMSFrom">
                                    <input type="text" name="date_from" class="form-control" placeholder="YYYY-MM-DD">
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>

                            <div class="col-md-5">
                                <label class="col-md-4 control-label">To</label>
                                <div class="input-group date" id="datetimepickerSMSTo">
                                    <input type="text" name="date_to" class="form-control" placeholder="YYYY-MM-DD">
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>

                            <div class="col-md-1">
                                <input type="submit" value="Show" name="show_between" class="btn btn-primary">
                            </div>
                        </div>
                    </div>
                </div> 

                <?php echo form_close(); ?>

            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>

        <?php if($sms_record!=null){?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panal-header-title">
                    <h1>Show SMS Report</h1>
                </div>
            </div>
		    
            <div class="panek-body">
                <table class="table table-bordered">
                    <tr>
                        <th>SL</th>
                        <th>Date</th>
                        <th>Mobile Number</th>
                        <th>Message</th>
                    </tr>
		            <?php foreach($sms_record as $key=>$all_sms){?>
                    <tr>
                        <td><?php echo $key+1; ?></td>
                        <td><?php echo $all_sms->delivery_date; ?></td>
                        <td><?php echo $all_sms->mobile; ?></td>
                        <td><?php echo $all_sms->message; ?></td>
                    </tr>
                 <?php } ?>
                </table>
            </div>
            

            <div class="panel-footer">&nbsp;</div>
        </div>
        <?php } ?>
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