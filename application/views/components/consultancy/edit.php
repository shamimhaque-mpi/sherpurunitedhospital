<style type="text/css">
    .mb15 {
        margin-bottom: 15px;
    }

    .cus-table tr td {
        padding: 0 !important;
    }

    .cus-table tr td .form-control {
        border: transparent;
    }
</style>

<div class="container-fluid">
    <div class="row" ng-controller="EditConsultancyCtrl">

        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panal-header-title pull-left">
                    <h1>Edit Consultancy</h1>
                </div>
            </div>

            <div class="panel-body">
                <input type="hidden" class="form-control" ng-model="pid"
                    ng-init="pid='<?php echo $this->input->get('id'); ?>'">
                
                <?php 
                echo $this->session->flashdata('confirmation');

                $attr = array('class' => 'form-horizontal');
                echo form_open('consultancy/edit_consultancy/update?pid=' . $this->input->get('pid'), $attr); 
                ?>
                <input type="hidden" name="voucher" class="form-control" ng-value="voucherNo">
                <div class="row">
                    <div class="col-md-4 mb15">
                        <label>Date </label>
                        <div class="input-group date" id="datetimepicker">
                            <input type="text" name="date" class="form-control" placeholder="YYYY-MM-DD"
                                ng-model="date">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>

                    <div class="col-md-4 mb15">
                        <label>Patient ID </label>
                        <input type="text" name="patient_id" ng-model="patient_id" class="form-control"
                            ng-value="patient_id" readonly>
                    </div>
                    <?php /*
                    <div class="col-md-4 mb15">
                        <label>Referred Doctor </label>
                        <input list="refered_by" name="refered_by" ng-model="referedBy" class="form-control">

                        <datalist id="refered_by">
                            <?php foreach ($doctors as $key => $value) {?>
                            <option value="<?php echo $value->fullName; ?>">
                                <?php } ?>
                        </datalist>
                    </div>
                    */ ?>
                    <div class="col-md-4 mb15">
                        <label>Patient Name </label>
                        <input type="text" name="patient_name" ng-model="patient_name" class="form-control">
                    </div>

                </div>


                <div class="row">

                    <div class="col-md-4 mb15">
                        <label>Patient Mobile </label>
                        <input type="text" name="patient_mobile" ng-model="patient_mobile" class="form-control">
                    </div>

                    <div class="col-md-4 mb15">
                        <label>Age </label>
                        <input type="text" name="age" ng-model="age" class="form-control">
                    </div>
                    <div class="col-md-4 mb15">
                        <label>Gender </label>
                        <div class="checkbox">
                            <label for="male" style="padding-left: 0;">
                                <input type="radio" name="gender" id="male" ng-model="gender" value="Male">
                                Male
                            </label>

                            <label for="female">
                                <input type="radio" name="gender" id="female" ng-model="gender" value="Female">
                                Female
                            </label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <?php /* ?>
                    <div class="col-md-4 mb15">
                        <label>PC Doctor </label>
                        <input list="pc_list" name="pc" ng-model="pc" class="form-control">

                        <datalist id="pc_list">
                            <?php foreach ($pc as $key => $value) {?>
                            <option <?php if ($resultset[0]->pc == $value) {echo "selected";} ?>
                                value="<?php echo $value->fullName; ?>">
                                <?php } ?>
                        </datalist>
                    </div>

                    <div class="col-md-4 mb15">
                        <label>Marketer </label>
                        <input list="marketer_list" name="marketer_list" ng-model="marketer" class="form-control">

                        <datalist id="marketer_list">
                            <?php foreach ($marketers as $key => $value) {?>
                            <option value="<?php echo $value->name; ?>">
                                <?php } ?>
                        </datalist>
                    </div>
                    <?php */ ?>

                </div>

                <hr style="margin-top: 0; border-bottom: 1px solid #ddd;">


                <table class="table cus-table table-bordered">
                    <tr>
                        <th> SL </th>
                        <th> Doctor Name </th>
                        <th> Specialised In </th>
                        <th> Room No</th>
                        <th> Fee (TK) </th>
                    </tr>

                    <tr ng-repeat="item in resultset" ng-cloak>
                        <td style="padding: 4px 8px !important;">
                            {{ $index + 1 }}
                            <input type="hidden" name="consultancy_id[]" ng-value="item.consultancy_id">
                        </td>

                        <td>
                            <input list="test-opt" name="doctor_name[]" class="form-control" ng-model="item.doctorName"
                                ng-change="changeOldFn($index)">

                            <datalist id="test-opt">
                                <?php foreach ($doctors as $key => $value) { ?>
                                <option value="<?php echo $value->fullName; ?>">
                                    <?php } ?>
                            </datalist>

                            <input type="hidden" name="doctor_id[]" ng-value="item.doctorId">
                        </td>

                        <td>
                            <input type="text" name="specialised[]" class="form-control" ng-value="item.specialised"
                                readonly>
                        </td>

                        <td>
                            <input type="number" name="room_no[]" class="form-control" step="any" ng-value="item.room">
                        </td>

                        <td>
                            <input type="number" name="fee[]" class="form-control" step="any" ng-value="item.fee"
                                readonly>
                        </td>
                    </tr>
                </table>

                <div class="form-group">
                    <label class="col-md-offset-5 col-md-2 control-label">Subtotal</label>
                    <div class="col-md-5">
                        <input type="number" name="subtotal" ng-value="setSubtotalFn();" class="form-control" readonly>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-offset-5 col-md-2 control-label">Vat </label>
                    <div class="col-md-5">
                        <input type="number" name="vat" ng-model="amount.vat" readonly class="form-control" step="any">
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-offset-5 col-md-2 control-label">Total </label>
                    <div class="col-md-5">
                        <input type="number" name="total" ng-value="getTotalFn()" class="form-control" readonly>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-offset-5 col-md-2 control-label">Less </label>
                    <div class="col-md-5">
                        <input type="number" name="discount" ng-model="amount.discount" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-offset-5 col-md-2 control-label">Grand Total </label>
                    <div class="col-md-5">
                        <input type="number" name="grand_total" ng-value="getGrandTotal()" class="form-control"
                            readonly>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-offset-5 col-md-2 control-label">Paid </label>
                    <div class="col-md-5">
                        <input type="number" name="paid" ng-model="amount.paid" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-offset-5 col-md-2 control-label">Due </label>
                    <div class="col-md-5">
                        <input type="number" readonly name="due" ng-value="getTotalDue()" class="form-control">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="btn-group pull-right">
                            <input class="btn btn-primary" type="submit" name="change" value="Update">
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