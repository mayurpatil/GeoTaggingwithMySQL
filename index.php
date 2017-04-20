<!DOCTYPE html>
<html>
<head>
<title>Google Maps with BlueMix MySQL</title>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no">
<meta charset="utf-8">
<style>
html,body {
	height: 100%;
	margin: 0;
	padding: 0;
}

#map {
	height: 100%;
}

#floating-panel {
	position: absolute;
	top: 10px;
	left: 15%;
	z-index: 5;
	background-color: #fff;
	padding: 5px;
	border: 1px solid #999;
	text-align: center;
	font-family: 'Roboto', 'sans-serif';
	line-height: 30px;
	padding-left: 10px;
}
</style>
</head>
<body>
	<form>
		<div id="floating-panel">
			<input id="address" type="textbox" value="Govt. Offices in India"> <input	id="submit" type="button" value="Show in Map" onclick="tag();">
		</div>
	</form>
	<div id="map"></div>

	<script>
    function tag() {
            
			var xmlhttp = new XMLHttpRequest();
			var addr = document.getElementById('address').value;
			var marker;
			
			//alert(txt);
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4) {

					document.getElementById('ajax_response').innerTEXT = xmlhttp.responseText;
						
					var respStr= xmlhttp.responseText;	
					var arr = respStr.split("@$#");

					var addrs=arr[0];
					var mobile = arr[1];
						
					geocoder.geocode({
			'address' : addrs
		}, function(results, status) {
			if (status == google.maps.GeocoderStatus.OK) {
				map.setCenter(results[0].geometry.location);
				marker = new google.maps.Marker({
					map : map,
					position : results[0].geometry.location,
					animation: google.maps.Animation.DROP,
					title: addr + " " + mobile
				});
			} else {
				alert('Geocode was not successful for the following reason: '+ status);
			}
		});										
				}
				}

			var url = "/geotag.php?oname=" + addr + "";
			
			xmlhttp.open("GET", url, true);

			xmlhttp.send(null);
			//setMapOnAll(null);
		}
   
    </script>


	<script>
	var geocoder;
	var map;
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          zoom: 5,
          center: {lat: 20.5937, lng: 78.9629}
        });
       geocoder = new google.maps.Geocoder();

      }

    </script>
	<script async defer
		src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC741OI1UnP_W3Fzii_CxSoJFI66eqStV4&callback=initMap">
    </script>
</body>
<div id="ajax_response"></div>
</html>