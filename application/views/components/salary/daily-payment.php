<style type="text/css">
    .info-view {
        width: 100%;
        max-width: 230px;
        max-height: 230px;
        border: 1px solid #ddd;
        padding: 5px;
        text-align: center;
    }

    .table tr td.input {
        padding: 0px !important;
    }
    .table tr td.not-input {
        padding: 0px 8px !important;
        vertical-align: middle !important;
    }



    .custom-table tr td .form-control {
        border: transparent;
    }

    @media print {
        aside, nav, .none, .panel-heading, .panel-footer {
            display: none !important;
        }

        .panel {
            border: 1px solid transparent;
            left: 0px;
            position: absolute;
            top: 0px;
            width: 100%;
        }

        .hide {
            display: block !important;
        }
    }
</style>

<div class="container-fluid" ng-controller="dateWisePaymentCtrl" ng-cloak>

    <div class="row">
        <?php echo $this->session->flashdata('confirmation'); ?>

        <div class="panel panel-default">

            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left"><h1>Daily Wages </h1></div>
            </div>


            <div class="panel-body">

                <?php echo form_open('', ['class' => 'form-horizontal']); ?>
                <div class="form-group">
                    <label class="col-md-3 control-label"> Date <span class="req">*</span> </label>
                    <div class="col-md-5">
                        <div class="input-group date" id="datetimepicker">
                            <input type="text" name="date" id="dateFrom" class="form-control"
                                   value="<?= date('Y-m-d') ?>"
                                   placeholder="YYYY-MM-DD">
                            <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Type <span class="req">*</span></label>
                    <div class="col-md-5">
                        <select name="type" ng-model="type" class="form-control" required>
                            <option value="" selected disabled>-- Select type --</option>
                            <option value="Daily" <?php echo(!empty($_POST['type']) && $_POST['type'] == 'Daily' ? 'selected' : ''); ?>>
                                Daily
                            </option>
                            <option value="Weekly" <?php echo(!empty($_POST['type']) && $_POST['type'] == 'Weekly' ? 'selected' : ''); ?>>
                                Weekly
                            </option>
                            <!--<option value="Monthly" <?php /*echo (!empty($_POST['type']) && $_POST['type'] == 'Monthly' ? 'selected' : ''); */ ?>>Monthly</option>-->
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-8 text-right">
                        <button type="button" name="show" class="btn btn-primary" ng-click="getAllEmployeeFn()">Search
                        </button>
                    </div>
                </div>
                <?= form_close() ?>


                <?php echo  form_open('salary/daily_payment/store'); ?>

                <input type="hidden" name="created_at" ng-value="created_at">

                <div ng-if="showResult">
                    <hr>
                    <table class="table table-bordered">
                        <tr>
                            <th width="50"> SL </th>
                            <th>Name</th>
                            <th>Mobile</th>
                            <th width="10%">Attendance</th>
                            <th width="10%">Salary</th>
                            <th width="10%">Bonus</th>
                            <th width="10%">Total Salary</th>
                            <th width="10%">Payment</th>
                        </tr>

                        <tr ng-repeat="row in employeeList">

                            <input type="hidden" name="emp_id[]" ng-value="row.emp_id">

                            <td class="not-input">
                                <label for="{{$index}}">
                                    <input type="checkbox" name="id[]" id="{{$index}}" checked
                                           value="{{$index}}">&nbsp;{{row.sl}}
                                </label>
                            </td>
                            <td class="not-input">{{row.name}}</td>
                            <td class="not-input">{{row.mobile}}</td>
                            <td class="input">
                                <input type="number" name="attendance[]" ng-model="row.attendance" class="form-control">
                            </td>
                            <td class="input">
                                <input type="number" name="salary[]" ng-model="row.salary" class="form-control" step="any" autocomplete="off">
                            </td>
                            <td class="input">
                                <input type="number" name="bonus[]" ng-model="row.bonus" class="form-control" step="any" autocomplete="off">
                            </td>
                            <td class="input">
                                <input type="text" ng-value="getTotalSalaryFn($index)" class="form-control" readonly>
                            </td>
                            <td class="input">
                                <input type="number" name="payment[]" ng-value="row.payment" class="form-control" step="any" autocomplete="off">
                            </td>
                        </tr>
                    </table>

                    <div class="btn-group pull-right">
                        <input type="submit" name="save" value="Paid" class="btn btn-info"/>
                    </div>
                </div>
                <?= form_close() ?>
            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>


<script>
    app.controller('dateWisePaymentCtrl', function ($http, $scope) {

        $scope.showResult = false;
        $scope.created_at = '';

        $scope.employeeList = [];

        $scope.getAllEmployeeFn = function () {

            var payment_date = document.querySelector('#dateFrom').value;

            if (typeof payment_date !== 'undefined' && typeof $scope.type !== 'undefined') {

                $scope.created_at = payment_date;

                $http({
                    method: 'post',
                    url: url + 'result',
                    data: {
                        table: 'employee',
                        cond: {type: $scope.type},
                        select: ['emp_id', 'name', 'mobile', 'present_address', 'employee_salary AS salary']
                    }
                }).success(function (response) {

                    $scope.employeeList = [];

                    if (response.length > 0) {

                        $scope.showResult = true;

                        if ($scope.type == 'Daily') {
                            angular.forEach(response, function (item, index) {

                                item.sl = ++index;
                                item.attendance = 1;
                                item.salary = parseFloat(item.salary);
                                item.bonus = 0;
                                item.total = 0;
                                item.payment = 0;

                                $scope.employeeList.push(item);
                            });
                        } else {
                            angular.forEach(response, function (item, index) {

                                item.sl = ++index;
                                item.attendance = 6;
                                item.salary = parseFloat(item.salary);
                                item.bonus = 0;
                                item.total = 0;
                                item.payment = 0;

                                $scope.employeeList.push(item);
                            });
                        }
                    }else{
                        $scope.showResult = false;
                    }
                });
            }
        };

        $scope.getTotalSalaryFn = function (index) {
            var total = 0;
            var salary = (!isNaN(parseFloat($scope.employeeList[index].salary)) ? parseFloat($scope.employeeList[index].salary) : 0);
            var bonus = (!isNaN(parseFloat($scope.employeeList[index].bonus)) ? parseFloat($scope.employeeList[index].bonus) : 0);
            var attendance = (!isNaN(parseFloat($scope.employeeList[index].attendance)) ? parseFloat($scope.employeeList[index].attendance) : 0);

            total = (salary * attendance) + bonus;
            $scope.employeeList[index].total = total.toFixed(2);
            $scope.employeeList[index].payment = total.toFixed(2);

            return $scope.employeeList[index].total;
        };

    });
</script>

<script>
    $(document).ready(function () {
        $('#datetimepicker').datetimepicker({
            format: 'YYYY-MM-DD',
        });
    });
</script>
