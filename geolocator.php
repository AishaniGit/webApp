
<?php
/* The Google Geolocation API is used to obtain the latitude
 and longitude of the address, which is then saved in the database. 
 These coordinates are later retrieved to find the closest donor for an item. */

function getGeoCode($address)
{
    try {
        // geocoding api url
        $url = "https://maps.google.com/maps/api/geocode/json?address=$address&key=AIzaSyC0vzFpV1tYDYo5cE0RNXO1MxbcPMlf8cQ";
        //echo $url;
        $data = array(
            "lat" => "",
            "lng" => "",
        );
        // send api request
        $geocode = file_get_contents($url);
        $json = json_decode($geocode);
        //echo 'json: ' . $json.to;
        //retrieve the lat and long values 
        $data['lat'] = $json->results[0]->geometry->location->lat;
        $data['lng'] = $json->results[0]->geometry->location->lng;
    } catch (exception $e) {
        echo 'function fail';
        echo 'lat' .  $data['lat'];
        echo 'lang' .  $data['lng'];
    }
    return $data;
}
