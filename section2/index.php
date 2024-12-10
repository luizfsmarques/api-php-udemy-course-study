<?php
/*
    Class 5
    Get the response of a server by code php
*/

// $response = file_get_contents("https://example.com");
$response = file_get_contents("https://randomuser.me/api");
echo $response;