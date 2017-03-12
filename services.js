angular.module('alr.services', [])
.service('locationService', function($http){
 return{
    selectedLocation:{}, 
    loadParcels: function(alrId){
        var alrID ='http://map.nu.ac.th/alr-map/api/parcel/'+alrId;                    
        return $http.get(alrID);
    },
    loadCWRs: function(){
        var alrCWR ='http://map.nu.ac.th/alr-map/api/k';                    
        return $http.get(alrCWR);
    },         
  }
});

