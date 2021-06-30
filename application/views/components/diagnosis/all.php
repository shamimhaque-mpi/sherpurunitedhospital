<div class="container-fluid" ng-controller="allPatientDiagnosisCtrl">
    <div class="row">
        <div class="panel panel-default none">
            <div class="panel-heading">
                <div class="panal-header-title">
                    <h1>All Diagnosis</h1>
                </div>
            </div>
            <div class="panel-body">
                <form ng-submit="allDiagnosisFn()" class="form-horizontal" >
                <div class="form-group">
                    <div class="col-md-2">
                        <div class="input-group date" id="datetimepicker1">
                            <input type="text" id="dateFrom" class="form-control" placeholder="Form">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="input-group date" id="datetimepicker2">
                            <input type="text" id="dateTo" class="form-control" placeholder="To">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <select ng-model="search_alt_doctor_id" class="form-control selectpicker" 
                            data-show-subtext="true" data-live-search="true">
                            <option value="" selected disabled> -- Select Doctor (Ultra) -- </option>
                            <?php foreach($doctors as $key =>$row){ ?>
                            <option value="<?= $row->id; ?>"><?= filter($row->fullName); ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select ng-model="search_test_name" 
                        class="form-control selectpicker" data-show-subtext="true" data-live-search="true" >
                            <option value="" selected disabled> -- Select Test Name -- </option>
                            <?php foreach($allTestName as $key =>$row){ ?>
                            <option value="<?= $row->test_name; ?>"><?= filter($row->test_name); ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-1">
                        <div class="pull-right">
                            <div class="btn-group">
                                <input type="submit" name="show" value="Show" class="btn btn-primary">
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>
        <?php echo $this->session->flashdata('confirmation'); ?>
        <div class="panel panel-default">
            <div class="panel-heading none">
                <div class="panal-header-title pull-left">
                    <h1>All Diagnosis </h1>
                </div>
                <a href="#" class="pull-right none" style="margin-top: 0px; font-size: 14px;" onclick="window.print()">
                    <i class="fa fa-print"></i>
                    Print
                </a>
            </div>
            <div class="panel-body">
                <!-- Print banner Start Here -->
                <?php  $this->load->view('print'); ?>
                
                <h4 class="hide">All Diagnosis</h4>
                <div ng-cloak class="row none" style="margin-bottom:15px;">
                    <div class="col-md-4">
                        <input type="text" ng-model="search" placeholder="Search" class="form-control">
                    </div>
                    <div class="col-md-5">&nbsp;</div>
                    <div class="col-md-3">
                        <div>
                            <span style="margin-left: 55px;line-height: 2.4;font-weight: bold;">
                                Par Page&nbsp;:&nbsp;
                            </span>
                            <select ng-model="perPage" class="form-control" style="width:92px;float:right;">
                                <option value="all">All</option>
                                <option value="10">10</option>
                                <option value="20">20</option>
                                <option value="30">30</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>
                        </div>
                    </div>
                </div>

                <table class="table table-bordered" ng-cloak>
                    <tr>
                        <th class="text-center">SL</th>
                        <th>Date</th>
                        <th>Voucher No</th>
                        <th>Patient ID</th>
                        <th>Patient Name</th>
                        <th>Ultra(Doctor) Fee</th>
                        <th>Grand Total</th>
                        <th>Paid</th>
                        <th>Due</th>
                        <!--<th class="none">Status</th>-->
                        <th class="none">Action</th>
                    </tr>
                    <tr dir-paginate="test in alltestInfo|filter:search|itemsPerPage:perPage|orderBy:sortField:reverse">
                        <td style="width: 40px;">{{$index+1}}</td>
                        <td>{{test.date}}</td>
                        <td>{{test.voucher}}</td>
                        <td>{{test.pid}}</td>
                        <td>{{test.name}}</td>
                        <td>{{test.alt_doctor_fee}}</td>
                        <td>{{test.grand_total}}</td>
                        <td style="color: green;"><b>{{test.paid}}</b></td>
                        <td style="color: red;"><b>{{test.due}}</b></td>
                        
                        <!--<td class="none">
                            <select class="form-control" name="status" ng-init="paymentStatus=test.payment_status"
                                data-pid="{{ test.voucher }}" ng-model="paymentStatus"
                                ng-change="paymentStatusFn(test.voucher, test.contact, test.title, paymentStatus)">
                                <option value="" disabled>--Select Status--</option>
                                <option value="pending">Pending</option>
                                <option value="completed">Completed</option>
                                <option value="processed">Processed</option>
                            </select>
                        </td>-->
                        
                        <td class="none" style="width: 160px;">
                            <?php //if($privilege !='user'){ ?>
                            <?php //if(ck_action("diagnosis_menu","view")){ ?>
                            <a title="View" class="btn btn-primary"
                                href="<?php echo site_url('diagnosis/addNewPatientDiagnosis/voucher?voucher={{test.voucher}}');?>"><i
                                    class="fa fa-eye" aria-hidden="true"></i></a>
                            <?php //} ?>
                            <?php //if(ck_action("diagnosis_menu","edit")){ ?>
                            <a title="Edit" class="btn btn-warning"
                                href="<?php echo site_url('diagnosis/editTest?vno={{test.voucher}}');?>"><i
                                    class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                            <?php //} ?>
                            <?php //if(ck_action("diagnosis_menu","delete")){ ?>
                            <a title="Delete" class="btn btn-danger"
                                onclick="return confirm('Are you sure want to delete this Test info?');"
                                href="<?php echo site_url('diagnosis/deleteTest?vno={{test.voucher}}');?>"><i
                                    class="fa fa-trash-o" aria-hidden="true"></i></a>
                            <?php //} ?>
                            <?php //} ?>
                        </td>
                    </tr>
                    <tr>
                        <th colspan="5" class="text-right">Total</th>
                        <th ng-bind="altraDoctorFeeFn()"></th>
                        <th ng-bind="getGrandTotalFn()"></th>
                        <th ng-bind="getPaidTotalFn()"></th>
                        <th ng-bind="getDueTotalFn()"></th>
                        <!--<th class="none"></th>-->
                        <th class="none"></th>
                    </tr>
                </table>
                <dir-pagination-controls max-size="perPage" direction-links="true" boundary-links="true" class="none">
                </dir-pagination-controls>
            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>
<script>
    $('#datetimepicker1').datetimepicker({
        format: 'YYYY-MM-DD'
    });
    $('#datetimepicker2').datetimepicker({
        format: 'YYYY-MM-DD'
    });
</script>