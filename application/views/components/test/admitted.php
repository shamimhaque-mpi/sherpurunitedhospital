<style type="text/css">
    .mb15{
        margin-bottom: 15px;
    }
    .cus-table tr td{
        padding: 0 !important;
    }
    .cus-table tr td .form-control{
        border: transparent;
    }
</style>
<div class="container-fluid">
    <div class="row">

        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panal-header-title pull-left">
                    <h1>Admitted Patient</h1>
                </div>
            </div>

            <div class="panel-body">

                <?php $attr = array('class' => 'form-horizontal');
                echo form_open('', $attr); ?>

                <div class="row">
                    <div class="col-md-4 mb15">
                        <label>Patient ID <span class="req">*</span></label>
                        <input type="text" name="patient_id" class="form-control" required>
                    </div>

                    <div class="col-md-4 mb15">
                        <label>Patient Name </label>
                        <input type="text" name="patient_name" class="form-control" readonly>
                    </div>

                    <div class="col-md-4 mb15">
                       <label>Date <span class="req">*</span></label>
                        <div class="input-group date" id="datetimepicker">
                            <input type="text" name="date" class="form-control" placeholder="YYYY-MM-DD" value="<?php echo date('Y-m-d'); ?>">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 mb15">
                        <label>Gender </label>
                        <div class="checkbox">
                            <label for="male" style="padding-left: 0;">
                                <input type="radio" checked name="gender" id="male" value="1"> 
                                Male
                            </label>

                            <label for="female">
                                <input type="radio" name="gender" id="female" value="0"> 
                                Female
                            </label>
                        </div>
                    </div>

                    <div class="col-md-4 mb15">
                        <label>Age </label>
                        <input type="text" name="age" class="form-control" readonly>
                    </div>

                    <div class="col-md-4 mb15">
                        <label>Refered By </label>
                        <input type="text" name="refered_by" class="form-control">
                    </div>
                </div> 

                <hr style="margin-top: 0; border-bottom: 1px solid #ddd;">


                <table class="table cus-table table-bordered">
                    <tr>
                        <th> SL </th>
                        <th> Test Name </th>
                        <th> Test Group </th>
                        <th> Room  </th>
                        <th> Amount  </th>
                        <th> Action  </th>
                    </tr>

                    <tr>
                        <td style="padding: 4px 8px !important;">1</td>

                        <td>
                            <input list="test_group" name="test_group" class="form-control">
                            <datalist id="test_group">
                                <option value="1">
                                <option value="2">
                            </datalist>
                        </td> 

                        <td>
                            <input list="test_name" name="test_name" class="form-control">
                            <datalist id="test_name">
                                <option value="1">
                                <option value="2">
                            </datalist>
                        </td>

                        <td>
                            <input type="number" name="room" class="form-control" step="any" value="100" readonly>
                        </td>
                        
                        <td>
                            <input type="number" name="amount" class="form-control" step="any" value="500" readonly>
                        </td>

                        <td style="width: 92px;">
                            <a class="btn btn-success" href="#"><i class="fa fa-plus" aria-hidden="true"></i></a>
                            <a class="btn btn-danger" href="#"><i class="fa fa-times" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                </table>

                <div class="form-group">
                    <label class="col-md-offset-5 col-md-2 control-label">Sup Total </label>
                    <div class="col-md-5">
                        <input type="number" name="sub_total" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-offset-5 col-md-2 control-label">VAT </label>
                    <div class="col-md-5">
                        <input type="number" name="vat" class="form-control">
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-offset-5 col-md-2 control-label">Total </label>
                    <div class="col-md-5">
                        <input type="number" name="totla" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-offset-5 col-md-2 control-label">Less </label>
                    <div class="col-md-5">
                        <input type="number" name="less" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-offset-5 col-md-2 control-label">Paid </label>
                    <div class="col-md-5">
                        <input type="number" name="paid" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-offset-5 col-md-2 control-label">Due </label>
                    <div class="col-md-5">
                        <input type="number" name="due" class="form-control">
                    </div>
                </div>
               
                <div class="row">
                    <div class="col-md-12">
                        <div class="btn-group pull-right">
                            <input class="btn btn-primary" type="submit" name="createProfileBtn" value="Save">
                            <input class="btn btn-danger" type="reset" value="Clear">
                        </div>
                    </div>
                </div>
                
                <?php echo form_close(); ?>

            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>

<script>
    // linking between two date
    $('#datetimepicker').datetimepicker({
        format: 'YYYY-MM-DD',
        useCurrent: false
    });
  
</script>

