// Edit Purchase Entry
app.controller('EditPurchaseEntry', function($scope, $http) {
	$scope.partyInfo = {
		partyCode: '',
		previousBalance: 0.00,
		currentBalance: 0.00,
		sign: 'Receivable',
		csign: 'Payable'
	};

	$scope.godown_code = '';

	$scope.amount = {
		total_discount: 0,
		transport_cost: 0,
		previous_paid: 0,
		paid: 0
	};

	$scope.$watch('vno', function(voucherNo) {

		$scope.records = [];

		// get purchase record
		var transmit = {
			tableFrom: 'saprecords',
			tableTo: 'sapitems',
			joinCond: 'saprecords.voucher_no=sapitems.voucher_no AND saprecords.godown_code=sapitems.godown_code',
			cond: {'saprecords.voucher_no': voucherNo}
		};

		$http({
			method: 'POST',
			url: url + 'join',
			data: transmit
		}).success(function(response){

			//console.log(response);

			if(response.length > 0) {

				angular.forEach(response, function(row, index){

					var where = {
						table : "products",
						cond : { product_code : row.product_code}
					};

					$http({
						method : "POST",
						url    : url + "read",
						data   : where
					}).success(function(result){
						response[index].product_cat = result[0].product_cat;
						response[index].product_name = result[0].product_name;
						response[index].subcategory = result[0].subcategory;
					});

					response[index].purchase_commission = parseFloat(row.purchase_commission);
					response[index].paid = parseFloat(row.paid);
					response[index].old_quantity = parseFloat(row.quantity);
					response[index].price = parseFloat(row.purchase_price) + parseFloat(row.discount);
					response[index].discount = parseFloat(row.discount);
					response[index].mon = parseFloat(row.mon);
					response[index].oldMon = parseFloat(row.mon);
					response[index].purchase_price = 0;
					response[index].quantity = parseFloat(row.quantity);
					response[index].sale_price = parseFloat(row.sale_price);
					response[index].godown = row.godown_code;
					response[index].old_subtotal = 0;
					response[index].subtotal = 0;
				});


				// get party balance info
				$http({
					method : 'POST',
					url    : url + 'supplier_balance',
					data   : {party_code: response[0].party_code}
				}).success(function(balanceInfo){

					var balance = 0;
					if (parseFloat(balanceInfo.balance) < 0){
						balance = parseFloat(response[0].total_bill) - (Math.abs(parseFloat(balanceInfo.balance)) + parseFloat(response[0].paid));
					}else{
						balance = (parseFloat(response[0].total_bill) + parseFloat(balanceInfo.balance)) - parseFloat(response[0].paid);
					}

					$scope.partyInfo.previousBalance = Math.abs(parseFloat(balance).toFixed(2));
					$scope.partyInfo.sign = (parseFloat(balance) < 0 ? 'Payable' : 'Receivable');
				});


				$scope.godown_code = response[0].godown_code;
				
				$scope.amount.previous_paid  = parseFloat(response[0].paid);
				$scope.amount.total_discount = parseFloat(response[0].total_discount);
				$scope.amount.transport_cost = parseFloat(response[0].transport_cost);

				$scope.records = response;
			}
		});
	});


	// add new product
	$scope.addNewProductFn = function(product_code){

		var where = {
			table: 'products',
			cond: {
				product_code: product_code,
				status: "available"
			}
		};

		$http({
			method: 'POST',
			url: url + 'result',
			data: where
		}).success(function(response) {

			if (response.length > 0) {

				var item = {
					id: '',
					product_name: response[0].product_name,
					product_cat: response[0].product_cat,
					subcategory: response[0].subcategory,
					purchase_commission: 0,
					product_code: response[0].product_code,
					product_model: response[0].product_model,
					unit: response[0].unit,
					sale_price: parseFloat(response[0].sale_price),
					price: parseFloat(response[0].purchase_price),
					godown: $scope.godown_code,
					purchase_price: 0,
					discount: 0,
					old_quantity: 0,
					quantity: 1,
					mon:0,
					oldMon:0,
					old_subtotal: 0,
					subtotal: 0,
				};
				$scope.records.push(item);
			}
		});
	};

	// set purchase price
	$scope.setPurchasePriceFn = function(index) {
		var price_price = 0;
		price_price = ($scope.records[index].price - $scope.records[index].discount);
		$scope.records[index].purchase_price = price_price.toFixed(2);
		return $scope.records[index].purchase_price;
	};

	// get old subtotal
	$scope.getOldSubtotalFn = function(index){

		var old_subtotal = 0;

		old_subtotal = $scope.records[index].purchase_price * $scope.records[index].old_quantity;

		$scope.records[index].old_subtotal = old_subtotal.toFixed(2);

		return $scope.records[index].old_subtotal;
	};
    
    
    $scope.setSubtotaMonlFn = function(index) {
        $scope.records[index].mon = ($scope.records[index].quantity / 40);
        return $scope.records[index].mon.toFixed(2);
    };
    
    $scope.getTotalMonFn = function() {
        var total = 0;
        angular.forEach($scope.records, function(item) {
            total += parseFloat(item.mon);
        });
        return total.toFixed(2);
    };
    
    
	// get new subtotal
	$scope.getSubtotalFn = function(index){

		var subtotal = 0;

		subtotal = $scope.records[index].purchase_price * $scope.records[index].mon;

		$scope.records[index].subtotal = subtotal.toFixed(2);

		return $scope.records[index].subtotal;
	};

	// get total amount
	$scope.getTotalFn = function(){

		var total = 0;
		angular.forEach($scope.records, function(item) {
			total += parseFloat(item.subtotal);
		});

		return Math.abs(parseFloat(total).toFixed(2));
	};


	$scope.getGrandTotalFn = function() {
		var grand_total = 0;
		grand_total = (parseFloat($scope.getTotalFn()) + parseFloat($scope.amount.transport_cost)) - parseFloat($scope.amount.total_discount);

		return Math.abs(parseFloat(grand_total).toFixed(2));
	};

	$scope.getTotalPaidFn = function(){
		var total = 0;
		total = $scope.amount.previous_paid + parseFloat($scope.amount.paid);

		return Math.abs(parseFloat(total).toFixed(2));
	};

	$scope.getCurrentTotalFn = function() {
		var total = 0;

		if($scope.partyInfo.sign == 'Payable'){
			total = $scope.getTotalPaidFn() - ($scope.getGrandTotalFn() + parseFloat($scope.partyInfo.previousBalance));
		}else{
			total = ($scope.getTotalPaidFn() + parseFloat($scope.partyInfo.previousBalance)) - $scope.getGrandTotalFn();
		}

		$scope.partyInfo.csign = (parseFloat(total) < 0 ? 'Payable' : 'Receivable');

		return Math.abs(total.toFixed(2));
	};

	// delete items
	$scope.deleteItemFn = function(index) {

		if ($scope.records[index].id !== ''){

			var stockWhere = {
				table: 'stock',
				cond: {
					code: $scope.records[index].product_code,
					godown_code: $scope.records[index].godown
				},
				select: ['quantity', 'mon']
			};

			// get stock data
			$http({
				method : 'POST',
				url    : url + 'result',
				data   : stockWhere
			}).success(function(stockInfo){

				if (stockInfo.length > 0){

					// calculate quantity
					var quantity = parseFloat(stockInfo[0].quantity) - parseFloat($scope.records[index].old_quantity);
					var mon      = parseFloat(stockInfo[0].mon) - parseFloat($scope.records[index].oldMon);

					// update stock
					$http({
						method : 'POST',
						url    : url + 'save',
						data   : {
							table: 'stock',
							cond: {
								code: $scope.records[index].product_code,
								godown_code: $scope.records[index].godown
							},
							data: { quantity: quantity, mon: mon }
						}
					}).success(function(updateStock){
						if (updateStock == 'success'){

							// delete sapitems
							$http({
								method : 'POST',
								url    : url + 'delete',
								data   : {
									table: 'sapitems',
									cond: { id: $scope.records[index].id }
								}
							}).success(function(deleteSapitems){
								if (deleteSapitems == 'danger'){
									$scope.records.splice(index, 1);
								}
							});
						}
					});

				}
			});
		}else{
			$scope.records.splice(index, 1);
		}
	};
});

