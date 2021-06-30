app.controller("editClientCtrl", function($scope, $http) {
    
    $scope.previous_client = 'no';
    $scope.previous_client2 = 'no';
    
    $scope.allZone = [];
    
    $scope.removeGuarantorOneData = function(){
        $scope.previous_guarantor_one = '';
        $scope.guarantor_mobile       = '';
        $scope.guarantor_address      = '';
    }
    
    
    // godown wise zone
    $scope.$watch('godown_code', function(godown_code){
        
        if(typeof godown_code !== 'undefined'){
            
            $http({
                method : 'POST',
                url    : url + 'result',
                data   : {
                    table: 'zone',
                    cond : {godown_code: godown_code}
                }
            }).success(function(zoneInfo){
                
                $scope.allZone = [];
                
                if(zoneInfo.length > 0){
                    $scope.allZone = zoneInfo;
                }
            });
        }
    });
   
    // get party info
    $scope.getGuarantorInfoOne = function(){
        
        if(typeof $scope.guarantor_one !== 'undefined'){
            
            var partyWhere = {
                table  : 'parties',
                cond   : {
                    'code'  : $scope.guarantor_one,
                    'trash' : 0
                },
                select : ['code', 'name', 'mobile', 'address']
            }
            
            $http({
                method : 'POST',
                url    : url + 'result',
                data   : partyWhere
            }).success(function(partyResponse) {
                if (partyResponse.length > 0) {
                    $scope.previous_guarantor_one = partyResponse[0].name;
                    $scope.guarantor_mobile       = partyResponse[0].mobile;
                    $scope.guarantor_address      = partyResponse[0].address;
                }else{
                    $scope.previous_guarantor_one = '';
                    $scope.guarantor_mobile       = '';
                    $scope.guarantor_address      = '';
                }
            });
        }
    }
    
    
    $scope.removeGuarantorTwoData = function(){
        $scope.previous_guarantor_two = '';
        $scope.guarantor_mobile2      = '';
        $scope.guarantor_address2     = '';
    }
    
    // get party info
    $scope.getGuarantorInfoTwo = function(){
        
        if(typeof $scope.guarantor_two !== 'undefined'){
            
            var partyWhere = {
                table  : 'parties',
                cond   : {
                    'code'  : $scope.guarantor_two,
                    'trash' : 0
                },
                select : ['code', 'name', 'mobile', 'address']
            }
            
            $http({
                method : 'POST',
                url    : url + 'result',
                data   : partyWhere
            }).success(function(partyResponse) {
                if (partyResponse.length > 0) {
                    $scope.previous_guarantor_two = partyResponse[0].name;
                    $scope.guarantor_mobile2      = partyResponse[0].mobile;
                    $scope.guarantor_address2     = partyResponse[0].address;
                }else{
                    $scope.previous_guarantor_two = '';
                    $scope.guarantor_mobile2      = '';
                    $scope.guarantor_address2     = '';
                }
            });
        }
    }

});