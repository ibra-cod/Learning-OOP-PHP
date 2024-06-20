<?php 


// $curl = curl_init('https://api.openweathermap.org/data/2.5/weather?lat=44.34&lon=10.99&appid=6bcd0b0e55ea0cc663bc4bd5b395a6ce');

$data = curl_exec($curl);

if ($data === false ) {
    $error = curl_error($curl);
    var_dump($error);
} else{

}

curl_close($curl);

