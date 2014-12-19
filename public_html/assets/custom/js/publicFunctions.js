
function viewOnMap(lat,lng,zoom){
	var mapProp,map;
	 mapProp = {
	        center: new google.maps.LatLng(lat,lng),
	        zoom: zoom,
	        mapTypeId: google.maps.MapTypeId.ROADMAP
	    };
	  map = new google.maps.Map(document.getElementById("mapBody"), mapProp);
	      
	  new google.maps.Marker({
	      map: map,
	      position : new google.maps.LatLng(lat, lng)
	    });
}