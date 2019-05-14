var map,infoWindow,pos;
	function initMap(){
		map = new google.maps.Map(document.getElementById('map'), {
          center: pos,
          zoom: 13
    	});

     

        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
            map.setCenter(pos);
            getData(pos)
            	
			var marker = new google.maps.Marker({
			    position: pos,
			    map: map,
			});

		  	marker.addListener('click', function() {
		  	  	map.setZoom(17);
		    	map.setCenter(marker.getPosition());
		  	});

		  	google.maps.event.addListener(map, 'click', function(event) {
	          	marker.setPosition(event.latLng);
	          	pos.lat = event.latLng.lat();
	          	pos.lng = event.latLng.lng();
	          	getData(pos);
	      	});
          }, function() {
            handleLocationError(true, infoWindow, map.getCenter());
          });
        } else {
          // Browser doesn't support Geolocation
          handleLocationError(false, infoWindow, map.getCenter());
        }
      }

      function getData(pos){
      		var geocoder = new google.maps.Geocoder();
			geocoder.geocode({'latLng': pos }, function(results, status) {
				if (status == google.maps.GeocoderStatus.OK) {
					if (results[0]) {
						$("#latitude").text(pos.lat);
						$('#longitude').text(pos.lng);
						$('#address').text(results[0].formatted_address);
					}
				}
			});
      }