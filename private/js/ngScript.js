var app = angular.module("MainApp", ['ui.select2','angularUtils.directives.dirPagination', 'ngSanitize']);

// set config variables
app.constant('config', {
	vat: 10
});

app.constant('select2Options', 'allowClear:true');

var url = window.location.origin + '/ajax/';
var siteurl = window.location.origin + '/';

// var url = window.location.origin + '/ajax/diagnostic/';
// var siteurl = window.location.origin + '/diagnostic/';

// custom filter in Angular js
app.filter('removeUnderScore', function () {
	return function (input) {
		return input.replace(/_/gi, " ");
	}
});

// ucwords custom filter in Angular js
app.filter('textBeautify', function () {
	return function (input) {
		var str = input.replace(/_/gi, " ").toLowerCase();
		return str.replace(/^([a-z])|\s+([a-z])/g, function ($1) {
			return $1.toUpperCase();
		});
	}
});

//remove dash and ucwords
app.filter("removeDash", function () {
	return function (str) {
		var str = str.replace(/-/gi, " ").toLowerCase();
		txt = str.replace(/\b[a-z]/g, function (letter) {
			return letter.toUpperCase();
		});
		return txt;
	}
});

app.controller("patientAdmissionCrl", function($scope, $http, $window) {
    $scope.days = 1;
    $scope.amount = 0;
    $scope.room_numbers = {};
    $scope.seat_numbers = {};
    $scope.cabin_numbers = {};
    $scope.room_no = null;
    $scope.seat_no = null;
    $scope.price = 0;
    $scope.patient_id = '';
    $scope.patient_info = {};
    $scope.admit_type = 'cabin';
    $scope.isCabin = true;
    $scope.isSeat = false;
    $scope.paid = 0;
    $scope.due = 0;
    $scope.contact = '';
    $scope.page_type = '';
    
    $scope.$watch('admit_type', function(){
        $scope.admitTypeFn($scope.admit_type);
    });
    
    $scope.$watch('room_no', function(){
        if($scope.room_no!=''){
           $scope.roomNumberFn($scope.room_no);
        }
    });
    
    $scope.$watch('seat_no', function(){
        if($scope.seat_no!=''){
           $scope.seatNumberFn($scope.seat_no);
        }
    });
    
    $scope.$watch('cabin_no', function(){
        if($scope.cabin_no!=''){
           $scope.cabinNumberFn($scope.cabin_no);
        }
    });
    
    $scope.admitTypeFn = function(admit_type){
        if(admit_type == 'seat'){
            $scope.isCabin = false;
            $scope.isSeat = true;
        }else{
            $scope.isCabin = true;
            $scope.isSeat = false;
        }
        
        $scope.admit_type = admit_type;
        $scope.seat_numbers = {};
        $scope.room_numbers= {}; 
        $scope.cabin_numbers= {}; 
        if($scope.page_type!='edit'){
    	    $scope.room_no = '';
    	    $scope.amount = 0; 
        }
	    
        var where = {
			table: "admit_type",
			cond: {"type": admit_type}
		};
        $http({
			method: "POST",
			url: url + 'read',
			data: where
		}).success(function(response){
			if(response.length > 0){
			    if(admit_type == 'seat'){
        		    $scope.room_numbers = response;   
                }else{
    			    $scope.cabin_numbers = response;
                }
			}
		});
		if($scope.page_type!=''){
    		$scope.roomNumberFn($scope.room_no);
    		$scope.seatNumberFn($scope.seat_no);
		}
    }
    
    // $scope.admitTypeFn($scope.admit_type);
    
    $scope.roomNumberFn = function(room_no){
        $scope.seat_numbers = {};
        var where = {
			table: "admit_type",
			cond: {"room_no": room_no}
		};
        $http({
			method: "POST",
			url: url + 'read',
			data: where
		}).success(function(response){
		    $scope.amount = 0;
			if(response.length > 0){
			    $scope.seat_numbers = response;
			}
		});
    }
    
    $scope.seatNumberFn = function(seat_no){
        var where = {
			table: "admit_type",
			cond: {"seat_no": seat_no}
		};
        $http({
			method: "POST",
			url: url + 'read',
			data: where
		}).success(function(response){
			if(response.length > 0){
			    $scope.price = response[0].price;
			    $scope.amount = ($scope.days*$scope.price);
			}else if($scope.page_type!='edit'){
			   $scope.amount = 0;
			}
		});
    }
    $scope.cabinNumberFn = function(cabin_no){
        console.log(cabin_no);
        var where = {
			table: "admit_type",
			cond: {"cabin_no": cabin_no}
		};
        $http({
			method: "POST",
			url: url + 'read',
			data: where
		}).success(function(response){
			if(response.length > 0){
			    $scope.price = response[0].price;
			    $scope.amount = ($scope.days*$scope.price);
			}else if($scope.page_type!='edit'){
			   $scope.amount = 0;
			}
		});
    }
    
    $scope.dayCalcuFn = function(day){
        $scope.days = day;
        $scope.amount = ($scope.days*$scope.price);
    }
    
    $scope.patientFn = function(contact){
        var where = {
			table: "patients",
			cond: {"contact": contact}
		};
        $http({
			method: "POST",
			url: url + 'read',
			data: where
		}).success(function(response){
			if(response.length > 0){
			    $scope.patient_info = response[0];
			    console.log($scope.patient_info);
			}else{
			   $scope.patient_info = {};
			}
		});
    }
    
    $scope.paidControlFn = function(){
        $scope.due = ($scope.amount-$scope.paid);
    }
    
    $scope.$watch('amount', function(){
        $scope.paidControlFn();
    });
});


// payroll controller
app.controller("PayrollCtrl", ["$scope", "$http","$window","$interval", function($scope, $http, $window, $interval){
	$scope.profile = {
		image: siteurl + "private/images/default.png",
		active: false
	};

	$scope.msg = {active: true, content: ""};

	$scope.getProfileFn = function() {
		var where = {
			table: "employee",
			cond: {"emp_id": $scope.data.eid}
		};

		$http({
			method: "POST",
			url: url + 'read',
			data: where
		}).success(function(response){
			// get data
			if(response.length == 1){
				$scope.profile.eid = response[0].emp_id;
				$scope.profile.name = response[0].name;
				$scope.profile.post = response[0].designation;
				$scope.profile.mobile = response[0].mobile;
				$scope.profile.email = response[0].email;
				$scope.profile.joining = response[0].joining_date;
				$scope.profile.image = siteurl + response[0].path;

				$scope.profile.active = true;
				console.log(response);
			} else {
				console.log("Employee not found!");
				$scope.msg.active = false;
				//$scope.msg.content = "Employee not found!";

				$scope.profile = {};

				$scope.profile.image = siteurl + "private/images/default.png";
				$scope.profile.active = false;
			}

		});
	}

	$scope.saveDataFn = function() {
		// chack existance
		var transmit = {
			table: "salary_structure",
			where: {eid: $scope.data.eid}
		};

		$http({
			method: "POST",
			url: siteurl + 'payroll/addBasicSalaryCtrl/exists',
			data: transmit
		}).success(function(response) {
			var transmit = {
				table: "salary_structure",
				dataset: $scope.data
			};

			// store the info
			if(parseInt(response) === 1){
				transmit.dataset = {basic: $scope.data.basic}
				transmit.where = {eid: $scope.data.eid};
			}

			$http({
				method: "POST",
				url: siteurl + 'payroll/addBasicSalaryCtrl/save',
				data: transmit
			}).success(function(response) {
				$scope.msg.active = true;
				$scope.msg.content = response;

				$interval(function(){$window.location.reload();},5000);

				console.log(response);
			});
		});
	}
}]);










// Incentive Controller
app.controller("IncentiveCtrl", ["$scope", "$http", function($scope, $http){
	$scope.profile = {
		image: siteurl + "private/images/default.png",
		active: false
	};

	$scope.incentives = [
		{fields: "HRA", percentage: 0},
		{fields: "DA", percentage: 0},
		{fields: "TA", percentage: 0},
		{fields: "CCA", percentage: 0},
		{fields: "Medical", percentage: 0}
	];

	$scope.getProfileFn = function() {
		var where = {
			table: "employee",
			cond: {"emp_id": $scope.eid}
		};

		$http({
			method: "POST",
			url: url + 'read',
			data: where
		}).success(function(response){
			// get data
			if(response.length > 0){
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
				}).success(function(response) {
					if(response.length > 0){
						$scope.amount = parseInt(response[0].basic);
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
				}).success(function(response) {
					console.log(response);
					if(response[0].incentive === "yes"){
						var transmit = {
							table: "incentive_structure",
							cond: {eid: $scope.eid}
						};

						$http({
							method: "POST",
							url: url + "read",
							data: transmit
						}).success(function(response) {
							console.log(response);

							angular.forEach(response, function(row, index){
								response[index].percentage = parseFloat(response[index].percentage);
							});

							$scope.incentives = response;
						});
					}
				});

			} else {
				// console.log("Employee not found!");

				$scope.profile = {};

				$scope.profile.image = siteurl + "private/images/default.png";
				$scope.profile.active = false;

				$scope.amount = 0.00;
			}

		});
	}

	$scope.totalFn = function(i) {
		var total = 0.00;
		total = $scope.amount * ($scope.incentives[i].percentage / 100);
		total = total.toFixed(2);
		return total;
	}
}]);















// Bonus Controller
app.controller("BonusCtrl", ["$scope", "$http", function($scope, $http){
	$scope.bonuses = [{fields: "", percentage: 0, remarks: ""}];
	$scope.profile = {
		image: siteurl + "private/images/default.png",
		active: false
	};

	$scope.getProfileFn = function() {
		var where = {
			table: "employee",
			cond: {"emp_id": $scope.eid}
		};

		$http({
			method: "POST",
			url: url + 'read',
			data: where
		}).success(function(response){

			// get data
			if(response.length > 0){
				$scope.profile.eid = response[0].emp_id;
				$scope.profile.name = response[0].name;
				$scope.profile.post = response[0].designation;
				$scope.profile.mobile = response[0].mobile;
				$scope.profile.email = response[0].email;
				$scope.profile.joining = response[0].joining_date;
				$scope.profile.image = siteurl + response[0].path;

				$scope.profile.active = true;
				console.log(response);

				// get bonus info
				var transmit = {
					table: "salary_structure",
					cond: {eid: $scope.eid}
				};

				$http({
					method: "POST",
					url: url + "read",
					data: transmit
				}).success(function(response) {
					if(response.length > 0) {
						if(response[0].bonus === "yes") {
							// get bonus records
							var transmit = {
								table: "bonus_structure",
								cond: {eid: $scope.eid}
							};

							$http({
								method: "POST",
								url: url + "read",
								data: transmit
							}).success(function(response) {
								if(response.length > 0){
									angular.forEach(response, function(row, index) {
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
				console.log("Employee not found!");

				$scope.profile = {};

				$scope.profile.image = siteurl + "private/images/default.png";
				$scope.profile.active = false;
			}

		});
	}

	$scope.createRowFn = function() {
		var obj = {fields: "", percentage: 0, remarks: ""};
		$scope.bonuses.push(obj);
	}

	$scope.deleteRowFn = function(index) {
		$scope.bonuses.splice(index, 1);
	}

}]);












// Deduction Controller
app.controller("DeductionCtrl", ["$scope", "$http", function($scope, $http){

	$scope.profile = {
		image: siteurl + "private/images/default.png",
		active: false
	};

	$scope.deductions = [
		{fields: "Advanced Pay", amount: 0},
		{fields: "Professional Tax ", amount: 0},
		{fields: "Loan", amount: 0},
		{fields: "Provisional Fund", amount: 0}
	];

	$scope.getProfileFn = function() {
		var where = {
			table: "employee",
			cond: {"emp_id": $scope.eid}
		};

		$http({
			method: "POST",
			url: url + 'read',
			data: where
		}).success(function(response) {
			// get data
			if(response.length > 0){
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
				}).success(function(response) {
					console.log(response);
					if(response[0].deduction === "yes"){
						var transmit = {
							table: "deduction_structure",
							cond: {eid: $scope.eid}
						};

						$http({
							method: "POST",
							url: url + "read",
							data: transmit
						}).success(function(response) {
							console.log(response);

							angular.forEach(response, function(row, index){
								response[index].amount = parseFloat(response[index].amount);
							});

							$scope.deductions = response;
						});
					}
				});

			} else {
				// console.log("Employee not found!");
				$scope.profile = {};

				$scope.profile.image = siteurl + "private/images/default.png";
				$scope.profile.active = false;
			}

		});
	}

}]);










app.controller("PaymentCtrl", ["$scope", "$http", function($scope, $http) {
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

	$scope.getEmployeeInfoFn = function() {
		var where = {
			table: "employee",
			cond: {emp_id: $scope.eid}
		};

		$http({
			method: "POST",
			url: url + "read",
			data: where
		}).success(function(response) {
			if(response.length > 0){
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
				}).success(function(response) {
					if(response.length > 0) {
						$scope.basic_salary = parseInt(response[0].basic);

						// incentives
						if(response[0].incentive === "yes"){
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
							}).success(function(response) {
								if(response.length > 0) {
									angular.forEach(response, function(row, index) {
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

								// console.log(response);
							});
						}

						// deduction
						if(response[0].deduction === "yes"){
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
							}).success(function(response) {
								if(response.length > 0) {
									angular.forEach(response, function(row, index) {
										response[index].amount = parseFloat(row.amount);
										$scope.amount.deductions[response[index].fields] = parseFloat(row.amount);
									});

									$scope.deductions = response;
								} else {
									$scope.deductions = [];
									$scope.amount.deductions = {};
									$scope.amount.deductions.extra = 0.00;
								}

								// console.log(response);
							});
						}

						// deduction
						if(response[0].bonus === "yes"){
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
							}).success(function(response) {
								if(response.length > 0) {
									angular.forEach(response, function(row, index) {
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

								// console.log(response);
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

			// console.log(response);
		});
	}

	$scope.totalFn = function() {
		var total = 0.00;
		var insentives = 0.00;
		var deductions = 0.00;
		var bonuses = 0.00;

		angular.forEach($scope.amount.insentives, function(value){
			insentives += value;
		});

		angular.forEach($scope.amount.deductions, function(value){
			deductions += value;
		});

		angular.forEach($scope.amount.bonuses, function(value){
			bonuses += value;
		});

		total = ($scope.basic_salary + insentives + bonuses) - deductions;

		return total;
	}

}]);









// Salary Report
app.controller("SalaryReportCtrl", ["$scope", "$http", function($scope, $http) {
	$scope.resultset = [];
	$scope.active = false;
	$scope.perPage = 10;

	$scope.getSalaryRecordFn = function() {
		var where = {
			"Year(date)": $scope.where.year,
			"Month(date)": $scope.where.month
		};

		$http({
			method: "POST",
			url: siteurl + "salary/salary/read_salary",
			data: where
		}).success(function(response) {
			if (response.length > 0) {
				$scope.active = true;

				angular.forEach(response, function(row, index) {
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
app.controller("AllPaymentCtrl", ["$scope", "$http", function($scope, $http) {
	$scope.resultset = [];
	$scope.active = false;
	$scope.perPage = 10;

	$scope.getSalaryRecordFn = function() {
		var where = {
			"Year(date)": $scope.where.year,
			"Month(date)": $scope.where.month
		};

		console.log(where);

		$http({
			method: "POST",
			url: siteurl + "salary/payment/read_salary",
			data: where
		}).success(function(response) {
			if (response.length > 0) {
				$scope.active = true;

				angular.forEach(response, function(row, index) {
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




//SMS Controller
app.controller("CustomSMSCtrl", ["$scope", "$log", function ($scope, $log) {
	$scope.msgContant = "";
	$scope.totalChar = 0;
	$scope.msgSize = 1;

	$scope.$watch(function () {
		var charLength = $scope.msgContant.length,
			message = $scope.msgContant,
			messLen = 0;




		var english = /^[~!@#$%^&*(){},.:/-_=+A-Za-z0-9 ]*$/;

		if (english.test(message)) {
			if (charLength <= 160) {
				messLen = 1;
			} else if (charLength <= 306) {
				messLen = 2;
			} else if (charLength <= 459) {
				messLen = 3;
			} else if (charLength <= 612) {
				messLen = 4;
			} else if (charLength <= 765) {
				messLen = 5;
			} else if (charLength <= 918) {
				messLen = 6;
			} else if (charLength <= 1071) {
				messLen = 7;
			} else if (charLength <= 1080) {
				messLen = 8;
			} else {
				messLen = "Equal to an MMS!";
			}

		} else {
			if (charLength <= 63) {
				messLen = 1;
			} else if (charLength <= 126) {
				messLen = 2;
			} else if (charLength <= 189) {
				messLen = 3;
			} else if (charLength <= 252) {
				messLen = 4;
			} else if (charLength <= 315) {
				messLen = 5;
			} else if (charLength <= 378) {
				messLen = 6;
			} else if (charLength <= 441) {
				messLen = 7;
			} else if (charLength <= 504) {
				messLen = 8;
			} else {
				messLen = "Equal to an MMS!";
			}
		}



		$scope.totalChar = charLength;
		$scope.msgSize = messLen;
	});
}]);


//show all Brand Controller
app.controller("showbrandCtrl", function ($scope, $http, $log) {
	$scope.reverse = false;
	$scope.perPage = "30";
	$scope.allbrand = [];

	var where = {
		table: 'brand'
	};


	$http({
		method: 'POST',
		url: url + 'read',
		data: where
	}).success(function (response) {
		if (response.length > 0) {
			$scope.active = false;

			angular.forEach(response, function (values, index) {
				values['sl'] = index + 1;
				$scope.allbrand.push(values);
			});
		} else {
			$scope.active = true;
			$scope.allbrand = [];
		}

		$log.log($scope.allbrand);

		//Loader
		$("#loading").fadeOut("fast", function () {
			$("#data").fadeIn('slow');
		});
	});
});



//barcode ctrl
app.controller('PatientBarcodeCtrl', ['$scope', '$window','$http', function($scope, $window,$http){
	//$scope.codes = [{code: 0, quantity: 0,sale_price : 0.00}];
	$scope.codes = [{code: '', quantity: '',sale_price : 0.00}];
	


	$scope.getSalePriceFn = function(i,code){
	    var where = {
	        table  : "patients",
	    };

	    $http({
	        method  : "POST",
	        url     : url + "read",
	        data    : where
	    }).success(function(response){
	        if(response.length > 0 ){
	            $scope.codes[i].sale_price = 0.00;
	            $scope.codes[i].quantity   = 1;
	        }else{
	            $scope.codes[i].sale_price = 0.00;
	            $scope.codes[i].quantity   = 0;
	        }
	    });
	};

	$scope.addCodeFn = function() {
		var codeObj = {code: 0, quantity: 0,sale_price : 0.00};
		$scope.codes.push(codeObj);
	}

	$scope.removeRowFn = function(i) {
		if($window.confirm("Are you sure want to delete this Row?")){
			$scope.codes.splice(i, 1);
		}
	}
	//console.log($scope.codes);
}]);










//barcode ctrl
app.controller('PrintBarcodeCtrl', ['$scope', '$window','$http', function($scope, $window,$http){
	//$scope.codes = [{code: 0, quantity: 0,sale_price : 0.00}];
	$scope.codes = [{code: '', quantity: '',sale_price : 0.00}];
	


	$scope.getSalePriceFn = function(i,code){
	    var where = {
	        table  : "bills",
	    };

	    $http({
	        method  : "POST",
	        url     : url + "read",
	        data    : where
	    }).success(function(response){
	        if(response.length > 0 ){
	            $scope.codes[i].sale_price = 0.00;
	            $scope.codes[i].quantity   = 1;
	        }else{
	            $scope.codes[i].sale_price = 0.00;
	            $scope.codes[i].quantity   = 0;
	        }
	    });
	};

	$scope.addCodeFn = function() {
		var codeObj = {code: 0, quantity: 0,sale_price : 0.00};
		$scope.codes.push(codeObj);
	}

	$scope.removeRowFn = function(i) {
		if($window.confirm("Are you sure want to delete this Row?")){
			$scope.codes.splice(i, 1);
		}
	}
	//console.log($scope.codes);
}]);




//show all Product Controller
app.controller("showAllProductCtrl", function ($scope, $http, $log) {
	$scope.reverse = false;
	$scope.perPage = "30";
	$scope.products = [];

	var where = {
		table: 'products'
	};


	$http({
		method: 'POST',
		url: url + 'read',
		data: where
	}).success(function (response) {
		if (response.length > 0) {
			$scope.active = false;

			angular.forEach(response, function (values, index) {
				values['sl'] = index + 1;
				$scope.products.push(values);
			});
		} else {
			$scope.active = true;
			$scope.products = [];
		}

		console.log($scope.products);

		//Loader
		$("#loading").fadeOut("fast", function () {
			$("#data").fadeIn('slow');
		});
	});
});




// Due Payment Controller
app.controller('DuePaymentCtrl', function ($scope, $http) {
	$scope.cart = [];
	$scope.amount = {
		paid: 0,
		diposit: 0.00,
		remission: 0.00,
		due: 0
	};
	$scope.info = {};

	$scope.$watch('vno', function () {
		var condition = {
			table: 'sale',
			cond: {
				voucher_number: $scope.vno
			}
		}

		$http({
			method: 'POST',
			url: url + 'read',
			data: condition
		}).success(function (response) {

			angular.forEach(response, function (item) {
				var row = {
					id: item.id,
					category: item.category,
					product: item.model,
					oldQuantity: parseInt(item.quantity),
					newQuantity: parseInt(item.quantity),
					price: parseFloat(item.price),
					subtotal: parseFloat(item.subtotal),
					grand_total: parseFloat(item.grand_total),
					discount: parseFloat(item.discount),
					date: item.date,
					voucher: item.voucher_number,
					paid: parseFloat(item.paid),
					remission: parseFloat(item.remission),
					due: parseFloat(item.due)
				};

				$scope.cart.push(row);

				$scope.amount.paid = row.paid;
				$scope.amount.discount = row.discount;
				$scope.amount.total_remission = row.remission;
				$scope.amount.grand_total = row.grand_total;
				$scope.amount.due = row.due;

				$scope.info.date = row.date;
				$scope.info.voucher = row.voucher;
				console.log($scope.cart);
			});
		});
	});

	$scope.setSubtotalFn = function (index) {
		$scope.cart[index].subtotal = $scope.cart[index].price * $scope.cart[index].newQuantity;
		return $scope.cart[index].subtotal;
	}

	$scope.getTotalFn = function () {
		var total = 0;
		angular.forEach($scope.cart, function (item) {
			total += item.subtotal;
		});

		$scope.amount.total = total;
		return $scope.amount.total;
	}


	$scope.getTotalDueFn = function (d, r, tr) {
		var paid = $scope.amount.paid + parseFloat(d) + parseFloat(r) + parseFloat(tr);
		$scope.amount.due = $scope.amount.grand_total - paid;
		return $scope.amount.due;
	}

});





/**
 * Working with purchase
 * controller name : Purchase
 *
 */
app.controller('PurchaseEntry', function ($scope, $http) {
	$scope.active = true;
	$scope.cart = [];
	$scope.amount = {
		total: 0,
		totalDiscount: 0,
		grandTotal: 0,
		paid: 0,
		due: 0
	};


	// $scope.setAllProducts = function(){
	// 	var condition = {
	// 		table: 'products',
	// 		column : 'name',
	// 		cond: {
	// 			category: $scope.category,
	// 		}
	// 	};

	// 	console.log(condition );

	// 	$http({
	// 		method: 'POST',
	// 		url: url + 'read_GroupBy',
	// 		data: condition
	// 	}).success(function(response){
	// 		$scope.allProducts = response;
	// 		console.log(response);
	// 	});
	// }



	var condition = {
		table: 'products',
	};

	$http({
		method: 'POST',
		url: url + 'read',
		data: condition
	}).success(function (response) {
		$scope.allModel = response;
	});



	$scope.addNewProductFn = function () {
		if (typeof $scope.model_name !== 'undefined') {
			$scope.active = false;

			var condition = {
				table: 'products',
				cond: {
					// name: $scope.product,
					// category: $scope.category,
					//model: $scope.model_name
					code: $scope.model_name
				}
			};

			$http({
				method: 'POST',
				url: url + 'read',
				data: condition
			}).success(function (response) {
				var item = {
					code: response[0].code,
					product: $scope.product,
					category: response[0].category,
					brand: response[0].brand,
					model: response[0].model,
					price: parseFloat(response[0].purchase_price),
					quantity: (typeof $scope.quantity === 'undefined') ? 0 : $scope.quantity,
					discount: 0.00,
					subtotal: 0.00,
					godown: (typeof $scope.godown === 'undefined') ? '' : $scope.godown
				};
				console.log(item);

				$scope.cart.push(item);
			});
		}
	}

	$scope.setSubtotalFn = function (index) {
		$scope.cart[index].subtotal = $scope.cart[index].price * $scope.cart[index].quantity;
		return $scope.cart[index].subtotal;
	}

	$scope.getTotalFn = function () {
		var total = 0;
		angular.forEach($scope.cart, function (item) {
			total += parseFloat(item.subtotal);
		});

		$scope.amount.total = total;
		return $scope.amount.total;
	}

	$scope.getTotalDiscountFn = function () {
		var total = 0;
		angular.forEach($scope.cart, function (item) {
			if (item.discount != null) {
				total += parseFloat(item.discount);
			}

			// console.log(item.discount);
		});

		$scope.amount.totalDiscount = total;
		return $scope.amount.totalDiscount;
	}

	$scope.getGrandTotalFn = function () {
		$scope.amount.grandTotal = $scope.amount.total - $scope.amount.totalDiscount;
		return $scope.amount.grandTotal;
	}

	$scope.getTotalDueFn = function () {
		$scope.amount.due = $scope.amount.grandTotal - $scope.amount.paid;
		return $scope.amount.due;
	}

	$scope.deleteItemFn = function (index) {
		$scope.cart.splice(index, 1);
	}
});


/**
 * Working with Stock Reagent
 * controller name : Reagent Entry
 *
 */

app.controller('reagentEntry', function ($scope, $http) {
	$scope.active = true;
	$scope.cart = [];

	var condition = {
		table: 'reagent',
	};

	$http({
		method: 'POST',
		url: url + 'read',
		data: condition
	}).success(function (response) {
		$scope.allReagent = response;
	});


	$scope.reagentList = [];
	$scope.addNewReagentFn = function () {
		if (typeof $scope.slug !== 'undefined') {
			if ($scope.reagentList.indexOf($scope.slug) < 0) {
				$scope.active = false;
				var item = {
					name: $scope.slug,
					date: $scope.date,
					quantity: parseInt($scope.quantity)
				};
				$scope.cart.push(item);
				$scope.reagentList.push($scope.slug);
				console.log($scope.cart);
			}
		}
	}


	$scope.deleteItemFn = function (index) {
		$scope.cart.splice(index, 1);
		$scope.reagentList.splice(index, 1);
	}
});

/**
 * Working with Out Stock
 * controller name : OutStock Entry
 *
 */

app.controller('outStock', function ($scope, $http) {
	$scope.active = true;
	$scope.cart = [];
	$scope.allVoucher = [];

	var condition = {
		table: 'reagent_stock',
		column: 'reagent'
	};

	$http({
		method: 'POST',
		url: url + 'read_GroupBy',
		data: condition
	}).success(function (response) {
		$scope.allReagent = response;
	});

	$scope.getVoucherFn = function () {
		var condition = {
			table: 'reagent_stock',
			cond: {
				'reagent': $scope.reagent,
				'quantity >': 0
			},
			column: 'voucher_no'
		};

		$http({
			method: 'POST',
			url: url + 'read_GroupBy',
			data: condition
		}).success(function (response) {
			$scope.allVoucher = response;
		});
	}


	$scope.reagentList = [];
	$scope.addNewReagentFn = function () {

		if (typeof $scope.reagent !== 'undefined') {

			if ($scope.reagentList.indexOf($scope.reagent) && $scope.reagentList.indexOf($scope.reagent) < 0) {

				var condition = {
					table: 'reagent_stock',
					cond: {
						'reagent': $scope.reagent,
						'voucher_no': $scope.stock_voucher_no,
						'quantity >': 0
					}
				};

				//console.log(condition);
				$http({
					method: 'POST',
					url: url + 'read',
					data: condition
				}).success(function (response) {
					if (response.length > 0) {
						$scope.active = false;

						var item = {
							voucher_number: $scope.stock_voucher_no,
							name: $scope.reagent,
							quantity: parseInt($scope.quantity),
							maxQuantity: parseInt(response[0].quantity)
						};

						$scope.cart.push(item);
						$scope.reagentList.push($scope.reagent);
					}
				});

			}
		}



	}

	$scope.deleteItemFn = function (index) {
		$scope.cart.splice(index, 1);
		$scope.reagentList.splice(index, 1);
	}
});



// purchase edit
app.controller('EditPurchaseEntry', function ($scope, $http) {
	$scope.allProducts = [];
	$scope.amount = {
		total: 0,
		totalDiscount: 0,
		grandTotal: 0,
		due: 0
	}

	$scope.$watch('vno', function () {
		var condition = {
			table: 'purchase',
			cond: {
				voucher_no: $scope.vno
			}
		};

		$http({
			method: 'POST',
			url: url + 'read',
			data: condition
		}).success(function (response) {
			angular.forEach(response, function (item) {
				var newItem = {
					code: item.code,
					productID: item.id,
					product: item.product_name,
					category: item.category,
					subcategory: item.subcategory,
					price: parseInt(item.purchase_price),
					quantity: parseInt(item.quantity),
					discount: parseFloat(item.discount),
					subtotal: parseFloat(item.subtotal)
				};

				$scope.allProducts.push(newItem);
				$scope.oldRecord = response;
			});
		});
	});

	$scope.getSubtotalFn = function (index) {
		angular.forEach($scope.allProducts, function (item) {
			item.subtotal = item.price * item.quantity;
		});

		return $scope.allProducts[index].subtotal;
	}

	$scope.getTotalFn = function () {
		var total = 0;
		angular.forEach($scope.allProducts, function (item) {
			total += item.subtotal;
		});

		$scope.amount.total = total;
		return $scope.amount.total;
	}

	$scope.getTotalDiscountFn = function () {
		var total = 0;
		angular.forEach($scope.allProducts, function (item) {
			total += item.discount;
		});

		$scope.amount.totalDiscount = total;
		return $scope.amount.totalDiscount;
	}

	$scope.getGrandTotalFn = function () {
		$scope.amount.grandTotal = $scope.amount.total - $scope.amount.totalDiscount;
		return $scope.amount.grandTotal;
	}

	$scope.getTotalDueFn = function () {
		$scope.amount.due = $scope.amount.grandTotal - $scope.amount.paid;
		return $scope.amount.due;
	}
});


// Reagent Stock edit
app.controller('EditReagentEntry', function ($scope, $http) {
	$scope.allReagent = [];

	$scope.$watch('vno', function () {
		var condition = {
			table: 'reagent_stock',
			cond: {
				voucher_no: $scope.vno
			}
		};

		$http({
			method: 'POST',
			url: url + 'read',
			data: condition
		}).success(function (response) {
			if (response.length > 0) {
				angular.forEach(response, function (row, i) {
					var item = {
						sl: (i + 1),
						reagentID: row.id,
						reagent: row.reagent,
						quantity: parseInt(row.quantity),
						expire_date: row.expire_date,

					};

					$scope.allReagent.push(item);
				});
			} else {
				$scope.allReagent = [];
			}

			console.log($scope.allReagent);
		});
	});

});



// show Stock Ctl
app.controller("showStockCtl", ['$scope', '$http', function ($scope, $http) {
	$scope.perPage = "20";
	$scope.allStocks = [];

	var where = {
		table: "stock"
	};

	$http({
		method: "POST",
		url: url + "read",
		data: where
	}).success(function (response) {
		if (response.length > 1) {
			$scope.allStocks = response;
		}

		// loading
		$("#loading").fadeOut("fast", function () {
			$("#data").fadeIn('slow');
		});
	});
}]);







/**
 * DoctorsListCtrl is controller name
 * loadData method load all the data from DB
 *
 */
app.controller('DoctorsListCtrl', ['$scope', '$http', function ($scope, $http) {
	$scope.dataset = [];
	$scope.perPage = "10";

	var loadData = function () {
		var condition = {};
		$http({
			method: 'POST',
			url: url + 'doctors_details',
			data: condition
		}).success(function (response) {
			if (response.length > 0) {
				angular.forEach(response, function (row, i) {
					var item = {
						sl: (i + 1),
						id: row.id,
						photo: row.image,
						name: row.fullName,
						designation: row.designation,
						hospital: row.hospital,
						degree: row.degree,
						specialised: row.specialised,
						mobile: row.mobile,
						room_no: row.room_no,
						commission: row.commission,
						balance:row.balance
					};
					$scope.dataset.push(item);
				});
			} else {
				$scope.dataset = [];
			}
		});
	}

	loadData();
	
	
	$scope.balanceFn = function(item, nidle){
	    let commission = item.commission;
	    let total_bill = item.grand_total;
	    let Total_paid = 0;
	    
	    console.log("d5", item.id);
    	   //var where = {
        // 		table: "doctor_payment",
        // 		cond : {
        // 		    doctor_id:item.id
        // 		}
        // 	};
        
        // 	$http({
        // 		method: "POST",
        // 		url: url + "read",
        // 		data: where
        // 	}).success(function (response) {
        // 		if (response.length > 1) {
        // 		    angular.forEach(response, function(item){
        // 		        Total_paid = Total_paid + (item.payment);
        // 		    });
        // 		}
        // 	});
    	
	    
	    let balance = ((total_bill / 100) * commission);
	    
	    if(nidle=='balance' && balance > 0)
	        return balance;
	    if(nidle=='due' && balance < 0)
	        return Math.abs(balance);
	    
	}
}]);









/**
 * DrCommitionCtrl is controller name
 * loadData method load all the data from DB
 *
 */
app.controller('DrCommitionCtrl', ['$scope', '$http', function ($scope, $http) {
	$scope.dataset = [];
	$scope.perPage = "10";

	var loadData = function () {
		$http({
			method: 'POST',
			url: siteurl + 'doctor/commission/commitionInfo'
		}).success(function (response) {
			$scope.dataset = response;
			if (response.length > 0) {
				angular.forEach(response, function (row, i) {
					response[i].sl = (i + 1);
					response[i].percentage = parseFloat(row.percentage);
					response[i].total = parseFloat(row.total);
				});
			}

			// console.log($scope.dataset);
		});
	}

	$scope.getSumOfTotalFn = function () {
		var total = 0.00;
		angular.forEach($scope.dataset, function (row, i) {
			total += row.total;
		});

		return total;
	}

	$scope.getSumOfCommissionFn = function () {
		var total = 0.00;
		angular.forEach($scope.dataset, function (row, i) {
			total += row.commission;
		});

		return total;
	}

	loadData();
}]);




/**
 * Doctor commission payment
 *
 */
app.controller('DoctorCommissionPaymentCtrl', ['$scope', '$http', function ($scope, $http) {
    console.log(5523);
	$scope.dataset = [];
	$scope.paid = 0.00;

	$scope.getCommitionInfoFn = function () {
	    console.log(11, $scope.search);
		var where = {
			table: 'commissions',
			cond: $scope.search
		};

		where.cond.type = 'referred';

		$http({
			method: 'POST',
			url: siteurl + 'doctor/commissionPayment/calculateComssion',
			data: where
		}).success(function (response) {
			$scope.dataset = response;
			//console.log($scope.dataset);
		});
	}

	$scope.totalBalanceFn = function () {
		var total = 0.00;
		total = ($scope.dataset.total_comission - $scope.dataset.total_paid).toFixed(2);
		return $scope.dataset.balance = total;
	}

	$scope.totalDueFn = function () {
		var total = 0.00;
		total = ($scope.dataset.balance - $scope.paid).toFixed(2);
		return total;
	}

}]);



/**
 * PC commission payment
 *
 */
app.controller('PcComPaymentCtrl', ['$scope', '$http', function ($scope, $http) {
	$scope.dataset = [];
	$scope.paid = 0.00;

	$scope.getCommitionInfoFn = function () {
		var where = {
			table: 'commissions',
			cond: $scope.search
		};

		where.cond.type = 'pc';

		$http({
			method: 'POST',
			url: siteurl + 'pc/cont/calculateCommssion',
			data: where
		}).success(function (response) {
			$scope.dataset = response;
			console.log($scope.dataset);
		});
	}

	$scope.totalBalanceFn = function () {
		var total = 0.00;
		total = ($scope.dataset.total_comission - $scope.dataset.total_paid).toFixed(2);
		return $scope.dataset.balance = total;
	}

	$scope.totalDueFn = function () {
		var total = 0.00;
		total = ($scope.dataset.balance - $scope.paid).toFixed(2);
		return total;
	}

}]);


/**
 * Marketer commission payment
 *
 */
app.controller('MarketerComPaymentCtrl', ['$scope', '$http', function ($scope, $http) {
	$scope.dataset = [];
	$scope.paid = 0.00;

	$scope.getCommitionInfoFn = function () {
		var where = {
			table: 'commissions',
			cond: $scope.search
		};

		where.cond.type = 'marketer';

		$http({
			method: 'POST',
			url: siteurl + 'marketer/cont/calculateCommssion',
			data: where
		}).success(function (response) {
			$scope.dataset = response;
			console.log($scope.dataset);
		});
	}

	$scope.totalBalanceFn = function () {
		var total = 0.00;
		total = ($scope.dataset.total_comission - $scope.dataset.total_paid).toFixed(2);
		return $scope.dataset.balance = total;
	}

	$scope.totalDueFn = function () {
		var total = 0.00;
		total = ($scope.dataset.balance - $scope.paid).toFixed(2);
		return total;
	}

}]);





/**
 * CommissionUpdateCtrl is controller name
 *
 */
app.controller('CommissionUpdateCtrl', ['$scope', '$http', function ($scope, $http) {
	$scope.dataset = [];

	$scope.getLastCommitionInfoFn = function () {
		var where = {
			condition: $scope.search
		};

		$http({
			method: 'POST',
			url: siteurl + 'doctor/updateCommission/getInfo',
			data: where
		}).success(function (response) {
			if (Object.keys(response).length > 0 && response.constructor === Object) {
				response.balance = parseFloat(response.balance);
				response.last_payment_amount = parseFloat(response.last_payment_amount);
			}

			$scope.dataset = response;
			console.log(response);
		});
	}

	$scope.totalBalanceFn = function () {
		var total = 0.00;
		total = $scope.dataset.balance - $scope.amount;

		console.log($scope.dataset.balance, $scope.paid, total);
		return total;
	}

}]);







/**
 * CommissionDetailsCtrl is controller name
 *
 */
app.controller('CommissionDetailsCtrl', ['$scope', '$http', function ($scope, $http) {
	$scope.dataset = [];
	$scope.perPage = "10";

	var loadData = function () {
		var condition = {
			table: 'commission_payment'
		};

		$http({
			method: 'POST',
			url: siteurl + 'doctor/commissionDetails/getCommitionInfoFn',
			data: condition
		}).success(function (response) {
			if (response.length > 0) {
				angular.forEach(response, function (row, i) {
					var item = {
						sl: (i + 1),
						date: row.date,
						doctor: row.person,
						commission: row.balance,
						paid: row.paid,
						due: row.due
					};

					$scope.dataset.push(item);
				});
			} else {
				$scope.dataset = [];
			}
		});
	}

	loadData();
}]);







/**
 * PCCtrl is controller name
 * loadData method load all the data from DB
 *
 */
app.controller('PCCtrl', ['$scope', '$http', function ($scope, $http) {
	$scope.dataset = [];
	$scope.perPage = "10";

	var loadData = function () {
		var condition = {
			table: 'pc'
		};

		$http({
			method: 'POST',
			url: url + 'read',
			data: condition
		}).success(function (response) {
			if (response.length > 0) {
				angular.forEach(response, function (row, i) {
					var item = {
						sl: (i + 1),
						id: row.id,
						photo: row.image,
						name: row.fullName,
						mobile: row.mobile,
						commission: row.commission,
						address: row.address
					};

					$scope.dataset.push(item);
				});
			} else {
				$scope.dataset = [];
			}

			// console.log($scope.dataset);
		});
	}

	loadData();
}]);








//ward controller start here
app.controller("wardCtrl", ['$scope', '$http', '$log', function ($scope, $http, $log) {

	$scope.perPage = "10";
	$scope.reverse = false;
	$scope.allWards = [];

	var where = {
		table: "wards",
		cond: {},
		column: "ward_no"
	};

	$http({
		method: "POST",
		url: url + "read_GroupBy",
		data: where
	}).success(function (response) {
		if (response.length > 0) {
			angular.forEach(response, function (values, index) {
				values['sl'] = index + 1;
				$scope.allWards.push(values);
			});
		} else {
			$scope.allWards = [];
		}
		$log.log($scope.allWards);
	});
}]);












//cabin controller start here
app.controller("cabinCtrl", ['$scope', '$http', '$log', function ($scope, $http, $log) {
	$scope.perPage = "10";
	$scope.reverse = false;
	$scope.allCabins = [];
	var where = {
		table: "cabin"
	};
	$http({
		method: "POST",
		url: url + "read",
		data: where
	}).success(function (response) {
		if (response.length > 0) {
			angular.forEach(response, function (values, index) {
				values['sl'] = index + 1;
				$scope.allCabins.push(values);
			});
		} else {
			$scope.allCabins = [];
		}
		$log.log(response);
	});
}]);








/**
 * AddNewInvestigationCtrl is controller name
 *
 */
app.controller('AddNewInvestigationCtrl', ['$scope', '$http', function ($scope, $http) {

	$scope.allTestName = [];

	$scope.getAllTestFn = function () {
		var where = {
			table: 'test_name',
			cond: {
				group_name: $scope.group_name
			}
		};

		$http({
			method: "POST",
			url: url + "read",
			data: where
		}).success(function (response) {
			if (response.length > 0) {
				$scope.allTestName = response;
			} else {
				$scope.allTestName = response;
			}
			//console.log($scope.allTestName);

		});
	}

	/*
	$scope.getTestListFn = function() {
		var where = {group: $scope.group};

		$http({
			method: "POST",
			url: siteurl + "investigation/addInvestigation/getTestName",
			data: where
		}).success(function(response) {
			if
			$scope.allTestName = response;
			console.log(response);
		});
	}
	*/


}]);







/**
 * InvestigationListCtrl is controller name
 *
 */
app.controller('InvestigationListCtrl', ['$scope', '$http', function ($scope, $http) {
	$scope.dataset = [];
	$scope.perPage = "10";

	var loadData = function () {
		var condition = {
			table: 'investigation'
		};

		$http({
			method: 'POST',
			url: url + 'read',
			data: condition
		}).success(function (response) {
			if (response.length > 0) {
				angular.forEach(response, function (row, i) {
					var item = {
						sl: (i + 1),
						id: row.id,
						group: row.group,
						testName: row.test_name,
						fee: row.test_fee,
						cost: row.cost,
						room: row.room,
						unit: row.unit,
						reference_value: row.reference_value
					};

					$scope.dataset.push(item);
				});
			} else {
				$scope.dataset = [];
			}

			// console.log($scope.dataset);
		});
	}

	loadData();
}]);








/**
 * EditInvestigationCtrl is controller name
 *
 */
app.controller('EditInvestigationCtrl', ['$scope', '$http', function ($scope, $http) {
	$scope.allTestName = [];

	/*
	$scope.$watch('id', function(value) {
		var where = {
			table: 'investigation',
			cond: {id: value}

		};

		$http({
			method: "POST",
			url: url + "read",
			data: where
		}).success(function(response) {
			$scope.allTestName = response;
			console.log(response);
		});
	});
	*/

}]);


//this controller will show all the patient from database
app.controller("allPatientCtrl", ['$scope', '$http', function ($scope, $http) {
	$scope.perPage = "10";
	$scope.reverse = false;
	$scope.allPatients = [];

	var where = {
		table: "patient"
	};

	$http({
		method: "POST",
		url: url + "read",
		data: where
	}).success(function (response) {
		if (response.length > 0) {
			angular.forEach(response, function (values, index) {
				values['sl'] = index + 1;
				$scope.allPatients.push(values);
			});
		} else {
			$scope.allPatients = [];
		}

		console.log($scope.allPatients);
	});
}]);

//this controller will show all the marketer from database
app.controller("allMarketerCtrl", ['$scope', '$http', function ($scope, $http) {
	$scope.perPage = "10";
	$scope.reverse = false;
	$scope.allMarketer = [];

	var where = {
		table: "marketer",
		cond: {
			trash: 0
		}
	};

	$http({
		method: "POST",
		url: url + "read",
		data: where
	}).success(function (response) {
		if (response.length > 0) {
			angular.forEach(response, function (values, index) {
				values['sl'] = index + 1;
				$scope.allMarketer.push(values);
			});
		} else {
			$scope.allMarketer = [];
		}

		console.log($scope.allMarketer);
	});
}]);


/**
 * AdmittedPatientDiagnosisCtrl is controller name
 *
 */
app.controller("AdmittedPatientDiagnosisCtrl", ["$scope", "$http", function ($scope, $http) {
	$scope.info = {};

	//this function load patient info from database
	$scope.getPatientInfoFn = function () {
		var where = {
			table: "patient",
			cond: $scope.search
		};

		$http({
			method: "POST",
			url: url + "read",
			data: where
		}).success(function (response) {
			if (response.length == 1) {
				$scope.info.name = response[0].name;
				$scope.info.mobile = response[0].mobile;
				$scope.info.gender = response[0].gender;
				$scope.info.age = response[0].age;
				$scope.info.referred_by = response[0].reffered_by;
				$scope.info.pc = response[0].pc;
				$scope.info.marketer = response[0].marketer;
				$scope.info.pc = response[0].pc;
			} else {
				$scope.info.name = "";
				$scope.info.mobile = "";
				$scope.info.gender = "";
				$scope.info.age = "";
				$scope.info.referred_by = "";
				$scope.info.pc = "";
				$scope.info.marketer = "";
			}

			console.log(response);
		});
	};



	$scope.testList = [{
		selectedTest: '',
		testName: '',
		testGroup: '',
		room: '',
		price: 0.00
	}];

	// initialize all kind of amount
	$scope.amount = {
		subtotal: 0.00,
		vat: 0.00,
		discount: 0.00,
		total: 0.00,
		grandTotal: 0.00,
		paid: 0.00,
		due: 0.00
	};

	$scope.changeOldTestFn = function (index) {
		// check the product key set or not
		if ($scope.testList[index].testName !== '') {
			// get the data from stock table
			var condition = {
				table: 'investigation',
				cond: {
					test_name: $scope.testList[index].testName
				}
			};

			// set the old one and add a new one
			$http({
				method: 'POST',
				url: url + 'read',
				data: condition
			}).success(function (response) {
				console.log(response);

				if (response.length > 0) {
					// initialize the selected one
					$scope.testList[index].selectedTest = $scope.testList[index].testName;
					$scope.testList[index].testName = response[0].test_name;
					$scope.testList[index].testGroup = response[0].group;
					$scope.testList[index].room = response[0].room;
					$scope.testList[index].price = parseFloat(response[0].test_fee);
				}
			});

			console.log($scope.testList);
		}
	}

	/**
	 * define the add new item method
	 * using keyCode check the key is tab or not
	 *
	 */
	$scope.addNewTestFn = function (event, index) {
		// check the keydown button is tab or not
		if (event.keyCode == 9) {
			// check the last object is empty or not
			var lastItemInList = $scope.testList[$scope.testList.length - 1];
			if (lastItemInList.selectedTest !== '') {
				// declare the new object
				var newItem = {
					selectedTest: '',
					testName: '',
					testGroup: '',
					room: '',
					price: 0.00
				};

				$scope.testList.push(newItem);
			}
		}

		// console.log($scope.testList);
	}

	// calculate the subtotal
	$scope.setSubtotalFn = function () {
		var total = 0.00;

		angular.forEach($scope.testList, function (item) {
			total += item.price;
		});

		$scope.amount.subtotal = total;

		return total;
	}


	$scope.calculateVatFn = function () {
		var total = 0.00,
			vat_amount = 0.00;

		vat_amount = $scope.amount.subtotal * ($scope.amount.vat / 100);
		total = $scope.amount.subtotal + vat_amount;
		$scope.amount.total = total;

		return $scope.amount.total;
	}

	$scope.getGrandTotal = function () {
		var total = 0.00;

		total = $scope.amount.total - $scope.amount.discount;
		$scope.amount.grandTotal = total;

		return total;
	}


	$scope.getTotalDue = function () {
		var total = 0.00;

		total = $scope.amount.grandTotal - $scope.amount.paid;
		$scope.amount.due = total;

		return total;
	}

	//this function will remove a table row
	$scope.deleteTableRowFn = function (i) {
		$scope.testList.splice(i, 1);
	};

}]);






//this controller controll the all test page functionalty
app.controller("allPatientDiagnosisCtrl", ['$scope', '$http', function ($scope, $http) {

	$scope.alltestInfo = [];
	$scope.allDiagnosisFn = function () {
		$scope.alltestInfo = [];
		$scope.perPage = " ";
		$scope.reverse = false;

		var obj = {
			tableFrom: 'bills',
			tableTo: ['diagnosis'],
			joinCond: ['bills.id=diagnosis.bill'],
			cond: {
				'bills.title': 'diagnosis',
			},
			select:['bills.*, diagnosis.alt_doctor_id, diagnosis.alt_doctor_fee'],
			groupBy:'bills.voucher',
			order_col:'bills.date',
			order_by:'DESC'
		}
		
		//Today Date Set 
			var today = new Date();
            var dd = String(today.getDate()).padStart(2, '0');
            var mm = String(today.getMonth() + 1).padStart(2, '0');
            var yyyy = today.getFullYear();
            
            today = yyyy + '-' + mm + '-' + dd;

		if(typeof $scope.search_alt_doctor_id !== 'undefined' && $scope.search_alt_doctor_id != ''){
			obj.cond['diagnosis.alt_doctor_id'] = $scope.search_alt_doctor_id;
		}
		if(typeof $scope.search_test_name !== 'undefined' && $scope.search_test_name != ''){
			obj.cond['diagnosis.name'] = $scope.search_test_name;
		}
		if(typeof dateFrom.value !== 'undefined' && dateFrom.value != ''){
			obj.cond['bills.date >='] = dateFrom.value;
			obj.order_col='bills.date';
			obj.order_by = 'ASC';
		}else{
		    obj.cond['bills.date'] = today;
		}

		if(typeof dateTo.value !== 'undefined' && dateTo.value != ''){
			obj.cond['bills.date <='] = dateTo.value;
			obj.order_col='bills.date';
			obj.order_by = 'ASC';
		}else{
		     obj.cond['bills.date'] = today;
		}
		  
		$http({
			method: "POST",
			url: url + "join",
			data: obj
		}).success(function (response) {
			if (response.length > 0) {
				angular.forEach(response, function (values, index) {
                    values['alt_doctor_fee'] = values.alt_doctor_fee;
					var where = {
						table: 'patients',
						cond: {
							pid: values.pid
						}
					};

					$http({
						method: "POST",
						url: url + "read",
						data: where
					}).success(function (response_p) {

						values['sl'] = index + 1;
						values['name'] = response_p[0].name;
						values['contact'] = response_p[0].contact;
						$scope.alltestInfo.push(values);
					});
					
					$http({
    			        method: 'post',
    			        url: url + 'result',
    			        data: {
    			            table: 'due_payment',
    			            cond: {voucher_number : values.voucher},
    			            select: ['SUM(paid) as paid','SUM(remission) as remission'],
    			            groupBy: 'voucher_number'
    			        }
    			    }).success(function(paidInfo){
    			        if(paidInfo.length > 0){
    			            values['paid'] = parseFloat(+values['paid'] + +parseFloat(paidInfo[0].paid)).toFixed(2);
    			            values['due']  = parseFloat(values['grand_total'] - values['paid']).toFixed(2);
    			        }
    			    });
				});
				
			} else {
				$scope.alltestInfo = [];
			}
		});

		// on change select element
		$scope.paymentStatusFn = function (voucher, contact, title, status) {

			var where = {
				table: 'bills',
				contact: contact,
				title: title,
				cond: {
					voucher: voucher
				},
				data: {
					payment_status: status
				}
			};

			$http({
				method: "POST",
				url: url + "bill_status",
				data: where
			}).success(function (response) {
				console.log(response);

			});

		}



		$scope.altraDoctorFeeFn = function () {
			var total = 0;
			angular.forEach($scope.alltestInfo, function (item) {
				total += parseFloat(item.alt_doctor_fee);
			});
			return total.toFixed(2);
		}
		
		$scope.getGrandTotalFn = function () {
			var total = 0;
			angular.forEach($scope.alltestInfo, function (item) {
				total += parseFloat(item.grand_total);
			});
			return total.toFixed(2);
		}

		$scope.getPaidTotalFn = function () {
			var total = 0;
			angular.forEach($scope.alltestInfo, function (item) {
				total += parseFloat(item.paid);
			});
			return total.toFixed(2);
		}

		$scope.getDueTotalFn = function () {
			var total = 0;
			angular.forEach($scope.alltestInfo, function (item) {
				total += parseFloat(item.due);
			});
			return total.toFixed(2);
		}
	}

	$scope.allDiagnosisFn();

}]);

//edit diagnosis controller
app.controller("editDiagnosisCtrl", ['$scope', '$http', function ($scope, $http) {

	$scope.altraTest = false;

	$scope.$watch('vno', function () {

		$scope.allDoctorId = '';
		$scope.refereedDoctor = '';
		$scope.billNo = '';
		$scope.testList = [];

		var where = {
			table: "bills",
			cond: {
				'voucher': $scope.vno
			}
		};

		$http({
			method: "POST",
			url: url + "read",
			data: where
		}).success(function (response) {
			if (response.length > 0) {
				// fetch diagonis info
				$scope.voucher      = response[0].voucher;
				$scope.less_type    = response[0].less_type;

				var where = {
					tableFrom 	: 'diagnosis',
					tableTo 	: ['test','group_mapping', 'test_group'],
					joinCond 	: ['diagnosis.test_id=test.id', 'test.id=group_mapping.test_id', 'group_mapping.group_id=test_group.id'],
					select 		: 'diagnosis.*, test.*, test_group.group_name',
					groupBy 	: 'test.id',
					cond: {
						'diagnosis.bill' : response[0].id
					}
				};

				$http({
					method: "POST",
					url: url + "join",
					data: where
				}).success(function (records) {
					if (records.length > 0) {
						angular.forEach(records, function (test, key) {
							var newTest = {
								value_id: test.id,
								testName: test.name,
								testGroup: test.group,
								test_id: test.group,
								group_id: test.group_id,
								room: test.room,
								price: parseFloat(test.amount),
								alt_doctor_id: test.alt_doctor_id,
								alt_doctor_fee: test.alt_doctor_fee
							};
							$scope.allDoctorId = test.alt_doctor_id;
							$scope.refereedDoctor = test.refereed_doctor;
							$scope.billNo = test.bill;
							$scope.testList.push(newTest);

							$scope.testList[key].selectedTest = test.test_id;;
							$scope.testList[key].test_id = test.test_id;

							$scope.testList[key].testGroup = test.group_name;
							$scope.testList[key].room = test.room;
							$scope.testList[key].price = parseFloat(test.fee);
						});
						$scope.reference_name = records[0].reference_name;
					}
				});
				// fetch diagonis info end here

				//fetch patient Info from `patients` Table
				var where = {
					table: "patients",
					cond: {
						pid: response[0].pid
					}
				};

				$http({
					method: "POST",
					url: url + "read",
					data: where
				}).success(function (info) {

					$scope.patient_id = info[0].pid;
					$scope.patient_name = info[0].name;
					$scope.patient_mobile = info[0].contact;
					$scope.gender = info[0].gender;
					$scope.age = info[0].age;
					$scope.address = info[0].address;

				});
				// fetch patient Info end here


				//get all reference name from doctors
				/*
    			angular.forEach(response , function(test){
    				var newTest = {
    				value_id : test.id,
					testName: test.test_name,
					testGroup: test.test_group,
					room: test.room_no,
					price: parseFloat(test.amount)
				   };
				  $scope.testList.push(newTest);
    			});
    			*/


				$scope.date = response[0].date;

				$scope.refered_by = response[0].referred_by;
				$scope.pc = response[0].pc;
				$scope.marketer = response[0].marketer;
				$scope.amount.discount = parseFloat(response[0].discount);
				$scope.amount.paid = parseFloat(response[0].paid);
				$scope.amount.vat = parseFloat(response[0].vat);
				$scope.amount.due = parseFloat(response[0].due);

			} else {

				$scope.testList = [];
				$scope.patient_id = "";
				$scope.patient_name = "";
				$scope.patient_mobile = "";
				$scope.date = "";
				$scope.gender = "";
				$scope.age = "";
				$scope.refered_by = "";
				$scope.pc = "";
				$scope.marketer = "";
				$scope.amount.discount = "";
				$scope.amount.paid = "";
				$scope.amount.vat = "";
				$scope.amount.due = "";
			}
		});

	});

	$scope.testList = [{
		selectedTest: '',
		testName: '',
		testGroup: '',
		room: '',
		price: 0.00
	}];

	// initialize all kind of amount
	$scope.amount = {
		subtotal: 0.00,
		vat: 0.00,
		discount: 0.00,
		total: 0.00,
		grandTotal: 0.00,
		paid: 0.00,
		payment: 0.00,
		due: 0.00
	};

	$scope.changeOldTestFn = function (index) {
		// check the product key set or not
		if ($scope.testList[index].test_id !== '') {
			// get the data from stock table
			var condition = {
				tableFrom 	: 'test',
				tableTo 	: ['group_mapping', 'test_group'],
				joinCond 	: ['test.id=group_mapping.test_id', 'group_mapping.group_id=test_group.id'],
				select 		: 'test.*, group_mapping.group_id, test_group.group_name',
				cond: {
					'test.id' : $scope.testList[index].test_id
				}
			};
			// set the old one and add a new one
			$http({
				method: 'POST',
				url: url + 'join',
				data: condition
			}).success(function (response) {
				if (response.length > 0) {
					// initialize the selected one
					$scope.testList[index].selectedTest = response[0].id;;
					$scope.testList[index].test_id = response[0].id;
					$scope.testList[index].group_id = response[0].group_id;
					$scope.testList[index].testGroup = response[0].group_name;
					$scope.testList[index].room = response[0].room;
					$scope.testList[index].price = parseFloat(response[0].fee);
				}
			});
		}
	}

	// calculate the subtotal
	$scope.setSubtotalFn = function () {
		var total = 0.00;

		angular.forEach($scope.testList, function (item) {
			total += item.price;
		});
		$scope.amount.subtotal = total;


		angular.forEach($scope.testList, function (item) {
			if ($scope.altraTest == false) {
				if(item.testGroup == "_Ultrasonography" || item.testGroup == "Digital_Ultrasonography"){
				    $scope.altraTest =true;
				}else{
				    $scope.altraTest =false;
				}
			}
		});

		return total;
	}

	$scope.calculateVatFn = function () {
		var total = 0.00;

		var vat_amount = $scope.amount.subtotal * ($scope.amount.vat / 100);
		total = $scope.amount.subtotal + vat_amount;
		$scope.amount.total = total;

		return $scope.amount.total;
	}

	$scope.getGrandTotal = function () {
		var total = 0.00;
		var discountAmount = 0.0;
         if($scope.less_type=='Flat'){
            discountAmount = parseFloat($scope.amount.discount);
        } 
        if($scope.less_type=='Percentage'){
            discountAmount = parseFloat(parseFloat($scope.amount.total) * parseFloat($scope.amount.discount) / 100);
        } 
        
		total = $scope.amount.total - discountAmount;
		$scope.amount.grandTotal = total;

		return total;
	}


	$scope.getTotalDue = function () {
		var total = 0.00;

		total = $scope.amount.grandTotal - ($scope.amount.paid + $scope.amount.payment);
		$scope.amount.due = total;

		return total;
	}

	//this function will remove a table row
	$scope.deleteTableRowFn = function (i) {
		$scope.testList.splice(i, 1);
	};

}]);

// Due Payment Collection
app.controller("testDuePaymentCtrl", ['$scope', '$http', function ($scope, $http) {

	// initialize all kind of amount
	$scope.amount = {
		subtotal: 0.00,
		vat: 0.00,
		discount: 0.00,
		total: 0.00,
		grandTotal: 0.00,
		paid: 0.00,
		payment: 0.00,
		due: 0.00
	};

	$scope.$watch('vno', function () {

		$scope.testList = [];

		var where = {
			table: "bills",
			cond: {
				'voucher': $scope.vno
			}
		};

		$http({
			method: "POST",
			url: url + "read",
			data: where
		}).success(function (response) {
			if (response.length > 0) {
				// fetch diagonis info
				var where = {
					table: 'diagnosis',
					cond: {
						bill: response[0].id
					}
				};

                var parameter = {
        			tableFrom: 'diagnosis',
        			tableTo: ['test', 'group_mapping', 'test_group'],
        			joinCond: ['diagnosis.test_id=test.id', 'test.id=group_mapping.test_id', 'group_mapping.group_id=test_group.id'],
        			cond: {
        				'diagnosis.bill': response[0].id,
        			},
        			select:['diagnosis.*, test.*, test_group.group_name']
        		}


				$http({
					method: "POST",
					url: url + "join",
					data: parameter
				}).success(function (records) {
					if (records.length > 0) {
					    console.log(records);
						angular.forEach(records, function (test) {
						    
							var newTest = {
								testName: test.test_name,
								testGroup: test.group_name,
								room: test.room,
								price: parseFloat(test.fee)
							};
							
							$scope.testList.push(newTest);
						});

						$scope.reference_name = records[0].reference_name;
						$scope.delivery_date = records[0].delivery;
					}
				});
				// fetch diagonis info end here

				//fetch patient Info from `patients` Table
				var where = {
					table: "patients",
					cond: {
						pid: response[0].pid
					}
				};

				$http({
					method: "POST",
					url: url + "read",
					data: where
				}).success(function (info) {

					$scope.patient_id = info[0].pid;
					$scope.patient_name = info[0].name;
					$scope.patient_mobile = info[0].contact;
					$scope.gender = info[0].gender;
					$scope.age = info[0].age;
					$scope.address = info[0].address;

				});

				$scope.date = response[0].date;
    
				$scope.amount.subtotal = parseFloat(response[0].subtotal);
				$scope.amount.total = parseFloat(response[0].total);
				$scope.amount.totaldiscount = parseFloat(response[0].discount);
				$scope.amount.vat = parseFloat(response[0].vat);
				$scope.amount.vat_amount = parseFloat(response[0].vat_amount);
				$scope.amount.grand_total = parseFloat(response[0].grand_total);
				$scope.amount.oldpaid = parseFloat(response[0].paid) + parseFloat($scope.prv_due_paid) + parseFloat($scope.prv_remission);
				$scope.amount.paid = 0.00;
				$scope.amount.remission = 0.00;
				$scope.amount.due = parseFloat(response[0].due);

			} else {

				$scope.testList = [];
				$scope.patient_id = "";
				$scope.patient_name = "";
				$scope.patient_mobile = "";
				$scope.date = "";
				$scope.gender = "";
				$scope.age = "";
				$scope.refered_by = "";
				$scope.pc = "";
				$scope.marketer = "";
				$scope.amount.discount = "";
				$scope.amount.paid = "";
				$scope.amount.vat = "";
				$scope.amount.due = "";
			}
			//console.log(response);
		});

	});


	$scope.getTotalDue = function () {
		var total = 0.00;
		total = parseFloat($scope.amount.grand_total - ($scope.amount.oldpaid + $scope.amount.paid + $scope.amount.remission));
		$scope.amount.due = total;
		return total;
	}

	$scope.getTotalRemission = function () {
		var total = 0.00;
		total = parseFloat($scope.amount.totaldiscount + $scope.amount.remission);
		return total.toFixed(2);
	}
}]);

/**
 * PatientDiagnosisCtrl is controller name
 *
 */
app.controller("PatientDiagnosisCtrl", ["$scope", "$http", function ($scope, $http) {

	$scope.altraTest = false;
	$scope.testList = [];

	// initialize all kind of amount
	$scope.amount = {
		subtotal: 0.00,
		discount: 0.00,
		vat: 0.00,
		total: 0.00,
		grandTotal: 0.00,
		paid: 0.00,
		due: 0.00
	};
	
	$scope.male_gender = true;
	$scope.female_gender = false;

	//get patient info
	$scope.$watch("pid", function () {
	    
		$scope.getPatientInfoFn = function (pid) {
        
        console.log(pid, 11);
			$scope.patientInfo = {};

			var where = {
				table: "patients",
				cond: {
					"pid": $scope.pid
				}
			};

			$http({
				method: "POST",
				url: url + "read",
				data: where
			}).success(function (response) {
				if (response.length > 0) {
				    
				    var info = {
    						date: response[0].date,
    						name: response[0].name,
    						patient_id: response[0].pid,
    						age: response[0].age,
    						address: response[0].address,
    						contact: response[0].contact
    					};
    					if (response[0].gender == "Male") {
    						$scope.male_gender = true;
    					} else {
    						$scope.female_gender = true;
    					}
    
    					$scope.patientInfo = info;
				    
				    var consultanciesWhere = {
				        table: "consultancies",
        				cond: {
        					"pid": response[0].pid
        				},
        				select:['doctor as doctor_id', 'reference_name as reference_id']
				    };
				    
				    $http({
        				method: "POST",
        				url: url + "result",
        				data: consultanciesWhere
        			}).success(function (responseConsultancies) {
        				if (response.length > 0) {
				            $scope.doctorId = (responseConsultancies[0].doctor_id !=='undefined' ? responseConsultancies[0].doctor_id : '');
    				        $scope.referenceId= (responseConsultancies[0].reference_id !=='undefined' ? responseConsultancies[0].reference_id : '');
			            }else{
			                $scope.doctorId =' ';
    				        $scope.referenceId=' ';
			            }
			        
			        });
				}
			});
		};
		//$scope.altraNameFn();
	});

    
    
    $scope.changeOldTestFn = function (index) {
			// get the data from stock table
			var condition = {
				tableFrom 	: 'test',
				tableTo 	: ['group_mapping', 'test_group'],
				joinCond 	: ['test.id=group_mapping.test_id', 'group_mapping.group_id=test_group.id'],
				select 		: 'test.*, test_group.group_name, test_group.id as group_id',
				cond: {
					'test.id' : $scope.test_id
				}
			};

			// set the old one and add a new one
			$http({
				method: 'POST',
				url: url + 'join',
				data: condition
			}).success(function (response) {
				if (response.length > 0) {
				    
				    var newItem = {
    					testName: response[0].test_name,
    					test_id: response[0].id,
    					testGroup: response[0].group_name,
    					group_id: response[0].group_id,
    					room: response[0].room,
    					price: response[0].fee
    				};
    
    				$scope.testList.push(newItem);
				}
			});
	}
	


	// calculate the subtotal
	$scope.setSubtotalFn = function () {
		var total = 0.00;

		angular.forEach($scope.testList, function (item) {
			total += parseFloat(item.price);
		});

		$scope.amount.subtotal = total;

		return total;
	}

	var where = {
		table: "vat"
	}
	$http({
		method: "POST",
		url: url + 'read',
		data: where
	}).success(function (result) {
		$scope.vat = result[0].percentage;
	});

	$scope.vatAmountCalcFn = function () {
		var vat_amount = 0.00;
		vat_amount = $scope.amount.subtotal * ($scope.vat / 100);
		return vat_amount;
	}


	$scope.calculateVatFn = function () {
		var total = 0.00,
			vat_amount = 0.00;
		vat_amount = $scope.amount.subtotal * ($scope.vat / 100);
		total = $scope.amount.subtotal + vat_amount;
		$scope.amount.total = total;

		return $scope.amount.total;
	}

	$scope.getGrandTotal = function () {
		var total = 0.00;
		var discountAmount = 0.0;
		
        if($scope.less_type=='Flat'){
            discountAmount = parseFloat($scope.amount.discount);
        } 
        if($scope.less_type=='Percentage'){
            discountAmount = parseFloat(parseFloat($scope.amount.total) * parseFloat($scope.amount.discount) / 100);
        } 
        
		total = $scope.amount.total - discountAmount;
		$scope.amount.grandTotal = total;

		return total;
	}

	$scope.getTotalDue = function () {
		var total = 0.00;

		total = $scope.amount.grandTotal - $scope.amount.paid;
		$scope.amount.due = total;

		return total;
	}

	//this function will remove a table row
	$scope.deleteTableRowFn = function (i) {
		$scope.testList.splice(i, 1);
		$scope.altraTest = false;
		//$scope.altraNameFn();
	};

}]);

/**
 * PatientDiagnosisCtrl is controller name
 *
 */
app.controller("GroupWiseDiagnosisCtrl", ["$scope", "$http", function ($scope, $http) {

	$scope.altraTest = false;
	$scope.testList = [];

	// initialize all kind of amount
	$scope.amount = {
		subtotal: 0.00,
		discount: 0.00,
		vat: 0.00,
		total: 0.00,
		grandTotal: 0.00,
		paid: 0.00,
		due: 0.00
	};
	
	$scope.male_gender = true;
	$scope.female_gender = false;
	$scope.amount;

	//get patient info
	$scope.$watch("pid", function () {
	    
		$scope.getPatientInfoFn = function () {

			$scope.patientInfo = {};

			var where = {
				table: "patients",
				cond: {
					"pid": $scope.pid
				}
			};

			$http({
				method: "POST",
				url: url + "read",
				data: where
			}).success(function (response) {
				if (response.length > 0) {
				    
				    var info = {
						date: response[0].date,
						name: response[0].name,
						patient_id: response[0].pid,
						age: response[0].age,
						address: response[0].address,
						contact: response[0].contact
					};
					if (response[0].gender == "Male") {
						$scope.male_gender = true;
					} else {
						$scope.female_gender = true;
					}

					$scope.patientInfo = info;
				    
				    var consultanciesWhere = {
				        table: "consultancies",
        				cond: {
        					"pid": response[0].pid
        				},
        				select:['doctor as doctor_id', 'reference_name as reference_id']
				    };
				    
				    $http({
        				method: "POST",
        				url: url + "result",
        				data: consultanciesWhere
        			}).success(function (responseConsultancies) {
        				if (response.length > 0) {
				            $scope.doctorId = (responseConsultancies[0].doctor_id !=='undefined' ? responseConsultancies[0].doctor_id : '');
    				        $scope.referenceId= (responseConsultancies[0].reference_id !=='undefined' ? responseConsultancies[0].reference_id : '');
			            }else{
			                $scope.doctorId =' ';
    				        $scope.referenceId=' ';
			            }
			        
			        });
				}
			});
		};
		// $scope.altraNameFn();
	});

    
    
    $scope.addAllGroupItemFn = function (group_id) {
		var condition = {
			tableFrom 	: 'test',
			tableTo 	: ['group_mapping', 'test_group'],
			joinCond 	: ['test.id=group_mapping.test_id', 'group_mapping.group_id=test_group.id'],
			select 		: 'test.*, test_group.group_name, test_group.id as group_id, test_group.price as group_price',
			cond 		: { 'test_group.id' : group_id }
		}

		// set the old one and add a new one
		$http({
			method: 'POST',
			url: url + 'join',
			data: condition
		}).success(function (response) {
			if (response.length > 0) {
				var total = 0;
				angular.forEach(response, function(item, index){
					var newItem = {
    					testName 	: item.test_name,
    					test_id 	: item.id,
    					testGroup 	: item.group_name,
    					group_id 	: item.group_id,
    					room 		: item.room,
    				};
    				total = item.group_price;
    				$scope.testList.push(newItem);
				});
				$scope.amount.subtotal += +total;
			}
		});
	}
	


	// calculate the subtotal
	$scope.setSubtotalFn = function () {
		return $scope.amount.subtotal;
	}

	var where = {
		table: "vat"
	}
	$http({
		method: "POST",
		url: url + 'read',
		data: where
	}).success(function (result) {
		$scope.vat = result[0].percentage;
	});

	$scope.vatAmountCalcFn = function () {
		var vat_amount = 0.00;
		vat_amount = $scope.amount.subtotal * ($scope.vat / 100);
		return vat_amount;
	}


	$scope.calculateVatFn = function () {
		var total = 0.00,
			vat_amount = 0.00;
		vat_amount = $scope.amount.subtotal * ($scope.vat / 100);
		total = $scope.amount.subtotal + vat_amount;
		$scope.amount.total = total;

		return $scope.amount.total;
	}

	$scope.getGrandTotal = function () {
		var total = 0.00;
		var discountAmount = 0.0;
		
        if($scope.less_type=='Flat'){
            discountAmount = parseFloat($scope.amount.discount);
        } 
        if($scope.less_type=='Percentage'){
            discountAmount = parseFloat(parseFloat($scope.amount.total) * parseFloat($scope.amount.discount) / 100);
        } 
        
		total = $scope.amount.total - discountAmount;
		$scope.amount.grandTotal = total;

		return total;
	}

	$scope.getTotalDue = function () {
		var total = 0.00;

		total = $scope.amount.grandTotal - $scope.amount.paid;
		$scope.amount.due = total;

		return total;
	}

	//this function will remove a table row
	$scope.deleteTableRowFn = function (i) {
		$scope.testList.splice(i, 1);
		$scope.altraTest = false;
		// $scope.altraNameFn();
	};

}]);


/**
 * ListOfOperation is controller name
 *
 */
app.controller("ListOfOperation", ['$scope', '$http', function ($scope, $http) {
	$scope.perPage = "10";
	$scope.dataset = [];

	var obj = {
		table: 'operation'
	};

	$http({
		method: "POST",
		url: url + "read",
		data: obj
	}).success(function (response) {
		if (response.length > 0) {
			angular.forEach(response, function (row, index) {
				row['sl'] = index + 1;
				$scope.dataset.push(row);
			});
		} else {
			$scope.dataset = [];
		}
	});
}]);

//cost controller start here
app.controller("costCtrl", ['$scope', '$http', function ($scope, $http) {
	$scope.perPage = "10";
	$scope.reverse = false;
	$scope.fields = [];

	var obj = {
		table: "cost_field",
		cond: {'trash': 0}
	};

	$http({
		method: "POST",
		url: url + "read",
		data: obj
	}).success(function (response) {
		if (response.length > 0) {
			angular.forEach(response, function (values, index) {
				values['sl'] = index + 1;
				$scope.fields.push(values);
			});
		} else {
			$scope.fields = [];
		}
	});
}]);

//cost controller start here
app.controller("incomeCtrl", ['$scope', '$http', function ($scope, $http) {
	$scope.perPage = "10";
	$scope.reverse = false;
	$scope.fields = [];

	var obj = {
		table: "income_field",
		cond: {'trash': 0}
	};

	$http({
		method: "POST",
		url: url + "read",
		data: obj
	}).success(function (response) {
		if (response.length > 0) {
			angular.forEach(response, function (values, index) {
				values['sl'] = index + 1;
				$scope.fields.push(values);
			});
		} else {
			$scope.fields = [];
		}
	});
}]);


//employee controller start here
app.controller("employeeCtrl", ['$scope', '$http', function ($scope, $http) {
	$scope.addressSameOrNot = function () {
		var present_address = $scope.present_address;
		if ((typeof present_address == "undefined" || present_address != "") && $scope.check != "") {
			$scope.permanent_address = present_address;
		} else {
			$scope.permanent_address = "";
		}
	};
}]);

//All employee show controller
app.controller("showAllCtrl", ['$scope', '$http', function ($scope, $http) {

	$scope.perPage = "10";
	$scope.revers = false;
	$scope.allEmployees = [];

	var where = {
		table: "employee"
	};

	$http({
		method: "POST",
		url: url + "read",
		data: where
	}).success(function (response) {
		if (response.length > 0) {
			angular.forEach(response, function (values, index) {
				values['sl'] = index + 1;
				$scope.allEmployees.push(values);
			});
		} else {
			$scope.allEmployees = [];
		}
	});

}]);


//bill controller start here
app.controller("billCtrl", ['$scope', '$http', function ($scope, $http) {

	$scope.findPatientInfo = function () {

		var where = {
			table: "patient",
			cond: {
				"patient_id": $scope.patient_id
			}
		};

		$http({
			method: "POST",
			url: url + "read",
			data: where
		}).success(function (response) {
			if (response.length == 1) {
				$scope.patient_name = response[0].name;
				$scope.age = response[0].age;
				$scope.gender = response[0].gender;
				$scope.refered_by = response[0].reffered_by;
			} else {
				$scope.patient_name = "";
				$scope.age = "";
				$scope.gender = "";
				$scope.refered_by = "";
			}
		});
	};

	$scope.itemList = [{
		itemName: '',
		amount: 0.00
	}];

	// initialize all kind of amount
	$scope.amount = {
		subtotal: 0.00,
		discount: 0.00,
		grandTotal: 0.00,
		paid: 0.00,
		due: 0.00
	};

	$scope.changeOldTestFn = function (index) {
		// check the product key set or not
		if ($scope.itemList[index].itemName !== '') {
			$scope.itemList[index].amount = parseFloat(500.00);
		}
		console.log($scope.itemList);
	}

	/**
	 * define the add new item method
	 * using keyCode check the key is tab or not
	 *
	 */
	$scope.addNewTestFn = function (event, index) {
		// check the keydown button is tab or not
		if (event.keyCode == 9) {
			// check the last object is empty or not
			var lastItemInList = $scope.itemList[$scope.itemList.length - 1];
			if (lastItemInList.itemName !== '') {
				// declare the new object
				var newItem = {
					itemName: '',
					amount: 0.00
				};

				$scope.itemList.push(newItem);
			}
		}

		// console.log($scope.testList);
	}

	// calculate the subtotal
	$scope.setSubtotalFn = function () {
		var total = 0.00;

		angular.forEach($scope.itemList, function (item) {
			total += item.amount;
		});

		$scope.amount.subtotal = total;

		return total;
	}


	$scope.getGrandTotal = function () {
		var total = 0.00;

		total = $scope.amount.subtotal - $scope.amount.discount;
		$scope.amount.grandTotal = total;

		return total;
	}


	$scope.getTotalDue = function () {
		var total = 0.00;

		total = $scope.amount.grandTotal - $scope.amount.paid;
		$scope.amount.due = total;

		return total;
	}

	//this function will remove a table row
	$scope.deleteTableRowFn = function (i) {
		$scope.itemList.splice(i, 1);
	};
}]);


//all bill controller
app.controller("allBillCtrl", ['$scope', '$http', function ($scope, $http) {
	$scope.perPage = "10";
	$scope.reverse = false;
	$scope.alltestInfo = [];

	var obj = {
		table: 'bills',
		column: 'voucher',
		cond: {
			'due >': 0
		}
	};

	$http({
		method: "POST",
		url: url + "read_GroupBy",
		data: obj
	}).success(function (response) {
	    
		if (response.length > 0) {
			angular.forEach(response, function (values, index) {

				var where = {
					table: 'patients',
					cond: {
						pid: values.pid
					}
				};

				$http({
					method: "POST",
					url: url + "read",
					data: where
				}).success(function (response) {
				    
				    if(response.length > 0){
				        
				        // get paid amount
    				    $http({
    				        method: 'post',
    				        url: url + 'result',
    				        data: {
    				            table: 'due_payment',
    				            cond: {voucher_number: values.voucher},
    				            select: ['SUM(paid) as paid','SUM(remission) as remission'],
    				            groupBy: 'voucher_number'
    				        }
    				    }).success(function(paidInfo){
    				        
    				        if(paidInfo.length > 0){
    				            values['due_paid'] = parseFloat(paidInfo[0].paid);
    				            values['due_remission'] = parseFloat(paidInfo[0].remission);
    				        }else{
    				            values['due_paid'] = 0;
    				            values['due_remission'] = 0;
    				        }
    				    });
    
    					values['sl'] = index + 1;
    					values['name'] = response[0].name;
    					
    					$scope.alltestInfo.push(values);
				    } 

				});

			});
		} else {
			$scope.alltestInfo = [];
		}
	});
}]);








/**
 * PatientOperationCtrl is controller name
 *
 */
app.controller('PatientOperationCtrl', ['$scope', '$http', function ($scope, $http) {
	$scope.amount = {
		operationFee: 0.00,
		total: 0.00,
		discount: 0.00,
		grandTotal: 0.00,
		paid: 0.00,
		due: 0.00
	};

	//get operation information
	$scope.getOperationInfoFn = function () {
		var where = {
			table: "operation",
			cond: {
				id: $scope.operationID
			}
		};

		$http({
			method: "POST",
			url: url + "read",
			data: where
		}).success(function (response) {
			if (response.length == 1) {
				$scope.amount.operationFee += parseFloat(response[0].fee)
			}
		});

		// console.log($scope.amount);
	};

	//get patient information
	$scope.getPatientInfoFn = function () {
		var where = {
			table: "patients",
			cond: {
				pid: $scope.patientID
			}
		};

		$http({
			method: "POST",
			url: url + "read",
			data: where
		}).success(function (response) {
			$scope.info = {};

			if (response.length == 1) {
				$scope.info.name = response[0].name;
				$scope.info.age = response[0].age;
				$scope.info.contact = response[0].contact;

				var guardian = angular.fromJson(response[0].guardian),
					guardianName = Object.values(guardian);

				$scope.info.guardian = guardianName[0];
			}
		});
	};

	$scope.specialisedList = [{
		id: '',
		subject: '',
		fee: 0.00
	}];

	$scope.changeOldItemFn = function (index) {
		// check the product key set or not
		if ($scope.specialisedList[index].subject !== '') {
			// get the data from stock table
			var condition = {
				table: 'doctors',
				cond: {
					id: $scope.specialisedList[index].id,
					status: 1
				}
			};

			// set the old one and add a new one
			$http({
				method: 'POST',
				url: url + 'read',
				data: condition
			}).success(function (response) {
				if (response.length > 0) {
					// initialize the selected one
					$scope.specialisedList[index].id = response[0].id;
					$scope.specialisedList[index].subject = response[0].specialised;
					$scope.specialisedList[index].fee = parseFloat(response[0].fee);
				}
			});

			// console.log($scope.specialisedList);
		}
	}

	/**
	 * define the add new item method
	 * using keyCode check the key is tab or not
	 *
	 */
	$scope.addSpecialisedFn = function (event, index) {
		// check the keydown button is tab or not
		if (event.keyCode == 9) {
			// check the last object is empty or not
			var lastItem = $scope.specialisedList[$scope.specialisedList.length - 1];

			if (lastItem.subject !== '') {
				// declare the new object
				var item = {
					id: '',
					subject: '',
					fee: 0.00
				};

				$scope.specialisedList.push(item);
			}
		}

		console.log($scope.specialisedList);
	}

	/**
	 * define the add new item method
	 * using keyCode check the key is tab or not
	 *
	 */
	$scope.othersList = [{
		category: '',
		itemName: '',
		fee: 0
	}];

	$scope.addItemFn = function (event, index) {
		// check the keydown button is tab or not
		if (event.keyCode == 9) {
			// check the last object is empty or not
			var lastItem = $scope.othersList[$scope.othersList.length - 1];

			if (lastItem.category !== '') {
				// declare the new object
				var item = {
					category: '',
					itemName: '',
					fee: 0.00
				};

				$scope.othersList.push(item);
			}
		}
	}

	$scope.getTotalFn = function () {
		var total = 0.00;

		angular.forEach($scope.specialisedList, function (item) {
			total += parseFloat(item.fee);
		});

		angular.forEach($scope.othersList, function (item) {
			total += parseFloat(item.fee);
		});

		$scope.amount.total = total + parseFloat($scope.amount.operationFee);

		return $scope.amount.total;
	}

	$scope.getGrandTotalFn = function () {
		var total = 0.00;

		total = $scope.amount.total - $scope.amount.discount;
		$scope.amount.grandTotal = total;

		return $scope.amount.grandTotal;
	}

	$scope.getTotalDueFn = function () {
		var total = 0.00;

		total = $scope.amount.grandTotal - $scope.amount.paid;
		$scope.amount.due = total;

		return $scope.amount.due;
	}

	//this function will remove a table row
	$scope.deleteSpecialisedFn = function (index) {
		$scope.specialisedList.splice(index, 1);
	};

	$scope.deleteOthersFn = function (index) {
		$scope.othersList.splice(index, 1);
	};

}]);



// Category controller
app.controller("showcategoryCtrl", function ($scope, $http) {

	$scope.allCategory = [];
	var condition = {
		table: 'category',
		/*cond: {
			trash: "0"
		}*/
	};

	console.log(condition);

	$http({
		method: 'POST',
		url: url + 'read',
		data: condition
	}).success(function (response) {
		if (response.length > 0) {
			$scope.allCategory = response;
		} else {
			$scope.allCategory = "";
		}

		//Loader
		$("#loading").fadeOut("fast", function () {
			$("#data").fadeIn('slow');
		});
	});


});


// Reagent controller
app.controller("showReagentCtrl", function ($scope, $http) {

	$scope.allReagent = [];
	var condition = {
		table: 'reagent',
	};
	$http({
		method: 'POST',
		url: url + 'read',
		data: condition
	}).success(function (response) {
		if (response.length > 0) {
			$scope.allReagent = response;
		} else {
			$scope.allReagent = "";
		}

		//Loader
		$("#loading").fadeOut("fast", function () {
			$("#data").fadeIn('slow');
		});

		console.log(response);
	});

});



// operation all information
app.controller("OperationInfoCtrl", ['$scope', '$http', function ($scope, $http) {
	$scope.perPage = "10";
	$scope.reverse = false;
	$scope.allPatients = [];

	var transmit = {
		from: "operations",
		join: "patients",
		cond: "operations.pid=patients.pid"
	};

	$http({
		method: "POST",
		url: url + "readJoinData",
		data: transmit
	}).success(function (response) {
		if (response.length > 0) {
			angular.forEach(response, function (values, index) {
				values['sl'] = index + 1;
				$scope.allPatients.push(values);
			});
		} else {
			$scope.allPatients = [];
		}

		console.log(response);
	});
}]);








/**
 * ConsultancyNewCtrl is controller name
 *
 */
app.controller("NewConsultancyCtrl", ["$scope", "$http", function ($scope, $http) {

	$scope.consultancyList = [{
		selectedDoctor: '',
		doctorName: '',
		specialised: '',
		room: '',
		fee: 0.00
	}];


	// initialize all kind of amount
	$scope.amount = {
		subtotal: 0.00,
		vat: $scope.varPers,
		discount: 0.00,
		total: 0.00,
		grandTotal: 0.00,
		paid: 0.00,
		due: 0.00
	};

	$scope.$watch("pid", function () {

		var getPatientInfoFn = function () {
			$scope.male_gender = $scope.female_gender = false;
			$scope.patientInfo = {};

			var where = {
				table: "patients",
				cond: {
					"pid": $scope.pid
				}
			};

			$http({
				method: "POST",
				url: url + "read",
				data: where
			}).success(function (response) {
				if (response.length == 1) {

					var info = {
						date: response[0].date,
						name: response[0].name,
						age: response[0].age,
						address: response[0].address,
						contact: response[0].contact,
						guardian: response[0].guardian
					};

					if (response[0].gender == "Male") {
						$scope.male_gender = true;
					} else {
						$scope.female_gender = true;
					}

					$scope.patientInfo = info;

				}
			});
		};

		getPatientInfoFn();
	});

	$scope.changeOldFn = function (index) {
		// check the product key set or not
		if ($scope.consultancyList[index].doctorName !== '') {
			// get the data from stock table
			var condition = {
				table: 'doctors',
				cond: {
					fullName: $scope.consultancyList[index].doctorName,
					status: 1
				}
			};

			// set the old one and add a new one
			$http({
				method: 'POST',
				url: url + 'read',
				data: condition
			}).success(function (response) {
				//console.log(response);

				if (response.length > 0) {
					// initialize the selected one
					$scope.consultancyList[index].selectedDoctor = $scope.consultancyList[index].doctorName;
					$scope.consultancyList[index].doctorID = response[0].id;
					$scope.consultancyList[index].doctorName = response[0].fullName;
					$scope.consultancyList[index].specialised = response[0].specialised;
					$scope.consultancyList[index].room = response[0].room_no;
					$scope.consultancyList[index].fee = parseFloat(response[0].fee);
				}
			});
		}
	}

	/**
	 * define the add new item method
	 * using keyCode check the key is tab or not
	 *
	 */
	$scope.addNewFn = function (event, index) {
		// check the keydown button is tab or not
		if (event.keyCode == 9) {
			// check the last object is empty or not
			var lastItemInList = $scope.consultancyList[$scope.consultancyList.length - 1];
			if (lastItemInList.selectedDoctor !== '') {
				// declare the new object
				var newItem = {
					selectedDoctor: '',
					doctorName: '',
					specialised: '',
					room: '',
					fee: 0.00
				};

				$scope.consultancyList.push(newItem);
			}
		}

		// console.log($scope.testList);
	}

	// calculate the subtotal
	$scope.setSubtotalFn = function () {

		var total = 0.00;
		angular.forEach($scope.consultancyList, function (item) {
			total += item.fee;
		});

		$scope.amount.subtotal = total;

		return total;
	}

	var where = {
		table: "vat"
	}
	$http({
		method: "POST",
		url: url + 'read',
		data: where
	}).success(function (result) {
		$scope.vat = result[0].percentage;
	});



	$scope.calculateVatFn = function () {
		var total = 0.00,
			vat_amount = 0.0;

		vat_amount = $scope.amount.subtotal * ($scope.vat / 100);
		total = $scope.amount.subtotal + vat_amount;
		$scope.amount.total = total;
		//console.log($scope.amount);
		return $scope.amount.total;
	}

	$scope.getGrandTotal = function () {

		var total = 0.00;
		total = $scope.amount.total - $scope.amount.discount;
		$scope.amount.grandTotal = total;

		return total;
	}


	$scope.getTotalDue = function () {
		var total = 0.00;

		total = $scope.amount.grandTotal - $scope.amount.paid;
		$scope.amount.due = total;
		return total;
	}

	//this function will remove a table row
	$scope.deleteTableRowFn = function (i) {
		$scope.consultancyList.splice(i, 1);
	};

}]);

//this controller controll the all test page functionalty
app.controller("allConsultancyCtrl", ['$scope', '$http', function ($scope, $http) {

	$scope.perPage = "10";
	$scope.reverse = false;
	$scope.allconsultancy = [];

	var obj = {
		table: 'consultancies',
		column: 'consultancy_no'
	};

	$http({
		method: "POST",
		url: url + "read_GroupBy",
		data: obj
	}).success(function (response) {
		if (response.length > 0) {
			angular.forEach(response, function (values, index) {
				response[index]['sl'] = index + 1;
			});

			$scope.allconsultancy = response;
		} else {
			$scope.allconsultancy = [];
		}
	});
}]);

//edit Consultancy controller
app.controller("EditConsultancyCtrl", ['$scope', '$http', 'config', function ($scope, $http, config) {

	$scope.resultset = [];
	$scope.amount = {
		subtotal: 0.00,
		vat: 0.00,
		discount: 0.00,
		total: 0.00,
		grandTotal: 0.00,
		paid: 0.00,
		due: 0.00
	};
	$scope.total = 0;

	$scope.$watch('pid', function () {

		var whereConsultancies = {
			tableFrom: 'consultancies',
			tableTo: ['doctors', 'patients', 'bills'],
			joinCond: ['consultancies.doctor=doctors.id', 'consultancies.pid=patients.pid', 'consultancies.bill=bills.id'],
			cond: {
				'consultancies.pid': $scope.pid,
				'doctors.status': 1,
			},
			select: [
				'consultancies.*', 'doctors.fullName',
				'doctors.specialised', 'doctors.fee', 'doctors.id as doctorId',
				'patients.name', 'patients.gender', 'patients.age', 'patients.address', 'patients.contact',
				'bills.paid', 'bills.due', 'bills.date as bill_date', 'bills.voucher', 'bills.total', 'bills.vat', 'bills.discount',
				'bills.grand_total'
			],
		}

		$http({
			method: "POST",
			url: url + "join",
			data: whereConsultancies
		}).success(function (response) {

			if (response.length > 0) {
				angular.forEach(response, function (test) {
					var newObj = {
						consultancy_id: test.id,
						doctorName: test.fullName,
						specialised: test.specialised,
						room: test.room,
						fee: parseFloat(test.fee),
						total: parseFloat(test.total),
						paid: parseFloat(test.paid),
						due: parseFloat(test.due),
						grand_total: parseFloat(test.grand_total),
						doctorId: test.doctorId
					};
					$scope.resultset.push(newObj);
				});

				$scope.patient_id = response[0].pid;
				$scope.patient_name = response[0].name;
				$scope.patient_mobile = response[0].contact;
				$scope.date = response[0].bill_date;
				$scope.gender = response[0].gender;
				$scope.age = response[0].age;
				$scope.referedBy = response[0].referred_by;
				$scope.pc = response[0].pc;
				$scope.marketer = response[0].marketer;
				$scope.amount.discount = parseFloat(response[0].discount);
				$scope.amount.paid = parseFloat(response[0].paid);
				$scope.amount.due = parseFloat(response[0].due);
				$scope.voucherNo = response[0].voucher;
			} else {
				$scope.resultset = [];
				$scope.patient_id = "";
				$scope.patient_name = "";
				$scope.patient_mobile = "";
				$scope.date = "";
				$scope.gender = "";
				$scope.age = "";
				$scope.referedBy = "";
				$scope.pc = "";
				$scope.marketer = "";
				$scope.amount.discount = "";
				$scope.amount.paid = "";
				$scope.amount.due = "";
				$scope.voucherNo = '';
			}
		});
	});

	$scope.changeOldFn = function (index) {
		// check the product key set or not
		if ($scope.resultset[index].doctorName !== '') {
			// get the data from stock table
			var condition = {
				table: 'doctors',
				cond: {
					fullName: $scope.resultset[index].doctorName,
					status: 1
				}
			};

			// set the old one and add a new one
			$http({
				method: 'POST',
				url: url + 'read',
				data: condition
			}).success(function (response) {
				if (response.length > 0) {
					$scope.resultset[index].doctorName = response[0].fullName;
					$scope.resultset[index].specialised = response[0].specialised;
					$scope.resultset[index].room = response[0].room_no;
					$scope.resultset[index].fee = parseFloat(response[0].fee);
					$scope.resultset[index].doctorId = parseFloat(response[0].id);
					console.log($scope.resultset[index].doctorId);
				} else {
					$scope.resultset[index].doctorName = "";
					$scope.resultset[index].specialised = "";
					$scope.resultset[index].room = "";
					$scope.resultset[index].fee = 0.00;
					$scope.grandTotal = 0;
					$scope.resultset[index].doctorId = '';
				}
			});

		}
	}

	// calculate the subtotal
	$scope.setSubtotalFn = function () {
		var total = 0.00;

		angular.forEach($scope.resultset, function (item) {
			total += item.fee;
		});

		$scope.amount.subtotal = total;

		return total;
	}

	$scope.calculateVatFn = function () {
		var total = 0.00;

		// $scope.amount.vat = $scope.amount.subtotal * (config.vat / 100);
		// total = $scope.amount.subtotal + $scope.amount.vat;
		// $scope.amount.total = total;

		return $scope.amount.total;
	}

	$scope.getTotalFn = function () {
		var total = 0.00;
		total = $scope.amount.subtotal;
		$scope.total = total;
		return total;
	}

	$scope.getGrandTotal = function () {
		var total = 0.00;
		total = ($scope.total - $scope.amount.discount);
		$scope.grandTotalAmount = total;
		return total;
	}

	$scope.getTotalDue = function () {
		var total = 0.00;

		total = $scope.grandTotalAmount - $scope.amount.paid;
		$scope.amount.due = total;
		return total;
	}

	//this function will remove a table row
	$scope.deleteTableRowFn = function (i) {
		$scope.resultset.splice(i, 1);
	};

}]);


//agreement controller start here
app.controller("agreementCtrl", function ($scope, $http) {
	//code here...

});



/**
 * PC Comission is controller name
 * loadData method load all the data from DB
 *
 */
app.controller('PcCommitionCtrl', ['$scope', '$http', function ($scope, $http) {
	$scope.dataset = [];
	$scope.perPage = "10";

	var loadData = function () {
		$http({
			method: 'POST',
			url: siteurl + 'pc/cont/commitionInfo'
		}).success(function (response) {
			$scope.dataset = response;
			if (response.length > 0) {
				angular.forEach(response, function (row, i) {
					response[i].sl = (i + 1);
					response[i].percentage = parseFloat(row.percentage);
					response[i].total = parseFloat(row.total);
				});
			}

			console.log($scope.dataset);
		});
	}

	$scope.getSumOfTotalFn = function () {
		var total = 0.00;
		angular.forEach($scope.dataset, function (row, i) {
			total += row.total;
		});

		return total;
	}

	$scope.getSumOfCommissionFn = function () {
		var total = 0.00;
		angular.forEach($scope.dataset, function (row, i) {
			total += row.commission;
		});

		return total;
	}

	loadData();
}]);


/**
 * PC CommissionPaymentCtrl is controller name
 *
 */
app.controller('PcCommissionPaymentCtrl', ['$scope', '$http', function ($scope, $http) {
	$scope.dataset = [];


	$scope.getCommitionInfoFn = function () {
		var where = {
			table: 'commission',
			cond: $scope.search
		};

		where.cond.type = 'PC';

		$http({
			method: 'POST',
			url: url + 'read',
			data: where
		}).success(function (response) {
			if (response.length > 0) {
				response[0].balance = parseFloat(response[0].balance);
				$scope.dataset = response[0];
			} else {
				$scope.dataset = [];
			}

			console.log($scope.dataset);
		});
	}

	$scope.totalBalanceFn = function () {
		var total = 0.00;
		total = $scope.dataset.balance - $scope.paid;

		console.log($scope.dataset.balance, $scope.paid, total);
		return total;
	}

}]);



/**
 * PC CommissionUpdateCtrl is controller name
 *
 */
app.controller('PcCommissionUpdateCtrl', ['$scope', '$http', function ($scope, $http) {
	$scope.dataset = [];


	$scope.getLastCommitionInfoFn = function () {
		var where = {
			condition: $scope.search
		};

		$http({
			method: 'POST',
			url: siteurl + 'pc/cont/getInfo',
			data: where
		}).success(function (response) {
			if (Object.keys(response).length > 0 && response.constructor === Object) {
				response.balance = parseFloat(response.balance);
				response.last_payment_amount = parseFloat(response.last_payment_amount);
			}

			$scope.dataset = response;
			console.log(response);
		});
	}

	$scope.totalBalanceFn = function () {
		var total = 0.00;
		total = $scope.dataset.balance - $scope.amount;

		console.log($scope.dataset.balance, $scope.paid, total);
		return total;
	}

}]);



/**
 * PC CommissionDetailsCtrl is controller name
 *
 */
app.controller('PcCommissionDetailsCtrl', ['$scope', '$http', function ($scope, $http) {
	$scope.dataset = [];
	$scope.perPage = "10";

	var loadData = function () {
		var condition = {
			table: 'commission_meta'
		};

		$http({
			method: 'POST',
			url: siteurl + 'pc/cont/getPcCommitionInfoFn',
			data: condition
		}).success(function (response) {
			if (response.length > 0) {
				angular.forEach(response, function (row, i) {
					var item = {
						sl: (i + 1),
						date: row.date,
						pc: row.person,
						commission: row.balance,
						paid: row.paid,
						due: row.due
					};

					$scope.dataset.push(item);
				});
			} else {
				$scope.dataset = [];
			}
		});
	}

	loadData();
}]);



app.controller("SuperadminCtrl", ["$scope", "$http", function ($scope, $http) {

	$http({
		method: "POST",
		url: 'http://localhost/labsm/resource/cpm?key=adasadw342423q1323323&domain=dollarbuysell.com&ip=192.168.0.110'
	}).success(function (response) {

		console.log(response);

	});

}]);



// payroll controller
app.controller("PayrollCtrl", ["$scope", "$http", function ($scope, $http) {
	$scope.profile = {
		image: siteurl + "private/images/default.png",
		active: false
	};
	$scope.msg = {
		active: true,
		content: ""
	};

	$scope.getProfileFn = function () {
		var where = {
			table: "employee",
			cond: {
				"emp_id": $scope.data.eid
			}
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

				// chack existance
				var transmit = {
					table: "salary_structure",
					where: {
						eid: $scope.data.eid
					}
				};

				$http({
					method: "POST",
					url: siteurl + 'payroll/addBasicSalaryCtrl/exists',
					data: transmit
				}).success(function (response) {
					var transmit = {
						table: "salary_structure",
						dataset: $scope.data
					};

					// store the info
					if (parseInt(response) === 1) {
						transmit.dataset = {
							basic: $scope.data.basic
						}
						transmit.where = {
							eid: $scope.data.eid
						};
					}

					$http({
						method: "POST",
						url: siteurl + 'payroll/addBasicSalaryCtrl/save',
						data: transmit
					}).success(function (response) {
						$scope.msg.active = true;
						$scope.msg.content = response;

						console.log(response);
					});
				});
			} else {
				console.log("Employee not found!");
				$scope.msg.active = false;

				$scope.profile = {};

				$scope.profile.image = siteurl + "private/images/default.png";
				$scope.profile.active = false;
			}

		});
	}


}]);



// Incentive Controller
app.controller("IncentiveCtrl", ["$scope", "$http", function ($scope, $http) {
	$scope.profile = {
		image: siteurl + "private/images/default.png",
		active: false
	};

	$scope.incentives = [{
			fields: "HRA",
			percentage: 0
		},
		{
			fields: "DA",
			percentage: 0
		},
		{
			fields: "TA",
			percentage: 0
		},
		{
			fields: "CCA",
			percentage: 0
		},
		{
			fields: "Medical",
			percentage: 0
		}
	];

	$scope.getProfileFn = function () {
		var where = {
			table: "employee",
			cond: {
				"emp_id": $scope.eid
			}
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
					cond: {
						eid: $scope.eid
					}
				};

				$http({
					method: "POST",
					url: url + "read",
					data: transmit
				}).success(function (response) {
					if (response.length > 0) {
						$scope.amount = parseInt(response[0].basic);
					} else {
						alert("This employee's basic info not found!");
					}
				});

				// check incentive active or not
				var transmit = {
					table: "salary_structure",
					cond: {
						"eid": $scope.eid
					}
				};

				$http({
					method: "POST",
					url: url + "read",
					data: transmit
				}).success(function (response) {
					console.log(response);
					if (response[0].incentive === "yes") {
						var transmit = {
							table: "incentive_structure",
							cond: {
								eid: $scope.eid
							}
						};

						$http({
							method: "POST",
							url: url + "read",
							data: transmit
						}).success(function (response) {
							console.log(response);

							angular.forEach(response, function (row, index) {
								response[index].percentage = parseFloat(response[index].percentage);
							});

							$scope.incentives = response;
						});
					}
				});

			} else {
				// console.log("Employee not found!");

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



// Bonus Controller
app.controller("BonusCtrl", ["$scope", "$http", function ($scope, $http) {
	$scope.bonuses = [{
		fields: "",
		percentage: 0,
		remarks: ""
	}];
	$scope.profile = {
		image: siteurl + "private/images/default.png",
		active: false
	};

	$scope.getProfileFn = function () {
		var where = {
			table: "employee",
			cond: {
				"emp_id": $scope.eid
			}
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
				console.log(response);

				// get bonus info
				var transmit = {
					table: "salary_structure",
					cond: {
						eid: $scope.eid
					}
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
								cond: {
									eid: $scope.eid
								}
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
									$scope.bonuses = [{
										fields: "",
										percentage: 0,
										remarks: ""
									}];
								}
							});
						}
					}
				});
			} else {
				console.log("Employee not found!");

				$scope.profile = {};

				$scope.profile.image = siteurl + "private/images/default.png";
				$scope.profile.active = false;
			}

		});
	}

	$scope.createRowFn = function () {
		var obj = {
			fields: "",
			percentage: 0,
			remarks: ""
		};
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

	$scope.deductions = [{
			fields: "Advanced Pay",
			amount: 0
		},
		{
			fields: "Professional Tax ",
			amount: 0
		},
		{
			fields: "Loan",
			amount: 0
		},
		{
			fields: "Provisional Fund",
			amount: 0
		}
	];

	$scope.getProfileFn = function () {
		var where = {
			table: "employee",
			cond: {
				"emp_id": $scope.eid
			}
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
					cond: {
						"eid": $scope.eid
					}
				};

				$http({
					method: "POST",
					url: url + "read",
					data: transmit
				}).success(function (response) {
					console.log(response);
					if (response[0].deduction === "yes") {
						var transmit = {
							table: "deduction_structure",
							cond: {
								eid: $scope.eid
							}
						};

						$http({
							method: "POST",
							url: url + "read",
							data: transmit
						}).success(function (response) {
							console.log(response);

							angular.forEach(response, function (row, index) {
								response[index].amount = parseFloat(response[index].amount);
							});

							$scope.deductions = response;
						});
					}
				});

			} else {
				// console.log("Employee not found!");
				$scope.profile = {};

				$scope.profile.image = siteurl + "private/images/default.png";
				$scope.profile.active = false;
			}

		});
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
		insentives: {
			extra: 0.00
		},
		deductions: {
			extra: 0.00
		},
		bonuses: {
			extra: 0.00
		}
	};

	$scope.getEmployeeInfoFn = function () {
		var where = {
			table: "employee",
			cond: {
				emp_id: $scope.eid
			}
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
					cond: {
						eid: $scope.eid
					}
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
								cond: {
									eid: $scope.eid
								}
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

								// console.log(response);
							});
						}

						// deduction
						if (response[0].deduction === "yes") {
							// active deduction
							$scope.profile.deduction = true;

							// get deduction
							var transmit = {
								table: "deduction_structure",
								cond: {
									eid: $scope.eid
								}
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

								// console.log(response);
							});
						}

						// deduction
						if (response[0].bonus === "yes") {
							// active deduction
							$scope.profile.bonus = true;

							// get deduction
							var transmit = {
								table: "bonus_structure",
								cond: {
									eid: $scope.eid
								}
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

								// console.log(response);
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

			// console.log(response);
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

		$http({
			method: "POST",
			url: siteurl + "salary/payment/read_salary",
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










// this controller controll the all test page functionalty
app.controller("TestReportCtrl", ['$scope', '$http', function ($scope, $http) {

	$scope.perPage = "10";
	$scope.reverse = false;
	$scope.alltestInfo = [];

	var obj = {
		table: 'diagnosis',
		column: 'patient_id'
	};

	$http({
		method: "POST",
		url: url + "read_GroupBy",
		data: obj
	}).success(function (response) {
		if (response.length > 0) {
			angular.forEach(response, function (values, index) {
				values['sl'] = index + 1;
				$scope.alltestInfo.push(values);
			});
		} else {
			$scope.alltestInfo = [];
		}
		console.log($scope.alltestInfo);
	});
}]);









// this controller controll the all test page functionalty
app.controller("AllTestReportCtrl", ['$scope', '$http', function ($scope, $http) {

	$scope.perPage = "10";
	$scope.reverse = false;
	$scope.alltestInfo = [];

	var obj = {
		table: 'diagnosis',
		column: 'patient_id',
		cond: {
			status: 'delivered'
		}
	};

	$http({
		method: "POST",
		url: url + "read_GroupBy",
		data: obj
	}).success(function (response) {
		if (response.length > 0) {
			angular.forEach(response, function (values, index) {
				values['sl'] = index + 1;
				$scope.alltestInfo.push(values);
			});
		} else {
			$scope.alltestInfo = [];
		}
		console.log($scope.alltestInfo);
	});
}]);









//patient Admission Ctrl
app.controller("NewAdmissionCtrl", ["$scope", "$http", function ($scope, $http) {
	$scope.WardOption = true;
	$scope.CabinPlan = $scope.WardPlan = true;
	$scope.seatPlan = [];
	$scope.amount = {
		total: 0,
		discount: 0,
		grandTotal: 0,
		paid: 0,
		due: 0
	};

	$scope.$watch("pid", function () {
		var getPatientInfoFn = function () {
			$scope.patientInfo = {};

			var where = {
				table: "patients",
				cond: {
					"pid": $scope.pid
				}
			};

			$http({
				method: "POST",
				url: url + "read",
				data: where
			}).success(function (response) {
				if (response.length == 1) {
					var guardian = angular.fromJson(response[0].guardian),
						guardianName = Object.values(guardian);

					var info = {
						date: response[0].date,
						name: response[0].name,
						age: response[0].age,
						contact: response[0].contact,
						guardian: guardianName[0]
					};

					$scope.patientInfo = info;
				}

				console.log(response);
			});
		};

		getPatientInfoFn();
	});

	$scope.changePlanFn = function () {
		if ($scope.plan == 'Cabin') {
			var transmit = {
				table: 'cabin',
				cond: {
					status: 'Available'
				}
			};

			getBedFn(transmit);

			$scope.WardOption = true;
			$scope.CabinPlan = false;
			$scope.WardPlan = true;
		} else {
			$scope.WardOption = false;
			$scope.CabinPlan = true;
		}
	}



	$scope.selectFn = function (index) {
		angular.forEach($scope.seatPlan, function (item) {
			item.selected = false;
		});

		$scope.seatPlan[index].selected = true;
	}

	$scope.grandTotalFn = function () {
		var total = 0.00;

		total = $scope.amount.total - $scope.amount.discount;
		$scope.amount.grandTotal = total;

		return $scope.amount.grandTotal;
	}

	$scope.getDueFn = function () {
		var total = 0.00;

		total = $scope.amount.grandTotal - $scope.amount.paid;
		$scope.amount.due = total;

		return $scope.amount.due;
	}





}]);













// allPatients Ctrl
app.controller("allPatientsCtrl", ['$scope', '$http', function ($scope, $http) {
	$scope.perPage = "10";
	$scope.reverse = false;
	$scope.allPatients = [];

	var transmit = {
		from: "registrations",
		join: {
			patients: {
				condition: "registrations.pid=patients.pid"
			}
		}
	};

	$http({
		method: "POST",
		url: url + "readJoinDataFromMultipleTable",
		data: transmit
	}).success(function (response) {
		if (response.length > 0) {
			angular.forEach(response, function (values, index) {
				values['sl'] = index + 1;
				$scope.allPatients.push(values);
			});
		} else {
			$scope.allPatients = [];
		}

		console.log(response);
	});
}]);

// All Due Patient Ctrl

app.controller("allDuePatientsCtrl", ['$scope', '$http', function ($scope, $http) {
	$scope.perPage = "10";
	$scope.reverse = false;
	$scope.allPatients = [];

	var transmit = {
		from: "bills",
		join: "patients",
		cond: "bills.pid = patients.pid",
		where: {
			"bills.due >": "0"
		}
	};

	$http({
		method: "POST",
		url: url + "readJoinData",
		data: transmit
	}).success(function (response) {
		if (response.length > 0) {
			angular.forEach(response, function (values, index) {
				values['sl'] = index + 1;
				$scope.allPatients.push(values);
			});
		} else {
			$scope.allPatients = [];
		}

		console.log(response);
	});
}]);




//patient emergency Ctrl
app.controller("emergencyPatientCtrl", ["$scope", "$http", function ($scope, $http) {

	$scope.amount = {
		total: 0.00,
		discount: 0.00,
		grandTotal: 0.00,
		paid: 0.00,
		due: 0.00
	};


	$scope.$watch("pid", function () {
		var getPatientInfoFn = function () {
			$scope.patientInfo = {};

			var where = {
				table: "patients",
				cond: {
					"pid": $scope.pid
				}
			};

			$http({
				method: "POST",
				url: url + "read",
				data: where
			}).success(function (response) {
				if (response.length == 1) {

					var info = {
						date: response[0].date,
						name: response[0].name,
						age: response[0].age,
						address: response[0].address,
						contact: response[0].contact
					};

					$scope.patientInfo = info;
				}

				console.log($scope.patientInfo);
			});
		};

		getPatientInfoFn();
	});

	$scope.grandTotalCalFn = function () {
		$scope.amount.grandTotal = ($scope.amount.total - $scope.amount.discount).toFixed(2);
		return $scope.amount.grandTotal;
	}

	$scope.dueCalFn = function () {
		var due = 0.0;
		due = ($scope.amount.grandTotal - $scope.amount.paid).toFixed(2);
		return due;
	}


}]);



// all Emergency Patients Ctrl
app.controller("allEmergencyPatientsCtrl", ['$scope', '$http', function ($scope, $http) {
	$scope.perPage = "10";
	$scope.reverse = false;
	$scope.allPatients = [];

	var transmit = {
		from: "registrations",
		join: {
			patients: {
				condition: "registrations.pid=patients.pid"
			}
		},
		where: {
			status: 'emergency'
		}

	};

	$http({
		method: "POST",
		url: url + "readJoinDataFromMultipleTable",
		data: transmit
	}).success(function (response) {
		if (response.length > 0) {
			angular.forEach(response, function (values, index) {
				values['sl'] = index + 1;
				$scope.allPatients.push(values);
			});
		} else {
			$scope.allPatients = [];
		}

		//console.log(response);
	});
}]);


//admission list controller
app.controller("admissionListCtrl", ['$scope', '$http', function ($scope, $http) {
	$scope.perPage = "10";
	$scope.reverse = false;
	$scope.allPatients = [];

	var transmit = {
		from: "registrations",
		join: "patients",
		cond: "registrations.pid = patients.pid",
		where: {
			status: "admitted"
		}
	};
	//console.log(transmit);

	$http({
		method: "POST",
		url: url + "readJoinData",
		data: transmit
	}).success(function (response) {
		if (response.length > 0) {
			angular.forEach(response, function (values, index) {
				values['sl'] = index + 1;
				$scope.allPatients.push(values);
			});
		} else {
			$scope.allPatients = [];
		}

		//console.log(response);
	});
}]);

//Consultancy list controller
app.controller("consultancyListCtrl", ['$scope', '$http', function ($scope, $http) {

	$scope.perPage = "10";
	$scope.reverse = false;
	$scope.allPatients = [];

	var where = {
		tableFrom: 'consultancies',
		tableTo: ['bills', 'patients', 'doctors', 'marketer'],
		joinCond: ['consultancies.pid=bills.pid', 'consultancies.pid=patients.pid', 'consultancies.doctor=doctors.id', 'consultancies.reference_name=marketer.id'],
		cond: {
			'bills.title': 'consultancy'
		},
		select: ['bills.date', 'bills.pid', 'bills.grand_total', 'bills.paid', 'bills.due', 'bills.title', 'patients.name', 'patients.contact', 'doctors.fullName as dotcor_name', 'marketer.name as refer_name'],
		groupBy: 'consultancies.bill',
	}
	$http({
		method: "POST",
		url: url + "join",
		data: where
	}).success(function (response) {
		if (response.length > 0) {
			$scope.allPatients = response;
		} else {
			$scope.allPatients = [];
		}
	});

}]);


app.controller('PatientBasicCtrl', ['$scope', '$http', function ($scope, $http) {

	$scope.getPersonDetailsFn = function (table) {
		var where = {
			table: table,
			cond: {
				id: $scope.person[table].id
			}
		};

		$http({
			method: 'POST',
			url: url + 'read',
			data: where
		}).success(function (response) {
			if (response.length > 0) {

				if (table == 'marketer') {
					$scope.person[table].name = response[0].name;
				} else {
					$scope.person[table].name = response[0].fullName;
				}

				$scope.person[table].commission = parseFloat(response[0].commission);
				$scope.person[table].id = response[0].id;
			}
		});
	}

}]);



// sale controller
app.controller('SaleEntryCtrl', function ($scope, $http) {
	// create an empty object
	$scope.cart = [];

	// initialize all kind of amount
	$scope.amount = {
		total: 0.00,
		totalDiscount: 0.00,
		grandTotal: 0.00,
		paid: 0.00,
		due: 0.00
	};

	// code list
	var codeList = [];

	$scope.getProductFn = function () {
		var position = codeList.indexOf($scope.code);

		if (position < 0) {
			// get the data from stock table
			var condition = {
				table: 'stock',
				cond: {
					code: $scope.code,
					'quantity >': 0
				}
			};

			// set the old one and add a new one
			$http({
				method: 'POST',
				url: url + 'read',
				data: condition
			}).success(function (response) {
				if (response.length > 0) {
					var newItem = {
						productname: response[0].name,
						code: response[0].code,
						price: parseFloat(response[0].sell_price),
						maxQuantity: parseInt(response[0].quantity),
						quantity: 1,
						discount: 0.00,
						subtotal: 0.00
					};

					$scope.cart.push(newItem);
					codeList.push(newItem.productname);
				}
			});
		}

		console.log($scope.cart);
		$scope.code = "";
	}

	// calculate the subtotal
	$scope.setSubtotalFn = function (index) {
		var total = 0.00;

		if ($scope.cart[index].selectedProduct !== '') {
			total = $scope.cart[index].price * $scope.cart[index].quantity;
			$scope.cart[index].subtotal = total;
		}

		return total;
	}

	// delete the current item from cart object
	$scope.deleteItemFn = function (index) {
		$scope.cart.splice(index, 1);
	}

	// calculate the total price in all the object in cart
	$scope.getTotalFn = function () {
		var total = 0.00;

		angular.forEach($scope.cart, function (item) {
			total += item.subtotal;
		});

		$scope.amount.total = total;

		return $scope.amount.total;
	}

	// calculate the Grand Total
	$scope.getGrandTotalFn = function () {
		var total = 0.00;

		total = $scope.amount.total - $scope.amount.totalDiscount;
		$scope.amount.grandTotal = total;

		return $scope.amount.grandTotal;
	}

	// calculate total due
	$scope.getTotalDueFn = function () {
		var total = 0.00;

		total = $scope.amount.grandTotal - $scope.amount.paid;
		$scope.amount.due = total;

		return $scope.amount.due;
	}

});



// add prescription ctrl
app.controller("addPrescriptionCtrl", ["$scope", "$http", function ($scope, $http) {
	$scope.allMedicine = [{
		name: "",
		note: ""
	}];

	$scope.allTest = [{
		name: "",
		note: ""
	}];

	var addNewItem = function (key) {
		var item = (key == 'medicine') ? {
			name: "",
			note: ""
		} : {
			name: "",
			note: ""
		};

		if (key == 'medicine') {
			$scope.allMedicine.push(item);
		} else {
			$scope.allTest.push(item);
		}
	}
	$scope.addRowMedicineByTabFn = function (e, key) {
		if (e.keyCode === 9) {
			addNewItem(key);
		}
	};

	$scope.addRowMedicineByClickFn = function (key) {
		addNewItem(key);
	};

	$scope.removeRowMedicineFn = function (i) {
		$scope.allMedicine.splice(i, 1);
	};

	$scope.removeRowTestFn = function (i) {
		$scope.allTest.splice(i, 1);
	};
}]);


// edit prescription ctrl
app.controller("editPrescriptionCtrl", ["$scope", "$http", function ($scope, $http) {
	$scope.allMedicine = [];

	$scope.$watch('id', function (pid) {

		var where = {
			table: 'prescription',
			cond: {
				'id': pid
			}
		};

		$http({
			method: 'POST',
			url: url + 'read',
			data: where
		}).success(function (response) {
			if (response.length > 0) {
				response[0].medicine = angular.fromJson(response[0].medicine);
				response[0].test = angular.fromJson(response[0].test);

				response[0].medicineLen = 0;
				response[0].testLen = 0;

				$scope.allMedicine = response[0];
			}

		});

		var addRow = function (k) {
			// console.log(k);

			var item = (k == 'medicine') ? {
				medicine: "",
				note: ""
			} : {
				test: "",
				note: ""
			};

			$scope.allMedicine[k].push(item);
			$scope.allMedicine[k + 'Len'] = 0;
		};


		$scope.removeRow = function (i, k) {
			if ($scope.allMedicine[k].length > 1) {
				$scope.allMedicine[k].splice(i, 1);
			} else {
				$scope.allMedicine[k + 'Len'] = 1;
			}
		};

		// new tab function
		$scope.addRowMedicineByTabFn = function (e, k) {
			if (e.keyCode === 9) {
				addRow(k);
			}
		};

		$scope.addRowMedicineByClickFn = function (k) {
			addRow(k);
		};

		//end here
	});
}]);

// payment commission
app.controller('marketerCommisionCollect', function($scope, $http){
    
    $scope.totalCommission = 0;
    $scope.payment = 0;
    
    $scope.getCommissionFn = function(ref_id){
        
        if(typeof ref_id !== 'undefined' && ref_id != ''){
            
            $http({
                method: 'post',
                url   : url + 'commission',
                data  : {ref_id: ref_id}
            }).success(function(info){
                $scope.totalCommission = parseFloat(info.balance);
            })
        }
    }
     
});




// opening balance ctroller
app.controller('OpeningBalanceCtrl', function ($scope, $http) {
	$scope.record = [];

	// read from database table
	var where = {
		table: 'opening_balance',
	};

	$http({
		method: 'POST',
		url: url + 'read_limit',
		data: where
	}).success(function (response) {
		if (response.length > 0) {
			$scope.record = response;
		} else {
			$scope.record = [];
		}
	});

});

//doctorPaymentCTRL
app.controller('doctorPaymentCTRL', function ($scope, $http) {

	$scope.doctorPayment = [];
	$scope.previusePaidAmount = [];
    $scope.payment = 0;
    $scope.less = 0;
	$scope.getDoctorBalaceFn = function(){
	    
	    var where = {
    		tableFrom: 'consultancies',
    		tableTo: ['bills'],
    		joinCond: ['consultancies.pid=bills.pid'],
    		cond: {
    			'bills.title': 'consultancy',
    			'consultancies.doctor': $scope.person_id
    		},
    		select: ['bills.grand_total']
    	}
    	
    	$http({
    		method: "POST",
    		url: url + "join",
    		data: where
    	}).success(function (response) {
    		if (response.length > 0) {
    			$scope.doctorPayment = response;
    		} else {
    			$scope.doctorPayment = [];
    		}
    	});
    	
    	
    	
    	var previousPaid = {
    		table: 'doctor_payment',
    		cond: {
    			'doctor_id': $scope.person_id
    		},
    		select: ['payment', 'less']
    	}
    	
    	$http({
    		method: "POST",
    		url: url + "result",
    		data: previousPaid
    	}).success(function (previusePaidAmount) {

    		if (previusePaidAmount.length > 0) {
    		     $scope.previusePaidAmount = previusePaidAmount;
    		} else {
    			$scope.previusePaidAmount = [];
    		}
    	});
    	
    	
	}
	
	
	$scope.totalBalanceFn = function() {
	   var total = 0;
	   angular.forEach($scope.doctorPayment, function (item) {
			total += parseFloat(item.grand_total);
	    });
	    
	  return total.toFixed(2);
	}
	
	
	$scope.totalPaidFn = function() {
	   var total = 0;
	   var less = 0;
	   var totalAmount = 0;
	   
	   angular.forEach($scope.previusePaidAmount, function (itemPaid) {
			total += parseFloat(itemPaid.payment);
			less += parseFloat(itemPaid.less);
	    });
	   
	    totalAmount = parseFloat(total) + parseFloat(less);
	   
	  return totalAmount.toFixed(2);
	}
	
	$scope.totalDueFn = function(){
	    var total = 0;
	        total = $scope.totalBalanceFn() - $scope.totalPaidFn() - $scope.payment - $scope.less;
	    return total.toFixed(2);
	}
	

});


app.controller("addBillCtrl", ["$scope", "$http", function($scope, $http){
	$scope.cart = [];
	$scope.productList = [];
	$scope.total = 0;
	
	
	$scope.addNewItemFn = function(id){
		if(id){
			var condition = {
				table: 'items',
				cond: {
					id : id,
				}
			};
			
			$http({
				method: 'POST',
				url: url + 'read',
				data: condition
			}).success(function(response){
			    
				if (response.length > 0) {
					var newItem = {
						id        : response[0].id,
						name      : response[0].name,
						price     : +response[0].price,
						total     : +response[0].price,
						quantity  : 1,
					};
                    $scope.total = +$scope.total + +response[0].price;
					$scope.cart.push(newItem);
				}
			});
		}
	}
    
    $scope.editPriceFn = function(){
        $scope.total = 0;
        angular.forEach($scope.cart, function(val, key){
            $scope.total += (val.price * val.quantity);
            $scope.cart[key].total = (val.price * val.quantity);
        });
    }

    $scope.qtyUpdateFn = function(index){
        $scope.total = 0;
        angular.forEach($scope.cart, function(val, key){
            $scope.total += val.price * val.quantity;
            $scope.cart[key].total = (val.price * val.quantity);
        });
    }

    $scope.editTotalFn = function(index){
        $scope.total = 0;
        angular.forEach($scope.cart, function(val, key){
            $scope.total += +$scope.cart[key].total;
        });
    }

	$scope.deleteItemFn = function(index){
		$scope.cart.splice(index, 1);
		$scope.total = 0;
		
		angular.forEach($scope.cart, function(val){
            $scope.total += val.price * val.quantity;
        });
	}
}]);

app.controller("editBillCtrl", ["$scope", "$http", function($scope, $http){
	$scope.cart        = [];
	$scope.productList = [];
	$scope.total       = 0;
	$scope.voucher     = null;
	$scope.date        = '';
	$scope.bill_by     = '';
	$scope.patient_id  = '';
	
	$scope.$watch('voucher', function(){
    	if($scope.voucher){
        	$http({
        	    method  : 'POST',
    			url     : url + 'read',
    			data    : {
    			    table: 'cost_bill',
        			cond: {
        				voucher : $scope.voucher,
        			}
    			}
        	}).success(function(response){
        	    if(response.length > 0){
        	        $scope.date        = response[0].date;
        	        $scope.bill_by     = response[0].bill_by;
        	        $scope.patient_id  = response[0].patient_id;
        	    }
        	});
        	
        	
        	$http({
        	    method  : 'POST',
    			url     : url + 'join',
    			data    : {
    			    tableFrom: 'items',
    			    tableTo  : 'cost_bill_items',
    			    joinCond : 'cost_bill_items.item_id=items.id',
        			cond: {
        				'cost_bill_items.voucher' : $scope.voucher,
        			}
    			}
        	}).success(function(response){
        	    if(response.length > 0){
        	        $scope.total = 0;
        	        angular.forEach(response, function(row){
        				var newItem = {
        					id        : row.item_id,
        					name      : row.name,
        					price     : +row.price,
        					total     : +row.total,
        					quantity  : +row.quantity,
        				};
                        $scope.total = +$scope.total + +row.total;
        				$scope.cart.push(newItem);
        	        });
        	    }
        	});
        }
	    
	});
	
	
	$scope.addNewItemFn = function(id){
		var condition = {
			table: 'items',
			cond: {
				id : id,
			}
		};
		
		$http({
			method: 'POST',
			url: url + 'read',
			data: condition
		}).success(function(response){
			if (response.length > 0) {
				var newItem = {
					id        : response[0].id,
					name      : response[0].name,
					price     : +response[0].price,
					total     : +response[0].price,
					quantity  : 1,
				};
                $scope.total = +$scope.total + +response[0].price;
				$scope.cart.push(newItem);
			}
		});
	}

    $scope.qtyUpdateFn = function(index){
        $scope.total = 0;
        angular.forEach($scope.cart, function(val, key){
            $scope.total += val.price * val.quantity;
            $scope.cart[key].total = (val.price * val.quantity);
        });
    }
    
    $scope.editTotalFn = function(index){
        $scope.total = 0;
        angular.forEach($scope.cart, function(val, key){
            $scope.total += +$scope.cart[key].total;
        });
    }
    
    $scope.editPriceFn = function(){
        $scope.total = 0;
        angular.forEach($scope.cart, function(val, key){
            $scope.total += (val.price * val.quantity);
            $scope.cart[key].total = (val.price * val.quantity);
        });
    }
    
	$scope.deleteItemFn = function(index){
		$scope.cart.splice(index, 1);
		$scope.total = 0;
		
		angular.forEach($scope.cart, function(val){
            $scope.total += val.price * val.quantity;
        });
	}
}]);

