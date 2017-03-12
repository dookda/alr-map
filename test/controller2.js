angular.module('starter.controllers', [])
.controller('dropdownCtrl', ['$scope','CustomerService', function($scope, CustomerService) {
  
  $scope.customer ={
    Name:'', 
    Country:'', 
    State: '', 
    City: ''
  };
  
  $scope.countries = CustomerService.getCountry();
    
  $scope.getCountryStates = function(){
    $scope.sates = CustomerService.getCountryState($scope.customer.Country);
    $scope.cities =[];
  }
  
  $scope.getStateCities = function(){
    //debugger;
    $scope.cities =[];
    $scope.cities = CustomerService.getStateCity($scope.customer.State);
  	
  }
  
 
}]);
