angular.module('starter.services', [])
.service('locationService', function($http){
 return{
    selectedLocation:{}, 
    loadPlace: function(placeCode){
        var place ='http://localhost/alr-map/api/place/'+placeCode;                    
        return $http.get(place);
    }      
  }
});
