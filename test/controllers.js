angular.module('starter.controllers', ['ui.router'])
.controller('locationController', function($scope, $http, $state, $stateParams, locationService){
    
    $scope.loadProv = function(place) {
        locationService.loadPlace(place)
            .success(function(data) {                
                    $scope.provs = data;            
            })
            .error(function(error) {
                console.error("error");
            })
    };

    $scope.loadAmp = function(place) {
        locationService.loadPlace(place)
            .success(function(data) {                
                    $scope.amps = data;            
            })
            .error(function(error) {
                console.error("error");
            })
    };

    $scope.loadTam = function(place) {
        locationService.loadPlace(place)
            .success(function(data) {                
                    $scope.tams = data;            
            })
            .error(function(error) {
                console.error("error");
            })
    };

    $scope.loadProv('prov');
    $scope.loadAmp('amp');
    $scope.loadTam('tam');
 
    $scope.updateAmp = function(){
      $scope.availableAmp = [];
      $scope.availableTam = [];      
      angular.forEach($scope.amps, function(value){
        if(value.prov_code == $scope.province.prov_code){
          $scope.availableAmp.push(value);
        }
      });
    };
    
    $scope.updateTam = function(){      
      $scope.availableTam = [];    
      angular.forEach($scope.tams, function(value){
        if(value.amp_code == $scope.amphoe.amp_code){
          $scope.availableTam.push(value);
        }
      });
    };

    $scope.showGMP = function(tambon) {
        locationService.selectedLocation = tambon;
        //$scope.latlon = MapService.selectedLocation;
        //$scope.loadParcel($scope.latlon.lng, $scope.latlon.lat);
        $state.go('map');
          
    };

})
.controller('mapController',  function($scope, $state, $stateParams, locationService){

    $scope.mapData = locationService.selectedLocation; 
    
})