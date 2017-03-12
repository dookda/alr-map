angular.module('alr', ['ngRoute','alr.services'])
.config(function($routeProvider) {
    $routeProvider
        .when("/", {
            templateUrl: "home.html",
            controller: "homeController"
        })
        .when("/:alrId", {
            templateUrl: "addDetail.html",
            controller: "addController"
        })
        .when("/hom", {
            templateUrl: "hom.html",
            controller: "homeController"
        })

        
})

.controller('homeController', function($scope) {
  //$scope.alrId = $routeParams.alrId;
  //console.log($scope.alrId);
})

.controller('addController', function($scope, $routeParams, $http, locationService) {
  $scope.alrId = $routeParams.alrId;
  //locationService.selectedLocation = $scope.alrId;
 // console.log($scope.alrId);


   //$scope.alrId2 = locationService.selectedLocation; 
    $scope.loadCWR = function() {
        locationService.loadCWRs()
            .success(function(data) {                
                    $scope.alrCWR = data;
                    //console.log($scope.alrData[0].gid);            
            })
            .error(function(error) {
                console.error("error");
            })
    };

    $scope.loadParcel = function(alrId) {
        locationService.loadParcels(alrId)
            .success(function(data) {                
                    $scope.alrData = data;
                    //console.log($scope.alrData[0].gid);            
            })
            .error(function(error) {
                console.error("error");
            })
    };

    $scope.loadCWR();
    $scope.loadParcel($scope.alrId);

    $scope.data = {
        code: $scope.alrId,
        owner: "",
        ctype: "",
        rai: "",
        date: ""
    }

    var oriData = angular.copy($scope.data);

    $scope.resetForm = function() {
        $scope.data = angular.copy(oriData);
        $scope.dataForm.$setPristine();
    };

    $scope.isPersonChanged = function() {
        return !angular.equals($scope.data, oriData);
    };

    $scope.sendMessage = function() {
        $http.post("activelandInsert.php", $scope.data)
            .then(function(res) {
                    console.log(res)
                }
            )
    }
})


.controller('closeCtrl', function($scope, $window) {
  $scope.onExit = function() {
      return ('bye bye');
    };

   $window.onbeforeunload =  $scope.onExit;
});

