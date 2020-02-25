function initMaps() {
    var myLatLng = {lat: 45.653750, lng:9.553830};
    // Basic options for a simple Google Map
    // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
    var mapOptions = {
        // How zoomed in you want the map to start at (always required)
        zoom: 13,

        // The latitude and longitude to center the map (always required)
        center: myLatLng, //

        // How you would like to style the map.
        // This is where you would paste any style found on Snazzy Maps.
        /*
         styles: [
         {"featureType": "all", "elementType": "geometry.fill", "stylers": [{"color": "#ffe0d9"}]},
         {"featureType": "all", "elementType": "labels.text.fill", "stylers": [{"color": "#555555"}]},
         {"featureType": "all", "elementType": "labels.icon", "stylers": [{"visibility": "off"}]},
         {"featureType": "administrative", "elementType": "all", "stylers": [{"invert_lightness": true},
         {"saturation": "0"},
         {"gamma": "1.00"},
         {"color": "#3d3e40"},
         {"visibility": "on"}]},
         {"featureType": "administrative", "elementType": "geometry.fill", "stylers": [{"visibility": "off"}]},
         {
         "featureType": "administrative",
         "elementType": "labels.text.fill",
         "stylers": [
         {
         "color": "#555555"
         },
         {
         "lightness": "-9"
         }
         ]
         },
         {
         "featureType": "administrative",
         "elementType": "labels.text.stroke",
         "stylers": [
         {
         "visibility": "off"
         }
         ]
         },
         {
         "featureType": "administrative.neighborhood",
         "elementType": "all",
         "stylers": [
         {
         "visibility": "off"
         }
         ]
         },
         {
         "featureType": "landscape",
         "elementType": "all",
         "stylers": [
         {
         "lightness": "4"
         },
         {
         "visibility": "on"
         },
         {
         "color": "#ffe0d9"
         }
         ]
         },
         {
         "featureType": "poi",
         "elementType": "all",
         "stylers": [
         {
         "visibility": "off"
         }
         ]
         },
         {
         "featureType": "road.highway",
         "elementType": "geometry",
         "stylers": [
         {
         "visibility": "on"
         },
         {
         "color": "#d1c6c3"
         },
         {
         "lightness": "0"
         }
         ]
         },
         {
         "featureType": "road.highway",
         "elementType": "geometry.stroke",
         "stylers": [
         {
         "lightness": "0"
         },
         {
         "gamma": "0.67"
         },
         {
         "weight": "1"
         }
         ]
         },
         {
         "featureType": "road.highway",
         "elementType": "labels",
         "stylers": [
         {
         "visibility": "on"
         },
         {
         "saturation": "-100"
         },
         {
         "lightness": "-13"
         }
         ]
         },
         {
         "featureType": "road.highway",
         "elementType": "labels.text",
         "stylers": [
         {
         "visibility": "off"
         }
         ]
         },
         {
         "featureType": "road.highway",
         "elementType": "labels.text.stroke",
         "stylers": [
         {
         "visibility": "off"
         }
         ]
         },
         {
         "featureType": "road.highway.controlled_access",
         "elementType": "geometry.fill",
         "stylers": [
         {
         "lightness": "-8"
         }
         ]
         },
         {
         "featureType": "road.highway.controlled_access",
         "elementType": "geometry.stroke",
         "stylers": [
         {
         "weight": "1.50"
         }
         ]
         },
         {
         "featureType": "road.arterial",
         "elementType": "geometry",
         "stylers": [
         {
         "visibility": "on"
         },
         {
         "weight": "0.50"
         },
         {
         "color": "#d1c6c3"
         }
         ]
         },
         {
         "featureType": "road.arterial",
         "elementType": "labels",
         "stylers": [
         {
         "visibility": "off"
         }
         ]
         },
         {
         "featureType": "road.arterial",
         "elementType": "labels.text.stroke",
         "stylers": [
         {
         "visibility": "off"
         }
         ]
         },
         {
         "featureType": "road.arterial",
         "elementType": "labels.icon",
         "stylers": [
         {
         "visibility": "off"
         }
         ]
         },
         {
         "featureType": "road.local",
         "elementType": "all",
         "stylers": [
         {
         "color": "#888888"
         },
         {
         "lightness": "11"
         }
         ]
         },
         {
         "featureType": "road.local",
         "elementType": "geometry",
         "stylers": [
         {
         "weight": "0.4"
         }
         ]
         },
         {
         "featureType": "road.local",
         "elementType": "labels.text.fill",
         "stylers": [
         {
         "visibility": "on"
         },
         {
         "color": "#888888"
         },
         {
         "lightness": "-36"
         }
         ]
         },
         {
         "featureType": "road.local",
         "elementType": "labels.text.stroke",
         "stylers": [
         {
         "visibility": "off"
         }
         ]
         },
         {
         "featureType": "transit",
         "elementType": "all",
         "stylers": [
         {
         "visibility": "off"
         },
         {
         "color": "#808080"
         }
         ]
         },
         {
         "featureType": "transit",
         "elementType": "geometry.fill",
         "stylers": [
         {
         "visibility": "on"
         },
         {
         "color": "#888888"
         },
         {
         "lightness": "3"
         }
         ]
         },
         {
         "featureType": "transit",
         "elementType": "labels.text",
         "stylers": [
         {
         "visibility": "off"
         }
         ]
         },
         {
         "featureType": "transit",
         "elementType": "labels.text.stroke",
         "stylers": [
         {
         "visibility": "off"
         }
         ]
         },
         {
         "featureType": "water",
         "elementType": "geometry.fill",
         "stylers": [
         {
         "lightness": "0"
         },
         {
         "color": "#ecd6d1"
         }
         ]
         },
         {
         "featureType": "water",
         "elementType": "labels.text",
         "stylers": [
         {
         "visibility": "off"
         }
         ]
         },
         {
         "featureType": "water",
         "elementType": "labels.text.stroke",
         "stylers": [
         {
         "visibility": "off"
         }
         ]
         }
         ]*/
    };

    // Get the HTML DOM element that will contain your map
    // We are using a div with id="map" seen below in the <body>
    var mapElement = document.getElementById('map');

    // Create the Google Map using our element and options defined above
    var map = new google.maps.Map(mapElement, mapOptions);

    // Let's also add a marker while we're at it
    var marker = new google.maps.Marker({
        position: myLatLng,
        map: map,
        optimized: false,
        title: 'Geolegno'
    });
    google.maps.event.addListener(marker , 'click', function(){
      var infowindow = new google.maps.InfoWindow({
        content:'<b>Sede opeativa</b/><br>Geolegno srl',
        position: myLatLng,
      });
      infowindow.open(map);
  });

}

google.maps.event.addDomListener(window, 'load', initMaps);