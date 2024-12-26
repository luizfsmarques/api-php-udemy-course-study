<?php
/*
    Class 8
    Get the response of a server by code php, using cURL
*/

//We can pass the url as an argument
// $ch = curl_init("https://randomuser.me/api");

$ch = curl_init(); //To start curl session

//To set up the options
// curl_setopt($ch,CURLOPT_URL,"https://randomuser.me/api");
// curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

curl_setopt_array(
    $ch,
    [
        CURLOPT_URL=>"https://randomuser.me/api",
        CURLOPT_RETURNTRANSFER=>true
    ]
);

$response = curl_exec($ch); //To excute the curl call to the API

curl_close($ch); //Close the curl session to avoid waste of system resources.

echo $response, "\n";

