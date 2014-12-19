function selectGeoLocation(inputPlace,zooming) {
    var latitudeField = $("#latitude");
    var longitudeField = $("#longitude");
    var lat = latitudeField.val();
    var lng = longitudeField.val();
    $("#pac-input").val(inputPlace);
    if(lat && lng){       
        var Latitude = parseFloat(lat);
        var Longitude = parseFloat(lng);          
        var zoom = zooming;
    }
    else{
        
        var lat = 24.036431;
        var lng = 90.250969;
        var zoom = 7;
    }
        

    var mapOptions = {
      center: new google.maps.LatLng(lat, lng),
      zoom: zoom
    };
    var map = new google.maps.Map(document.getElementById('map-canvas'),
      mapOptions);
    var marker = new google.maps.Marker({
      map: map,
      draggable : true,
      position : new google.maps.LatLng(lat, lng)
    });

    var input = /** @type {HTMLInputElement} */(
        document.getElementById('pac-input'));

    //var types = document.getElementById('type-selector');
    map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
    //map.controls[google.maps.ControlPosition.TOP_LEFT].push(types);

    var autocomplete = new google.maps.places.Autocomplete(input);
    autocomplete.bindTo('bounds', map);

    var infowindow = new google.maps.InfoWindow();

    google.maps.event.addDomListener(marker,'dragend',function(){
          var Lat = marker.getPosition().lat();
          var Lng = marker.getPosition().lng();

          latitudeField.val(Lat);
          longitudeField.val(Lng);
    });

    google.maps.event.addListener(autocomplete, 'place_changed', function() {
      infowindow.close();
      marker.setVisible(false);
      var place = autocomplete.getPlace();
      if (!place.geometry) {
        return;
      }

      // If the place has a geometry, then present it on a map.
      if (place.geometry.viewport) {
        map.fitBounds(place.geometry.viewport);
      } else {
        map.setCenter(place.geometry.location);
        map.setZoom(13);  
      }

      marker.setPosition(place.geometry.location);
      marker.setVisible(true);
      var Lat = marker.getPosition().lat();
              var Lng = marker.getPosition().lng();
              var locString = Lat + ',' + Lng;
              geoLocField.val(locString);

      var address = '';
      if (place.address_components) {
        address = [
          (place.address_components[0] && place.address_components[0].short_name || ''),
          (place.address_components[1] && place.address_components[1].short_name || ''),
          (place.address_components[2] && place.address_components[2].short_name || '')
        ].join(' ');
      }

      infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
      infowindow.open(map, marker);
    });

  
}


$(function(){
    
    var currentPath = window.location.pathname;
    //in case of district pointing
    if(currentPath.search('admin/district/edit')!== -1){
        inputPlace = '';
        if($("form :input[name = name]").val()){
        var districtName = $("form :input[name = name]").val();
        var divisionName = $("form select option:selected").val();           
        inputPlace = districtName + ', ' + divisionName + ' division';        
        }
        zooming = 11;
        selectGeoLocation(inputPlace,zooming);
    }
    
    //in case of institution/Hostpital/Thana pointing
    if(currentPath.search('admin/institution/edit') !== -1
             || currentPath.search('admin/hospital/edit') !== -1 
             || currentPath.search('admin/thana/edit') !== -1 ){
        
        inputPlace = '';
        $('#district_id').change(function(){
            var Name = $("form :input[name = name]").val();
            var districtName = $("form select[id = district_id] option:selected").text();           
            inputPlace = Name + ', ' + districtName ;  
            $('#pac-input').val(inputPlace);
        });        
        zooming = 17;
        selectGeoLocation(inputPlace,zooming);
    }
    
    //in case of zone pointing
    if(currentPath.search('admin/zone/edit') !== -1){        
        inputPlace = '';
        if($("form :input[name = name]").val()){
        var inputPlace = $("form :input[name = name]").val();
        }else{
           $("form :input[name = name]").change(function(){
              var name = $("form :input[name = name]").val();
              $('#pac-input').val(name);
           }); 
        }
        zooming = 17;
        selectGeoLocation(inputPlace,zooming);
    }
    
    //in case of UNIT/ FAMILY pointing
    if(currentPath.search('admin/unit/edit') !== -1
         || currentPath.search('admin/family/edit') !== -1   ){        
        inputPlace = '';
        var nameField = $("form :input[name = name]");
        if(nameField.val()){
            var inputPlace = nameField.val();
        }else{
            nameField.change(function(){
               var name = nameField.val();
               $('#pac-input').val(name);
            }); 
        }
        zooming = 17;
        selectGeoLocation(inputPlace,zooming);
    }
    
});




