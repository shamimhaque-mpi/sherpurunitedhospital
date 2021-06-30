<style>
.agrement-pic{
    height: 300px;
}
    @media print{
        aside, nav, .none, .panel-heading, .panel-footer{
            display: none !important;
        }
        .panel{
            border: 1px solid transparent;
            left: 0px;
            position: absolute;
            top: 0px;
            width: 100%;
        }
        .hide{
            display: block !important;
        }
        .block-hide{
            display: none;
        }
    }
    .no-padding{

    }
    table.table tr td {
        padding: 0;
    }
    table.table input{
        width: 100%;
        border: 0;
        padding: 0 8px;
    }
</style>

<div class="container-fluid">
    <div class="row">

        <!-- horizontal form -->
        <?php $attr = array ('class' => 'form-horizontal');
         echo form_open('', $attr); ?>

        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panal-header-title pull-left">
                    <h1>Payment</h1>
                </div>
            </div>

            <div class="panel-body no-padding">
                <div class="no-title">&nbsp;</div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Date</label>
                        <div class="col-md-4">
                            <div class="input-group date" id="datetimepickerSMSFrom">
                                <input type="text" name="date" class="form-control" placeholder="YYYY-MM-DD">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Patient ID</label>
                        <div class="col-md-4">
                            <input type="text" name="patient_id" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                            <div class="btn-group pull-right">
                                <input class="btn btn-primary" type="submit" name="show" value="Show">
                            </div>
                        </div>
                    </div>
                    <hr>

                    <div class="col-md-12">
                        <table class="table table-bordered" ng-cloak>
                            <tr>
                                <th class="text-center">Sl</th>
                                <th>Details</th>
                                <th>Total</th>
                                <th>Paid</th>
                                <th>Payments</th>
                                <th>Due</th>
                            </tr>
                            <tr>
                                <td style="text-align: center;">1</td>
                                <td>
                                    <input type="number" name="total" readonly> 
                                </td>
                                <td>
                                   <input type="number" name="total" readonly> 
                                </td>
                                <td>
                                    <input type="number" name="total">
                                </td>
                                <td>
                                    <input type="number" name="total" readonly>
                                </td>
                                <td>
                                    <input type="number" name="total" readonly>
                                </td>
                            </tr>
                        </table>
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="btn-group pull-right">
                                    <input class="btn btn-primary" type="submit" name="createProfileBtn" value="Save" tabindex="16">
                                    <input class="btn btn-danger" type="reset" value="Clear">
                                </div>
                            </div>   
                        </div>
                    </div>
            </div>
        <?php echo form_close(); ?>
    </div>
</div>

<script>
    $('#datetimepickerSMSFrom').datetimepicker({
        format: 'YYYY-MM-DD',
        useCurrent: false
    });
</script>


