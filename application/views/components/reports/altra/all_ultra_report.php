<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default none">

            <div class="panel-heading">
                <div class="panal-header-title pull-left">
                    <h1>Search</h1>
                </div>
            </div>

            <div class="panel-body">

                <?php
                echo $this->session->flashdata('confirmation');

                $attr = array("class" => "form-horizontal");
                echo form_open("", $attr);
                ?>
                
                 <?php
                    $all_patient = $this->action->readOrderBy('ultra_patient','name',array(),'asc');
                 ?>
                 <div class="form-group">
                    <!--<label class="col-md-2 control-label"> Patient </label>-->
                    <div class="col-md-4">
                        <div class="input-group" style="width:100%;">
                            <select name="search[patient_id]" class="selectpicker form-control" data-show-subtext="true" data-live-search="true" >
                              <option value="">-- Select Patient --</option>
                               <?php foreach ($all_patient as $val) {?>
                                 <option value="<?php echo $val->patient_id; ?>"><?php echo $val->patient_id.'-'.$val->name; ?></option>
                               <?php } ?>
                             </select>
                        </div>
                    </div>
                    
                    
                    <!--<label class="col-md-2 control-label">From </label>-->
                    <div class="col-md-3">
                        <div class="input-group date" id="datetimepickerFrom">
                            <input type="text" name="date[from]" class="form-control" placeholder="YYYY-MM-DD">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                    
                    
                   <!-- <label class="col-md-2 control-label">To </label>-->
                   <div class="col-md-3">
                        <div class="input-group date" id="datetimepickerTo">
                            <input type="text" name="date[to]" class="form-control" placeholder="YYYY-MM-DD">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                   </div>
                    
                    
                    <div class="col-md-2">
                        <div class="btn-group">
                            <input type="submit" name="show" value="Show" class="btn btn-primary">
                        </div>
                    </div>
                </div>
                   
                    
                <?php echo form_close(); ?>
            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>

        <?php if($result != null){ ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panal-header-title ">
                    <h1 class="pull-left">Result</h1>
                    <a class="btn btn-primery pull-right" style="font-size: 14px; margin-top: 0;" onclick="window.print()"><i class="fa fa-print"></i> Print</a>
                </div>
            </div>

            <div class="panel-body">
                <!-- Print Banner -->
                <?php  $this->load->view('print'); ?>
                
                <h4 class="hide">All Ultra Report</h4>
                <table class="table table-bordered table2">
                    <tr>
                        <th>SL</th>
                        <th>Date</th>
                        <th>Patient Id</th>
                        <th>Name</th>
                        <th>Age</th>
                        <th>SPECIMEN</th>
                        <th class="none text-center" width="216">Action</th>
                    </tr>
                    <?php foreach($result as $key => $row){ ?>
                    <tr>
                        
                        <td style="width: 50px;"><?php echo ($key+1); ?></td>
                        <td><?= $row->created_at; ?></td>
                        <td><?= $row->patient_id; ?></td>
                        <td><?= $row->name; ?></td>
                        <td><?= $row->age; ?></td>
                        <td class="specimen_text"><?= filter($row->specimen); ?></td>

                        <td class="none" style="width: 70px;">
                        <a href="<?php echo site_url('reports/ultra_report/view/'.$row->patient_id); ?>" class="btn btn-info">View </a>
                        <a href="<?php echo site_url('reports/ultra_report/edit/'.$row->patient_id); ?>" class="btn btn-warning"> Edit</a>
                        <a onclick="return confirm('Are you sure to delete this data?');" href="<?php echo site_url('reports/ultra_report/delete/'.$row->patient_id); ?>" class="btn btn-danger">Delete </a>
                        </td>
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
    var specimen = document.querySelectorAll('.specimen_text');
    Object.values(specimen).forEach((val)=>{
        if((val.innerText).slice(0, 9)=="Pregnancy"){
            val.innerText = (val.innerText).slice(0, 18) + ((val.innerText).slice(18)).replace(' ', '-');
        }
    });
    // linking between two date
    $('#datetimepickerFrom').datetimepicker({
        format: 'YYYY-MM-DD',
        useCurrent: false
    });
    $('#datetimepickerTo').datetimepicker({
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