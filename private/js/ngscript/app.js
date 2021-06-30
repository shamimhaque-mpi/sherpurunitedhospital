var app = angular.module("MainApp", ['ui.select2', 'angularUtils.directives.dirPagination', 'ngSanitize']);

var url = window.location.origin + '/ajax/';
var siteurl = window.location.origin + '/';

// var url = window.location.origin + '/jabusa/ajax/';
// var siteurl = window.location.origin + '/jabusa/';

app.constant('select2Options', 'allowClear:true');

// custom filter in Angular js
app.filter('removeUnderScore', function() {
	return function(input) {
		return input.replace(/_/gi, " ");
	}
});

app.filter('textToLower', function() {
	return function(input) {
		return input.replace(/_/gi, " ").toLowerCase();
	}
});

//remove underscore and ucwords
app.filter("textBeautify", function(){
	return function (str) {
		var str = str.replace(/_/gi, " ").toLowerCase(),
        	txt = str.replace(/\b[a-z]/g, function(letter) {
        		return letter.toUpperCase();
    		});

    	return txt;
    }
});

//remove dash and ucwords
app.filter("removeDash",function(){
	return function (str) {
	  var str = str.replace(/-/gi, " ").toLowerCase();
          txt = str.replace(/\b[a-z]/g, function(letter) {
         return letter.toUpperCase();
     });
    return txt;
   }
});


app.filter('join', function(){
	return function(input) {
		console.log(typeof input);
		return (typeof input==='object') ? "" : input.join();
	}
});


app.filter("showStatus",function(){
	return function(input){
        if(input == 1){
        	return "Available";
        }else{
        	return "Not Available";
        }
	}
});


app.filter("status",function(){
	return function(input){
        if(input == "active"){
        	return "Running";
        }else{
        	return "Blocked";
        }
	}
});


app.filter("fNumber",function(){
	return function(input){
		var myNum = new Intl.NumberFormat('en-IN').format(input);
		return  myNum;
	}
});

// payroll controller
app.controller("PayrollCtrl", ["$scope", "$http", "$window", "$interval", function ($scope, $http, $window, $interval) {
    $scope.profile = {
        image: siteurl + "private/images/default.png",
        active: false
    };

    $scope.basic_salary = "";
    $scope.msg = {active: true, content: ""};

    $scope.getProfileFn = function () {
        var where = {
            table: "employee",
            cond: {"emp_id": $scope.data.eid}
        };

        $http({
            method: "POST",
            url: url + 'read',
            data: where
        }).success(function (response) {
            // get data
            if (response.length == 1) {
                $scope.profile.eid = response[0].emp_id;
                $scope.profile.post = response[0].designation;
                $scope.profile.mobile = response[0].mobile;
                $scope.profile.joining = response[0].joining_date;
                $scope.profile.name = response[0].name;
                $scope.profile.email = response[0].email;
                $scope.profile.image = siteurl + response[0].path;
                $scope.profile.active = true;

                $scope.basic_salary = parseFloat(response[0].employee_salary);
            } else {
                //console.log("Employee not found!");
                $scope.msg.active = false;
                //$scope.msg.content = "Employee not found!";
                $scope.profile = {};
                $scope.profile.image = siteurl + "private/images/default.png";
                $scope.profile.active = false;
                $scope.basic_salary = "";
            }

        });
    }
}]);

app.controller("AdvancedPaymentCtrl", ["$scope", "$http", function ($scope, $http) {
    $scope.advanced_payment = [];
    $scope.total_advanced_payment = 0.00;

    $scope.profile = {
        image: siteurl + "private/images/default.png",
        active: false,
        incentive: false,
        deduction: false,
        bonus: false
    };

    $scope.getEmployeeInfoFn = function (emp_id) {

        var employeeWhere = {
            table: "employee",
            cond: {emp_id: emp_id}
        };

        $http({
            method: "POST",
            url: url + "result",
            data: employeeWhere
        }).success(function (response) {

            if (response.length > 0) {
                $scope.profile.name = response[0].name;
                $scope.profile.post = response[0].designation;
                $scope.profile.mobile = response[0].mobile;
                $scope.profile.email = response[0].email;
                $scope.profile.salary = response[0].employee_salary;
                $scope.profile.joining = response[0].joining_date;
                $scope.profile.image = siteurl + response[0].path;
                $scope.profile.active = true;

                // get all advance salary info
                $scope.getAllAdvance();

            } else {
                $scope.profile = {};

                $scope.profile.image = siteurl + "private/images/default.png";
                $scope.profile.active = false;
                $scope.profile.incentive = false;
                $scope.profile.deduction = false;
            }

        });
    }

    $scope.getAllAdvance = function () {

        if (typeof $scope.emp_id !== 'undefined' && typeof $scope.month !== 'undefined' && typeof $scope.year !== 'undefined') {

            var where = {
                table: "advanced_payment",
                cond: {
                    'emp_id': $scope.emp_id,
                    'YEAR(payment_date)': $scope.year,
                    'MONTH(payment_date)': $scope.month,
                    'trash': '0'
                }
            };

            $http({
                method: "POST",
                url: url + "result",
                data: where
            }).success(function (advanceRes) {

                $scope.advanced_payment = [];
                $scope.total_advanced_payment = 0;

                if (advanceRes.length > 0) {
                    var total = 0.00;
                    var fullMonths = {
                        "01": "January",
                        "02": "February",
                        "03": "March",
                        "04": "April",
                        "05": "May",
                        "06": "June",
                        "07": "July",
                        "08": "August",
                        "09": "September",
                        "10": "October",
                        "11": "November",
                        "12": "December"
                    };
                    angular.forEach(advanceRes, function (row, key) {

                        var date = advanceRes[0].payment_date.split("-");

                        advanceRes[key].year = date[0];
                        advanceRes[key].month = fullMonths[date[1]];

                        total += parseFloat(row.amount);
                    });

                    $scope.advanced_payment = advanceRes;
                    $scope.total_advanced_payment = Math.abs(total.toFixed(2));
                }
            });
        }
    }

}]);

// Incentive Controller
app.controller("IncentiveCtrl", ["$scope", "$http", function ($scope, $http) {
    $scope.profile = {
        image: siteurl + "private/images/default.png",
        active: false
    };

    $scope.incentives = [
        {fields: "HRA", percentage: 0},
        {fields: "DA", percentage: 0},
        {fields: "TA", percentage: 0},
        {fields: "CCA", percentage: 0},
        {fields: "Medical", percentage: 0},
        {fields: "Provident Fund", percentage: 0}
    ];

    $scope.getProfileFn = function () {
        var where = {
            table: "employee",
            cond: {"emp_id": $scope.eid}
        };

        $http({
            method: "POST",
            url: url + 'read',
            data: where
        }).success(function (response) {
            // get data
            if (response.length > 0) {
                $scope.profile.eid = response[0].emp_id;
                $scope.profile.name = response[0].name;
                $scope.profile.post = response[0].designation;
                $scope.profile.mobile = response[0].mobile;
                $scope.profile.email = response[0].email;
                $scope.profile.joining = response[0].joining_date;
                $scope.profile.image = siteurl + response[0].path;

                $scope.profile.active = true;

                // get basic salary
                var transmit = {
                    table: "salary_structure",
                    cond: {eid: $scope.eid}
                };

                $http({
                    method: "POST",
                    url: url + "read",
                    data: transmit
                }).success(function (response) {
                    if (response.length > 0) {
                        $scope.amount = parseFloat(response[0].basic);
                    } else {
                        alert("This employee's basic info not found!");
                    }
                });

                // check incentive active or not
                var transmit = {
                    table: "salary_structure",
                    cond: {"eid": $scope.eid}
                };

                $http({
                    method: "POST",
                    url: url + "read",
                    data: transmit
                }).success(function (response) {
                    if (response[0].incentive === "yes") {
                        var transmit = {
                            table: "incentive_structure",
                            cond: {eid: $scope.eid}
                        };

                        $http({
                            method: "POST",
                            url: url + "read",
                            data: transmit
                        }).success(function (response) {
                            angular.forEach(response, function (row, index) {
                                response[index].percentage = parseFloat(response[index].percentage);
                            });

                            $scope.incentives = response;
                        });
                    }
                });

            } else {
                $scope.profile = {};
                $scope.profile.image = siteurl + "private/images/default.png";
                $scope.profile.active = false;
                $scope.amount = 0.00;
            }

        });
    }

    $scope.totalFn = function (i) {
        var total = 0.00;
        total = $scope.amount * ($scope.incentives[i].percentage / 100);
        total = total.toFixed(2);
        return total;
    }
}]);


// Salary Report
app.controller("SalaryReportCtrl", ["$scope", "$http", function ($scope, $http) {
    $scope.resultset = [];
    $scope.active = false;
    $scope.perPage = 10;

    $scope.getSalaryRecordFn = function () {
        var where = {
            "Year(date)": $scope.where.year,
            "Month(date)": $scope.where.month
        };

        $http({
            method: "POST",
            url: siteurl + "salary/salary/read_salary",
            data: where
        }).success(function (response) {
            if (response.length > 0) {
                $scope.active = true;

                angular.forEach(response, function (row, index) {
                    row.sl = index + 1;
                });

                $scope.resultset = response;
            } else {
                $scope.active = false;
                $scope.resultset = [];
            }

            console.log(response);
        });
    }
}]);


// Bonus Controller
app.controller("BonusCtrl", ["$scope", "$http", function ($scope, $http) {
    $scope.bonuses = [{fields: "", percentage: 0, remarks: ""}];
    $scope.profile = {
        image: siteurl + "private/images/default.png",
        active: false
    };

    $scope.getProfileFn = function () {
        var where = {
            table: "employee",
            cond: {"emp_id": $scope.eid}
        };

        $http({
            method: "POST",
            url: url + 'read',
            data: where
        }).success(function (response) {
            // get data
            if (response.length > 0) {
                $scope.profile.eid = response[0].emp_id;
                $scope.profile.name = response[0].name;
                $scope.profile.post = response[0].designation;
                $scope.profile.mobile = response[0].mobile;
                $scope.profile.email = response[0].email;
                $scope.profile.joining = response[0].joining_date;
                $scope.profile.image = siteurl + response[0].path;

                $scope.profile.active = true;
                //console.log(response);

                // get bonus info
                var transmit = {
                    table: "salary_structure",
                    cond: {eid: $scope.eid}
                };

                $http({
                    method: "POST",
                    url: url + "read",
                    data: transmit
                }).success(function (response) {
                    if (response.length > 0) {
                        if (response[0].bonus === "yes") {
                            // get bonus records
                            var transmit = {
                                table: "bonus_structure",
                                cond: {eid: $scope.eid}
                            };

                            $http({
                                method: "POST",
                                url: url + "read",
                                data: transmit
                            }).success(function (response) {
                                if (response.length > 0) {
                                    angular.forEach(response, function (row, index) {
                                        response[index].percentage = parseFloat(row.percentage);
                                    });

                                    $scope.bonuses = response;
                                } else {
                                    $scope.bonuses = [{fields: "", percentage: 0, remarks: ""}];
                                }
                            });
                        }
                    }
                });
            } else {
                //console.log("Employee not found!");
                $scope.profile = {};
                $scope.profile.image = siteurl + "private/images/default.png";
                $scope.profile.active = false;
            }

        });
    }

    $scope.createRowFn = function () {
        var obj = {fields: "", percentage: 0, remarks: ""};
        $scope.bonuses.push(obj);
    }

    $scope.deleteRowFn = function (index) {
        $scope.bonuses.splice(index, 1);
    }

}]);


// Deduction Controller
app.controller("DeductionCtrl", ["$scope", "$http", function ($scope, $http) {

    $scope.profile = {
        image: siteurl + "private/images/default.png",
        active: false
    };

    $scope.deductions = [
        {fields: "Advanced Pay", percentage: 0},
        {fields: "Professional Tax", percentage: 0},
        {fields: "Loan", percentage: 0},
        {fields: "Provident Fund", percentage: 0}
    ];

    $scope.amount = 0.00;

    $scope.getProfileFn = function () {
        var where = {
            table: "employee",
            cond: {"emp_id": $scope.eid}
        };

        $http({
            method: "POST",
            url: url + 'read',
            data: where
        }).success(function (response) {
            // get data
            if (response.length > 0) {
                $scope.profile.eid = response[0].emp_id;
                $scope.profile.name = response[0].name;
                $scope.profile.post = response[0].designation;
                $scope.profile.mobile = response[0].mobile;
                $scope.profile.email = response[0].email;
                $scope.profile.joining = response[0].joining_date;
                $scope.profile.image = siteurl + response[0].path;
                $scope.profile.active = true;

                // check deduction active or not
                var transmit = {
                    table: "salary_structure",
                    cond: {"eid": $scope.eid}
                };

                $http({
                    method: "POST",
                    url: url + "read",
                    data: transmit
                }).success(function (response) {
                    if (response.length > 0) {
                        $scope.amount = parseFloat(response[0].basic);

                        if (response[0].deduction === "yes") {
                            var transmit = {
                                table: "deduction_structure",
                                cond: {eid: $scope.eid}
                            };

                            $http({
                                method: "POST",
                                url: url + "read",
                                data: transmit
                            }).success(function (response) {
                                angular.forEach(response, function (row, index) {
                                    response[index].percentage = parseFloat(response[index].percentage);
                                });
                                $scope.deductions = response;
                            });
                        }
                    }
                });

            } else {
                $scope.profile = {};
                $scope.profile.image = siteurl + "private/images/default.png";
                $scope.profile.active = false;
            }

        });
    }


    $scope.totalFn = function (i) {
        var total = 0.00;
        total = $scope.amount * ($scope.deductions[i].percentage / 100);
        total = total.toFixed(2);
        return total;
    }

}]);


app.controller("PaymentCtrl", ["$scope", "$http", function ($scope, $http) {
    $scope.basic_salary = 0.00;
    $scope.profile = {
        image: siteurl + "private/images/default.png",
        active: false,
        incentive: false,
        deduction: false,
        bonus: false
    };

    $scope.insentives = [];
    $scope.deductions = [];
    $scope.bonuses = [];

    $scope.amount = {
        insentives: {extra: 0.00},
        deductions: {extra: 0.00},
        bonuses: {extra: 0.00}
    };

    $scope.getEmployeeInfoFn = function () {
        var where = {
            table: "employee",
            cond: {emp_id: $scope.eid}
        };

        $http({
            method: "POST",
            url: url + "read",
            data: where
        }).success(function (response) {
            if (response.length > 0) {
                $scope.profile.eid = response[0].emp_id;
                $scope.profile.name = response[0].name;
                $scope.profile.post = response[0].designation;
                $scope.profile.mobile = response[0].mobile;
                $scope.profile.email = response[0].email;
                $scope.profile.joining = response[0].joining_date;
                $scope.profile.image = siteurl + response[0].path;

                $scope.profile.active = true;

                // get basic salary
                var transmit = {
                    table: "salary_structure",
                    cond: {eid: $scope.eid}
                };

                $http({
                    method: "POST",
                    url: url + "read",
                    data: transmit
                }).success(function (response) {
                    if (response.length > 0) {
                        $scope.basic_salary = parseInt(response[0].basic);

                        // incentives
                        if (response[0].incentive === "yes") {
                            // active incentives
                            $scope.profile.incentive = true;

                            // get incentives
                            var transmit = {
                                table: "incentive_structure",
                                cond: {eid: $scope.eid}
                            };

                            $http({
                                method: "POST",
                                url: url + "read",
                                data: transmit
                            }).success(function (response) {
                                if (response.length > 0) {
                                    angular.forEach(response, function (row, index) {
                                        response[index].percentage = parseFloat(row.percentage);
                                        response[index].amount = ((parseFloat(row.percentage) * $scope.basic_salary) / 100);
                                        $scope.amount.insentives[response[index].fields] = ((parseFloat(row.percentage) * $scope.basic_salary) / 100);
                                    });

                                    $scope.insentives = response;
                                } else {
                                    $scope.insentives = [];
                                    $scope.amount.insentives = {};
                                    $scope.amount.insentives.extra = 0.00;
                                }

                            });
                        }

                        // deduction
                        if (response[0].deduction === "yes") {
                            // active deduction
                            $scope.profile.deduction = true;

                            // get deduction
                            var transmit = {
                                table: "deduction_structure",
                                cond: {eid: $scope.eid}
                            };

                            $http({
                                method: "POST",
                                url: url + "read",
                                data: transmit
                            }).success(function (response) {
                                if (response.length > 0) {
                                    angular.forEach(response, function (row, index) {
                                        response[index].amount = parseFloat(row.amount);
                                        $scope.amount.deductions[response[index].fields] = parseFloat(row.amount);
                                    });

                                    $scope.deductions = response;
                                } else {
                                    $scope.deductions = [];
                                    $scope.amount.deductions = {};
                                    $scope.amount.deductions.extra = 0.00;
                                }

                            });
                        }

                        // deduction
                        if (response[0].bonus === "yes") {
                            // active deduction
                            $scope.profile.bonus = true;

                            // get deduction
                            var transmit = {
                                table: "bonus_structure",
                                cond: {eid: $scope.eid}
                            };

                            $http({
                                method: "POST",
                                url: url + "read",
                                data: transmit
                            }).success(function (response) {
                                if (response.length > 0) {
                                    angular.forEach(response, function (row, index) {
                                        response[index].percentage = parseFloat(row.percentage);
                                        response[index].amount = ((parseFloat(row.percentage) * $scope.basic_salary) / 100);
                                        $scope.amount.bonuses[response[index].fields] = ((parseFloat(row.percentage) * $scope.basic_salary) / 100);
                                    });

                                    $scope.bonuses = response;
                                } else {
                                    $scope.bonuses = [];
                                    $scope.amount.bonuses = {};
                                    $scope.amount.bonuses.extra = 0.00;
                                }

                            });
                        }
                    } else {
                        alert("This employee's basic info not found!");
                        $scope.basic_salary = 0.00;
                    }
                });
            } else {
                $scope.profile = {};

                $scope.profile.image = siteurl + "private/images/default.png";
                $scope.profile.active = false;
                $scope.profile.incentive = false;
                $scope.profile.deduction = false;
            }

        });
    }

    $scope.totalFn = function () {
        var total = 0.00;
        var insentives = 0.00;
        var deductions = 0.00;
        var bonuses = 0.00;

        angular.forEach($scope.amount.insentives, function (value) {
            insentives += value;
        });

        angular.forEach($scope.amount.deductions, function (value) {
            deductions += value;
        });

        angular.forEach($scope.amount.bonuses, function (value) {
            bonuses += value;
        });

        total = ($scope.basic_salary + insentives + bonuses) - deductions;

        return total;
    }

}]);


// Salary Report
app.controller("SalaryReportCtrl", ["$scope", "$http", function ($scope, $http) {
    $scope.resultset = [];
    $scope.active = false;
    $scope.perPage = 10;

    $scope.getSalaryRecordFn = function () {
        var where = {
            "Year(date)": $scope.where.year,
            "Month(date)": $scope.where.month
        };

        $http({
            method: "POST",
            url: siteurl + "salary/salary/read_salary",
            data: where
        }).success(function (response) {
            if (response.length > 0) {
                $scope.active = true;

                angular.forEach(response, function (row, index) {
                    row.sl = index + 1;
                });

                $scope.resultset = response;
            } else {
                $scope.active = false;
                $scope.resultset = [];
            }

            console.log(response);
        });
    }
}]);


// All Payment
app.controller("AllPaymentCtrl", ["$scope", "$http", function ($scope, $http) {
    $scope.resultset = [];
    $scope.active = false;
    $scope.perPage = 10;

    $scope.getSalaryRecordFn = function () {
        var where = {
            "Year(date)": $scope.where.year,
            "Month(date)": $scope.where.month
        };

        // console.log(where);

        $http({
            method: "POST",
            url: siteurl + "salary/payment/read_salary",
            data: where
        }).success(function (response) {
            // console.log(response);
            if (response.length > 0) {
                $scope.active = true;

                angular.forEach(response, function (row, index) {
                    row.sl = index + 1;
                });

                $scope.resultset = response;
            } else {
                $scope.active = false;
                $scope.resultset = [];
            }

        });
    }
}]);



//SMS Controller
app.controller("CustomSMSCtrl", ["$scope", "$log", function($scope, $log){
	$scope.msgContant = "";
	$scope.totalChar = 0;
	$scope.msgSize = 1;

	$scope.$watch(function(){
		var charLength = $scope.msgContant.length,
			message = $scope.msgContant,
			messLen = 0;

		var english = /^[~!@#$%^&*(){},.:/-_=+A-Za-z0-9 ]*$/;

		if (english.test(message)){
			if( charLength <= 160){ messLen = 1; }
			else if( charLength <= 306){ messLen = 2; }
			else if( charLength <= 459){ messLen = 3; }
			else if( charLength <= 612){ messLen = 4; }
			else if( charLength <= 765){ messLen = 5; }
			else if( charLength <= 918){ messLen = 6; }
			else if( charLength <= 1071){ messLen = 7; }
			else if( charLength <= 1080){ messLen = 8; }
			else { messLen = "Equal to an MMS!"; }

		}else{
			if( charLength <= 63){ messLen = 1; }
			else if( charLength <= 126){ messLen = 2; }
			else if( charLength <= 189){ messLen = 3; }
			else if( charLength <= 252){ messLen = 4; }
			else if( charLength <= 315){ messLen = 5; }
			else if( charLength <= 378){ messLen = 6; }
			else if( charLength <= 441){ messLen = 7; }
			else if( charLength <= 504){ messLen = 8; }
			else { messLen = "Equal to an MMS!"; }
		}


		$scope.totalChar = charLength;
		$scope.msgSize = messLen;
	});
}]);

