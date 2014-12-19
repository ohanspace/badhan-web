function googleMapInitialize(lat, lng)
{
    var mapProp = {
        center:new google.maps.LatLng(lat,lng),
        zoom:17,
        mapTypeId:google.maps.MapTypeId.ROADMAP
    };
    var map = new google.maps.Map(document.getElementById("googleMap")
      ,mapProp);
      
   var marker = new google.maps.Marker({
      map: map,
      position : new google.maps.LatLng(lat, lng)
    });
}