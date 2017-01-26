   angular.module("my-app", [])
   
   .controller("DashboardController", function($scope, $http) {
      	
      	$http.get("/api/order/showorderdetail")
	    .then(function(response) {
	        $scope.helloTo = response.data;
	    });
      	
      	$scope.completeOrder = function(id){
			var data= {
					"orderid": id
			};
			$http.post("/api/order/completeorder", data, "")
			.then(function (response) {
				//if success then update the order listing
				$http.get("/api/order/showorderdetail")
			    .then(function(response) {
			        $scope.helloTo = response.data;
			    });
			}, function (response) {
				//failed
			});
 
      	}

   })

	.controller("orderController", function($scope, $http) {
      	
      	$http.get("/api/order/history/0")
	    .then(function(response) {
	        $scope.orders = response.data.data;
	        var index = Math.ceil((response.data.totalorders)/5);
	        var pages = new Array(index);
	        $scope.pages = pages;
	    });
      	
      	$scope.next = function(id){
			$http.get("/api/order/history/"+id)
		    .then(function(response) {
		        $scope.orders = response.data.data;
		        var index = Math.ceil((response.data.totalorders)/5);
		        var pages = new Array(index);
		        $scope.pages = pages;
		    });
      	}

   })   
   ;
