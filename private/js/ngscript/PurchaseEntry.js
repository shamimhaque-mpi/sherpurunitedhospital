// add purchase entry
app.controller('PurchaseEntry', function($scope, $http) {
    $scope.supplierList = [];
    $scope.active = true;
    $scope.cart = [];

    $scope.amount = {
        total           : 0,
        totalDiscount   : 0,
        transport_cost  : 0,
        grandTotal      : 0,
        paid            : 0,
        due             : 0
    };

    $scope.validation = false;



    $scope.$watch('godown_code', function (godown_code) {
        
        if (typeof $scope.godown_code != 'undefined') {

            //Get Supplier List Showroom Wise
            $scope.supplierList = [];
            var supplierWhere = {
                table: 'parties',
                cond: {
                    'godown_code': godown_code,
                    'status': 'active',
                    'type': 'supplier',
                    'trash': 0
                },
                select: ['code', 'name', 'godown_code', 'mobile', 'address']
            };

            $http({
                method: 'POST',
                url: url + 'result',
                data: supplierWhere
            }).success(function (supplier) {
                if (supplier.length > 0) {
                    $scope.supplierList = supplier;
                } else {
                    $scope.supplierList = [];
                }
            });
        }
    });

    $scope.exists = function() {
        var where = {
            table: "saprecords",
            cond: {
                voucher_no: $scope.voucherNo,
                trash: '0'
            }
        };

        $http({
            method: "POST",
            url: url + "read",
            data: where
        }).success(function(response) {
            if (response.length > 0) {
                $scope.validation = true;
            } else {
                $scope.validation = false;
            }
        });
    };

    $scope.partyInfo = {
        balance: 0,
        payment: 0,
        sign: 'Receivable',
        csign: 'Receivable'
    };

    $scope.partyInfo = {
        balance: 0,
        payment: 0,
        sign: 'Receivable',
        csign: 'Receivable'
    };

    $scope.productList = [];

    // get all product list
    $scope.getAllProductFn = function (product_type){

        if (typeof product_type !== 'undefined'){

            $http({
                method : 'post',
                url    : url + 'result',
                data   : {
                    table : 'products',
                    cond  : {type: product_type, status: 'available', trash: '0'},
                    select: ['product_code', 'product_model', 'product_name']
                }
            }).success(function (response){

                $scope.productList = [];

                if (response.length > 0){
                    $scope.productList = response;
                }
            });
        }
    };

    // Get Party Info then Create New Methode setPartyfn()
    $scope.setPartyfn = function() {
        
        if (typeof $scope.partyCode != 'undefined') {
            var condition = {
                table: "parties",
                cond: {
                    code: $scope.partyCode
                },
                select: ['code', 'name', 'mobile', 'address', 'initial_balance']
            };

            $http({
                method: 'POST',
                url: url + 'result',
                data: condition
            }).success(function(partyResponse) {
                
                if (partyResponse.length > 0) {

                    // get all current balance and status
                    var condition = {
                        table: "partytransaction",
                        cond: {
                            party_code: partyResponse[0].code,
                            trash: 0
                        },
                        select: ['credit', 'debit']
                    };

                    $http({
                        method: "POST",
                        url: url + "result",
                        data: condition
                    }).success(function(tranResponse) {

                        var transaction = {
                            debit: 0,
                            credit: 0,
                            currentBalance: 0,
                        };

                        if (tranResponse.length > 0) {

                            angular.forEach(tranResponse, function(row, i) {
                                transaction.debit += parseFloat(row.debit);
                                transaction.credit += parseFloat(row.credit);
                            });

                            if (parseFloat(partyResponse[0].initial_balance) < 0) {
                                transaction.currentBalance = parseFloat(transaction.debit) - (parseFloat(transaction.credit) + Math.abs(parseFloat(partyResponse[0].initial_balance)));
                                $scope.partyInfo.balance = Math.abs(transaction.currentBalance.toFixed(2));
                            } else {
                                transaction.currentBalance = (parseFloat(partyResponse[0].initial_balance) + parseFloat(transaction.debit)) - parseFloat(transaction.credit);
                                $scope.partyInfo.balance = Math.abs(transaction.currentBalance.toFixed(2));
                            }

                            $scope.partyInfo.sign = (parseFloat(transaction.currentBalance) < 0) ? 'Payable' : 'Receivable';

                        } else {
                            $scope.partyInfo.balance = Math.abs(parseFloat(partyResponse[0].initial_balance).toFixed(2));
                            $scope.partyInfo.sign = (parseFloat(partyResponse[0].initial_balance) < 0) ? 'Payable' : 'Receivable';
                        }

                    });
                }
            });
        }
    };


    $scope.getCurrentTotalFn = function() {
        var total = 0;

        if ($scope.partyInfo.sign == 'Receivable') {
            total = ($scope.partyInfo.balance + $scope.amount.paid) - parseFloat($scope.amount.grandTotal);

            if (total >= 0) {
                $scope.partyInfo.csign = "Receivable";
            } else {
                $scope.partyInfo.csign = "Payable";
            }
        } else {
            total = ($scope.partyInfo.balance + parseFloat($scope.amount.grandTotal)) - $scope.amount.paid;

            if (total > 0) {
                $scope.partyInfo.csign = "Payable";
            } else {
                $scope.partyInfo.csign = "Receivable";
            }
        }

        return Math.abs(total.toFixed(2));
    };

    $scope.addNewProductFn = function(product_code) {

        if (typeof product_code !== 'undefined' && product_code != '') {
            $scope.active = false;

            var condition = {
                table: 'products',
                cond: {
                    product_code: product_code,
                    status: "available"
                }
            };

            $http({
                method: 'POST',
                url: url + 'result',
                data: condition
            }).success(function(response) {
                if (response.length > 0) {
                    var item = {
                        product: response[0].product_name,
                        product_serial: '',
                        product_code: response[0].product_code,
                        product_model: response[0].product_model,
                        product_cat: response[0].product_cat,
                        product_subcat: response[0].subcategory,
                        unit: response[0].unit,
                        type: response[0].type,
                        price: parseFloat(response[0].purchase_price),
                        sale_price: parseFloat(response[0].sale_price),
                        purchase_price: 0,
                        quantity: 1,
                        mon: 0,
                        bag: 0,
                        commission: 0,
                        discount: 0,
                        subtotal: 0,
                    };
                    $scope.cart.push(item);
                } else {
                    $scope.cart = [];
                }
            });
        }
    };


    // calculate purchase price
    $scope.setPurchasePrice = function(index) {
        var total = 0;
        //console.log($scope.cart[index].purchase_price);
        total = $scope.cart[index].price - parseFloat($scope.cart[index].discount);
        //console.log(total);
        $scope.cart[index].purchase_price = total.toFixed(2);
        return total.toFixed(2);
    };

    $scope.setSubtotaMonlFn = function(index) {
        var total = 0;
        total = ($scope.cart[index].quantity / 40);
        $scope.cart[index].mon = total.toFixed(2);
        return $scope.cart[index].mon;
    };
    
    $scope.setSubtotalFn = function(index) {
        var total = 0;
        total = $scope.cart[index].purchase_price * $scope.setSubtotaMonlFn(index);
        $scope.cart[index].subtotal = total.toFixed(2);
        return $scope.cart[index].subtotal;
    };
    
    
    $scope.getTotalQtyFn = function() {
        var total = 0;
        angular.forEach($scope.cart, function(item) {
            total += parseFloat(item.quantity);
        });
        return total;
    };

    $scope.getTotalMonFn = function() {
        var total = 0;
        angular.forEach($scope.cart, function(item) {
            total += parseFloat(item.mon);
        });
        return total.toFixed(2);
    };

    $scope.getTotalBagFn = function() {
        var total = 0;
        angular.forEach($scope.cart, function(item) {
            total += parseFloat(item.bag);
        });
        return total.toFixed(2);
    };

    $scope.getTotalFn = function() {
        var total = 0;
        angular.forEach($scope.cart, function(item) {
            total += parseFloat(item.subtotal);
        });

        $scope.amount.total = total.toFixed(2);
        return $scope.amount.total;
    };
    


    /*
    $scope.getTotalDiscountFn = function() {
    	var total = 0;
    	angular.forEach($scope.cart, function(item){
    		total += parseFloat(item.discount);
    	});

    	$scope.amount.totalDiscount = total.toFixed(2);
    	return $scope.amount.totalDiscount;
    }*/

    $scope.getGrandTotalFn = function() {
        $scope.amount.grandTotal = parseFloat($scope.amount.total - $scope.amount.totalDiscount + $scope.amount.transport_cost);
        return $scope.amount.grandTotal.toFixed(2);
    };

    $scope.getTotalDueFn = function() {
        $scope.amount.due = $scope.amount.grandTotal - $scope.amount.paid;
        return $scope.amount.due.toFixed(2);
    };

    $scope.deleteItemFn = function(index) {
        $scope.cart.splice(index, 1);
    };
});