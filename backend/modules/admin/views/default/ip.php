<?php
use common\helpers\curl_helper;

if (isset ( $_GET ['ip'] )) {
	$url = 'http://freegeoip.net/json/' . $_GET ['ip'];
	$result = curl_helper::curl ( $url );
	$result = json_decode ( $result, true );
	
	echo '<style>
      #map {
        width: 500px;
        height: 400px;
      }
    </style>
	';
	
	echo '<h3>Search Result of IP: ' . $_GET ['ip'] . '</h3><br>';
	
	$array = array (
			'country_name',
			'city',
	);
	
	if (! is_null ( $result )) {
		if (is_array ( $result )) {
			foreach ( $result as $key => $val ) {
				if (in_array ( $key, $array ) && strlen($val) > 0) {
					echo '<h4>' . $key . '</h4>';
					echo '<p>' . $val . '</p>';
				}
			}
		}
	}
	
	if (isset ( $result ['latitude'] ) && isset ( $result ['longitude'] )) {
		echo '<br><h4>Map</h4><div id="map"></div>
    <script>
      function initMap() {
        var mapDiv = document.getElementById(\'map\');
        var map = new google.maps.Map(mapDiv, {
          center: {lat: ' . $result ['latitude'] . ', lng: ' . $result ['longitude'] . '},
          zoom: 18
        });
      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?callback=initMap"
        async defer></script>
	';
	}
} else {
	echo 'NO IP Found';
}