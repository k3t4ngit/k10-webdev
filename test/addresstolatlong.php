<?php 
	
	// $address = urlencode($location->getAddressLine1().' '.$location->getAddressLine2().' '.$location->getCity().' '.$location->getState().', '.$location->getCountry()) ;
	//33.7471045 , -117.8683609
	$address = urlencode("Santa Ana Lofts 170 W. Third Street Santa Ana, CA") ;
	$url = "http://maps.google.com/maps/api/geocode/json?address=$address&sensor=false&region=IND";
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	$response = curl_exec($ch);
	curl_close($ch);
	$response_a = json_decode($response);
	$lat = $response_a->results[0]->geometry->location->lat;
	$long = $response_a->results[0]->geometry->location->lng;
	$latlongArray = array('Lat' => $lat,'Long' => $long) ;
	print_r($latlongArray) ;
