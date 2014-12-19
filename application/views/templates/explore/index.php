
<div class="container">
	<div class="well well-lg">
		
		
		
		<div id="map_wrapper"  style="height: 500px">
			<input id="pac-input" class="controls" type="text" placeholder="Search Box">
		    <div id="map_canvas" class="mapping" style="width: 100%; height: 100%;"></div>
		</div>
		
		<div class='text-center'> 
			<h2>Explore the <?php echo BADHAN?> organization<h2>
			<h3>1 Organization</h3>
			<h3><?php echo count($zones)?> Zones</h3>
			<h3><?php echo count($individual_units)?> Individual units</h3>
			<h3><?php echo count($familys)?> Families</h3>
			
		</div>
	
	
	</div>
</div>


<!-- explore map -->
<script>
function exploreMapInitialize() {
    var map;
    var bounds = new google.maps.LatLngBounds();
    var mapOptions = {
        mapTypeId: 'roadmap',
        };
                    
    // Display a map on the page
    map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
    map.setTilt(45);
    var organograms = <?php echo $organograms_json?>;  
      
   
    var markers = [];
    var infoWindowContent = [];
    for(i=0; i < organograms.length; i++){
        organogram = organograms[i];
        markers[i] = [organogram.name, organogram.latitude, organogram.longitude ];
        	base_url = '<?php echo site_url()?>';

        	if(organogram.parent_id == 0 | organogram.parent_id == 1){
        		organogram_uri = organogram.short_name;
        	}else{
        		organogram_uri = organogram.parent_short_name +'/' +organogram.short_name;
        	}
			organogram_url = base_url + organogram_uri;
        infoWindowContent[i] = ['<div class="info_content">'+
                                '<h3><a href='+organogram_url +'>' + organogram.name_in_bangla + '</a></h3>'+
                                '<p>' + organogram.address + '</p>' +
                                '<p><a href='+organogram_url + '>visit</a></p>' +
                                '</div>'
                                ]
    }

   
        
    // Display multiple markers on a map
    var infoWindow = new google.maps.InfoWindow(), marker, i;

    var markerImg = '<?php echo $badhan_config['favicon_uri'];?>' ;
    // Loop through our array of markers & place each one on the map  
    for( i = 0; i < markers.length; i++ ) {
        var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
        bounds.extend(position);
        marker = new google.maps.Marker({
            position: position,
            map: map,           
            title: markers[i][0]
        });
        
        // Allow each marker to have an info window    
        google.maps.event.addListener(marker, 'click', (function(marker, i) {
            return function() {
                infoWindow.setContent(infoWindowContent[i][0]);
                infoWindow.open(map, marker);
            }
        })(marker, i));

        // Automatically center the map fitting all markers on the screen
        map.fitBounds(bounds);
    }

    // Override our map zoom level once our fitBounds function runs (Make sure it only runs once)
    var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {
        this.setZoom(7);
        google.maps.event.removeListener(boundsListener);
    });




    var input = /** @type {HTMLInputElement} */(
            document.getElementById('pac-input'));

        //var types = document.getElementById('type-selector');
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
        //map.controls[google.maps.ControlPosition.TOP_LEFT].push(types);

        var autocomplete = new google.maps.places.Autocomplete(input);
        autocomplete.bindTo('bounds', map);

        google.maps.event.addListener(autocomplete, 'place_changed', function() {
           // infowindow.close();
            //marker.setVisible(false);
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

           
          });
    
}

$(document).ready(function(){
	exploreMapInitialize();
});

</script>