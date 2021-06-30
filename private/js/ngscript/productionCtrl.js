app.controller("productionCtrl", function($scope, $http) {

    $scope.rawProductList = [];
    $scope.finishProductList = [];

    $scope.$watch('godown_code', function (godown_code){

        if (typeof godown_code !== 'undefined'){

            // get all raw product
            $http({
                method: 'post',
                url   : url + 'result',
                data  : {
                    table : 'stock',
                    cond  : {godown_code: godown_code, type: 'raw_material'},
                    select: ['code', 'name', 'quantity']
                }
            }).success(function (stockInfo){

                $scope.rawProductList = [];
                $scope.rowCart = [];

                if (stockInfo.length > 0){
                    $scope.rawProductList = stockInfo;
                }
            });


            // get all finish product
            $http({
                method: 'post',
                url   : url + 'result',
                data  : {
                    table : 'products',
                    cond  : {type: 'finish_product', status: 'available', trash: '0'},
                    select: ['product_code', 'product_name']
                }
            }).success(function (productInfo){

                $scope.finishProductList = [];

                if (productInfo.length > 0){
                    $scope.finishProductList = productInfo;
                }
            });
        }
    });


    $scope.rowCart = [];
    $scope.addNewRowProductFn = function (row_product_code){

            if (typeof row_product_code !== 'undefined'){

                $http({
                    method: 'post',
                    url   : url + 'result',
                    data  : {
                        table : 'stock',
                        cond  : {godown_code: $scope.godown_code, code: row_product_code, type: 'raw_material'}
                    }
                }).success(function (rowProduct){

                    if (rowProduct.length > 0){

                        var item = {
                            product_code : rowProduct[0].code,
                            product_name : rowProduct[0].name,
                            unit : rowProduct[0].unit,
                            stock_quantity : parseFloat(rowProduct[0].quantity),
                            purchase_price : parseFloat(rowProduct[0].purchase_price),
                            sale_price : parseFloat(rowProduct[0].sell_price),
                            stock_bag : parseFloat(rowProduct[0].bag),
                            bag : '',
                            quantity : '',
                        };

                        $scope.rowCart.push(item);
                    }
                });
            }
    };


    $scope.finishCart = [];
    $scope.addNewFinishProductFn = function (finish_product_code){

        if (typeof finish_product_code !== 'undefined'){

            $http({
                method: 'post',
                url   : url + 'result',
                data  : {
                    table : 'products',
                    cond  : {product_code: finish_product_code, status: 'available', type: 'finish_product', trash: '0'}
                }
            }).success(function (finishProduct){

                if (finishProduct.length > 0){

                    var item = {
                        product_code : finishProduct[0].product_code,
                        product_name : finishProduct[0].product_name,
                        unit : finishProduct[0].unit,
                        purchase_price : parseFloat(finishProduct[0].purchase_price),
                        sale_price : parseFloat(finishProduct[0].sale_price),
                        bag : '',
                        quantity : '',
                    };

                    $scope.finishCart.push(item);
                }
            });
        }
    };



    // remove row items
    $scope.removeRowItem = function (index){
        $scope.rowCart.splice(index, 1);
    };

    // remove finish item
    $scope.removeFinishItem = function (index){
        $scope.finishCart.splice(index, 1);
    };
});