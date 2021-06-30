
//show all Category
app.controller("showzoneCtrl", function($scope, $http){
	$scope.reverse = false;
	$scope.perPage = "20";
	$scope.allZone = [];

	var where = { 'table': 'zone' };

	$http({
		method : 'POST',
		url    : url + 'result',
		data   : where
	}).success(function(response) {
		angular.forEach(response, function(values, index) {
			values['sl'] = index + 1;
			
		    // get godown info
			$http({
        		method : 'POST',
        		url    : url + 'result',
        		data   : {
        		    table: 'godowns',
        		    cond : {code: values.godown_code},
        		    select: ['code', 'name', 'address']
        		}
        	}).success(function(godownInfo) {
        	    
        	    if(godownInfo.length > 0){
        	        values['godown_name'] = godownInfo[0].name +' - '+ godownInfo[0].address;
        	    }else{
        	        values['godown_name'] = 'N/A';
        	    }
        	});
			
			$scope.allZone.push(values);
		});

		 //Pre Loader
		  $("#loading").fadeOut("fast",function(){
			  $("#data").fadeIn('slow');
		  });
	});
});
